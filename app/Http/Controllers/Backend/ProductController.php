<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Model\Size;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use DB;
use Auth;
class ProductController extends Controller
{
    public function view_product(){
        $view_products = Product::all();
        return view('backend.product.view_product', compact('view_products'));
    }
    public function add_product(){
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view('backend.product.add_product', $data);
    }
    public function store_product(Request $request){
        DB::transaction(function () use($request){
            $validatedData = $request->validate([
                'category_id'=>'required',
                'brand_id'=>'required',
                'name'=>'required',
                'short_description'=>'required',
                'long_description'=>'required',
                'price'=>'required',
            ]);
        });
        $product = new Product();
        $product['category_id'] = $request['category_id'];
        $product['brand_id'] = $request['brand_id'];
        $product['name'] = $request['name'];
        $product['slug'] = str_slug($request->name);
        $product['short_description'] = $request['short_description'];
        $product['long_description'] = $request['long_description'];
        $product['price'] = $request['price'];
        $photo = $request->file('image');
        if($photo){
            $photo_full_name = time() . '.' . $photo->getClientOriginalExtension();
            $location = 'backend/upload/product_images/';
            $img_url = $location . $photo_full_name;
            $photo->move($location, $photo_full_name);
            $product['image'] = $img_url;
        }
        if($product->save()){
            $files = $request->sub_image;
            if (!empty($files)){
                foreach ($files as $file){
                    $photo_full_name = time() . '.' . $file->getClientOriginalExtension();
                    $location = 'backend/upload/product_images/product_sub_images';
                    $img_url = $location . $photo_full_name;
                    $file->move($location, $photo_full_name);
                    $subimage['sub_image'] = $img_url;

                    $subimage = new ProductSubImage();
                    $subimage->product_id = $product->id;
                    $subimage->sub_image = $img_url;
                    $subimage->save();
                }
            }
            $colors = $request->color_id;
            if (!empty($colors)){
                foreach ($colors as $color){
                    $myColor = new ProductColor();
                    $myColor->product_id = $product->id;
                    $myColor->color_id = $color;
                    $myColor->save();
                }
            }
            $sizes = $request->size_id;
            if(!empty($sizes)){
                foreach ($sizes as $size){
                    $mySize = new ProductSize();
                    $mySize->product_id = $product->id;
                    $mySize->size_id = $size;
                    $mySize->save();
                }
            }
            $notification = array(
                'message' => 'Product Save Successfully',
                'alert-type' => 'success'
            );
            return redirect('product/add')->with($notification);
        }else{
            $notification = array(
                'message' => 'Product Not Submitted',
                'alert-type' => 'warning'
            );
            return redirect('product/add')->with($notification);
        }

    }
    public function edit_product($id){
        $data['editData'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id', $data['editData']->id)->orderBy('id', 'asc')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id', $data['editData']->id)->orderBy('id', 'asc')->get()->toArray();
        return view('backend.product.add_product', $data);
    }
    public function update_product(ProductRequest $request, $id){
        DB::transaction(function () use($request){
            $validatedData = $request->validate([
                'category_id'=>'required',
                'brand_id'=>'required',
                'short_description'=>'required',
                'long_description'=>'required',
                'price'=>'required',
            ]);
        });
        $product = Product::find($id);
        $product['category_id'] = $request['category_id'];
        $product['brand_id'] = $request['brand_id'];
        $product['name'] = $request['name'];
        $product['slug'] = str_slug($request->name);
        $product['short_description'] = $request['short_description'];
        $product['long_description'] = $request['long_description'];
        $product['price'] = $request['price'];
        $photo = $request->file('image');
        if($photo){
            //@unlink(public_path('backend/upload/',$data->image));
            //unlink($product->image);
            $photo_full_name = time() . '.' . $photo->getClientOriginalExtension();
            $location = 'backend/upload/product_images/';
            $img_url = $location . $photo_full_name;
            $photo->move($location, $photo_full_name);
            if(file_exists('public/backend/upload/product_images'.$product->image) AND !empty($product->image)){
                unlink('public/backend/upload/product_images/'.$product->image);
            }
            $product['image'] = $img_url;
        }
        if($product->save()){
            $files = $request->sub_image;
            if(!empty($files)){
                $subImage = ProductSubImage::where('product_id', $id)->get()->toArray();
                foreach ($files as $value){
                    if(!empty($value)){
                        unlink('public/backend/upload/product_images/product_sub_image/'.$value['sub_image']);
                    }
                }
                ProductSubImage::where('product_id', $id)->delete();
            }
            if (!empty($files)){
                foreach ($files as $file){
                    $photo_full_name = time() . '.' . $file->getClientOriginalExtension();
                    $location = 'backend/upload/product_images/product_sub_images';
                    $img_url = $location . $photo_full_name;
                    $file->move($location, $photo_full_name);
                    $subimage['sub_image'] = $img_url;

                    $subimage = new ProductSubImage();
                    $subimage->product_id = $product->id;
                    $subimage->sub_image = $img_url;
                    $subimage->save();
                }
            }
            $colors = $request->color_id;
            if(!empty($colors)){
                ProductColor::where('product_id', $id)->delete();
            }
            if (!empty($colors)){
                foreach ($colors as $color){
                    $myColor = new ProductColor();
                    $myColor->product_id = $product->id;
                    $myColor->color_id = $color;
                    $myColor->save();
                }
            }
            $sizes = $request->size_id;
            if (!empty($sizes)){
                ProductSize::where('product_id', $id)->delete();
            }
            if(!empty($sizes)){
                foreach ($sizes as $size){
                    $mySize = new ProductSize();
                    $mySize->product_id = $product->id;
                    $mySize->size_id = $size;
                    $mySize->save();
                }
            }
            $notification = array(
                'message' => 'Product Save Successfully',
                'alert-type' => 'success'
            );
            return redirect('product/add')->with($notification);
        }else{
            $notification = array(
                'message' => 'Product Not Submitted',
                'alert-type' => 'warning'
            );
            return redirect('product/add')->with($notification);
        }
    }
    public function delete_product($id){
        $delete_product = product::find($id);
        if(file_exists('public/backend/upload/product_images'.$delete_product->image) AND !empty($delete_product->image)){
            unlink('public/backend/upload/product_images/'.$delete_product->image);
        }
        $subImage = ProductSubImage::where('product_id', $id)->get()->toArray();
        if(!empty($subImage)){
            foreach ($subImage as $file){
                if(!empty($value)){
                    unlink('public/backend/upload/product_images/product_sub_image/'.$value['sub_image']);
                }
            }
        }
        ProductSubImage::where('product_id', $delete_product->id)->delete();
        ProductColor::where('product_id', $delete_product->id)->delete();
        ProductSize::where('product_id', $delete_product->id)->delete();
        $delete_product->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('product/view')->with($notification);
    }
    public function show_product($id){
        $show_product = Product::find($id);
        return view('backend.product.show_product', compact('show_product'));
    }
}
