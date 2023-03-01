<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class CheckoutController extends Controller
{
   
    public function GetDistrict($division_id) {

        $districts = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($districts);
        
    }

    public function GetState($district_id) {

        $states = ShipState::where('district_id', $district_id)->orderBy('state_name', 'DESC')->get();
        return json_encode($states);

    }

    public function CheckoutStore(Request $request) {

        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data'));
        } elseif ($request->payment_method == 'card') {
            return view('frontend.payment.card');
        } else {
            return view('frontend.payment.cash');
        }
        

    }


}
