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
     * @param $locale
     * @return Application|Factory|View
     */
    public function index($locale): View|Factory|Application
    {
        $products = Product::paginate(25);

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @param $locale
     * @return Application|Factory|View
     */
    public function create($locale): View|Factory|Application
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param $locale
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store($locale, ProductStoreRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('admin.products.index', app()->getLocale());
    }

    /**
     * Display the specified Product.
     *
     * @param $locale
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show($locale, Product $product): View|Factory|Application
    {
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param $locale
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit($locale, Product $product): View|Factory|Application
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param $locale
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update($locale, ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->fill($request->validated())->save();

        return redirect()->route('admin.products.index', app()->getLocale());
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param $locale
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy($locale, Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index', app()->getLocale());
    }
}
