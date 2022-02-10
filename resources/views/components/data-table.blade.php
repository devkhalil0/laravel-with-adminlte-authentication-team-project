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
              <h3 class="card-title">{{ $tableTitle }}</h3>
              <div class="card-tools">
                {{-- <form action="{{ route('students.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="search" @if (request()->routeIs('students.search')) value="{{ $term }}" @endif class="form-control float-right" placeholder="Search">
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
                    {{ $slot }}
              </table>
            </div>
                <div class="@if ($dataList->count() > 0) border-top @endif d-flex row justify-content-center">
                    @if ($dataList->count() > 0)
                        <div class="mt-3 mb-2 col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                Viewing {{ $dataList->firstItem() }} to {{ $dataList->lastItem() }} of {{ $dataList->total() }} entries
                            </div>
                        </div>
                    @endif
                    <div class="@if ($dataList->count() > 0) mt-3 @endif d-flex justify-content-center col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{ $dataList->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
          <!-- /.card -->
        </div>
    </div>
</div>
