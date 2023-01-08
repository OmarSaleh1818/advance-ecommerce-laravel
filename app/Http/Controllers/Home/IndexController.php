<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\MultiImage;
use Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    
    public function Index() {

        $products = Product::where('status', 1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id','DESC')->limit(6)->get();
        return view('frontend.index', compact('products', 'featured'));

    }

    public function UserLogout() {

        Auth::logout();
        return redirect()->route('login');

    }

    public function UserProfile() {

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));

    }

    public function UserProfileStore(Request $request) {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/user_images/' . $data->profile_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images',$filename));
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Your Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function ChangePassword() {

        return view('frontend.profile.change_password');

    }

    public function UserPasswordUpdate(Request $request) {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else {
            return redirect()->back();
        }

    }

    public function ProductDetails($id,$slug) {

        $product = Product::findOrFail($id);
        $multiimage = MultiImage::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('product', 'multiimage'));

    }
    


}
