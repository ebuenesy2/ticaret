<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> Public Login | {{ config('admin.Admin_Title') }}</title>
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
   @include('admin.include.headerPublic')

    
    <!------- Lang --->
    @include('include.lang')

    <!-- Page-content -->
    <div class="page-content">
        <div class="container-fluid">

        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" YILDIRIMDEV "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" YILDIRIMDEV ADMİN "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" YILDIRIMDEV STOK "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        
                                        <!-- Multi Lang -->
                                        <div class="col-12 d-flex border mb-2">
                                            <div class="col-5"><p>@lang('admin.selectLanguage')</p></div>
                                            <div class="col-5">
                                                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                                                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="{{asset('/assets/admin')}}/assets/images/flags/@lang('admin.lang').svg" alt="Header Language" height="20" class="rounded">
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">

                                                        <!-- item-->
                                                        <a href="/request/form/tr/login/{{$id}}" class="dropdown-item notify-item language py-2" data-lang="tr" title="Türkçe">
                                                            <img src="{{asset('/assets/admin')}}/assets/images/flags/tr.svg" alt="user-image" class="me-2 rounded" height="18">
                                                            <span class="align-middle">Türkçe</span>
                                                        </a>


                                                        <!-- item-->
                                                        <a href="/request/form/en/login/{{$id}}" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                                            <img src="{{asset('/assets/admin')}}/assets/images/flags/en.svg" alt="user-image" class="me-2 rounded" height="18">
                                                            <span class="align-middle">English</span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Multi Lang -->

                                        <div>
                                            <h5 class="text-primary">@lang('admin.welcome')</h5>
                                            <p class="text-muted"> @lang('admin.PleaseInformation') </p>
                                            <p class="text-muted"> @lang('admin.RequestReceiveScreen') </p>
                                        </div>

                                        @if(session('status') == "succes")
                                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert" style="margin-top: 30px; "> {{session('msg')}}  </div>
                                        @elseif(session('status') == "error")
                                        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert"  style="margin-top: 30px; "> {{session('msg')}}  </div>
                                        @endif

                                        <div class="mt-4">
                                            <form action="{{route('request.form.login.control.post')}}" method="post" class="c-card__body" >
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                <input name="siteLang" type="hidden" value= "@lang('admin.lang')" />
                                                <input name="id" type="hidden" value= "{{$id}}" />
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">@lang('admin.userName')</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="@lang('admin.userName')">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">@lang('admin.password')</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input" id="password" name="password" placeholder="@lang('admin.enterUrPassword')" >
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-visibled"><i class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">@lang('admin.login')</button>
                                                </div>
                                                
                                            </form>
                                        </div>

                                        <!-- <div class="mt-5 text-center">
                                            <p class="mb-0"> <a href="/user/register/{{__('admin.lang')}}" class="fw-semibold text-primary text-decoration-underline"> @lang('admin.becomeRegister')</a> </p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        </div>
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

         
        <!-- password-addon init -->
        <script src="{{asset('/assets/admin')}}/assets/js/pages/password-addon.init.js"></script>

    </footer>