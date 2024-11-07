<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    <!-- Navbar -->
    @include('partials.__navbar')
    <x-message />
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-20">
        <div class="container mx-auto px-5">
            <div class="bg-white rounded-lg shadow-lg p-10 text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-5">Thank You!</h2>
                <p class="text-lg text-gray-700 mb-5">Your order has been placed successfully.</p>
                <p class="text-md text-gray-600 mb-10">You will receive an email confirmation shortly with the order details.</p>
                <a href="{{ route('index') }}" class="bg-orange-500 hover:bg-gray-300 hover:text-gray-900 transition duration-300 text-white font-semibold rounded-lg px-6 py-3">Continue Shopping</a>
            </div>
        </div>
    </div>
    @include('partials.__footer')
</body>

</html>
