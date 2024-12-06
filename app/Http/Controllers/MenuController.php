<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $menus = Menu::get(); // Fetch all menu items
        return view('menu.index', compact('menus')); // Pass the variable 'menus' to the view

    }

    public function create()
    {
        $categories = Category::get();

        return view('menu.create', ['categories' => $categories]);
    }

    public function store(Request $request)    
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'id_category' => 'required|exists:category,id', // Ensure category exists
        ]);
    
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName()); // Store image in public storage
    
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'id_category' => $request->id_category,
            'image' => $image->hashName(), // Store the hashed filename
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menu created successfully!');
    }

    public function edit($id) {
        $menus =  Menu::findOrFail($id)->first();
        $categories = Category::get();

        return redirect()->route('menu.edit', compact('menu', 'categories'));
    }

    public function update($id, Request $request)
{
    // Validate the incoming request data
    $this->validate($request, [
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg', // Image is optional for updates
        'id_category' => 'required|exists:category,id', // Ensure the category exists
    ]);

    // Fetch the menu item
    $menu = Menu::findOrFail($id);

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());
        $menu->image = $image->hashName(); // Update the image path in the database
    }

    // Update other fields
    $menu->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'id_category' => $request->id_category,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu updated successfully!');
}

    public function delete($id) {
        Menu::findOrFail($id)->delete();

        return redirect()->route('menu.index');

}


    
    
}
