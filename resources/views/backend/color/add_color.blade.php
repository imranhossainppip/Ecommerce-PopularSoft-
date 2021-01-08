@extends('backend.master')
@section('title')
    @if(@$edit_color)
    Edit color
    @else
        Add color
    @endif

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage color</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">color</li>
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
                                @if(isset($edit_color))
                                    <h3>Edit color
                                        <a href="{{route('view_color')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>color List</a>
                                    </h3>
                                @else
                                    <h3>Add color
                                        <a href="{{route('view_color')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>color List</a>
                                    </h3>
                                    @endif
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{(@$edit_color)?route('update_color', $edit_color->id):route('store_color')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-8 offset-2">
                                        <label for="color_name">color Name</label>
                                        <input type="text" name="name" id="color_name" value="{{@$edit_color->name}}" class="form-control" placeholder="color Name....">
                                        <font style="color: red">
                                            {{($errors->has('name'))?($errors->first('name')):""}}
                                        </font>
                                    </div>
                                    <div class="form-group col-md-8 offset-2">
                                        <button type="submit" class="btn btn-sm btn-primary">{{(@$edit_color)?"update":"submit"}}</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

