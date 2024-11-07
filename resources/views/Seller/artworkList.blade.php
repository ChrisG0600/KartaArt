<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')

    <x-message />
    <div class="flex-grow">
        <div class="w-full mx-auto px-5 py-10 container bg-gray-700">
            <h5 class="text-white">List of Artworks</h5>
        </div>
        <div class="shadow-lg container mx-auto flex flex-col md:flex-row gap-4 py-5">
            <x-seller-navs />
            <!-- Right Column: Content -->
            <div class="w-full md:w-3/4 mx-auto px-5 py-5">
                <div class="mb-5">
                    <p class="text-lg font-semibold text-gray-700">List of your submitted Artworks</p>
                </div>
                <div class="flex gap-5">
                        <!-- List of Artworks -->
                        @if($artworks->isEmpty())
                        <p class="text-gray-600">No artworks found.</p>
                        @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($artworks as $artwork)
                                <div class="border rounded-lg p-4 shadow-md">
                                    <img src="{{ asset('artworks/' . $artwork->image) }}" alt="{{ $artwork->artwork_title }}" class="mb-3 w-full h-48 object-cover">
                                    <h2 class="text-xl font-semibold">{{ $artwork->artwork_title }}</h2>
                                    <p>{{ $artwork->artwork_description }}</p>
                                    <p class="mt-2"><strong>Medium:</strong> {{ $artwork->artwork_medium }}</p>
                                    <p><strong>Size:</strong> {{ $artwork->artwork_size }}</p>
                                    <p><strong>Price:</strong> ${{ $artwork->artwork_price }}</p>
                                    <div class="flex gap-3">
                                        <a href="/seller/artworks/{{ $artwork->id}}/edit" class="text-white bg-gray-500 px-5 py-2 rounded-lg hover:bg-gray-400">Edit</a>
                                        <form action="/seller/artworks/{{ $artwork->id}}/delete" method="POST">
                                            @csrf
                                            <button class="text-white bg-red-700 px-5 py-2 rounded-lg hover:bg-red-400">Delete</button>
                                        </form>                                    
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                </div>
            </div>            
        </div>        
    </div>


    @include('partials.__seller-footer')

</body>
</html>

