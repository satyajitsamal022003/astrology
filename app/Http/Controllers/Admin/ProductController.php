<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function addproduct(){
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.products.add', compact('categories', 'products'));
    }

    public function listproduct(){
        $products = Product::whereNotIn('status', [2])->orderBy('id', 'desc')->get();        
        return view('admin.products.list', compact('products'));
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'variant' => 'nullable|array',
            'is_variant' => 'nullable',
            'productName' => 'required|string|max:255',
        ]);


        $productData = $request->except(['_token']);

        $productData['status'] = 1;
        $productData['created_at'] = now();
        $productData['updated_at'] = now();

        $productData['icon'] = $this->uploadFile($request, 'icon', 'producticon');
        $productData['image1'] = $this->uploadFile($request, 'image1', 'product');
        $productData['image2'] = $this->uploadFile($request, 'image2', 'product');
        $productData['image3'] = $this->uploadFile($request, 'image3', 'product');

        $productData['is_variant'] = $request->is_variant ? 1 : 0;
        $productData['variant'] = $request->filled('variant') ? json_encode($request->variant) : null;

        $productData['seoUrl'] = Str::slug($request->productName);
        Product::create($productData);

        return redirect()->route('admin.listproduct')->with('success', 'Product added successfully!');
    }

    public function editproduct($id){
        $categories = Category::where('status', 1)->get();
        $productsData = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $product = Product::Find($id);
        return view('admin.products.edit', compact('categories', 'productsData', 'product'));
    }

    public function updateproduct(Request $request, $id){
        $request->validate([
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $productData = $request->except(['_token']);
        $productData['updated_at'] = now();
        $productData['icon'] = $this->uploadFile($request, 'icon', 'producticon');
        $productData['image1'] = $this->uploadFile($request, 'image1', 'product');
        $productData['image2'] = $this->uploadFile($request, 'image2', 'product');
        $productData['is_variant'] = $request->is_variant ? 1 : 0;
        $productData['variant'] = $request->filled('variant') ? json_encode($request->variant) : null;
        $productData['seoUrl'] = Str::slug($request->productName);
        $product->update($productData);
        return redirect()->route('admin.listproduct')->with('success','Product updated successfully!');
    }

    private function uploadFile(Request $request, $fieldName, $path)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            return $path . '/' . $fileName;
        }
        return null;
    }

    public function deleteproduct($id)
    {
        $product = Product::findOrFail($id);        
        $product->status = 2;
        $product->save(); 
        
        return redirect()->route('admin.listproduct')->with('success', 'Product status updated to inactive successfully!');
    }

    public function productOnTop(Request $request) {
        $product = Product::findOrFail($request->productId);
        $product->on_top = $request->ontop;
        $product->save();

        return response()->json(['message' => 'Product on top updated successfully!', 'success' => true]);
    }

    public function productOnStatus(Request $request) {
        $product = Product::findOrFail($request->productId);
        $product->status = $request->status;
        $product->save();

        return response()->json(['message' => 'Product status updated successfully!', 'success' => true]);
    }

    public function getSubCategory(Request $request) {
        $subcategorys = Subcategory::where('categoryId', $request->categoryId)->get();

        return response()->json(['message' => 'Sub Category', 'success' => true, 'data'=> $subcategorys]);
    }
}
