<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){
        $address = Address::where('user_id', Auth::id())->first();
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', ['cartItems' => $cartItems, 'address' => $address]);
    }

    public function update(Request $request, Cart $cart){
        $cart->update([
            'units' => $request->units
        ]);
        return redirect('/cart');
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();

        Cart::where('user_id', $user->id)->delete();

        return redirect('/cart')->with('success', 'Cart cleared.');
    }

    public function store(Request $request, Product $product){
            // Verifica se o usuário está autenticado
            if (!Auth::check()) {
                return redirect()->route('login');
            }

        $action = $request->input('action');

        $cart = Cart::where(['user_id' => Auth::user()->id,'product_id' => $product->id])->first();

        if ($action === 'remove') {
            // Se a ação for remover
            if ($cart) {
                if ($cart->units > 1) {
                    $cart->update(['units' => $cart->units - 1]);
                } else {
                    $cart->delete();
                }
            }
        } else {
            if (!$cart) {
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'product_images' => $product->images,
                    'units' => 1
                ]);
            } else {
                $cart->update([
                    'units' => $cart->units + 1
                ]);
            }
        }

        return back();
    }
}
