<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    
    public function AddToWishlist(Request $request, $product_id) {

        if (Auth::check()) {
          
            $exist = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exist) {

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
    
                return response()->json(['success' => 'Successfuly Added In Your Wishlist']);

            } else {
                return response()->json(['error' => 'This Product Has Already on Your Wishlist']);
            }
            
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
        
    }

    public function WishlistPage() {

        return view('frontend.wishlist.view_wishlist');

    }

    public function GetWishlistProduct() {

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);

    }

    public function RemoveWishlist($id) {

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Your Cart Removed Successfully']);

    }

}
