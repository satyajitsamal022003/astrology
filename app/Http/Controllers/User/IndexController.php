<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $popularproducts = Product::where('status', 1)->where('sortOrderPopular', 1)->paginate(8);
        return view('user.index', compact('categories','popularproducts'));
    }

    public function categorywiseproduct($id)
    {
        $category = Category::find($id);
        $subcategories = SubCategory::where('categoryId', $id)->where('status', 1)->paginate(8);
        $subcat = SubCategory::where('categoryId', $id)->where('status', 1)->get();

        $subcategoryIds = $subcat->pluck('id');

        $maincategoryproducts = Product::where('categoryId', $id)->where('status', 1)->paginate(8);
        $subcategoryproducts = Product::whereIn('categoryId', $subcategoryIds)->where('status', 1)->paginate(8);

        return view('user.category.product', compact('subcategories', 'category', 'maincategoryproducts', 'subcategoryproducts'));
    }

    public function productdetails($prodid)
    {

        $productdetails = Product::with('category')->where('id', $prodid)->first();

        $relatedProducts = Product::where('id', '!=', $prodid)->where('status', 1)->paginate(8);
        $popularproducts = Product::where('status', 1)->where('sortOrderPopular', 1)->paginate(8);

        return view('user.details.product', compact('productdetails', 'relatedProducts','popularproducts'));
    }
}
