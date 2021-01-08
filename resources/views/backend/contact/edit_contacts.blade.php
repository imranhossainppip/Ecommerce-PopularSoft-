@extends('backend.master')
@section('title')
    Edit Contact
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Contact</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Contact
                                    <a href="{{route('view.contact')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Contact List
                                    </a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('update.contact', $edit_contacts->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" value="{{$edit_contacts->address}}" class="form-control" id="address">
                                            <font style="color: red">
                                                {{($errors->has('address'))?($errors->first('address')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobile_no">Mobile Number</label>
                                            <input type="text" name="mobile_no" value="{{$edit_contacts->mobile_no}}" class="form-control" id="mobile_no">
                                            <font style="color: red">
                                                {{($errors->has('mobile_no'))?($errors->first('mobile_no')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$edit_contacts->email}}" class="form-control" id="email">
                                            <font style="color: red">
                                                {{($errors->has('email'))?($errors->first('email')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="facebook">Facebook</label>
                                            <input type="facebook" name="facebook" value="{{$edit_contacts->facebook}}" class="form-control" id="facebook">
                                            <font style="color: red">
                                                {{($errors->has('facebook'))?($errors->first('facebook')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="twitter">Twitter</label>
                                            <input type="twitter" name="twitter" value="{{$edit_contacts->twitter}}" class="form-control" id="twitter">
                                            <font style="color: red">
                                                {{($errors->has('twitter'))?($errors->first('twitter')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="youtube">Youtube</label>
                                            <input type="youtube" name="youtube" value="{{$edit_contacts->youtube}}" class="form-control" id="youtube">
                                            <font style="color: rgb(41, 40, 40)">
                                                {{($errors->has('youtube'))?($errors->first('youtube')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="google_plus">Google Plus</label>
                                            <input type="google_plus" name="google_plus" value="{{$edit_contacts->google_plus}}" class="form-control" id="google_plus">
                                            <font style="color: rgb(41, 40, 40)">
                                                {{($errors->has('google_plus'))?($errors->first('google_plus')):""}}
                                            </font>
                                        </div>
                                        <div class="form-group col-md-6" style="padding-top: 30px">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection

