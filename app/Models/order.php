<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'total_price', 'order_date'];

    /**
     * Relationship with OrderItem.
     */
    public function items()
    {
        return $this->hasMany(orderItem::class);
    }
}
