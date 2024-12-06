<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Add Menu') }}
      </h2>
  </x-slot>
  
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
      <div class="flex mt-6 items-center justify-between">
          <h2 class="font-semibold text-xl text-white">List Menu</h2>
          <a href="{{route('menu.create')}}">
              <button class="text-white bg-blue-500 px-10 py-2 rounded-md font-semibold">Tambah Menu</button>
          </a>
      </div>

       <!-- Menu List -->
       <div class="mt-8">
        <table class="min-w-full bg-gray-800 text-white rounded-md overflow-hidden">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td class="border px-4 py-2">{{ $menu->name }}</td>
                        <td class="border px-4 py-2">{{ $menu->category->name }}</td>
                        <td class="border px-4 py-2">{{ $menu->price }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ url('storage/' . $menu->image) }}" alt="Menu Image" class="w-16 h-16 object-cover">
                        </td>
                        <td class="border px-4 py-7 flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('menu.edit', $menu->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">
                                Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('menu.delete', $menu->id) }}" method="GET">
                                @csrf
                                @method('GET')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
