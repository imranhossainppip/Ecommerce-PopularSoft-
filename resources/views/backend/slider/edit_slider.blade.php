@extends('backend.master')
@section('title')
    Edit Slider
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Slider</li>

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
                                <h3>Edit Slider
                                    <a href="{{route('view.slider')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Slider List
                                    </a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('update.slider', $edit_slider->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="short_description">Short Description</label>
                                            <input type="text" name="short_description" value="{{$edit_slider->short_description}}" class="form-control" id="short_description">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="long_description">Long Description</label>
                                            <input type="text" name="long_description" value="{{$edit_slider->long_description}}" class="form-control" id="long_description">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Image</label>
                                            <input type="file" name="image" value="" class="form-control" id="image">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{url($edit_slider->image)}}" alt="no image" style="width: 150px; height: 160px; border: 1px solid #000;">
                                        </div>

                                        <div class="form-group col-md-2" style="margin-top: 30px">
                                            <input type="submit" class="btn btn-sm btn-primary" value="update">
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
