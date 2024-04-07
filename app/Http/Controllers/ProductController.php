<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductCategory;
class ProductController extends Controller
{


    public function show()
    {
        $product = Product::all();
        return view('show', compact('product'));
    }

    public function create_product()
    {
        $category = Category::all();
        return view('create', compact('category'));

    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $product = Product::create($request->all());
        $productCategory = new ProductCategory();
        $productCategory->product_id = $product->id;
        $productCategory->category_id = $request->parent_id;
        $productCategory->save();
        return redirect()->route('main');

    }


    public function update(Request $request, $id , $categoryId)
    {
            $product = Product::find($id);
            return view('update', compact('product','categoryId'));
    }

    public function update_product(Request $request, $categoryId)
    {
        $product = Product::find($request->get('id'));
        $product->update($request->all());

        return redirect('category/' . $categoryId);
    }

    public function remove($id, $categoryId)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('category/' . $categoryId);
    }


}
