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
                <div class="min-h-auto p-5 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center mb-5">
                        <img src="{{ asset('images/No_Picture.png' )}}" alt="Profile Picture" class="rounded-full object-cover h-20 w-20">
                            <h5 class="text-gray-700 ml-4 text-lg font-semibold">{{$userData->username}}</h5>
                    </div>
                    <div class="text-start px-5 py-5">
                        <h5 class="text-black text-xl font-bold">
                            <i class="fa-solid fa-user"></i> My Account
                        </h5>
                        <x-side-items />
                    </div>
                </div>
                <!-- Main Content -->
                <div class="col-span-2 bg-white rounded-lg shadow-lg p-5">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl font-bold text-gray-700">Manage Addresses</h2>
                        <a href="{{ route('user.AddAddressForm')}}" class="px-4 py-2 bg-green-500 text-white font-medium rounded hover:bg-green-700">Add Address</a>
                    </div>
                    <div class="mb-5">
                        <h3 class="text-xl font-semibold text-gray-700">Your Addresses</h3>
                        <ul class="mt-3 space-y-3">
                            <!-- Example Address Item -->
                            @foreach ($addressData as $addressField)
                                <li class="bg-gray-100 p-4 rounded-lg shadow">
                                    <div class="md:flex justify-between items-center space-y-2 md:space-y-0">
                                        <div class="md:w-3/4">
                                            <p class="text-lg font-medium text-gray-700">{{ $addressField->house_no }} {{ $addressField->street }}, {{ $addressField->barangay }}</p>
                                            <p class="text-sm text-gray-600">{{ $addressField->city }}, {{ $addressField->country }}, {{ $addressField->postal_code }}</p>
                                            <!-- Is Default -->
                                            @if ($addressField->is_default)
                                                <p class="mt-2 text-sm font-bold text-orange-600">Default</p>
                                            @endif
                                        </div>
                                        <div class="flex space-x-2 md:w-1/4 md:justify-end">
                                            <a href="{{ route('user.EditAddress', $addressField->id )}}" class="px-3 py-1 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-700">Edit</a>
                                            
                                            <form method="POST" action="{{ route('user.RemoveAddress', $addressField->id )}}">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <!-- More addresses... -->
                        </ul>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    
    
    
    
    
    



    @include('partials.__footer')

</body>
</html>