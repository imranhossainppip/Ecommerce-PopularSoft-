@extends('backend.master')
@section('title')
    eCommerce-PS
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">

                        <div class="card-header">
                            <h3>Contact List
                                @if($countContact<1)
                                <a href="{{route('add.contact')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus-circle"></i>Add Contact</a> 
                                @endif
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Address</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Youtube</th>
                                    <th>Google Plus</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php $i=1?>
                                <tbody>
                                @foreach($all_data as $contact)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$contact->address}}</td>
                                        <td>{{$contact->mobile_no}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->facebook}}</td>
                                        <td>{{$contact->twitter}}</td>
                                        <td>{{$contact->youtube}}</td>
                                        <td>{{$contact->google_plus}}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm mr-1" href="{{route('edit.contact', $contact->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm mr-1" id="delete" href="{{route('delete.contact', $contact->id)}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection
