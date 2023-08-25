<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;

class Product extends Controller
{

    public function index()
    {
        $products = Products::all();
        return view("admin.product.index",
            compact([
                'products',
            ])
        );
    }

    public function add()
    {
        return view("admin.product.add");
    }

    public function edit($id)
    {

        $product = Products::find($id);

        if(!$product){
            return redirect()->route('dashboard.product');
        }

        return view("admin.product.edit", compact('product'));

    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $update = Products::find($request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard.product');

    }

    public function destroy($id)
    {

        $find = Products::findOrFail($id);

        if(!$find){
            return redirect()->route('dashboard.product');
        }

        $find->delete();

        return redirect()->route('dashboard.product');

    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $create = Products::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard.product');

    }
}
