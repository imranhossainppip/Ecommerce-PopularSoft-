@extends('backend.master')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>

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
                                <h3>Add User
                                    <a href="{{route('users_view')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>View User</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('user.update', $editUsers->id)}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="usertype">User Role</label>
                                            <select name="usertype" id="usertype" class="form-control">
                                                <option value=" Admin" {{($editUsers->usertype=="Admin")?"selected":""}}>Admin</option>
                                                <option value="User" {{($editUsers->usertype=="User")?"selected":""}}>User</option>
                                            </select>
                                            <font style="color: red">
                                                {{($errors->has('usertype'))?($errors->first('usertype')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{$editUsers->name}}" class="form-control" id="name" placeholder="Enter name">
                                            <font style="color: red">
                                                {{($errors->has('name'))?($errors->first('name')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$editUsers->email}}" class="form-control" id="email" placeholder="Enter email">
                                            <font style="color: red">
                                                {{($errors->has('email'))?($errors->first('email')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="submit" class="btn btn-sm btn-primary" value="update">
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
