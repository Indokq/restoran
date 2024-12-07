<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-6">
        <h3 class="text-lg font-bold text-white mb-4">Customer Orders</h3>

        @forelse($orders as $order)
            <div class="bg-white rounded-lg shadow-md mb-4 p-4">
                <h4 class="text-lg font-bold text-gray-800 mb-2">
                    Order #{{ $order->id }} - {{ $order->customer_name }}
                </h4>
                <p class="text-sm text-gray-600 mb-2">Order Date: {{ $order->order_date }}</p>
                <p class="text-sm text-gray-600 mb-2">Total Price: ${{ number_format($order->total_price, 2) }}</p>
                <h5 class="text-md font-semibold text-gray-800 mt-4">Items:</h5>
                <ul class="list-disc list-inside">
                    @foreach($order->items as $item)
                        <li class="text-sm text-gray-700">
                            {{ $item->menu->name }} - Quantity: {{ $item->quantity }} - 
                            Price: ${{ number_format($item->price, 2) }} - 
                            Subtotal: ${{ number_format($item->subtotal, 2) }}
                        </li>
                    @endforeach
                </ul>

                <!-- Delete Button -->
                <form action="{{ route('orders.delete', $order->id) }}" method="GET" class="mt-4">
                    @csrf
                    @method('GET')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                        Delete Order
                    </button>
                </form>
            </div>
        @empty
            <p class="text-center text-gray-600">No orders found.</p>
        @endforelse
    </div>
</x-app-layout>
