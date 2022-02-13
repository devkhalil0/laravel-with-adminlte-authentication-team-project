@extends('admin.app')
@section('title')
    Users Edit
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="User Edit!" data2="Home" data3="User Edit" />
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
                      <h3 class="card-title">Edit User</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" placeholder="user Name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="email" placeholder="user Email">
                                @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Role</label>
                                <select name="roles[]" class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select a role" style="width: 100%;" aria-hidden="true">
                                    @foreach ($roles as $role)
                                        <option
                                            @foreach ($user->roles as $old) {{ $old->id == $role->id ? 'selected' : '' }}
                                            @endforeach
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Give Permissions</label>
                                <div class="form-check mt-1">
                                    <input type="checkbox" class="form-check-input" id="allpermission">
                                    <label class="form-check-label" for="allpermission">All Permission</label>
                                </div>
                                <hr>
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox"
                                            @foreach ($user->permissions as $old) {{ $old->id == $permission->id ? 'checked' : '' }}
                                            @endforeach
                                            name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission{{ $permission->id }}">
                                        <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
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
<script src="{{ asset('backend/js/adminltemultiselect.js') }}"></script>
<script>

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })

    // for checkbox
    $('#allpermission').click(function(){

        if($(this).prop('checked', this.checked)){

            $('input:checkbox').not(this).prop('checked', this.checked);

        }else{
            $('input:checkbox').not(this).prop('checked', false);
        }


    })
  </script>
@endsection
