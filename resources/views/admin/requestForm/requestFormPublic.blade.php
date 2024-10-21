<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> public - @lang('admin.RequestReceiveForm')  - @lang('admin.Edit') #{{$DB_Find->id}}  | {{ config('admin.Admin_Title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ config('admin.Admin_Meta_Title') }}">
    <meta name="author" content="{{ config('admin.Admin_Meta_Author') }}">
    <meta name="description" content="{{ config('admin.Admin_Meta_Description') }}">
    <meta name="keywords" content="{{ config('admin.Admin_Keywords') }}">

    <!------- Head --->
    @include('admin.include.head')


    <!--------- Css  --> 
    
    

</head>

<body>

    <!------- Header --->
    @include('admin.include.headerPublic')

    
    <!------- Lang --->
    @include('include.lang')

    <!-- Page-content -->
    <div class="page-content" style="margin-top:22px !important;">
       <div class="container-fluid">

            <div class="row"> <h2>@lang('admin.RequestReceiveForm')  </h2> </div>

            @if($DB_Find->public == "2")
            <div id="product_RetCart" class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show mb-3 d-flex" role="alert" style="display:flex; gap: 10px; height: 29px;font-size: 16px;padding-top: 5px;">
                <i class="ri-error-warning-line label-icon"></i><strong>Dikkat</strong>
                <div class="d-flex gap-1"> <p> Düzenleme Yetkisine Sahip Değilsiniz. Sadece görebilirsiniz. </p></div>
            </div>
            @endif


             <!-- Modal Ekle -->
             <div class="modal fade" id="Add_ProductModal" data_public="true"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                            <button type="button" class="btn-close" onclick={$("#Add_ProductModal").modal('hide');} ></button>
                        </div>
                        <form action="#" id="Add_ProductForm">
                            <div class="modal-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                                           @lang('admin.GeneralInformation')
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab" aria-selected="false" tabindex="-1">
                                            @lang('admin.DetailInformation')
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
                                            <div class="col-12 mb-3">
                                                <label for="namePublicAdd" class="form-label">@lang('admin.ProductName')</label>
                                                <input class="form-control" type="text" id="namePublicAdd" name="namePublicAdd" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="gtipNoAdd" class="form-label">GTIP</label>
                                                <input class="form-control" type="text" id="gtipNoAdd" name="gtipNoAdd" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Stok Birimi -->
                                            <div class="col-6 mb-3">
                                                <label for="SelectStockUnitAdd" class="form-label">@lang('admin.SelectStockUnit')</label>
                                                <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectStockUnitAdd" style="cursor: pointer;">
                                                    <option value="">@lang('admin.SelectStockUnit')</option>
                                                    <option value="Adet">@lang('admin.Piece')</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Ton">Ton</option>
                                                    <option value="Litre">@lang('admin.Liter')</option>
                                                </select>
                                            </div>
                                            <!-- End Stok Birimi -->
                                            <!-- Stok Sayısı -->
                                            <div class="col-6 mb-3">
                                                <label for="StockCountAdd" class="form-label">@lang('admin.DesiredQuantity')</label>
                                                <input class="form-control" type="number" id="StockCountAdd" name="StockCountAdd">
                                            </div>
                                            <!-- End Stok Sayısı -->
                                        </div>
                                        <div class="row">
                                              
                                                <!-- Para Tutarı -->
                                                <div class="col-12 mb-3">
                                                    <label for="PriceAdd" class="form-label">@lang('admin.TargetUnitPrice')</label>
                                                    <input class="form-control" type="text" id="PriceAdd" name="PriceAdd" placeholder="00,00">
                                                </div>
                                                <!-- End Para Tutarı -->
                                                
                                            </div>
                                      
                                    </div>
                                    <div class="tab-pane" id="product1" role="tabpanel">
                                        <div class="row">
                                            <!-- Özellik  -->
                                            <div class="col-12 mb-3" >
                                                <label for="featuresPublicAdd" class="form-label">@lang('admin.Features')</label>
                                                <textarea class="form-control" id="featuresPublicAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Özellik  -->
                                          
                                        </div>
                                        <div class="row">
                                            <!-- Teknik Özellik  -->
                                            <div class="col-12 mb-3" >
                                                <label for="tech_featuresPublicAdd" class="form-label">@lang('admin.TechnicialSpecifications')</label>
                                                <textarea class="form-control" id="tech_featuresPublicAdd" rows="2"></textarea>
                                            </div>
                                            <!-- Teknik Özellik Son  -->
                                          
                                        </div>
                                           
                                        <div class="row">
                                            <!-- Açıklama  -->
                                            <div class="col-12 mb-3" >
                                                <label for="descriptionPublicAdd" class="form-label">@lang('admin.Description')</label>
                                                <textarea class="form-control" id="descriptionPublicAdd" rows="2"></textarea>
                                            </div>
                                            <!-- End Açıklama  -->
            
                                                            
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="catalogLinkAdd" class="form-label">@lang('admin.CatalogLink')</label>
                                                <input class="form-control" type="text" id="catalogLinkAdd" name="catalogLinkAdd" placeholder="">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="webSiteAdd" class="form-label">@lang('admin.ProductWebsite')</label>
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
                                                                    <img  id="productViewImageAdd" src="/assets/img/product/default.jpg" alt="" style="display:none;  margin: auto;width: 150px;">

                                                                    <a href=""  id="product_dowloand_imgAdd" download=""  style="display:none; ">
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
                                                                <button type="button" id="fileUploadClick" class="btn btn-success " style="color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 300px;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                                                    <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto;"> @lang('admin.UploadImage') </p>
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
                                                                    <p style=" color: #fff; font-size: 14px; font-weight: bold; margin-bottom: auto; "> @lang('admin.UploadTechnicalDocument') </p>
                                                                </button>
                                                                
                                                                <!-- ProgressBar ---->
                                                                <div class="progress" style="margin-top: 10px;">
                                                                    <div class="progress-bar" id="progressBarFileUploadTechnical" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                                </div>
                                                                <!-- ProgressBar Son ---->
                                                                
                                                            </div>
                                                        </form>
                                                        <!-- Dosya Yükleme Son ---->

                                                        <a href=""  id="product_dowloand_fileAdd" download="" style="display:none; ">
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
                                    <button type="button" class="btn btn-success" id="product_add_item_public" data_stockNumber ="{{$DB_Find_Number}}" >@lang('admin.Add')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ekle  Son -->

            <!-- Modal Güncelle -->
            <div class="modal fade" id="Edit_ProductModal" data_public="false"  data_lang="@lang('admin.lang')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       @lang('admin.GeneralInformation')
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#productEdit" role="tab" aria-selected="false" tabindex="-1">
                                        @lang('admin.DetailInformation')
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
                                        <div class="col-12 mb-3">
                                            <label for="namePublicEdit" class="form-label">@lang('admin.ProductName')</label>
                                            <input class="form-control" type="text" id="namePublicEdit" name="namePublicEdit" placeholder="">
                                        </div>
                                    
                                        <div class="col-12 mb-3">
                                            <label for="gtipNoEdit" class="form-label">GTIP</label>
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
                                                    <option value="Litre">@lang('admin.Liter')</option>
                                                </select>
                                            </div>
                                            <!-- End Stok Birimi -->

                                            <!-- Stok Sayısı -->
                                            <div class="col-6 mb-3">
                                                <label for="StockCountEdit" class="form-label">@lang('admin.DesiredQuantity')</label>
                                                <input class="form-control" type="number" id="StockCountEdit" name="StockCountEdit" placeholder="0">
                                            </div>
                                            <!-- End Stok Sayısı -->

                                    </div>
                                    <div class="row">

                                        <!-- Para Tutarı -->
                                        <div class="col-12 mb-3">
                                            <label for="PriceEdit" class="form-label">@lang('admin.TargetUnitPrice')</label>
                                            <input class="form-control" type="text" id="PriceEdit" name="PriceEdit" placeholder="00,00">
                                        </div>
                                        <!-- End Para Tutarı -->

                                    </div>
                               
                                 
                               </div>
                               <div class="tab-pane" id="productEdit" role="tabpanel">

                                   <div class="row">
                                        <!-- Özellik  -->
                                        <div class="col-12 mb-3" >
                                            <label for="featuresPublicEdit" class="form-label">@lang('admin.Features')</label>
                                            <textarea class="form-control" id="featuresPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Özellik  -->
                                   </div>
                                   <div class="row">

                                        <!-- Teknik Özellik  -->
                                        <div class="col-12 mb-3" >
                                            <label for="tech_featuresPublicEdit" class="form-label">@lang('admin.TechnicialSpecifications')</label>
                                            <textarea class="form-control" id="tech_featuresPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- Teknik Özellik Son  -->

                                   </div>
                                    <div class="row">
                                        <!-- Açıklama  -->
                                        <div class="col-12 mb-3" >
                                            <label for="descriptionPublicEdit" class="form-label">@lang('admin.Description')</label>
                                            <textarea class="form-control" id="descriptionPublicEdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Açıklama  -->

                                     
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="catalogLinkEdit" class="form-label">@lang('admin.CatalogLink')</label>
                                            <input class="form-control" type="text" id="catalogLinkEdit" name="catalogLinkEdit" placeholder="">
                                        </div>
                                       
                                        <div class="col-6 mb-3">
                                            <label for="webSiteEdit" class="form-label">@lang('admin.ProductWebsite')</label>
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
                                            
                                            @if($DB_Find->public == "1")
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
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > @lang('admin.UploadImage') </p>
                                                    </button>
                                                    
                                                    <!-- ProgressBar ---->
                                                    <div class="progress" style="margin-top: 20px;">
                                                        <div class="progress-bar" id="progressBarFileUploadEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                    </div>
                                                    <!-- ProgressBar Son ---->
                                                        
                                                </div>
                                            </form>
                                            <!-- Dosya Yükleme Son ---->
                                            @else 
                                            <p>@lang('admin.UploadImage')</p>
                                            @endif
                                    
                                        </div>
                                        <!-- Dosya Yükleme Kutusu Son ----->
            
                                      
                                        <!-- Dosya Yükleme Kutusu ----->
                                        <div class="col-12 mb-3"  style="width: 450px;border: 2px solid;padding: 10px;">
        
                                            @if($DB_Find->public == "1")
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
                                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > @lang('admin.UploadTechnicalDocument') </p>
                                                    </button>
                                                    
                                                    <!-- ProgressBar ---->
                                                    <div class="progress" style="margin-top: 20px;">
                                                        <div class="progress-bar" id="progressBarFileUploadTechnicalEdit" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                                    </div>
                                                    <!-- ProgressBar Son ---->
                                                    
                                                </div>
                                            </form>
                                            <!-- Dosya Yükleme Son ---->
                                            
                                            @else 
                                            <p>@lang('admin.UploadTechnicalDocument')</p>

                                            @endif

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
                                    @if($DB_Find->public == "1")  <button type="button" class="btn btn-info" id="data_productEdit"  >@lang('admin.Edit')</button> @endif
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
                            <a href="/request/form/@lang('admin.lang')/login/{{$DB_Find->id}}">
                               <i class="mdi mdi-logout fs-16 align-middle me-1"></i> @lang('admin.logout')
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <!--  row -->
            <div class="row">
                <div class="col-12">

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
                                    <a href="/request/form/tr/public/{{$DB_Find->id}}" class="dropdown-item notify-item language py-2" data-lang="tr" title="Türkçe">
                                        <img src="{{asset('/assets/admin')}}/assets/images/flags/tr.svg" alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">Türkçe</span>
                                    </a>


                                    <!-- item-->
                                    <a href="/request/form/en/public/{{$DB_Find->id}}" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                        <img src="{{asset('/assets/admin')}}/assets/images/flags/en.svg" alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">English</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Multi Lang -->

                    <!---- Bilgiler -->
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(197, 120, 92);">
                            <h5 class="card-title mb-0" style="color:white">@lang('admin.Information')</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-8 mb-3 d-none">
                                    <label class="form-label" for="requestFormTitle">Başlık</label>
                                    <input type="text" class="form-control" id="requestFormTitle" placeholder="" value="{{$DB_Find->requestFormTitle}}" >
                                </div>
                                                                
                                <!-- Para Birimi -->
                                <div class="col-12 mb-3">
                                    <label for="SelectProductCurrencyAdd" class="form-label">@lang('admin.Currency')</label>
                                    <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectProductCurrencyAdd" style="cursor: pointer;">
                                        <option value="">@lang('admin.Currency')</option>
                                        <option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''}} >Euro</option>
                                        <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''}} >Dolar</option>
                                        <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''}} >TL</option>
                                    </select>
                                </div>
                                <!-- End Para Birimi -->

                                <div class="col-12 mb-3">
                                    <label for="requestFormDescription">@lang('admin.Description')</label>
                                    <textarea class="form-control" id="requestFormDescription" rows="4">{!!$DB_Find->description!!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---- Bilgiler Son -->

                     <!-- Talep Geçerlilik Tarihi -->
                     <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0" >@lang('admin.RequestValidityDate')</h5>
                        </div>
                        <div class="card-body">
                          
                            <div class="col-12" style="cursor:pointer;">
                                <label for="offerEffectiveDateEdit">@lang('admin.RequestValidityDate')</label>
                                <input class="form-control " id="offerEffectiveDateEdit" placeholder="@lang('admin.Title')" type="date" value="{{$DB_Find->requestEffectiveDate}}"   >
                            </div>
                         
                        </div>
                    </div>
                    <!-- Talep Geçerlilik Tarihi Son -->
                    
                    <!---  Ürün Bilgileri --> 
                    <div class="card">
                        <div class="card-header" style="background-color:rgb(212, 212, 212);">
                            <h5 class="card-title mb-0">@lang('admin.REQUESTEDPRODUCTLIST')</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"> @lang('admin.ProductInformation') </th>
                                            <th scope="col"> @lang('admin.TargetUnitPrice') </th>
                                            <th scope="col" style="width: 120px;">@lang('admin.Stock')</th>
                                            <th scope="col" class="text-center" style="width: 120px;">@lang('admin.StockUnit')</th>
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
                                                    <input type="text" class="form-control bg-light border-0" id="productName-1" placeholder="@lang('admin.ProductName')"  value="{{ $DB_Find_Product[$i]->namePublic }}" readonly="readonly" >
                                                </div>
                                                <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="@lang('admin.ProductDetail')" readonly="readonly"  >{!!$DB_Find_Product[$i]->descriptionTr!!}</textarea>
                                            </td>
                                            <td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="{{$i}}" step="0.01" placeholder="0.00" value="{{$DB_Find_Product[$i]->price}}" readonly="readonly" ></td>
                                            <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="{{$i}}" value="{{$DB_Find_Product[$i]->stockCount}}"  readonly="readonly" > </div> </td>
                                            <td class="text-end" id="DB_Find_Product_stockUnit"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productStockUnit" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->stockUnit}}" readonly="" > </div> </td>
                                            <td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="{{$i}}" placeholder="0.00" value="{{$DB_Find_Product[$i]->total}}" readonly="" > </div> </td>
                                            <td class="text-end" >
                                               @if($DB_Find->public == "1") <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" data_id="{{$DB_Find_Product[$i]->id}}" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data_id="{{$DB_Find_Product[$i]->id}}" class="ri-delete-bin-5-fill fs-16"></i> </a> </button>  @endif
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
                                                    <p style="text-transform: uppercase;vertical-align: middle;margin: auto;">@lang('admin.Total')</p>
                                                    <input type="text" class="form-control bg-light border-0 col-4" id="productTotalPayment" placeholder="0.00" value="{{$DB_Find_Product_TotalPayment}}"  readonly="">
                                                </div>
                                            </th>
                                        </tr>
                                        @if($DB_Find->public == "1")
                                        <tr> <td colspan="5">  <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#Add_ProductModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.ProductAdd')</button> </td> </tr>
                                        @endif
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
                            <h5 class="card-title mb-0">@lang('admin.GeneralConditions') </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="delivery_atEdit" class="form-label">@lang('admin.DeliveryTime')</label>
                                        <input type="date" class="form-control"  id="delivery_atEdit" value="{{$DB_Find->delivery_at}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="shipmentTypeAdd" class="form-label">@lang('admin.ShipmentType')</label>
                                        <select class="form-control"  name="choices-single-default2" id="shipmentTypeAdd">
                                            <option value="" selected>@lang('admin.Choose')</option>
                                            @for ($i = 0; $i < count($DB_Find_sevkSekli); $i++) <option value="{{$DB_Find_sevkSekli[$i]->title}}" data_id="{{$DB_Find_sevkSekli[$i]->id}}" {{$DB_Find->shipmentType == $DB_Find_sevkSekli[$i]->id ? 'selected' : ''   }} >  {{ __('admin.lang')=='tr' ? $DB_Find_sevkSekli[$i]->title : $DB_Find_sevkSekli[$i]->title_EN }}</option> @endfor
                                        </select>
                                    </div>
                                        

                                    <div class="mb-3">
                                        <label for="paymentMethodAdd" class="form-label">@lang('admin.PaymentMethod')</label>
                                        <select class="form-control"  name="choices-single-default2" id="paymentMethodAdd">
                                            <option value="" selected>@lang('admin.Choose')</option>
                                            @for ($i = 0; $i < count($DB_Find_ödemeSekli); $i++) <option value="{{$DB_Find_ödemeSekli[$i]->title}}" data_id="{{$DB_Find_ödemeSekli[$i]->id}}"  {{$DB_Find->paymentMethod == $DB_Find_ödemeSekli[$i]->id ? 'selected' : ''   }} >{{ __('admin.lang')=='tr' ? $DB_Find_ödemeSekli[$i]->title : $DB_Find_ödemeSekli[$i]->title_EN }}</option> @endfor
                                        </select>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="intertekAdd" class="form-label">@lang('admin.Intertek')</label>
                                        <select class="form-control"  name="choices-single-default2" id="intertekAdd">
                                            <option value="" selected>@lang('admin.Choose')</option>
                                            @for ($i = 0; $i < count($DB_Find_intertekTabi); $i++) <option value="{{$DB_Find_intertekTabi[$i]->title}}" data_id="{{$DB_Find_intertekTabi[$i]->id}}" {{$DB_Find->intertek == $DB_Find_intertekTabi[$i]->id ? 'selected' : ''   }} >{{ __('admin.lang')=='tr' ?  $DB_Find_intertekTabi[$i]->title : $DB_Find_intertekTabi[$i]->title_EN}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="requested_document" class="form-label"> @lang('admin.RequiredDocumentsandStandards') </label>
                                        <input type="text" class="form-control" id="requested_document" placeholder="" value="{{$DB_Find->requested_document}}" >
                                    </div>

                                        
                                        
                                    </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="deliveryLocation" class="form-label">@lang('admin.DeliveryPlace')</label>
                                        <input type="text" class="form-control" id="deliveryLocation" placeholder="" value="{{$DB_Find->deliveryLocation}}" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="vendorDeliveryTypeAdd" class="form-label">@lang('admin.VendorDeliveryType')</label>
                                        <select class="form-control"  name="choices-single-default2" id="vendorDeliveryTypeAdd">
                                            <option value="" selected>@lang('admin.Choose')</option>
                                            @for ($i = 0; $i < count($DB_Find_teslimSekli); $i++) <option value="{{$DB_Find_teslimSekli[$i]->title}}" data_id="{{$DB_Find_teslimSekli[$i]->id}}"  {{$DB_Find->vendorDeliveryType == $DB_Find_teslimSekli[$i]->id ? 'selected' : ''   }} >{{  __('admin.lang')=='tr' ? $DB_Find_teslimSekli[$i]->title : $DB_Find_teslimSekli[$i]->title_EN}}</option> @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="modeofTransportAdd" class="form-label">@lang('admin.ModeOfTransport')</label>
                                        <select class="form-control"  name="choices-single-default2" id="modeofTransportAdd">
                                            <option value="" selected>@lang('admin.Choose')</option>
                                            @for ($i = 0; $i < count($DB_Find_nakliyatSekli); $i++) <option value="{{$DB_Find_nakliyatSekli[$i]->title}}" data_id="{{$DB_Find_nakliyatSekli[$i]->id}}"  {{$DB_Find->modeofTransport == $DB_Find_nakliyatSekli[$i]->id ? 'selected' : ''   }} >{{  __('admin.lang')=='tr' ? $DB_Find_nakliyatSekli[$i]->title : $DB_Find_nakliyatSekli[$i]->title_EN}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="packagingType" class="form-label">@lang('admin.PackagingandWayofPacking')</label>
                                        <input type="text" class="form-control" id="packagingType" placeholder="" value="{{$DB_Find->packagingType}}" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="specialPermitAdd" class="form-label">@lang('admin.SpecialPermit')
                                            <span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>@lang('admin.SpecialPermitInfo')</span> 
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
                            <h5 class="card-title mb-0">@lang('admin.SpecialConditions')</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">

                                   <div class="mb-3">
                                        <label for="purchaseTimeEdit" class="form-label">@lang('admin.ProductPurchasePlanning') </label>
                                        <select class="form-control"  name="choices-single-default2" id="purchaseTimeEdit">
                                            <option value="" {{$DB_Find->purchaseTime == "" ? 'selected' : '' }} >@lang('admin.Choose')</option>
                                            <option value="Yıllık" {{$DB_Find->purchaseTime == "Yıllık" ? 'selected' : '' }} >@lang('admin.Yearly')</option>
                                            <option value="Aylık" {{$DB_Find->purchaseTime == "Aylık" ? 'selected' : '' }}>@lang('admin.Monthly')</option>
                                            <option value="Haftalık" {{$DB_Find->purchaseTime == "Haftalık" ? 'selected' : '' }}>@lang('admin.Weekly')</option>
                                            <option value="Günlük" {{$DB_Find->purchaseTime == "Günlük" ? 'selected' : '' }}>@lang('admin.Daily')</option>
                                            <option value="TekSefer" {{$DB_Find->purchaseTime == "TekSefer" ? 'selected' : '' }}>@lang('admin.ForOnce')</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <div>
                                            <label for="initialPurchaseAmount_at" class="form-label">@lang('admin.FirstOrderReceivingTime')</label>
                                            <input type="date" class="form-control"  id="initialPurchaseAmount_at" value="{{$DB_Find->initialPurchaseAmount_at}}" >
                                        </div>
                                    </div>
                                   
                                    
                               

                                    <div class="mb-3">
                                        <label for="reqSample_Val" class="form-label">@lang('admin.SampleRequested')
                                           <span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>@lang('admin.SampleRequestedDescription')</span> 
                                        </label>
                                        <input type="text" class="form-control" id="reqSample_Val" placeholder="" value="{{$DB_Find->reqSample}}" >
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-6">
                                    
                                   <div class="mb-3 col-12 d-flex gap-1">
                                       <div class="col-6">
                                          <label for="purchaseAmount" class="form-label">@lang('admin.TotalConsideredAmount')</label>
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
                                         <label for="initialPurchaseAmount" class="form-label">@lang('admin.InitialOrderPurchaseAmount')</label>
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
                    
                    <div class="text-end mb-4">
                        <button id="data_public_update" data_id="{{$DB_Find->id}}" class="btn btn-success w-100"  {{$DB_Find->public == "1" ? '' : 'disabled' }}>@lang('admin.Create')</button>
                        <button id="edit_item" data_id="{{$DB_Find->id}}" class="btn btn-success  col-6" style="display:none;" >Güncelle</button>
                    </div>
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

         <!------- List --->
         <script src="{{asset('/assets/admin')}}/js/requestForm/requestFormEdit_Public.js"></script>

    </footer>