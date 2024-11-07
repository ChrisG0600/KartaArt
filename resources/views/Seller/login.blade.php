<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')

    <x-message />
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full md:w-1/2 lg:w-1/3 overflow-hidden mx-auto my-20">
        <div class="w-full py-10 px-5 md:px-10 mx-auto">
            <div class="text-center mb-10">
                <h1 class="font-bold text-4xl text-gray-900">Seller Login</h1>
                <p class="text-lg text-gray-700 mt-4">Enter the community and start selling your amazing artworks today.</p>
            </div>
            <form method="POST" action="/seller/login" >
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="email" class="text-sm font-semibold block mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-email-outline text-lg"></i>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="johnsmith@example.com">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="text-sm font-semibold block mb-2">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                <i class="mdi mdi-lock-outline text-lg"></i>
                            </span>
                            <input type="password" id="password" name="password" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="************">
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="block w-full bg-orange-400 hover:bg-orange-500 text-white rounded-lg px-4 py-3 font-semibold">Login</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="block w-full h-0.5 bg-gray-300"></span>
                        <span class="px-4 text-gray-700">OR</span>
                        <span class="block w-full h-0.5 bg-gray-300"></span>
                    </div>
                    <div>
                        <a href="/seller/register" class="block text-center w-full bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-3 font-semibold">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
    
    @include('partials.__seller-footer')
</body>
</html>