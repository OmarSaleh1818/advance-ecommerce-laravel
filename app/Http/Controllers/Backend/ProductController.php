<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImage;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    
    public function AddProduct() {

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));

    }
    
    public function ProductStore(Request $request) {

        $request->validate([

            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_ar' => 'required',
            'product_qty' => 'required',
            'selling_price' => 'required',
            'product_color_en' => 'required',
            'product_color_ar' => 'required',
            'product_thambnail' => 'required',
            'multi_image' => 'required',
            'short_description_en' => 'required',
            'short_description_ar' => 'required',
            
        ],[
            'brand_id.required' => 'Brand Name Is required',
            'category_id.required' => 'Category Name Is required',
            'subcategory_id.required' => 'Subcategory Name Is required',
            'subsubcategory_id.required' => 'Subsubcategory Name Is required',
            'product_name_en.required' => 'Product Name English Is required',
            'product_name_ar.required' => 'Product Name Arabic Is required',
            'product_qty.required' => 'Product Quantity Name Is required',
            'selling_price.required' => 'Selling Price Name Is required',
            'product_color_en.required' => 'Product Color English Is required',
            'product_color_ar.required' => 'Product Color Arabic Is required',
            'product_thambnail.required' => 'Main Image Is required',
            'multi_image.required' => 'Multi Image Is required',
            'short_description_en.required' => 'Short Description English Is required',
            'short_description_ar.required' => 'Short Description Arabic Is required',
        ]
        );

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
        Image::make($image)->resize(917,1000)->save('upload/products/main/'.$name_gen);
        $save_url = 'upload/products/main/'.$name_gen ;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ' , '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ' , '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'selling_price' => $request->selling_price,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'discount_price' => $request->discount_price,
            'product_thambnail' =>  $save_url,
            'short_description_en' => $request->short_description_en,
            'short_description_ar' => $request->short_description_ar,
            'long_description_en' => $request->long_description_en,
            'long_description_ar' => $request->long_description_ar,
            'featured' => $request->featured,
            'special_offers' => $request->special_offers,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ////// Multi Image ///////

        $images = $request->file('multi_image');
        foreach ($images as $multi_image) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(917,1000)->save('upload/products/multi-image/'. $name_gen);

            $uploadPath = 'upload/products/multi-image/' . $name_gen ;

            MultiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now()
            ]);

        }

        ///// End Multi Image /////


        $notification = array(
            'message' => 'Your Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);

    }

    public function ManageProduct() {

        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));

    }

    public function ProductEdit($id) {

        $multiImage = MultiImage::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('multiImage','categories','brands','subcategory','subsubcategory','products'));

    }


    public function ProductUpdate(Request $request) {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ' , '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ' , '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'selling_price' => $request->selling_price,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_ar' => $request->short_description_ar,
            'long_description_en' => $request->long_description_en,
            'long_description_ar' => $request->long_description_ar,
            'featured' => $request->featured,
            'special_offers' => $request->special_offers,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Product Without Image Updated  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.product')->with($notification);

    }

    public function MultiImageUpdate(Request $request) {

        $imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImage::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

	    } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);


    }

    public function MainImageUpdate(Request $request) {

        $pro_id = $request->id;
        $oldImage = $request->old_image;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
        Image::make($image)->resize(917,1000)->save('upload/products/main/'.$name_gen);
        $save_url = 'upload/products/main/'.$name_gen ;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
			'message' => 'Product Main Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

    public function MultiImageDelete($id) {

        $old_image = MultiImage::findOrFail($id);
        unlink($old_image->photo_name);
        
        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Product Image Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductInactive($id) {

        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Your Product Inactive',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductActive($id) {

        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Your Product Active',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductDelete($id) {

        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);

        Product::findOrFail($id)->delete();

        $images = MultiImage::where('product_id', $id);

        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImage::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Your Product Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
