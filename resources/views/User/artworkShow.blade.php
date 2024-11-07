<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')
    
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4" id="artwork-title">{{$artworks->artwork_title}}</h1>
            <img src="{{ asset('artworks/' . $artworks->image) }}" alt="{{$artworks->artwork_title}}" class="w-full h-auto mb-4 rounded-lg">

            <div class="mb-4">
                <h2 class="text-3xl font-semibold">Description</h2>
                <p id="artwork-description" class="text-gray-700 text-xl">{{$artworks->artwork_description}}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-3xl font-semibold">Details</h2>
                <ul class="list-none pl-5 text-xl">
                    <li>Medium: <span id="artwork-medium">{{$artworks->artwork_medium}}</span></li>
                    <li>Size: <span id="artwork-size">{{$artworks->artwork_size}}</span></li>
                    <li>Price:  <span id="artwork-price">&#36;{{$artworks->artwork_price}}</span></li>
                    <li>Created By: <span id="artist-name" class=" font-bold">{{$artworks->seller->artist_name}}</span></li>
                </ul>
            </div>

            <div class="mt-6">
                @auth
                    <a href="/user/add/order/{{ $artworks->id }}" class="block w-32 text-center bg-blue-500 hover:bg-blue-400 text-white rounded-lg px-4 py-3 font-semibold">
                        Buy Now
                    </a>
                @else
                    <a href="#" class="block w-32 text-center pointer-events-none bg-blue-200 text-white cursor-not-allowed rounded-lg px-4 py-3 font-semibold">
                        Buy Now
                    </a>
                    <p class="px-2 py-2 text-sm text-red-400"><a href="/login" class="underline hover:no-underline">Log In</a> to buy this artwork</p>                 
                @endauth
            </div>
        </div>
    </div>

    @include('partials.__footer')

</body>
</html>