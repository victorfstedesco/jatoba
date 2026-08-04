<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'units', 'category_id', 'discount'];

    // Relating the table category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relating the table images
    public function images(){
        return $this->hasMany(ProductImage::class);
     }

}
