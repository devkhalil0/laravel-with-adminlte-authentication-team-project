@extends('admin.app')
@section('title')
    Databases
@endsection
@section('css')
@endsection
@section('pagescontent')
    <x-page-header data1="Backup!" data2="Home" data3="Backup" />
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
                            <h3 class="card-title">Database Backup Files</h3>
                            <div class="card-tools">
                                @can('role.create')
                                <form action="{{ route('admin.database.store') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Backup
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @can('role.read')
                                <table class="table table-head-fixed table-bordered text-nowrap">
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
                                        @if ($backups->count() > 0)
                                            @foreach ( $backups as $backup)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $loop->index +1 }}</td>
                                                    <td>
                                                        <div class="p-2 badge badge-success">
                                                            {{ $backup->name }}
                                                        </div>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        {{-- @can('role.update')
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
                                                        @endcan --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="odd">
                                                <td colspan="6" class="text-center dtr-control sorting_1" tabindex="0">No Backup !</td>
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



