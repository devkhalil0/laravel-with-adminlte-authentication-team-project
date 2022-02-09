@extends('user.app')
@section('title')
    Student Email Verify
@endsection
@section('css')
@endsection
@section('pagescontent')
    <!-- Content Header (Page header) -->
    <x-page-header data1="Student Email Verify!" data2="Home" data3="Email Verify" />
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="justify-content-center row">
                <!-- left column -->
                <div class="col-sm-12 col-md-6">
                  <!-- general form elements -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($student->avatar_url) }}" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">{{ $student->name }}</h3>
                                            <p class="text-muted text-center">{{ $student->email }}</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item" style="border-bottom: none;">
                                                    @if (session('resent'))
                                                        <div class="alert alert-success">
                                                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                                            <strong>
                                                                A fresh verification link has been sent to your email address.
                                                            </strong>
                                                            <br>
                                                            <p>
                                                                Before proceeding, please check your email for a verification link.
                                                                <br>
                                                                If you did not receive the email.
                                                            </p>
                                                        </div>
                                                    @else
                                                        <strong>
                                                            Dear, {{ $student->name }} Your email is not verified !
                                                        </strong>
                                                        <br>
                                                        <p>
                                                            Please click on the button below to get the verification link in your email.
                                                        </p>
                                                    @endif
                                                </li>
                                            </ul>
                                            <a href="{{ route('students.sendLink',$student) }}" class="btn btn-primary btn-block">
                                                <b>
                                                    @if(session()->has('resent'))
                                                        {{ session()->get('resent') }}
                                                    @else
                                                        Send Link
                                                    @endif
                                                </b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
