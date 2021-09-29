<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin/products/index', compact('product'));
    }
    public function create()
    {
        return view('admin/products/create');
    }
    public function store()
    {
        return redirect()->route('admin/products/index');
    }
    public function edit(int $id)
    {
        $product = Product::with('category')->find($id);
        return view('admin/products/edit', compact('product'));
    }
    public function update()
    {
        return redirect()->route('admin/products/index');
    }
    public function destroy(int $id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('admin/products/index', compact('product'));
    }
}
