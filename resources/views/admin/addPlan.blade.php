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
                    {{@$PlanDetails->id ? 'Update ':'Add '}}Plan
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addPlan')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$PlanDetails->id}}" name="planId" >

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="subject_name" class="form-control" name="name" autocomplete="off" value="<?= @$PlanDetails->name; ?>" placeholder="Name" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Price</label>
                                        <input type="text" id="price" class="form-control" name="price" autocomplete="off" value="<?= @$PlanDetails->price; ?>" placeholder="Price" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label> </label>
                                        <select id="price_duration" name="price_per" class="form-control">
                                            <option value="Month" {{ @$PlanDetails->price_per=='Month'?'selected':'' }}>Month</option>
                                            <option value="Year" {{ @$PlanDetails->price_per=='Year'?'selected':'' }}>Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" id="discount" class="form-control" name="discount" autocomplete="off" value="<?= @$PlanDetails->discount; ?>" placeholder="Discount" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" id="description" class="form-control" name="description" autocomplete="off" value="<?= @$PlanDetails->description; ?>" placeholder="Description" required>
                                </div>
                                <div class="form-group">
                                    <label> Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="Enable" {{ @$PlanDetails->Status=='Enable'?'selected':'' }}>Enable</option>
                                        <option value="Disable" {{ @$PlanDetails->Status=='Disable'?'selected':'' }}>Disable</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Payment</label>
                                        <input type="text" id="payment" class="form-control" name="payment" autocomplete="off" value="<?= @$PlanDetails->payment; ?>" placeholder="Payment" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label> </label>
                                        <select id="price_duration" name="payment_per" class="form-control">
                                            <option value="Month" {{ @$PlanDetails->payment_per=='Month'?'selected':'' }}>Month</option>
                                            <option value="Year" {{ @$PlanDetails->payment_per=='Year'?'selected':'' }}>Year</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Recommended</label>
                                    <select id="recommended" name="recommended" class="form-control">
                                        <option value="Yes" {{ @$PlanDetails->recommended=='Yes'?'selected':'' }}>Yes</option>
                                        <option value="No" {{ @$PlanDetails->recommended=='No'?'selected':'' }}>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Engagements</label>
                                    <input type="text" id="engagements" class="form-control" name="engagements" autocomplete="off" value="<?= @$PlanDetails->engagements; ?>" placeholder="Engagements" required>
                                </div>
                                <div class="form-group">
                                    <label>Private Students</label>
                                    <input type="text" id="private_students" class="form-control" name="private_students" autocomplete="off" value="<?= @$PlanDetails->private_students; ?>" placeholder="Private Students" required>
                                </div>
                                <div class="form-group">
                                    <label>Group Classes</label>
                                    <input type="text" id="group_class" class="form-control" name="group_class" autocomplete="off" value="<?= @$PlanDetails->group_class; ?>" placeholder="Group Classes" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>e-Resources</label>
                                        <input type="text" id="e_resources" class="form-control" name="e_resources" autocomplete="off" value="<?= @$PlanDetails->e_resources; ?>" placeholder="e-Resources" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label> </label>
                                        <select id="resources_in" name="resources_in" class="form-control">
                                            <option value="KB" {{ @$PlanDetails->resources_in=='KB'?'selected':'' }}>KB</option>
                                            <option value="MB" {{ @$PlanDetails->resources_in=='MB'?'selected':'' }}>MB</option>
                                            <option value="GB" {{ @$PlanDetails->resources_in=='GB'?'selected':'' }}>GB</option>
                                            <option value="TB" {{ @$PlanDetails->resources_in=='TB'?'selected':'' }}>TB</option>
                                        </select>
                                    </div>
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

