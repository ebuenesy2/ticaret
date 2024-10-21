<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.GetOffers') @lang('admin.List') | {{ config('admin.Admin_Title') }}</title>
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
    
    <!-- Modal Ekle -->
    <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">                       
                        <div class="col-12 mb-3"> 
                            <label for="TitleAdd" class="form-label">@lang('admin.Title')</label>
                            <input class="form-control" type="text" id="TitleAdd" name="TitleAdd" placeholder="@lang('admin.Title')">
                        </div>
                        <div class="col-12 mb-3" >
                            <label for="selectRequestFormAdd" class="form-label">Talep Formu Seç</label>
                            <select class="form-select"  id="selectRequestFormAdd">
                                <option value="">Talep Formu Seç</option>
                                @for ($i = 0; $i < count($DB_Find_requestform); $i++) <option value="{{$DB_Find_requestform[$i]->id}}" >{{$DB_Find_requestform[$i]->requestFormTitle}}</option>  @endfor
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="new_add">@lang('admin.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ekle  Son -->

   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tedarik Talep Formu  </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/get/offers/list">Tedarik Talep Formu </a></li>
                            <li class="breadcrumb-item active">Tedarik Talep Formu  </li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >Tedarik Talep Formu   </p> <p> | {{count($DB_Find)}}</p> 
                               
                                    <!---  Loading --->
                                    <div id="loader" style="display:block;" ><span class="d-flex align-items-center">
                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                        <span class="flex-grow-1 ms-2">  @lang('admin.Loading') </span>
                                    </span> </div>
                                    <div id="uploadStatus"></div>
                                    <!--- Son Loading --->

                                </h5>
                                <div class="flex-shrink-0">
                                    <div class="flax-shrink-0 hstack gap-2">
                                       <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <div class="d-flex gap-1 flex-lg-row flex-md-column">

                                    <!-- Arama id -->
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="searhId_Table" class="form-label">ID</label>
                                        <div class="search-box">
                                            <input type="text" class="form-control search" id="searhId_Table" placeholder="@lang('admin.searchById')">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!-- Arama id Son -->
                                    
                                    <!-- Arama Takvim-->
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="exampleInputdate" class="form-label">Oluşturma Zamanı</label>
                                        <input type="date" class="form-control" id="exampleInputdate"  style="cursor: pointer;"> 
                                    </div>
                                    <!--son Arama Takvim-->

                                    <!-- Arama Durum -->
                                    <div class="col-lg-2 col-md-12 mb-md-3 d-none"> 
                                        <label for="selectActive" class="form-label">Durum Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectActive">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="1">@lang('admin.Active')</option>
                                            <option value="0">@lang('admin.Passive')</option>
                                        </select>
                                    </div>
                                    <!--son Arama Durum  -->

                                    <!-- Arama Cari Kart -->
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="selectCurrentCart" class="form-label"> Cari Kart Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectCurrentCart">
                                            <option value=""> @lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_current_cart); $i++) <option value="{{$DB_Find_current_cart[$i]->id}}" >{{$DB_Find_current_cart[$i]->current_name}}</option>  @endfor
                                        </select>
                                    </div>
                                    <!--son Arama  Cari Kart  -->

                                    <!-- Arama Talep -->
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="selectActive" class="form-label">Talep Formu Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectRequestForm">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_requestform); $i++) <option value="{{$DB_Find_requestform[$i]->id}}" >{{$DB_Find_requestform[$i]->requestFormTitle}}</option>  @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Talep  -->
                                </div>
                                <div class="d-flex gap-1 flex-lg-row flex-md-column">

                                    <!-- Arama Sevk Şekli -->
                                    <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectshipmentType" class="form-label">Sevk Şekli Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectshipmentType">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_sevkSekli); $i++) <option value="{{$DB_Find_sevkSekli[$i]->id}}" data_title="{{$DB_Find_sevkSekli[$i]->title}}" >{{$DB_Find_sevkSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Sevk Şekli  -->

                                    <!-- Arama Satıcı Teslim Şekli -->
                                    <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectVendorDeliveryType" class="form-label">Satıcı Teslim Şekli Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectVendorDeliveryType">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_teslimSekli); $i++) <option value="{{$DB_Find_teslimSekli[$i]->id}}" data_title="{{$DB_Find_teslimSekli[$i]->title}}"  >{{$DB_Find_teslimSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Satıcı Teslim Şekli  -->

                                    <!-- Arama Ödeme Şekli -->
                                    <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectPaymentMethod" class="form-label">Ödeme Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectPaymentMethod">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_ödemeSekli); $i++) <option value="{{$DB_Find_ödemeSekli[$i]->id}}" data_title="{{$DB_Find_ödemeSekli[$i]->title}}" >{{$DB_Find_ödemeSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Ödeme Şekli  -->

                                    <!-- Arama Nakliyet Şekli -->
                                    <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectModeofTransport" class="form-label">Nakliyet Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectModeofTransport">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_nakliyatSekli); $i++) <option value="{{$DB_Find_nakliyatSekli[$i]->id}}" data_title="{{$DB_Find_nakliyatSekli[$i]->title}}"  >{{$DB_Find_nakliyatSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Nakliyet Şekli  -->

                                     <!-- Arama İntertek Tabi Mi  -->
                                     <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectIntertek" class="form-label">İntertek Tabi Mi Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectIntertek">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_intertekTabi); $i++) <option value="{{$DB_Find_intertekTabi[$i]->id}}" data_title="{{$DB_Find_intertekTabi[$i]->title}}"  >{{$DB_Find_intertekTabi[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <!--son Arama İntertek Tabi Mi   -->

                                    

                                </div>
                                <div class="d-flex gap-1 flex-lg-row flex-md-column">

                                    <!-- Arama Ürün -->
                                    <div class="col-lg-2 col-md-12 mb-md-3" style="display: {{$isRequestFormId ? 'block' : 'none'}}"> 
                                        <label for="selectRequestFormProduct" class="form-label">Ürün Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectRequestFormProduct">
                                            <option value="">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_requestform_product_list); $i++) <option value="{{$DB_Find_requestform_product_list[$i]->id}}" >{{$DB_Find_requestform_product_list[$i]->nameTr}}</option>  @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Ürün  -->

                                </div>
                                <div class="d-flex column"> </div>
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
                                                <th exportname="getCode"  scope="col" >Teklif Kodu</th>

                                                <th exportname="title"  scope="col" >@lang('admin.Title')</th>
                                                <th exportname="currentCardName" >Cari Kart Adı</th>
                                                <th exportname="requestformTitle" >Talep Adı</th>
                                                

                                                <th exportname="offerEffectiveDate" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Geçerlilik Tarihi</th>
                                                <th exportname="delivery_at" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Teslim Tarihi</th>
                                                <th exportname="deliveryLocation" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Teslim Yeri</th>
                                                <th exportname="shipmentType" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Sevk Şekli</th>

                                                <th exportname="vendorDeliveryType" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Satıcı Teslim Şekli</th>
                                                <th exportname="paymentMethod" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Ödeme Şekli</th>
                                                <th exportname="modeofTransport" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Nakliyet Şekli</th>
                                                <th exportname="intertek" style="display: {{ $isRequestFormId ? '' : 'none'}}" >İntertek Tabi Mi</th>
                                             
                                                <th exportname="productCurrency" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Para Birimi</th>
                                                <th exportname="productTotal" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Tedarikçi Toplam Fiyat</th>
                                                <th exportname="productTotal" style="display: {{ $isRequestFormId ? '' : 'none'}}" >Hesaplanan Toplam Fiyat</th>

                                                <th exportname="ProductTitle" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >  @lang('admin.ProductTitle')</th>

                                                <th exportname="productModel" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >@lang('admin.ProductModel')</th>
                                                <th exportname="brand" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >@lang('admin.Brand')</th>
                                                <th exportname="colorCode" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >@lang('admin.ColorCode')</th>
                                                <th exportname="productCode" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >@lang('admin.ProductCode')</th>

                                                <th exportname="quantity" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >Miktar</th>
                                                <th exportname="quantityType" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >Miktar Türü</th>
                                                <th exportname="price" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >Birim Fiyat</th>
                                                <th exportname="currency" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >@lang('admin.Currency')</th>
                                                <th exportname="total" style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >Toplam Fiyat</th>
                                            

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
                                                    
                                                    <td exportname="Id" id="itemID" class="type"> {{$DB_Find[$i]->id}}</td>
                                                    <td exportname="CreatedDate" class="order_date"> {{$DB_Find[$i]->created_at}}</td>
                                                    <td exportname="getCode" class="order_date"> {{$DB_Find[$i]->getOfferNo}}</td>

                                                    <td exportname="title" class="order_date"> {{$DB_Find[$i]->title}}</td>
                                                    <td exportname="currentCardName" >{{$DB_Find[$i]->current_name}}</td>
                                                    <td exportname="requestformTitle" >{{$DB_Find[$i]->requestFormTitle}}</td>

                                                    <td exportname="offerEffectiveDate" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->offerEffectiveDate}} </td>
                                                    <td exportname="delivery_at" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->delivery_at}} </td>
                                                    <td exportname="deliveryLocation" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->deliveryLocation}} </td>
                                                    <td exportname="shipmentType" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->shipmentType_title}} </td>

                                                    <td exportname="vendorDeliveryType" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->vendorDeliveryType_Title}} </td>
                                                    <td exportname="paymentMethod" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->paymentMethod_Title}} </td>
                                                    <td exportname="modeofTransport" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->modeofTransport_Title}} </td>
                                                    <td exportname="intertek" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->intertek_Title}} </td>

                                                    <td exportname="productCurrency" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->currency}} </td>
                                                    <td exportname="productTotal" style="display: {{ $isRequestFormId ? '' : 'none'}}" > {{$DB_Find[$i]->productTotal}} </td>
                                                    <td exportname="productTotal" style="display: {{ $isRequestFormId ? '' : 'none'}}" > 65445 </td>

                                                    <td exportname="ProductTitle" style="display: {{ isset($DB_Find[$i]->nameTr) ? '' : 'none'}}" >    {{ isset($DB_Find[$i]->nameTr) ? $DB_Find[$i]->nameTr : 'yok'}} </td>

                                                    <td exportname="productModel"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->productModel) ? $DB_Find[$i]->productModel : 'yok'}}</td>
                                                    <td exportname="brand"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->brand) ? $DB_Find[$i]->brand : 'yok'}}</td>
                                                    <td exportname="colorCode"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->colorCode) ? $DB_Find[$i]->colorCode : 'yok'}}</td>
                                                    <td exportname="productCode"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->productCode) ? $DB_Find[$i]->productCode : 'yok'}}</td>

                                                    <td exportname="quantity"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->stockCount) ? $DB_Find[$i]->stockCount : 'yok'}}</td>
                                                    <td exportname="quantityType"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->stockUnit) ? $DB_Find[$i]->stockUnit : 'yok'}}</td>
                                                    <td exportname="price"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->price) ? $DB_Find[$i]->price : 'yok'}}</td>
                                                    <td exportname="currency"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->currency) ? $DB_Find[$i]->currency : 'yok'}}</td>
                                                    <td exportname="total"  style="display: {{ $isRequestFormProductId ? '' : 'none'}}" >{{ isset($DB_Find[$i]->total) ? $DB_Find[$i]->total : 'yok'}}</td>
                                                  
                                                
                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                          <li class="list-inline-item edit"  title ="@lang('admin.Edit')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"> <a href="/get/offers/@lang('admin.lang')/edit/{{$DB_Find[$i]->id}}" class="text-info d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i> </button> </a> </li>
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
                                        <a class="page-item pagination-prev disabled" href="#"> @lang('admin.Back') </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#"> @lang('admin.Next') </a>
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
            <script src="{{asset('/assets/admin')}}/js/getOffers/getOffersListAll.js"></script>

        </footer>