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
    public function show()
    {
        $products = Product::all();
        $categories = [
            ['name' => 'Тестовая 1',],
            ['name' => 'Тестовая 2',],
            ['name' => 'Тестовая 3',],
        ];
        return view('show', compact('products', 'categories'));

    }

}
