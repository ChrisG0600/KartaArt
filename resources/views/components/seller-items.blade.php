<div class="container mx-auto flex justify-between items-center">
    @guest('seller')
        <a href="/" class="rounded text-xl  px-4 py-2 text-black transition duration-300">Go to Buyers</a>        
    @endguest

    <div class="hidden md:flex space-x-6 ml-auto">
        @auth('seller') 
            <a href="/seller/dashboard" class="px-4 py-2 hover:text-gray-400"> <i class="fa-solid fa-house"></i> Dashboard</a>
            <a href="/seller/manage" class="px-4 py-2 hover:text-gray-400"><i class="fa-solid fa-box"></i> Orders</a>
            <a href="/seller/profile" class="px-4 py-2 hover:text-gray-400"> <i class="fa-solid fa-user"></i> Profile</a>
            <form action="/seller/logout" method="POST">
                @csrf
                <button type="submit" class="rounded text-xl bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Log Out</button>
            </form>
            
        @endauth
        
        @guest('seller')
            <a href="/seller/login" class="rounded text-xl underline px-4 py-2 hover:no-underline text-black transition duration-300">Log In</a>
            <a href="/seller/register" class="rounded text-xl bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Register</a>
        @endguest
        
    </div>

    <!-- Hamburger Menu (visible on mobile) -->
    <div class="ml-auto md:hidden">
        <button id="menu-btn" class="text-black focus:outline-none" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        </button>
    </div>
</div>

<!-- Mobile Menu (hidden by default) -->
<div id="mobile-menu" class="hidden md:hidden transition-all duration-300 ease-in-out">

    @auth('seller')
        <a href="/seller/dashboard" class="px-4 py-2 hover:text-gray-400"> <i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="/seller/manage" class="px-4 py-2 hover:text-gray-400"><i class="fa-solid fa-box"></i> Orders</a>
        <a href="/seller/profile" class="px-4 py-2 hover:text-gray-400"> <i class="fa-solid fa-user"></i> Profile</a>
        <form action="/seller/logout" method="POST">
            @csrf
            <button type="submit" class="rounded text-xl bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Log Out</button>
        </form>
    @endauth
    
    @guest('seller')
    <div class="px-4 my-3">
        <a href="/seller/login" class="block rounded text-xl underline w-28 px-1 py-2 hover:no-underline text-black transition duration-300">Log In</a>
    </div>
    <div class="px-4 my-3">
        <a href="/seller/register" class="block rounded text-xl w-28 bg-orange-400 px-4 py-2 hover:bg-orange-500 text-white transition duration-300">Register</a>
    </div>
        
    @endguest

</div>