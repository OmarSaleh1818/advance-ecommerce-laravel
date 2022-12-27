<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function CategoryView() {

        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));

    }

    public function CategoryStore(Request $request) {

        $request->validate([

            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'English Category Name Is required',
            'category_name_ar.required' => 'Arabic Category Name Is required',
            'category_icon.required' => 'Category Icon is required'
        ]
        );

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ' , '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ' , '-', $request->category_name_ar),
            'category_icon' => $request->category_icon
        ]);

        $notification = array(
            'message' => 'Your Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id) {

        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));

    }

    public function CategoryUpdate(Request $request) {

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ' , '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ' , '-', $request->category_name_ar),
            'category_icon' => $request->category_icon
        ]);

        $notification = array(
            'message' => 'Your Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function CategoryDelete($id) {

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Category Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    
}
