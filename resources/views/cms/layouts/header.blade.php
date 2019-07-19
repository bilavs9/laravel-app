@section('header')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title',$title)</title>
    <!-- Bootstrap -->
    <link href='{{asset('admin/packages/bootstrap/dist/css/bootstrap.min.css')}}' rel="stylesheet">
    <!-- Font Awesome -->
    <link href='{{asset('admin/packages/font-awesome/css/font-awesome.min.css')}}' rel="stylesheet">
    <!-- NProgress -->
    <link href='{{asset('admin/packages/nprogress/nprogress.css')}}' rel="stylesheet">
    <!-- iCheck -->
    <link href='{{asset('admin/packages/iCheck/skins/flat/green.css')}}' rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href='{{asset('admin/packages/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}' rel="stylesheet">
    <!-- JQVMap -->

    <!-- bootstrap-daterangepicker -->
    <link href='{{asset('admin/packages/bootstrap-daterangepicker/daterangepicker.css')}}' rel="stylesheet">
    <link href='{{asset('admin/packages/animate.css/animate.min.css')}}' rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href='{{asset('admin/css/custom.min.css')}}' rel="stylesheet">

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{asset('admin/packages/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/packages/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}">
</head>
    @endsection