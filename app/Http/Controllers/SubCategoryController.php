<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   
    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        return view('layouts.admin.SubCategory.index', compact('subcategories'));
    }

  
    public function create()
    {
        $categories = Category::all();
        return view('layouts.admin.SubCategory.add', compact('categories'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required|unique:sub_categories',
            'category_id' => 'required'
        ]);
        SubCategory::create([
            'category_id' => $request->input('category_id'),
            'sub_category_name' => $request->input('sub_category_name'),
            'sub_category_slug' => Str::slug($request->input('sub_category_name')),
        ]);

        $notification = [
            'success' => 'Sub Category Created Successfully!',
            'title' => 'success'
        ];

        return redirect()->route('sub-category.index')->with($notification);
    }

  
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::latest()->get();
        return view('layouts.admin.SubCategory.edit', compact('categories', 'subCategory'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'category_id' => 'required'
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update([
            'category_id' => $request->input('category_id'),
            'sub_category_name' => $request->input('sub_category_name'),
            'sub_category_slug' => Str::slug($request->input('sub_category_name')),
        ]);

        $notification = [
            'success' => 'Sub Category Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('sub-category.index')->with($notification);
    }

   
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        $notification = [
            'success' => 'Sub Category Deleted Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('sub-category.index')->with($notification);
    }
}
