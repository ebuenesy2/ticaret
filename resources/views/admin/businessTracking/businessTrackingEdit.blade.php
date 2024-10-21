<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> İş Takibi #{{$DB_Find->id}} | {{ config('admin.Admin_Title') }}</title>
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

            <!-- Log Ekle -->
            <div class="modal fade" id="AddConditionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">İşlem Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">

                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="home" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="logDateEdit" class="form-label">İşlem Tarihi</label>
                                                <input class="form-control " id="logDateEdit" placeholder="Tarih" type="date" value="">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="logDescriptionEdit" class="form-label">İşlem Detayı</label>
                                                <textarea class="form-control" id="logDescriptionEdit" rows="4" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageAdd" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgAdd" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUpload" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatus"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInput" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: none; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrl"></p></div>
                                                                <button type="button" id="fileUploadClick" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUpload" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_log_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Log Ekle  Son -->

            <!-- Log Güncelle -->
            <div class="modal fade" id="EditConditionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_conditions_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingConditionsUpdate" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfConditionsUpdate" style="display:none;" >
                                
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeEdit" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#fileEdit" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeEdit" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <div>
                                                    <label for="logDateValue" class="form-label">İşlem Tarihi</label>
                                                    <input class="form-control " id="logDateValue" placeholder="Tarih" type="date" value="">
                                                </div>
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="logDescriptionValue" class="form-label">İşlem Detayı</label>
                                                <textarea class="form-control" id="logDescriptionValue" rows="4" ></textarea>
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="fileEdit" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageEdit" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgEdit" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadEdit" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatusEdit"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputEdit" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlEdit"></p></div>
                                                                <button type="button" id="fileUploadClickEdit" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" data_isgeneral="0" id="data_log_update">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Log Güncelle  Son -->
            
            <!-- Log Silme -->
            <div class="modal fade" id="Delete_ConditionsModal"   data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_expense_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_ConditionsModal").modal('hide');} ></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingFileUploadDelete" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoDelete" style="display:none;" >

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_ConditionsModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productEdit"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Log Silme Son -->

            <!-- Not Ekle -->
            <div class="modal fade" id="AddNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Not Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">

                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeNote" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messagesNote" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeNote" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="noteDate" class="form-label">Not Tarihi</label>
                                                <input class="form-control " id="noteDate" placeholder="Tarih" type="date" value="">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="noteCategory" class="form-label">Not Kategorisi</label>
                                                <select class="form-control"  name="choices-single-default2" id="noteCategory"  >
                                                    <option value="">Kategori Seç</option>
                                                    <option value="Ürün" >Ürün</option>
                                                    <option value="Teslimat"  >Teslimat</option>
                                                    <option value="Firma"  >Firma</option>
                                                    <option value="Whatsap"  >Whatsap Görüşme Kayıtları</option>
                                                    <option value="Email"  >Email Görüşme Kayıtları</option>
                                                    <option value="Normal"  >Normal Görüşme Kayıtları</option>
                                                </select>
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="noteDescription" class="form-label">Not Detayı</label>
                                                <textarea class="form-control" id="noteDescription" rows="4" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messagesNote" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageAddNote" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgAddNote" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadNote" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatusNote"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputNote" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlNote"></p></div>
                                                                <button type="button" id="fileUploadNoteClick" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadNote" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_note_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Not Ekle  Son -->

            <!-- Not Güncelle -->
            <div class="modal fade" id="EditNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_note_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingNoteUpdate" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfNoteUpdate" style="display:none;" >
                                
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeEditNote" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#fileEditNote" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeEditNote" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="noteDateEdit" class="form-label">Not Tarihi</label>
                                                <input class="form-control " id="noteDateEdit" placeholder="Tarih" type="date" value="">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="noteCategoryEdit" class="form-label">Not Kategorisi</label>
                                                <select class="form-control"  name="choices-single-default2" id="noteCategoryEdit"  >
                                                    <option value="">Kategori Seç</option>
                                                    <option value="Ürün" >Ürün</option>
                                                    <option value="Teslimat"  >Teslimat</option>
                                                    <option value="Firma"  >Firma</option>  
                                                    <option value="Whatsap"  >Whatsap Görüşme Kayıtları</option>
                                                    <option value="Email"  >Email Görüşme Kayıtları</option>
                                                    <option value="Normal"  >Normal Görüşme Kayıtları</option>
                                                </select>
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="noteDescriptionEdit" class="form-label">Not Detayı</label>
                                                <textarea class="form-control" id="noteDescriptionEdit" rows="4" ></textarea>
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="fileEditNote" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageEditNote" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgEditNote" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadEditNote" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatusEditNote"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputEditNote" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlEditNote"></p></div>
                                                                <button type="button" id="fileUploadClickEditNote" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadEditNote" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" data_isgeneral="0" id="data_note_update">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Not Güncelle  Son -->
            
            <!-- Not Silme -->
            <div class="modal fade" id="Delete_NoteModal"   data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_expense_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_ConditionsModal").modal('hide');} ></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingFileUploadDelete" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoDelete" style="display:none;" >

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_ConditionsModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productEdit"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Not Silme Son -->

            
            <!-- Belge Ekle -->
            <div class="modal fade" id="AddDocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Belge Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">

                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeDoc" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messagesDoc" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeDoc" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="docDate" class="form-label">Belge Tarihi</label>
                                                <input class="form-control " id="docDate" placeholder="Tarih" type="date" value="">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="docTitle" class="form-label">Belge Adı</label>
                                                <input class="form-control" type="text" id="docTitle" name="docTitle" placeholder="Başlık">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="docDescription" class="form-label">Belge Detayı</label>
                                                <textarea class="form-control" id="docDescription" rows="4" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messagesDoc" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageAddDoc" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgAddDoc" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadDoc" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatusDoc"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputDoc" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlDoc"></p></div>
                                                                <button type="button" id="fileUploadDocClick" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadDoc" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_doc_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Belge Ekle  Son -->

            <!-- Belge Güncelle -->
            <div class="modal fade" id="EditDocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_doc_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingDocUpdate" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfDocUpdate" style="display:none;" >
                                
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeEditDoc" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#fileEditDoc" role="tab" aria-selected="false" tabindex="-1">
                                            Dosya ve Belge
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeEditDoc" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="docDateEdit" class="form-label">Not Tarihi</label>
                                                <input class="form-control " id="docDateEdit" placeholder="Tarih" type="date" value="">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="docTitleEdit" class="form-label">Not Kategorisi</label>
                                                <input class="form-control" type="text" id="docTitleEdit" name="docTitleEdit" placeholder="Başlık">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="docDescriptionEdit" class="form-label">Not Detayı</label>
                                                <textarea class="form-control" id="docDescriptionEdit" rows="4" ></textarea>
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="fileEditDoc" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                                        
                                                        <!-- Dosya Yükleme ----->
                                                        
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                            <div class="d-flex gap-1">
                                                                <img id="productViewImageEditDoc" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                                <a href="" id="product_dowloand_imgEditDoc" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                                </a>
                                                            </div>
                                                            

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave" id="fileDbSave" value="true">
                                                                <input type="hidden" name="fileWhere" id="fileWhere" value="productImage">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadEditDoc" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatusEditDoc"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputEditDoc" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlEditDoc"></p></div>
                                                                <button type="button" id="fileUploadClickEditDoc" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Belge Yükle </p>
                                                                </button>
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadEditDoc" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                            </div>
                                                        <!-- Dosya Yükleme Son ---->
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->

                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" data_isgeneral="0" id="data_doc_update">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Belge Güncelle  Son -->
            
            <!-- Belge Silme -->
            <div class="modal fade" id="Delete_DocModal"   data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_expense_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_ConditionsModal").modal('hide');} ></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingFileUploadDelete" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoDelete" style="display:none;" >

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_ConditionsModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productEdit"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Belge Silme Son -->


            <!-- Todo Ekle -->
            <div class="modal fade" id="AddTodoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Yapılacak Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">

                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeTodo" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeTodo" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="todoTitle" class="form-label">Başlık</label>
                                                <input class="form-control" type="text" id="todoTitle" name="todoTitle" placeholder="Başlık">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="todoStatus" class="form-label">Durum</label>
                                                <select class="form-control"  name="choices-single-default2" id="todoStatus"  >
                                                    <option value="">Durum Seç</option>
                                                    <option value="Yapılacak" >Yapılacak</option>
                                                    <option value="Devam Ediyor" >Devam Ediyor</option>
                                                    <option value="Yapılıyor"  >Yapılıyor</option>
                                                    <option value="Yapıldı"  >Yapıldı</option>
                                                </select>
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="todoDescription" class="form-label">Açıklama</label>
                                                <textarea class="form-control" id="todoDescription" rows="4" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_todo_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Todo Ekle  Son -->

            <!-- Todo Güncelle -->
            <div class="modal fade" id="EditTodoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_todo_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingTodoUpdate" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfTodoUpdate" style="display:none;" >
                                
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#homeEditNote" role="tab" aria-selected="true">
                                            Bilgiler
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="homeEditNote" role="tabpanel">
                                        <div class="row">
                                            
                                            <div class="mb-3">
                                                <label for="todoTitleEdit" class="form-label">Başlık</label>
                                                <input class="form-control" type="text" id="todoTitleEdit" name="todoTitleEdit" placeholder="Başlık">
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="todoStatusEdit" class="form-label">Durum</label>
                                                <select class="form-control"  name="choices-single-default2" id="todoStatusEdit"  >
                                                    <option value="">Durum Seç</option>
                                                    <option value="Yapılacak" >Yapılacak</option>
                                                    <option value="Devam Ediyor" >Devam Ediyor</option>
                                                    <option value="Yapılıyor"  >Yapılıyor</option>
                                                    <option value="Yapıldı"  >Yapıldı</option>
                                                </select>
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="todoDescriptionEdit" class="form-label">Açıklama</label>
                                                <textarea class="form-control" id="todoDescriptionEdit" rows="4" ></textarea>
                                            </div>
                                                
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" data_isgeneral="0" id="data_todo_update">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Todo Güncelle  Son -->
            
            <!-- Todo Silme -->
            <div class="modal fade" id="Delete_TodoModal"   data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_expense_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_ConditionsModal").modal('hide');} ></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="LoadingFileUploadDelete" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoDelete" style="display:none;" >

                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_ConditionsModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productEdit"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Todo Silme Son -->



              
            <!-- start page title -->
            <div class="row">

                <!-- Body Title -->
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">İş Takibi #{{$DB_Find->id}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/business/tracking/list">İş Takibi</a></li>
                                <li class="breadcrumb-item active"> #{{$DB_Find->id}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- End Body Title -->
                    
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-9">

                    <!---- Bilgi  -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                                <h5 class="card-title mb-0">GENEL BİLGİSİ</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <!-- Title --> 
                                <div class="col-12 mb-3">
                                    <label for="Title_Input">@lang('admin.Title')</label>
                                    <input type="text" class="form-control" id="Title_Input" placeholder="@lang('admin.Title')" value="{{$DB_Find->title}}" >
                                </div>
                                <!-- Title Son --> 

                                <div class="col-4">
                                    <div>
                                        <label for="startingDateEdit" class="form-label">Başlangıç Tarihi</label>
                                        <input class="form-control " id="startingDateEdit" placeholder="Tarih" type="date" value="{{$DB_Find->starting_at}}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div>
                                        <label for="finishedDateEdit" class="form-label">Bitiş Tarihi</label>
                                        <input class="form-control " id="finishedDateEdit" placeholder="Tarih" type="date" value="{{$DB_Find->finished_at}}" >
                                    </div>
                                </div>

                                <!--Durum -->
                                <div class="col-4">
                                    <label for="StatusEdit" class="form-label">Durum</label>
                                    <select class="form-control"  name="choices-single-default2" id="StatusEdit"  >
                                        <option value="">Durum Seç</option>
                                        <option value="Devam Ediyor" {{$DB_Find->status == "Devam Ediyor" ? 'selected' : ''}} >Devam Ediyor</option>
                                        <option value="Tamamlandı" {{$DB_Find->status == "Tamamlandı" ? 'selected' : ''}} >Tamamlandı</option>
                                        <option value="İptal" {{$DB_Find->status == "İptal" ? 'selected' : ''}} >İptal</option>"
                                    </select>
                                </div>
                                <!--Durum Son -->
                              
                            </div>
                        </div>
                    </div>
                    <!---- Bilgi Son -->


                    <!---  Yetkili Beyanı --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:burlywood;">
                            <h5 class="card-title mb-0" style="font-weight: bold;font-size: x-large;" >Yetkili Beyanı</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="requestFormDescription">Açıklama</label>
                                <textarea class="form-control" id="requestFormDescription" rows="4" >{!!$DB_Find->authorized_statement!!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!---  Yetkili Beyanı Son --> 

                    
                    <!---   Açıklama --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0"> Açıklama</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="description">Açıklama</label>
                                <textarea class="form-control" id="description" rows="4"   >{!!$DB_Find->description!!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!---   Açıklama Son --> 

                    <!----  Belge - İşlem Geçmişi  ---->
                    <div class="card">
                        <div class="card-header" style="background-color: cadetblue;">
                            <h5 class="card-title mb-0" style="color:white">Yapılan İşlem Süreçleri</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                               
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @for ($i = 0; $i < count($DB_Find_Doc_Log); $i++)
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingOne">
                                            <a class="accordion-button p-2 shadow-none collapsed" data-bs-toggle="collapse" href="#collapseOne_{{$DB_Find_Doc_Log[$i]['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="ri-shopping-bag-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-0">{{$DB_Find_Doc_Log[$i]["title"]}} - <span class="fw-normal">{{$DB_Find_Doc_Log[$i]["created_at"]}}</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseOne_{{$DB_Find_Doc_Log[$i]['id']}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body ms-2 ps-5 pt-0">
                                                <div class="mb-3">
                                                    <div class="col-lg-12 d-flex" style="border: 1px solid;" >
                                                    <a href="/get/offers/tr/edit/{{$DB_Find_Doc_Log[$i]['id']}}" target="_blank" style="margin: auto;color: green;  font-size: 12px;"  ><p>Teklif Görüntüle</p></a>
                                                    <a href="/get/offers/tr/edit/{{$DB_Find_Doc_Log[$i]['id']}}" target="_blank" title="Göster"><button type="button" class="btn py-0 fs-16 text-body"><i class="ri-search-eye-line align-bottom" style="color: black;font-size: 25px;"></i> </button></a>
                                                    </div>
                                                </div>

                                                <div class="accordion accordion-flush" id="accordionFlushExample2">
                                                   @for ($k = 0; $k < count($DB_Find_Doc_Log[$i]['cost_calculation']); $k++)
                                                    <div class="accordion-item border-0">
                                                        <div class="accordion-header" id="headingOne">
                                                            <a class="accordion-button p-2 shadow-none collapsed" data-bs-toggle="collapse" href="#collapseTwo_{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 avatar-xs">
                                                                        <div class="avatar-title bg-success rounded-circle">
                                                                            <i class="ri-shopping-bag-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3">
                                                                        <h6 class="fs-14 mb-0">{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]["title"]}} - <span class="fw-normal">{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]["created_at"]}}</span></h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div id="collapseTwo_{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['id']}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                            <div class="mb-3">
                                                                <div class="col-lg-12 d-flex" style="border: 1px solid;" >
                                                                <a href="/cost/calculation/tr/edit/{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['id']}}" target="_blank" style="margin: auto;color: green;  font-size: 12px;"  ><p>Maliyet Görüntüle</p></a>
                                                                <a href="/cost/calculation/tr/edit/{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['id']}}" target="_blank" title="Göster"><button type="button" class="btn py-0 fs-16 text-body"><i class="ri-search-eye-line align-bottom" style="color: black;font-size: 25px;"></i> </button></a>
                                                                </div>
                                                            </div>

                                                            @for ($j = 0; $j < count($DB_Find_Doc_Log[$i]['cost_calculation'][$k]['proforma']); $j++)
                                                            <div class="accordion-item border-0" style="margin-left: 3%;">
                                                                <div class="accordion-header" id="headingOne">
                                                                    <a class="accordion-button p-2 shadow-none collapsed" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 avatar-xs">
                                                                                <div class="avatar-title bg-success rounded-circle">
                                                                                    <i class="ri-shopping-bag-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h6 class="fs-14 mb-0">{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['proforma'][$j]["title"]}} - <span class="fw-normal">{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['proforma'][$j]["created_at"]}}</span></h6>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                                
                                                                    <div class="mb-3">
                                                                        <div class="col-lg-12 d-flex" style="border: 1px solid;" >
                                                                        <a href="/proforma/invoice/tr/edit/{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['proforma'][$j]['id']}}" target="_blank" style="margin: auto;color: green;  font-size: 12px;"  ><p>Proforma Görüntüle</p></a>
                                                                        <a href="/proforma/invoice/tr/edit/{{$DB_Find_Doc_Log[$i]['cost_calculation'][$k]['proforma'][$j]['id']}}" target="_blank" title="Göster"><button type="button" class="btn py-0 fs-16 text-body"><i class="ri-search-eye-line align-bottom" style="color: black;font-size: 25px;"></i> </button></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @endfor  

                                                        </div>
                                                    </div>
                                                    @endfor  
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    @endfor  

                                    @if($DB_Find->status != "Devam Ediyor") 
                                   <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingFive">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFile" aria-expanded="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-light text-success rounded-circle">
                                                            <i class="mdi mdi-package-variant"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-0">İşlem Tamamlandı - {{$DB_Find->finished_at}} </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>
                            
                        </div>
                    </div>
                    <!---- Belge - İşlem Geçmişi Son ---->

                  
                    <!---  Notlarım --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:bisque;">
                            <h5 class="card-title mb-0">İş Süreçlerinde Alınan Notlar</h5>
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#AddNoteModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col" style="width: 130px;"> Tarih </th>
                                            <th scope="col" style="width: 130px;"> Kategori </th>
                                            <th scope="col"> Açıklama </th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="DB_Find_Note">

                                        @for ($i = 0; $i < count($DB_Find_Note); $i++)
                                        <tr id="{{$i}}" class="conditions">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih"  value="{{$DB_Find_Note[$i]->date}}" readonly="readonly" > </td>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder=""  value="{{$DB_Find_Note[$i]->category}}" readonly="readonly" > </td>
                                            <td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >{!!$DB_Find_Note[$i]->description!!}</textarea> </td>
                                            
                                            <td class="text-end" >
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_NoteModal" data-id="{{$DB_Find_Note[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Note[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
                                                <button class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#EditNoteModal"    data-id="{{$DB_Find_Note[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Note[$i]->id}}"  class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Notlarım Son --> 

                                      
                    <!---  Belgelerim --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:mediumpurple;">
                            <h5 class="card-title mb-0" style="color: aliceblue;font-weight: bold;font-size: x-large;" >Belgeler</h5>
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#AddDocModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 5%">#</th>
                                            <th scope="col" style="width: 15%;"> Tarih </th>
                                            <th scope="col" style="width: 20%;"> Başlık </th>
                                            <th scope="col" style="width: 45%;"> Açıklama </th>
                                            <th scope="col" class="text-end" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="DB_Find_Doc">

                                        @for ($i = 0; $i < count($DB_Find_Doc); $i++)
                                        <tr id="{{$i}}" class="conditions">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih"  value="{{$DB_Find_Doc[$i]->date}}" readonly="readonly" > </td>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder=""  value="{{$DB_Find_Doc[$i]->title}}" readonly="readonly" > </td>
                                            <td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >{!!$DB_Find_Doc[$i]->description!!}</textarea> </td>
                                            
                                            <td class="text-end" >
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_DocModal" data-id="{{$DB_Find_Doc[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Doc[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
                                                <button class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#EditDocModal"    data-id="{{$DB_Find_Doc[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Doc[$i]->id}}"  class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Belgelerim Son --> 

                                      
                    <!---  Todo --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:darkturquoise;">
                            <h5 class="card-title mb-0">Yapılacak Listesi</h5>
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#AddTodoModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 5%">#</th>
                                            <th scope="col" style="width: 15%;"> Başlık </th>
                                            <th scope="col" style="width: 20%;"> Durum </th>
                                            <th scope="col" style="width: 45%;"> Açıklama </th>
                                            <th scope="col" class="text-end" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="DB_Find_Todo">

                                        @for ($i = 0; $i < count($DB_Find_Todo); $i++)
                                        <tr id="{{$i}}" class="conditions">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih"  value="{{$DB_Find_Todo[$i]->title}}" readonly="readonly" > </td>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder=""  value="{{$DB_Find_Todo[$i]->todo}}" readonly="readonly" > </td>
                                            <td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >{!!$DB_Find_Todo[$i]->description!!}</textarea> </td>
                                            
                                            <td class="text-end" >
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_TodoModal" data-id="{{$DB_Find_Todo[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Todo[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
                                                <button class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#EditTodoModal"    data-id="{{$DB_Find_Todo[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_Todo[$i]->id}}"  class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Todo Son --> 

                    
                  

                 
                    <div class="hstack gap-2 justify-content-end d-print-none mt-4 w-100">
                        <button class="btn btn-success w-50" id="btn_edit" data_id="{{$DB_Find->id}}"  ><i class="ri-edit-line align-bottom me-1"></i> @lang('admin.Edit')</button>
                        <a href="/business/tracking/@lang('admin.lang')/view/{{$DB_Find->id}}/export/file" class="btn btn-primary w-50"><img title="Pdf" src="/assets/img/icon/pdf.png" style="cursor:pointer;height: 20px;" alt="" srcset=""> Pdf</a>
                    </div>
                </div>

                <div class="col-3">

                    <!----Zaman  ---->
                    <div class="card">
                        <div class="card-header" style="background: beige;">
                            <h5 class="card-title mb-0">Çalışma Gün Sayısı</h5>
                        </div>
                        <div class="card-body">
                            <div>
                               @if($DB_Find->status == "Devam Ediyor") 
                               <p style="display: flex;width: 100%;justify-content: center;font-size: 25px;font-weight: bold;color: red;" > {{\Carbon\Carbon::parse($DB_Find->starting_at)->diffInDays()}} </p> 
                               @else 
                                   
                                <p style="display: flex;width: 100%;justify-content: center;font-size: 25px;font-weight: bold;color: green;" > {{ \Carbon\Carbon::parse($DB_Find->starting_at)->diffInDays(\Carbon\Carbon::parse($DB_Find->finished_at)) }} </p> 
                              
                               @endif
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!---- Zaman  Son ---->


                    <!----Takım  ---->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Takım</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="selectPersonelEdit" class="form-label">Personel Seçiniz</label>
                                <select class="form-select"  id="selectPersonelEdit">
                                    <option value="">Personel Seç</option>
                                        @for ($i = 0; $i < count($DB_Find_User); $i++) <option value="{{$DB_Find_User[$i]->id}}"  {{$DB_Find->personel_id == $DB_Find_User[$i]->id ? 'selected' : '' }} >{{$DB_Find_User[$i]->name}} {{$DB_Find_User[$i]->surname}} </option>  @endfor
                                </select>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!----Takım  Son ---->

                    <!----Muhatap  ---->
                    <div class="card">
                        <div class="card-header" style="background-color: brown;">
                            <h5 class="card-title mb-0" style="color:white">Muhatap</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                               <div class="mb-3">
                                    <label for="collocutor_nameSurnameEdit" class="form-label">Adı Soyadı</label>
                                    <input type="text" class="form-control" id="collocutor_nameSurnameEdit" placeholder="" value="{{$DB_Find->collocutor_nameSurname}}"  data-provider="flatpickr"  >
                                </div>
                                <div class="mb-3">
                                    <label for="collocutor_phoneEdit" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="collocutor_phoneEdit" placeholder="" value="{{$DB_Find->collocutor_phone}}"  data-provider="flatpickr"  >
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!----Muhatap  Son ---->

                    <!---- Talep  ---->
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(197, 120, 92);">
                            <h5 class="card-title mb-0" style="color:white">TALEP BİLGİSİ</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col-lg-12 d-flex">
                                   <a href="/request/form/tr/edit/{{$DB_Find->requestform_id}}" target="_blank" style="margin: auto;color: green;  font-size: 12px;"  ><p>Talebi Görüntüle</p></a>
                                   <a href="/request/form/tr/edit/{{$DB_Find->requestform_id}}" target="_blank" title="Göster"><button type="button" class="btn py-0 fs-16 text-body"><i class="ri-search-eye-line align-bottom" style="color: black;font-size: 25px;"></i> </button></a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="selectRequestEdit" class="form-label">Talep Seçiniz</label>
                                <select class="form-select" id="selectRequestEdit" disabled>
                                  <option value="">Seçiniz</option>
                                  @for ($i = 0; $i < count($DB_Find_requestform); $i++) <option value="{{$DB_Find_requestform[$i]->id}}"  {{$DB_Find->requestform_id == $DB_Find_requestform[$i]->id ? 'selected' : '' }} >{{$DB_Find_requestform[$i]->requestFormTitle}}</option>  @endfor                            
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <!---- Talep Son ---->
                 
                    <!--Satıcı Firma -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(180, 83, 159);">
                            <h5 class="card-title mb-0" style="color:white">SATICI FİRMA</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="organizingStafCompanyTitle" class="form-label">Firma</label>
                                    <input type="text" class="form-control" id="organizingStafCompanyTitle" placeholder="" value="{{config('admin.CompanySetting')}}" data-provider="flatpickr" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="organizingStafCompanyAdress" class="form-label">Firma Adresi</label>
                                    <input type="text" class="form-control" id="organizingStafCompanyAdress" placeholder="" value="{{config('admin.CompanyAdresi')}}"  data-provider="flatpickr" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="organizingStaff" class="form-label">Yetkili</label>
                                    <input type="text" class="form-control" id="organizingStaff" placeholder="" value="{{config('admin.CompanyAuthorizedPerson')}}"  data-provider="flatpickr" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="organizingStafTel" class="form-label">Yetkili Telefon</label>
                                    <input type="text" class="form-control" id="organizingStafTel" placeholder="" value="{{config('admin.CompanyAuthorizedTel')}}" data-provider="flatpickr" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="organizingStafEmail" class="form-label">Yetkili Email </label>
                                    <input type="text" class="form-control" id="organizingStafEmail" placeholder="" value="{{config('admin.CompanyAuthorizedMail')}}" data-provider="flatpickr" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="companyAuthorized_person_tax_noConfig">Vergi No </label>
                                    <input type="text" class="form-control" id="companyAuthorized_person_tax_noConfig" placeholder="Email" value="{{ config('admin.companyAuthorized_person_tax_no')}}"  disabled >
                                </div>
                                
                                <div class="mb-3">
                                    <label for="companyAuthorized_person_tax_admCong">Vergi Dairesi </label>
                                    <input type="text" class="form-control" id="companyAuthorized_person_tax_admCong" placeholder="Email" value="{{config('admin.companyAuthorized_person_tax_adm')}}"  disabled >
                                </div>
                                
                                <div class="mb-3">
                                    <label for="companyAuthorized_person_adressCong">Adres</label>
                                    <textarea class="form-control" id="companyAuthorized_person_adressCong" rows="4" disabled >{!!config('admin.CompanyAdresi')!!}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Satıcı Firma Son -->

                  
                 
                    
                </div>
            </div>

        </div>
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/businessTracking/businessTrackingEdit.js"></script>

    </footer>