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

                <form action="{{asset('admin/addPapers')}}" class="" id="paperForm"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{@$PaperDetails->id}}" name="paperId" >
                    <input type="hidden" value="{{@$PaperDetails->id ?'Update':'Add'}}" name="savebtn" >

                    <div class="card-body">

                        <div class="row">
                            <!-- radio -->
                            <label>Paper Name: </label>
                            <input type="text" class="form-control" id="paper_name" placeholder="Paper Name" value="{{@$PaperDetails->paper_name?@$PaperDetails->paper_name:''}}"  name="paper_name">
                            @if (@$errors->has('paper_name'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('paper_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <label>Paper URL: </label>
                            <input type="text" class="form-control" id="paper_slug" placeholder="Paper URL" value="{{@$PaperDetails->paper_slug?@$PaperDetails->paper_slug:''}}"  name="paper_slug">
                            @if (@$errors->has('paper_slug'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('paper_slug') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <!-- radio -->
                            <label>Paper Description: </label>
                            <input type="text" class="form-control" id="paper_description" placeholder="Paper Description" value="{{@$PaperDetails->paper_description?@$PaperDetails->paper_description:''}}"  name="paper_description">
                            @if (@$errors->has('paper_description'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('paper_description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <label>Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{@$PaperDetails->status == "active" ? 'selected':''}} >Active</option>
                                <option value="inactive" {{@$PaperDetails->status == "inactive" ? 'selected':''}} > Inactive</option>
                            </select>
                        </div>
                         <div class="row">

                            <div class="col-md-3">
                                <label> </label>
                                    <img  style="    margin-top: 28px;" src="{{ asset('/public/admin/upload') }}<?= !empty($QuestionDetails->paper_cover_image) ? '/papercover/' . $PaperDetails->paper_cover_image : '/not-available.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                            </div>
                            <div class="col-md-9">
                                <label>Paper Image: </label>
                                <input type="file" class="form-control" id="question_image" onchange="extCheck(this); readURL(this, 'userImg');" name="paper_cover_image" >
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url('admin/practicePaper')}}"  class="btn btn-danger">Cancel</a>
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

    function extCheck(input){
        var a=(input.files[0].size);
        var ext = $('#question_image').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
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
        $("#add").click(function(){
            var paperName = $("#paper_name").val();
            var paperSlug = $("#paper_slug").val();

            if(paperName ==''){
                alert('Please fill the paper name first!')
                $("textarea#question").focus()
                return false
            }
            if(paperSlug == ''){
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

