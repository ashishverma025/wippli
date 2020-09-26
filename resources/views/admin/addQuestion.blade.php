@include('admin/includes.admin-head')
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="{{url('public/admn/css/bootstrap3-wysihtml5.min.css')}}">

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
                {{@$QuestionDetails->id ? 'Update ':'Add '}}Question
            </div>

            <div class="row">

                <form action="{{asset('admin/addQuestion')}}" class="" id="questionForm"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{@$QuestionDetails->id}}" name="questionId" >
                    <input type="hidden" value="{{@$QuestionDetails->id ?'Update':'Add'}}" name="savebtn" >

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Test Paper:</label>
                                <select name="Question[exam_paper_id]" id="exam_paper_id" class="form-control">
                                    @foreach($OnlinequestionPaper as $key=>$value)
                                    <option value="{{$value['paper_slug'].'-'.$value['id']}}" {{@$QuestionDetails->paper_slug == $value['paper_slug'] ? 'selected':''}}>{{$value['paper_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Question:</label>
                                <textarea class="form-control textarea" id="question" placeholder="Enter Question here" name="Question[question]" rows="25" cols="80">{{@$QuestionDetails->question}}</textarea>
                                <!--<textarea class="textarea" name="Question[question]" id="question" placeholder="Enter Question here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{@$QuestionDetails->question}}</textarea>-->
                            </div>
                            @if (@$errors->has('Question[question]'))
                            <span class="help-block">
                                <strong>{{ @$errors->first('Question[question]') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Marks: </label>
                                <input type="number" class="form-control" placeholder="Question Mark" onkeypress="return event.charCode >= 48 && event.charCode <= 57" min="0" max="999" value="{{@$QuestionDetails->question_mark?@$QuestionDetails->question_mark:1}}"  name="Question[question_mark]">
                                @if (@$errors->has('Question[question_mark]'))
                                <span class="help-block">
                                    <strong>{{ @$errors->first('Question[question_mark]') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Live:</label>
                                <select type="text" class="form-control" name="Question[live]">
                                    <option value="yes" {{@$QuestionDetails->live == 'yes' ? 'selected':''}}>Yes</option>
                                    <option value="no" {{@$QuestionDetails->live == 'no' ? 'selected':''}}>No</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Solution: </label>
                                <textarea class="form-control textarea" id="explanation" placeholder="Enter Solution here" name="Question[explanation]" rows="10" cols="80">{{@$QuestionDetails->explanation}}</textarea>
                                <!--<input type="text" class="form-control" placeholder="Explanation" value="{{@$QuestionDetails->explanation}}" id="explanation" name="Question[explanation]">-->
                                @if (@$errors->has('Question[explanation]'))
                                <span class="help-block">
                                    <strong>{{ @$errors->first('Question[explanation]') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- radio -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Question Type:</label>
                                <select class="form-control" id="question_type" name="Question[question_type]">
                                    <option value="MCQ" {{@$QuestionDetails->question_type == 'MCQ' ? 'selected':''}}>MCQ</option>
                                    <option value="open-ended" {{@$QuestionDetails->question_type == 'open-ended' ? 'selected':''}}>open-ended</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label> </label>
                                <img  style="margin-top: 28px;" src="{{ asset('/public/admin/upload') }}<?= !empty($QuestionDetails->question_image) ? '/questions/' . $QuestionDetails->question_image : '/not-available.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                            </div>
                            <div class="col-md-4">
                                <label>Question Image: </label>
                                <input type="file" class="form-control" id="question_image" onchange="extCheck(this); readURL(this, 'userImg');" name="Question[question_image]" >
                            </div>

                        </div>
                        <style>
                            .hide{display: none}
                        </style>
                        <?php
//                              pr($AnswerDetails);
                        ?>
                        <input type="hidden" value="5" id="answerCount">

                        @if(empty($QuestionDetails->id))
                        <div id="MCQdiv" class="{{!empty(@$AnswerDetails)?'hides':''}}">
                            @for($i = 1; $i<6; $i++)
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- radio -->
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary{{$i}}" name="Question[answer]" value="{{$i}}" checked >
                                                    <label for="radioPrimary{{$i}}">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control textarea option" id="answer{{$i}}" name="Question[option][]" rows="2" cols="10"></textarea>
                                            <!--<input type="text" class="form-control option" id="answer1" name="Question[option][]">-->
                                        </div>
                                        <!--<div class="col-md-2"><input type="file" class="form-control"  name="Question[answer_image][]"></div>-->
                                        <!--<div class="col-md-1"><i class="nav-icon fas fa-trash removediv" style="color:red;"></i></div>-->
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>

                        @elseif(!empty(@$AnswerDetails))
                        @foreach(@$AnswerDetails as $key => $answer)
                        <!-- Minimal red style -->
                        <?php // pr($answer);?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- radio -->
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary{{$answer['id']}}" value="{{$answer['id']}}" {{@$answer['is_correct'] == 'Yes' ? 'checked':''}} name="Question[answer]" >
                                                <label for="radioPrimary{{$answer['id']}}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        @if(@$QuestionDetails->question_type == 'open-ended')
                                        <input type="text" class="form-control option" id="answer{{$key+1}}" name="Question[option][{{$answer['id']}}]" value="{{$answer['answer']}}">
                                        @else
                                        <textarea class="form-control textarea option" id="answer{{$key+1}}" name="Question[option][{{$answer['id']}}]" rows="2" cols="10">{{$answer['answer']}}</textarea>
                                        @endif
                                    </div>
                                    <!--<div class="col-md-2"><input type="file" class="form-control"  name="Question[answer_image][]" ></div>-->
                                    <!--<div class="col-md-1"><i class="nav-icon fas fa-trash removediv" style="color:red;"></i></div>-->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="">
                            <a href="javascript:void(0)" id="addmore" title="">+ Add{{@$QuestionDetails->question_type == 'open-ended' ? ' possibility':' option'}} </a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url('admin/question')}}"  class="btn btn-danger" >Cancel</a>
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


    $('#question_type').on('change', function () {
        if (this.value == 'MCQ') {
            $("#MCQdiv").removeClass('hide')
            $("#addmore").text('+ add option')
        } else {
            $("#MCQdiv").addClass('hide')
            $("#addmore").text('+ add possibility')
        }
    });

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


    // $('#question_image').bind('change', function() {
    //     var a=(this.files[0].size);
    // alert(a);
    // if(a > 2000000) {

    // });


    function extCheck(input) {
        var a = (input.files[0].size);
        var ext = $('#question_image').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('You must select an image file only');
            $('#question_image').val('')
            return false
        }
        if (a > 2000000) {
            $('#question_image').val('')
            alert('Please select image size less than 2 MB');
            return false;
        }
        ;
    }

    $(document).ready(function () {
        $("#add").click(function () {
            var question = $("textarea#question").val();
            var explanation = $("#explanation").val();
            var exam_paper_id = $("#exam_paper_id").val();

            // alert(exam_paper_id)
            var options = $(".option").val();

            var optionField = $("input[name='Question[answer]']:checked").parent().parent().parent().siblings('div .col-md-8').children('.option')
            var options = optionField.val()

            var option1 = $("#answer1").val();
            var option2 = $("#answer2").val();
            var option3 = $("#answer3").val();
            var option4 = $("#answer4").val();

            if (question == '') {
                alert('Please fill the question first!')
                $("textarea#question").focus()
                return false
            }
            if (explanation == '') {
                alert('Please fill the solution!')
                $("#explanation").focus()
                return false
            }
            var questionType = $("#question_type option:selected").text();
            if (questionType != 'open-ended') {
                if (options == '' || option1 == '' || option2 == '' || option3 == '' || option4 == '') {
                    alert('Please fill all options!')
                    optionField.focus()
                    return false
                }
            }
            if (exam_paper_id != '') {
                getQuestionCount(exam_paper_id);
            }
            // return false;

        });
    });

    function getQuestionCount(paperId) {
        if (paperId != '') {
            $.ajax({
                url: "{{url('admin/getPaperwiseQuestionCount')}}",
                type: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {paperId: paperId},
                beforeSend: function (data) {
                    $("#add").attr('disabled', true)
                },
                success: function (result) {
                    if (result >= 100) {
                        alert('You have exceeded 100 question limit')
                        $("#add").removeAttr('disabled')
                        return false;
                    } else {
                        $("#questionForm").submit()
                    }
                },
                //   complete: function() {
                //       $("#add").removeAttr('disabled')
                //       $("#questionForm").submit()
                //   }
            });
        }
    }

    $(document).on('click', '.removediv', function () {
        $(this).parent().parent().parent().remove();
    });

    $("#addmore").click(function () {
        var cnt = $("#answerCount").val()
        cnt = parseInt(cnt) + 1
        var str = '<div class="row"><div class="col-sm-12"><div class="row"><div class="col-md-1"><div class="form-group clearfix"><div class="icheck-primary d-inline"><input type="radio" id="questionOption' + cnt + '"   name="Question[answer]" value="' + cnt + '"><label for="questionOption' + cnt + '"></label></div></div></div><div class="col-md-8"><input type="text" class="form-control option" id="answer" name="Question[option][]"></div><div class="col-md-1"><i class="nav-icon fas fa-trash removediv" style="color:red;"></i></div></div></div></div>';
        // var str = '<div class="row"><div class="col-sm-12"><div class="row"><div class="col-md-1"><div class="form-group clearfix"><div class="icheck-primary d-inline"><input type="radio" id="questionOption' + cnt + '" name="Question[answer]" value="' + cnt + '"><label for="questionOption' + cnt + '"></label></div></div></div><div class="col-md-8"><input type="text" class="form-control option" id="answer" name="Question[option][]"></div><div class="col-md-2"><input type="file" class="form-control"  name="Question[answer_image][]"></div><div class="col-md-1"><i class="nav-icon fas fa-trash removediv" style="color:red;"></i></div></div></div></div>';
        $(".card-body").append(str)
        $("#answerCount").val(cnt)
    });
</script>
<!--<script src="{{url('/public/admn/js/ckeditor.js') }}"></script>-->
<script src="{{url('/public/admn/js/bootstrap3-wysihtml5.all.min.js') }}"></script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea1').wysihtml5()
    })
</script>
@include('admin/includes.admin-footer')


