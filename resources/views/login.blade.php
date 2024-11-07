<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')

    <x-message />
    {{-- Forms Register --}}
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">Login</h1>
                            <p>Enter your account to login</p>
                        </div>
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Username</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-orange-400 text-lg"></i></div>
                                        <input type="text" name="username" value="{{ old('username')}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="username123">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-orange-400 text-lg"></i></div>
                                        <input type="password" name="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="************">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button type="submit" class="block w-full max-w-xs mx-auto bg-orange-400 hover:bg-orange-500 focus:bg-orange-500 text-white rounded-lg px-3 py-3 font-semibold">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <div class="flex items-center justify-between w-full">
                                    <div class="h-0.5 w-full bg-gray-900"></div>
                                    <span class="px-4 text-gray-900">OR</span>
                                    <div class="h-0.5 w-full bg-gray-900"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <a href="/register" class="block text-center w-full max-w-xs mx-auto bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-3 font-semibold">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hidden md:block w-1/2 bg-indigo-500">
                    <img src="{{asset('images/steel_sky.jpg')}}" class="w-full h-full object-cover" alt="Image_Register">
                </div>
            </div>
        </div>
    </div>

    @include('partials.__footer')

</body>
</html>