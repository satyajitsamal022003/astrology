<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function listsubcat(){
        return view('admin.subcategory.listsubcat');
    }

    public function addsubcat(){
        return  view('admin.subcategory.addsubcat');
    
    }
}
