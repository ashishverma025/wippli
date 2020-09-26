@include('admin/includes.admin-head')
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- /.card-header -->
            <div class="card-header " style="background-color: #337ab7; color: white">
                {{@$SubscriptionDetails->id ? 'Update ':'Add '}}Subscription
            </div>

            <div class="row">

                <form action="{{asset('admin/addSubscription')}}" class="" id="paperForm"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{@$SubscriptionDetails->id}}" name="SubscriptionId" >
                    <input type="hidden" value="{{@$SubscriptionDetails->id ?'Update':'Add'}}" name="savebtn" >

                    <div class="card-body">

                        <div class="row">
                            <!-- radio -->
                            <div class="col-md-6">
                                <label>Plan Name: </label>
                                <input type="text" class="form-control" id="plan_name" placeholder="Plan Name" value="{{@$SubscriptionDetails->plan_name?@$SubscriptionDetails->plan_name:''}}"  name="plan_name">
                                @if (@$errors->has('plan_name'))
                                <span class="help-block">
                                    <strong>{{ @$errors->first('plan_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Subscription Fee: </label>
                                <input type="text" class="form-control" id="subscription_fee" placeholder="Subscription Fee" value="{{(@$SubscriptionDetails->subscription_fee || @$SubscriptionDetails->subscription_fee==0)?@$SubscriptionDetails->subscription_fee:''}}"  name="subscription_fee">
                                @if (@$errors->has('subscription_fee'))
                                <span class="help-block">
                                    <strong>{{ @$errors->first('subscription_fee') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <!-- radio -->
                            <div class="col-md-6">
                                <label>Duration: </label>
                                <select class="form-control" id="answer" name="duration">
                                    <option value="7 days" {{@$SubscriptionDetails->duration == '7 days' ? 'selected':''}} >7 Days</option>
                                    <option value="1 month" {{@$SubscriptionDetails->duration == '1 month' ? 'selected':''}} >1 Month</option>
                                    <option value="3 months" {{@$SubscriptionDetails->duration == '3 months' ? 'selected':''}} > 3 Months</option>
                                    <option value="6 months" {{@$SubscriptionDetails->duration == '6 months' ? 'selected':''}} > 6 Months</option>
                                    <option value="12 months" {{@$SubscriptionDetails->duration == '12 months' ? 'selected':''}} > 12 Months</option>
                                    <option value="1 year" {{@$SubscriptionDetails->duration == '1 year' ? 'selected':''}} > 1 Year</option>
                                    <option value="lifetime" {{@$SubscriptionDetails->duration == 'lifetime' ? 'selected':''}} > Lifetime</option>
                                </select>
                                <!--<input type="text" class="form-control" id="duration" placeholder="Duration" value="{{@$SubscriptionDetails->duration?@$SubscriptionDetails->duration:''}}"  name="duration">-->
                                @if (@$errors->has('duration'))
                                <span class="help-block">
                                    <strong>{{ @$errors->first('duration') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <label>Discount: </label>-->
                            <!--    <input type="text" class="form-control" id="discount" placeholder="Discount" value="{{(@$SubscriptionDetails->discount || @$SubscriptionDetails->discount==0) ?@$SubscriptionDetails->discount:''}}"  name="discount">-->
                            <!--    @if (@$errors->has('discount'))-->
                            <!--    <span class="help-block">-->
                            <!--        <strong>{{ @$errors->first('discount') }}</strong>-->
                            <!--    </span>-->
                            <!--    @endif-->
                            <!--</div>-->
                        </div>


                        <div class="row">
                            <label>Description: </label>
                        </div>
                        <div class="row">
                            <!-- radio -->

                            <textarea type="text" class="form-control textarea" id="description" placeholder="Please Enter Description"  name="description">{{@$SubscriptionDetails->description?@$SubscriptionDetails->description:''}}</textarea>
                            @if (@$errors->has('description'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Recommended:</label>
                                <select class="form-control" id="recommended" name="recommended">
                                    <option value="No" {{@$SubscriptionDetails->recommended == 'No' ? 'selected':''}} > No</option>
                                    <option value="Yes" {{@$SubscriptionDetails->recommended == 'Yes' ? 'selected':''}} >Yes</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Status:</label>
                                <select class="form-control" id="answer" name="status">
                                    <option value="active" {{@$SubscriptionDetails->status == 'active' ? 'selected':''}} >Active</option>
                                    <option value="inactive" {{@$SubscriptionDetails->status == 'inactive' ? 'selected':''}} > Inactive</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="row">-->

                        <!--    <div class="col-md-3">-->
                        <!--        <label> </label>-->
                        <!--            <img  style="    margin-top: 28px;" src="{{ asset('/public/admin/upload') }}<?= !empty($QuestionDetails->paper_cover_image) ? '/papercover/' . $SubscriptionDetails->paper_cover_image : '/not-available.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />-->
                        <!--    </div>-->
                        <!--    <div class="col-md-9">-->
                        <!--        <label>Question Image: </label>-->
                        <!--        <input type="file" class="form-control" id="question_image" onchange="extCheck(); readURL(this, 'userImg');" name="paper_cover_image" >-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url('/admin/subscription')}}"  class="btn btn-danger">Cancel</a>
                        <button type="button"  class="btn btn-primary"  value="Add" id="add">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!--</div>-->
            <!--</div>-->
        </div>
    </section>
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
<script>

    function extCheck() {
        var ext = $('#question_image').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('You must select an image file only');
            $('#question_image').val('')
            return false
        }
    }

    $(document).ready(function () {
        $("#add").click(function () {
            var paperName = $("#paper_name").val();
            var paperSlug = $("#paper_slug").val();

            if (paperName == '') {
                alert('Please fill the paper name first!')
                $("textarea#question").focus()
                return false
            }
            if (paperSlug == '') {
                alert('Please fill the paper slug!')
                $("#explanation").focus()
                return false
            }
            // return false;
            $("#paperForm").submit()

        });
    });
</script>
@include('admin/includes.admin-footer')


