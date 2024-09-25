<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listcat(){
        $categories = Category::whereNotIn('status', [2])->orderBy('id', 'desc')->get();
        return view('admin.category.listcat', compact('categories'));

    }
    
    public function addcat(){
        return view('admin.category.addcat');
    }

    public function storecat(Request $request){
       // Validation
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'sortOrder' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        // Handle File Uploads
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('categories'), $imageName);
            $imagePath = 'categories/' . $imageName; 
        }

        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $banner->move(public_path('categoribanners'), $bannerName);
            $bannerPath = 'categoribanners/' . $bannerName; 
        }

        // Store the data
        Category::create([
            'categoryName' => $request->input('categoryName'),
            'image' => $imagePath,
            'banner' => $bannerPath,
            'sortOrder' => $request->input('sortOrder'),
            'description' => $request->input('description'),
            'status' => $request->has('onoffswitch928') ? 0 : 1,
        ]);

      // Redirect with success message
      return redirect()->route('admin.listcat')->with('success', 'Category created successfully!');
    }

    public function editcat($id){

        $category = Category::findOrFail($id);

        return view('admin.category.editcat', compact('category'));

    }

    public function updatecat(Request $request, $id) {
        // Validation
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'sortOrder' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);
    
        // Fetch the category
        $category = Category::findOrFail($id);
    
        // Handle File Uploads
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('categories'), $imageName);
            $category->image = 'categories/' . $imageName;
        }
    
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $banner->move(public_path('categoribanners'), $bannerName);
            $category->banner = 'categoribanners/' . $bannerName;
        }
    
        // Update the other fields
        $category->categoryName = $request->input('categoryName');
        $category->sortOrder = $request->input('sortOrder');
        $category->description = $request->input('description');
        $category->status = $request->has('status') ? 1 : 0;
    
        // Save the updated data
        $category->save();
    
        // Redirect back to the category list with success message
        return redirect()->route('admin.listcat')->with('success', 'Category updated successfully!');
    }
    
    public function deletecat($id)
    {
        // Find the category or fail
        $category = Category::findOrFail($id);
        
        $category->status = 2;
        $category->save(); 
        
        return redirect()->route('admin.listcat')->with('success', 'Category status updated to inactive successfully!');
    }

}
