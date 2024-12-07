<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = order::with('items.menu')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
{
    $request->validate([
        'menu_id' => 'required|exists:menu,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $menu = Menu::findOrFail($request->menu_id);
    $subtotal = $menu->price * $request->quantity;

    // Create an order
    $order = order::create([
        'customer_name' => 'Guest', // Replace with actual customer name
        'total_price' => $subtotal,
        'order_date' => now(),
    ]);

    // Add item to order
    $order->items()->create([
        'menu_id' => $menu->id,
        'quantity' => $request->quantity,
        'price' => $menu->price,
        'subtotal' => $subtotal,
    ]);

    return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
}

public function delete($id)
{
    $order = order::findOrFail($id);

    // Delete associated order items
    $order->items()->delete();

    // Delete the order itself
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}
}
