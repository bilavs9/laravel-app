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
                                <th>Menu</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($menuData as $key=>$menus)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$menus->menu_name}}</td>
                                    <td>{{$menus->created_at}}</td>
                                    <td>{{$menus->updated_at}}</td>
                                    <td>
                                        <a href="{{route('edit_menu').'/'.$menus->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('delete_menu').'/'.$menus->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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