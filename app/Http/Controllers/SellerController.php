<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    // Seller Index Page
    public function sellerIndex(){
        return view('Seller.index');
    }

    // Seller Profile Page
    public function sellerProfile(){
        // Check if auth seller
        if (Auth::guard('seller')->check()) {

            // Get the authenticated seller's data
            // ->user() fetching single data
            $sellerData = Auth::guard('seller')->user();

            return view('Seller.profile', ['seller' => $sellerData]);
        }
        return redirect()->route('sellerLogin')->with('error', 'You need to log in first.');
    }

    // Seller Update Profile Page
    public function sellerUpdateProfile(Request $request, $id){

        // Validate the incoming request data
        $validated = $request->validate([
            'artist_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('sellers', 'email')->ignore($id)], // Ignore current seller's email
            'current_password' => 'nullable|string', // Add current password validation
            'password' => 'nullable|string|min:8|confirmed' // Make password nullable
        ]);

        // Fetch the seller data
        $sellerData = Seller::findOrFail($id);

        // Track if user has made an update
        $sellerUpdateTrack = false;

        // Update seller data
        if($validated['artist_name'] !== $sellerData->artist_name){
            $sellerData->artist_name = $validated['artist_name'];
            $sellerUpdateTrack = true;
        }

        if($validated['username'] !== $sellerData->username ){
            $sellerData->username = $validated['username'];
            $sellerUpdateTrack = true;
        }

        if($validated['email'] !== $sellerData->email ){
            $sellerData->email = $validated['email'];
            $sellerUpdateTrack = true;
        }
        

        // Only update the password if a new one is provided
        if ($validated['password']) {
            // Check if the current password matches
            if (!Hash::check($validated['current_password'], $sellerData->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $sellerData->password = Hash::make($validated['password']);// Hash the new password
            $sellerUpdateTrack = true; 
        }

        if($sellerUpdateTrack){
            $sellerData->save(); // Save the updated data

            return redirect()->route('sellerProfile')->with('message', 'Profile updated successfully!');            
        }else{
            // If no changes has been made
            return redirect()->back()->with('sellerErr', 'No changes were made to your profile.');
        }

    }

    // Show Seller Login Form
    public function sellerLoginForm(){
        // Redirect if the seller is already logged in
        if (Auth::guard('seller')->check()) {
            return redirect()->route('sellerProfile')->with('message', 'You are already logged in.');
        }
        return view('Seller.login');
    }

    // Show dashboard 
    public function sellerDashboard()
    {
        // Fetched Authenticated User
        $seller = Auth::guard('seller')->user();
        
        $sellerName = $seller->username;
        

        // Queries
        $totalSales = Order::whereHas('orderItems.artwork', function ($query) use ($seller) {
            $query->where('artist_name', $seller->id);
        })->sum('order_total');
    
        $totalArtworks = Artwork::where('artist_name', $seller->id)->count();
    
        $pendingOrders = Order::whereHas('orderItems.artwork', function ($query) use ($seller) {
            $query->where('artist_name', $seller->id);
        })->where('order_status', 'Pending')->count();
    
        $preparingOrders = Order::whereHas('orderItems.artwork', function ($query) use ($seller) {
            $query->where('artist_name', $seller->id);
        })->where('order_status', 'Preparing')->count();
    
        $pickedUpOrders = Order::whereHas('orderItems.artwork', function ($query) use ($seller) {
            $query->where('artist_name', $seller->id);
        })->where('order_status', 'Picked Up')->count();
    
        return view('Seller.dashboard', compact('sellerName','totalSales', 'totalArtworks', 'pendingOrders', 'preparingOrders', 'pickedUpOrders'));
    }
    

    // Show manage order
    public function sellerManageOrder()
    {
        // Retrieve the authenticated seller using the 'seller' guard
        $seller = Auth::guard('seller')->user();
    
        // Fetch only orders that contain artworks associated with the authenticated seller
        $orderData = Order::whereHas('orderItems.artwork', function ($query) use ($seller) {
            // Filter order items to include only those where the artwork belongs to the authenticated seller
            $query->where('id', $seller->id);
        })
        // Eager load relationships to avoid N+1 query problem
        ->with(['orderItems.artwork', 'user'])
        // Get the result set
        ->get();
    
        // Pass this data to the view
        return view('Seller.manageOrder', ['orderData' => $orderData]);
    }

    // Update Order
    public function sellerUpdateOrder(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->order_status = $request->input('status');
        $order->save();

        return back()->with('message', 'Order status has been updated.');
    }
    
    
    
    // Process the Login form
    public function sellerLogin(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        
        if (Auth::guard('seller')->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('sellerIndex')->with('message', 'Successful Login');
        }

        return back()->withErrors(['email' => 'Email or Password is incorrect.']);
    }

    // Show Seller Registration Form
    public function sellerRegistrationForm(){
        // Redirect if the seller is already logged in
        if (Auth::guard('seller')->check()) {
            return redirect()->route('sellerProfile')->with('message', 'You are already logged in.');
        }
        return view('Seller.register');
    }

    // Process the Register Form
    public function sellerRegister(Request $request){
        $validated = $request->validate([
            'artist_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('sellers', 'email')], // Make sure you're checking the correct table
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

        // Insert into the database
        Seller::create($validated);

        return redirect()->route('sellerLogin')->with('message', 'Successfully created your account!');
    }

    // Artworks Tab
    public function sellerArtworks(){
        return view('Seller.artworks');
    }

    // Show List of Submitted Artworks
    public function sellerArtworkList(){

        // Fetch all artworks for the authenticated seller
        $artworks = Artwork::where('artist_name', Auth::guard('seller')->user()->id)->get();
        return view('Seller.artworkList', ['artworks' => $artworks]);
    }

    // Show Artworks Form 
    public function sellerShowArtworksForm(){

        $sellerData = Auth::guard('seller')->user();
        return view('Seller.artworksForm', ['seller' => $sellerData]);
    }

    // Process the form data on Artworks From
    public function sellerStoreArtwork(Request $request){
        $validated = $request->validate([
            'artwork_title' => 'required|string|max:255',
            'artwork_description' => 'required|string',
            'artwork_medium' => 'required|string|max:255',
            'artwork_size' => 'required|string',
            'artwork_price' => 'required|numeric',
            'for_sale' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
        
        // Handle File Upload
        if ($request->hasFile('image')) {
            $file = $validated['image'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('artworks'), $filename);
            $validated['image'] = $filename; // Add the filename to the validated array
        }
    
        // Add the authenticated seller's ID as the artist_name (foreign key)
        $validated['artist_name'] = Auth::guard('seller')->user()->id;
    
        // Save the artwork to the Artwork model
        Artwork::create($validated);
    
        return redirect()->route('sellerArtworkList')->with('message', 'Artwork submitted successfully!');
    }
    
    // Show Edit ArtworkForm
    public function sellerEditArtwork($id){
        $artworks = Artwork::where('artist_name', Auth::guard('seller')->user()->id)->findOrFail($id);
        return view('Seller.edit_artworksFrom', ['artworks' => $artworks]);
    }

    // Process the Edited Artwork Form
    public function sellerUpdateArtwork(Request $request, $id){
        $validated = $request->validate([
            'artwork_title' => 'required|string|max:255',
            'artwork_description' => 'required|string',
            'artwork_medium' => 'required|string|max:255',
            'artwork_size' => 'required|string',
            'artwork_price' => 'required|numeric',
            'for_sale' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional for update
        ]);

        $artwork = Artwork::findOrFail($id);

        // Retrieve the for_sale value
        $forSale = $request->input('for_sale'); // Will be '1' if checked, '0' if unchecked

        // Convert it to a boolean if needed
        $forSale = $forSale == '1';

        // Set the for_sale value to its column
        $validated['for_sale'] = $forSale;


        // Handle image
        if ($request->hasFile('image')) {
            $file = $validated['image'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('artworks'), $filename);
            $validated['image'] = $filename;
        }
        
        // Update
        $artwork->update($validated);
    
        return redirect()->route('sellerArtworkList')->with('message', 'Artwork updated successfully!');
    }

    // Delete Submitted Artworks
    public function sellerDeleteArtwork($id){
        // Find the artwork by ID and ensure it belongs to the authenticated seller
        $artworks = Artwork::where('artist_name', Auth::guard('seller')->user()->id)->findOrFail($id);
        
        // Delete the image on project folder
        if($artworks->image){
            // Check if there is an image
            $image_path = public_path('artworks/'.$artworks->image);

            if(file_exists($image_path)){
                // Delete the image
                unlink($image_path);
            }
        }
        
        // Delete the data on DB
        $artworks->delete();

        return redirect()->route('sellerArtworkList')->with('message', 'Artwork deleted successfully!');
    }

    // Logout the seller
    public function logout(Request $request){
        Auth::guard('seller')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the token to prevent session fixation
        $request->session()->regenerateToken();

        return redirect()->route('sellerIndex')->with('message', 'Logged out successfully');
    }
}
