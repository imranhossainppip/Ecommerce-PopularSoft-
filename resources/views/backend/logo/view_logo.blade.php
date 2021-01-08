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
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">

                            <div class="card-header">
                                <h3>Logo List
                                    @if($counts_logo<1)
                                    <a href="{{route('add.logo')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus-circle"></i>Add Logo</a>
                                    @endif
                                </h3>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <?php $i=1?>
                                    <tbody>
                                    @foreach($all_logos as $all_logo)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><img src="{{url($all_logo->image)}}" style="height: 80px; width: 80px"></td>
                                            <td>
                                                <a class="btn btn-success btn-sm mr-1" href="{{route('edit.logo', $all_logo->id)}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a title="delete" class="btn btn-danger btn-sm mr-1" id="delete" href="{{route('delete.logo', $all_logo->id)}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
    <!-- /.content-wrapper -->
@endsection
