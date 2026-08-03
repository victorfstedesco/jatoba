<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function create(){
        return view ('category.create', ['categories' => Category::all()]);
    }

    public function store(Request $request){
        Category::create($request->all());
        return redirect("/category");
    }

    public function index(){
        return view('category.index', ["categories"=>Category::all()]);
    }

    public function show(Category $category){
        return view('category.show', ['category'=>$category]);
    }

    public function edit(Category $category){
        return view('category.edit', ['category'=>$category]);
    }

    public function update(Category $category, Request $request){
        $category->update($request->all());
        return redirect('/category');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect('/category');
    }
}
