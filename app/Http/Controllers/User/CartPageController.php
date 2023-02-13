<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    
    public function MyCartPage() {

        return view('frontend.mycart.view_cart');

    }

    public function MyCartProduct() {

        $carts = Cart::content();

        $cartQty = Cart::count();

        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    }

    public function CouponApply(Request $request) {

        $coupon = Coupon::where('coupon_name', $request->coupon_name)
        ->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);

            return response()->json(array(
                'sucess' => 'Coupon Apply Successfully'
            ));

        }else {
            return response()->json(['error' => 'Invalid Coupon']);

        }

    }


}
