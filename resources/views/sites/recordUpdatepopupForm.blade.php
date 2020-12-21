
<!--------------------------  form1  -------------------------->
<section class="form1 form">
    <div class="container" style="width:100% !important">
        <div class="form_inner">
            <div class="form-txt">
                <div class="tabs">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <form id="shortSweeyForm" method="post" action="{{url('newWippliSave')}}" enctype="multipart/form-data">
                                @csrf
                                <h3 class="formTitle">The Job</h3><br>
                                <span class="errMsg"></span>

                                <input type="hidden" name="wippli_id" value="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role <span>*</span></label>
                                            <div id="roles">
                                                <select id="inputState" class="form-control" name="role">
                                                    @foreach($Roles as $role)
                                                    <option {{($role['id'] == $roleId)?'selected':''}} >{{$role['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" id="simpleButton" class="btn form-btn">SUBMIT WIPPLI</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>