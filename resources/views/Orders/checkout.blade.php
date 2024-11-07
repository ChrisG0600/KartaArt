<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    <!-- Navbar -->
    @include('partials.__navbar')
    <x-message />


    <div class="min-h-screen bg-gray-100 py-36">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Order Summary -->
                    <div class="p-5 bg-white rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-5">Order Summary</h3>
                        @foreach ($order_items as $items )
                            <div class="mb-5 space-y-3">
                                <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg">
                                    <div class="flex items-center">
                                        <img src="{{ asset('artworks/' . $items->image) }}" alt="{{ $items->title }}" class="w-16 h-16 object-cover rounded-lg mr-3">
                                        <div>
                                            <h5 class="text-lg font-bold text-gray-900">{{ $items->title}}</h5>
                                            <p class="text-gray-700 text-sm">&#36; {{ $items->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="border-t pt-5">
                            <div class="flex justify-between">
                                <p class="text-gray-700">Subtotal</p>
                                <p class="text-gray-700">&#36; {{$price}}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700">Shipping</p>
                                <p class="text-gray-700">&#36; 10.99</p>
                            </div>
                            <div class="flex justify-between font-bold text-gray-900 mt-3">
                                <p>Total</p>
                                <p>&#36; {{ $price + 10.99}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Form -->
                    <div class="p-5 bg-white rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-5">Billing Details</h3>
                        <form action="/checkout/processing" method="POST" class="space-y-10">
                            @csrf
                            <!-- Address Selection -->
                            <h4 class="text-xl font-bold text-gray-700 mb-3">Select Shipping Address</h4>
                            <div class="space-y-3">
                                @foreach ($addressData as $address)
                                    <label class="flex items-start bg-gray-50 p-3 rounded-lg border cursor-pointer hover:bg-gray-100">
                                        <input type="radio" name="shipping_address" value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }} class="mt-1">
                                        <div class="ml-3">
                                            <p class="font-bold text-gray-800">{{ $address->full_name }}</p>
                                            <p class="text-gray-600">{{ $address->house_no }} {{ $address->street }}, {{ $address->barangay }}</p>
                                            <p class="text-gray-600">{{ $address->city }}, {{ $address->country }}, {{ $address->postal_code }}</p>
                                            @if ($address->is_default)
                                                <p class="mt-2 text-sm font-bold text-orange-600" >Default</p>
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            <!-- Other Billing Details -->
                            <div class="mt-6">
                                <label for="payment" class="block text-gray-700">Payment Method</label>
                                <select id="payment" name="payment" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500">
                                    <option value="" hidden>Choose Payment</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="gcash">Gcash</option>
                                    <option value="maya">Maya</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="cod">Cash On Delivery</option>
                                </select>
                            </div>
                            <div class="mt-6 text-right">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 transition duration-300 text-white font-semibold rounded-lg px-6 py-3">Complete Purchase</button>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>


    @include('partials.__footer')
</body>
</html>
