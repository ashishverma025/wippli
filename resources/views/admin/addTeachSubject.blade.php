@include('admin/includes.admin-head')
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
                <div class="card-body">
                    <form action="{{url('admin/addteachSubject')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$ClassDetails->id}}" name="classId" >
                        <div class="row">
                            <div class="col-md-6">

                                <input type="hidden" name="TeachSubjectId" value="<?= @$TeachSubjectDetails->id ?>" >

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <img src="{{ asset('public/sites/images/') }}<?= !empty($TeachSubjectDetails->subject_image) ? '/teach-subjects/1/' . $TeachSubjectDetails->subject_image : '/dummy.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mgt30">
                                            <div class="file btn btn-primary">
                                                Upload
                                                <input type="file" class="custom-file-input hide-this" name="subject_image" id="tutor_logo" onchange= "readURL(this, 'userImg')" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> Subject Name</label>
                                    <input type="text" id="subject_name" class="form-control" name="subjects_name" value="<?= @$TeachSubjectDetails->subjects_name; ?>" placeholder="Class Name" required>
                                    @if (@$errors->has('subject_name'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('subject_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Subject Description</label>
                                    <textarea id="description" class="form-control textarea" name="description" placeholder="Description" required><?= @$TeachSubjectDetails->description; ?></textarea>
                                    @if (@$errors->has('subject_name'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('subject_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Status</label>
                                    <select class="form-control" id="subject_status" name="status">
                                        <option value="active" {{ (@$TeachSubjectDetails->status == 'active')?"selected":"" }}>Active</option>
                                        <option value="inactive" {{ (@$TeachSubjectDetails->status == 'inactive')?"selected":"" }}>In Active</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <a href="{{url('admin/teachSubject')}}"  class="btn btn-danger" >Cancel</a>
                                    <button type="submit" value="{{$button}}" name="savebtn" class="btn btn-primary" id="save-resume">Save</button>
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

<script>
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
@include('admin/includes.admin-footer')