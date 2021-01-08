<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Color;
use Auth;

class ColorController extends Controller
{
    public function view_color(){
        $view_colors = Color::all();
        return view('backend.color.view_color', compact('view_colors'));
    }
    public function add_color(){
        return view('backend.color.add_color');
    }
    public function store_color(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:colors',
        ]);
        $data = new color();
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->save();
        $notification = array(
            'message' => 'Color Save Successfully',
            'alert-type' => 'success'
        );
        return redirect('color/add')->with($notification);
    }
    public function edit_color($id){
        $edit_color = color::find($id);
        return view('backend.color.add_color', compact('edit_color'));
    }
    public function update_color(Request $request, $id){
        $validatedData = $request->validate([
            'name'=>'required|unique:colors',
        ]);
        $data = color::find($id);
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->update();
        $notification = array(
            'message' => 'color Update Successfully',
            'alert-type' => 'info'
        );
        return redirect('color/view')->with($notification);
    }
    public function delete_color($id){
        $delete_color = color::find($id);
        $delete_color->delete();
        $notification = array(
            'message' => 'color Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('color/view')->with($notification);
    }
}
