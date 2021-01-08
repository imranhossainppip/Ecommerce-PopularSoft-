<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.view_profile', compact('user'));
    }
    public function edit(){
        $id = Auth::user()->id;
        $edit_data = User::find($id);
        return view('backend.profile.edit_profile', compact('edit_data'));
    }
    public function update(Request $request){
        $data = User::find(Auth::user()->id);
        $photo = $request->file('image');
        if($request->file('image')){
            $photo = $request->file('image');
            @unlink(public_path('backend/upload/',$data->image));
            $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
            $location = 'backend/upload/';
            $img_url = $location.$photo_full_name;
            $photo->move($location, $photo_full_name);
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['mobile'] = $request['mobile'];
            $data['address'] = $request['address'];
            $data['gender'] = $request['gender'];
            $data['image'] = $img_url;
            $data->update();
        }else{
            $data = User::find(Auth::user()->id);
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['mobile'] = $request['mobile'];
            $data['address'] = $request['address'];
            $data['gender'] = $request['gender'];
            $data->update();
        }

        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect('profile/view')->with($notification);
    }
    public function password_change(){
        return view('backend.user.edit_password');
    }
    public function store_password(Request $request){
        $validatedData = $request->validate([
            'current_password'=>'required',
            'new_password' => 'required|min:5|max:25',
            'confirm_password' => 'required|min:5|max:25|same:new_password',
        ]);
        if(Auth::attempt(['id' =>Auth::user()->id, 'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request['new_password']);
            $user->save();
            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('profile.view')->with($notification);
        }else{
            $notification = array(
                'message' => 'Sorry your current password does not match',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
}
