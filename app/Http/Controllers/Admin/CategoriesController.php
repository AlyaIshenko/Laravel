<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin/categories/index', compact('categories'));
    }
    public function create()
    {
        return view('admin/categories/create');
    }
    public function store()
    {
        return redirect()->route('admin/categories');
    }
    public function edit(int $id)
    {
        $category = Category::find($id);
        return view('admin/categories/edit', compact('category'));
    }
    public function update()
    {
        return redirect()->route('admin/categories');
    }
    public function destroy(int $id)
    {
        $category = Category::find($id)->delete();
        return redirect()->route('admin/categories', compact('category'));
    }
}
