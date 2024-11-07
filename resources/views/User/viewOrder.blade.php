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
                <div class="col-span-1 lg:col-span-3 p-5 bg-white rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold mb-5">Order List</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg shadow-md">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Order Invoice</th>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Item Name</th>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Image</th>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Status</th>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                        @foreach ($order->orderItems as $item)
                                            <tr class="border-b hover:bg-gray-100 transition duration-300">
                                                <td class="py-3 px-4">{{ $order->order_invoice }}</td>
                                                <td class="py-3 px-4">{{ $item->artwork->artwork_title }}</td>
                                                <td class="py-3 px-4">
                                                    <img src="{{ asset('artworks/' . $item->artwork->image) }}" alt="Artwork Image" class="rounded-full object-cover h-20 w-20">
                                                </td>
                                                <td class="py-3 px-4">
                                                    <span class="bg-green-500 text-white px-3 py-1.5 rounded-full text-sm">
                                                        {{ $order->order_status }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4">${{ number_format($item->artwork->artwork_price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach     
                                @else
                                    <tr class="border-b hover:bg-gray-100 transition duration-300">
                                        <td colspan="5" class="py-5 px-5 text-center text-black">
                                            Current You Have no Order History.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.__footer')
</body>

</html>
