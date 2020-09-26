@include('sites-student/includes.head')
<link rel="stylesheet" href="{{ asset('public/student/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('public/student/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/student/dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/student/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/student/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/student/dist/css/custom.css')}}">

<!-- Bootstrap4 Duallistbox -->
<!-- /.navbar -->
@include('sites-student/includes.sidebar')
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
                <div class="card-header">
                    <h3 class="card-title">Add multiple students to class</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->

                <form action="{{url('assignclass')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control select2bs4" name="class" style="width: 100%;">
                                        @if(!empty($classes))
                                        @foreach ($classes as $key => $class)
                                        <option value="{{ $key }}" {{ $classfilter == $class ? 'selected' : ''}}>{{ $class }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Students</label>
                                    <select class="duallistbox" name="students[]" multiple="multiple" style="display: none;">
                                        @if(!empty($students))
                                        @foreach ($students as $key => $student)
                                        <option value="{{ $key }}" {{ $classfilter == $student ? 'selected' : ''}}>{{ $student }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="{{ url('/')}}">Tutify</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="{{ asset('public/student/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('public/student/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/student/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/student/dist/js/demo.js')}}"></script>
<!-- Page script -->
<script>
//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()


$(document).on('keyup', '.select2-search__field', function (e)
{
    var text = $('.select2-search__field').val();
    if (text != '') {
        $.ajax({
            url: $('meta[name="route"]').attr('content') + '/searchStudents',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'post',
            data: {'text': text},
            beforeSend: function () {
                $("#loaderimg").show()
            },
            success: function (res) {
                $('#findStudent').append(res)
            },
            complete: function () {
                $("#loaderimg").hide()
            },
        })
    }
});
$("#findStudent").select2({
    allowClear: true,
    width: '300px',
    height: '34px',
    placeholder: 'select..'
            //data: data
});
$('#email').on('blur', function () {
    var email = $('#email').val();
    $.ajax({
        url: $('meta[name="route"]').attr('content') + '/isemailexist',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'post',
        data: {'email': email},
        success: function (res) {
            if (res.status == 'exist') {
                $('#email-err').text(res.msg)
                $("#save-resume").attr('type', 'button');
            } else {
                $('#email-err').text('')
                $("#save-resume").attr('type', 'submit');
            }
            console.log(res.status)
        }
    })
});</script>

<script>
    $(function () {
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    function readURL(input, divID) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#' + divID).show()
            reader.onload = function (e) {
                $('#' + divID).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
