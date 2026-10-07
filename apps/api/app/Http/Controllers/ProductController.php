<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        return Product::paginate();
    }

    public function store(ProductStoreRequest $request)
    {
        return Product::create(
            $request->validated(),
        );
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(
        ProductUpdateRequest $request,
        Product $product
    ) {
        $product->update(
            $request->validated(),
        );

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
