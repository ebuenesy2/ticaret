<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.CostCalculationList') | {{ config('admin.Admin_Title') }}</title>
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
    <div class="modal_new fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                     <button type="button" class="btn-close" onclick={$("#AddModal").modal('hide');} ></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="col-12 mb-3"> 
                            <label for="TitleAdd" class="form-label">@lang('admin.Title')</label>
                            <input class="form-control" type="text" id="TitleAdd" name="TitleAdd" placeholder="@lang('admin.Title')">
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="mb-3" >
                                    <label for="selectGetOffers" class="form-label">Teklif Formu Seç</label>
                                    <select class="form-select"  id="selectGetOffers">
                                        <option value="">Teklif Formu Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_get_offers); $i++) <option value="{{$DB_Find_get_offers[$i]->id}}" >{{$DB_Find_get_offers[$i]->title}}</option>  @endfor
                                    </select>
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="CurrencyAdd" class="form-label">@lang('admin.Currency')</label>
                                    <select class="form-control"  name="choices-single-default2" id="CurrencyAdd" disabled>
                                        <option value="" selected >@lang('admin.Currency')</option>
                                        <option value="Euro">Euro</option>
                                        <option value="Dolar">Dolar</option>
                                        <option value="TL" >TL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3"> 
                                    <label for="CurrencyRateAdd" class="form-label">@lang('admin.CurrencyRate')</label>
                                    <input class="form-control" type="text" id="CurrencyRateAdd" name="CurrencyRateAdd" placeholder="@lang('admin.CurrencyRate')">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="paymentMethodAdd" class="form-label"  >Ödeme Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="paymentMethodAdd" disabled >
                                            <option value="" selected>Şeç</option>
                                            @for ($i = 0; $i < count($DB_Find_ödemeSekli); $i++) <option value="{{$DB_Find_ödemeSekli[$i]->id}}" data_value="{{$DB_Find_ödemeSekli[$i]->title}}" >{{$DB_Find_ödemeSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="vendorDeliveryTypeAdd" class="form-label">Satıcı Teslim Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="vendorDeliveryTypeAdd" disabled >
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_teslimSekli); $i++) <option value="{{$DB_Find_teslimSekli[$i]->id}}"  data_value="{{$DB_Find_teslimSekli[$i]->title}}"  >{{$DB_Find_teslimSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                                <label for="packagingType" class="form-label">Ambalajlama ve Paketleme Şekli</label>
                                                <input type="text" class="form-control" id="packagingType" placeholder="" value=""  disabled >
                                            </div>
                                    <div class="mb-3">
                                        <label for="specialPermitAdd" class="form-label">Özel İzne Tabi Mi ?</label>
                                        <input type="text" class="form-control" id="specialPermitAdd" placeholder="" value="" disabled >
                                    </div>
                                   
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 d-none">
                                        <label for="SectorAdd" class="form-label">Sektor</label>
                                        <select class="form-control"  name="choices-single-default2" id="SectorAdd" disabled >
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_sektor); $i++) <option value="{{$DB_Find_sektor[$i]->id}}" data_value="{{$DB_Find_sektor[$i]->title}}" >{{$DB_Find_sektor[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="modeofTransportAdd" class="form-label">Nakliyet Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="modeofTransportAdd" disabled > 
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_nakliyatSekli); $i++) <option value="{{$DB_Find_nakliyatSekli[$i]->id}}" data_value="{{$DB_Find_nakliyatSekli[$i]->title}}"  >{{$DB_Find_nakliyatSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="shipmentTypeAdd" class="form-label">Sevk Şekli</label>
                                        <select class="form-control"  name="choices-single-default2" id="shipmentTypeAdd" disabled >
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_sevkSekli); $i++) <option value="{{$DB_Find_sevkSekli[$i]->id}}" data_value="{{$DB_Find_sevkSekli[$i]->title}}"  >{{$DB_Find_sevkSekli[$i]->title}}</option> @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="intertekAdd" class="form-label">İntertek Tabi Mi ?</label>
                                        <select class="form-control"  name="choices-single-default2" id="intertekAdd"  >
                                            <option value="" selected>Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_intertekTabi); $i++) <option value="{{$DB_Find_intertekTabi[$i]->id}}" data_value="{{$DB_Find_intertekTabi[$i]->title}}" >{{$DB_Find_intertekTabi[$i]->title}}</option> @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#AddModal").modal('hide');}>@lang('admin.Close')</button>
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

   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('admin.CostCalculationList') </h4>
                    <p id="borsaInfo"  data_eur="{{$DB_Find_Borsa['EUR']['Satış']}}"  data_usd="{{$DB_Find_Borsa['USD']['Satış']}}"  style="display:none;" >Borsa Bilgileri</p>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/cost/calculation/list/@lang('admin.lang')">@lang('admin.CostCalculationList')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.CostCalculationList')</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.CostCalculationList')</p> <p> | {{count($DB_Find)}}</p> 
                                
                                    <!---  Loading --->
                                    <div id="LoadingFirstDb" style="display:block;" ><span class="d-flex align-items-center">
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
                                        <label for="selectCostCalculationCheck" class="form-label">Onaylama Durumu</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectCostCalculationCheck">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="Bekleme">Bekleme</option>
                                            <option value="Evet">Evet</option>
                                            <option value="Hayır">Hayır</option>
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
                                            <option style="cursor: pointer;" value="active">@Lang('admin.Active')</option>
                                            <option style="cursor: pointer;" value="passive">@Lang('admin.Passive')</option>
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
                                                <th exportname="getCode">Maliyet Kodu</th>
                                             
                                                <th exportname="Title" >@lang('admin.Title')</th>
                                                <th exportname="Currency" >@lang('admin.Currency')</th>
                                                <th exportname="CurrencyRateAdd" class="sort" data-sort="order_value" scope="col" >@lang('admin.CurrencyRate')</th>
                                                
                                                <th exportname="Status" class="sort status" data-sort="status" scope="col" id="tableStatusTh" > Onaylama Durumu </th>
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
                                                    <td exportname="getCode" > {{$DB_Find[$i]->	costCalculationCode}}</td>

                                                    <td exportname="Title" > {{$DB_Find[$i]->title}}</td>
                                                  
                                                    <td exportname="Currency" > {{$DB_Find[$i]->currency}}</td>
                                                    <td exportname="CurrencyRateAdd" class="order_value"> {{$DB_Find[$i]->currency_rate}}</td>
                                                
                                                    <td exportname="Status" class="status" id="tableStatus" data_val="{{$DB_Find[$i]->isActive}}">
                                                        @if($DB_Find[$i]->costCalculationCheck == "Evet")  <span class="badge badge-soft-success text-uppercase" >Evet</span>
                                                        @elseif($DB_Find[$i]->costCalculationCheck == "Hayır")  <span class="badge badge-soft-danger text-uppercase">Hayır</span>
                                                        @elseif($DB_Find[$i]->costCalculationCheck == "Bekleme")  <span class="badge badge-soft-info text-uppercase">Bekleme</span>
                                                        @endif
                                                    </td>

                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item edit"  title ="@lang('admin.Update')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"> <a href="/cost/calculation/@lang('admin.lang')/update/{{$DB_Find[$i]->id}}" class="text-info d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i> </button> </a> </li>
                                                            <li class="list-inline-item" title ="@lang('admin.Delete')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Remove" style="cursor:pointer;" > <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" data_id="{{$DB_Find[$i]->id}}" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data_id="{{$DB_Find[$i]->id}}" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> </li>
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
            <script src="{{asset('/assets/admin')}}/js/cost_calculation_list.js"></script>

        </footer>