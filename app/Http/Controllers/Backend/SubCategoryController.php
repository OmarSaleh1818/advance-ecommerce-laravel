<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    
    public function SubCategoryView() {

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'categories'));

    }

    public function SubCategoryStore(Request $request) {

        $request->validate([

            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            
        ],[
            'category_id.required' => 'Category Name Is required',
            'subcategory_name_en.required' => 'English SubCategory Name Is required',
            'subcategory_name_ar.required' => 'Arabic SubCategory Name Is required'
        ]
        );

        SubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ' , '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ' , '-', $request->subcategory_name_ar),
            
        ]);

        $notification = array(
            'message' => 'Your Sub Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function SubCategoryEdit($id) {

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));

    }

    public function SubCategoryUpdate(Request $request) {

        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ' , '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ' , '-', $request->subcategory_name_ar),
            
        ]);

        $notification = array(
            'message' => 'Your SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryDelete($id) {

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your SubCategory Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    


}
