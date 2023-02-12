<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingController extends Controller
{
    
    public function ManageDivision() {

        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.shipping.division_view', compact('divisions'));

    }

    public function DivisionStore(Request $request) {

        $request->validate([
            'division_name' => 'required'
        ],[
            'division_name.required' => 'Division Name is Required'
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Division Insertsd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function DivisionEdit($id) {

            $divisions = ShipDivision::findOrFail($id);
            return view('backend.shipping.division_edit', compact('divisions'));

    }

    public function DivisionUpdate(Request $request) {
        
        $request->validate([
            'division_name' => 'required',
        ],[
            'division_name.required' => 'Division Name iS Required',
        ]);

        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Division Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.division')->with($notification);

    }

    public function DivisionDelete($id) {

        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Division Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    //// Start Shipp District /////

    public function ManageDistrict() {

        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.shipping.district_view', compact('divisions', 'districts'));

    }

    public function DistrictStore(Request $request) {

        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required'
        ],[
            'division_id.required' => 'Division Name is Required',
            'district_name.required' => 'District Name is Required'
        ]);

        ShipDistrict::insert([
            'division_id' =>$request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your District Insertsd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function DistrictEdit($id) {

        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistrict::findOrFail($id);
        return view('backend.shipping.district_edit', compact('districts' , 'divisions'));

    }

    public function DistrictUpdate(Request $request) {

        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ],[
            'district_name.required' => 'District Name iS Required',
        ]);

        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.district')->with($notification);

    }

    public function DistrictDelete($id) {

        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your District Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    
    //// End Shipp District /////

    //// Start Ship State /////

    public function ManageState() {

        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShipState::with('division','district')->orderBy('id', 'DESC')->get();
        return view('backend.shipping.state_view', compact('divisions', 'districts', 'states'));

    }

    public function StateStore(Request $request) {

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ],[
            'division_id.required' => 'Division Name is Required',
            'district_id.required' => 'District Name is Required',
            'state_name.required' => 'State Name is Required'
        ]);

        ShipState::insert([
            'division_id' =>$request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your State Insertsd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function StateEdit($id) {

        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShipState::findOrFail($id);
        return view('backend.shipping.state_edit', compact('districts' , 'divisions', 'states'));


    }

    public function StateUpdate(Request $request) {

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ],[
            'division_id.required' => 'Division is Required',
            'district_id.required' => 'District is Required',
            'state_name.required' => 'State Name iS Required',
        ]);

        $state_id = $request->id;

        ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your State Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.state')->with($notification);

    }

    public function StateDelete($id) {

        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your State Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    public function GetDivision($division_id) {

        $district= ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);

    }

    //// End Ship State //////

}
