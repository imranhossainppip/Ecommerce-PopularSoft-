@extends('backend.master')
@section('title')
    Add Slider
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>Add Slider
                                    <a href="{{route('view.slider')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Slider List
                                    </a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('store.slider')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="short_description">Short Description</label>
                                            <input type="text" name="short_description" class="form-control" id="short_description">
                                            <font style="color: red">
                                                {{($errors->has('short_description'))?($errors->first('short_description')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="long_description">Long Description</label>
                                            <input type="text" name="long_description" class="form-control" id="long_description">
                                            <font style="color: red">
                                                {{($errors->has('long_description'))?($errors->first('long_description')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Image</label>
                                            <input type="file" name="image" value="" class="form-control" id="image">
                                            <font style="color: red">
                                                {{($errors->has('image'))?($errors->first('image')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{(!empty($user->image))?url($user->image):url('backend/upload/02.png')}}" style="width: 150px; height: 160px; border: 1px solid #000;">
                                        </div>

                                        <div class="form-group col-md-2" style="margin-top: 30px">
                                            <input type="submit" class="btn btn-sm btn-primary" value="submit">
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->

                        <!--/.direct-chat -->

                        <!-- TO DO List -->

                        <!-- /.card -->
                    </section>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

