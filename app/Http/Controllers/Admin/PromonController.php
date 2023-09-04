<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Promotion;

class PromonController extends Controller
{

    public function index()
    {
        $promotion = Promotion::all();
        return view("admin.promotion.index",
            compact([
                'promotion',
            ])
        );
    }

    public function add()
    {
        $product = Promotion::all();
        return view("admin.promotion.add",compact("product"));
    }

    public function edit($promotion_id)
    {

        $product = Promotion::find($promotion_id);
        return view("admin.promotion.edit", compact('promotion'));

    }

    public function update(Request $request, $promotion_id)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $update = Products::find($promotion_id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard.promotion');

    }

    public function destroy($promotion_id)
    {

        $find = Promotion::findOrFail($promotion_id);

        if(!$find){
            return redirect()->route('dashboard.promotion');
        }

        $find->delete();

        return redirect()->route('dashboard.promotion');

    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'products' => 'required'

        ]);

        $create = Promotion::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_id' => $request->product,
        ]);

        return redirect()->route('dashboard.promotion');

    }
}
