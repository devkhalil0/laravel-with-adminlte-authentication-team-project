@extends('user.app')
@section('title')
    Student Create
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Student Add!</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Student Add</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="justify-content-center row">
                <!-- left column -->
                <div class="col-sm-12 col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add New</h3>
                    </div>
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Student Name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Student Email">
                                @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-left" for="exampleInputFile">File input</label>
                                <div class="custom-file">
                                    <input name="image" autocomplete="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div id="defaulthide" class="d-none text-center mb-4">
                                <img id="image" class="img-circle" src="" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:150px;width:150px">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('students.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
<script>
    $('#customFile').change( function(event) {
        $('#defaulthide').addClass('d-block')
        $('#defaulthide').removeClass('d-none')
    });
</script>
@endsection
