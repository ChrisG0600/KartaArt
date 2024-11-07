<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Order;
use App\Models\Seller;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class BuyerController extends Controller
{
    // 
    public function index(){
        $artworks = Artwork::all()->where('for_sale', 1);
        return view('User.artworkSale', ['artworks' => $artworks]);
    }

    // Show Profile
    public function userShowAccount(){
        if(Auth::check()){
            $userData = Auth::user();
            return view('User.profile', ['userData' => $userData]);
        }
        return redirect('login');
    }

    // Edit Profile
    public function userEditAccount(Request $request, $id){
        // Validate the form
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 
            'email')->ignore($id)]
        ]);

        // Fetch all validated data
        $userData = User::findOrFail($id);

        // Track if changes made
        $userTrack = false;

        // Check if there is changes 
        if($validated['first_name'] !== $userData->first_name){
            $userData->first_name = $validated['first_name'];
            $userTrack = true;
        }

        if($validated['last_name'] !== $userData->last_name){
            $userData->last_name = $validated['last_name'];
            $userTrack = true;
        }

        if($validated['email'] !== $userData->email){
            $userData->email = $validated['email'];
            $userTrack = true;
        }

        // Save to db 
        if($userTrack){
            $userData->save(); // Save the updated data

            return redirect()->route('user.ShowAccount')->with('message', 'Profile updated successfully!');            
        }else{
            // If no changes has been made
            return redirect()->back()->with('sellerErr', 'No changes were made to your profile.');
        }
    }
    // Show Orders list
    public function userShowOrders(){
        // Fetch username
        $userData = Auth::user();
        // Fetch user orders with order items and artworks
        $orders = Order::where('user_id', Auth::id())
                    ->with(['orderItems.artwork'])
                    ->get();

        return view('User.viewOrder', compact('orders', 'userData'));
    }
    // Show Reset Password Form
    public function userResetPassword(){
        $userData = Auth::user();
        return view('User.resetPassword', ['userData' => $userData]);
    }

    // Update Password
    public function userUpdatePassword(Request $request, $id){
        $validated = $request->validate([ 
            'current_password' => 'nullable|string', // Add current password validation
            'password' => 'nullable|string|min:8|confirmed' // Make password nullable
        ]);

        // Fetch User Data
        $userData = User::findOrFail($id);
        // Only update the password if a new one is provided
        if ($validated['password']) {
            // Check if the current password matches
            if (!Hash::check($validated['current_password'], $userData->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $userData->password = Hash::make($validated['password']);// Hash the new password
            $sellerUpdateTrack = true; 
        }

        if($sellerUpdateTrack){
            $userData->save(); // Save the updated data
            return redirect()->route('user.ResetPassword')->with('message', 'Password updated successfully!');            
        }else{
            // If no changes has been made
            return redirect()->back()->with('sellerErr', 'No changes were made to your profile.');
        }
    }

    // Show Artwork Details
    public function userArtworkShow($id){
        $artworks = Artwork::with('seller')->findOrFail($id);
        return view('User.artworkShow', ['artworks' => $artworks]);
    }

    // Show Artist 
    public function userArtistShow(){
        // Refer to BuyerControllerGuide.txt regarding the artworks_count
        $artists = Seller::withCount(['artworks' => function ($query) {
            $query->where('for_sale', true);
        }])->get();

        return view('User.artistShow',[ 
            'artists' => $artists                 
        ]);
    }

    // Add Items to shopping Cart
    public function orderAddToCart(Request $request, $id){
        $artwork = Artwork::findOrFail($id);
        $addToCart = [
            'id' => $artwork->id,
            'title' => $artwork->artwork_title,
            'price' => $artwork->artwork_price,
            'image' => $artwork->image,
            'user_id' => Auth::id(),
            'artwork_id' => $artwork->id,
        ];

        // Check for auth user
        if(Auth::check()){
            // Store the Order Items to database
            ShoppingCart::create($addToCart);
        }else{
            // Store the Order Items to session if user is a guest(not registered)
            $cart = Session::get('shoppingCart', []);
            $cart[$id] = $addToCart;
            Session::put('shoppingCart', $cart);
        }

        // Index on /users/artworks
        return redirect()->route('index')->with('message',$addToCart['title'] . 'has been added to your cart');
    }

    // ShoppingCart
    public function orderShoppingCart(){
        $user_id = Auth::id();

        $checkout = ShoppingCart::where('user_id', $user_id)->get();
        $price = $checkout->sum('price');

        
        return view('Orders.shoppingCart',['checkout'=> $checkout, 'price' => $price]);
    }

    // Remove Item 
    public function orderRemoveItem($id){
        $user_id = Auth::id();

        // Find and delete the specific item from the user's cart
        $removeItem = ShoppingCart::where('user_id', $user_id)
                                ->where('id', $id) // or 'artwork_id', if that's the item identifier
                                ->delete();
    
        return redirect()->route('orderShoppingCart')->with('message', 'Item removed from cart.');
    }
}
