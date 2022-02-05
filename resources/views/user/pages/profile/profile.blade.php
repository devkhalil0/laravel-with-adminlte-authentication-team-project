@extends('user.app')
@section('title')
    Profile
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Profile!</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <img id="image" class="profile-user-img img-fluid img-circle" src="{{ asset(Auth::user()->profile_image_url) }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:150px;width:150px">
                                </div>
                                <h3 class="profile-username text-center mb-3">{{ Auth()->user()->name }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email Address</b> <a class="float-right">{{ Auth()->user()->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Registered At</b> <a class="float-right">{{ Auth()->user()->created_at->diffForHumans() }} ( {{ Auth()->user()->created_at->format(' M d, Y ') }} )</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Profile Updated At</b> <a class="float-right">{{ Auth()->user()->created_at->diffForHumans() }} ( {{ Auth()->user()->updated_at->format(' M d, Y ') }} )</a>
                                    </li>
                                </ul>
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block mb-3">
                                            <b>Go To Edit Page </b> <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection




