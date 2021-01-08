@extends('backend.master')
@section('title')
    Edit Profile
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>

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
                                <h3>Edit Profile
                                    <a href="{{route('profile.view')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Your Profile/a>
                                    </a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('profile.update', $edit_data->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{$edit_data->name}}" class="form-control" id="name" placeholder="Enter name">
                                            <font style="color: red">
                                                {{($errors->has('name'))?($errors->first('name')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$edit_data->email}}" class="form-control" id="email" placeholder="Enter email">
                                            <font style="color: red">
                                                {{($errors->has('email'))?($errors->first('email')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Mobile</label>
                                            <input type="number" name="mobile" value="{{$edit_data->mobile}}" class="form-control" id="mobile" placeholder="Enter mobile">
                                            <font style="color: red">
                                                {{($errors->has('mobile'))?($errors->first('mobile')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Adress</label>
                                            <input type="text" name="address" value="{{$edit_data->address}}" class="form-control" id="address" placeholder="Enter address">
                                            <font style="color: red">
                                                {{($errors->has('address'))?($errors->first('address')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="usertype">Gender</label>
                                            <select name="gender" id="usertype" class="form-control">
                                                <option disabled="" selected="">Select Gender</option>
                                                <option value="Male" {{($edit_data->gender=="Male")?"selected":""}}>Male</option>
                                                <option value="Female" {{($edit_data->usertype=="Female")?"selected":""}}>Female</option>
                                            </select>
                                            <font style="color: red">
                                                {{($errors->has('gender'))?($errors->first('gender')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Image</label>
                                            <input type="file" name="image" value="{{$edit_data->image}}" class="form-control" id="image">
                                            <font style="color: red">
                                                {{($errors->has('address'))?($errors->first('address')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="submit" class="btn btn-sm btn-primary" value="update">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <img id="showImage" src="{{(!empty($user->image))?url($user->image):url('backend/upload/02.png')}}" style="width: 150px; height: 160px; border: 1px solid #000;">
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
