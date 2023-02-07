<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    
    public function ManageCoupon() {

        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.coupon_view', compact('coupons'));

    }

    public function CouponStore(Request $request) {

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ],[
            'coupon_name.required' => 'Coupon Name IS Required',
            'coupon_discount.required' => 'Coupon Discount Is Required',
            'coupon_validity.required' => 'Coupon Validity Is Required'
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' =>$request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Coupon Insertsd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CouponEdit($id) {

        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit', compact('coupon'));

    }

    public function CouponUpdate(Request $request) {

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ],[
            'coupon_name.required' => 'Coupon Name IS Required',
            'coupon_discount.required' => 'Coupon Discount Is Required',
            'coupon_validity.required' => 'Coupon Validity Is Required'
        ]);

        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your coupon Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.coupon')->with($notification);

    }

    public function CouponDelete($id) {

        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Coupon Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



}
