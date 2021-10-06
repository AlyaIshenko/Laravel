<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {

        return view('products/show', compact('product'));
    }
    // public function show(int $id)
    // {
    //     $products = Product::with('category')->find($id);
    //     return view('products/show', compact('products'));
    // }
}
