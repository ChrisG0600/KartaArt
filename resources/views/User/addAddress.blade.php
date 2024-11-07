<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')

    <x-message />

    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-20">
        <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-gray-700 mb-5">Add New Address</h3>
            <form method="POST" action="/user/myaccount/address" class="space-y-6">
                @csrf
                <!-- Full Name and Phone Number in a Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    <!-- Full Name -->
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">Full Name</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="full-name" type="text" placeholder="Full Name" name="full_name">
                    </div>
                    <!-- Phone Number -->
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone-number">Phone Number</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="phone-number" type="text" placeholder="Phone Number" name="phone_number">
                    </div>
                </div>
                <!-- House No. and Street -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="house_no">House No.</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="house_no" type="text" placeholder="House No." name="house_no">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="street">Street</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="street" type="text" placeholder="Street" name="street">
                    </div>
                </div>
                <!-- Barangay -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="barangay">Barangay</label>
                    <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="barangay" type="text" placeholder="Barangay" name="barangay">
                </div>
                <!-- Country and City -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Country</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="country" type="text" placeholder="Country" name="country">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">City</label>
                        <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="city" type="text" placeholder="City" name="city">
                    </div>
                </div>
                <!-- Zip Code -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="postal_code">Zip Code</label>
                    <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="postal_code" type="text" placeholder="Postal Code" name="postal_code">
                </div>
                <!-- Default Address Checkbox -->
                <div class="mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500" name="is_default" value="1">
                        <span class="ml-2 text-gray-700">Set as default address</span>
                    </label>
                </div>
                <!-- Submit and Back Button -->
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('user.ShowAddress') }}" class="text-blue-500 hover:text-blue-700">Back to Addresses</a>
                    <button class="bg-orange-500 hover:bg-gray-100 hover:text-gray-500 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
    







    @include('partials.__footer')

</body>
</html>