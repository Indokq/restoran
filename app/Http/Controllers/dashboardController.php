<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('category');

        // Fetch menus with optional category filter
        $query = Menu::with('category');
        if ($categoryId) {
            $query->where('id_category', $categoryId);
        }
        $menus = $query->get();

        // Fetch all categories
        $categories = Category::all();

        return view('dashboard', compact('menus', 'categories'));
    }
}

