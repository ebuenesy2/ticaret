<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> Talep Alma Formu  - @lang('admin.Edit') #{{$DB_Find->id}}  | {{ config('admin.Admin_Title') }}</title>
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

    <!-- Page-content -->
    <div class="page-content">
       <div class="container-fluid">

            <!-- Modal Ürün Ekle -->
            <div class="modal fade" id="Add_ProductModal" data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                            <button type="button" class="btn-close" onclick={$("#Add_ProductModal").modal('hide');} ></button>
                        </div>
                        <form action="#" id="Add_ProductForm" >
                            <div class="modal-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                                            Genel Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab" aria-selected="false" tabindex="-1">
                                            Detay Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                            @lang('admin.File')
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label class="form-label" for="sectorAdd">Sektor</label>
                                                <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="sectorAdd">
                                                    <option value="">Seç</option>
                                                    @for ($i = 0; $i < count($DB_Find_Category); $i++)
                                                    <option  data_id="{{$DB_Find_Category[$i]->id}}"  data_codeLet="{{$DB_Find_Category[$i]->codeLet}}"  value="{{$DB_Find_Category[$i]->id}}"  >{{$DB_Find_Category[$i]->title}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <!--   Alt Sektor  -->
                                            <div class="col-6 mb-3">
                                                <label for="selectSubSectorAdd" class="form-label">Alt Sektor</label>
                                                <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="selectSubSectorAdd">
                                                    <option value="">Seç</option>
                                                </select>
                                            </div>
                                            <!--end Alt Sektor -->

                                             <!--Stok  -->
                                            <div class="mb-3">
                                                <label for="stockAdd" class="form-label">Stok Seçiniz</label>
                                                <select class="form-select" id="stockAdd">
                                                    <option value="">Stok Seç</option>
                                                    <option value="newStock">Yeni Stok Oluştur</option>
                                                    @for ($i = 0; $i < count($DB_Find_Stock); $i++) 
                                                    <option value="{{$DB_Find_Stock[$i]->id}}" id="stockAddOption" data_sub_sector="{{$DB_Find_Stock[$i]->sub_sector }}" style="display:none;" > {{$DB_Find_Stock[$i]->nameTr }} </option>
                                                    @endfor                          
                                                </select>
                                            </div>
                                            <!--Stok Son -->
                                            
                                        </div>
                                        <div class="row">

                                            <div class="col-12 mb-3">
                                                <label for="StockCodeAdd" class="form-label">Stok Kod</label>
                                                <input class="form-control" type="text" id="StockCodeAdd" name="StockCodeAdd" placeholder="" disabled>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="col-6">
                                                    <label for="accountingCodeBuyAdd" class="form-label">Muhasebe Alış Kod</label>
                                                    <input class="form-control" type="text" id="accountingCodeBuyAdd" name="accountingCodeBuyAdd" placeholder="" disabled>
                                                </div>
                                                <div class="col-6">
                                                    <label for="accountingCodeSelAdd" class="form-label">Muhasebe Satış Kod</label>
                                                    <input class="form-control" type="text" id="accountingCodeSelAdd" name="accountingCodeSelAdd" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="nameTrAdd" class="form-label">@lang('admin.ProductName') ( TR )</label>
                                                <input class="form-control" type="text" id="nameTrAdd" name="nameTrAdd">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="nameEnAdd" class="form-label">@lang('admin.ProductName') ( EN )</label>
                                                <input class="form-control" type="text" id="nameEnAdd" name="nameEnAdd">
                                            </div>
                                           
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="gtipNoAdd" class="form-label">GTIP Kodu</label>
                                                <input class="form-control" type="text" id="gtipNoAdd" name="gtipNoAdd" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Stok Birimi -->
                                            <div class="col-6 mb-3">
                                                <label for="SelectStockUnitAdd" class="form-label">Stok Birimi</label>
                                                <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectStockUnitAdd" style="cursor: pointer;">
                                                    <option value="">Seç</option>
                                                    <option value="Adet">Adet</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Ton">Ton</option>
                                                    <option value="Litre">Litre</option>
                                                </select>
                                            </div>
                                            <!-- End Stok Birimi -->
                                            <!-- Stok Sayısı -->
                                            <div class="col-6 mb-3">
                                                <label for="StockCountAdd" class="form-label">Stok Sayısı</label>
                                                <input class="form-control" type="number" id="StockCountAdd" name="StockCountAdd" value="0">
                                            </div>
                                            <!-- End Stok Sayısı -->
                                        </div>
                                        <div class="row">                                               
                                               
                                                <!-- Para Tutarı -->
                                                <div class="col-12 mb-3">
                                                    <label for="PriceAdd" class="form-label">Birim Fiyat</label>
                                                    <input class="form-control" type="text" id="PriceAdd" name="PriceAdd" placeholder="00,00" value="00,00">
                                                </div>
                                                <!-- End Para Tutarı -->
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="kdv_buyAdd" class="form-label">Kdv - Alış</label>
                                                    <input class="form-control" type="text" id="kdv_buyAdd" name="kdv_buyAdd" placeholder="00,00">
                                                </div>

                                                    <!-- Kdv Satış -->
                                                    <div class="col-6 mb-3">
                                                    <label for="kdv_sellAdd" class="form-label">Kdv - Satış</label>
                                                    <input class="form-control" type="text" id="kdv_sellAdd" name="kdv_sellAdd" placeholder="00,00">
                                                </div>
                                                <!-- Kdv Satış Son -->
                                            </div>
                                            <div class="row">
                                                <div>
                                                    <label for="export_registeredAdd" class="form-label">İhraç kayıtlı mı?</label>
                                                    <input type="checkbox" name="export_registeredAdd" id="export_registeredAdd" style="cursor: pointer;">
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="export_registered_kdv_buyAdd" class="form-label">İhraç kayıtlı Kdv - Alış</label>
                                                    <input class="form-control" type="text" id="export_registered_kdv_buyAdd" name="export_registered_kdv_buyAdd" placeholder="00,00" disabled="">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="export_registered_kdv_sellAdd" class="form-label">İhraç kayıtlı Kdv - Satış</label>
                                                    <input class="form-control" type="text" id="export_registered_kdv_sellAdd" name="export_registered_kdv_sellAdd" placeholder="00,00" disabled="">
                                                </div>
                                            </div>
                                      
                                    </div>
                                    <div class="tab-pane" id="product1" role="tabpanel">
                                        <div class="row">
                                            <!-- Özellik  -->
                                            <div class="col-6 mb-3">
                                                <label for="featuresTRAdd" class="form-label">Özellikler ( TR )</label>
                                                <textarea class="form-control" id="featuresTRAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Özellik  -->
                                            <!-- Özellik  -->
                                            <div class="col-6 mb-3">
                                                <label for="featuresENAdd" class="form-label">Özellikler ( EN )</label>
                                                <textarea class="form-control" id="featuresENAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Özellik  -->
                                        </div>
                                        <div class="row">
                                            <!-- Teknik Özellik  -->
                                            <div class="col-6 mb-3">
                                                <label for="tech_featuresTRAdd" class="form-label">Teknik Özellik ( TR )</label>
                                                <textarea class="form-control" id="tech_featuresTRAdd" rows="2"></textarea>
                                            </div>
                                            <!-- Teknik Özellik Son  -->
                                            <!-- Teknik Özellik  -->
                                            <div class="col-6 mb-3">
                                                <label for="tech_featuresENAdd" class="form-label">Teknik Özellik ( EN )</label>
                                                <textarea class="form-control" id="tech_featuresENAdd" rows="2"></textarea>
                                            </div>
                                            <!-- Teknik Özellik Son  -->
                                        </div>
                                           
                                        <div class="row">
                                                <!-- Açıklama  -->
                                            <div class="col-6 mb-3">
                                                <label for="descriptionTRAdd" class="form-label">Açıklama ( TR )</label>
                                                <textarea class="form-control" id="descriptionTRAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Açıklama  -->
            
                                                            
                                            <!-- Açıklama  -->
                                            <div class="col-6 mb-3">
                                                <label for="descriptionENAdd" class="form-label">Açıklama ( EN )</label>
                                                <textarea class="form-control" id="descriptionENAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Açıklama  -->
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="catalogLinkAdd" class="form-label">Katalog Linki</label>
                                                <input class="form-control" type="text" id="catalogLinkAdd" name="catalogLinkAdd" placeholder="">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="webSiteAdd" class="form-label">Ürün Web Sitesi</label>
                                                <input class="form-control" type="text" id="webSiteAdd" name="webSiteAdd" placeholder="">
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
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> Seçilen Ürün Resmi Yükle </p>
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
                                                <div class="col-12">
                                                    <!-- Dosya Yükleme Kutusu ----->
                                                    <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">

                                                        <!-- Dosya Yükleme ----->
                                                        <form method="POST" id="uploadForm" enctype="multipart/form-data">
                                                            <div style="display: flex;flex-direction: column; gap: 15px;">

                                                                <!-- Dosya Yükleme Bilgileri ----->
                                                                <input type="hidden" name="fileDbSave_technicalFile" id="fileDbSave_technicalFile" value="true">
                                                                <input type="hidden" name="fileWhere_technicalFile" id="fileWhere_technicalFile" value="technicalFile">

                                                                <!---  Loading --->
                                                                <div id="LoadingFileUploadTechnicalFile" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatus"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputTech" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: none; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrlTechnicalFile"></p></div>
                                                                <button type="button" id="techFileUploadClick" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto; "> Seçilen Teknik Belge Yükle </p>
                                                                </button>
                                                                
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadTechnical" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                                
                                                            </div>
                                                        </form>
                                                        <!-- Dosya Yükleme Son ---->

                                                        <a href="" id="product_dowloand_fileAdd" download="" style="display:none" >
                                                                <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                        </a>

                                                        
                                                    </div>
                                                    <!-- Dosya Yükleme Kutusu Son ----->
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="row"><div class="col-3"> </div> </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Add_ProductModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="product_add_item" data_stockNumber ="{{$DB_Find_Number}}" >@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ürün Ekle  Son -->

            <!-- Modal Güncelle -->
            <div class="modal fade" id="Edit_ProductModal"  data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="edit_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Edit_ProductModal").modal('hide');} ></button>
                        </div>
                        <form action="#">

                            <!---  Loading --->
                            <div id="loaderEdit" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoEdit" style="display:none;" >

                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#homeEdit" role="tab" aria-selected="true">
                                        Genel Bilgiler
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#productEdit" role="tab" aria-selected="false" tabindex="-1">
                                        Detay Bilgiler
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messagesEdit" role="tab" aria-selected="false" tabindex="-1">
                                        @lang('admin.File')
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content  text-muted">
                               <div class="tab-pane active show" id="homeEdit" role="tabpanel">
                                   <div class="row">

                                        <!--  Sektor  -->
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="sectorEdit">Sektor</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="sectorEdit">
                                                <option value="">Seç</option>

                                                @for ($i = 0; $i < count($DB_Find_Category); $i++)
                                                <option  data_id="{{$DB_Find_Category[$i]->id}}" data_codeLet="{{$DB_Find_Category[$i]->codeLet}}" value="{{$DB_Find_Category[$i]->id}}"  >{{$DB_Find_Category[$i]->title}}</option>
                                                @endfor
                                                
                                            </select>
                                        </div>
                                        <!--  Sektor Son  -->

                                         <!--   Alt Sektor  -->
                                         <div class="col-6 mb-3">
                                            <label for="selectSubSectorEdit" class="form-label">Alt Sektor</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectSubSectorEdit"  >
                                                <option value="">Başlık</option>
                                            </select>
                                        </div>
                                        <!--end Alt Sektor -->

                                        <!--Stok  -->
                                        <div class="col-12 mb-3" id="stokEditPanel">
                                            <label for="stockEdit" class="form-label">Stok Seçiniz</label>
                                            <select class="form-select" id="stockEdit"   data_status=""  data_id=""  >
                                                <option value="">Stok Seç</option>
                                                @for ($i = 0; $i < count($DB_Find_Stock); $i++) 
                                                <option value="{{$DB_Find_Stock[$i]->id}}" id="stockEditOption" data_sub_sector="{{$DB_Find_Stock[$i]->sub_sector }}" style="display:none;" > {{$DB_Find_Stock[$i]->nameTr }} </option>
                                                @endfor                          
                                            </select>
                                        </div>

                                        <div class="col-12" id="productNewAlert"  style="display:none;" >
                                            <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show mb-2 d-flex" role="alert" style="display:flex; gap: 10px; height: 29px;font-size: 16px;padding-top: 5px;">
                                                <i class="ri-error-warning-line label-icon"></i><strong>Dikkat</strong>
                                                <div class="d-flex gap-1"> <p> Yeni Ürün Düzenleme Yapılıyor</p></div>
                                            </div>
                                        </div>

                                        <div class="row"  id="codeEditPanel" >

                                            <div class="col-12 mb-3">
                                                <label for="StockCodeEdit" class="form-label">Stok Kod</label>
                                                <input class="form-control" type="text" id="StockCodeEdit" name="StockCodeEdit" placeholder="" disabled>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="accountingCodeBuyEdit" class="form-label">Muhasebe Alış Kod</label>
                                                <input class="form-control" type="text" id="accountingCodeBuyEdit" name="accountingCodeBuyEdit" placeholder="" disabled>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="accountingCodeSelEdit" class="form-label">Muhasebe Satış Kod</label>
                                                <input class="form-control" type="text" id="accountingCodeSelEdit" name="accountingCodeSelEdit" placeholder="" disabled>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12 mb-3">
                                            <label for="nameTrEdit" class="form-label">@lang('admin.name')</label>
                                            <input class="form-control" type="text" id="nameTrEdit" name="nameTrEdit" placeholder="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="productNameEdit" class="form-label">@lang('admin.ProductName') ( Public ) </label>
                                            <input class="form-control" type="text" id="productNameEdit" name="productNameEdit" placeholder="">
                                        </div>
                                      
                                        <div class="col-12 mb-3">
                                            <label for="gtipNoEdit" class="form-label">GTIP NO</label>
                                            <input class="form-control" type="text" id="gtipNoEdit" name="gtipNoEdit" placeholder="">
                                        </div>
                                   </div>
                                   <div class="row">
                                                      
                                        <!-- Stok Birimi -->
                                        <div class="col-6 mb-3">
                                            <label for="SelectStockUnitEdit" class="form-label">@lang('admin.SelectStockUnit')</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectStockUnitEdit" style="cursor: pointer;" >
                                                <option value="">@lang('admin.SelectStockUnit')</option>
                                                <option value="Adet">@lang('admin.Piece')</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Ton">Ton</option>
                                                <option value="Litre">Litre</option>
                                            </select>
                                        </div>
                                        <!-- End Stok Birimi -->

                                        <!-- Stok Sayısı -->
                                        <div class="col-6 mb-3">
                                            <label for="StockCountEdit" class="form-label">@lang('admin.StockCount')</label>
                                            <input class="form-control" type="number" id="StockCountEdit" name="StockCountEdit" placeholder="0">
                                        </div>
                                        <!-- End Stok Sayısı -->

                                   </div>
                                    <div class="row">

                                        <!-- Para Tutarı -->
                                        <div class="col-12 mb-3">
                                            <label for="PriceEdit" class="form-label">Hedef Fiyat</label>
                                            <input class="form-control" type="text" id="PriceEdit" name="PriceEdit" placeholder="00,00">
                                        </div>
                                        <!-- End Para Tutarı -->

                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="kdv_buyEdit" class="form-label">Kdv - Alış</label>
                                            <input class="form-control" type="text" id="kdv_buyEdit" name="kdv_buyEdit" placeholder="00,00">
                                        </div>
                                          
                                        <div class="col-6 mb-3">
                                            <label for="kdv_sellEdit" class="form-label">Kdv - Satış</label>
                                            <input class="form-control" type="text" id="kdv_sellEdit" name="kdv_sellEdit" placeholder="00,00">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3" >
                                            <label for="export_registeredEdit" class="form-label">İhraç kayıtlı mı?</label>
                                            <input type="checkbox" name="export_registeredEdit" id="export_registeredEdit" style="cursor: pointer;">
                                        </div>
                                
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="export_registered_kdv_buyEdit" class="form-label">İhraç kayıtlı Kdv - Alış</label>
                                            <input class="form-control" type="text" id="export_registered_kdv_buyEdit" name="export_registered_kdv_buyEdit" placeholder="00,00" disabled>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="export_registered_kdv_sellEdit" class="form-label">İhraç kayıtlı Kdv - Satış</label>
                                            <input class="form-control" type="text" id="export_registered_kdv_sellEdit" name="export_registered_kdv_sellEdit" placeholder="00,00" disabled>
                                        </div>
                                    </div>

                               </div>
                               <div class="tab-pane" id="productEdit" role="tabpanel">

                                   <div class="row">
                                        <!-- Özellik  -->
                                        <div class="col-6 mb-3">
                                            <label for="featuresTREdit" class="form-label">@lang('admin.Features')</label>
                                            <textarea class="form-control" id="featuresTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Özellik  -->

                                        <!-- Özellik  -->
                                        <div class="col-6 mb-3">
                                            <label for="featuresPublicEdit" class="form-label">@lang('admin.Features') ( Public )</label>
                                            <textarea class="form-control" id="featuresPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Özellik  -->
                                   </div>
                                   <div class="row">

                                        <!-- Teknik Özellik  -->
                                        <div class="col-6 mb-3">
                                            <label for="tech_featuresTREdit" class="form-label">Teknik Özellik</label>
                                            <textarea class="form-control" id="tech_featuresTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- Teknik Özellik Son  -->

                                        <!-- Teknik Özellik  -->
                                       <div class="col-6 mb-3">
                                            <label for="tech_featuresPublicEdit" class="form-label">Teknik Özellik ( Public ) </label>
                                            <textarea class="form-control" id="tech_featuresPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- Teknik Özellik Son  -->

                                   </div>
                                    <div class="row">
                                        <!-- Açıklama  -->
                                        <div class="col-6 mb-3">
                                            <label for="descriptionTREdit" class="form-label">@lang('admin.Description')</label>
                                            <textarea class="form-control" id="descriptionTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Açıklama  -->

                                        <!-- Açıklama  -->
                                        <div class="col-6 mb-3">
                                            <label for="descriptionPublicEdit" class="form-label">@lang('admin.Description') ( Public ) </label>
                                            <textarea class="form-control" id="descriptionPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Açıklama  -->
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="catalogLinkEdit" class="form-label">Katalog Linki</label>
                                            <input class="form-control" type="text" id="catalogLinkEdit" name="catalogLinkEdit" placeholder="">
                                        </div>
                                       
                                        <div class="col-6 mb-3">
                                            <label for="webSiteEdit" class="form-label">Ürün Web Sitesi</label>
                                            <input class="form-control" type="text" id="webSiteEdit" name="webSiteEdit" placeholder="">
                                        </div>
                                    </div>
                               
                               </div>
                               <div class="tab-pane" id="messagesEdit" role="tabpanel">
                                   <div class="row">
                                 
                                        <!-- Dosya Yükleme Kutusu ----->
                                        <div class="col-12 mb-3" style="width: 450px;border: 2px solid;padding: 10px;">

                                            <div class="d-flex gap-1">
                                                <img id="productViewImage" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: flex;width: 150px;">

                                                <a href="" id="product_dowloand_img" download="">
                                                   <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                                </a>
                                            </div>
                                            
                                            <!-- Dosya Yükleme ----->
                                            <form method="POST" id="uploadForm" enctype="multipart/form-data">
                                                <div style="display: flex;flex-direction: column; gap: 15px;">
        
                                                    <!-- Dosya Yükleme Bilgileri ----->
                                                    <input type="hidden" name="fileDbSaveEdit" id="fileDbSaveEdit" value="true" >
                                                    <input type="hidden" name="fileWhereEdit" id="fileWhereEdit" value="productImage" >
        
                                                    <!---  Loading --->
                                                    <div id="LoadingFileUploadEdit" style="display:none;" ><span class="d-flex align-items-center">
                                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                                                    </span> </div>
                                                    <div id="uploadStatusEdit"></div>
                                                    <!--- Son Loading --->
        
                                                    <input type="file" name="file" id="fileInputEdit" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: none; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrlEdit"></p></div>
                                                    <button type="button" id="fileUploadClickEdit" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                        <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > Ürün Resmi Yükle </p>
                                                    </button>
                                                    
                                                    <!-- ProgressBar ---->
                                                    <div class="progress" style="margin-top: 20px;">
                                                        <div class="progress-bar" id="progressBarFileUploadEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                    </div>
                                                    <!-- ProgressBar Son ---->
                                                        
                                                </div>
                                            </form>
                                            <!-- Dosya Yükleme Son ---->
                                    
                                        </div>
                                        <!-- Dosya Yükleme Kutusu Son ----->
                                                                
                                        <!-- Dosya Yükleme Kutusu ----->
                                        <div class="col-12 mb-3"  style="width: 450px;border: 2px solid;padding: 10px;">
        
                                            <!-- Dosya Yükleme ----->
                                            <form method="POST" id="uploadForm" enctype="multipart/form-data">
                                                <div style="display: flex;flex-direction: column; gap: 15px;">
        
                                                    <!-- Dosya Yükleme Bilgileri ----->
                                                    <input type="hidden" name="fileDbSave_technicalFile" id="fileDbSave_technicalFileEdit" value="true" >
                                                    <input type="hidden" name="fileWhere_technicalFile" id="fileWhere_technicalFileEdit" value="technicalFile" >
        
                                                    <!---  Loading --->
                                                    <div id="LoadingFileUploadTechnicalFileEdit" style="display:none;" ><span class="d-flex align-items-center">
                                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                                                    </span> </div>
                                                    <div id="uploadStatus"></div>
                                                    <!--- Son Loading --->
        
                                                    <input type="file" name="file" id="fileInputEditTech" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: none; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrlTechnicalFileEdit"></p></div>
                                                    <button type="button" id="techFileUploadClickEdit" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                        <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > Teknik Belge Yükle </p>
                                                    </button>
                                                    
                                                    <!-- ProgressBar ---->
                                                    <div class="progress" style="margin-top: 20px;">
                                                        <div class="progress-bar" id="progressBarFileUploadTechnicalEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                    </div>
                                                    <!-- ProgressBar Son ---->
                                                    
                                                </div>
                                            </form>
                                            <!-- Dosya Yükleme Son ---->

                                            <a href="" id="product_dowloand_file" download="">
                                               <i class="ri-inbox-archive-line" style="color:#1bb934; font-size: 30px;" ></i>
                                            </a>
                                                                                        
                                        </div>
                                        <!-- Dosya Yükleme Kutusu Son ----->
                                   
                                   </div>
                               </div>
                            </div>
                                <div class="row"><div class="col-3"></div></div>
                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" onclick={$("#Edit_ProductModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productUpdate"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Güncelle  Son -->
       

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$DB_Find->requestFormTitle}} - ( #{{$DB_Find->id}} )</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/request/form/list">Talep Alma Formu Listesi</a></li>
                                <li class="breadcrumb-item active">#{{$DB_Find->id}}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!--  row -->
            <div class="row">
                <div class="col-lg-8">
                    
                    <!---- Bilgiler -->
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(197, 120, 92);">
                            <h5 class="card-title mb-0" style="color:white">Bilgiler</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 mb-3">
                                    <label class="form-label" for="requestFormTitle">Başlık</label>
                                    <input type="text" class="form-control" id="requestFormTitle" placeholder="" value="{{$DB_Find->requestFormTitle}}" >
                                </div>
                                
                                <!-- Para Birimi -->
                                <div class="col-4 mb-3">
                                    <label for="SelectProductCurrencyAdd" class="form-label">Para Birimi</label>
                                    <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectProductCurrencyAdd" style="cursor: pointer;">
                                        <option value="">@lang('admin.Currency')</option>
                                        <option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''}} >Euro</option>
                                        <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''}} >Dolar</option>
                                        <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''}} >TL</option>
                                    </select>
                                </div>
                                <!-- End Para Birimi -->

                                <div class="col-12 mb-3">
                                    <label for="requestFormDescription">Açıklama</label>
                                    <textarea class="form-control" id="requestFormDescription" rows="4">{!!$DB_Find->description!!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---- Bilgiler Son -->

                     <!-- Talep Geçerlilik Tarihi -->
                     <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0" >Talep GEÇERLİLİK SÜRESİ</h5>
                        </div>
                        <div class="card-body">
                          
                            <div class="col-12" style="cursor:pointer;">
                                <label for="offerEffectiveDateEdit">Talep Geçerlilik Tarihi</label>
                                <input class="form-control " id="offerEffectiveDateEdit" placeholder="@lang('admin.Title')" type="date" value="{{$DB_Find->requestEffectiveDate}}"   >
                            </div>
                         
                        </div>
                    </div>
                    <!-- Talep Geçerlilik Tarihi Son -->

                    <!---  Ürün Bilgileri --> 
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">TALEP EDİLEN ÜRÜN FİYAT LİSTESİ</h5>
                        </div>
                        <div class="card-body">

                            @if($DB_Find_Product_Ret_Count > 0 ) 
                            <div   id="product_RetCart" class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show mb-2 d-flex" role="alert" style="display:flex; gap: 10px; height: 29px;font-size: 16px;padding-top: 5px;">
                                <i class="ri-error-warning-line label-icon"></i><strong>Dikkat</strong>
                                <div class="d-flex gap-1" ><p id="product_ret_count" >{{$DB_Find_Product_Ret_Count}} </p> <p> tane onay bekleyen stok var.</p></div>
                            </div>
                            @endif
                    
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"> @lang('admin.ProductInformation') </th>
                                            <th scope="col"> @lang('admin.TargetUnitPrice') </th>
                                            <th scope="col" style="width: 120px;">Stok Miktarı</th>
                                            <th scope="col" class="text-center" style="width: 120px;">Stok Birimi</th>
                                            <th scope="col" class="text-center" style="width: 150px;">@lang('admin.Total')</th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTable" data_product_count="{{count($DB_Find_Product)}}" >

                                        @for ($i = 0; $i < count($DB_Find_Product); $i++)
                                        <tr id="{{$i}}" class="product">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <div style="display: {{$DB_Find_Product[$i]->isActive == 0 ? 'block' : 'none' }};"  > <span class="badge text-bg-danger">Onay Bekliyor</span></div>
                                                    <input type="text" class="form-control bg-light border-0" id="productName-1" placeholder="@lang('admin.ProductName')"  value="{{$DB_Find_Product[$i]->nameTr}}" readonly="readonly" >
                                                </div>
                                                <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="@lang('admin.ProductDetail')" readonly="readonly"  >{!!$DB_Find_Product[$i]->descriptionTr!!}</textarea>
                                            </td>
                                            <td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="{{$i}}" step="0.01" placeholder="0.00" value="{{$DB_Find_Product[$i]->price}}" readonly="readonly" ></td>
                                            <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="{{$i}}" value="{{$DB_Find_Product[$i]->stockCount}}"  readonly="readonly" > </div> </td>
                                            <td class="text-end" id="DB_Find_Product_stockUnit"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productStockUnit" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->stockUnit}}" readonly="" > </div> </td>
                                            <td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->total}}" readonly="" > </div> </td>
                                            <td class="text-end" >
                                                <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" data_id="{{$DB_Find_Product[$i]->id}}" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data_id="{{$DB_Find_Product[$i]->id}}" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> 
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Edit_ProductModal" data-id="{{$DB_Find_Product[$i]->id}}" ><i    class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                    <tbody>
                                        <tr class="border-top border-top-dashed">
                                            <th></th><th></th><th></th><th></th>
                                            
                                            <th class="d-flex gap-1" >
                                                <div style="display: flex;gap: 10px;">
                                                    <p style="text-transform: uppercase;vertical-align: middle;margin: auto;">Toplam Tutar</p>
                                                    <input type="text" class="form-control bg-light border-0 col-4" id="productTotalPayment" placeholder="0.00" value="{{$DB_Find_Product_TotalPayment}}"  readonly="">
                                                </div>
                                            </th>
                                        </tr>

                                        <tr> <td colspan="5">  <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#Add_ProductModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.ProductAdd')</button> </td> </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Ürün Bilgileri Son --> 
                    
                    <!---- Genel Şartlar -->
                    <div class="card">
                        <div class="card-header" style="background-color:yellow;">
                            <h5 class="card-title mb-0">Genel Şartlar </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="delivery_atEdit" class="form-label">Teslim Zamanı</label>
                                        <input type="date" class="form-control"  id="delivery_atEdit" value="{{$DB_Find->delivery_at}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="shipmentTypeAdd" class="form-label">Sevk Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="shipmentTypeAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_sevkSekli); $i++) <option value="{{$DB_Find_sevkSekli[$i]->title}}" data_id="{{$DB_Find_sevkSekli[$i]->id}}" {{$DB_Find->shipmentType == $DB_Find_sevkSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_sevkSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                        

                                    <div class="mb-3">
                                        <label for="paymentMethodAdd" class="form-label">Ödeme Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="paymentMethodAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_ödemeSekli); $i++) <option value="{{$DB_Find_ödemeSekli[$i]->title}}" data_id="{{$DB_Find_ödemeSekli[$i]->id}}"  {{$DB_Find->paymentMethod == $DB_Find_ödemeSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_ödemeSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="intertekAdd" class="form-label">İntertek Tabi Mi ?</label>
                                        <select class="form-control"  name="choices-single-default2" id="intertekAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_intertekTabi); $i++) <option value="{{$DB_Find_intertekTabi[$i]->title}}" data_id="{{$DB_Find_intertekTabi[$i]->id}}" {{$DB_Find->intertek == $DB_Find_intertekTabi[$i]->id ? 'selected' : ''   }} >{{$DB_Find_intertekTabi[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="requested_document" class="form-label"> İstenilen Belge ve Standartlar  </label>
                                        <input type="text" class="form-control" id="requested_document" placeholder="" value="{{$DB_Find->requested_document}}" >
                                    </div>

                                        
                                        
                                    </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="deliveryLocation" class="form-label">Teslim ( Boşaltma ) Yeri </label>
                                        <input type="text" class="form-control" id="deliveryLocation" placeholder="" value="{{$DB_Find->deliveryLocation}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="vendorDeliveryTypeAdd" class="form-label">Satıcı Teslim Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="vendorDeliveryTypeAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_teslimSekli); $i++) <option value="{{$DB_Find_teslimSekli[$i]->title}}" data_id="{{$DB_Find_teslimSekli[$i]->id}}"  {{$DB_Find->vendorDeliveryType == $DB_Find_teslimSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_teslimSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="modeofTransportAdd" class="form-label">Nakliyet Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="modeofTransportAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_nakliyatSekli); $i++) <option value="{{$DB_Find_nakliyatSekli[$i]->title}}" data_id="{{$DB_Find_nakliyatSekli[$i]->id}}"  {{$DB_Find->modeofTransport == $DB_Find_nakliyatSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_nakliyatSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="packagingType" class="form-label">Ambalajlama ve Paketleme Şekli</label>
                                        <input type="text" class="form-control" id="packagingType" placeholder="" value="{{$DB_Find->packagingType}}" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="specialPermitAdd" class="form-label">Özel İzin 
                                            <span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>Talep edilen ülke gümrüğünde özel izin var mı?</span> 
                                        </label>
                                        <input type="text" class="form-control" id="specialPermitAdd" placeholder="" value="{{$DB_Find->specialPermit_Title}}" >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----  Genel Şartlar Son -->
                    
                    <!----  Özel Şartlar -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(148, 231, 92);">
                            <h5 class="card-title mb-0">Özel Şartlar</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">

                                   <div class="mb-3">
                                        <label for="purchaseTimeEdit" class="form-label">Ürün Alım Planlaması </label>
                                        <select class="form-control"  name="choices-single-default2" id="purchaseTimeEdit">
                                            <option value="" {{$DB_Find->purchaseTime == "" ? 'selected' : '' }} >@lang('admin.Choose')</option>
                                            <option value="Yıllık" {{$DB_Find->purchaseTime == "Yıllık" ? 'selected' : '' }} >Yıllık</option>
                                            <option value="Aylık" {{$DB_Find->purchaseTime == "Aylık" ? 'selected' : '' }}>Aylık</option>
                                            <option value="Haftalık" {{$DB_Find->purchaseTime == "Haftalık" ? 'selected' : '' }}>Haftalık</option>
                                            <option value="Günlük" {{$DB_Find->purchaseTime == "Günlük" ? 'selected' : '' }}>Günlük</option>
                                            <option value="TekSefer" {{$DB_Find->purchaseTime == "TekSefer" ? 'selected' : '' }}>Tek Sefer</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <div>
                                            <label for="initialPurchaseAmount_at" class="form-label">İlk Sipariş Alma Zamanı</label>
                                            <input type="date" class="form-control"  id="initialPurchaseAmount_at" value="{{$DB_Find->initialPurchaseAmount_at}}" >
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="reqSample_Val" class="form-label">Numune İsteniyor mu ? 
                                           <span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>Ücretli olabilir.</span> 
                                        </label>
                                        <input type="text" class="form-control" id="reqSample_Val" placeholder="" value="{{$DB_Find->reqSample}}" >
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-6">
                                    
                                   <div class="mb-3 col-12 d-flex gap-1">
                                       <div class="col-6">
                                          <label for="purchaseAmount" class="form-label">Toplam Düşünülen Miktar</label>
                                          <input type="text" class="form-control" id="purchaseAmount" placeholder="" value="{{$DB_Find->purchaseAmount}}" >
                                       </div>
                                       <div class="col-6">
                                            <label for="SelectPurchaseAmountStockUnitEdit" class="form-label">@lang('admin.SelectStockUnit')</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectPurchaseAmountStockUnitEdit" style="cursor: pointer;" >
                                                <option value="" {{$DB_Find->purchaseAmountStockUnit == "" ? 'selected' : '' }} >@lang('admin.SelectStockUnit')</option>
                                                <option value="Adet" {{$DB_Find->purchaseAmountStockUnit == "Adet" ? 'selected' : '' }} >@lang('admin.Piece')</option>
                                                <option value="Kg" {{$DB_Find->purchaseAmountStockUnit == "Kg" ? 'selected' : '' }} >Kg</option>
                                                <option value="Ton" {{$DB_Find->purchaseAmountStockUnit == "Ton" ? 'selected' : '' }} >Ton</option>
                                                <option value="Litre" {{$DB_Find->purchaseAmountStockUnit == "Litre" ? 'selected' : '' }} >Litre</option>
                                            </select>
                                       </div>
                                    </div>

                                    <div class="mb-3 col-12 d-flex gap-1">
                                       <div class="col-6">
                                         <label for="initialPurchaseAmount" class="form-label">İlk Sipariş Alım Miktarı</label>
                                          <input type="text" class="form-control" id="initialPurchaseAmount" placeholder="" value="{{$DB_Find->initialPurchaseAmount}}" >
                                       </div>
                                       <div class="col-6">
                                            <label for="SelectInitialPurchaseAmountStockUnitEdit" class="form-label">@lang('admin.SelectStockUnit')</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectInitialPurchaseAmountStockUnitEdit" style="cursor: pointer;" >
                                                <option value="" {{$DB_Find->initialPurchaseAmountStockUnit == "" ? 'selected' : '' }} >@lang('admin.SelectStockUnit')</option>
                                                <option value="Adet" {{$DB_Find->initialPurchaseAmountStockUnit == "Adet" ? 'selected' : '' }} >@lang('admin.Piece')</option>
                                                <option value="Kg" {{$DB_Find->initialPurchaseAmountStockUnit == "Kg" ? 'selected' : '' }} >Kg</option>
                                                <option value="Ton" {{$DB_Find->initialPurchaseAmountStockUnit == "Ton" ? 'selected' : '' }} >Ton</option>
                                                <option value="Litre" {{$DB_Find->initialPurchaseAmountStockUnit == "Litre" ? 'selected' : '' }} >Litre</option>
                                            </select>
                                       </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----  Özel Şartlar Son -->
                    
                    <div class="mb-4 col-12 d-flex gap-1">
                        <button id="edit_item" data_id="{{$DB_Find->id}}" class="btn btn-success  col-6">Güncelle</button>
                        <a href="/request/form/tr/file/export/{{$DB_Find->id}}" class="btn btn-primary w-50 col-6"><img title="Pdf" src="/assets/img/icon/pdf.png" style="cursor:pointer;height: 20px;" alt="" srcset=""> Pdf</a>
                    </div>

                    
                    
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(180, 83, 159);">
                            <h5 class="card-title mb-0" style="color:white">FİRMA BİLGİSİ</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="selectCurrentCartEdit" class="form-label">Firma Seçiniz</label>
                                <select class="form-select"  id="selectCurrentCartEdit">
                                    <option value="">Cari Kart Seç</option>
                                        @for ($i = 0; $i < count($DB_Find_Current); $i++) <option value="{{$DB_Find_Current[$i]->id}}"  {{$DB_Find->currencyCartId == $DB_Find_Current[$i]->id ? 'selected' : '' }} >{{$DB_Find_Current[$i]->current_name}}</option>  @endfor
                                </select>
                            </div>
                            
                            <!-- Yetkili Kişi --> 
                            <div class="mb-3">
                                <label for="companyAuthorized_person">Yetkili Kişi</label>
                                <input type="text" class="form-control" id="companyAuthorized_person" placeholder="@lang('admin.OrganizingStaff')" value="{{$DB_Find->companyAuthorized_person}}"  >
                            </div>
                            <!-- Yetkili Kişi Son --> 

                            <!-- Yetkili Kişi Email --> 
                            <div class="mb-3">
                                <label for="companyAuthorized_person_email">Yetkili Kişi Email </label>
                                <input type="text" class="form-control" id="companyAuthorized_person_email" placeholder="Email" value="{{$DB_Find->companyAuthorized_email}}" >
                            </div>
                            <!-- Yetkili Kişi Email Son --> 

                            <!-- Yetkili Kişi Tel --> 
                            <div class="mb-3">
                                <label for="companyAuthorized_person_tel">Yetkili Kişi Tel</label>
                                <input type="text" class="form-control" id="companyAuthorized_person_tel" placeholder="Tel" value="{{$DB_Find->companyAuthorized_tel}}"   >
                            </div>
                            <!-- Yetkili Kişi Tel Son --> 

                            
                            <div class="mb-3">
                                <label for="companyAuthorized_person_tax_no">Vergi No </label>
                                <input type="text" class="form-control" id="companyAuthorized_person_tax_no" placeholder="Email" value="{{$DB_Find->companyAuthorized_person_tax_no}}" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="companyAuthorized_person_tax_adm">Vergi Dairesi </label>
                                <input type="text" class="form-control" id="companyAuthorized_person_tax_adm" placeholder="Email" value="{{$DB_Find->companyAuthorized_person_tax_adm}}" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="companyAuthorized_person_adress">Adres</label>
                                <textarea class="form-control" id="companyAuthorized_person_adress" rows="4">{!!$DB_Find->companyAuthorized_person_adress!!}</textarea>
                            </div>

                        </div>
                    </div>

                    <!----Talep Alma Görünürlük  ---->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> Talep Alma Görünürlük</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="VisibilityEdit">@lang('admin.Visibility')</label>
                                <select class="form-control"  name="choices-single-default2" id="VisibilityEdit">
                                    <option value="">Görünürlük Seç</option>
                                    <option value="0" {{$DB_Find->public == "0" ? 'selected' : '' }} >Private ( Kapalı )</option>
                                    <option value="1" {{$DB_Find->public == "1" ? 'selected' : '' }} >Public ( Açık )</option>
                                    <option value="2" {{$DB_Find->public == "2" ? 'selected' : '' }} >View ( Sadece Görebilir )</option>
                                </select>
                            </div> 
                            <div class="row" id="publicRow" >
                                <div class="mb-3">
                                    <label for="public_url" class="form-label">URL</label>
                                    <div class="d-flex gap-1">
                                        <input type="text" class="form-control"  id="request_public_url" value="{{config('admin.Web_Url')}}/request/form/@lang('admin.lang')/public/{{$DB_Find->id}}"  disabled >
                                        <button type="button" id="request_copy_text" class="btn btn-outline-success btn-icon waves-effect waves-light"><i class="ri-file-copy-2-line"></i></button>
                                    </div>
                                </div>
                               
                                <div class="mb-3">
                                    <label for="public_username" class="form-label">Username</label>
                                    <input type="text" class="form-control"  id="public_username" value="{{$DB_Find->public_username}}" >
                                </div>

                                <div class="mb-3">
                                    <label for="public_pass" class="form-label">Sifre</label>
                                    <input type="text" class="form-control"  id="public_pass" value="{{$DB_Find->public_pass}}" >
                                </div>
                            </div>                                
                        </div>
                        <!-- end card body -->
                    </div>
                    <!----Talep Alma Görünürlük Son ---->

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
                                        @for ($i = 0; $i < count($DB_Find_User); $i++) <option value="{{$DB_Find_User[$i]->id}}"  {{$DB_Find->personeId == $DB_Find_User[$i]->id ? 'selected' : '' }} >{{$DB_Find_User[$i]->name}} {{$DB_Find_User[$i]->surname}} </option>  @endfor
                                </select>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!----Takım  Son ---->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- JS --->
        <script src="{{asset('/assets/admin')}}/js/requestForm/requestFormEdit.js"></script>

        <script>

            //! Product Listesi
            function productListUpdate(data,DB_Find_Product_Ret_Count,DB_Find_Product_TotalPayment) {
                // console.log("data:",data);
                // console.log("DB_Find_Product_Ret_Count:",DB_Find_Product_Ret_Count);
                // console.log("DB_Find_Product_TotalPayment:",DB_Find_Product_TotalPayment);

                if(DB_Find_Product_Ret_Count == 0 ) { $('#product_RetCart').css('visibility','hidden'); }
                else { $('#product_ret_count').html(4); }
        
                var returnData ="";
        
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
            
                    returnData +='<tr id="'+data[index].id+'" class="product">';
                    returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                    returnData +='<td class="text-start">';
                    returnData +='<div class="mb-2">';
                    
                    if(data[index].isActive == 0) {  returnData +='<div style="display:block"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }
                    else if(data[index].isActive == 1 ) {  returnData +='<div style="display:none"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }
                    
                    returnData +='<input type="text" class="form-control bg-light border-0" id="productName-1"  value="'+data[index].nameTr+'" readonly="readonly" >';
                    returnData +='</div>';
                    returnData +='<textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" readonly="readonly"  >'+data[index].descriptionTr +'</textarea>';
                    returnData +=' </td>';
                    returnData +='<td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="'+Number(index+1)+'" step="0.01" placeholder="0.00" value="'+data[index].price+'" readonly="readonly" ></td>';
                    returnData +=' <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="'+Number(index+1)+'" value="'+data[index].stockCount+'"  readonly="readonly" > </div> </td>';
                    returnData +='<td class="text-end" id="DB_Find_Product_stockUnit"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productStockUnit" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].stockUnit+'" readonly="" > </div> </td>';
                    returnData +='<td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].total+'" readonly="" > </div> </td>';
                    returnData +='<td class="text-end" >';
                    returnData +='        <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" onClick="DeleteItem('+data[index].id+')" data-id="'+data[index].id+'" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> ';
                    returnData +='        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Edit_ProductModal" data-id="'+data[index].id+'" ><i    class=" ri-edit-2-fill fs-16"></i></button> ';
                    returnData +='  </td>';
                    
                    returnData +=' </tr>';
        
                }
        
                $('#productTable').html(returnData);
                $('#productTotalPayment').val(DB_Find_Product_TotalPayment);
        
                //! Ürün Durumları
                if(DB_Find_Product_Ret_Count > 0) { $('#product_RetCart').css('display','block'); $('#product_ret_count').html(DB_Find_Product_Ret_Count);  }
                else if(DB_Find_Product_Ret_Count == 0) { $('#product_RetCart').css('display','none'); }
        
        
            } //! Product Listesi Son

            //! Silme #2
            function DeleteItem(items) {
                //! Veriler
                var data_id = items;

                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4><p>'+$('[id=lang_change][data_key=DeleteWarning]').html().trim()+'</p><p class="text-muted mx-4 mb-0">#'+data_id+'</p></div></div>',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: $('[id=lang_change][data_key=Delete]').html().trim(),
                    cancelButtonColor: '#cadetblue',
                    cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
                }).then((result) => {
                    if (result.isConfirmed) {

                        //! Ajax
                        $.ajax({
                            url: "/request/form/product/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                requestform_id: $('#edit_item').attr('data_id'),
                            },
                            success: function (response) {
                                // alert("başarılı");
                                console.log("response:", response);
                                // console.log("status:", response.status);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                    
                                    //! Product Liste Güncelle
                                    productListUpdate(response.DB_Product,response.DB_Find_Product_Ret_Count,response.DB_Find_Product_TotalPayment);
                                
                                } else {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                }
                            },
                            error: function (error) {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                console.log("error:", error);
                            },
                        }); //! Ajax Son
                    
                    }
                });
            } //! Silme #2 Son

        </script>

    </footer>
