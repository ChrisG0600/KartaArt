<footer class="border-t-2 border-black shadow-lg px-4 py-4">
    <section class="container mx-auto py-4 text-center flex flex-col md:flex-row items-center md:items-start">
        <div class="flex-1 mb-4 md:mb-0 flex justify-center md:justify-start">
            <img src="{{ asset('images/KartaArt-removebg-preview.png') }}" alt="Logo" class="h-10 w-auto md:h10">
        </div>
        
        <div class="flex-1 mb-4 md:mb-0 text-center md:text-left">
            <h5 class="font-bold text-xl">Navigations</h5>
            <div class="flex flex-col">
                <a href="{{ route('index') }}" class="relative text-black hover:text-gray-400 px-4 py-2">
                    Artworks
                </a>
                <a href="{{ route('userArtistShow') }}" class="relative text-black hover:text-gray-400 px-4 py-2">
                    Artist
                </a>
                <a href="{{ route('sellerIndex') }}" class="relative text-black hover:text-gray-400 px-4 py-2">
                    Be a Seller
                </a>
            </div>
        </div>
    
        <div class="flex-1 text-center md:text-left">
            <h5 class="font-bold text-xl">Helpful Links</h5>
            <div class="flex flex-col">
                <a href="{{ route('about') }}" class="relative text-black hover:text-gray-400 px-4 py-2">
                    About
                </a>
                <a href="{{ route('contactUs') }}" class="relative text-black hover:text-gray-400 px-4 py-2">
                    Contact Us
                </a>
            </div>
        </div>

        <div class="flex-1 text-center md:text-left">
            <h5 class="font-bold text-xl">Social Accounts</h5>
            <div class="flex flex-col gap-4 text-xl">
                <a href="" class="hover:text-blue-500"><i class="fa-brands fa-facebook"></i> Facebook</a>
                <a href="" class="hover:text-pink-500"><i class="fa-brands fa-instagram"></i> Instagram</a>
                <a href="" class="hover:text-red-500"><i class="fa-solid fa-envelope"></i> Email</a>
            </div>
        </div>
    </section>
    <div class="mx-auto">
        <p class="text-center text-gray-500 text-md">Copyright &#169; 2024 KartaArt</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@vite(['resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
