<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Auth;
class BrandController extends Controller
{
    public function view_brand(){
        $view_brands = Brand::all();
        return view('backend.brand.view_brand', compact('view_brands'));
    }
    public function add_brand(){
        return view('backend.brand.add_brand');
    }
    public function store_brand(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:brands',
        ]);
        $data = new Brand();
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->save();
        $notification = array(
            'message' => 'Brand Save Successfully',
            'alert-type' => 'success'
        );
        return redirect('brand/add')->with($notification);
    }
    public function edit_brand($id){
        $edit_brand = Brand::find($id);
        return view('backend.brand.add_brand', compact('edit_brand'));
    }
    public function update_brand(Request $request, $id){
        $validatedData = $request->validate([
            'name'=>'required|unique:brands',
        ]);
        $data = Brand::find($id);
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->update();
        $notification = array(
            'message' => 'Brand Update Successfully',
            'alert-type' => 'info'
        );
        return redirect('brand/view')->with($notification);
    }
    public function delete_brand($id){
        $delete_brand = Brand::find($id);
        $delete_brand->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('brand/view')->with($notification);
    }
}
