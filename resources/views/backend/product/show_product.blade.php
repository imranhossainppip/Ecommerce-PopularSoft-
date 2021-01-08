@extends('backend.master')
@section('title')
    Show Product
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <!-- Left col -->
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Product Details Info
                                    <a href="{{route('add_product')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus-circle"></i>Add product</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="50%">Category</td>
                                            <td width="50%">{{$show_product->category->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Brand</td>
                                            <td width="50%">{{$show_product->brand->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Product Name</td>
                                            <td width="50%">{{$show_product->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Price</td>
                                            <td width="50%">{{$show_product->price}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Short Description</td>
                                            <td width="50%">{{$show_product->short_description}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Long Description</td>
                                            <td width="50%">{{$show_product->long_description}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Image</td>
                                            <td width="50%"><img src="{{url($show_product->image)}}" height="50px" width="50px"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Color</td>
                                            <td width="50%">
                                                @php
                                                  $colors = App\Model\ProductColor::where('product_id', $show_product->id)->get();
                                                @endphp
                                                @foreach($colors as $c)
                                                    {{$c['color']['name']}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Size</td>
                                            <td width="50%">@php
                                                    $sizes = App\Model\ProductSize::where('product_id', $show_product->id)->get();
                                                @endphp
                                                @foreach($sizes as $s)
                                                    {{$s['size']['name']}},
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Sub Image</td>
                                            <td width="50%">
                                                @php
                                                    $subImage = App\Model\ProductSubImage::where('product_id', $show_product->id)->get();
                                                @endphp
                                                @foreach($subImage as $sub)
                                                    <img src="{{url($sub->sub_image)}}" height="50px" width="50px">
                                                @endforeach</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
