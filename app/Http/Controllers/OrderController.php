<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;

class OrderController extends Controller
{
    public function store(Address $address){
        $carrinho = Cart::where(['user_id' => Auth::user()->id])->get();
        $pedido = Order::create([
           'user_id' => Auth::user()->id,
           'address_id' => $address->id
        ]);

        foreach($carrinho as $item){
            OrderItem::create([
                'order_id' => $pedido->id,
                'product_id' => $item->product_id,
                'units' => $item->units,
                'price' => $item->product->price
            ]);
        }

        Cart::where(['user_id' => Auth::user()->id])->delete();
        return redirect('/dashboard');
    }
}
