<div class="dropdown mr-2">
    <a onclick="Dropdown()" id="dropdownSubMenu1" href="#" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </a>
    <ul id="show" style="width:250px" class="dropdown-menu dropdown-menu-dark border-0 shadow">
        <form action="{{ route('students.excel') }}" method="POST">
            @csrf
            <li>
                <div class="p-2">
                <label>Select One</label>
                <select name="from" style="" class="mr-1 form-control">
                    <option selected value="latest">From Latest</option>
                    <option value="oldest">From Oldest</option>
                </select>
            </div>
            </li>
            <li>
            <div class="p-2">
                <label>Amount</label>
                <div class="input-group">
                <input value="5" id="numberall" name="amount" placeholder="Amount" type="number" class="form-control">
                <div class="input-group-append">
                    <button type="button" onclick="All()" class="btn btn-block btn-outline-info" type="button">All</button>
                </div>
                </div>
            </div>
            </li>
            <li>
                <div class="p-2">
                    <label>Document Type</label>
                    <select name="type" style="" class="mr-1 form-control">
                        <option selected value="csv">Csv</option>
                        <option value="excel">Excel</option>
                        <option value="pdf">Pdf</option>
                    </select>
                </div>
            </li>
            <li class="m-2">
                <button type="submit" class="btn btn-block btn-outline-info btn-md">Download</button>
            </li>
        </form>
    </ul>
</div>

@section('js')
    <script>
        function Dropdown(){

            if($('#show').hasClass('show')){

                $('#show').removeClass('show')
            }else{

                $('#show').addClass('show')
            }
        }
        function All(){

            var phpData = {!! $students->total() !!};
            $('#numberall').val(phpData);

        }

        $('#numberall').on('input', function () {

            var phpData = {!! $students->total() !!};
            var value = $('#numberall').val();

            if( value > phpData ){

                $('#numberall').val(phpData);
            }
        });
    </script>
@endsection
