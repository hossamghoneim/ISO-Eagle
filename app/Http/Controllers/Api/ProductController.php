<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'productImages')->paginate(1);

        return $this->successWithPagination("", ProductResource::collection($products)->response()->getData(true));
    }

    public function show(Product $product)
    {
        $product->load('category', 'productImages', 'features');

        return $this->success("", new ProductDetailsResource($product));
    }
}
