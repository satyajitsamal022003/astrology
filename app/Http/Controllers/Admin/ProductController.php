<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct(){
        return view('admin.products.add');
    }

    public function listproduct(){
        return view('admin.products.list');
    }
}
