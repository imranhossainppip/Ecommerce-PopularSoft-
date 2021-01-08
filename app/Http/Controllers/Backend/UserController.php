<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use function Sodium\compare;

class UserController extends Controller
{
    public function userView(){
        $allUsers = User::all();
        return view('backend.user.view_user', compact('allUsers'));
    }
    public function userAdd(){
        return view('backend.user.add_user');
    }
    public function store(Request $request){
        $this->validate($request,[
            'usertype'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);
        $data = new User();
        $data['usertype'] = $request['usertype'];
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['password'] = bcrypt($request['password']);
        $data->save();
        $notification = array(
            'message' => 'User add Successfully',
            'alert-type' => 'success'
        );
        return redirect('user/view')->with($notification);
    }
    public function edit($id){
        $editUsers = User::find($id);
        return view('backend.user.user_edit', compact('editUsers'));
    }
    public function update(Request $request,$id){
        $data = User::find($id);
        $data['usertype'] = $request['usertype'];
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data->update();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'success'
        );
        return redirect('user/view')->with($notification);
    }
    public function delete($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();
        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'warning'
        );
        return redirect('user/view')->with($notification);
    }
}
