<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    <!-- Navbar -->
    @include('partials.__seller-navbar')
    <x-message />

    <!-- Main Content -->
    <section class="min-h-screen">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Manage Orders</h1>
    
            <!-- Orders Table -->
            <div class="overflow-x-auto bg-white p-5 rounded-lg shadow-xl">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Order ID</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Customer</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Date</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Status</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @if (count($orderData) > 0)
                            @foreach ($orderData as $order)
                                <tr class="border-b hover:bg-gray-100 transition duration-300">
                                    <td class="py-3 px-4">{{ $order->id }}</td>
                                    <td class="py-3 px-4">{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                    <td class="py-3 px-4">{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td class="py-3 px-4">
                                        @if (($order->order_status == 'Preparing') || $order->order_status == 'Pending')
                                            <span class="bg-gray-400 text-gray-700 px-4 py-1.5 rounded-full text-sm">
                                                {{ $order->order_status }}
                                            </span> 
                                        @else
                                            <span class="bg-green-400 text-gray-700 px-4 py-1.5 rounded-full text-sm">
                                                {{ $order->order_status }}
                                            </span> 
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <!-- Status Dropdown -->
                                        <div class="flex items-center">
                                            <form action="{{ route('seller.UpdateOrders', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="flex items-center">
                                                    <select name="status" class="text-sm bg-gray-200 border rounded p-2">
                                                        <option value="Preparing" {{ $order->order_status == 'Preparing' ? 'selected' : '' }}>Preparing</option>
                                                        <option value="Picked Up" {{ $order->order_status == 'Picked Up' ? 'selected' : '' }}>Picked up by courier</option>
                                                    </select>
                                                    <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-300">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-b transition duration-300">
                                <td colspan="6" class="py-10 px-4 text-center">
                                    Currently, there are no orders to display.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>       
    </section>


    @include('partials.__seller-footer')
</body>
</html>
