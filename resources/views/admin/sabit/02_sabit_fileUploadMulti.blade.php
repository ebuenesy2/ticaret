<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.FileUploadMultiple') | {{ config('admin.Admin_Title') }}</title>
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
                        <h4 class="mb-sm-0">@lang('admin.FileUploadMultiple')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/sabit/@lang('admin.lang')">@lang('admin.File')</a></li>
                                <li class="breadcrumb-item active">@lang('admin.FileUploadMultiple')</li>
                            </ol>
                        </div>
                      

                    </div>
                </div>
                <!-- End Body Title -->

                <!-- Body Content -->
                <div class="col-12">
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-sm-0"> @lang('admin.FileUploadMultiple')  </h4>
                        
                        <!-- Dosya Yükleme Kutusu ----->
                        <div style="width: 450px;border: 2px solid;padding: 10px;">
                                                
                            <!-- Dosya Yükleme ----->
                            <form method="POST" id="uploadForm_Multi" enctype="multipart/form-data">
                                <div style="display: flex;flex-direction: column; gap: 15px;">

                                    <!-- Dosya Yükleme Bilgileri ----->
                                    <input type="hidden" name="fileDbSave" id="fileDbSave" value="true" >
                                    <input type="hidden" name="fileWhere" id="fileWhere" value="Sabit" >

                                    <!---  Loading --->
                                    <div id="LoadingFileUpload" style="display:none;" ><span class="d-flex align-items-center">
                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                                    </span> </div>
                                    <div id="uploadStatus"></div>
                                    <!--- End Loading --->

                                    <input type="file" name="files[]" style="display: flex; color: steelblue; margin-left: 10px; " multiple>
                                    <div style="display: flex; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrl"></p></div>
                                    <button type="submit" name="submit" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex;justify-content: center;align-items: center;">
                                        <i class="c-alert__icon fa fa-cloud-upload" style="margin-top: -8px; font-size: 24px;"></i> 
                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " >@lang('admin.FileUploadMultiple') </p>
                                    </button>
                                    
                                    <!-- ProgressBar ---->
                                    <div class="progress" style="margin-top: 20px;">
                                    <div class="progress-bar" id="progressBarFileUpload" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                </div>
                                    <!-- ProgressBar Son ---->
                                    
                                </div>
                            </form>
                            <!-- Dosya Yükleme Son ---->
                    
                        </div>
                        <!-- Dosya Yükleme Kutusu Son ----->

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

        <!--- JS --> 
        <script src="{{asset('/upload')}}/js/fileUploadMulti.js"></script>

    </footer>