<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')

    <div class="flex-grow">
        <div class="w-full mx-auto px-5 py-10 container bg-gray-700">
            <h5 class="text-white">Artworks</h5>
        </div>
        <div class="shadow-lg container mx-auto flex flex-col md:flex-row gap-4 py-5">
            <x-seller-navs />
            
            <!-- Right Column: Content -->
            <div class="w-full md:w-3/4 mx-auto px-5 py-5">
                <div class="text-center mb-5">
                    <p class="text-lg font-semibold text-gray-700">Manage Your Artworks</p>
                </div>
                <div class="flex justify-center gap-5">
                    <div class="text-center w-1/2">
                        <a href="{{ route('sellerArtworkList')}}" class="block bg-gray-400 text-white px-4 py-4 rounded-lg font-semibold hover:bg-gray-500 transition duration-300">
                            See the list of your submitted artworks
                        </a>
                    </div>
                    <div class="text-center w-1/2">
                        <a href="{{ route('sellerShowArtworksForm')}}" class="block bg-orange-400 text-white px-4 py-4 rounded-lg font-semibold hover:bg-orange-500 transition duration-300">
                            Submit your artworks to put on sale
                        </a>
                    </div>
                </div>
            </div>            
        </div>        
    </div>


    @include('partials.__seller-footer')

</body>
</html>

