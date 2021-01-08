<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function view_category(){
        $view_categories = Category::all();
        return view('backend.category.view_category', compact('view_categories'));
    }
    public function add_category(){
        return view('backend.category.add_category');
    }
    public function store_category(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:categories',
        ]);
        $data = new Category();
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->save();
        $notification = array(
            'message' => 'Category Save Successfully',
            'alert-type' => 'success'
        );
        return redirect('category/add')->with($notification);
    }
    public function edit_category($id){
        $edit_category = Category::find($id);
        return view('backend.category.add_category', compact('edit_category'));
    }
    public function update_category(Request $request, $id){
        $validatedData = $request->validate([
            'name'=>'required|unique:categories',
        ]);
        $data = Category::find($id);
        $data['created_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data->update();
        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'info'
        );
        return redirect('category/view')->with($notification);
    }
    public function delete_category($id){
        $delete_category = Category::find($id);
        $delete_category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('category/view')->with($notification);
    }
}
