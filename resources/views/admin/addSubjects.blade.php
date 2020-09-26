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
                    {{@$SubjectDetails->id ? 'Update ':'Add '}}Subject
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addSubject')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$SubjectDetails->id}}" name="subjectId" >

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" id="subject_name" class="form-control" name="subject_name" autocomplete="off" value="<?= @$SubjectDetails->subjects_name; ?>" placeholder="Subject Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Status</label>
                                    <select id="designation" name="status" class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <button type="submit" value="{{$button}}" name="savebtn" class="form-control btn-primary" id="save-resume">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('admin/includes.admin-footer')

