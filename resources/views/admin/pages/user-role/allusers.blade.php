@extends('admin.app')
@section('title')
    All Users
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="Users!" data2="Home" data3="Users" />
    <!-- /.content-header -->
    <!-- Main content -->
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
                    <h3 class="card-title">All Users</h3>
                    <div class="card-tools">
                        {{-- <form action="{{ $searchRoute }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" value="{{ $term }}" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </form> --}}
                    </div>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                            #
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Role
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ( $users as $user)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->roles->count() > 0)
                                                        @foreach ($user->roles as $role)
                                                            <div class="p-2 badge badge-success">
                                                                {{ $role->name }}
                                                            </div>
                                                        @endforeach
                                                        @else
                                                        Empty
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.users.edit',$user) }}" class="btn btn-primary btn-sm mr-1">Edit</a>

                                                    <form id="ddelete-form" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="odd">
                                            <td colspan="6" class="text-center dtr-control sorting_1" tabindex="0">No User !</td>
                                        </tr>
                                    @endif
                                </tbody>
                        </table>
                        </div>
                        <div class="@if ($users->count() > 0) border-top @endif d-flex row justify-content-center">
                            @if ($users->count() > 0)
                                <div class="mt-3 mb-2 col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Viewing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                                    </div>
                                </div>
                            @endif
                            <div class="@if ($users->count() > 0) mt-3 @endif d-flex justify-content-center col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection












