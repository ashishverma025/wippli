@extends('sites-student.layout.dashboard')
@section('title','Attendance Listing')
@section('css')
<link href="{{URL::asset('public/admn/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/plugincss/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/pages/tables.css')}}" rel="stylesheet">
    <style>
        input[type="radio"] {
            border: 0px;
            width: 100%;
            height: 1.5em;
        }
    </style>
@stop
@section('content')
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Attendance Listing
                    </h4>
                </div>
            </div>
        </div>
    </header>
    @if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div>
    </div>
    @endif
    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
            <div class="card">
                <div class="card-header " style="background-color: #337ab7; color: white">
                    Attendance Grid
                </div>
                <div class="card-block m-t-35" id="user_body">
                    <div class="table-toolbar">

                        <form action="{{url('student/attendance')}}" id="filterForm" class="tuti-form profile-form" method="get" accept-charset="utf-8">
                            <div class="btn-group">
                                <select id="classList" name="class" class="form-control">
                                    <option value="">--- Select Class ---</option>
                                    @foreach ($classes as $key => $value)
                                    <option value="{{ $value }}" {{ $classfilter == $value ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="date" id="dateFilter" name="date" value="{{ $dateFilter }}">

                        </form>

                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>
                    <form action="{{url('student/updateattendence')}}" class="tuti-form profile-form" id="update_attendance" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div>
                            <div>
                                <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='5' id="editable_tables" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc wid-20 triggerclk" tabindex="0" rowspan="1" colspan="1">Sl</th>                                           
                                            <th class="sorting wid-15" tabindex="0" rowspan="1" colspan="1">Start Date</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Class</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Attendance Date</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Present</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Absent</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Not Engaged</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form> 
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div> 
    </div>


    @endsection
    @section('pagescript')
    <script>
        $(window).load(function () {
            $(".triggerclk").trigger('click')
        });

        $("#classList, #dateFilter").change(function () {
            $("#filterForm").submit()
        });
    </script>
    <script>
        $(document).on('click', '#upload_students', function () {
//            $this = $(this);
            var form_data = new FormData();
            var student_data = $('#csv_student').prop('files')[0];
            form_data.append('csv_student', student_data);
            console.log(form_data)

            $.ajax({
                url: $('meta[name="route"]').attr('content') + '/admin/uploadstudents',
                method: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Show the modal
                    if (response.resCode == 0) {
//                        window.location.reload();
                    }
                }
            });
        });
        $(document).ready(function () {
            var base_url = "{{asset('/')}}";
            var queryString = "{{ QueryString() }}";
            var url = base_url + 'student/fetchattendance';
            console.log(queryString)
            if (queryString != "") {
                url = base_url + 'student/fetchattendance?' + queryString;
            }

            var table = $('#editable_tables');
            table.DataTable({
                dom: "<'text-right'B><f>lr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
                buttons: [
                    'copy', 'csv', 'print'
                ],
                "sServerMethod": "get",
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": url,
                "columnDefs": [
                    {"className": "dt-center", "targets": [0, 3, 5]}
                ],
                "aoColumns": [
                    {'bSortable': true},
                    {'bSortable': true},
                    {'bSortable': true},
                    {'bSortable': true},
                    {'bSortable': true},
                    {'bSortable': true},
                    {'bSortable': true},
                ]
            });
            var tableWrapper = $("#editable_table_wrapper");
            tableWrapper.find(".dataTables_length select").select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown
            $("#editable_table_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
            $(".dataTables_wrapper").removeClass("form-inline");
        });
    </script>
    <script src="{{URL::asset('public/admn/js/select2.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/buttons.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/admn/js/pluginjs/buttons.print.min.js')}}"></script>
    @stop