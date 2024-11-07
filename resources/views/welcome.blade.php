<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <html lang="en">
        @include('header')
        <!-- Navbar -->
        
    <body>
        @include('partials.__navbar')

        <div class="container mx-auto my-20">
            <h1 class="text-3xl font-bold mb-4">Search for artworks</h1>
            
            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" placeholder="Search artworks..." class="w-full p-2 border rounded-xl">
            </div>
            <div class="border-b-2 border-black my-10">
                <h1 class="text-3xl font-bold mb-4">Artwork for Sale</h1>
            </div>
            <div class="grid grid-cols-1 gap-4 px-3 py-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Artwork 2 This is final format -->
                <div class="relative">
                    <img src="{{asset('images/artFirst.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <p>Medium: Oil</p>
                        <p>Canvas Size: 25 x 25 x 25</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artSecond.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artFirst.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artFirst.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artSecond.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artFirst.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artSecond.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>
                <!-- Artwork 2 -->
                <div class="relative">
                    <img src="{{asset('images/artSecond.jpg')}}" alt="Artwork 2" class="w-full h-full object-cover rounded">
                    <div class="overlay opacity-0 hover:opacity-100 rounded bg-gray-800 text-white absolute inset-0 flex flex-col justify-center items-center transition-opacity duration-300">
                        <h3 class="font-bold">Art Name: Doods</h3>
                        <p>Artist Name: Ugald</p>
                        <a href="#" class="mt-2 px-4 py-2 bg-orange-400 hover:bg-orange-500 rounded">View Details</a>
                    </div>
                </div>

            </div>
        </div>
        
        @include('partials.__footer')
    </body>
</html>
