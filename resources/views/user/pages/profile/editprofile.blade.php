@extends('user.app')
@section('pagescontent')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Edit Profile!</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile Edit</li>
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
                <div id="successMessage">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="tab-pane active" id="gen_settings">
                                <div class="text-center mb-4">
                                    <img id="image" class="img-circle" src="{{ asset(Auth::user()->profile_image_url) }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:150px;width:150px">
                                </div>
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input required="" name="name" value="{{ Auth()->user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter New Name">
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input required="" name="email" value="{{ Auth()->user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter New Email">
                                            @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Change Image</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input name="image" autocomplete="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                @error('image')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="change-password-visibility" class="col-sm-3 col-form-label">Change Password?</label>
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" value="0" name="isPasswordChange">
                                            <div class="icheck-success d-inline">
                                                <input value="1" @if(session()->has('error')) checked @endif @error('current_password') checked @enderror || @error('password') checked @enderror name="isPasswordChange" type="checkbox" id="change-password-visibility">
                                                <label for="change-password-visibility">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="password_visibility" class="@if(session()->has('error')) d-block @endif @error('current_password') d-block @enderror || @error('password') d-block @enderror d-none">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Current Password</label>
                                            <div class="col-sm-9">
                                                <input name="current_password" type="password" value="" class="form-control @if(session()->has('error')) is-invalid @endif @error('current_password') is-invalid @enderror" placeholder="Enter Current Password">
                                                @error('current_password')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                @if(session()->has('error'))
                                                    <span class="error invalid-feedback"> {{ session()->get('error') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password">
                                                @error('password')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password">
                                                @error('password_confirmation')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update Profile</button>
                                        </div>
                                    </div>
                                </form>
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
@section('js')
<!-- Custom Script -->
<script>
    $('#change-password-visibility').change(function() {
        var value = $(this).prop('checked') == true ? 1 : 0;

        if (value == 1) {
            $('#password_visibility').addClass('d-block')
            $('#password_visibility').removeClass('d-none')
        } else {
            $('#password_visibility').addClass('d-none')
            $('#password_visibility').removeClass('d-block')
        }
    });
    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 3000);
</script>
@endsection


















