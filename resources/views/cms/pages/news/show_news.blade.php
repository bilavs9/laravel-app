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
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($newsData as $key=>$news)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$news->title}}</td>
                                    <td>{{$news->description}}</td>
                                    <td>
                                        {{$news->news_category}}
                                    <td>
                                            <input type="hidden" name="criteria" value="{{$news->id}}">
                                            @if($news->status==1)
                                                <span class="label label-success"> active</span>
                                            @else
                                                <span class="label label-danger"> inactive</span>
                                            @endif
                                    </td>
                                    <td>{{$news->created_at->diffforhumans()}}</td>

                                    <td><img src="{{url('uploads/images/news/'.$news->image)}}" width="100" height="55px" alt="image not found"></td>
                                    <td>
                                        <a href="{{route('edit_news').'/'.$news->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('delete_news').'/'.$news->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a href="{{route('active_status').'/'.$news->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-title="Active"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                        <a href="{{route('inactive_status').'/'.$news->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Inactive"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection