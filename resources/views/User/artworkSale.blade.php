<!DOCTYPE html>
<html lang="en">
    @include('header')
    <body>
        <!-- Navbar -->
        @include('partials.__navbar')
        <x-message />
        <div class="container mx-auto my-20">
            <div class="border-b-2 border-black my-10 px-3 ">
                <h1 class="text-3xl font-bold mb-4">Artwork for Sale</h1>
            </div>
            <div class="grid grid-cols-1 gap-4 px-3 py-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Artwork 2 This is final format -->
                @if($artworks->isEmpty())
                    <p class="text-black">No artworks for sale.</p>
                @else
                    @foreach ($artworks as $artwork)
                        <div class="relative">
                            <div class="border rounded-lg p-4 shadow-md flex flex-col justify-between h-full">
                                <img src="{{ asset('artworks/' . $artwork->image) }}" alt="{{ $artwork->artwork_title }}" class="mb-3 w-full h-48 object-contain">
                                <h2 class="text-xl font-semibold">{{ $artwork->artwork_title }}</h2>
                                <p class="flex-grow">{{ $artwork->artwork_description }}</p>
                                <div class="flex mt-5 gap-3">
                                    <a href="/user/artworks/{{ $artwork->id}}" class="text-white bg-orange-500 px-5 py-2 rounded-lg hover:bg-orange-400">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @include('partials.__footer')
    </body>
</html>
