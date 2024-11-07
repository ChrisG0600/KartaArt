<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')

    <x-message />

    <div class="flex-grow">
        <div class="w-full mx-auto px-5 py-10 container bg-gray-700">
            <h5 class="text-white">Profile</h5>
        </div>
        <div class="shadow-lg container mx-auto flex flex-col md:flex-row gap-4 py-5">

            <x-seller-navs />
            
            <!-- Right Column: Content -->
            <div class="w-full md:w-3/4 px-5 py-5">
                <form method="POST" action="/seller/profile/{{ $seller->id }}/update">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div class="flex -m-3">
                            <h5>Update Account</h5>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-2">
                                <label for="artist_name" class="text-sm font-semibold block mb-2">Artist Name</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-account-outline text-lg"></i>
                                    </span>
                                    <input type="text" id="artist_name" name="artist_name" value="{{ $seller->artist_name }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="Uleder">
                                </div>
                            </div>      
                            <div class="w-1/2 px-3 mb-2">
                                <label for="username" class="text-sm font-semibold block mb-2">Username</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-account-outline text-lg"></i>
                                    </span>
                                    <input type="text" id="username" name="username" value="{{ $seller->username }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="username123">
                                </div>
                            </div>
                        </div>
                        <div class="flex -m-3">
                            <div class="w-full px-3 mb-2">
                                <label for="email" class="text-sm font-semibold block mb-2">Email</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-email-outline text-lg"></i>
                                    </span>
                                    <input type="email" id="email" name="email" value="{{ $seller->email }}" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="johnsmith@example.com">
                                </div>
                            </div>
                        </div>

                        <div class="flex -m-3">
                            <h5>Update Password</h5>
                        </div>

                        <div class="flex -m-3">
                            <div class="w-full px-3 mb-2">
                                <label for="current_password" class="text-sm font-semibold block mb-2">Current Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-lock-outline text-orange-400 text-lg"></i>
                                    </span>
                                    <input type="password" id="current_password" name="current_password" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="********">
                                </div>
                            </div>
                        </div>
                        <div class="flex -m-3">
                            <div class="w-1/2 px-3 mb-2">
                                <label for="password" class="text-sm font-semibold block mb-2">Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-lock-outline text-orange-400 text-lg"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="********">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-2">
                                <label for="password_confirmation" class="text-sm font-semibold block mb-2">Confirm Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
                                        <i class="mdi mdi-lock-outline text-orange-400 text-lg"></i>
                                    </span>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="********">
                                </div>
                            </div>
                        </div>
                        <!-- Edit Button -->
                        <div>
                            <button type="submit" class="block w-1/2 ml-auto bg-orange-400 hover:bg-orange-500 text-white rounded-lg px-4 py-3 font-semibold">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>





    @include('partials.__seller-footer')
</body>
</html>