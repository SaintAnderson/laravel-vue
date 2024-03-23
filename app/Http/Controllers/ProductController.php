<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Product::create($request->all());
        return redirect()->route('create')
            ->with('success','Post created successfully.');
    }

    public function update(Request $request, $id = null)
    {
        if ($id) {
            $product = Product::find($id);
            return view('update', compact('product'));
        }

        if ($request->method() == Request::METHOD_POST) {
            $product = Product::find($request->get('id'));
            $product->update($request->all());

            return redirect('show');
        }

    }

    public function remove($id)
    {
        $post = Product::find($id);
        $post->delete();
        return redirect('show');

    }
//    public function show()
//    {
//        $products = Product::all();
//        $specifications = $products->products_spesification;
//        var_dump($specifications);
//        return view('show', compact('products', 'specifications'));
//
//    }

}
