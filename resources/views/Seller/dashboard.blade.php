<!DOCTYPE html>
<html lang="en">

@include('header')

<body class="bg-gray-100">
    <!-- Navbar -->
    @include('partials.__seller-navbar')
    <x-message />

    <!-- Main Content -->
    <div class="container mx-auto py-10">
        <!-- Dashboard Header -->
        <div class="px-5 mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Seller Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{$sellerName}}!</p>
        </div>

        <!-- Main Dashboard Content -->
        <div class="bg-white p-6 rounded-lg shadow-xl">
            <h2 class="text-2xl font-semibold mb-5">Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Dashboard Cards -->
                <div class="bg-blue-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Total Sales</h3>
                    <p class="text-4xl font-bold text-blue-500 mt-2">{{$totalSales}}</p>
                </div>
                <div class="bg-green-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Total Artworks</h3>
                    <p class="text-4xl font-bold text-green-500 mt-2">{{$totalArtworks}}</p>
                </div>
                {{-- <div class="bg-yellow-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Pending Orders</h3>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">{{$pendingOrders}}</p>
                </div> --}}
                <div class="bg-teal-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Preparing Orders</h3>
                    <p class="text-4xl font-bold text-teal-500 mt-2">{{$preparingOrders}}</p>
                </div>
                <div class="bg-purple-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Orders Picked Up by Couriers</h3>
                    <p class="text-4xl font-bold text-purple-500 mt-2">{{$pickedUpOrders}}</p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.__seller-footer')
</body>

</html>
