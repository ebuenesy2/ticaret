<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.AnalysisList') | {{ config('admin.Admin_Title') }}</title>
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
                        <!--- End Loading --->

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
    <!-- Mod al Resim  Son -->

    <!-- Modal Ekle -->
    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                    <button type="button" class="btn-close" onclick={$("#AddModal").modal('hide');} ></button>
                </div>
                <form action="#">
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
                            <li class="nav-item d-none" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                    Yüklemeler
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content  text-muted">
                           <div class="tab-pane active show" id="home" role="tabpanel">
                               
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="productItemsAdd" class="form-label">Ürün Seçiniz</label>
                                        <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="productItemsAdd" style="cursor: pointer;">
                                            <option value="">Seç</option>

                                            @for ($i = 0; $i < count($DB_Find_Product); $i++)
                                            <option value="{{$DB_Find_Product[$i]->id}}">{{$DB_Find_Product[$i]->nameTr}}</option>
                                            @endfor
                                          
                                        </select>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="platformAdd" class="form-label">Araştırma Platformu</label>
                                        <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="platformAdd" style="cursor: pointer;">
                                            <option value="">Seç</option>

                                            <option value="1">N11.com</option>
                                            <option value="2">Hepsiburada.com</option>
                                            <option value="3">Trendyol.com</option>
                                            <option value="4">Ebay.com</option>
                                            <option value="5">Amazon.com</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Para Birimi -->
                                    <div class="col-6 mb-3">
                                        <label for="SelectCurrencyAdd" class="form-label">Para Birimi</label>
                                        <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="SelectCurrencyAdd" style="cursor: pointer;" disabled>
                                            <option value="">Seç</option>
                                            <option value="TL" selected>TL</option>
                                            <option value="Dolar">DOLAR</option>
                                            <option value="Euro">EURO</option>
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
                           </div>
                           <div class="tab-pane" id="product1" role="tabpanel">
                                <div class="row">
                                    <!-- Özellik  -->
                                    <div class="col-12 mb-3">
                                        <label for="featuresTRAdd" class="form-label">Özellikler</label>
                                        <textarea class="form-control" id="featuresTRAdd" rows="3"></textarea>
                                    </div>
                                    <!-- End Özellik  -->
                                    
                                </div>
                                <div class="row">
                                    <!-- Teknik Özellik  -->
                                    <div class="col-12 mb-3">
                                        <label for="tech_featuresTRAdd" class="form-label">Teknik Özellik</label>
                                        <textarea class="form-control" id="tech_featuresTRAdd" rows="3"></textarea>
                                    </div>
                                    <!-- Teknik Özellik Son  -->
                                </div>
                                <div class="row">
                                        <!-- Açıklama  -->
                                    <div class="col-12 mb-3">
                                        <label for="descriptionTRAdd" class="form-label">Açıklama </label>
                                        <textarea class="form-control" id="descriptionTRAdd" rows="3"></textarea>
                                    </div>
                                    <!-- End Açıklama  -->
                                   
                                </div>
                           </div>
                           <div class="tab-pane d-none" id="messages" role="tabpanel">
                               <div class="row">
                                    <div class="col-12">
                                        <!-- Dosya Yükleme Kutusu ----->
                                        <div class="mb-3" style="width: 100%;border: 1px solid #a4a3a3;padding: 10px;">
                                            
                                            <!-- Dosya Yükleme ----->
                                            
                                                <div style="display: flex;flex-direction: column; gap: 15px;">

                                                    <div class="d-flex gap-1">
                                                        <img id="productViewImageAdd" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: none;width: 150px;">

                                                        <a href="" id="product_dowloand_imgAdd" download="" style="display:none;" >
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
                                                    <!--- End Loading --->

                                                    <input type="file" name="file" id="fileInput" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: flex; gap: 10px; margin-bottom: -25px;"><p>Dosya Yolu:</p><p id="filePathUrl"></p></div>
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
                                </div>
                           </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#AddModal").modal('hide');}  >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="new_add"   >@lang('admin.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ekle  Son -->

    <!-- Modal Güncelle -->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <p id="modalInfo" data_id="121"  data_stockNumber="121" style="display:none;" >Modal Bilgi</p>
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Update') #</p>  <p id="update_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" onclick={$("#edit_modal").modal('hide');} ></button>
                </div>
                <form action="#">

                   <!---  Loading --->
                    <div id="loaderEdit" style="display:block;" ><span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status"></span>
                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                    </span> </div>
                    <!--- End Loading --->

                    <!---  ModalBodyInfoBody --->
                    <div class="modal-body" id="ModalBodyInfoEdit" style="display:none;" >
                        <div class="row">
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
                                <li class="nav-item d-none" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messagesEdit" role="tab" aria-selected="false" tabindex="-1">
                                        Yüklemeler
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#analysisEdit" role="tab" aria-selected="false" tabindex="-1">
                                        Piyasa Analizi
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content  text-muted">
                               <div class="tab-pane active show" id="homeEdit" role="tabpanel">
                                  
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="productItemsEdit" class="form-label">Ürün Seçiniz</label>
                                            <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="productItemsEdit" style="cursor: pointer;">
                                                <option value="">Seç</option>

                                                @for ($i = 0; $i < count($DB_Find_Product); $i++)
                                                <option value="{{$DB_Find_Product[$i]->id}}">{{$DB_Find_Product[$i]->nameTr}}</option>
                                                @endfor
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="platformEdit" class="form-label">Araştırma Platformu</label>
                                            <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2" id="platformEdit" style="cursor: pointer;">
                                                <option value="">Seç</option>

                                                <option value="1">N11.com</option>
                                                <option value="2">Hepsiburada.com</option>
                                                <option value="3">Trendyol.com</option>
                                                <option value="4">Ebay.com</option>
                                                <option value="5">Amazon.com</option>
                                                <option value="6">Diğer</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Para Birimi -->
                                        <div class="col-6 mb-3">
                                            <label for="SelectCurrencyEdit" class="form-label">@lang('admin.SelectCurrency')</label>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectCurrencyEdit" style="cursor: pointer;"  disabled>
                                                <option value="">@lang('admin.SelectCurrency')</option>
                                                <option value="TL" selected>TL</option>
                                                <option value="Dolar">DOLAR</option>
                                                <option value="Euro">EURO</option>
                                            </select>
                                        </div>
                                        <!-- End Para Birimi -->

                                        <!-- Para Tutarı -->
                                        <div class="col-6 mb-3">
                                            <label for="PriceEdit" class="form-label">KDV Dahil Fiyat</label>
                                            <input class="form-control" type="text" id="PriceEdit" name="PriceEdit" placeholder="00,00">
                                        </div>
                                        <!-- End Para Tutarı -->

                                    </div>
                               </div>
                               <div class="tab-pane" id="productEdit" role="tabpanel">

                                   <div class="row">
                                        <!-- Özellik  -->
                                        <div class="col-12 mb-3">
                                            <label for="featuresTREdit" class="form-label">@lang('admin.Features') </label>
                                            <textarea class="form-control" id="featuresTREdit" rows="3"></textarea>
                                        </div>
                                        <!-- End Özellik  -->
                                     
                                   </div>
                                   <div class="row">

                                        <!-- Teknik Özellik  -->
                                        <div class="col-12 mb-3">
                                            <label for="tech_featuresTREdit" class="form-label">Teknik Özellik</label>
                                            <textarea class="form-control" id="tech_featuresTREdit" rows="3"></textarea>
                                        </div>
                                        <!-- Teknik Özellik Son  -->

                                   </div>
                                    <div class="row">
                                        <!-- Açıklama  -->
                                        <div class="col-12 mb-3">
                                            <label for="descriptionTREdit" class="form-label">@lang('admin.Description')</label>
                                            <textarea class="form-control" id="descriptionTREdit" rows="4"></textarea>
                                        </div>
                                        <!-- End Açıklama  -->

                                      
                                    </div>
                                    
                               
                               </div>
                               <div class="tab-pane d-none" id="messagesEdit" role="tabpanel">
                                   <div class="row">
                                 
                                        <!-- Dosya Yükleme Kutusu ----->
                                        <div class="col-12 mb-3" style="width: 450px;border: 2px solid;padding: 10px;">

                                            <div class="d-flex gap-1">
                                                <img id="productViewImageEdit" src="/assets/img/product/default.jpg" alt="" style="margin: auto;display: flex;width: 150px;">

                                                <a href="" id="product_dowloand_imgEdit" download="">
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
                                                    <!--- End Loading --->
        
                                                    <input type="file" name="file" id="fileInputEdit" style="display: flex; color: steelblue; margin-left: 10px; ">
                                                    <div style="display: flex; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrlEdit"></p></div>
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

                                   </div>
                               </div>
                               <div class="tab-pane" id="analysisEdit" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="systemKdvEdit" class="form-label">Kdv Oranı  </label>
                                            <input class="form-control" type="text" id="systemKdvEdit" name="systemKdvEdit" placeholder="00,00">
                                           </div>
                                        <div class="col-6 mb-3">
                                            <label for="systemKdvTotalEdit" class="form-label">Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="systemKdvTotalEdit" name="systemKdvTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="systemKdvOtherEdit" class="form-label">KDV Hariç Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="systemKdvOtherEdit" name="systemKdvOtherEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="systemCommissionEdit" class="form-label">Sistem Komisyonu  </label>
                                            <a href="https://magazadestek.n11.com/s/komisyon-oranlari"  >Komisyonu Bak</a>
                                            <input class="form-control" type="text" id="systemCommissionEdit" name="systemCommissionEdit" placeholder="00,00">
                                           </div>
                                        <div class="col-6 mb-3">
                                            <label for="systemCommissionTotalEdit" class="form-label">Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="systemCommissionTotalEdit" name="systemCommissionTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="shippingCostEdit" class="form-label">Kargo Maliyeti</label>
                                            <input class="form-control" type="text" id="shippingCostEdit" name="shippingCostEdit" placeholder="00,00">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="shippingCostTotalEdit" class="form-label">Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="shippingCostTotalEdit" name="shippingCostTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="sellerNetPrice" class="form-label">Satıcının Eline Geçen Tutar </label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="sellerNetPrice" name="sellerNetPrice" placeholder="00,00" disabled="">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="salesProfitRateEdit" class="form-label">Satış Kar Oranı</label>
                                            <input class="form-control" type="text" id="salesProfitRateEdit" name="salesProfitRateEdit" placeholder="00,00">
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="salesProfitRateTotalEdit" class="form-label">Kar Düşüldükten Sonra Kalan [ Ürün Maliyeti ] </label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="salesProfitRateTotalEdit" name="salesProfitRateTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="productBrutVatEdit" class="form-label">Ürün Satış  Brüt Karı </label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="productBrutVatEdit" name="productBrutVatEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="inventoryCostEdit" class="form-label">Depo Maliyeti</label>
                                            <input class="form-control" type="text" id="inventoryCostEdit" name="inventoryCostEdit" placeholder="00,00">
                                        </div>
                                        
                                        <div class="col-6 mb-3">
                                            <label for="inventoryCostTotalEdit" class="form-label">Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="inventoryCostTotalEdit" name="inventoryCostTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="profitTaxEdit" class="form-label">KV ve KDV </label>
                                            <input class="form-control" type="text" id="profitTaxEdit" name="profitTaxEdit" placeholder="00,00">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="profitTaxTotalEdit" class="form-label">Tutar</label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="profitTaxTotalEdit" name="profitTaxTotalEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="otherCostTotarEdit" class="form-label">Diğer Maliyetlerin Toplamı </label>
                                            <input class="form-control bg-light border-0 col-8" type="text" id="otherCostTotarEdit" name="otherCostTotarEdit" placeholder="00,00" disabled="">
                                        </div>
                                    </div>
                                  
                                    <hr>
                                    <div class="col-12 mb-3">
                                        <label for="netProfitEdit" class="form-label">Ürün Net Satış Kar'ı </label>
                                        <input class="form-control bg-light border-0 col-8" type="text" id="netProfitEdit" name="netProfitEdit" placeholder="00,00" disabled="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="netProfitPercEdit" class="form-label">Satılan Ürünün Karlılık Yüzdesi (%)</label>
                                        <input class="form-control bg-light border-0 col-8" type="text" id="netProfitPercEdit" name="netProfitPercEdit" placeholder="00,00" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="productPriceEdit" class="form-label">Teklif Alınan Fiyat </label>
                                            <input class="form-control" type="text" id="productPriceEdit" name="productPriceEdit" placeholder="00,00" disabled>
                                        </div>
                                    </div>
                             </div>
                            </div>
                           
                   
                        </div>
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#edit_modal").modal('hide');}  >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item" data_stockNumber=""  >@lang('admin.Update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Güncelle  Son -->
 
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
  

   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('admin.AnalysisList') </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/analysis/product/list/@lang('admin.lang')">@lang('admin.AnalysisList')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.AnalysisList')</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.AnalysisList')</p> <p> | {{count($DB_Find)}}</p> 

                               
                                    <!---  Loading --->
                                    <div id="loader" style="display:block;" ><span class="d-flex align-items-center">
                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                        <span class="flex-grow-1 ms-2">  @lang('admin.Loading') </span>
                                    </span> </div>
                                    <div id="uploadStatus"></div>
                                    <!--- End Loading --->

                                </h5>
                                <div class="flex-shrink-0">
                                    <div class="flax-shrink-0 hstack gap-2">
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
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
                                    <!--end Arama Takvim-->

                                    <!-- Arama Durum -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectProduct" class="form-label">Ürün Seçiniz</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectProduct">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_Product); $i++)
                                             <option value="{{$DB_Find_Product[$i]->id}}">{{$DB_Find_Product[$i]->nameTr}}</option>
                                            @endfor

                                        </select>
                                    </div>
                                    <!--end Arama Durum  -->

                                  
                             
                                
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
                                        </select>
                                    </div>
                                    <!--- Filtreleme Son -->


                                    <!--- Button -->
                                    <button type="button" class="btn btn-success bg-gradient waves-effect waves-light" style="padding: inherit;" id="update_checkedItems" >@lang('admin.Update')</button>


                                </div>

                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light text-muted">
                                            <tr style="cursor:pointer;" >
                                            
                                                <!---- Tümü Seç --->
                                                <th exportname="Check" style="margin: auto;" ><input style="cursor:pointer;" type="checkbox" id="showAllRows" value="all" data_value=""></th>

                                                <th exportname="Id" class="sort" data-sort="type" scope="col" id="checkItemBox"  >Id</th>
                                                <th exportname="CreatedDate" class="sort" data-sort="order_date" scope="col" >@lang('admin.createdDate')</th>
                                                <th exportname="Image" >@lang('admin.Image')</th>

                                                <th exportname="NameTr" >@lang('admin.name')</th>
                                                <th exportname="GTIP" >GTIP</th>
                                                <th exportname="Pratform" >Pratform</th>

                                                <th exportname="Currency" >@lang('admin.Currency')</th>

                                                <th exportname="Price" >Teklif Alınan Fiyat</th>
                                                <th exportname="PlatformPrice" >Platform Fiyat</th>
                                                <th exportname="NetPrice" >Alınması Gereken Fiyat</th>
                                                <th exportname="StatusPrice" >Durum</th>

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
                                                    <td exportname="Check"  id="checkItemCol" class="c-table__cell"><input id="checkItem" style="cursor:pointer;" type="checkbox" data_check_id="{{$DB_Find[$i]->id}}" > </td>

                                                    <td exportname="Id" id="itemID" class="type"> {{$DB_Find[$i]->id}}</td>
                                                    <td exportname="CreatedDate" class="order_date"> {{$DB_Find[$i]->created_at}}</td>
                                                   
                                                    <!---- Resim --->
                                                    <td exportname="Image" id="listItemImageBox" class="c-table__cell" style="width: 100px; cursor:pointer;" > <img src="{{asset($DB_Find[$i]->product_imgUrl)}}" data-bs-toggle="modal" data-bs-target="#modalImage" data-id="{{$DB_Find[$i]->id}}" data-src="{{$DB_Find[$i]->product_imgUrl}}"  alt="" class="avatar-xs rounded-circle me-2" data-toggle="modal" data-target="#modalImage" ></td>
                                                   
                                                    <td exportname="NameTr" > {{$DB_Find[$i]->nameTr}}</td>
                                                    <td exportname="GTIP" > {{$DB_Find[$i]->gtipNo}}</td>
                                                    <td exportname="Pratform" > 
                                                        @if($DB_Find[$i]->pratform_id == "0") <span class="badge badge-soft-danger text-uppercase">Seçilmedi</span>
                                                        @elseif($DB_Find[$i]->pratform_id == "1") N11.com 
                                                        @elseif($DB_Find[$i]->pratform_id == "2") Hepsiburada.com
                                                        @elseif($DB_Find[$i]->pratform_id == "3") Trendyol.com
                                                        @elseif($DB_Find[$i]->pratform_id == "4") Ebay.com 
                                                        @elseif($DB_Find[$i]->pratform_id == "5") Amazon.com 
                                                        @elseif($DB_Find[$i]->pratform_id == "6") Diğer
                                                        @endif
                                                    </td>

                                                    <td exportname="Currency" > {{$DB_Find[$i]->currency}}</td>

                                                    <td exportname="Price" > {{$DB_Find[$i]->productPrice}}</td>
                                                    <td exportname="PlatformPrice" > {{$DB_Find[$i]->price}}</td>
                                                    <td exportname="NetPrice" > {{$DB_Find[$i]->netPrice}}</td>
                                                    <td exportname="StatusPrice" >
                                                       @if($DB_Find[$i]->productPrice <= $DB_Find[$i]->netPrice   ) <span class="badge badge-soft-success text-uppercase" > Uygun</span>
                                                       @elseif($DB_Find[$i]->productPrice > $DB_Find[$i]->netPrice   ) <span class="badge badge-soft-danger text-uppercase">Uygun Değil</span>
                                                       @endif
                                                    </td>
                                                  

                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                           <li class="list-inline-item edit" title ="@lang('admin.Update')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#edit_modal" data-id="{{$DB_Find[$i]->id}}"  class="text-primary d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"><i class="ri-pencil-fill fs-16"></i> </button></a> </li>
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

            <!------- List --->
            <script src="{{asset('/assets/admin')}}/js/analysisList.js"></script>

        </footer>