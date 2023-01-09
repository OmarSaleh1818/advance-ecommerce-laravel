<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    
    public function Index() {

        $products = Product::where('status', 1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $special_offers = Product::where('special_offers', 1)->where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals', 1)->where('status',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category0 = Category::skip(0)->first();
        $skip_product0 = Product::where('status',1)->where('category_id', $skip_category0->id)->orderBy('id','DESC')->get();
        $skip_category1 = Category::skip(1)->first();
        $skip_product1 = Product::where('status',1)->where('category_id', $skip_category1->id)->orderBy('id','DESC')->get();
        return view('frontend.index', compact('products', 'featured', 'special_offers', 'special_deals', 'skip_product0', 'skip_product1'));

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
