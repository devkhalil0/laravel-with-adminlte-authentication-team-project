@extends('user.app')
@section('title')
    Chart Data
@endsection
@section('css')
@endsection
@section('pagescontent')
<!-- Content Header (Page header) -->
    <x-page-header data1="Blogs!" data2="Dashboard/ Modules" data3="Blogs" />
    <!-- =========  Colume Chart ==========  -->
    <section class="content">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Student Joining Data 2022</h3>
                      <div class="card-tools">
                         <!-- // -->
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div id="StudentJoiningChart"></div>
                    </div>
                    </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- =========  Pie Chart ==========  -->
    <section class="content">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Student Joining Data 2022</h3>
                      <div class="card-tools">
                         <!-- // -->
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div id="PieChart"></div>
                    </div>
                    </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- =========  Bar Chart ==========  -->
    <section class="content">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Student Joining Data 2022</h3>
                      <div class="card-tools">
                         <!-- // -->
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div id="BarChart"></div>
                    </div>
                    </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- =========  Comparison Chart ==========  -->
    <section class="content">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Student Joining Comparison Data</h3>
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <select name="" id="SelectDataToGet" class="form-control float-right">
                                <option value="today">Today</option>
                                <option value="yesterday">Yesterday</option>
                                <option value="thisweek">This Week</option>
                                <option value="lastweek">Last Week</option>
                                <option value="thismonth">This Month</option>
                                <option value="thisyear">This Year</option>
                                <option value="lastyear">Last Year</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card-header d-flex justify-content-center table-responsive p-0 mt-2">
                        <div id="ComparisonChart" class="mt-4 mb-4"></div>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <div class="btn px-4 p-2 btn-outline-primary btn-xs" id="income"></div>
                        <div class="btn px-4 p-2 btn-outline-primary btn-xs ml-4" id="expense"></div>
                    </div>
                    </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var phpData = {!! $StudentsArr !!};

    var options = {
          series: [{
                data: phpData,
            }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ["January","February","March","April","May","June","July","August","September","October","November","December"]
        }
        };

        var chart = new ApexCharts(document.querySelector("#BarChart"), options);
        chart.render();
</script>
<script>
     var phpData = {!! $StudentsArr !!};

    var options = {
          series: phpData,
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#PieChart"), options);
        chart.render();

</script>
<script>
    var phpData = {!! $StudentsArr !!};

    var options = {
           series: [{
                data: phpData,
            }],
           chart: {
           height: 350,
           type: 'bar',
           events: {
             click: function(chart, w, e) {
               // console.log(chart, w, e)
             }
           }
         },
         colors: ["#008000", "#FF0000", "#FFFF00", "#0000FF"],
         plotOptions: {
           bar: {
             columnWidth: '45%',
             distributed: true,
           }
         },
         dataLabels: {
           enabled: false
         },
         legend: {
           show: false
         },
         xaxis: {
           categories: [
            ["January"],
            ["February"],
            ["March"],
            ["April"],
            ["May"],
            ["June"],
            ["July"],
            ["August"],
            ["September"],
            ["October"],
            ["November"],
            ["December"]
           ],
           labels: {
             style: {
               colors:["#008000", "#FF0000", "#FFFF00", "#0000FF"],
               fontSize: '12px'
             }
           }
         }
         };
         var chart = new ApexCharts(document.querySelector("#StudentJoiningChart"), options);
         chart.render();
</script>
<script>
    // <!--+==== Ajax ====+-->
        var value = 'today';
         // <!--+==== Page Load ====+-->
        GetData(value);
         // <!--+==== When Select ====+-->
        $('#SelectDataToGet').on('change', function () {
            this.value = $('#SelectDataToGet').val();
            GetData(this.value);
        });
         // <!--+==== Ajax ====+-->
        function GetData(value){
            $.ajax(
            {
                url: "/expense/income/data",
                dataType: "JSON",
                type: 'POST',
                data: {
                    '_token': $('meta[name=csrf-token]').attr("content"),
                    "value": value
                },
                success:function(data){

                    $("#income").html('Income: '+ data.income + '$');
                    $("#expense").html('Expense: '+ data.expense + '$');
                    var json = [data.income,data.expense]

                    // <!--+==== Chart ====+-->
                    var options = {
                    series: json,
                    chart: {
                    width: 380,
                    type: 'pie',
                    },
                    labels: ['Income','Expense'],
                    colors:["#008000", "#FF0000"],
                    responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                        width: 200
                        },
                        legend: {
                        position: 'bottom'
                        }
                    }
                    }]
                    };
                    // <!--+==== Chart Render ====+-->
                    $("#ComparisonChart").html('');
                    var chart = new ApexCharts(document.querySelector("#ComparisonChart"), options);
                    chart.render();
                }
            });
        }
</script>
@endsection





