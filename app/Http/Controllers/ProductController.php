<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Image as ModelsImage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->get();
        return view('layouts.admin.product.index',compact('products'));
    }

   
    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('layouts.admin.product.add', compact('categories','subcategories'));
    }

    
    public function getSubCategory($category_id)
    {
        $subCategory = SubCategory::where('category_id','=', $category_id)->orderBy('sub_category_name','ASC')->get();
        return json_encode($subCategory);
    }

   
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'product_name' => $request->input('product_name'),
            'product_slug' => Str::slug($request->input('product_name')),
            'product_code' => $request->input('product_code'),
            'product_qty' => $request->input('product_qty'),
            'product_tags' => $request->input('product_tags'),
            'product_size' => $request->input('product_size'),
            'product_color' => $request->input('product_color'),
            'purchase_price' => $request->input('purchase_price'),
            'selling_price' => $request->input('selling_price'),
            'discount_price' => $request->input('discount_price'),
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'hot_deals' => $request->input('hot_deals')|false,
            'featured' => $request->input('featured')|false,
            'new_arrival' => $request->input('new_arrival')|false,
            'special_offer' => $request->input('special_offer')|false,
            'special_deals' => $request->input('special_deals')|false,
            'status' => $request->input('status')|false
            ]);

            if($request->file('product_thumbnail')){
                $upload_location = 'upload/products/thumbnail/';
                $file = $request->file('product_thumbnail');
                $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
                $save_url = $upload_location.$name_gen;

                $product->update([
                    'product_thumbnail' => $save_url,
                ]);
            }

            if($request->file('product_images'))
            {
                $images = $request->file('product_images');
                foreach ($images as $single_image) {
                    $upload_location = 'upload/products/multi_images/';
                    $name_gen = hexdec(uniqid()).'.'.$single_image->getClientOriginalExtension();
                    Image::make($single_image)->resize(600,600)->save($upload_location.$name_gen);
                    $save_url = $upload_location.$name_gen;
                    ModelsImage::create([
                        'product_id' => $product->id,
                        'photo_name' => $save_url,
                    ]);
                }
            }

        $notification = [
            'success' => 'Product Created Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.index')->with($notification);
    }

    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success'=>'Product status change successfully.']);
    }
 
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $product = Product::find($id);
        return view('layouts.admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'product_name' => $request->input('product_name'),
            'product_slug' => Str::slug($request->input('product_name')),
            'product_code' => $request->input('product_code'),
            'product_qty' => $request->input('product_qty'),
            'product_tags' => $request->input('product_tags'),
            'product_size' => $request->input('product_size'),
            'product_color' => $request->input('product_color'),
            'purchase_price' => $request->input('purchase_price'),
            'selling_price' => $request->input('selling_price'),
            'discount_price' => $request->input('discount_price'),
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'hot_deals' => $request->input('hot_deals')|false,
            'featured' => $request->input('featured')|false,
            'new_arrival' => $request->input('new_arrival')|false,
            'special_offer' => $request->input('special_offer')|false,
            'special_deals' => $request->input('special_deals')|false,
            'status' => $request->input('status')|false
            ]);

            if($request->file('product_thumbnail')){
                // if($product->product_thumbnail !='thumbnail.jpg'){
                //     unlink($product->product_thumbnail);
                // }
                $upload_location = 'upload/products/thumbnail/';
                $file = $request->file('product_thumbnail');
                $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
                $save_url = $upload_location.$name_gen;

                $product->update([
                    'product_thumbnail' => $save_url,
                ]);
            }

            // if($request->file('product_images'))
            // {
            //     $product_images = ModelsImage::where('product_id', '=',$product->id)->get();
            //     foreach ($product_images as $value) {
            //             unlink($value->photo_name);
            //     }
            //     $images = $request->file('product_images');
            //     foreach ($images as $single_image) {
            //         $upload_location = 'upload/products/multi_images/';
            //         $name_gen = hexdec(uniqid()).'.'.$single_image->getClientOriginalExtension();
            //         Image::make($single_image)->resize(600,600)->save($upload_location.$name_gen);
            //         $save_url = $upload_location.$name_gen;
            //         ModelsImage::create([
            //             'product_id' => $product->id,
            //             'photo_name' => $save_url,
            //         ]);
            //     }
            // }

        $notification = [
            'message' => 'Product Updated Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.index')->with($notification);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->product_thumbnail !='thumbnail.jpg'){
            unlink($product->product_thumbnail);
        }
        $product_images = ModelsImage::where('product_id', '=',$product->id)->get();
        foreach ($product_images as $value) {
            unlink($value->photo_name);
            $value->delete();
        }
        $product->delete();

        $notification = [
            'success' => 'Product Deleted Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.index')->with($notification);
    }

    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = ModelsImage::findOrFail($id);
	    unlink($imgDel->photo_name);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        $upload_location = 'upload/products/multi_images/';
    	Image::make($img)->resize(600,600)->save($upload_location.$make_name);
    	$uploadPath = $upload_location.$make_name;

    	ModelsImage::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),
    	]);

	 } // end foreach

    $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
