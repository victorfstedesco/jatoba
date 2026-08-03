<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'url'];

    // Relating the table product
    public function products(){
        return $this->hasMany(Product::class);
    }

}
