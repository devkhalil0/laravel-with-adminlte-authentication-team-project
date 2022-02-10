@extends('user.app')
@section('title')
    All Blogs
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="Blogs!" data2="Dashboard/ Modules" data3="Blogs" />
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <x-data-table tableTitle="All Blogs" :dataList="$blogs">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        #
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                        Title
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                        Descition
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($blogs->count() > 0)
                    @foreach ( $blogs as $blog)
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                {{ Str::limit($blog->body, 20, '...') }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('students.edit',$blog) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <a href="{{ route('students.destroy',$blog) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                                <form id="delete-form" action="{{ route('students.destroy',$blog->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="odd">
                        <td colspan="6" class="text-center dtr-control sorting_1" tabindex="0">No Blog !</td>
                    </tr>
                @endif
            </tbody>
        </x-data-table>
    </section>
@endsection
