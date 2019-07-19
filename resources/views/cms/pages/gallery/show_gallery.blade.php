@extends('cms.master.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            @include('cms.layouts.messages')
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

                        <div class="row">
                        @forelse ($galleryData as $key => $gallery)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{url('uploads/images/gallery'. '/' .$gallery->image_name)}}" alt="image not found" />
                                        <div class="mask">
                                            <p>{{$gallery->image_name}}</p>
                                            <div class="tools tools-bottom">
                                                <a href="{{route('edit_gallery').'/'.$gallery->id}}"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('delete_gallery').'/'.$gallery->id}}"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>{{$gallery->caption}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                        @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection