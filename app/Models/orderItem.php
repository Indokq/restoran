<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'menu_id', 'quantity', 'price', 'subtotal'];

    /**
     * Relationship with Order.
     */
    public function order()
    {
        return $this->belongsTo(order::class);
    }

    /**
     * Relationship with Menu.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

