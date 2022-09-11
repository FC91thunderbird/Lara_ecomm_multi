<?php

namespace App\Http\Controllers\frontend\user;

use App\Models\wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $product_id)
    {
        if(Auth::check()){
            $exists = wishlist::where('user_id', Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){
            wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                ]);
                return response()->json([
                    'success' => 'Product added to your wishlist',
                    'alert-type'=>'success'
                ]);
            }else{
                return response()->json([
                    'error' => 'Product alreay exits to your wishlist',
                    'alert-type'=>'warning'
                ]);
            }

        }else{
            return response()->json([
                'error' => 'At First Login Your Account!!!',
                'alert-type'=>'warning'
            ]);
        }
    }

    public function Countwishlist()
    {
        if(Auth::check()){
            $wishCount = wishlist::where('user_id', Auth::id())->count('product_id');

            return response()->json([
                'wishCount' => $wishCount,
            ], 200);
            
        }else{
            return response()->json([
                'error' => 'At First Login Your Account!!!',
                'alert-type'=>'warning'
            ]);
        }
    }

    public function listWishList()
    {
        if(Auth::check()){
            $wishlists = Wishlist::with(['products'])->where('user_id', Auth::id())->latest()->paginate(5);
        }else{
            $wishlists = [];
        }
        //return $wishlists;
        return view('frontend.content.wishlist', compact('wishlists'));
    }
}
