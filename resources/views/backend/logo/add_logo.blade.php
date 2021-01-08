@extends('backend.master')
@section('title')
    Add Logo
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Logo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Logo</li>

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
                                <h3>Add Logo
                                    <a href="{{route('view.logo')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Logo List
                                    </a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('store.logo')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="email">Image</label>
                                            <input type="file" name="image" value="" class="form-control" id="image">
                                            <font style="color: red">
                                                {{($errors->has('address'))?($errors->first('address')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{(!empty($user->image))?url($user->image):url('backend/upload/02.png')}}" style="width: 150px; height: 160px; border: 1px solid #000;">
                                        </div>

                                        <div class="form-group col-md-6" style="margin-top: 30px">
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

