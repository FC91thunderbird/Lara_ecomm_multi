<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('layouts.admin.Category.index', compact('categories'));
    }

   
    public function create()
    {
        return view('layouts.admin.Category.add');
    }

   
    public function store(CategoryStoreRequest $request)
    {
 
        if($request->file('category_image')){
            $upload_location = 'upload/category/';
            $file = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
            $save_url = $upload_location.$name_gen;

            Category::create([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_slug' => Str::slug($request->input('category_name')),
                'category_image' => $save_url
            ]);
        }else{
            Category::create([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_slug' => Str::slug($request->input('category_name'))
            ]);
        }

        $notification = [
            'success' => 'Category Created Successfully!!!',
            'message' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

   
    public function edit(Category $category)
    {
        return view('layouts.admin.Category.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required'
        ]);

        if($request->file('category_image')){
            if($category->category_image !='default.jpg'){
                unlink($category->category_image);
            }
            $upload_location = 'upload/category/';
            $file = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
            $save_url = $upload_location.$name_gen;

            $category->update([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_slug' => Str::slug($request->input('category_name')),
                'category_image' => $save_url
            ]);
        }else{
            $category->update([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_slug' => Str::slug($request->input('category_name'))
            ]);
        }

        $notification = [
            'success' => 'Category Updated Successfully!!',
            'title'=> 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

   
    public function destroy(Category $category)
    {
        if($category->category_image !='default.jpg'){
            unlink($category->category_image);
        }
        $category->delete();

        $notification = [
            'message' => 'Category Deleted Successfully!!!',
            'alert-type' => 'warning'
        ];

        return redirect()->route('category.index')->with($notification);
    }
}
