<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view("admin.category.index",
            compact([
                'category',
            ])
        );
    }

    public function add()
    {
        return view("admin.category.add");
    }

    public function edit($category_id)
    {

        $category = Category::find($category_id);
        return view("admin.category.edit", compact('category'));

    }

    public function update(Request $request, $category_id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $update = Category::find($category_id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.category');

    }

    public function destroy($category_id)
    {

        $find = Category::findOrFail($category_id);

        if(!$find){
            return redirect()->route('dashboard.category');
        }

        $find->delete();

        return redirect()->route('dashboard.category');

    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $create = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.category');
    }
}
