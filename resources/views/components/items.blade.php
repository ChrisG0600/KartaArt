<div class="container mx-auto flex justify-between items-center p-4">
    <!-- Logo -->
    <a href="/" class="h-10">
        <img src="{{ asset('images/KartaArt-removebg-preview.png') }}" alt="Logo" class="h-full w-auto">
    </a>
    <!-- Links (hidden on mobile) -->
    <div class="hidden md:flex space-x-6 items-center">
        <a href="{{ route('home') }}" class="relative text-black hover:text-gray-500 transition duration-300 ease-in-out px-4 py-2 group">
            Home
            <span class="absolute inset-0 border border-black scale-0 group-hover:scale-100 transition-transform duration-300 ease-in-out origin-center"></span>
        </a>
        <a href="{{ route('index') }}" class="relative text-black hover:text-gray-500 transition duration-300 ease-in-out px-4 py-2 group">
            Artworks
            <span class="absolute inset-0 border border-black scale-0 group-hover:scale-100 transition-transform duration-300 ease-in-out origin-center"></span>
        </a>
        <a href="/user/artist" class="relative text-black hover:text-gray-500 transition duration-300 ease-in-out px-4 py-2 group">
            Artist
            <span class="absolute inset-0 border border-black scale-0 group-hover:scale-100 transition-transform duration-300 ease-in-out origin-center"></span>
        </a>
        <a href="/seller" class="relative text-black hover:text-gray-500 transition duration-300 ease-in-out px-4 py-2 group">
            Be a Seller
            <span class="absolute inset-0 border border-black scale-0 group-hover:scale-100 transition-transform duration-300 ease-in-out origin-center"></span>
        </a>
    </div>
    <!-- Authentication Links -->
    @auth
        <div class="hidden md:flex space-x-2 items-center">
            <a href="/user/myaccount/profile" class="flex items-center px-4 py-2 hover:text-gray-500">
                <i class="fa-solid fa-user mr-1"></i> Profile
            </a>
            <a href="/user/cart" class="flex items-center px-4 py-2 hover:text-gray-500">
                <i class="fa-solid fa-cart-shopping mr-1"></i> My Cart: <span class="text-red-600 text-lg">{{ $cartCount ?? 0 }}</span>
            </a>
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="rounded bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Log Out</button>
            </form>
        </div>
    @else
        <div class="hidden md:flex space-x-2">
            <a href="/login" class="rounded underline px-4 py-2 hover:no-underline text-black transition duration-300">Log In</a>
            <a href="/register" class="rounded bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Register</a>
        </div>
    @endauth
    <!-- Hamburger Menu (visible on mobile) -->
    <div class="md:hidden">
        <button id="menu-btn" class="text-black focus:outline-none" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
</div>
<!-- Mobile Menu (hidden by default) -->
<div id="mobile-menu" class="hidden md:hidden transition-all duration-300 ease-in-out mt-3">
    <a href="{{ route('home') }}" class="block text-black py-2 px-4 hover:text-gray-500">Home</a>
    <a href="{{ route('index') }}" class="block text-black py-2 px-4 hover:text-gray-500">Artworks</a>
    <a href="/user/artist" class="block text-black py-2 px-4 hover:text-gray-500">Artist</a>
    <a href="/seller" class="block text-black py-2 px-4 hover:text-gray-500">Be a Seller</a>
    @auth
        <a href="/user/myaccount/profile" class="block text-black py-2 px-4 hover:text-gray-500">
            <i class="fa-solid fa-user"></i> Profile
        </a>
        <a href="/user/cart" class="block text-black py-2 px-4 hover:text-gray-500">
            <i class="fa-solid fa-cart-shopping"></i> My Cart: <span class="text-red-600 text-lg">{{ $cartCount ?? 0 }}</span>
        </a>
        <form action="/logout" method="POST" class="px-4 my-3">
            @csrf
            <button type="submit" class="block bg-orange-500 text-white rounded w-full py-2 px-4 hover:bg-orange-600">Log Out</button>
        </form>
    @else
        <a href="/login" class="block text-black underline py-2 px-4 hover:no-underline">Log In</a>
        <div class="px-4 mb-3">
            <a href="/register" class="block bg-orange-500 text-white rounded w-full py-2 px-4 hover:bg-orange-600">Register</a>
        </div>
    @endauth
</div>