<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')
    
    <x-message />
    <div class="py-20 mx-auto bg-orange-400 text-white text-center">
        <h5 class="text-3xl">Welcome Seller on the #1 Selling platforms for all of your Artworks.</h5>
    </div>
    
    <div class="bg-white py-20 mx-auto text-center">
        <h5 class="text-2xl mb-4">Sign Up now to sell your masterpiece of artworks.</h5>
        <a href="{{ route('sellerRegister')}}" class="bg-orange-300 hover:bg-orange-500 text-white py-3 px-6 rounded-lg">Sign Up Now</a>
    </div>
    
    <div class="py-20 mx-auto bg-gray-300 text-center text-black">
        <h5 class="text-black text-bold flex items-center justify-center text-3xl mb-8">Join Our Community of Artists, Reach a Global Audience!</h5>
        <h5 class="text-black text-bold flex items-center justify-center text-3xl">"Art is not what you see, but what you make others see." - Degas</h5>
    </div>
    
    <div class="bg-white py-20 mx-auto text-center">
        <h5 class="text-3xl font-bold mb-8">How It Works</h5>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-5 md:px-20">
            <div>
                <div class="bg-orange-400 text-white p-6 rounded-lg shadow-lg">
                    <h6 class="text-2xl font-bold mb-2">Step 1: Sign Up</h6>
                    <p>Register and create your seller profile.</p>
                </div>
            </div>
            <div>
                <div class="bg-orange-400 text-white p-6 rounded-lg shadow-lg">
                    <h6 class="text-2xl font-bold mb-2">Step 2: Upload Art</h6>
                    <p>Submit your artworks and manage your listings.</p>
                </div>
            </div>
            <div>
                <div class="bg-orange-400 text-white p-6 rounded-lg shadow-lg">
                    <h6 class="text-2xl font-bold mb-2">Step 3: Start Selling</h6>
                    <p>Reach a global audience and sell your masterpieces.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-20 mx-auto bg-gray-300 text-center text-black">
        <h5 class="text-3xl font-bold mb-8">Top Sellers</h5>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-5 md:px-20">
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h6 class="text-2xl font-bold mb-2">Artist Name</h6>
                <p>Short bio and achievements.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h6 class="text-2xl font-bold mb-2">Artist Name</h6>
                <p>Short bio and achievements.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h6 class="text-2xl font-bold mb-2">Artist Name</h6>
                <p>Short bio and achievements.</p>
            </div>
        </div>
    </div>
    
    <div class="py-20 mx-auto bg-white text-center text-black">
        <h5 class="text-black text-bold text-3xl mb-8">Support for Sellers</h5>
        <p class="text-lg text-gray-700">We offer resources and support to help you succeed. Contact us anytime for assistance.</p>
    </div>
    
    
    
    

    @include('partials.__seller-footer')

</body>
</html>