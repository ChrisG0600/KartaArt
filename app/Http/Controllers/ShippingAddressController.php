<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
{
    // Show Address List
    public function userShowAddress(){

    // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Fetch addresses related to the authenticated user
            $addressData = $user->shippingAddresses; // Use the relationship directly
            
            // Return the view with the address data and user data
            return view('User.address', [
                'addressData' => $addressData,
                'userData' => $user
            ]);
        }
        
        return view('User.address');
    }

    // Addess Form
    public function userAddAddress(){
        return view('User.addAddress');
    }


    // Process Address 
    public function userSaveAddress(Request $request){
        // Validate the Input
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'house_no' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'is_default' => 'boolean',
        ]);


        $userId = Auth::id();
        // Set 'is_default' to false if not present in the request
        $validated['is_default'] = $validated['is_default'] ?? false;
        
        // Check if the user is setting this address as default
        if ($validated['is_default']) {
            // Check if the user already has a default address
            $existingDefaultAddress = ShippingAddress::where('user_id', $userId)->where('is_default', true)->first();
    
            if ($existingDefaultAddress) {
                // If a default address exists, unset it
                $existingDefaultAddress->update(['is_default' => false]);
            }
        }
    
        // Add the authenticated user's ID manually
        $validated['user_id'] = $userId;
        
        // Save to Db
        ShippingAddress::create($validated);

        
        return redirect()->route('user.ShowAddress')->with('message', 'Added new address successfully');
    }

    // Edit Address
    public function userEditAddress($id)
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            
            
            // Fetch the address by ID and ensure it belongs to the authenticated user
            $addressData = ShippingAddress::findOrFail($id);

            // Pass the address data to the view
            return view('user.editAddress', ['addressData' => $addressData]);
        }
        
        return redirect()->back()->with('error', 'Unauthorized');
    }

    // Update Address
    public function userUpdateAddress(Request $request, $id){
        // Validation
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'house_no' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'is_default' => 'nullable|boolean',
        ]);

        $userId = Auth::id();

        // If 'is_default' is not present in the request (i.e., checkbox was unchecked), set it to false
        $validated['is_default'] = $request->has('is_default') ? true : false;

        // Check if the user is setting this address as default
        if ($validated['is_default']) {
            // Check if the user already has a default address
            $existingDefaultAddress = ShippingAddress::where('user_id', $userId)->where('is_default', true)->first();
        
            // If a different address is set as default, unset it
            if ($existingDefaultAddress && $existingDefaultAddress->id != $id) {
                $existingDefaultAddress->update(['is_default' => false]);
            }
        }
    
        // Use update() method to directly update the fields
        $shippingData = ShippingAddress::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $shippingData->update($validated);

        return redirect()->route('user.ShowAddress')->with('message', 'Address updated successfully!');
    }

    // Delete Address
    public function userRemoveAddress($id){
        $user_id = Auth::id();
        // Find the id and user_id(onCascade that is why user_id is needed) to delete address
        $shippingAddress = ShippingAddress::where('id', $id)->where('user_id', $user_id)->delete();
        if(!$shippingAddress){
            return redirect()->route('user.ShowAddress')->with('error', 'Unauthorized access to this address.');
        }
        return redirect()->back()->with('message', 'Address has been deleted successfully');
    }
}
