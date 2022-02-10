@extends('user.app')
@section('title')
    All Students
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="Students!" data2="Home" data3="Students" />
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <x-data-table tableTitle="All Students" :dataList="$students" searchRoute="{{ route('students.search') }}" :term="request()->routeIs('students.search') ? $term : ''">
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
                        Email Verified Status
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
                            <td>
                                @if ($student->email_verified_at == null)
                                    <a href="{{ route('students.emailVerify',$student) }}" class="btn btn-block btn-outline-warning btn-xs">
                                        Not Verified
                                    </a>
                                @else
                                    <button type="button" class="btn btn-block btn-outline-success bg-success btn-xs">
                                        Verified
                                    </button>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset($student->avatar_url) }}" style="width: 20%" class="user-image img-circle elevation-2" alt="">
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('students.edit',$student) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <a href="{{ route('students.destroy',$student) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm">
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
        </x-data-table>
    </section>
@endsection
