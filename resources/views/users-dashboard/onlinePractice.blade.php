@extends('sites.layout.tutor')
@section('content')

<div class="col-xs-12 col-lg-8 col-md-8" id="middle">  

<!-------------------------- start Prevent right click and f12 button ------------------------------>
<script>
    // $(document).keydown(function (event) {
    //     if (event.keyCode == 123) { // Prevent F12
    //         return false;
    //     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
    //         return false;
    //     }
    // });
    // $(function() {
    //     $(this).bind("contextmenu", function(e) {
    //         e.preventDefault();
    //     });
    // }); 
</script>
<!-------------------------- end Prevent right click and f12 button ------------------------------>

<form id="regForm" action="{{url('onlinePractice')}}/{{@$pId}}">
<input type="hidden" name='pId' value="{{$pId}}">
@if(!empty($result))
<div class="resultSection">
  <h3>Report</h3>
      <div class="progress-bar progress-bar-striped active"  id="progressbar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      100%
    </div><br>
  <div class="innerSectionResult">
    <label>Total Question : {{$result['totalQuestions']}}</label><br>
    <label>Total Score : {{$result['totalScore']}}</label><br>
    <label>Your Score : {{$result['yourScore']}}</label><br>
    <!--<label>Right Attempt : {{$result['rightAttempt']}}</label><br>-->
    <!--<label>Wrong Score : {{$result['wrongScore']}}</label><br>-->

    <div class="circle_main">
      <h6 class="trtr">Total Marks </h6>   
      <div id="circle">
        <table width="100%" border="0">
         <tbody>
           <tr>
            <td height="40" class="totalMarks">{{$result['yourScore']}}</td>
          </tr>
          <tr>
            <td style="border-top:solid 1px #999;" class="totalCount">{{$result['totalScore']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<a href="{{url('/onlinePractice')}}/{{@$pId}}" >
    <button type="button" class="btn btn-primary">Restart Quiz</button>
</a>
@else
@if(isset($paperSlug[1]) && !empty($paperSlug[1]) && (($paperSlug[0] == 'Paper') || @$paperSlug[2] == 'Paper' || @$paperSlug[1] == 'Paper'))
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<script type="text/x-mathjax-config">
      MathJax.Hub.Config({
      extensions: ["[a11y]/accessibility-menu.js"],
      tex2jax: {inlineMath: [['$','$'],['\\(','\\)']]},
      "fast-preview": {disabled: true},
      AssistiveMML: {disabled: true},
      menuSettings: {explorer: true}
    });
    MathJax.Ajax.config.path["a11y"] = "../extensions";
    if(window.location.href.indexOf("mathjax.github.io/MathJax-a11y") > -1) {
        MathJax.Ajax.config.path["SRE"] = "https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/extensions/a11y";
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS_HTML-full"></script>
<?php
// echo 'User IP Address - '. $_SERVER['REMOTE_ADDR'];
?>
<h1>{{$pId}}</h1>
<!--{{(100/36)*18}}-->
<!----------------------- START PROGRESS BAR  ----------------- ---------->
<div class="progress">
    <div class="progress-bar progress-bar-striped active"  id="progressbar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="{{count($QADetails)}}" style="width:{{$PaperProgress?$PaperProgress+1:0}}%">
      {{$PaperProgress?$PaperProgress+1:0}}%
    </div>
    <!--<div class="progress-bar progress-bar-striped active"  id="progressbar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="{{count($QADetails)}}" style="width:0%">-->
    <!--  0%-->
    <!--</div>-->

  </div>
  @if(!empty($progress))
  <script>
    $(document).ready(function(){
        randTab('bubble{{$progress}}','activeTab{{$progress}}','{{$progress}}')
      });
    </script>
    @endif
    <!----------------------- END PROGRESS BAR  ----------------- ---------->
      @if(!empty($QADetails))
      <?php $i=1;?>
      @foreach ($QADetails as $qid => $v)
      <div class="{{ $i!=1?'tab':''}} customTab activeTab{{$i}}" data-qid="{{$qid}}" data-qmark="{{$v['questionMark']}}">
        @foreach ($v as $k => $value)
        @if($k == 'Question')
       <?php echo ($value); ?>
        <!--<h3>{{ strip_tags(@$value)}}</h3>-->
        <hr class="topBotSpace">
        <input type="hidden" class="questionType{{$i}}" value="{{$v['questionType']}}"> 
        <div class="innerTabContent" style="margin:0px !important ">
          @if(!empty($v['Image']))
          <div class="text-center"><img src="{{url('/public/admin/upload/questions')}}/{{$v['Image']}}" class="responsive-image"></div>
          <hr>
          <!--{{$v['questionMark']}}-->
          @else
          <!--<img src="{{url('/public/admin/upload/defaultQuestion.png')}}" height='200' width='200'>-->
          @endif
          @endif
          @if($v['questionType'] != 'open-ended')
            @if($k == 'Options')
            <div class="optionsdiv{{$i}}">
              @foreach ($value as $key => $answer) 
              <div class="isCorrect" data-isCorrect="{{$v['isCorrect'][$key]}}" data-isSubscriber="{{$Subscriber}}" data-questionid="{{$qid}}" data-questionMark="{{$v['questionMark']}}" right-ansWer={{$v['isCorrect'][$key] == 'Yes' ? @$answer : '' }}>
                @if($v['isCorrect'][$key] == 'Yes')
                <input type="hidden" class="rightAns" value="{{@$answer}}">
                @endif
                <input type="radio" class="answeroption{{$i}}" id="answer{{$qid.$key}}"  name="answer[{{$qid.'-'.$v['questionMark']}}]" value="{{$v['isCorrect'][$key]}}" >
                <label for="answer{{$qid.$key}}"  ><span class="fontSizeLg"><?php echo @$answer ?></span> </label><span class="spanImgNew"><img src="{{url('public/sites/users/images/new-tick-green.png')}}" class="hide {{$v['isCorrect'][$key] == 'Yes' ? 'correctOption'.$i : '' }}" height="30" width="30" style="margin-bottom:0px !important;"></span><br>
              </div>
              @endforeach
            </div>
            @endif
          @endif

          @endforeach
          
          
          <!------------------------- FOR OPEN ENDED ----------------->
          @if($v['questionType'] == 'open-ended')
          <div class="optionsdiv{{$i}}">
              <div class="bix-div-answer customAnswer" style="" id="openedAnswer_{{$v['qId']}}">
                  <input type="text" id="open-answered{{$i}}" placeholder="Enter Your Answer" value="">
              </div>
              <br>

              <button type="button" data-question="{{$v['qId']}}" data-num="{{$i}}" possibility-answer="{{json_encode($QADetails[$qid]['possibilityAnswer'])}}"  class="student_answered redColorbut" >Submit</button>
          </div>
          <br> 
          @endif
          <!------------------------- FOR OPEN ENDED ----------------->
          
          
          <!--<br>-->
          <div class="wrongAns" style="background-color: rgb(255, 90, 95);color:#ffffff;padding: 15px;display:none;text-align: center;margin-left:36%;width:35%;border-radius: 0px;"></div>
          <div class="bix-div-answer mx-none customAnswer" id="divAnswer_{{$v['qId']}}">
            <p>
                <span class="mx-green mx-bold">Explanation:</span><br> 
                <?php echo $v['Explanation'] ? $v['Explanation'] : 'Explanation will be soon' ?>
            </p> 
              <!--@if(!empty($v['videoType']) && (($v['videoType'] == 'vimeo') || ($v['videoType'] == 'youtube')) )-->
              <!--    @if(!empty($v['embededUrl']))-->
              <!--        <iframe src="{{$v['embededUrl']}}" width="600" height="300" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
              <!--    @endif-->
              <!--@endif-->
          </div>
            <br>
          <div class="bix-div-toolbar viewsolution hide" id="divToolBar_{{$i}}">
              <a class="answer" href="javascript: void 0;" onclick="viewSolution('divAnswer_{{$v['qId']}}','{{$Subscriber}}')">View Solution</a>
          </div>
          @if($v['questionType'] != 'open-ended')

          <div class="bix-div-toolbar saveAnswer" id="saveAnswer_{{$i}}">
            <?php $qidmrk = $qid.'-'.$v['questionMark'] ; ?>
            <a class="answer" href="javascript: void 0;" onclick="saveOption('{{$i}}','answeroption{{$i}}')">Submit</a>
          </div>
          <hr class="topBSpace">
          @else
          <!--ddd-->
          @endif
        </div>
            <div style="overflow:auto;">
              <div style="float:right;">
                @if($i !=1)
                <button type="button" class="customColorBut" id="prevBtn" onclick="PrevTab('activeTab{{$i}}','activeTab{{$i-1}}','{{$i}}')">Previous</button>
                @endif
                @if(count($QADetails) != $i)
                <button type="button" class="customColorBut" id="nextBtn" onclick="nextTab('activeTab{{$i}}','activeTab{{$i+1}}','{{$i}}','answeroption{{$i}}','{{$v['questionMark']}}')">Next</button>
                @else
                <button type="button" class="customColorBut" onclick="finalSubmit('answeroption{{$i}}','{{$i}}')" >Submit</button>
                @endif

              </div>
            </div>
          </div>
          <?php $i++;?>
          @endforeach
          @endif
              <!--<link rel="stylesheet" href="https://sweetalert.js.org/assets/css/app.css">-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
          <script>
              
            function viewSolution(id,subscription){
                if(subscription == 'exist'){
                    $('#'+id).slideToggle('1000')
                }else{
                    //                https://sweetalert2.github.io/
            		Swal.fire({
            		  title: '<h3>Sorry, this is a function for Premium Users. Get your 7-days Free Trial now!</h3>',
            		  icon: 'info',showCloseButton: true,showCancelButton: false,focusConfirm: false,
            		  confirmButtonText:'<a class="customButN" style="color:#ffffff" href="{{url('plans')}}"> Start Free Trial </a> ',
            		  confirmButtonAriaLabel: 'Thumbs up, great!',
            		  cancelButtonText:'<i class="fa fa-thumbs-down"></i>',
            		  cancelButtonAriaLabel: 'Thumbs down'
            //		  html:'<a href="{{url('plans')}}">Get Offer</a> ',
            		});
//                    swal({title: "Error!", text: "Sorry, this is a function for Premium Users. Get your 7-day Free Trial now!", type: "error"});
                }
            }
            function saveOption(i,cls){
              var checked_value = $("."+cls+":checked").val();
              var questionType = $(".questionType"+i).val();
              if(questionType != "open-ended"){
                if (typeof checked_value === 'undefined') {
                    Swal.fire({
            		  title: '<h3>Please first select an option!</h3>',
            		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
            		  button: "Ok!",
            		});
                  return false;
                }
              }
                // <!-------start show correct/incorrect answers --------->
                // $('.correctOption'+i).addClass('correct')
                 $('.correctOption'+i).removeClass('hide')

                if (checked_value == 'Yes') {
                    $(".wrongAns").css({'display':'block','background-color':'rgb(33, 142, 35)'})
                    $(".wrongAns").text('Your answer is Correct!')
                } else {
                    // $(this).css('color', '#ff5a5f')
                    $(".wrongAns").css({'display':'block','background-color':'#ff5a5f'})
                    $(".wrongAns").text('Your answer is Wrong!')
                }
                // <!-------end show correct/incorrect answers --------->
              
              $('#divToolBar_'+i).removeClass('hide');
              $('#saveAnswer_'+i).addClass('hide');
              $('.optionsdiv'+i).addClass('ncklble')
            }
            
            function nextTab(cur,nxt,n,opn,questionMark){               
              var checked_value = $("."+opn+":checked").val();
              var questionType = $(".questionType"+n).val();
              
              //Check Answer submition
                var isSubmitoption = $('.optionsdiv'+n).hasClass('ncklble')
                if(questionType != "open-ended"){
                    if(!isSubmitoption){
                    Swal.fire({
            		  title: '<h3>Please first submit an option!</h3>',
            		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
            		  button: "Ok!",
            		});
                    //   swal({title: "Error!", text: "Please first submit an option", type: "error"});
                      return false;
                    }

                    if (typeof checked_value === 'undefined') {
                    Swal.fire({
            		  title: '<h3>Please first select an option!</h3>',
            		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
            		  button: "Ok!",
            		});
                    //   swal({title: "Error!", text: "Please first select an option", type: "error"});
                      return false;
                    }
              }else{
                  var openAnswered = $("#open-answered"+n).val();
                  if(openAnswered == ''){
                     Swal.fire({
            		  title: '<h3>Please first fill the answer!</h3>',
            		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
            		  button: "Ok!",
            		});
                    // swal({title: "Error!", text: "Please first fill the answer", type: "error"});
                    return false;
                  }
                  
                    if(!isSubmitoption){
                        Swal.fire({
                		  title: '<h3>Please first submit the answer!</h3>',
                		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
                		  button: "Ok!",
                		});
                    //   swal({title: "Error!", text: "Please first submit the answer", type: "error"});
                      return false;
                    }
              }
              if(n != '' ){
                var pId = '{{@$pId}}'
                progressStatus(n,pId,checked_value,questionMark);
              }
              $(".wrongAns").css('display','none')
              $("."+cur).addClass('tab')
              $("."+nxt).removeClass('tab')
              
              var buble = "bubble"+n;
              var activeTab = "activeTab"+n;
            //   randTab(buble,activeTab,n)

            }

            function progressStatus(n,pId,checked_value,questionMark){
              var totalQuestion = $("#progressbar").attr('aria-valuemax')
              if(totalQuestion != '' ){
                $.ajax({
                  url: "{{url('progressStatus')}}",
                  type:'post',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  data:{checkedVal:checked_value,qMark:questionMark,progress:n,pid:pId,totalQuestion:totalQuestion}, 
                  success: function(progress) { 
                   $("#progressbar").css('width',progress+'%')
                   $("#progressbar").text(progress+'%')
                   console.log(progress)
                 }
               }); 
              }
            }

            function PrevTab(cur,prev,n){
              $(".wrongAns").css('display','none')
              $("."+cur).addClass('tab')
              $("."+prev).removeClass('tab')
            }
            function randTab(bubble,rand,n){
              $(".wrongAns").css('display','none')
              $(".customTab").addClass('tab')
              $(".step").css('background-color','#f3565e')
              $("."+rand).removeClass('tab')
              $("."+bubble).css('background-color','rgb(33, 142, 35)')
            }

            $(document).ready(function () {
              $(".isCorrect").on('click', function () {
                var ans = $(this).attr('data-isCorrect')
                var isSubscriber = $(this).attr('data-isSubscriber')
                console.log(isSubscriber)
                var rightAns = $(".rightAns").val()
                <!------- Start question Attempt Save --------->
                var questionId = $(this).attr('data-questionid');
                var questionMark = $(this).attr('data-questionMark');
                if(questionId != '' ){
                    // //////answerList[questionId] = questionMark
                $.ajax({
                  url: "{{url('questionAttempt')}}",
                  type:'post',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  data:{question_id:questionId},
                  success: function(result) { 
                    // if(result >= 10){
                    //     if(isSubscriber == 'notExist'){
                    //         console.log(result)
                    //         swal({title: "Error!", text: "Sorry, You have exceed questions free attempt . Get your 7-days Free Trial now!!", type: "error"});
                    //         setTimeout(function () {
                    //          window.location.href = "{{url('subscribe')}}";
                    //         }, 6000);
                            
                    //     }
                    //   }
                    }
                  }); 
              }
              <!------- End question Attempt Save --------->

              });
            });
            
            function finalSubmit(opn,n){
              var checked_value = $("."+opn+":checked").val();
              var questionType = $(".questionType"+n).val();
              
              //Check Answer submition
                var isSubmitoption = $('.optionsdiv'+n).hasClass('ncklble')
                if(questionType != "open-ended"){
                    if (typeof checked_value === 'undefined') {
                        Swal.fire({
                		  title: '<h3>Please first select an option!</h3>',
                		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
                		  button: "Ok!",
                		});
                    //   swal({title: "Error!", text: "Please first select an option", type: "error"});
                      return false;
                    }
                }else{
                  var openAnswered = $("#open-answered"+n).val();
                  if(openAnswered == ''){
                                              Swal.fire({
                		  title: '<h3>Please first fill the answer!</h3>',
                		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
                		  button: "Ok!",
                		});
                    // swal({title: "Error!", text: "Please first fill the answer", type: "error"});
                    return false;
                  }
                  if(!isSubmitoption){
                        Swal.fire({
                		  title: '<h3>Please first submit the answer!</h3>',
                		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
                		  button: "Ok!",
                		});
                    //   swal({title: "Error!", text: "Please first submit the answer", type: "error"});
                      return false;
                  }
              }
              $("#regForm").submit()
                // var pId = '{{@$pId}}'
                //         $.ajax({
                //           url: "{{url('removeProgress')}}",
                //           type:'post',
                //           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //           data:{pid:pId}, 
                //           success: function(progress) { 
                //           if(progress=='success'){
                //             $("#regForm").submit()
                //           }
                //          }
                //       });               
            }
          </script>

          <script>
            $(".student_answered").click(function() {
              var possibilityAnswer = [];
              var questionId = $(this).attr('data-question');
              var possibilityAnswer = $(this).attr('possibility-answer');
              var i = $(this).attr('data-num');
              var pId = '{{@$pId}}'
              var openAnswered = $("#open-answered"+i).val();
              
              if(openAnswered == ''){
                Swal.fire({
        		  title: '<h3>Please first fill the answer!</h3>',
        		  icon: 'error',showCloseButton: true,showCancelButton: false,focusConfirm: false,
        		  button: "Ok!",
        		});
                // swal({title: "Error!", text: "Please first fill the answer", type: "error"});
                return false;
              }
              $('#divToolBar_'+i).removeClass('hide');
              $('#saveAnswer_'+i).addClass('hide');
              $('.optionsdiv'+i).addClass('ncklble')
              if(pId != '' && questionId != '' ){
                $.ajax({
                  url: "{{url('saveAnswered')}}",
                  type:'post',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  data:{question_id:questionId,open_answered:openAnswered,pid:pId,possibilityAnswer:possibilityAnswer,openAnswered:openAnswered},
                  success: function(result) { 
                    if(result == 'correct'){
                        $(".wrongAns").css({'display':'block','background-color':'rgb(33, 142, 35)'})
                        $(".wrongAns").text('Your answer is Correct!')
                    }else{
                        $(".wrongAns").css({'display':'block','background-color':'#ff5a5f'})
                        $(".wrongAns").text('Your answer is Wrong!')
                    }
                  }
                }); 
              }
            }); 
          </script>

          <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
          @endif
          @if(empty($result) && empty($QADetails))
          <h1>No paper Found </h1>
          @endif

          @endif
          <br>
          @if(empty($queryString))
          <hr>
          <br>
     
         @endif
       </form>

     </div>
     <div class="col-xs-12 col-md-2 col-md-2 col-lg-2 bgForCustom">  

      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:10px;" class="customPagination">
        @if (!empty($QuestionAnswer))
        @foreach ($QuestionAnswer as $key => $value)
        @if(count($QuestionAnswer) != $key)
        <span class="step stepCustomList bubble{{$key+1}} {{$key==0?'actv':''}}" onclick="randTab('bubble{{$key+1}}','activeTab{{$key+1}}','{{$key+1}}')">{{$key+1}}</span>
        @endif
        @endforeach
        @endif
      </div>
    </div>
    
     <div class="col-xs-12 col-md-2 col-md-2 col-lg-2 customPaginationScroll"> 
     
          <div class="mx-pager-container pagerCustomCss"> 
           <p class="mx-pager mx-lpad-25"> 
             @if(!empty($practicePaper))
             @foreach($practicePaper as $paperId=>$paperName)
             <a href="{{url('onlinePractice')}}/{{$paperId}}"><span class="mx-pager-no">{{$paperName}}</span></a> 
             @endforeach
             @endif
           </p>
         </div>
     </div>    
    @endsection
