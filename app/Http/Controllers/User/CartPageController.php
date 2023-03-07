<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

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
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));

        }else {
            return response()->json(['error' => 'Invalid Coupon']);

        }

    }

    public function CouponCalculation() {

        if (Session::has('coupon')) {
            return response()->json(array(

                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount']

            ));
        } else {
            return response()->json(array(

                'total' => Cart::total(),

            ));
        }

    }

    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }

    public function CheckoutCreate() {

        if (Cart::total() > 0) {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();

            $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
            $districts = ShipDistrict::latest()->get();
            $states = ShipState::latest()->get();
            return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 
            'divisions', 'districts', 'states'));
        } else {
            
            $notification = array(
                'message' => 'Sopping At Least One Product',
                'alert-type' => 'error'
            );
            return redirect()->to('/')->with($notification);
        }
        
    }


}
