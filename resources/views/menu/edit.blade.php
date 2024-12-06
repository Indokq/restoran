<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" id="name" value="{{ $menu->name }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Price -->
            <div class="mt-4">
                <label for="price" class="block text-sm font-medium text-white">Price</label>
                <input type="number" name="price" id="price" value="{{ $menu->price }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Description -->
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-white">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $menu->description }}</textarea>
            </div>

            <!-- Category -->
            <div class="mt-4">
                <label for="id_category" class="block text-sm font-medium text-white">Category</label>
                <select name="id_category" id="id_category" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->id_category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-white">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-white">
                @if($menu->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="Current Image" class="w-32 h-32 object-cover">
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md font-semibold">
                    Update Menu
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
