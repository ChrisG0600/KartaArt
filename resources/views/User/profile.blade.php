<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    <!-- Navbar -->
    @include('partials.__navbar')
    <x-message />
    <div class="min-h-screen bg-gray-100 py-20">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Sidebar -->
                <div class="p-5 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center mb-5">
                        <img src="{{ asset('images/No_Picture.png' )}}" alt="Profile Picture" class="rounded-full object-cover h-20 w-20">
                        <h5 class="text-gray-700 ml-4 text-lg font-semibold">{{ $userData->username}}</h5>
                    </div>
                    <div class="text-start px-5 py-5">
                        <h5 class="text-black text-xl font-bold">
                            <i class="fa-solid fa-user"></i> 
                            My Account
                        </h5>
                        <x-side-items />
                    </div>
                </div>
                <!-- Main Content -->
                <div class="col-span-1 lg:col-span-3 p-5 bg-white rounded-lg shadow-lg">
                    {{-- Header --}}
                    <div class="px-5 lg:px-10 py-3 mb-5">
                        <h5 class="text-2xl font-bold text-gray-900">Edit Profile</h5>
                        <p class="text-gray-600 mb-5">Manage and protect your account</p>
                        <hr>
                    </div>
                    {{-- Content --}}
                    <div class="px-5 lg:px-10 py-3 space-y-5">
                        <form action="/user/myaccount/profile/{{ $userData->id }}/update" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <label class="text-right font-semibold text-gray-700">Username:</label>
                                <p class="col-span-2">{{ $userData->username }}</p>

                                <label for="first_name" class="text-right font-semibold text-gray-700 pt-3">First Name:</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $userData->first_name }}" class="col-span-2 w-full px-4 py-2 border-2 border-gray-200 rounded-lg outline-none focus:border-orange-500">

                                <label for="last_name" class="text-right font-semibold text-gray-700 pt-3">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $userData->last_name }}" class="col-span-2 w-full px-4 py-2 border-2 border-gray-200 rounded-lg outline-none focus:border-orange-500">

                                <label for="email" class="text-right font-semibold text-gray-700 pt-3">Email:</label>
                                <input type="email" id="email" name="email" value="{{ $userData->email }}" class="col-span-2 w-full px-4 py-2 border-2 border-gray-200 rounded-lg outline-none focus:border-orange-500">
                            </div>
                            <div class="mt-6 text-right">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 transition duration-300 text-white font-semibold rounded-lg px-6 py-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.__footer')
</body>

</html>
