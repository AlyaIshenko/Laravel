<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(10);
        return view('products/index', compact('products'));
    }

    public function show(int $id)
    {
        $product = Product::with('category')->find($id);
        return view('products/show', compact('product'));
    }
}
