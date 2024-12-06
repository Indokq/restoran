<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menu';

    protected $fillable = ['name', 'price', 'description','image', 'id_category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
