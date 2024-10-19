<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> Kullanıcı Güncelle | {{ config('admin.Admin_Title') }}</title>
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

    <!------- Header --->
    @include('admin.include.header')

    
    <!------- Lang --->
    @include('include.lang')

    
    <!-- Modal Resim -->
    <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Image') #</p>  <p id="image_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">

                        <!---  Loading --->
                        <div id="LoadingFileUploadImage" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfoImage --->
                        <div id="ModalBodyInfoImage" style="display:none;" >
                          <img id="productViewImage" src="" alt="" style="margin: auto;display: flex;width: 400px;">
                       </div>  
                        <!---  ModalBodyInfoImage  Son --->            

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Resim  Son -->

    <!-- Page-content -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <!-- main content-->
                <div class="main-content">

                    <div class="container-fluid">

                        <div class="position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg profile-setting-img">
                                <div class="overlay-content">
                                    <div class="text-end p-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card mt-n5">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                <img  id="profileImage" src="{{$DB_Find->img_url}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" data-bs-toggle="modal" data-bs-target="#modalImage" data-id="{{$DB_Find->id}}" data-src="{{$DB_Find->img_url}}" style="cursor:pointer;" >
                                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                                </div>
                                            </div>
                                            <h5 class="fs-16 mb-1" id="user_info" data_id="{{$DB_Find->id}}" >{{$DB_Find->name}} {{$DB_Find->surname}} </h5>
                                            <p class="text-muted mb-0">{{$DB_Find->departman}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="flex-grow-1">
                                                <h5 class="card-title mb-0">Profil Resmi Güncelle</h5>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                        
                                            <!-- Dosya Yükleme ----->
                                            <form method="POST" id="uploadForm" enctype="multipart/form-data">
                                                <div style="display: flex;flex-direction: column; gap: 15px;">

                                                    <!-- Dosya Yükleme Bilgileri ----->
                                                    <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                    <input type="hidden" name="fileWhere" id="fileWhere" value="profileImage">
                                                    <input type="hidden" name="profileUserId" id="profileUserId" value="{{$DB_Find->id}}">

                                                    <!---  Loading --->
                                                    <div id="LoadingFileUpload" style="display:none;"><span class="d-flex align-items-center">
                                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                                        <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                    </span> </div>
                                                    <div id="uploadStatus"></div>
                                                    <!--- Son Loading --->

                                                    <input type="file" name="file" id="fileInput" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: none; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrl"></p></div>
                                                    <button type="button" id="fileUploadClick" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                        <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; "> Dosya Yükleme </p>
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

                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card mt-xxl-n5">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link text-body active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                                    Kullanıcı Bilgileri
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-body" data-bs-toggle="tab" href="#changePassword" role="tab">
                                                    Parola Güncelleme
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                <form action="javascript:void(0);">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label">İsim</label>
                                                                <input type="text" class="form-control" id="firstnameInput" placeholder="" value="{{$DB_Find->name}}" >
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="lastnameInput" class="form-label">Soyisim</label>
                                                                <input type="text" class="form-control" id="lastnameInput" placeholder="" value="{{$DB_Find->surname}}" >
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="phonenumberInput" class="form-label">Telefon Numarası</label>
                                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="" value="{{$DB_Find->tel}}" >
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="emailInput" class="form-label">Mail Adresi</label>
                                                                <input type="email" class="form-control" id="emailInput" placeholder="" value="{{$DB_Find->email}}"  disabled >
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                    <label for="exampleInputdate" class="form-label">Doğum Tarihi</label>
                                                                    <input type="date" class="form-control" id="exampleInputdate" value="{{$DB_Find->dateofBirth}}" >
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="collection_status" class="form-label">Tahsil Durumu</label>
                                                                <input type="text" class="form-control" id="collection_status" placeholder="" value="{{$DB_Find->collection_status}}" >
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                         <!-- Seç Departman -->
                                                         <div class="col-lg-6">
                                                           <div class="mb-3">
                                                               <label for="selectDepartman" class="form-label">Departman</label>
                                                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectDepartman">
                                                                    <option value="">Seç </option>
                                                                    <option value="Yönetici"  {{$DB_Find->departman == "Yönetici" ? 'selected' : '' }} >Yönetici</option>
                                                                    <option value="ProjeYönetici" {{$DB_Find->departman == "Proje Yönetici" ? 'selected' : ''  }} >Proje Yönetici</option>
                                                                    <option value="YazılımUzmanı" {{$DB_Find->departman == "Yazılım Uzmanı" ? 'selected' : ''  }} >Yazılım Uzmanı</option>
                                                                    <option value="DışTicaretYöneticisi" {{$DB_Find->departman == "Dış Ticaret Yöneticisi" ? 'selected' : ''  }} >Dış Ticaret Yöneticisi</option>
                                                                    <option value="DışTicaretUzmanı" {{$DB_Find->departman == "Dış Ticaret Uzmanı" ? 'selected' : ''  }} >Dış Ticaret Uzmanı</option>
                                                                    <option value="Muhasebe" {{$DB_Find->departman == "Muhasebe" ? 'selected' : ''  }} >Muhasebe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Seç Departman Son -->


                                                        <!-- Seç Görevi -->
                                                        <div class="col-lg-6">
                                                           <div class="mb-3">
                                                               <label for="selectRole" class="form-label">Görevi</label>
                                                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectRole">
                                                                    <option value="">Seç </option>
                                                                    <option value="user" {{$DB_Find->role == "user" ? 'selected' : '' }}  >User</option>
                                                                    <option value="admin" {{$DB_Find->role == "admin" ? 'selected' : '' }}  >Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Seç Görevi Son -->


                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="time_experience" class="form-label">Tecrube Zamanı</label>
                                                                <input type="text" class="form-control" id="time_experience" placeholder="" value="{{$DB_Find->time_experience}}" >
                                                            </div>
                                                        </div>
                                                        <!--end col-->


                                                         <!-- Seç Görevi -->
                                                         <div class="col-lg-6">
                                                           <div class="mb-3">
                                                               <label for="type_experience" class="form-label">Tecrube Zamanı Seç</label>
                                                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectType_experience">
                                                                    <option value="">Seç </option>
                                                                    <option value="year" {{$DB_Find->type_experience == "year" ? 'selected' : '' }}  >Yıl</option>
                                                                    <option value="month" {{$DB_Find->type_experience == "month" ? 'selected' : '' }}  >Ay</option>
                                                                    <option value="day" {{$DB_Find->type_experience == "day" ? 'selected' : '' }}  >Gün</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Seç Görevi Son -->
                                                        

                                                        <!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button"  id="btn_edit" class="btn btn-primary w-100">Güncelle</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                            <!--end tab-pane-->
                                            <div class="tab-pane" id="changePassword" role="tabpanel">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-2">
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <label for="oldpasswordInput" class="form-label">Eski Şifreniz*</label>
                                                                <input type="password" class="form-control" id="oldpasswordInput" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <label for="newpasswordInput" class="form-label">Yeni Şifre*</label>
                                                                <input type="password" class="form-control" id="newpasswordInput" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <label for="confirmpasswordInput" class="form-label">Yeni Şifre Tekrar*</label>
                                                                <input type="password" class="form-control" id="confirmpasswordInput" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                       
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="btn"  id="edit_pass" class="btn btn-success w-100">Şifre Güncelle</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                     
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            
                                            </div>
                                            <!--end tab-pane-->
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- end main content-->

            </div>
            <!-- end page title -->

        </div>
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/user/userEdit.js"></script>

    </footer>