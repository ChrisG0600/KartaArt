<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ShoppingCart;

class Controller
{
    public function __construct()
    {
        // Share the cart count with all views
        if(Auth::check()){
            view()->share('cartCount', $this->getCartCount());            
        }

    }

    protected function getCartCount()
    {
        if (Auth::check()) {
            // Fetch the cart count from the database for authenticated users
            return ShoppingCart::where('user_id', Auth::id())->count();
        }
        // else {
        //     // Fetch the cart count from the session for guests
        //     $cart = Session::get('shoppingCart', []);
        //     return count($cart);
        // }
    }
}
