<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Size;
use Auth;

class SizeController extends Controller
{
    public function view_size(){
        $view_sizes = Size::all();
        return view('backend.size.view_size', compact('view_sizes'));
    }
    public function add_size(){
        return view('backend.size.add_size');
    }
    public function store_size(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:sizes',
        ]);
        $data = new size();
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->save();
        $notification = array(
            'message' => 'size Save Successfully',
            'alert-type' => 'success'
        );
        return redirect('size/add')->with($notification);
    }
    public function edit_size($id){
        $edit_size = size::find($id);
        return view('backend.size.add_size', compact('edit_size'));
    }
    public function update_size(Request $request, $id){
        $validatedData = $request->validate([
            'name'=>'required|unique:sizes',
        ]);
        $data = size::find($id);
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->update();
        $notification = array(
            'message' => 'size Update Successfully',
            'alert-type' => 'info'
        );
        return redirect('size/view')->with($notification);
    }
    public function delete_size($id){
        $delete_size = size::find($id);
        $delete_size->delete();
        $notification = array(
            'message' => 'size Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('size/view')->with($notification);
    }
}
