<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
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
        $category = Category::find($fields['category']);

        $images = !empty($fields['images']) ? $fields['images'] : [];
        // unset($fields['category']);
        // unset($fields['images']);

        $product = $category->products()->create($fields);
        return redirect()->route('admin.products');
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin/products/edit', ['product' => $product, 'categories' => $categories]);
    }
    public function update()
    {
        return redirect()->route('admin.products');
    }
    public function destroy(Product $products)
    {
        $products = Product::find($products)->delete();
        return redirect()->route('admin/products', compact('products'));
    }
}
