@extends('user.app')
@section('title')
    All Students
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Students!</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Students</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
                      <h3 class="card-title">All Students</h3>
                      <div class="card-tools">
                        <form action="{{ route('students.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="search" @if (request()->routeIs('students.search')) value="{{ $term }}" @endif class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </form>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                    Password
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                    Avatar
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->count() > 0)
                                @foreach ( $students as $student)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        {{-- <td>{{ encrypt($student->password) }}</td> --}}
                                        <td>Hidden</td>
                                        <td>
                                            <img src="{{ asset($student->avatar_url) }}" style="width: 20%" class="user-image img-circle elevation-2" alt="">
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('students.edit',$student->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <a href="{{ route('students.destroy',$student->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                            <form id="delete-form" action="{{ route('students.destroy',$student->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="odd">
                                    <td colspan="6" class="text-center dtr-control sorting_1" tabindex="0">No Student !</td>
                                </tr>
                            @endif
                        </tbody>
                      </table>
                    </div>
                        <div class="@if ($students->count() > 0) border-top @endif d-flex row justify-content-center">
                            @if ($students->count() > 0)
                                <div class="mt-3 mb-2 col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Viewing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
                                    </div>
                                </div>
                            @endif
                            <div class="@if ($students->count() > 0) mt-3 @endif d-flex justify-content-center col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    {{ $students->links('vendor.pagination.bootstrap-4') }}
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
    <!-- /.content -->
@endsection
