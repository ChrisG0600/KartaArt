<!DOCTYPE html>
<html lang="en">
    @include('header')
    <body>
        <!-- Navbar -->
        @include('partials.__navbar')
        <x-message />
        <div class="min-h-screen flex flex-col">
            <!-- My Cart Title -->
            <div class="mt-20 container mx-auto max-w-5xl px-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900">My Cart</h2>
            </div>
            <div class="flex-grow container mx-auto max-w-5xl mb-10 px-6">
                @if(count($checkout) > 0)
                    <div class="md:flex md:space-x-6">
                        <div class="rounded-lg md:w-2/3">
                            @foreach ($checkout as $item)
                                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                    <img src="{{ asset('artworks/' . $item->image) }}" alt="{{ $item->title }}" class="w-full rounded-lg sm:w-40" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="mt-5 sm:mt-0">
                                            <h2 class="text-lg font-bold text-gray-900">{{ $item->title }}</h2>
                                            <p class="mt-12 text-xs text-gray-700">Amount</p>
                                            <p class="mt-0.5 text-md text-gray-700">&#36; {{ $item->price }}</p>
                                        </div>
                                        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                            <form action="/user/checkout/remove/{{ $item->id }}" method="POST">
                                                @csrf
                                                <div class="flex items-center space-x-4">
                                                    <button type="submit" class="text-sm text-red-500"><i class="fa-regular fa-trash-can"></i> Remove</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Sub total -->
                        <div class="mt-6 h-44 rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                            <div class="flex justify-between">
                                <p class="text-lg font-bold">Total: ({{ count ($checkout)}} Items) </p>
                                <div class="">
                                    <p class="mb-1 text-lg">&#36; {{ $price}}</p>
                                    <p class="text-sm text-gray-700">including VAT</p>
                                </div>
                            </div>
                            <div class="flex justify-end items-end mt-4">
                                <a href="{{ route('order.Checkout')}}" class="rounded-md bg-blue-500 py-2 px-5 font-medium text-blue-50 hover:bg-blue-600">Check out</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex justify-center items-center h-full">
                        <div class="text-center bg-white p-10 mb-10 rounded-lg shadow-xl">
                            <h5 class="text-lg text-black">
                                Currently you have an empty cart, check out the deals <a href="{{ route('index')}}" class="text-blue-500 underline hover:no-underline hover:text-blue-400"> Here</a>.
                            </h5>
                        </div>
                    </div>
                @endif
            </div>
            @include('partials.__footer')
        </div>
    </body>
</html>
