<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create(){
        return view('product.create', ['categories'=>Category::all()]);
    }

    public function store(Request $request){
        Product::create($request->all());
        return redirect("/product");
    }

    public function index(){
        return view('product.index', ["products"=>Product::all()]);
    }

    public function show(Product $product){
        return view('product.show', ['product' => $product]);
    }

    public function edit(Product $product){
        return view('product.edit', ['product' => $product, 'categories' => Category::all()]);
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
