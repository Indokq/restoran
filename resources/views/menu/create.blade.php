<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Menu') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Price -->
            <div class="mt-4">
                <label for="price" class="block text-sm font-medium text-white">Price</label>
                <input type="number" name="price" id="price" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Description -->
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-white">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <!-- Category -->
            <div class="mt-4">
                <label for="id_category" class="block text-sm font-medium text-white">Category</label>
                <select name="id_category" id="id_category" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-white">Image</label>
                <input type="file" name="image" id="image" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-white">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md font-semibold">
                    Add Menu
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
