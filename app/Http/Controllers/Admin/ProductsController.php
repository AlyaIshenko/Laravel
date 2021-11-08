<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductImagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(55);
        return view('admin/products/index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin/products/create', compact('categories'));
    }
    public function store(CreateProductRequest $request)
    {
        $fields = $request->validated();
        $images = !empty($fields['images']) ? $fields['images'] : [];
        $category = Category::find($fields['category']);
        $product = $category->products()->create($fields);
        ProductImagesService::attach($product, $images);

        return redirect()->route('admin.products');
    }
    public function edit(Product $product)
    {
        $categories = Category::all('id', 'name')->toArray();
        return view('admin/products/edit', compact('product', 'categories'));
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        if (!empty($request->images)) {
            ProductImagesService::attach($product, $request->images);
        }

        return redirect()->back()->with("status", "The product {$product->id} was successfully updated!");
    }
    public function destroy(Product $product)
    {
        $product = Product::find($product['id'])->delete();
        return redirect()->route('admin/products', compact('product'))->with("status", "The product {$product->id} was successfully removed!");
    }
}
