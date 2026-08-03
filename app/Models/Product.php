<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'units', 'category_id'];

    // Relating the table category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
