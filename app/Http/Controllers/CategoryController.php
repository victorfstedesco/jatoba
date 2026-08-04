<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function create(){
        if(Auth::user()->admin){
        return view ('category.create', ['categories' => Category::all()]);
        }
        redirect('/');
    }

    public function store(Request $request){
        if(Auth::user()->admin){
        Category::create($request->all());
        return redirect("/category");
        }
        redirect('/');
    }

    public function index(){
        if(Auth::user()->admin){
        return view('category.index', ["categories"=>Category::all()]);
        }
        redirect('/');
    }

    public function show(Category $category){
        if(Auth::user()->admin){
        return view('category.show', ['category'=>$category]);
        }
        redirect('/');
    }

    public function edit(Category $category){
        if(Auth::user()->admin){
        return view('category.edit', ['category'=>$category]);
        }
        redirect('/');
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
