<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;


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
        $category = Category::all();
        return view("admin.product.add",compact("category"));
    }

    public function edit($product_id)
    {

        $product = Products::find($product_id);
        return view("admin.product.edit", compact('product'));

    }

    public function update(Request $request, $product_id)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'descrpiption' => 'required',
        ]);

        $update = Products::find($product_id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'descrpiption' => $request->descrpiption,
        ]);

        return redirect()->route('dashboard.product');

    }

    public function destroy($product_id)
    {

        $find = Products::findOrFail($product_id);

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
            'price' => 'required',
            'descrpiption' => 'required',
            'category' => 'required'

        ]);

        $create = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'descrpiption' => $request->descrpiption,
            'category_id' => $request->category,
        ]);

        return redirect()->route('dashboard.product');

    }
}
