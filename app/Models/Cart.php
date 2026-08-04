<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id', 'user_id', 'units'];

    // Relating the table product
    public function product(){
       return $this->belongsTo(Product::class);
    }

    // Relating the table user
    public function user(){
       return $this->belongsTo(User::class);
    }
}
