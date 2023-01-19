<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImage;
use Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    
    public function Index() {

        $products = Product::where('status', 1)->orderBy('id','DESC')->get();
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

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',', $size_ar);

        $cat_id = $product->category_id;
        $related_product = Product::where('status',1)->where('category_id', $cat_id)->where(
            'id','!=',$id)->orderBy('id', 'DESC')->get();

        $multiimage = MultiImage::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('product', 'product_color_en', 'product_color_ar',
        'product_size_en', 'product_size_ar', 'multiimage', 'related_product'));

    }

    public function TagsProduct($tag) {

        $products = Product::where('status', 1)->where('product_tags_en', $tag)->where(
            'product_tags_ar', $tag)->orderBy('id','DESC')->paginate(5);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tag.tags_view', compact('products', 'categories'));

    }

    public function SubCatProduct($subcat_id) {

        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id','DESC')->paginate();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.product.subcategory_view', compact('products', 'categories'));

    }
    
    public function SubSubCatProduct($subsubcat_id, $slug) {

        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));

    }

    public function ProductViewAjax($id) {

        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color_en = explode(',' , $color);

        $size = $product->product_size_en;
        $product_size_en = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color_en,
            'size' => $product_size_en
        ));

    } 


}
