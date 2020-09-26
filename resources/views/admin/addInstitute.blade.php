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
                    Add Institute
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addInstitute')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$InstituteDetails->id}}" name="classId" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?= !empty(@$InstituteDetails->institute_logo) ? '/public/admin/upload/institute/' . $InstituteDetails->institute_logo : '/public/sites/images/dummy.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Logo</label>    
                                    <input type="file" class="form-control datetimepicker-input" name="institute_logo" id="institute_logo" onchange= "readURL(this, 'userImg')" />
                                </div>

                                <div class="form-group">
                                    <label> Name</label>
                                    <input type="text" id="institute_name" class="form-control" name="institute_name" autocomplete="off" value="<?= @$InstituteDetails->institute_name; ?>" placeholder="Institute Name" required>
                                </div>

                                <div class="form-group">
                                    <label> Address</label>
                                    <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="<?= @$InstituteDetails->address; ?>" placeholder="Address" required>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <button type="submit" value="{{$button}}" name="savebtn" class="form-control btn-primary" id="save-resume">Save</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Mobile</label>
                                    <input type="number" class="form-control" name="mobile" value="{{ @$InstituteDetails->mobile }}" placeholder="Mobile">
                                </div>

                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" value="<?= @$InstituteDetails->city; ?>" placeholder="City" required>

                                </div>
                                <div class="form-group">
                                    <label> Status</label>
                                    <select id="designation" name="status" class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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

