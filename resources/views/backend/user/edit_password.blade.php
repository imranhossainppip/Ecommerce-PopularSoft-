@extends('backend.master')
@section('title')
    Edit Password
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Password</li>

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
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Password
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('store.password')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter Your Current Password">
                                            <font style="color: red">
                                                {{($errors->has('current_password'))?($errors->first('current_password')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="new_password">New Password</label>
                                            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter Your New Password">
                                            <font style="color: red">
                                                {{($errors->has('new_password'))?($errors->first('new_password')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
                                            <font style="color: red">
                                                {{($errors->has('confirm_password'))?($errors->first('confirm_password')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-6">
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
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
