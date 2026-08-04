<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create(){
        return back();
    }

    public function index() {
        $addresses = Address::where('user_id', Auth::id())->get(); // get() retorna em objeto li
        return view('address.index', ['address' => $addresses]);
    }

    public function update(Request $request){
        $address = Address::where(['user_id' => Auth::user()->id])->first();
        $address->update($request->all());
         return back();
    }

    public function destroy(Address $address){
        $address = Address::where(['user_id' => Auth::user()->id])->first();
        $address->delete();
         return back();
    }

    public function store(Request $request){
        Address::create([
            'street' => $request->street,
            'postal' => $request->postal,
            'neighborhood' => $request->neighborhood,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);
         return back();
    }

    public function edit(Address $address){
        $address = Address::where(['user_id' => Auth::user()->id])->first();
        return back('address.edit', ['address' => $address]);
    }
}
