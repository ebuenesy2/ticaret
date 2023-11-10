<!-- Begin page -->
<div id="layout-wrapper">

<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ config('admin.Admin_Logo.dark.url') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{asset('/assets') }}{{ config('admin.Admin_Logo.dark.sm.imgUrl') }}" alt="{{ config('admin.Admin_Logo.dark.sm.imgAltDescription') }}">
                        </span>
                        <span class="logo-lg">
                            <img src="{asset('/assets') }}{{ config('admin.Admin_Logo.dark.lg.imgUrl') }}" alt="{{ config('admin.Admin_Logo.dark.sm.imgAltDescription') }}" >
                        </span>
                    </a>

                    <a href="{{ config('admin.Admin_Logo.light.url') }}" class="logo logo-light">
                        <span class="logo-sm">
                           <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.light.sm.imgUrl') }}" alt="{{ config('admin.Admin_Logo.light.sm.imgAltDescription') }}">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.light.lg.imgUrl') }}" alt="{{ config('admin.Admin_Logo.light.lg.imgAltDescription') }}" >
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            
            </div>

            <div class="d-flex align-items-center">

               

                 <!------- Header - Çoklu Dil ve Bildirim --->
             

                <!-- User -->
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{$userImageUrl}}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{$name}} {{$surname}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{$role}}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Merhaba {{$name}}  {{$surname}} !</h6>
                        <a class="dropdown-item" href="/user/@lang('admin.lang')/profile/view"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profil Ayarları</span></a>
                        <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/user/login/@lang('admin.lang')"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">@lang('admin.logout')</span></a>
                    </div>
                </div>
                <!-- User -->
            </div>
        </div>
    </div>
</header>


@include('admin.include.menuList')

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>


    
<!-- main content-->
<div class="main-content">