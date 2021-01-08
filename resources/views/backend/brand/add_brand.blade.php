@extends('backend.master')
@section('title')
    @if(@$edit_brand)
    Edit Brand
    @else
        Add Brand
    @endif

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
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
                                @if(isset($edit_brand))
                                    <h3>Edit Brand
                                        <a href="{{route('view_brand')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Brand List</a>
                                    </h3>
                                @else
                                    <h3>Add Brand
                                        <a href="{{route('view_brand')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Brand List</a>
                                    </h3>
                                    @endif
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{(@$edit_brand)?route('update_brand', $edit_brand->id):route('store_brand')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-8 offset-2">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" name="name" id="brand_name" value="{{@$edit_brand->name}}" class="form-control" placeholder="Brand Name....">
                                        <font style="color: red">
                                            {{($errors->has('name'))?($errors->first('name')):""}}
                                        </font>
                                    </div>
                                    <div class="form-group col-md-8 offset-2">
                                        <button type="submit" class="btn btn-sm btn-primary">{{(@$edit_brand)?"update":"submit"}}</button>
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

