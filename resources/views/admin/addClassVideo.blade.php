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
                {{@$PaperDetails->id ? 'Update ':'Add '}}Question
            </div>

            <div class="row">

                <form action="{{asset('admin/addClassVideo')}}" class="" id="paperForm"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{@$PaperDetails->id}}" name="paperId" >
                    <input type="hidden" value="{{@$PaperDetails->id ?'Update':'Add'}}" name="savebtn" >

                    <div class="card-body">

                        <div class="row">
                            <!-- radio -->
                            <label>Name: </label>
                            <input type="text" class="form-control" id="name" placeholder="Paper Name" value="{{@$PaperDetails->name?@$PaperDetails->name:''}}"  name="name">
                            @if (@$errors->has('name'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label>Description: </label>
                                <textarea type="text" class="form-control textarea" id="description" placeholder="Description"  name="description">{{@$PaperDetails->description?@$PaperDetails->description:''}}</textarea>
                                    <!--<textarea class="textarea" name="Question[question]" id="question" placeholder="Enter Question here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{@$QuestionDetails->question}}</textarea>-->
                            </div>
                            @if (@$errors->has('description'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <!-- radio -->
                            <label>Url : </label>
                            <input type="text" class="form-control" id="url" placeholder="Url" value="{{@$PaperDetails->url?@$PaperDetails->url:''}}"  name="url">
                            @if (@$errors->has('url'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('url') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <label>Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{@$PaperDetails->status == "1" ? 'selected':''}} >Active</option>
                                <option value="inactive" {{@$PaperDetails->status == "0" ? 'selected':''}} > Inactive</option>
                            </select>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <label> </label>
                                <img  style="    margin-top: 28px;" src="{{ url('/public/admin/upload') }}<?= !empty($QuestionDetails->image) ? '/papercover/' . $PaperDetails->image : '/not-available.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                            </div>
                            <div class="col-md-9">
                                <label>Image: </label>
                                <input type="file" class="form-control" id="image" onchange="extCheck(this); readURL(this, 'userImg');" name="image" >
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url('admin/classVideo')}}"  class="btn btn-danger">Cancel</a>
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

    function extCheck(input) {
        var a = (input.files[0].size);
        var ext = $('#image').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('You must select an image file only');
            $('#question_image').val('')
            return false
        }
        // if(a > 2000000) {
        //         $('#question_image').val('')
        //         alert('Please select image size less than 2 MB');
        //         return false;
        // };  
    }

    $(document).ready(function () {
        $("#add").click(function () {
            var paperName = $("#name").val();
            var paperSlug = $("#description").val();

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

