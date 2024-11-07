<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')

    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full md:w-1/2 lg:w-1/3 overflow-hidden mx-auto my-20">
        <div class="w-full py-10 px-5 md:px-10 mx-auto">
            <div class="text-center mb-10">
                <h1 class="font-bold text-4xl text-gray-900">Sell your artwork</h1>
                <p class="text-lg text-gray-700 mt-4">Showcase your artwork to the world.<br/> Fill out the form to submit your art for sale.</p>
            </div>
            <form method="POST" action="/seller/artworks/artworksForm" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <!-- Artist Name (FK) -->
                    <div>
                        <label for="artist_name" class="text-sm font-semibold block mb-2">Artist Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-account-outline text-lg"></i>
                            </span>
                            <input type="text" id="artist_name" name="artist_name" value="{{ $seller->artist_name }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" readonly>
                        </div>
                    </div>

                    <!-- Artwork Name -->
                    <div>
                        <label for="artwork_title" class="text-sm font-semibold block mb-2">Artwork Title</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-palette-outline text-lg"></i>
                            </span>
                            <input type="text" id="artwork_title" name="artwork_title" value="{{ old('artwork_title') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="Enter artwork title">
                        </div>
                        @error('artwork_title')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <!-- Artwork Description -->
                    <div>
                        <label for="artwork_description" class="text-sm font-semibold block mb-2">Artwork Description</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-palette-outline text-lg"></i>
                            </span>
                            <input type="text" id="artwork_description" name="artwork_description" value="{{ old('artwork_description') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="Enter artwork description">
                        </div>
                        @error('artwork_description')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
            
                    <!-- Artwork Medium -->
                    <div>
                        <label for="artwork_medium" class="text-sm font-semibold block mb-2">Artwork Medium</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="fa-solid fa-palette"></i>
                            </span>
                            <input type="text" id="artwork_medium" name="artwork_medium" value="{{ old('artwork_medium') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="e.g. Oil on canvas, Watercolor">
                        </div>
                        @error('artwork_medium')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror                        
                    </div>

                    <!-- Artwork Size -->
                    <div>
                        <label for="artwork_size" class="text-sm font-semibold block mb-2">Canvas Size</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="fa-solid fa-ruler-combined"></i>                            </span>
                            <input type="text" id="artwork_size" name="artwork_size" value="{{ old('artwork_size') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="e.g. 24x36 inches">
                        </div>
                        @error('artwork_size')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror                        
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="artwork_price" class="text-sm font-semibold block mb-2">Price ($)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-currency-usd text-lg"></i>
                            </span>
                            <input type="integer" id="artwork_price" name="artwork_price" value="{{ old('artwork_price') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="Enter price">
                        </div>
                        @error('artwork_price')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror                        
                    </div>


                    <!-- Artwork Image -->
                    <div>
                        <label for="image" class="text-sm font-semibold block mb-2">Artwork Image</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-image-outline text-lg"></i>
                            </span>
                            <input type="file" id="image" name="image" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" accept="image/*">
                        </div>
                        @error('image')
                            <p class="text-red-600 text-xs">
                                {{$message}}
                            </p>
                        @enderror                        
                    </div>

                    <!-- For Sale Checkbox -->
                    <div>
                        <label for="for_sale" class="text-sm font-semibold block mb-2">For Sale</label>
                        <div class="relative">
                            <input type="checkbox" id="for_sale" name="for_sale" value="1" class="mr-2">
                            <span>Check this box if you want to sell this artwork</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-orange-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">
                            Submit Artwork
                        </button>
                    </div>                    
                </div>
            </form>
        </div>
    </div>

    @include('partials.__seller-footer')

</body>
</html>