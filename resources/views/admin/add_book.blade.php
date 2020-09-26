@extends('admin.layout.app')
@section('title', 'Add Books')
@section('css')
<link href="{{URL::asset('/public/admn/css/plugincss/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('/public/admn/css/bootstrapValidator.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('/public/css/multi-select.css')}}" rel="stylesheet">
@stop
@section('content')
<?php //echo "<pre>"; print_r($book); die();?>
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        {{ isset($book->id) ? 'Edit Book' : 'Add Books' }}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    @if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
    @endif
    @if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
            <div class="card">

                <div class="card-block m-t-35">
                    <div>
                        <h4>Book Information</h4>
                    </div>
                    <form class="form-horizontal login_validator" id="tryitForm"
                          enctype="multipart/form-data" action="{{ isset($book->id) ? url('/admin/edit_book/' . $book->id) : url('/admin/add_book') }}"
                          method="post">
                        <div class="row">
                            <div class="col-12">
                                {{ csrf_field() }}
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="category" class="col-form-label">
                                            Category *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <select class="form-control chzn-select" tabindex="2" name="category" required>
                                                <option value="">Choose a Category</option>
                                                @if($categories)
                                                    @foreach($categories as $id => $category)
                                                        <option value="{{ $id }}"
                                                                {{ (isset($book->id) ? $book['cat_id'] : old('category')) == $id ? 'selected' : '' }}>
                                                            {{ $category }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="user" class="col-form-label">
                                            User </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <select name="user" class="form-control chzn-select" tabindex="2">
                                                <option value="0">Choose a User</option>
                                                @if($categories)
                                                    @foreach($users as $id => $user)
                                                        <option value="{{ $id }}" {{ isset($book->id) ? ($book['user_id']) == $id ? 'selected' : '' : '' }}>{{ $user }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="isbn" class="col-form-label">
                                            ISBN *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="isbn"
                                                   class="form-control" value="{{ isset($book->isbn_no) ? $book->isbn_no : old('isbn') }}" required="">
                                        </div>
                                        @if ($errors->has('isbn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('isbn') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="title" class="col-form-label">
                                            Book Condition </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="book_condition"
                                                   class="form-control" value="{{ isset($book->book_condition) ? $book->book_condition : old('book_condition') }}">
                                        </div>
                                        @if ($errors->has('book_condition'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('book_condition') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="title" class="col-form-label">
                                            Title *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="title"
                                                   class="form-control" value="{{ isset($book->title) ? $book->title : old('title') }}" required="">
                                        </div>
                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="book_desc" class="col-form-label">Description </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <textarea class="form-control" name="book_desc"
                                                      cols="50" rows="5">{{ isset($book->book_desc) ? $book->book_desc : old('book_desc') }}</textarea>                                            
                                        </div>
                                        @if ($errors->has('book_desc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('book_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="image" class="col-form-label">Upload Image </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div id="coba" class="chk">
                                            @if(!empty($book->bookImages))
                                                @foreach($book->bookImages as $bookImages)
                                                <div id="{{ $bookImages->id }}">
                                                    <i class="fa fa-times red-cls delete-image" aria-hidden="true"></i>
                                                    <img src="{{url('public/images/books/original/' . $bookImages->image)}}"
                                                         height="200px"
                                                         width="150px"/>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">Author* </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div>
                                            <input type="text" @if(!empty($book->bookAuthors)) name="author[{{$book->id}}][{{$book->bookAuthors['0']->id}}]" @else name="author[]" @endif value="{{(!empty($book->bookAuthors)) ? $book->bookAuthors['0']->author : old('author.0')}}"
                                                    class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-lg-left"><button class="add_field_button">Add More</button></div>
                                </div>
                                <div class="input_fields_wrap">
                                    @if(!empty($book->bookAuthors)) 
                                        @foreach($book->bookAuthors as $author)
                                            @continue($loop->first)
                                            <div class="form-group row m-t-25">
                                                <div class="col-lg-3 text-lg-right"></div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div>
                                                        <input type="text" 
                                                           name="author[{{$book->id}}][{{$author->id}}]"
                                                           value="{{$author->author}}" 
                                                           class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 text-lg-left">
                                                    <a href="#" class="remove_field" id="{{$author->id}}">Remove</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="org_price" class="col-form-label">
                                            Original Price *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input_top_align">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" name="org_price" class="form-control" value="{{ isset($book->org_price) ? $book->org_price : old('org_price') }}" required>
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        @if ($errors->has('org_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('org_price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="listing_price" class="col-form-label">
                                            Listing Price </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input_top_align">
                                            <span class="input-group-addon">$</span>
                                            <input type="number"
                                                   name="listing_price"
                                                   class="form-control"
                                                   value="{{ isset($book->listing_price) ? $book->listing_price : old('listing_price') }}">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        @if ($errors->has('listing_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('listing_price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 push-lg-3">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-user"></i>
                                            {{ isset($book->id) ? 'Edit Category' : 'Add New' }}
                                        </button>
                                        @if(!isset($book->id))
                                        <button class="btn btn-warning" type="reset" id="clear">
                                            <i class="fa fa-refresh"></i>
                                            Reset
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagescript')
<script>
    $(document).ready(function () {
        var base_url = "{{asset('/')}}";
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group row m-t-25"><div class="col-lg-3 text-lg-right"></div><div class="col-xl-6 col-lg-8"><div><input type="text" name="author[]" class="form-control" value=""/></div></div><div class="col-lg-3 text-lg-left"><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            var id = this.id;
            if(id){
                $.ajax({
                        url:  base_url + 'admin/author/delete/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data, status) {
                            $('#' + id).parent('div').parent('div').remove();
                            x--;
                        },
                        error: function (result) {
                                alert("Some error occur");
                        }
                });
            } else {
                $(this).parent('div').parent('div').remove();
                x--;
            }
            
        })
        $(".delete-image").click(function(e) {
            var didConfirm = confirm("Are you sure you want to delete this image?");
            if (didConfirm == true) {
            var imageId = $(this).parent().attr('id');
            $.ajax({
                    url:  base_url + 'admin/book_image/delete/' + imageId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data, status) {
                            $('#' + imageId).remove();
                    },
                    error: function (result) {
                            alert("Some error occur! Please try again.");
                    }
            });
            } else {
                return false;
            }
			
        });
        $("#coba").spartanMultiImagePicker({
            fieldName: 'bookImage[]',
            maxCount: 6,
            rowHeight: '200px',
            groupClassName: 'col-md-4 col-sm-4 col-xs-6',
            allowedExt: 'png|jpg|jpeg|gif',
            maxFileSize: '',
            placeholderImage: {
                image: base_url + 'public/images/placeholder.png',
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onAddRow: function (index) {
                console.log(index);
                console.log('add new row');
            },
            onRenderedPreview: function (index) {
                console.log(index);
                console.log('preview rendered');
            },
            onRemoveRow: function (index) {
                console.log(index);
            },
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });

    });
</script>
<script src="{{URL::asset('/public/admn/js/pluginjs/jasny-bootstrap.js')}}"></script>
<script src="{{URL::asset('/public/admn/js/holder.js')}}"></script>
<script src="{{URL::asset('/public/admn/js/bootstrapValidator.min.js')}}"></script>
<script src="{{URL::asset('/public/admn/js/pages/validation.js')}}"></script>

<script src="{{URL::asset('/public/js/spartan-multi-image-picker.js')}}"></script>
<script src="{{URL::asset('/public/js/jquery.multi-select.js')}}"></script>
@stop