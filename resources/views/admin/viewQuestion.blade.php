@extends('sites.layout.tutor')
@section('content')

<div class="col-xs-12 col-lg-8 col-md-8" id="middle">  
    <form id="regForm" action="/onlinePractice/{{@$pId}}">


        @if(!empty($QADetails))
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
        <h1>{{@$QADetails[$pId]['paperSlug']}}</h1>
        <?php $i = 1; ?>
        @foreach($QADetails as $qid => $v)
        <div class="{{ $i!=1?'tab':''}} customTab activeTab{{$i}}" data-qid="{{$qid}}" data-qmark="{{@$v['questionMark']}}">
            @foreach ($v as $k => $value)
            @if($k == 'Question')
            <h3><?php echo ($value); ?></h3>
            <hr>
            <div class="innerTabContent" style="margin:0px !important ">
                @if(!empty($v['Image']))
                <div class="text-center"><img src="{{url('/public/admin/upload/questions')}}/{{$v['Image']}}" class="responsive-image"></div>
                <hr>
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
                <br>

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


                <div class="wrongAns" style="background-color: rgb(255, 90, 95);color:#ffffff;padding: 15px;display:none;text-align: center;margin-left:36%;width:35%;border-radius: 0px;"></div>
                <div class="bix-div-answer mx-none customAnswer" id="divAnswer_{{$v['qId']}}">
                  <!--<p><span class="mx-green mx-bold">Hint:</span> <span class="jq-hdnakqb mx-bold">{{$v['ViewAnswer']}}</span></p> <br>-->
                    <p>
                        <span class="mx-green mx-bold">Explanation:</span><br> 
                        <?php echo $v['Explanation'] ? $v['Explanation'] : 'Explanation will be soon' ?>
                    </p> 
                </div>
                <br>
                <div class="bix-div-toolbar viewsolution" id="divToolBar_{{$i}}">
                    <a class="answer" href="javascript: void 0;" onclick="$('#divAnswer_{{$v['qId']}}').slideToggle('slow')">View Solution</a>
                </div>
                <hr>
            </div>
            <div style="float:right;">
                <a href="{{url('admin/question')}}" class="customColorBut" >Go Back</a>
            </div>
        </div>
        <?php $i++; ?>
        @endforeach
        @else
        <div class="bix-div-toolbar viewsolution" id="divToolBar_{{$i}}">
            <h1>No preview available</h1>
            <a href="{{url('admin/question')}}" class="customColorBut" >Go Back</a> 
        </div>
        @endif

    </form>
</div>
@endsection



