@extends('backend.master')
@section('title')
    View Product
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
                                <h3>product List
                                    <a href="{{route('add_product')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus-circle"></i>Add product</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="6%">S.N</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <?php $i=1?>
                                    <tbody>
                                    @foreach($view_products as $view_product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$view_product['category']['name']}}</td>
                                            <td>{{$view_product['brand']['name']}}</td>
                                            <td>{{$view_product->name}}</td>
                                            <td>{{$view_product->price}}</td>
                                            <td><img src="{{url($view_product->image)}}" height="50px" width="50px"></td>
                                            <td>
                                                <a class="btn btn-success btn-sm mr-1" href="{{route('show_product', $view_product->id)}}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success btn-sm mr-1" href="{{route('edit_product', $view_product->id)}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm mr-1" id="delete" href="{{route('delete_product', $view_product->id)}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
