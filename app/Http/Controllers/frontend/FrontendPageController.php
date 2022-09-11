<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class FrontendPageController extends Controller
{
    public function home(){
        $categories = Category::latest()->get();
        $sliders = Slider::latest()->get();
        $new_products = Product::latest()
        ->where('new_arrival' ,'=', 1)
        ->where('status', 1)->limit(20)->get();
       
        $randomProduct = Product::where('status',1)->inRandomOrder()->limit(4)->get();

        return view('frontend.content.homepage', compact(
            'categories',
            'sliders',
            'new_products',
            'randomProduct'
        ));
    }

    public function ShowSubcategory($id, $slug){
        $category = Category::find($id);
        $subcategories = SubCategory::where('category_id', $id)->orderBy('id','DESC')->paginate(3);
       
        return view('frontend.content.subcategory', compact('category','subcategories'));
    }

    public function SubCatproduct($id, $slug){
        $subcategories = SubCategory::find($id);
        $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('id','ASC')->paginate(5);

        return view('frontend.content.subcatproduct', compact('subcategories','products'));

    }

    public function ProductDetails($id, $slug){
        $products = Product::find($id);
        $categories = Category::where('id', $products->category_id);
        $subcategories = SubCategory::where('id', $products->subcategory_id);

        return view('frontend.content.productdetails', compact('products', 'categories','subcategories'));
    }

    public function productviewAjax($id)
    {
        $product = Product::findOrFail($id);
        $colors_en = explode(',', $product->product_color);
        $size_en = explode(',', $product->product_size);
        return response()->json([
            'product' => $product,
            'colors_en' => $colors_en,
            'size_en' => $size_en,
        ],200);
    }
}
