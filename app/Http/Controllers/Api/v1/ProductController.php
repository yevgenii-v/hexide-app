<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\Pure;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::paginate(25));
    }

    /**
     * Display the specified Product.
     *
     * @param Product $product
     * @return ProductResource
     */
    #[Pure]
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
