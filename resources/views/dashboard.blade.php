<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-6">
        <!-- Category Sorting -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-white font-bold text-lg">Filter by Category</h2>
            <form method="GET" action="{{ route('dashboard') }}">
                <select name="category" class="border-gray-300 rounded-md shadow-sm">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md">Filter</button>
            </form>
        </div>

        <!-- Menu Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($menus as $menu)
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ url('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-32 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-bold text-gray-800">{{ $menu->name }}</h3>
                    <p class="text-gray-600">{{ $menu->description }}</p>
                    <p class="text-gray-800 font-semibold mt-2">Price: ${{ number_format($menu->price, 2) }}</p>
                    <p class="text-sm text-gray-500 mt-1">Category: {{ $menu->category ? $menu->category->name : 'No Category' }}</p>
                </div>
            @empty
                <p class="col-span-full text-center text-white">No menu items found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
