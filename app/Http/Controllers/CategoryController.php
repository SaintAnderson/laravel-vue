<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function create_category(Request $request)
    {
        return view('category.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($request->all());

    }
    public function catch_id(Request $request, $id = null)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('category.create_id', [
            'product' => $product,
            'category' => $category,
        ]);

    }

    public function catch_category_to_product(Request $request)
    {
        ProductCategory::create($request->all());
    }
    public function allCategory()
    {
        $categories = Category::all();
        return view('catalog', [
            'categories' => $categories,
            'type' => 'category'
        ]);
    }

    public function subcategories($id)
    {
        $categories = Category::find($id);
        return view('catalog', [
            'categories' => $categories->subcategories,
            'type' => 'subcategory'
        ]);
    }

    public function products($id)
    {
        $category = Category::find($id);
        return view('show', [
            'products' => $category->products,
        ]);
    }
}
