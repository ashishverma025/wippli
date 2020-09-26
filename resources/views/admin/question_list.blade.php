@include('admin/includes.admin-head')
<link href="{{URL::asset('public/admn/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/plugincss/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/pages/tables.css')}}" rel="stylesheet">
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')


<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
    extensions: ["[a11y]/accessibility-menu.js"],
    tex2jax: {inlineMath: [['$','$'],['\\(','\\)']]},
    "fast-preview": {disabled: true},
    AssistiveMML: {disabled: true},
    menuSettings: {explorer: true}
});
MathJax.Ajax.config.path["a11y"] = "../extensions";
if(window.location.href.indexOf("mathjax.github.io/MathJax-a11y") > -1) {
MathJax.Ajax.config.path["SRE"] = "https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/extensions/a11y";
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS_HTML-full"></script>

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
                    Question Listing
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
                                        <a href="{{url('admin/addQuestion')}}" id="update_attendance_table" class=" btn btn-primary"> Add New</a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select name="paperType" class="form-control">
                                        <option value="" >Paper All</option>
                                        @foreach($OnlinequestionPaper as $paperId=>$paperName)
                                        <option value="{{$paperId}}" {{$paperType==$paperId ? 'selected':''}} >{{$paperName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <div class="btn-group">
                                        <button class=" btn btn-primary">Filter</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form> 

                        <input type="hidden" id="user_type" value="{{@$type}}" />
                        <div>
                            <div>
                                <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='100' id="question_table" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                            <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Image</th>
                                            <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Practice Paper</th>
                                            <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Question</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Solution</th>
                                            <!--<th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Hint</th>-->
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Question Type</th>
                                            <th class="sorting wid-10 bold" tabindex="0" rowspan="1" colspan="1">Total Marks</th>
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

$(".priview").click(function(){
    
});

$("#classList, #dateFilter").change(function () {
    $("#filterForm").submit()
});

$(document).on('click', '#update_attendance_table', function () {
    $("#update_attendance").submit();
});


$(document).ready(function () {
    var base_url = "{{asset('/admin')}}";
    var user_type = $('#user_type').val();
    var url = base_url + "/fetchQuestion?{{$_SERVER['QUERY_STRING']}}"

    var table = $('#question_table');

    table.DataTable({
        dom: "<'text-right'B><f>lr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        buttons: [
        'copy', 'csv', 'print'
        ],
        "order": [[0, "desc" ]],
        
        "lengthMenu": [[100, 150, 200, -1], [100, 150,200, "All"]],
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
        {'bSortable': false},
        {'bSortable': false},
        {'bSortable': false},
        {'bSortable': false},
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
