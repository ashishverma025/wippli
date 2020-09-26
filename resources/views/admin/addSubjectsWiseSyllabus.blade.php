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
                    {{@$SyllabusDetails['id'] ? 'Update':'Add'}} Syllabus
                </div>
                <div class="card-body">
                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addSyllabus')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$SyllabusDetails['id']}}" name="syllId" >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Subjects</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="subject" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @if(!empty($Subjects))
                                        @foreach($Subjects as $id=>$subject)
                                        <option data-select2-id="{{$id}}" <?= @$SyllabusDetails['subject_id'] == $id ? 'selected' : '' ?> value="{{$id}}" >{{$subject}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Syllabus Name</label>
                                    <input type="text" id="syllabus_name" class="form-control" name="syllabus_name" autocomplete="off" value="<?= @$SyllabusDetails->syllabus_name; ?>" placeholder="Syllabus Name" required>
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

