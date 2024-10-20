<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.ProformaInvoice') #{{$DB_Find->id}} | {{ config('admin.Admin_Title') }}</title>
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
  
            <!-- Modal Ekle -->
            <div class="modal fade" id="Add_ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Yüklemeler
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active show" id="home" role="tabpanel">
                                        <div class="row">

                                            <!--Stok  -->
                                            <div class="mb-3">
                                                <label for="stockAdd" class="form-label">Stok Seçiniz</label>
                                                <select class="form-select" id="stockAdd" data_sector="" data_sub_sector="" data_stock_id="" >
                                                    <option value="">Stok Seç</option>
                                                    @for ($i = 0; $i < count($DB_Find_cost_calculation_product_list); $i++) 
                                                    <option value="{{$DB_Find_cost_calculation_product_list[$i]->id}}" id="stockAddOption" data_sub_sector="{{$DB_Find_cost_calculation_product_list[$i]->sub_sector }}" > {{$DB_Find_cost_calculation_product_list[$i]->nameTr }} </option>
                                                    @endfor                          
                                                </select>
                                            </div>
                                                
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
                                                <label for="nameTrAdd" class="form-label">Ad</label>
                                                <input class="form-control" type="text" id="nameTrAdd" name="nameTrAdd">
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
                                                <input class="form-control" type="number" id="StockCountAdd" name="StockCountAdd">
                                            </div>
                                            <!-- End Stok Sayısı -->
                                        </div>
                                        <div class="row">
                                            <!-- Para Birimi -->
                                            <div class="col-6 mb-3">
                                                <label for="SelectCurrencyAdd" class="form-label">Para Birimi</label>
                                                <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectCurrencyAdd" style="cursor: pointer;" disabled>
                                                    <option value="">Seç</option>
                                                    <option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''}} >Euro</option>
                                                    <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''}} >Dolar</option>
                                                    <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''}} >TL</option>
                                                </select>
                                            </div>
                                            <!-- End Para Birimi -->
                                            <!-- Para Tutarı -->
                                            <div class="col-6 mb-3">
                                                <label for="PriceAdd" class="form-label">Birim Fiyat</label>
                                                <input class="form-control" type="text" id="PriceAdd" name="PriceAdd" placeholder="00,00">
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
                                            <div class="col-12 mb-3">
                                                <label for="featuresTRAdd" class="form-label">Özellikler</label>
                                                <textarea class="form-control" id="featuresTRAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Özellik  -->
                                        </div>
                                        <div class="row">
                                            <!-- Teknik Özellik  -->
                                            <div class="col-12 mb-3">
                                                <label for="tech_featuresTRAdd" class="form-label">Teknik Özellik</label>
                                                <textarea class="form-control" id="tech_featuresTRAdd" rows="2"></textarea>
                                            </div>
                                            <!-- Teknik Özellik Son  -->
                                           
                                        </div>
                                        <div class="row">
                                                <!-- Açıklama  -->
                                            <div class="col-12 mb-3">
                                                <label for="descriptionTRAdd" class="form-label">Açıklama</label>
                                                <textarea class="form-control" id="descriptionTRAdd" rows="2"></textarea>
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
                                                                <div id="LoadingFileUploadtechnicalFile" style="display:none;"><span class="d-flex align-items-center">
                                                                    <span class="spinner-border flex-shrink-0" role="status"></span>
                                                                    <span class="flex-grow-1 ms-2">Yükleniyor </span>
                                                                </span> </div>
                                                                <div id="uploadStatus"></div>
                                                                <!--- Son Loading --->

                                                                <input type="file" name="file" id="fileInputTech" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                                <div style="display: none; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrltechnicalFile"></p></div>
                                                                <button type="button" id="techFileUploadClick" class="btn btn-success" style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto; "> Seçilen Teknik Belge Yükle </p>
                                                                </button>
                                                                
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadtechnical" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
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
                                    <button type="button" class="btn btn-success" id="product_add_item">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ekle  Son -->

            <!-- Modal Güncelle -->
            <div class="modal fade" id="Edit_ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        Yüklemeler
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content  text-muted">
                               <div class="tab-pane active show" id="homeEdit" role="tabpanel">
                                   <div class="row">

                                         <!--Stok  -->
                                         <div class="mb-3">
                                            <label for="stockEdit" class="form-label">Teklif Ürün Seçiniz</label>
                                            <select class="form-select" id="stockEdit" data_sector="" data_sub_sector=""  data_stock_id="" >
                                                <option value="">Ürün Seç</option>
                                                @for ($i = 0; $i < count($DB_Find_cost_calculation_product_list); $i++) 
                                                <option value="{{$DB_Find_cost_calculation_product_list[$i]->id}}" id="stockAddOption" data_sub_sector="{{$DB_Find_cost_calculation_product_list[$i]->sub_sector }}" > {{$DB_Find_cost_calculation_product_list[$i]->nameTr }} </option>
                                                @endfor                          
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="StockCodeEdit" class="form-label">Stok Kod</label>
                                            <input class="form-control" type="text" id="StockCodeEdit" name="StockCodeEdit" placeholder="" disabled>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <label for="accountingCodeBuyEdit" class="form-label">Muhasebe Alış Kod</label>
                                                <input class="form-control" type="text" id="accountingCodeBuyEdit" name="accountingCodeBuyEdit" placeholder="" disabled>
                                            </div>
                                            <div class="col-6">
                                                <label for="accountingCodeSelEdit" class="form-label">Muhasebe Satış Kod</label>
                                                <input class="form-control" type="text" id="accountingCodeSelEdit" name="accountingCodeSelEdit" placeholder="" disabled>
                                            </div>
                                        </div>

                                    
                                        <div class="col-12 mb-3">
                                            <label for="nameTrEdit" class="form-label">@lang('admin.name')</label>
                                            <input class="form-control" type="text" id="nameTrEdit" name="nameTrEdit" placeholder="@lang('admin.name')">
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
                                        <!-- Para Birimi -->
                                        <div class="col-6 mb-3">
                                            <label for="SelectCurrencyEdit" class="form-label">@lang('admin.SelectCurrency')</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectCurrencyEdit" style="cursor: pointer;"  disabled>
                                                <option value="">@lang('admin.SelectCurrency')</option>
                                                <option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''}} >Euro</option>
                                                <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''}} >Dolar</option>
                                                <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''}} >TL</option>
                                            </select>
                                        </div>
                                        <!-- End Para Birimi -->

                                        <!-- Para Tutarı -->
                                        <div class="col-6 mb-3">
                                            <label for="PriceEdit" class="form-label">Birim Fiyat</label>
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
                                        <div class="col-12 mb-3">
                                            <label for="featuresTREdit" class="form-label">@lang('admin.Features') TR</label>
                                            <textarea class="form-control" id="featuresTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Özellik  -->

                                    
                                   </div>
                                   <div class="row">

                                        <!-- Teknik Özellik  -->
                                        <div class="col-12 mb-3">
                                            <label for="tech_featuresTREdit" class="form-label">Teknik Özellik TR</label>
                                            <textarea class="form-control" id="tech_featuresTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- Teknik Özellik Son  -->

                                     

                                   </div>
                               

                                    <div class="row">
                                        <!-- Açıklama  -->
                                        <div class="col-12 mb-3">
                                            <label for="descriptionTREdit" class="form-label">@lang('admin.Description') TR</label>
                                            <textarea class="form-control" id="descriptionTREdit" rows="4"></textarea>
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
                                                    <div id="LoadingFileUploadtechnicalFileEdit" style="display:none;" ><span class="d-flex align-items-center">
                                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                                                    </span> </div>
                                                    <div id="uploadStatus"></div>
                                                    <!--- Son Loading --->
        
                                                    <input type="file" name="file" id="fileInputEditTech" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: none; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrltechnicalFileEdit"></p></div>
                                                    <button type="button" id="techFileUploadClickEdit" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                        <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > Teknik Belge Yükle </p>
                                                    </button>
                                                    
                                                    <!-- ProgressBar ---->
                                                    <div class="progress" style="margin-top: 20px;">
                                                        <div class="progress-bar" id="progressBarFileUploadtechnicalEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
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

            <!-- Modal Silme -->
            <div class="modal fade" id="Delete_ProductModal"  data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_ProductModal").modal('hide');} ></button>
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
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_ProductModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productUpdate"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Silme  Son -->

            <!-- Modal Şart Ekle -->
            <div class="modal fade" id="AddConditionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Şart Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <div class="mb-3"> 
                                    <label for="ConditionsAdd" class="form-label">Şart</label>
                                    <input class="form-control" type="text" id="ConditionsAdd" name="ConditionsAdd" placeholder="Şart">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_conditions_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Şart Ekle  Son -->

            <!-- Modal Şart Güncelle -->
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
                            <label for="ConditionsEdit" class="form-label">Şart</label>
                                    <input class="form-control" type="text" id="ConditionsEdit" name="ConditionsEdit" placeholder="Şart">
                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" data_isgeneral="0" id="data_conditions_update">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Şart Güncelle  Son -->
            
            <!-- Modal Şart Silme -->
            <div class="modal fade" id="Delete_ConditionsModal"  data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button type="button" class="btn btn-info" id="data_productUpdate"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Şart Silme Son -->

            <!-- Modal Banka Ekle -->
            <div class="modal fade" id="Bankaadd_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#" id="Add_BankaForm">
                            <div class="modal-body">
                                <div class="mb-3" style="display:none;"  > 
                                    <label for="ProformaIDAdd" class="form-label">@lang('admin.CurrentName')</label>
                                    <input class="form-control" type="number" id="ProformaIDAdd" name="nameAdd" placeholder="@lang('admin.CurrentName')" value="{{$DB_Find->id}}" >
                                </div>

                                <div class="mb-3">
                                    <label for="bankaAccountTitleAdd" class="form-label">Banka Hesap Adı</label>
                                    <input class="form-control" type="text" id="bankaAccountTitleAdd" name="bankaAccountTitleAdd" placeholder="Banka Hesap Adı">
                                </div>

                                <div class="mb-3">
                                    <label for="BankTitleAdd" class="form-label">@lang('admin.BankTitle')</label>
                                    <input class="form-control" type="text" id="BankTitleAdd" name="BankTitleAdd" placeholder="@lang('admin.BankTitle')">
                                </div>

                                <div class="mb-3">
                                    <label for="BranchAdd" class="form-label">@lang('admin.Branch')</label>
                                    <input class="form-control" type="text" id="BranchAdd" name="BranchAdd" placeholder="@lang('admin.Branch')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="AcountNumberAdd" class="form-label">@lang('admin.AcountNumber')</label>
                                    <input class="form-control" type="text" id="AcountNumberAdd" name="AcountNumberAdd" placeholder="@lang('admin.AcountNumber')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="IbanAdd" class="form-label">@lang('admin.Iban')</label>
                                    <input class="form-control" type="text" id="IbanAdd" name="IbanAdd" placeholder="@lang('admin.Iban')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="SwiftAdd" class="form-label">@lang('admin.Swift')</label>
                                    <input class="form-control" type="text" id="SwiftAdd" name="SwiftAdd" placeholder="@lang('admin.Swift')">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-success" id="new_bank_add">@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Banka Ekle  Son -->

            <!-- Modal Banka Güncelle -->
            <div class="modal fade" id="Bankedit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_bank_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#" id="Edit_BankaForm">

                            <!---  Loading --->
                            <div id="BankLoadingFileUploadEdit" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="BankaModalBodyInfoEdit" style="display:none;" >
                                <div class="mb-3" style="display:none;" > 
                                    <label for="ProformaIDUpdate" class="form-label">@lang('admin.CurrentName')</label>
                                    <input class="form-control" type="number" id="ProformaIDUpdate" name="nameEdit" placeholder="@lang('admin.CurrentName')"  value="{{$DB_Find->id}}" >
                                </div>

                                <div class="mb-3">
                                    <label for="bankaAccounttitleEdit" class="form-label">Banka Hesap Adı</label>
                                    <input class="form-control" type="text" id="bankaAccounttitleEdit" name="bankaAccounttitleEdit" placeholder="Banka Hesap Adı">
                                </div>

                                <div class="mb-3">
                                    <label for="BanktitleEdit" class="form-label">@lang('admin.BankTitle')</label>
                                    <input class="form-control" type="text" id="BanktitleEdit" name="BanktitleEdit" placeholder="@lang('admin.BankTitle')">
                                </div>

                                <div class="mb-3">
                                    <label for="BranchEdit" class="form-label">@lang('admin.Branch')</label>
                                    <input class="form-control" type="text" id="BranchEdit" name="BranchEdit" placeholder="@lang('admin.Branch')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="AcountNumberEdit" class="form-label">@lang('admin.AcountNumber')</label>
                                    <input class="form-control" type="text" id="AcountNumberEdit" name="AcountNumberEdit" placeholder="@lang('admin.AcountNumber')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="IbanEdit" class="form-label">@lang('admin.Iban')</label>
                                    <input class="form-control" type="text" id="IbanEdit" name="IbanEdit" placeholder="@lang('admin.Iban')">
                                </div>

                                <div class="mb-3"> 
                                    <label for="SwiftEdit" class="form-label">@lang('admin.Swift')</label>
                                    <input class="form-control" type="text" id="SwiftEdit" name="SwiftEdit" placeholder="@lang('admin.Swift')">
                                </div>
                            </div>
                            <!---  ModalBodyInfoBody Son --->

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_bank_edit">@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Banka Güncelle  Son -->

            <!-- Modal Banka Arama -->
            <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Search') #</p>  <p id="search_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#">
                            
                            <!---  Loading --->
                            <div id="LoadingFileUploadSearch" style="display:block;" ><span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status"></span>
                                <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                            </span> </div>
                            <div id="uploadStatus"></div>
                            <!--- Son Loading --->

                            <!---  ModalBodyInfoBody --->
                            <div class="modal-body" id="ModalBodyInfoSearch" style="display:none;" >
                                <div class="mb-3" style="display:none;" > 
                                    <label for="CurrencyCartIDSearch" class="form-label">@lang('admin.CurrentName')</label>
                                    <input class="form-control" type="number" id="CurrencyCartIDSearch" name="CurrencyCartIDSearch" placeholder="@lang('admin.CurrentName')" disabled >
                                </div>

                                <div class="mb-3">
                                    <label for="bankaAccountTitleSearch" class="form-label">Banka Hesap Adı</label>
                                    <input class="form-control" type="text" id="bankaAccountTitleSearch" name="bankaAccountTitleSearch" placeholder="Banka Hesap Adı" disabled >
                                </div>

                                <div class="mb-3">
                                    <label for="BankTitleSearch" class="form-label">@lang('admin.BankTitle')</label>
                                    <input class="form-control" type="text" id="BankTitleSearch" name="BankTitleSearch" placeholder="@lang('admin.BankTitle')" disabled >
                                </div>

                                <div class="mb-3">
                                    <label for="BranchSearch" class="form-label">@lang('admin.Branch')</label>
                                    <input class="form-control" type="text" id="BranchSearch" name="BranchSearch" placeholder="@lang('admin.Branch')" disabled >
                                </div>

                                <div class="mb-3"> 
                                    <label for="AcountNumberSearch" class="form-label">@lang('admin.AcountNumber')</label>
                                    <input class="form-control" type="text" id="AcountNumberSearch" name="AcountNumberSearch" placeholder="@lang('admin.AcountNumber')" disabled >
                                </div>

                                <div class="mb-3"> 
                                    <label for="IbanSearch" class="form-label">@lang('admin.Iban')</label>
                                    <input class="form-control" type="text" id="IbanSearch" name="IbanSearch" placeholder="@lang('admin.Iban')" disabled >
                                </div>

                                <div class="mb-3"> 
                                    <label for="SwiftSearch" class="form-label">@lang('admin.Swift')</label>
                                    <input class="form-control" type="text" id="SwiftSearch" name="SwiftSearch" placeholder="@lang('admin.Swift')" disabled >
                                </div>
                            </div>
                            <!---  ModalBodyInfoBody Son --->

                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Banka Arama  Son -->
            
            <!-- Modal Banka Silme -->
            <div class="modal fade" id="Delete_BankModal"  data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                            <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >Silme #</p>  <p id="delete_banka_data_id" style="margin:auto;">xx</p> </h5>
                            <button type="button" class="btn-close" onclick={$("#Delete_BankModal").modal('hide');} ></button>
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
                                    <button type="button" class="btn btn-danger" onclick={$("#Delete_BankModal").modal('hide');}  >@lang('admin.Close')</button>
                                    <button type="button" class="btn btn-info" id="data_productUpdate"  >@lang('admin.Edit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Banka Silme Son -->

            <!-- start page title -->
            <div class="row">

                    <!-- Body Title -->
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"> @lang('admin.ProformaInvoice') #{{$DB_Find->id}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/proforma/invoice/list">@lang('admin.ProformaInvoiceList')</a></li>
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
                                        <label for="proformaDate" class="form-label">Proforma Tarih</label>
                                        <input class="form-control " id="proformaDate" placeholder="Başlık" type="date" value="{{$DB_Find->proformaDate}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="proformaNo" class="form-label">Proforma No</label>
                                        <input type="text" class="form-control" id="proformaNo" placeholder="@lang('admin.Title')" value="{{$DB_Find->proformaCode}}" disabled >
                                    </div>
                                </div>
                                 
                                <!--Para Birimi -->
                                <div class="col-4">
                                    <label for="CurrencyAdd" class="form-label">@lang('admin.Currency')</label>
                                    <select class="form-control"  name="choices-single-default2" id="CurrencyAdd"  disabled>
                                        <option value="">@lang('admin.Currency')</option>
                                        "<option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''}} >Euro</option>
                                        <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''}} >Dolar</option>
                                        <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''}} >TL</option>"
                                    </select>
                                </div>
                                <!--Para Birimi Son -->
                            </div>
                        </div>
                    </div>
                    <!---- Bilgi Son -->

                    <!-- Teklif Geçerlilik Tarihi -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0" >TEKLİF GEÇERLİLİK SÜRESİ</h5>
                        </div>
                        <div class="card-body">
                          
                            <div class="col-12">
                                <label for="offerEffectiveDate">Teklif Geçerlilik Tarihi</label>
                                <input class="form-control " id="offerEffectiveDate" placeholder="@lang('admin.Title')" type="date" value="{{$DB_Find->offerEffectiveDate}}"  >
                            </div>
                         
                        </div>
                    </div>
                    <!-- Teklif Geçerlilik Tarihi Son -->

                    <!---  Ürün Bilgileri --> 
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">TALEP EDİLEN ÜRÜN FİYAT LİSTESİ</h5>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"> @lang('admin.ProductInformation') </th>
                                            <th scope="col"> @lang('admin.TargetUnitPrice') </th>
                                            <th scope="col" style="width: 120px;">Stok Miktarı</th>
                                            <th scope="col" style="width: 120px;">Stok Birimi</th>
                                            <th scope="col" class="text-end" style="width: 150px;">@lang('admin.Total')</th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTable" data_product_count="{{count($DB_Find_Product)}}" >

                                        @for ($i = 0; $i < count($DB_Find_Product); $i++)
                                        <tr id="{{$i}}" class="product">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="productName-1" placeholder="@lang('admin.ProductName')"  value="{{$DB_Find_Product[$i]->nameTr}}" readonly="readonly" >
                                                </div>
                                                <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="@lang('admin.ProductDetail')" readonly="readonly"  >{!!$DB_Find_Product[$i]->descriptionTr!!}</textarea>
                                            </td>
                                            <td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="{{$i}}" step="0.01" placeholder="0.00" value="{{$DB_Find_Product[$i]->price}}" readonly="readonly" ></td>
                                            <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="{{$i}}" value="{{$DB_Find_Product[$i]->stockCount}}"   readonly="readonly" > </div> </td>
                                            <td class="text-end"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="stockUnit" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->stockUnit}}" readonly="" > </div> </td>
                                            <td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->total}}" readonly="" > </div> </td>
                                            <td class="text-end" >
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ProductModal"  data-id="{{$DB_Find_Product[$i]->id}}"   ><i  data_id="{{$DB_Find_Product[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
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
                 
                    <!---  Genel Şartlar --> 
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">GENEL ŞARTLAR</h5>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"> @lang('admin.Title') </th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="productConditionsTable_General"> 

                                        @for ($i = 0; $i < count($DB_Find_conditions_General); $i++)
                                        <tr id="{{$i}}" class="conditions">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start">
                                                <input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="@lang('admin.Title')"  value="{{$DB_Find_conditions_General[$i]->title}}" readonly="readonly" > 
                                            </td>
                                            <td class="text-end" >
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ConditionsModal" data-id="{{$DB_Find_conditions_General[$i]->id}}" data-general = "1" ><i  data_id="{{$DB_Find_conditions_General[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
                                                    <button class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#EditConditionsModal"    data-id="{{$DB_Find_conditions_General[$i]->id}}" data-general = "1" ><i  data_id="{{$DB_Find_conditions_General[$i]->id}}"  class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Genel Şartlar Son -->

                    <!---  Özel Şartlar --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">ÖZEL ŞARTLAR</h5>
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#AddConditionsModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"> @lang('admin.Title') </th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="productConditionsTable_Special">

                                        @for ($i = 0; $i < count($DB_Find_conditions_Special); $i++)
                                        <tr id="{{$i}}" class="conditions">
                                            <th scope="row" class="product-id">{{$i+1}}</th>
                                            <td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="@lang('admin.Title')"  value="{{$DB_Find_conditions_Special[$i]->title}}" readonly="readonly" > </td>
                                           
                                            <td class="text-end" >
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ConditionsModal" data-id="{{$DB_Find_conditions_Special[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_conditions_Special[$i]->id}}"  class="ri-delete-bin-5-fill fs-16"></i></button> 
                                                    <button class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#EditConditionsModal"    data-id="{{$DB_Find_conditions_Special[$i]->id}}" data-general = "0" ><i  data_id="{{$DB_Find_conditions_Special[$i]->id}}"  class=" ri-edit-2-fill fs-16"></i></button> 
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                        
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                           
                        </div>
                    </div>
                    <!---  Özel Şartlar Son --> 

                    <!---  Talep Açıklaması --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">TALEP AÇIKLAMASI</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="requestFormDescription">Açıklama</label>
                                <textarea class="form-control" id="requestFormDescription" rows="4"  disabled >{!!$DB_Find->requestformDescription!!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!---  Talep Açıklaması Son --> 

                    
                    <!---  Talep Açıklaması --> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between " style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">Bizim Açıklama</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="description">Açıklama</label>
                                <textarea class="form-control" id="description" rows="4"   >{!!$DB_Find->description!!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!---  Talep Açıklaması Son --> 

                    <!--- Teslim Bilgileri  -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">TESLİM ŞARTLARI</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title mb-0">ÖDEME ŞARTLARI</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="vendorDeliveryTypeAdd" class="form-label">Satıcı Teslim Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="vendorDeliveryTypeAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_teslimSekli); $i++) <option value="{{$DB_Find_teslimSekli[$i]->id}}" data_title="{{$DB_Find_teslimSekli[$i]->title}}"  {{$DB_Find->vendorDeliveryType == $DB_Find_teslimSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_teslimSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="modeofTransportAdd" class="form-label">Nakliyet Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="modeofTransportAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_nakliyatSekli); $i++) <option value="{{$DB_Find_nakliyatSekli[$i]->id}}" data_title="{{$DB_Find_nakliyatSekli[$i]->title}}"  {{$DB_Find->modeofTransport == $DB_Find_nakliyatSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_nakliyatSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="shipmentTypeAdd" class="form-label">Sevk Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="shipmentTypeAdd">
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_sevkSekli); $i++) <option value="{{$DB_Find_sevkSekli[$i]->id}}" data_title="{{$DB_Find_sevkSekli[$i]->title}}" {{$DB_Find->shipmentType == $DB_Find_sevkSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_sevkSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exitPoint" class="form-label">Çıkış Yeri</label>
                                        <input type="text" class="form-control" id="exitPoint" placeholder="" data-provider="flatpickr" value="{{$DB_Find->exitPoint}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="clearancePlace" class="form-label">Gümrükleme Yeri</label>
                                        <input type="text" class="form-control" id="clearancePlace" placeholder="" data-provider="flatpickr" value="{{$DB_Find->clearancePlace}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="deliveryPlace" class="form-label">Teslim (Boşaltma) Yeri</label>
                                        <input type="text" class="form-control" id="deliveryPlace" placeholder="" data-provider="flatpickr" value="{{$DB_Find->deliveryPlace}}" >
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="paymentMethodAdd" class="form-label">Ödeme Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="paymentMethodAdd">
                                            <option value="" selected>Şeç</option>
                                            @for ($i = 0; $i < count($DB_Find_ödemeSekli); $i++) <option value="{{$DB_Find_ödemeSekli[$i]->id}}" data_title="{{$DB_Find_ödemeSekli[$i]->title}}"  {{$DB_Find->paymentMethod == $DB_Find_ödemeSekli[$i]->id ? 'selected' : ''   }} >{{$DB_Find_ödemeSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                   
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Teslim Bilgileri Son -->

                    <!-- Banka Bilgileri  --->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between ">
                            <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.Bank') @lang('admin.List')</p>  |  <p id="bankListCount">{{count($DB_Find_Bank)}}</p> </h5>
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#Bankaadd_modal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
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
                                        <option style="cursor: pointer;" value="active">@Lang('admin.Active')</option>
                                        <option style="cursor: pointer;" value="passive">@Lang('admin.Passive')</option>
                                        <option style="cursor: pointer;" value="delete">@Lang('admin.Delete')</option>
                                    </select>
                                </div>
                                <!--- Filtreleme Son -->


                                <!--- Button -->
                                <button type="button" class="btn btn-success bg-gradient waves-effect waves-light" style="padding: inherit;" id="edit_checkedItems" >@lang('admin.Edit')</button>


                            </div>

                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light text-muted">
                                        <tr style="cursor:pointer;" >

                                            <th exportname="Id" class="sort" data-sort="type" scope="col" id="checkItemBox"  >Id</th>
                                            <th exportname="CreatedDate" class="sort" data-sort="order_date" scope="col" >@lang('admin.createdDate')</th>
                                           
                                            <th exportname="bankaAccountTitle" >Banka Hesap Adı</th>
                                            <th exportname="bankTitle" >@lang('admin.BankTitle')</th>
                                            <th exportname="branch" >@lang('admin.Branch')</th>
                                            <th exportname="accountNumber" >@lang('admin.AcountNumber')</th>
                                            <th exportname="iban" >@lang('admin.Iban')</th>
                                            <th exportname="swift" >@lang('admin.Swift')</th>

                                          
                                            <th exportname="Actions" >@lang('admin.Actions')</th>
                                        </tr>
                                    </thead>
                                    <!--end thead-->
                                    <tbody class="list form-check-all" id="bankaTable_List">

                                        <!--tr-->
                                        <tr style="display:none;"  id="tableConst" ><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> </tr>
                                        <!--end tr-->

                                        @for ($i = 0; $i < count($DB_Find_Bank); $i++)
                                            <tr>
                                                <td exportname="Id" id="itemID" class="type"> {{$i+1}}</td>
                                                <td exportname="CreatedDate" class="order_date"> {{$DB_Find_Bank[$i]->created_at}}</td>
                                               
                                                <td exportname="bankaAccountTitle" >{{$DB_Find_Bank[$i]->bankaAccountTitle}}</td>
                                                <td exportname="bankTitle" >{{$DB_Find_Bank[$i]->bankTitle}}</td>
                                                <td exportname="branch" >{{$DB_Find_Bank[$i]->branch}}</td>
                                                <td exportname="accountNumber" >{{$DB_Find_Bank[$i]->accountNumber}}</td>
                                                <td exportname="iban" >{{$DB_Find_Bank[$i]->iban}}</td>
                                                <td exportname="swift" >{{$DB_Find_Bank[$i]->swift}}</td>
                                            
                                                

                                                <td exportname="Actions" id="listItemActionBox" > 
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" title ="@lang('admin.Search')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View"><a  data-bs-toggle="modal" data-bs-target="#searchModal" data-id="{{$DB_Find_Bank[$i]->id}}"  class="view-item-btn text-success" style="cursor:pointer;"><i class="ri-search-eye-line align-bottom "></i></a> </li> 
                                                        <li class="list-inline-item edit" title ="@lang('admin.Edit')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#Bankedit_modal" data-id="{{$DB_Find_Bank[$i]->id}}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i> </a> </li>
                                                        <li class="list-inline-item" title ="@lang('admin.Delete')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Remove" style="cursor:pointer;" > <a data-bs-toggle="modal" data-bs-target="#Delete_BankModal" data-id="{{$DB_Find_Bank[$i]->id}}"  class="text-danger d-inline-block remove-item-btn" > <i class="ri-delete-bin-5-fill fs-16"></i> </a> </li>
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
                                
                                <!-- No Item -->
                                @if(count($DB_Find_Bank) == 0 )

                                    <!-- No Item -->
                                <div class="noresult" id="dataNoItemList">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/wcjauznf.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:250px;height:250px"></lord-icon>
                                        <h5 class="mt-2">@lang('admin.DataListisEmpty')</h5>
                                    </div>
                                </div>
                                @endif
                                <!-- No Item Son -->

                            </div>
                        </div>
                    </div>
                    <!-- Banka Bilgileri Son --->
                    
                    <!---  Onaylandı --> 
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">PROFORMA ONAYI</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="proformaCheckEdit" class="form-label">Proforma Onaylandı Mı?</label>
                                    <select class="form-select" data-choices="" data-choices-search-false="" id="proformaCheckEdit">
                                        <option value="" selected="">Seçiniz</option>
                                        <option value="Bekleme"  {{$DB_Find->proformaCheck == 'Bekleme' ? 'selected' : '' }} >Bekleme</option>
                                        <option value="Evet"  {{$DB_Find->proformaCheck == 'Evet' ? 'selected' : '' }} >Evet</option>
                                        <option value="Hayır" {{$DB_Find->proformaCheck == 'Hayır'? 'selected' : '' }} >Hayır</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---  Onaylandı Son --> 

                    <div class="hstack gap-2 justify-content-end d-print-none mt-4 w-100">
                        <button class="btn btn-success w-50" id="btn_edit" data_time="{{$DB_Find->time}}"  data_id="{{$DB_Find->id}}"  ><i class="ri-edit-line align-bottom me-1"></i> @lang('admin.Edit')</button>
                        <a href="/proforma/invoice/@lang('admin.lang')/view/{{$DB_Find->id}}/export/file" class="btn btn-primary w-50"><img title="Pdf" src="/assets/img/icon/pdf.png" style="cursor:pointer;height: 20px;" alt="" srcset=""> Pdf</a>
                    </div>
                </div>

                <div class="col-3">


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

                    <!--Alıcı Firma  -->
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(180, 83, 159);">
                           <h5 class="card-title mb-0" style="color:white">ALICI FİRMA SEÇ</h5>
                        </div>

                        <div class="card-body">
                            <div class="col-12">
                                 <!-- Firma Bilgileri --> 
                                <div class="mb-3"> 
                                    <label for="selectCurrentCartEdit" class="form-label">Firma Seçiniz</label>
                                    <select class="form-select"  id="selectCurrentCartEdit">
                                        <option value="">Cari Kart Seç</option>
                                        @for ($i = 0; $i < count($DB_Find_Current); $i++) <option value="{{$DB_Find_Current[$i]->id}}"  {{$DB_Find->companyId == $DB_Find_Current[$i]->id ? 'selected' : '' }} >{{$DB_Find_Current[$i]->current_name}}</option>  @endfor
                                    </select>
                                </div>
                                <!-- Firma Bilgileri Son --> 
                                    
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
                    </div>
                    <!--Alıcı Firma Son -->
                 
                    
                </div>
            </div>

        </div>
    </div>
    <!-- End Page-content -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/proforma_invoice_edit.js"></script>

    </footer>