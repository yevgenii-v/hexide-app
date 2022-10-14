<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $products = Product::paginate(25);

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Product::create([
            'title' => $data['title'],
            'slug'  => Str::slug($data['title']),
            'price' => $data['price']
        ]);

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified Product.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product): View|Factory|Application
    {
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): View|Factory|Application
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->fill([
            'title' => $data['title'],
            'slug'  => Str::slug($data['title']),
            'price' => $data['price'],
        ]);

        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
