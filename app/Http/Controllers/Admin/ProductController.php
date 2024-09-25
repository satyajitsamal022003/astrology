<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function addproduct(){
        $categories = Category::where('status', 1)->get();
        return view('admin.products.add', compact('categories'));
    }

    public function listproduct(){
        return view('admin.products.list');
    }
}
