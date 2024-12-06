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

      <div class="flex flex-col items-center mt-6">
          <table class="w-full border-collapse border bg-white">
              <thead>
                  <tr>
                      <th class="border px-2 py-2">ID</th>
                      <th class="border px-2 py-2">Name</th>
                      <th class="border px-2 py-2">Description</th>
                      <th class="border px-2 py-2">Price</th>
                      <th class="border px-2 py-2">Category</th>
                      <th class="border px-2 py-2">Image</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($menus as $menu)
                  <tr>
                      <td class="border px-2 py-2">{{$menu->id}}</td>
                      <td class="border px-2 py-2">{{$menu->name}}</td>
                      <td class="border px-2 py-2">{{$menu->description}}</td>
                      <td class="border px-2 py-2">{{$menu->price}}</td>
                      <td class="border px-2 py-2">{{$menu->category->name}}</td>
                      <td class="border px-2 py-2">
                          <img src="{{$menu->picture}}" alt="Menu Image" class="w-16 h-16 object-cover">
                      </td>
                      <td class="border px-2 py-2 flex space-x-4">
                          @can('update', $menu)
                          <a href="{{route('menu.edit', $menu->id)}}" class="text-sky-600">Edit</a>
                          @endcan
                          @can('delete', $menu)
                          <form action="{{route('menu.delete', $menu->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-600">Delete</button>
                          </form>
                          @endcan
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</x-app-layout>
