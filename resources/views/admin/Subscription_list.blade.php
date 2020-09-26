@include('admin/includes.admin-head')
<link href="{{URL::asset('public/admn/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/plugincss/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/pages/tables.css')}}" rel="stylesheet">
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>
    <?php // pr($_POST); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-header " style="background-color: #337ab7; color: white">
                    Subscription Listing
                </div>
                <div class="card-body">
                    <!--EXIST STUDENTS LIST-->
                    <span id="csv_err" class="errMsg"></span>
                    <div class="alert alert-danger" id="res_err" style="display: none"> <strong>Warning!</strong></div>

                    <form id="filter" method="get">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="btn-group">
                                        <a href="{{url('admin/addSubscription')}}" id="update_StudentData_table" class=" btn btn-primary"> Add New</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='10' id="StudentData_table" role="grid">
                                <thead>
                                    <tr role="row">
                                        <!--<th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>-->
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">SNo</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1"> Plan Name</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1"> Subscription Fee</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1"> Duration</th>
                                        <!--<th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1"> Discount</th>-->
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Description</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Recommended</th>
                                        <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Status</th>
                                        <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('admin/includes.admin-footer')
<script src="{{URL::asset('public/admn/js/pluginjs/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.print.min.js')}}"></script>

<script>
//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()


$("#classList, #dateFilter").change(function () {
    $("#filterForm").submit()
});

$(document).on('click', '#update_question_table', function () {
    $("#update_attendance").submit();
});


$(document).ready(function () {
    var base_url = "{{asset('/admin')}}";
    var user_type = $('#user_type').val();
    var url = base_url + "/fetchSubscription?{{$_SERVER['QUERY_STRING']}}"

    var table = $('#StudentData_table');

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
        {"className": "dt-center", "targets": [0, 1, 2]}
        ],
        //"aTargets": [0, 1, 2, 3, 4, 5]

        "aoColumns": [
        {'bSortable': true},
        // {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        {'bSortable': true},
        // {'bSortable': true},
            //{'bSortable': false, "width": "10%"}
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
