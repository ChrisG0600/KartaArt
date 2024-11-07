<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')

    <x-message />

    <div class="min-h-screen bg-gray-100 py-20">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Sidebar -->
                <div class="p-5 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center mb-5">
                        <img src="{{ asset('images/No_Picture.png' )}}" alt="Profile Picture" class="rounded-full object-cover h-20 w-20">
                        <h5 class="text-gray-700 ml-4 text-lg font-semibold">{{ $userData->username}}</h5>
                    </div>
                    <div class="text-start px-5 py-5">
                        <h5 class="text-black text-xl font-bold">
                            <i class="fa-solid fa-user"></i> My Account
                        </h5>
                        <x-side-items />
                    </div>
                </div>
                <!-- Main Content -->
                <div class="col-span-2 bg-white rounded-lg shadow-lg p-5 flex items-center justify-center">
                    <div class="w-full max-w-md">
                        <h3 class="text-2xl font-bold text-gray-700 mb-5">Reset Password</h3>
                        <form method="POST" action="{{ route('user.UpdatePassword', $userData->id ) }}" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="current-password">Current Password</label>
                                <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="current-password" type="password" placeholder="Current Password" name="current_password" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="new-password">New Password</label>
                                <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="new-password" type="password" placeholder="New Password" name="password" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm New Password</label>
                                <input class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight rounded-lg focus:border-orange-500 focus:outline-none" id="confirm-password" type="password" placeholder="Confirm New Password" name="password_confirmation" required>
                            </div>
                            <div class="flex justify-end items-end pt-2">
                                <button class="bg-orange-500 hover:bg-gray-100 hover:text-gray-500 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline" type="submit">Reset Password</button>
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