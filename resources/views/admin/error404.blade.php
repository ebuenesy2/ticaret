<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>404 | {{ config('admin.Admin_Title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ config('admin.Admin_Meta_Title') }}">
    <meta name="author" content="{{ config('admin.Admin_Meta_Author') }}">
    <meta name="description" content="{{ config('admin.Admin_Meta_Description') }}">
    <meta name="keywords" content="{{ config('admin.Admin_Keywords') }}">

    <!------- Head --->
    @include('admin.include.head')


</head>

<body>


 <!-- auth-page wrapper -->
 <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

<!-- auth-page content -->
<div class="auth-page-content overflow-hidden p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="text-center">
                    <img src="{{asset('/assets/admin')}}/assets/images/error400-cover.png" alt="error img" class="img-fluid">
                    
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end auth-page content -->
</div>
<!-- end auth-page-wrapper -->


<footer>

<!------- Footer --->
@include('admin.include.footer')


</footer>