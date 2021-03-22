@extends('nwsites.layout.sites')
@section('content')
<section class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- Col-3 --> 
            <div class="col-lg-3">
                <div class="left-board">
                    <div class="left-id mb-3">
                        <div class="img">
                            <a href="{{url('/user-dashboard')}}"><img src="{{ asset('assets/sites/img/demo.png') }}" alt=""></a>
                        </div>
                        <div class="img-txt">
                        <h2>Hi {{@$userDetails->fname}}!</h2>
                            <b>{{@$userDetails->company}}</b>
                            {{-- <span>Sydney: The 29 Dec 11:39 am</span> --}}
                        </div>
                    </div>
                    {{--<a href="{{url('new-wippli')}}">New Wippli</a>--}}
                </div>

                {{--<div class="left-board left-board-second mt-5">

                    <div class="left-inner-box inner-box-action">
                        <h3>Actions</h3>
                        <div>
                            <div class="list"><div class="list-left"><img src="" alt=""></div> <div class="list-right"><a href="#">The job</a></div></div>
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Deliverables</a></div></div>
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Dimensions</a></div></div> 
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">More info</a></div></div> 
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Attachments</a></div></div>   
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Include</a></div></div>                            

                        </div>
                    </div>
                </div>--}}

                {{--<div class="left-board left-board-second mt-5">
                    <div class="left-inner-box inner-box-action">
                        <div>
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Submit Wippli</a></div></div> 
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Cancel</a></div></div>   
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Delete</a></div></div>                            
                        </div>
                    </div>
                </div>--}}
            </div>
            <!-- Col-3 End --> 
            <!-- Col-9 --> 

            <div class="col-lg-9">
                <div class="form1 form">

                    <div class="form_inner">
                        <div class="header new-wippli-head">
                            <div class="row twotab-content-header">
                                <div class="col-lg-6">

                                </div>
                                <div class="col-lg-6">
                                    <ul>

                                        <li><i class="fa fa-times"></i></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>New Wippli</h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="logo">
                                        <img src="{{ asset('assets/sites/img/tasc-logo.png') }}" alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-txt">
                            <div class="tabs two-tabs">
                                
                                    <div class="row mb-5">
                                        <div class="col-lg-3">
                                            <ul class="nav nav-tabs">
                                                <li class=""><a data-toggle="tab" href="#home">Short and Sweet</a></li>
                                                <!-- <li><a data-toggle="tab" href="#menu1">Let's Go Into Details</a></li> -->
                                                <!--   <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                                 <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>  -->
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="nav nav-tabs nav-tab-right">
                                                <!-- <li class="active"><a data-toggle="tab" href="#menu2">Task</a></li>
                                                <li><a data-toggle="tab" href="#menu3">Project</a></li>  -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">




                            <form id="shortSweeyForm" method="post" action="{{url('newWippliSave')}}" enctype="multipart/form-data">
                                @csrf
                                <h3>New Task</h3><br>
                                <span class="errMsg"></span>

                                <input type="hidden" name="wippli_id" value="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Project Name <span>*</span></label>
                                            <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Type here">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Deadline <span>*</span></label>
                                                <input type="date" class="form-control" name="deadline"  id="deadline">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Department <span>*</span></label>
                                            <select class="form-control" name="category" id="category">
                                                <option>Select</option>
                                                @foreach($categories as $k=>$cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 typecls" style="display: none;">
                                        <div class="form-group">
                                            <label>Type <span>*</span></label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter the department name">
                                            <!-- <div id="types"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text">
                                            <label>Instructions <span>.</span></label>
                                            <textarea class="form-control" rows="8" name="instruction" id="instruction" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <img src="{{ url('public/wippli/img') }}/logo-icn.png" id="userImg" height="80" width="80">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Attachments/Files</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control-file"  onchange= "readURL(this, 'userImg')"  >
                                </div>
                                <button type="submit" id="simpleButton4" class="btn form-btn">SUBMIT WIPPLI</button>
                            </form>
                        </div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#detailForm").validate({
            errorClass: "has-error",
            ignore: ".ignore",
            // Specify validation rules
            rules: {
                "project_name": {
                    required: true,
                },
                "deadline": {
                    required: true,
                },
                "category": {
                    required: true,
                }, 
                "type": {
                    required: true,
                }, 
                "instruction": {
                    required: true,
                },                
                "business_id": {
                    required: true,
                },
                "width": {
                    required: true,
                }, 
                "height": {
                    required: true,
                },                
                "units": {
                    required: true,
                },
            },
            messages: {
                project_name: {
                    required: "Please enter Project Name.",
                },
                deadline: {
                    required: 'Please enter phone number',
                },
            },
        });
    });
</script>
                        <div id="menu1" class="tab-pane fade">
                            <form id="detailForm"  enctype="multipart/form-data" action="{{url('newWippliSave')}}">
                                @csrf
                                <h3>The Job</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Project Name <span>*</span></label>
                                            <input type="text" class="form-control" name="project_name" placeholder="Type here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Deadline <span>*</span></label>
                                                <input type="text" class="form-control" name="deadline" placeholder="Type here">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Category <span>*</span></label>
                                            <select class="form-control" name="category" id="dcategory">
                                                <option>Select</option>
                                                @foreach($categories as $k=>$cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Type <span>*</span></label>
                                            <div id="types">
                                                <select class="form-control" name="type" id="dtype">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Objective <span>*</span></label>
                                            <input type="text" class="form-control" name="objective" id="dobjective" placeholder="Type here">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text">
                                            <label>Instructions <span>*</span></label>
                                            <textarea class="form-control" rows="3" name="instruction" id="dinstruction" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text">
                                            <label>Message/Copy</label>
                                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Additional Information</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group or">
                                            <div class="form-group">
                                                <label>Dimensions</label>
                                                <select class="form-control" name="dimensions" id="dimensions">
                                                    <option>Choose from standard dimensions</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group text-center w">
                                            <label>W</label>
                                            <input type="text" class="form-control" name="width" id="width"  placeholder="Type here">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group text-center">
                                            <label>H</label>
                                            <input type="text" class="form-control" name="height" id="height" placeholder="Type here">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="form-group text-center">
                                                <label>UNITS</label>
                                                <select class="form-control" name="units" id="units">
                                                    <option></option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="position: relative;">
                                        <ul class="radio-btn">
                                            <li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="portrait" type="checkbox" id="dportrait" value="option1">
                                                    <label class="form-check-label" for="portrait">Portrait</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="landscape" type="checkbox" id="dlandscape" value="option2">
                                                    <label class="form-check-label" for="inlineClandscapehlandscapeeckbox2">Landscape</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 bdr_botm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group text">
                                            <label>Comment</label>
                                            <textarea class="form-control" name="comment" id="comment" rows="12" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group text">
                                            <label>Target audience</label>
                                            <textarea class="form-control" name="target_audience" id="target_audience" rows="12" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group text">
                                            <label>Tone of voice</label>
                                            <textarea class="form-control" name="tone_of_voice" id="tone_of_voice" rows="12" placeholder="Type here"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Attachments/Files</label>
                                            <input type="file" name="attachment2" id="attachment2" class="form-control-file"  onchange= "readURL(this, 'userImg')"  >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="detailButton1" class="btn form-btn">SUBMIT WIPPLI</button>
                            </form>
                        </div>
                                </div>
                            </div>
                        </div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#shortSweeyForm").validate({
            errorClass: "has-error",
            ignore: ".ignore",
            // Specify validation rules
            rules: {
                "project_name": {
                    required: true,
                },
                "deadline": {
                    required: true,
                },
                "category": {
                    required: true,
                }, 
                "type": {
                    required: true,
                }, 
                "instruction": {
                    required: true,
                },
            },
            messages: {
                project_name: {
                    required: "Please enter Project Name.",
                },
                deadline: {
                    required: 'Please enter phone number',
                },
            },
        });
    });
</script>
@endsection