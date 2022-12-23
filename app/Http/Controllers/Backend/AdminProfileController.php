<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile() {

        $adminData = Admin::find(1);
        return view('admin.admin_profile', compact('adminData'));

    }

    public function AdminProfileEdit() {

        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));

    }

    public function AdminProfileStore(Request $request) {

        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);

    }

    public function AdminChangePassword() {

        return view('admin.admin_change_password');

    }

    public function AdminUpdatePassword(Request $request) {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->newpassword);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else {
            return redirect()->back();
        }


    }



}
