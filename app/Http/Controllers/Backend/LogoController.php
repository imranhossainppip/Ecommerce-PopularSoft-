<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;
use App\User;
class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_logo(){
        $all_logos = Logo::all();
        $counts_logo = $all_logos->count();
        return view('backend.logo.view_logo', compact('all_logos', 'counts_logo'));
    }
    public function add_logo(){
        return view('backend.logo.add_logo');
    }
    public function store_logo(Request $request){
        $photo = $request->file('image');
        $data = new Logo();
        $data['created_by'] = Auth::user()->id;
        $photo_full_name = time() . '.' . $photo->getClientOriginalExtension();
        $location = 'backend/upload/logo_images/';
        $img_url = $location . $photo_full_name;
        $photo->move($location, $photo_full_name);
        $data['image'] = $img_url;
        $data->save();
        $notification = array(
            'message' => 'Logo Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('logo/view')->with($notification);
    }
    public function edit_logo($id){
        $edit_logo = Logo::find($id);
        return view('backend.logo.edit_logo', compact('edit_logo'));
    }
    public function update_logo(Request $request,$id){
        $data = Logo::find($id);
        $data['updated_by'] = Auth::user()->id;
        $photo = $request->file('image');
        $photo_full_name = time() . '.' . $photo->getClientOriginalExtension();
        $location = 'backend/upload/logo_images/';
        $img_url = $location . $photo_full_name;
        $photo->move($location, $photo_full_name);
        $data['image'] = $img_url;
        $data->update();
        $notification = array(
            'message' => 'Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('logo/view')->with($notification);
    }
    public function delete_logo($id){
        $delete_logo = Logo::find($id);
        $photo = $delete_logo->image;
        unlink($photo);
        $delete_logo->delete();
        $notification = array(
            'message' => 'Logo Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('logo/view')->with($notification);
    }
}
