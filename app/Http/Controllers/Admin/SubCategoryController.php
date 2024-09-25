<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function listsubcat()
    {
        $subcategories = SubCategory::whereNotIn('status', [2])->orderBy('id', 'desc')->get();
        return view('admin.subcategory.listsubcat', compact('subcategories'));
    }
    

    public function addsubcat(){
        $categories = Category::whereNotIn('status', [2])->get();
        return  view('admin.subcategory.addsubcat',compact('categories'));
    
    }

    
    public function storesubcat(Request $request)
    {
        // Validation
        $request->validate([
            'categoryId' => 'nullable',
            'subCategoryName' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'sortOrder' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        // Handle file uploads
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('subcategories'), $imageName);
            $imagePath = 'subcategories/' . $imageName; 
        }

        // Store the subcategory
        SubCategory::create([
            'categoryId' => $request->input('categoryId'),
            'subCategoryName' => $request->input('subCategoryName'),
            'image' => $imagePath,
            'sortOrder' => $request->input('sortOrder'),
            'description' => $request->input('description'),
            'status' => $request->has('onoffswitch928') ? 0 : 1,
        ]);

        // Redirect with success message
        return redirect()->route('admin.listsubcat')->with('success', 'Sub Category added successfully!');
    }
    public function editSubcat($id)
    {
        $subcategory = SubCategory::with('category')->findOrFail($id); // Fetch the subcategory with its category
        $categories = Category::whereNotIn('status', [2])->get(); // Fetch all categories
        return view('admin.subcategory.editsubcat', compact('subcategory', 'categories'));
    }

    public function updateSubcat(Request $request, $id)
    {
        // Validation
        $request->validate([
            'categoryId' => 'nullable',
            'subCategoryName' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'sortOrder' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        // Find the subcategory
        $subcategory = SubCategory::findOrFail($id);

        // Handle file uploads
        $imagePath = $subcategory->image; // Keep the old image by default
        if ($request->hasFile('image')) {
            // If a new image is uploaded, save it
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('subcategories'), $imageName);
            $imagePath = 'subcategories/' . $imageName; 
        }

        // Update the subcategory
        $subcategory->update([
            'categoryId' => $request->input('categoryId'),
            'subCategoryName' => $request->input('subCategoryName'),
            'image' => $imagePath,
            'sortOrder' => $request->input('sortOrder'),
            'description' => $request->input('description'),
            'status' => $request->has('onoffswitch928') ? 0 : 1,
        ]);

        // Redirect with success message
        return redirect()->route('admin.listsubcat')->with('success', 'Sub Category updated successfully!');
    }

    public function deletesubcat($id)
    {
       
        $category = Subcategory::findOrFail($id);
        
        $category->status = 2;
        $category->save(); 
        
        return redirect()->route('admin.listsubcat')->with('success', 'Sub Category status updated to inactive successfully!');
    }

}
