@extends('backend.master')
@section('title')
    eCommerce-PS
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>

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
                    <!-- Left col -->
                    <section class="col-md-6 offset-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{(!empty($user->image))?url($user->image):url('backend/upload/02.png')}}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>
                                <p class="text-muted text-center">{{$user->address}}</p>
                                <table width="100%" class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>User Type</td>
                                        <td>{{$user->usertype}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td>{{$user->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="{{route('profile.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
