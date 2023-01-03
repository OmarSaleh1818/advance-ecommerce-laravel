<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    

    public function ManageSlider() {

        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));

    }

    public function SliderStore(Request $request) {

        $request->validate([

            'slider_image' => 'required',
        ],[
            'slider_image.required' => 'Please Select One Image',
        ]
        );

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen ;

        Slider::insert([
            'slider_image' => $save_url,
            'title' => $request->title,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Your Slider Image Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function SliderEdit($id) {

        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));

    }

    public function SliderUpdate(Request $request) {

        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_image')) {
            @unlink($old_img);
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen ;
    
            Slider::findOrFail($slider_id)->update([
                'slider_image' => $save_url,
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            $notification = array(
                'message' => 'Your Slider Image Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage.slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);
    
            $notification = array(
                'message' => 'Slider Updated without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage.slider')->with($notification);
        }

    }

    public function SliderDelete($id) {

        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Slider Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderInactive($id) {

        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Your Slider Inactive',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderActive($id) {

        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Your Slider Active',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
