@extends('cms.master.master')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@yield('title',$title)</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{--{{$errors}}--}}
                            <form  action="{{route('add_user')}}" class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        <a href="" style="color: red">{{$errors->first('name')}}</a>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" value="{{old('email')}}" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                        <a href="" style="color: red">{{$errors->first('email')}}</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>Choose option</option>
                                            <option value="1">active</option>
                                            <option value="0">inactive</option>
                                        </select>
                                        <a href="" style="color: red">{{$errors->first('status')}}</a>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Privilege</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select class="form-control" name="privilege" id="privilege">
                                            <option selected disabled>Choose option</option>
                                            <option>admin</option>
                                            <option>super_admin</option>
                                        </select>
                                        <a href="" style="color: red">{{$errors->first('privilege')}}</a>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                        <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" name="upload" id="imgInput">
                                        </span>
                                    </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                    <a href="" style="color: red">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="item form-group">
                                    <label for="name" class="control-label col-md-3">Username</label>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="user_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="user_name" placeholder="" required="required" type="text">
                                        <a href="" style="color: red">{{$errors->first('user_name')}}</a>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                                        <a href="" style="color: red">{{$errors->first('password')}}</a>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Confirm Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="confirm_password" type="password" name="confirm_password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                                        <a href="" style="color: red">{{$errors->first('confirm_password')}}</a>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success">Add Record</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection