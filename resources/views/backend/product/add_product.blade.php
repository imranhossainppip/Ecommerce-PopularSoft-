@extends('backend.master')
@section('title')
    @if(@$edit_product)
    Edit Product
    @else
        Add Product
    @endif

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                @if(isset($edit_product))
                                    <h3>Edit Product
                                        <a href="{{route('view_product')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>product List</a>
                                    </h3>
                                @else
                                    <h3>Add product
                                        <a href="{{route('view_product')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>product List</a>
                                    </h3>
                                    @endif
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{(@$editData)?route('update_product', @$editData->id):route('store_product')}}" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="product_name">Category</label>
                                            <select name="category_id" id="product_id" class="form-control">
                                                <option disabled="" selected="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="product_name">Brand</label>
                                            <select name="brand_id" id="product_id" class="form-control">
                                                <option disabled="" selected="">Select Brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" {{(@$editData->brand_id == $brand->id)?"selected":""}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" name="name" id="name" value="{{@$editData->name}}" class="form-control" placeholder="Product Name....">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Color</label>
                                            <select name="color_id[]" class="form-control select2" multiple>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}" {{(@in_array(['color_id'=>$color->id], $color_array))?"selected":""}}>{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sizes</label>
                                            <select name="size_id[]" class="form-control select2" multiple>
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id], $size_array))?"selected":""}}>{{$size->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Short Description</label>
                                            <textarea name="short_description" class="form-control">{{@$editData->short_description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Long Description</label>
                                            <textarea name="long_description" class="form-control" rows="5">{{@$editData->long_description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Price</label>
                                            <input type="number" value="{{@$editData->price}}" name="price" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <img id="showImage" src="{{(!empty($editData->image))?url($editData->image):url('backend/upload/02.png')}}" style="width: 100px; height: 100px; border: 1px solid #000;">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Sub Image</label>
                                            <input type="file" name="sub_image[]" id="sub_image[]" class="form-control" multiple>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-sm btn-primary">{{(@$editData)?"update":"submit"}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

