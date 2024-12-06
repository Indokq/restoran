<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Category List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-white">All Categories</h2>
            <a href="{{ route('category.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Add Category
            </a>
        </div>

        <table class="w-full border-collapse border bg-white">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->id }}</td>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2 flex space-x-4">
                        <a href="{{ route('category.edit', $category->id) }}" class="text-sky-600">Edit</a>
                        <form action="{{ route('category.delete', $category->id) }}" method="GET">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
