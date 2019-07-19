@section('auth-header')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <!-- login and register css -->
    <link rel="stylesheet" href="{{asset('admin/auth/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('admin/auth/css/register.css')}}">
</head>
@endsection
