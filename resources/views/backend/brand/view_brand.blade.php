@extends('backend.master')
@section('title')
    View Category
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                                <h3>Brand List
                                    <a href="{{route('add_brand')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus-circle"></i>Add Brand</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="6%">S.N</th>
                                        <th>Category Name</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                    </thead>
                                    <?php $i=1?>
                                    <tbody>
                                    @foreach($view_brands as $view_brand)
                                        @php
                                            $count_brand = App\Model\Product::where('brand_id', $view_brand->id)->count();
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$view_brand->name}}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm mr-1" href="{{route('edit_brand', $view_brand->id)}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if($count_brand<1)
                                                <a class="btn btn-danger btn-sm mr-1" id="delete" href="{{route('delete_brand', $view_brand->id)}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                    @endif
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
