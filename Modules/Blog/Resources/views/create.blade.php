@extends('user.app')
@section('title')
    Blog Create
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="Blog Add!" data2="Home/ Modules" data3="Blog Add" />
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
                    <form method="POST" action="{{ route('blogs.store') }}" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titile">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Blog Title">
                                @error('title')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea type="text" name="body" cols="2" rows="5" class="form-control @error('body') is-invalid @enderror" id="email" placeholder="Blog Description"></textarea>
                                @error('body')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('blogs.index') }}" class="btn btn-danger">Back</a>
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
