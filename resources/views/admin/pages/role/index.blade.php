@extends('admin.app')
@section('title')
    All Roles
@endsection
@section('css')
@endsection
@section('pagescontent')
    <x-page-header data1="Roles!" data2="Home" data3="Roles" />
    @if(request()->routeIs('admin.roles.index'))
        <section class="content">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div id="successMessage">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">All Roles</h3>
                                <div class="card-tools">
                                    @can('role.create')
                                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-sm">
                                            Create Role
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                @can('role.read')
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                    #
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($roles->count() > 0)
                                                @foreach ( $roles as $rolee)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $rolee->id }}</td>
                                                        <td>
                                                            <div class="p-2 badge badge-success">
                                                                {{ $rolee->name }}
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            @can('role.update')
                                                                <a href="{{ route('admin.roles.edit',$rolee) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                                            @endcan
                                                            @can('role.delete')
                                                                <form id="role-delete-form" action="{{ route('admin.roles.destroy',$rolee) }}" method="POST" class="">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger btn-sm">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="odd">
                                                    <td colspan="6" class="text-center dtr-control sorting_1" tabindex="0">No Roles !</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
     <!--  Crate Option   -->
     @if(auth()->user()->can('role.create') || auth()->user()->can('role.update'))
        @if(request()->routeIs('admin.roles.create') || request()->routeIs('admin.roles.edit'))
            <section class="content">
                <div class="container-fluid">
                    <div class="justify-content-center row">
                        <!-- left column -->
                        <div class="col-sm-12 col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                <h3 class="card-title">@if(request()->routeIs('admin.roles.edit')) Role Update @else Add New Role @endif</h3>
                                </div>
                                <form method="POST" @if(request()->routeIs('admin.roles.edit')) action="{{ route('admin.roles.update',$role) }}" @else action="{{ route('admin.roles.store') }}" @endif>
                                    @csrf
                                    @if(request()->routeIs('admin.roles.edit')) @method('PUT') @endif
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" @if(request()->routeIs('admin.roles.edit')) value="{{ $role->name }}" @endif class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Role Name">
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
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
                                                        @if(request()->routeIs('admin.roles.edit'))
                                                            @foreach ($oldPermissions as $old) {{ $old->id == $permission->id ? 'checked' : '' }}
                                                            @endforeach
                                                        @endif
                                                        name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission{{ $permission->id }}">
                                                    <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">Back</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
     @endif
@endsection

@section('js')
    <script>
        $('#allpermission').click(function(){

            if($(this).prop('checked', this.checked)){

                $('input:checkbox').not(this).prop('checked', this.checked);

            }else{
                $('input:checkbox').not(this).prop('checked', false);
            }


        })
    </script>
@endsection



