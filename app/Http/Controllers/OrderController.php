<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    // Checkout Process
    public function orderCheckoutProcess(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_address' => 'required|integer',
            'payment' => 'required|string',
        ]);
    
        $userId = Auth::id();
    
        // Fetch the cart items with artwork data
        $cartItems = ShoppingCart::where('user_id', $userId)->with('artwork')->get();
    
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }
    
        DB::beginTransaction();
    
        try {
            // Create Order
            $order = Order::create([
                'order_invoice' => 'INV-' . strtoupper(Str::random(10)),
                'user_id' => $userId,
                'shipping_address_id' => $validatedData['shipping_address'],
                'order_total' => $cartItems->sum('price') + 10.99, // Assuming a flat shipping rate
                'payment_method' => $validatedData['payment'],
                'order_status' => 'Pending',
            ]);
    
            // Log all cart items
            // Log::info('Cart Items: ' . $cartItems->toJson());
    
            // Save each cart item as an order item
            foreach ($cartItems as $cartItem) {
                // Log::info('Processing Cart Item: ', ['cartItem' => $cartItem->toArray()]);
                // Log::info('Artwork ID: ' . $cartItem->artwork->id); // Explicitly log the artwork ID
    
                OrderItem::create([
                    'order_id' => $order->id,
                    'artwork_id' => $cartItem->artwork->id, // Ensure correct field access
                    'price' => $cartItem->price,
                ]);
            }
            
            DB::commit();
            // Cleare the ShoppingCart after success order
            ShoppingCart::where('user_id', $userId)->delete();
            return redirect()->route('order.Success')->with('message', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            // Log::error('Checkout Error: ' . $e->getMessage());
            return back()->with('error', 'Checkout failed. Please try again.');
        }
    }
    
    

    
    
    public function orderSuccess(){
        return view('Orders.success');
    }
}
