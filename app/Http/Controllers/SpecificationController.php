<?php

namespace App\Http\Controllers;

use App\Models\ProductSpecification;
use App\Models\Specification;
use App\Models\Product;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{

    public function create_specification(Request $request)
    {
        return view('category.create');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Specification::create($request->all());

    }
    public function catch_id(Request $request, $id = null)
    {
        $product = Product::find($id);
        $specification = Specification::all();
        return view('specification.create_id', [
            'product' => $product,
            'specification' => $specification,
        ]);

    }

    public function catch_specification_to_product(Request $request)
    {
        ProductSpecification::create($request->all());
    }
}
