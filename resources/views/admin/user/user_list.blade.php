<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.PersonnelList') | {{ config('admin.Admin_Title') }}</title>
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

    <!-- Modal Coloums -->
    <div class="modal fade" id="modalTableColoums" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > @lang('admin.TableSettings')   </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">

                        <!---  Loading --->
                        <div id="LoadingFileUpload" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfo --->
                        <div id="ModalBodyInfo" style="display:none;"  >
                            <p>@lang('admin.SelectVisibilityColumnsTable')</p>
                            <div id="exportModalHeaderTable"  style="display: flex;flex-wrap: wrap;gap: 15px;" ></div>
                        </div>
                         <!---  ModalBodyInfo Son --->

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item_check_coloums">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Coloums  Son -->

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

    <!-- Modal Ekle -->
    <div class="modal_new fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                    <button type="button" class="btn-close" onclick={$("#add_modal").modal('hide');} ></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                         
                        <div class="row">
                            <div class="col-6" >
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('admin.name')</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="@lang('admin.name')">
                                </div>

                                <div class="mb-3">
                                    <label for="tel" class="form-label">@lang('admin.Phone')</label>
                                    <input class="form-control" type="text" id="tel" name="tel" placeholder="@lang('admin.Phone')">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">@lang('admin.password')</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" id="password" name="password" placeholder="@lang('admin.enterUrPassword')" >
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-visibled"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>

                                
                                <!-- Seç Departman -->
                                <div class="mb-3">
                                    <label for="selectDepartman" class="form-label">Departman</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectDepartman">
                                        <option value="">Seç </option>
                                        <option value="Yönetici" >Yönetici</option>
                                        <option value="ProjeYönetici" >Proje Yönetici</option>
                                        <option value="YazılımUzmanı"  >Yazılım Uzmanı</option>
                                        <option value="DışTicaretYöneticisi"  >Dış Ticaret Yöneticisi</option>
                                        <option value="DışTicaretUzmanı"  >Dış Ticaret Uzmanı</option>
                                        <option value="Muhasebe"  >Muhasebe</option>
                                    </select>
                                </div>
                                <!-- Seç Departman Son -->

                               
                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="surname" class="form-label">@lang('admin.surname')</label>
                                    <input class="form-control" type="text" id="surname" name="surname" placeholder="@lang('admin.surname')">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">@lang('admin.email')</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="@lang('admin.email')">
                                </div>

                              

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">@lang('admin.repeatPassword')</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" id="repassword" name="repassword" placeholder="@lang('admin.enterUrPassword')" >
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-visibled"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>


                                <!-- Seç Görevi -->
                                <div class="mb-3">
                                    <label for="selectRole" class="form-label">Görevi</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectRole">
                                        <option value="">Seç </option>
                                        <option value="user" >User</option>
                                        <option value="admin" >Admin</option>
                                    </select>
                                </div>
                                <!-- Seç Görevi Son -->
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#add_modal").modal('hide');} >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="new_add">@lang('admin.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ekle  Son -->

    <!-- Modal Silme  -->
    <div class="modal fade flip" id="deleteModal" tabindex="-1" aria-hidden="true"  >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        
                        <div style="display:flex;justify-content: center;gap: 10px;" >
                            <h4>@lang('admin.AreYouSure')</h4>
                            <p class="text-muted fs-15 mb-4">#</p><p class="text-muted fs-15 mb-4" id="delete_data_id"></p>
                        </div>

                        <p class="text-muted fs-15 mb-4">@lang('admin.DeleteWarning')</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>@lang('admin.Close')</button>
                            <button class="btn btn-danger" id="data_delete" disabled>@lang('admin.Delete')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Silme  Son -->

    <!-- Modal Güncelle -->
    <div class="modal_new fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" onclick={$("#edit_modal").modal('hide');} ></button>
                </div>
                <form action="#">

                   <!---  Loading --->
                    <div id="loaderEdit" style="display:block;" ><span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status"></span>
                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                    </span> </div>
                    <!--- Son Loading --->

                    <!---  ModalBodyInfoImage --->
                    <div class="modal-body" id="ModalBodyInfoEdit" style="display:none;" >
                         <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="UpdatedName" class="form-label">@lang('admin.name')</label>
                                    <input class="form-control" type="text" id="UpdatedName" name="name" placeholder="@lang('admin.name')">
                                </div>
                                <div class="mb-3">
                                    <label for="UpdatedEmail" class="form-label">@lang('admin.email')</label>
                                    <input class="form-control" type="email" id="UpdatedEmail" name="email" placeholder="@lang('admin.email')">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">@lang('admin.password')</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" id="UpdatedPassword" name="password" placeholder="@lang('admin.enterUrPassword')" >
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-visibled"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>

                                <!-- Seç Departman -->
                                <div class="mb-3">
                                    <label for="selectDepartmanUpdate" class="form-label">Departman</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectDepartmanUpdate">
                                        <option value="">Seç </option>
                                        <option value="Yönetici" >Yönetici</option>
                                        <option value="ProjeYönetici" >Proje Yönetici</option>
                                        <option value="YazılımUzmanı"  >Yazılım Uzmanı</option>
                                        <option value="DışTicaretYöneticisi"  >Dış Ticaret Yöneticisi</option>
                                        <option value="DışTicaretUzmanı"  >Dış Ticaret Uzmanı</option>
                                        <option value="Muhasebe"  >Muhasebe</option>
                                    </select>
                                </div>
                                <!-- Seç Departman Son -->


                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="UpdatedSurname" class="form-label">@lang('admin.surname')</label>
                                    <input class="form-control" type="text" id="UpdatedSurname" name="surname" placeholder="@lang('admin.surname')">
                                </div>
                                <div class="mb-3">
                                    <label for="UpdatedTel" class="form-label">@lang('admin.Phone')</label>
                                    <input class="form-control" type="text" id="UpdatedTel" name="UpdatedTel" placeholder="@lang('admin.Phone')">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">@lang('admin.repeatPassword')</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" id="UpdatedRePassword" name="repassword" placeholder="@lang('admin.enterUrPassword')" >
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-visibled"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>

                                
                                <!-- Seç Görevi -->
                                <div class="mb-3">
                                    <label for="selectRoleUpdate" class="form-label">Görevi</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectRoleUpdate">
                                        <option value="">Seç </option>
                                        <option value="user" >User</option>
                                        <option value="admin" >Admin</option>
                                    </select>
                                </div>
                                <!-- Seç Görevi Son -->
                                    
                            </div>
                         </div>

                    </div>
                     <!---  ModalBodyInfoImage Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger"  onclick={$("#edit_modal").modal('hide');} >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Güncelle  Son -->

   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('admin.PersonnelList') </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/user/list">@lang('admin.Personnel')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.PersonnelList')</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.PersonnelList')</p> <p> | {{count($DB_Find)}}</p> </h5>
                                <div class="flex-shrink-0">
                                    <div class="flax-shrink-0 hstack gap-2">
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <div class="row g-2">
                                    
                                    <!-- Arama id -->
                                    <div class="col-xl-2 col-md-6">
                                        <label for="searhId_Table" class="form-label">ID</label>
                                        <div class="search-box">
                                            <input type="text" class="form-control search" id="searhId_Table" placeholder="@lang('admin.searchById')">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!-- Arama id Son -->
                                    
                                    <!-- Arama Takvim-->
                                    <div class="col-xl-2 col-md-6"> 
                                        <label for="exampleInputdate" class="form-label">Zaman</label>
                                        <input type="date" class="form-control" id="exampleInputdate"  style="cursor: pointer;">
                                    </div>
                                    <!--son Arama Takvim-->

                                    <!-- Arama Durum -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectActive" class="form-label">Aktif</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectActive">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="1">@lang('admin.Active')</option>
                                            <option value="0">@lang('admin.Passive')</option>
                                        </select>
                                    </div>
                                    <!--son Arama Durum  -->

                                     <!-- Arama Durum -->
                                     <div class="col-xl-2 col-md-4">
                                        <label for="selectDepartmanSearch" class="form-label">Departman</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectDepartmanSearch">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="Yönetici" >Yönetici</option>
                                            <option value="ProjeYönetici" >Proje Yönetici</option>
                                            <option value="YazılımUzmanı"  >Yazılım Uzmanı</option>
                                            <option value="DışTicaretYöneticisi"  >Dış Ticaret Yöneticisi</option>
                                            <option value="DışTicaretUzmanı"  >Dış Ticaret Uzmanı</option>
                                            <option value="Muhasebe"  >Muhasebe</option>
                                        </select>
                                    </div>
                                    <!--son Arama Durum  -->

                                    <!-- Arama Görevi -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectRoleSearch" class="form-label">Görevi</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectRoleSearch">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="user" >User</option>
                                            <option value="admin" >Admin</option>
                                        </select>
                                    </div>
                                    <!-- Arama Görevi Son -->


                                    <div class="col-12 d-none mb-3 mt-3" >
                                            <!----- Coloumn --->
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#modalTableColoums"  style="width: 150px;display: flex;gap: 10px;background-color: cadetblue;" ><i class="ri-grid-line"></i> @lang('admin.TableSettings') </button>
                                            <!----- End Coloumn --->

                                            <!--- Import ----->
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#modalTableImport"  style="width: 150px; margin-left:10px; display: flex;gap: 10px;background-color: slateblue;" ><i class="ri-folder-upload-line"></i> Import</button>
                                            <!--- Son Import ----->
                                            

                                            <!--- Export -->
                                            <div class="col-xl-2 col-md-4" style="display: flex; height: 40px; gap: 10px; padding: 3px; margin-left: 10px;">
                                                <img data-bs-toggle="modal" data-bs-target="#exportJsonModal" title="Json" src="/assets/img/icon/json-file.png" style=" cursor:pointer;" alt="" srcset="">
                                                <img data-bs-toggle="modal" data-bs-target="#exportXmlModal" title="Xml" src="/assets/img/icon/xml.png" style=" cursor:pointer;" alt="" srcset="">
                                                <img data-bs-toggle="modal" data-bs-target="#exportExcelModal" title="Excel" src="/assets/img/icon/excel.png" style="cursor:pointer;height: 35px; display:none;" alt="" srcset="">
                                                <img title="Pdf" src="/assets/img/icon/pdf.png" style=" cursor:pointer; display:none; " alt="" srcset="">
                                            </div>
                                            <!--- Son Export -->
                                    </div>
                                
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body">

                                <div id="choosedPanel" style="border: 1px solid black;padding: 4px;display: flex;gap: 20px; margin-bottom: 23px; display:none; ">
                                  

                                    <!--- İşlemler -->
                                    <div style="display: flex;gap: 5px;">
                                        <div style="display: flex;gap: 5px;">
                                            <p style="display: block; margin-top: auto; margin-bottom: auto;">@lang('admin.Choosed') (</p>
                                            <p id="choosedItemCount" style="display: block; margin-top: auto; margin-bottom: auto;">11</p>
                                            <p style="display: block; margin-top: auto; margin-bottom: auto;">)</p>
                                        </div>
                                        <i class="fa fa-trash" id="chooseItemsDeleted" style="display: block; color: rgb(237, 28, 36); font-size: 20px; margin-top: auto; margin-bottom: auto; cursor: pointer;" title="tümünü sil"></i>
                                    </div>
                                    <!--- İşlemler Son -->
                                    
                                    <!--- Filtreleme -->
                                    <div style="display: flex;gap: 10px; text-align: center;" >
                                        <i class="ri-filter-3-line" style="color: darkgray;font-size: 20px;margin-top: auto;margin-bottom: auto;" ></i>
                                        <select id="choosedItemAction" class="form-select" style="height: 30px;border: 1px solid #dfe3e9;font-size: .875rem;width: 160px;padding: 4px;cursor: pointer;">
                                            <option style="cursor: pointer;" value="choose" selected>@lang('admin.Choose')</option>
                                            <option style="cursor: pointer;" value="delete">@Lang('admin.Delete')</option>
                                            <option style="cursor: pointer;" value="active">@Lang('admin.Active')</option>
                                            <option style="cursor: pointer;" value="passive">@Lang('admin.Passive')</option>
                                        </select>
                                    </div>
                                    <!--- Filtreleme Son -->


                                    <!--- Button -->
                                    <button type="button" class="btn btn-success bg-gradient waves-effect waves-light" style="padding: inherit;" id="update_checkedItems" >@lang('admin.Edit')</button>


                                </div>

                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light text-muted">
                                            <tr style="cursor:pointer;" >
                                            
                                                <!---- Tümü Seç --->
                                                <th style="margin: auto;" exportname="Check"><input style="cursor:pointer;" type="checkbox" id="showAllRows" value="all" data_value=""></th>

                                                <th class="sort" data-sort="type" scope="col" id="checkItemBox"  exportname="Id" >Id</th>
                                                <th class="sort" data-sort="order_date" scope="col" exportname="CreatedDate" >@lang('admin.createdDate')</th>
                                                <th exportname="Image" >@lang('admin.Image')</th>
                                                <th exportname="Name" >@lang('admin.name')</th>
                                                <th exportname="Surname" >@lang('admin.surname')</th>
                                                <th exportname="Email" >@lang('admin.email')</th>
                                                <th exportname="Role" >Görevi</th>
                                                <th exportname="Departman" >Departman</th>
                                                <th class="sort status" data-sort="status" scope="col" id="tableStatusTh" exportname="Status" >@lang('admin.Status')</th>
                                                <th exportname="Actions" >@lang('admin.Actions')</th>
                                            </tr>
                                        </thead>
                                        <!--end thead-->
                                        <tbody class="list form-check-all">

                                            <!--tr-->
                                            <tr style="display:none;"  id="tableConst" ><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> </tr>
                                            <!--end tr-->

                                            @for ($i = 0; $i < count($DB_Find); $i++)
                                                <tr>
                                                
                                                    <!---- Seç --->
                                                    <td  exportname="Check"  id="checkItemCol" class="c-table__cell"><input id="checkItem" style="cursor:pointer;" type="checkbox" data_check_id="{{$DB_Find[$i]->id}}" > </td>

                                                    <td  exportname="Id" id="itemID" class="type"> {{$DB_Find[$i]->id}}</td>
                                                    <td exportname="CreatedDate" class="order_date"> {{$DB_Find[$i]->created_at}}</td>

                                                    <!---- Resim --->
                                                    <td exportname="Image" id="listItemImageBox" class="c-table__cell" style="width: 100px; cursor:pointer;" > <img src="{{asset($DB_Find[$i]->img_url)}}" data-bs-toggle="modal" data-bs-target="#modalImage" data-id="{{$DB_Find[$i]->id}}" data-src="{{$DB_Find[$i]->img_url}}"  alt="" class="avatar-xs rounded-circle me-2" data-toggle="modal" data-target="#modalImage" ></td>
                                                    
                                                    <td exportname="Name" > {{$DB_Find[$i]->name}}</td>
                                                    <td exportname="Surname" > {{$DB_Find[$i]->surname}}</td>
                                                    <td exportname="Email" > {{$DB_Find[$i]->email}}</td>

                                                    <td exportname="Role" > {{$DB_Find[$i]->role}}</td>
                                                    <td exportname="Departman" > {{$DB_Find[$i]->departman}}</td>
                                                   
                                                
                                                    <td class="status" id="tableStatus" data_val="{{$DB_Find[$i]->isActive}}" exportname="Status">
                                                        @if($DB_Find[$i]->isActive == 1)  <span class="badge badge-soft-success text-uppercase" >@lang('admin.Active')</span>
                                                        @elseif($DB_Find[$i]->isActive == 0)  <span class="badge badge-soft-danger text-uppercase">@lang('admin.Passive')</span>
                                                        @endif
                                                    </td>

                                                    <td id="listItemActionBox" exportname="Actions" >
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item" title ="@lang('admin.Visibility')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View" style="cursor:pointer;" > @if($DB_Find[$i]->isActive == 1) <a class="view-item-btn text-success"><button class="btn btn-success waves-effect waves-light" style="width: 45px;height: 45px;"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="true"  ><i  class="ri-eye-fill align-bottom"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="true" ></i></button></a>  @elseif($DB_Find[$i]->isActive == 0)  <a class="view-item-btn"><button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px;" id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="false" ><i class="ri-eye-off-fill align-bottom" id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="false" ></i></button></a>  @endif </li>
                                                            <li class="list-inline-item edit" title ="@lang('admin.Edit')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"> <a href="/user/@lang('admin.lang')/edit/{{$DB_Find[$i]->id}}" class="text-info d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i> </button> </a> </li>
                                                            <li class="list-inline-item" title ="@lang('admin.Delete')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Remove" style="cursor:pointer;" > <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" data_id="{{$DB_Find[$i]->id}}" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data_id="{{$DB_Find[$i]->id}}" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <!--end tr-->
                                            @endfor

                                        </tbody>
                                    </table>
                                    
                                    <!-- NotFound -->
                                    <div class="noresult" id="noresultList" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">@lang('admin.notFound')</h5>
                                        </div>
                                    </div>
                                    <!-- NotFound Son -->

                                    
                                    @if(count($DB_Find) == 0 )

                                     <!-- No Item -->
                                    <div class="noresult" id="dataNoItemList">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/wcjauznf.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:250px;height:250px"></lord-icon>
                                            <h5 class="mt-2">@lang('admin.DataListisEmpty')</h5>
                                        </div>
                                    </div>
                                     <!-- No Item Son -->

                                    @endif

                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Geri
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            İleri
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer>

            <!------- Footer --->
            @include('admin.include.footer')

            <!-- list.js min js -->
            <script src="{{asset('/assets/admin')}}/assets/libs/list.js/list.min.js"></script>
            <script src="{{asset('/assets/admin')}}/assets/libs/list.pagination.js/list.pagination.min.js"></script>

            <!-- password-addon init -->
            <script src="{{asset('/assets/admin')}}/assets/js/pages/password-addon.init.js"></script>

            <!------- List --->
            <script src="{{asset('/assets/admin')}}/js/user/user_list.js"></script>

        </footer>