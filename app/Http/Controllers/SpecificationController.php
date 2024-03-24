<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\ProductSpecification;
use App\Models\Specification;
use App\Models\Product;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{

    public function create_specification(Request $request)
    {
        return view('specification.create');
    }
    public function create(Request $request)
    {
        $request->validate([
            'measure' => 'required|max:255',
        ]);

        Measure::create($request->all());
        return redirect()->route('main');

    }
    public function catch_id(Request $request, $id = null)
    {
        $product = Product::find($id);
        $measuries = Measure::all();
        return view('specification.create_id', [
            'product' => $product,
            'measuries' => $measuries,
        ]);

    }

    public function catch_specification_to_product(Request $request, int $id)
    {
        $product = new ProductSpecification($request->all());
        $product->product_id = $id;
        $product->save();
        return redirect()->route('show');

    }

}
