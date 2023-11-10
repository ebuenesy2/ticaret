<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.Const') | {{ config('admin.Admin_Title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ config('admin.Admin_Meta_Title') }}">
    <meta name="author" content="{{ config('admin.Admin_Meta_Author') }}">
    <meta name="description" content="{{ config('admin.Admin_Meta_Description') }}">
    <meta name="keywords" content="{{ config('admin.Admin_Keywords') }}">

    <!------- Head --->
    @include('admin.include.head')


    <!--------- Css  --> 
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin')}}/css/0_const.css" />
    

</head>

<body>

    <!------- Header --->
    @include('admin.include.header')

    
    <!------- Lang --->
    @include('include.lang')

    <!-- Page-content -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <!-- Body Title -->
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">@lang('admin.Const')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/sabit/@lang('admin.lang')">@lang('admin.Const')</a></li>
                                <li class="breadcrumb-item active">@lang('admin.Const')</li>
                            </ol>
                        </div>

                        <button id="new_add">Tıklama</button>

                    </div>
                </div>
                <!-- End Body Title -->

                <!-- Body Content -->
                <div class="col-12">
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-sm-0"> Sabit Sayfa  </h4>
                        
                        <p> Api : {{ config('admin.Api_Url') }} </p> 
                        
                        <p> Url: {{asset('/assets/admin')}}/ </p>


                        <div id="const_box"> Sabit kutu </div>

                        <p> lang: @lang('admin.lang')</p>

                        <!---- Çoklu dil -->
                        <?php $urlArray=explode("/",url()->current());   ?>

                        <?php print_r($urlArray);  ?>

                        <p> {{  __('admin.lang') != $urlArray[count($urlArray)-1] ?  url()->current() : str_replace('/'.__('admin.lang'),'/tr', url()->current())  }} </p>

                        <h1>Dil Test </h1>
                        <p> @lang('admin.DataUpdated')</p>


                    </div>
                </div>
                <!-- End Body Content -->

                </div>
                <!-- end page title -->

        </div>
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/0_const.js"></script>

    </footer>