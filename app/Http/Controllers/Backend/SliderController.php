<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view_slider(){
        $view_sliders = Slider::all();
        return view('backend.slider.view_slider', compact('view_sliders'));
    }
    public function add_slider(){
        return view('backend.slider.add_slider');
    }
    public function store_slider(Request $request){
        $validatedData = $request->validate([
            'short_description'=>'required',
            'long_description' => 'required',
        ]);
        $photo = $request->file('image');
        $data = new Slider();
        if($photo){
            $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
            $location = 'backend/upload/sliders/';
            $image_url = $location.$photo_full_name;
            $photo->move($location, $photo_full_name);
            $data['image'] = $image_url;
            $data['short_description'] = $request['short_description'];
            $data['long_description'] = $request['long_description'];
            $data->save();
        }else{
            $data['short_description'] = $request['short_description'];
            $data['long_description'] = $request['long_description'];
            $data->save();
        }
        $notification = array(
            'message' => 'Slider Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('slider/view')->with($notification);
    }
    public function edit_slider($id){
        $edit_slider = Slider::find($id);
        return view('backend.slider.edit_slider', compact('edit_slider'));
    }
    public function update_slider(Request $request, $id){
        $photo = $request->file('image');
        $data = Slider::findorfail($id);
        if($photo){
            $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
            $location = 'backend/upload/sliders/';
            $image_url = $location.$photo_full_name;
            $photo->move($location, $photo_full_name);
            $data['short_description'] = $request['short_description'];
            $data['long_description'] = $request['long_description'];
            $data['image'] = $image_url;
            $data->update();
        }else{
            $data['short_description'] = $request['short_description'];
            $data['long_description'] = $request['long_description'];
            $data->update();
        }
        $notification = array(
            'message' => 'Update Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('slider/view')->with($notification);
    }
    public function delete_slider($id){
        $delete_slider = Slider::find($id);
        $delete_image = $delete_slider->image;
        unlink($delete_image);
        $delete_slider->delete();
        $notification = array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect('slider/view')->with($notification);
    }
}
