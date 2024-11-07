<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShippingAddressController;
use App\Models\Artwork;

Route::get('/', function () {
    $artworks = Artwork::all();
    return view('index',['artworks' => $artworks]);
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contactUs', function () {
    return view('contactUs');
})->name('contactUs');

// Authentication
Route::controller(AuthController::class)->group(function(){
    Route::get('/login','showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

// User Part
Route::get('/users/artworks',[BuyerController::class,'index'])->name('index');
// Artworks and Artist - Public
Route::get('/user/artworks/{id}',[BuyerController::class,'userArtworkShow'])->name('userArtworkShow');
Route::get('/user/artist',[BuyerController::class,'userArtistShow'])->name('userArtistShow');


// If Auth can access below routes
Route::middleware(['auth'])->group(function () {
    Route::controller(BuyerController::class)->group(function(){
        // Access to Edit/Update -- Profile Password
        Route::get('/user/myaccount/profile','userShowAccount')->name('user.ShowAccount');
        Route::get('/user/myaccount/orders','userShowOrders')->name('user.ShowOrders');
        Route::get('/user/myaccount/reset/password','userResetPassword')->name('user.ResetPassword');
        Route::put('/user/myaccount/profile/{id}/update','userEditAccount' )->name('user.EditAccount');
        Route::put('/user/myaccount/reset/password/{id}/update','userUpdatePassword' )->name('user.UpdatePassword');
        
        // Buyers Cart
        Route::get('/user/cart','orderShoppingCart')->name('orderShoppingCart');
        Route::get('/user/add/order/{id}','orderAddToCart' )->name('orderAddToCart');
        Route::post('/user/checkout/remove/{id}','orderRemoveItem')->name('orderRemoveItem');

    });

    // Shipping Address CRUD
    Route::controller(ShippingAddressController::class)->group(function(){
        // Address Create Read Update Delete
        Route::get('/user/myaccount/address','userShowAddress' )->name('user.ShowAddress');
        Route::get('/user/myaccount/address/add','userAddAddress' )->name('user.AddAddressForm');
        Route::post('/user/myaccount/address','userSaveAddress');
        Route::get('/user/myaccount/address/{id}/edit','userEditAddress')->name('user.EditAddress');
        Route::put('/user/myaccount/address/{id}/update','userUpdateAddress' )->name('user.UpdateAddress');
        Route::post('/user/myaccount/address/{id}/delete','userRemoveAddress')->name('user.RemoveAddress');
    });
    // Buyers Checkout
    Route::get('/checkout',[OrderItemController::class,'orderCheckout'])->name('order.Checkout');

    Route::controller(OrderController::class)->group(function(){
        // Process Order -> Success
        Route::post('/checkout/processing','orderCheckoutProcess')->name('order.CheckoutProcess');
        Route::get('/checkout/success','orderSuccess')->name('order.Success');

        // Handle the error on orderCheckoutProcess
        Route::get('/checkout/processing', function () {
            return redirect()->route('login');
        })->middleware('auth');
    });
});



// ---------------------------------------------------
// Seller Part
Route::get('/seller',[SellerController::class,'sellerIndex'])->name('sellerIndex');

// Login/Register/Logout
Route::get('/seller/login',[SellerController::class,'sellerLoginForm'])->name('sellerLogin');
Route::post('/seller/login',[SellerController::class,'sellerLogin']);
Route::get('/seller/register',[SellerController::class,'sellerRegistrationForm'])->name('sellerRegister');
Route::post('/seller/register',[SellerController::class,'sellerRegister']);
Route::post('/seller/logout',[SellerController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth:seller']], function() {
    // Seller
    Route::controller(SellerController::class)->group(function(){
        // Seller Dashboard
        Route::get('/seller/dashboard','sellerDashboard')->name('sellerDashboard');

        // Manage Order and Update
        Route::get('/seller/manage','sellerManageOrder')->name('seller.ShowManageOrders');
        Route::patch('/seller/manage{id}','sellerUpdateOrder')->name('seller.UpdateOrders');

        // Editing and Updating profile information
        Route::get('/seller/profile','sellerProfile')->name('sellerProfile');
        Route::put('/seller/profile/{id}/update','sellerUpdateProfile')->name('sellerUpdateProfile');

        // Show Artwork List & Submit form
        Route::get('/seller/artworks','sellerArtworks')->name('sellerArtworks');
        Route::get('/seller/artworks/artworkList','sellerArtworkList')->name('sellerArtworkList');

        // Create and Read of Submitted Artwork
        Route::get('/seller/artworks/artworksForm','sellerShowArtworksForm')->name('sellerShowArtworksForm');
        Route::post('/seller/artworks/artworksForm','sellerStoreArtwork');

        // Editing and Updating the submitted Artworks
        Route::get('/seller/artworks/{id}/edit','sellerEditArtwork')->name('sellerEditArtwork');
        Route::put('/seller/artworks/{id}/update','sellerUpdateArtwork')->name('sellerUpdateArtwork');

        // Delte the submitted Artworks
        Route::post('/seller/artworks/{id}/delete','sellerDeleteArtwork')->name('sellerDeleteArtwork');
    });
});
