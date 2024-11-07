<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    //Show Checkout
    public function orderCheckout(){
        $user_id = Auth::id();

        $user = Auth::user();
        $addressData = $user->shippingAddresses;


        $order_items= ShoppingCart::where('user_id', $user_id)->get();
        $price = $order_items->sum('price');

        
        return view('Orders.checkout',[
            'order_items'=> $order_items, 
            'price' => $price,
            'addressData' => $addressData,
        ]);
    }

}
