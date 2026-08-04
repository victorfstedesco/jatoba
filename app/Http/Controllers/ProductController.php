<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(){
        if(Auth::user()->admin){
        return view('product.create', ['categories'=>Category::all()]);
        }
        redirect('/');
    }

    public function store(Request $request){
        $product = Product::create($request->all());
        $urls = explode("\n", $request->urls);

        foreach ($urls as $order => $url) {
           ProductImage::create([
            'url' => $url,
            'order' => $order,
            'product_id' => $product->id
           ]);
        }
        return redirect("/product");
    }

    public function index(){
        if(Auth::user()->admin){
        return view('product.index', ["products"=>Product::all()]);
        }
        redirect('/');
    }

    public function show(Product $product){
        if(Auth::user()->admin){
        $imageUrls = $product->images->pluck('url')->toArray();
        return view('product.show', ['product' => $product, 'categories' => Category::all(), 'imageUrls' => $imageUrls]);
        }
        redirect('/');
    }

    public function productshop(Product $product){

        $imageUrls = $product->images->pluck('url')->toArray();
        return view('shopping.productshop', [
            'product' => $product,
            'products' => Product::all(),
            'categories' => Category::all(),
            'imageUrls' => $imageUrls,
            'cart' => Auth::check()
            ? Cart::where(['product_id' => $product->id, 'user_id' => Auth::user()->id])->first()
            : null
        ]);
    }


    public function edit(Product $product){
        if(Auth::user()->admin){
        $imageUrls = $product->images->pluck('url')->toArray();
        return view('product.edit', ['product' => $product, 'categories' => Category::all(), 'imageUrls' => $imageUrls]);
        }
        redirect('/');
    }

    public function update(Product $product, Request $request){
        $product->update($request->all());
        return redirect('/product/'.$product->id);
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect ("/product");
    }
}
