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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Privilege</th>
                            <th>Created at</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($usersData as $key=>$users)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->user_name}}</td>
                            <td>
                                <form method="post" action="{{route('update_status')}}">
                                {{csrf_field()}}
                                    <input type="hidden" name="criteria" value="{{$users->id}}">
                                @if($users->status==1)
                            <span class="label label-success"> active</span>
                                @else
                                        <span class="label label-danger"> inactive</span>
                                    @endif
                            </form>
                            </td>
                            <td>@if($users->privilege=='super_admin')
                                    <label class="label label-primary">admin</label>
                                @else
                                    <label class="label label-warning">users</label>
                                @endif

                            </td>
                            <td>{{$users->created_at->diffforhumans()}}</td>

                            <td><img src="{{url('uploads/images/users/'.$users->image)}}" width="100" height="55px" alt="image not found"></td>
                            <td>
                                <a href="{{route('edit_user').'/'.$users->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('delete_user').'/'.$users->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="{{route('active_status').'/'.$users->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Active"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                <a href="{{route('inactive_status').'/'.$users->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Inactive"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
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