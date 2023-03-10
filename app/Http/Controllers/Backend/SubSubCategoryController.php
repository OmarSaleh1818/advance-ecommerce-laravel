<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    
    public function SubSubCategoryView() {

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory', 'categories'));

    }

    public function GetSubCategory($category_id) {

        $subcategory= SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcategory);

    }
    public function GetSubSubCategory($subcategory_id) {

        $subsubcategory= SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcategory);

    }

    public function SubSubCategoryStore(Request $request) {

        $request->validate([

            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
            
        ],[
            'category_id.required' => 'Category Name Is required',
            'subcategory_id.required' => 'SubCategory Name Is required',
            'subsubcategory_name_en.required' => 'English Sub-SubCategory Name Is required',
            'subsubcategory_name_ar.required' => 'Arabic Sub-SubCategory Name Is required'
        ]
        );

        SubSubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ' , '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ar' => str_replace(' ' , '-', $request->subsubcategory_name_ar),
            
        ]);

        $notification = array(
            'message' => 'Your Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


    public function SubSubCategoryEdit($id) {

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.subsubcategory_edit', compact('subcategory', 'categories', 'subsubcategory'));

    }


    public function SubSubCategoryUpdate(Request $request) {

        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ' , '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ar' => str_replace(' ' , '-', $request->subsubcategory_name_ar),
            
        ]);

        $notification = array(
            'message' => 'Your Sub_SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    }

    public function SubSubCategoryDelete($id) {

        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Sub_SubCategory Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    
}
