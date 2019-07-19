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
                        <form  action="{{route('add_news')}}" class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="title" value="{{old('title')}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Enter title" required="required" type="text">
                                    <a href="" style="color: red">{{$errors->first('title')}}</a>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="description" value="{{old('description')}}" name="description" required="required" class="form-control col-md-7 col-xs-12">
                                    <a href="" style="color: red">{{$errors->first('description')}}</a>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <select class="form-control" name="category" id="category">
                                        <option selected disabled>Choose option</option>
                                        <option>Technology</option>
                                        <option>Entertainment</option>
                                        <option>Creativity</option>
                                        <option>Programming</option>
                                    </select>
                                    <a href="" style="color: red">{{$errors->first('category')}}</a>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
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
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Add News</button>
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