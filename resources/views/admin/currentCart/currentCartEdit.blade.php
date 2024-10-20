<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.CurrentCard')  - @lang('admin.Edit') | {{ config('admin.Admin_Title') }}</title>
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


    <!-- Modal Arama -->
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
                            <label for="CurrencyCartIDSearch" class="form-label">@lang('admin.CurrencyCartID')</label>
                            <input class="form-control" type="number" id="CurrencyCartIDSearch" name="CurrencyCartIDSearch" placeholder="@lang('admin.CurrencyCartID')" disabled >
                        </div>

                        
                        <div class="col-lg-12 mb-3">
                            <label for="bankaAccountTitleSearch" class="form-label">Banka Hesap Adı</label>
                            <input class="form-control" type="text" id="bankaAccountTitleSearch" name="bankaAccountTitleSearch" placeholder="Banka Hesap Adı" disabled>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="BankTitleSearch" class="form-label">@lang('admin.BankTitle')</label>
                            <input class="form-control" type="text" id="BankTitleSearch" name="BankTitleSearch" placeholder="@lang('admin.BankTitle')" disabled >
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="BranchSearch" class="form-label">@lang('admin.Branch')</label>
                            <input class="form-control" type="text" id="BranchSearch" name="BranchSearch" placeholder="@lang('admin.Branch')" disabled >
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="AcountNumberSearch" class="form-label">@lang('admin.AcountNumber')</label>
                            <input class="form-control" type="text" id="AcountNumberSearch" name="AcountNumberSearch" placeholder="@lang('admin.AcountNumber')" disabled >
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="IbanSearch" class="form-label">@lang('admin.Iban')</label>
                            <input class="form-control" type="text" id="IbanSearch" name="IbanSearch" placeholder="@lang('admin.Iban')" disabled >
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="SwiftSearch" class="form-label">@lang('admin.Swift')</label>
                            <input class="form-control" type="text" id="SwiftSearch" name="SwiftSearch" placeholder="@lang('admin.Swift')" disabled >
                        </div>
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Arama  Son -->

    <!-- Modal Güncelle -->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="update_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">

                   <!---  Loading --->
                    <div id="loaderEdit" style="display:block;" ><span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status"></span>
                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                    </span> </div>
                    <!--- Son Loading --->

                    <!---  ModalBodyInfoBody --->
                    <div class="modal-body" id="ModalBodyInfoEdit" style="display:none;" >
                        <div class="mb-3" style="display:none;" > 
                            <label for="CurrencyCartIDEdit" class="form-label">@lang('admin.CurrencyCartID')</label>
                            <input class="form-control" type="number" id="CurrencyCartIDEdit" name="nameEdit" placeholder="@lang('admin.CurrencyCartID')"  value="{{$DB_Find->current_name}}" >
                        </div>
                        
                        <div class="col-lg-12 mb-3">
                            <label for="bankaAccounttitleEdit" class="form-label">Banka Hesap Adı</label>
                            <input class="form-control" type="text" id="bankaAccounttitleEdit" name="bankaAccounttitleEdit" placeholder="Banka Hesap Adı">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="BanktitleEdit" class="form-label">@lang('admin.BankTitle')</label>
                            <input class="form-control" type="text" id="BanktitleEdit" name="BanktitleEdit" placeholder="@lang('admin.BankTitle')">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="BranchUpdate" class="form-label">@lang('admin.Branch')</label>
                            <input class="form-control" type="text" id="BranchUpdate" name="BranchUpdate" placeholder="@lang('admin.Branch')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="AcountNumberUpdate" class="form-label">@lang('admin.AcountNumber')</label>
                            <input class="form-control" type="text" id="AcountNumberUpdate" name="AcountNumberUpdate" placeholder="@lang('admin.AcountNumber')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="IbanUpdate" class="form-label">@lang('admin.Iban')</label>
                            <input class="form-control" type="text" id="IbanUpdate" name="IbanUpdate" placeholder="@lang('admin.Iban')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="SwiftUpdate" class="form-label">@lang('admin.Swift')</label>
                            <input class="form-control" type="text" id="SwiftUpdate" name="SwiftUpdate" placeholder="@lang('admin.Swift')">
                        </div>
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="data_bank_update">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Güncelle  Son -->

    <!-- Modal Ekle -->
    <div class="modal fade" id="Edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.newAdd')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="mb-3" style="display:none;"  > 
                            <label for="CurrencyCartIDEdit" class="form-label">@lang('admin.CurrencyCartID')</label>
                            <input class="form-control" type="number" id="CurrencyCartIDEdit" name="nameEdit" placeholder="@lang('admin.CurrencyCartID')" value="{{$DB_Find->id}}" >
                        </div>

                        
                        <div class="col-lg-12 mb-3">
                            <label for="bankaAccountTitleEdit" class="form-label">Banka Hesap Adı</label>
                            <input class="form-control" type="text" id="bankaAccountTitleEdit" name="bankaAccountTitleEdit" placeholder="Banka Hesap Adı">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="BankTitleEdit" class="form-label">@lang('admin.BankTitle')</label>
                            <input class="form-control" type="text" id="BankTitleEdit" name="BankTitleEdit" placeholder="@lang('admin.BankTitle')">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="BranchEdit" class="form-label">@lang('admin.Branch')</label>
                            <input class="form-control" type="text" id="BranchEdit" name="BranchEdit" placeholder="@lang('admin.Branch')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="AcountNumberEdit" class="form-label">@lang('admin.AcountNumber')</label>
                            <input class="form-control" type="text" id="AcountNumberEdit" name="AcountNumberEdit" placeholder="@lang('admin.AcountNumber')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="IbanEdit" class="form-label">@lang('admin.Iban')</label>
                            <input class="form-control" type="text" id="IbanEdit" name="IbanEdit" placeholder="@lang('admin.Iban')">
                        </div>

                        <div class="col-lg-12 mb-3"> 
                            <label for="SwiftEdit" class="form-label">@lang('admin.Swift')</label>
                            <input class="form-control" type="text" id="SwiftEdit" name="SwiftEdit" placeholder="@lang('admin.Swift')">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="new_bank_Edit">@lang('admin.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ekle  Son -->

    <!-- Page-content -->
    <div class="page-content">
       <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cari Kart #{{$DB_Find->id}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/current/cart/list">@lang('admin.CurrentCardList')</a></li>
                                <li class="breadcrumb-item active">Cari Kart #{{$DB_Find->id}}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!--  row -->
            <div class="row">
                <div class="col-lg-8">

                    <!-- Cari Kart Bilgileri --->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">@lang('admin.CurrentCardInformation')</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="currentNameEdit">@lang('admin.CurrentName')</label>
                                <input type="text" class="form-control" id="currentNameEdit" placeholder="@lang('admin.CurrentName')" value="{{$DB_Find->current_name}}" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="ShortNameEdit">@lang('admin.ShortName')</label>
                                <input type="text" class="form-control" id="ShortNameEdit" placeholder="@lang('admin.ShortName')" value="{{$DB_Find->short_name}}" >
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="DescriptionEdit">@lang('admin.Description')</label>
                                <textarea  class="form-control" id="DescriptionEdit" rows="3" cols="40">{!!$DB_Find->description!!}</textarea>
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                     <!-- Cari Kart Bilgileri Son --->

                    <!-- Cari Kart  Adres --->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">@lang('admin.adress')</h5>
                        </div>
                        <div class="card-body row">

                           <div class="col-lg-3 mb-3">
                                <label class="form-label" for="CountryEdit">@lang('admin.Country')</label>
                                <input type="text" class="form-control" id="CountryEdit" placeholder="@lang('admin.Country')" value="{{$DB_Find->country}}" >
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="CityEdit">@lang('admin.City')</label>
                                <input type="text" class="form-control" id="CityEdit" placeholder="@lang('admin.City')" value="{{$DB_Find->city}}" >
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="DitsrictEdit">@lang('admin.Ditsrict')</label>
                                <input type="text" class="form-control" id="DitsrictEdit" placeholder="@lang('admin.Ditsrict')" value="{{$DB_Find->district}}" >
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="PostCodeEdit">@lang('admin.PostCode')</label>
                                <input type="text" class="form-control" id="PostCodeEdit" placeholder="@lang('admin.PostCode')" value="{{$DB_Find->post_code}}" >
                            </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="TelEdit1">Tel 1 </label>
                                <input type="text" class="form-control" id="TelEdit1" placeholder="Tel 1" value="{{$DB_Find->tel1}}" >
                           </div>
                            
                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="TelEdit2">Tel 2 </label>
                                <input type="text" class="form-control" id="TelEdit2" placeholder="Tel 2" value="{{$DB_Find->tel2}}" >
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="FaxEdit1">Fax 1 </label>
                                <input type="text" class="form-control" id="FaxEdit1" placeholder="Fax 1" value="{{$DB_Find->fax1}}" >
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="WebEdit">Web</label>
                                <input type="text" class="form-control" id="WebEdit" placeholder="Web" value="{{$DB_Find->web_address}}" >
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="EmailEdit">Email </label>
                                <input type="text" class="form-control" id="EmailEdit" placeholder="Email" value="{{$DB_Find->email}}" >
                           </div>
                        
                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="EmailCCEdit">Email Cc</label>
                                <input type="text" class="form-control" id="EmailCCEdit" placeholder="Email Cc" value="{{$DB_Find->email_cc}}" >
                           </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="tax_administration">Vergi Dairesi</label>
                                <input type="text" class="form-control" id="tax_administration" placeholder="Vergi Dairesi" value="{{$DB_Find->tax_administration}}" >
                           </div>

                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="tax_number">Vergi No</label>
                                <input type="text" class="form-control" id="tax_number" placeholder="Vergi No" value="{{$DB_Find->tax_number}}" >
                           </div>

                         

                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="adressEdit">@lang('admin.adress')</label>
                                <textarea  class="form-control" id="adressEdit" rows="3" cols="50">{!!$DB_Find->address!!}</textarea>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="InvoiceAddressEdit">@lang('admin.InvoiceAddress')</label>
                                <textarea  class="form-control" id="InvoiceAddressEdit" rows="3" cols="50">{!!$DB_Find->billing_address!!}</textarea>
                            </div>

                        </div>
                    </div>
                    <!-- Cari Kart  Adres Son --->

                    <!-- Banka Bilgileri  --->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between ">
                            <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.Bank') @lang('admin.List')</p> <p> | {{count($DB_Find_Bank)}}</p> </h5>
                            <button type="button" class="btn btn-primary Edit-btn" data-bs-toggle="modal" data-bs-target="#Edit_modal"><i class="ri-Edit-line align-bottom me-1"></i> @lang('admin.newAdd')</button>
                        </div>
                        <div class="card-body">

                            <div id="choosedPanel" style="border: 1px solid black;pEditing: 4px;display: flex;gap: 20px; margin-bottom: 23px; display:none; ">
                                

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
                                    <select id="choosedItemAction" class="form-select" style="height: 30px;border: 1px solid #dfe3e9;font-size: .875rem;width: 160px;pEditing: 4px;cursor: pointer;">
                                        <option style="cursor: pointer;" value="choose" selected>@lang('admin.Choose')</option>
                                        <option style="cursor: pointer;" value="active">@Lang('admin.Active')</option>
                                        <option style="cursor: pointer;" value="passive">@Lang('admin.Passive')</option>
                                        <option style="cursor: pointer;" value="delete">@Lang('admin.Delete')</option>
                                    </select>
                                </div>
                                <!--- Filtreleme Son -->


                                <!--- Button -->
                                <button type="button" class="btn btn-success bg-gradient waves-effect waves-light" style="pEditing: inherit;" id="update_checkedItems" >@lang('admin.Edit')</button>


                            </div>

                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light text-muted">
                                        <tr style="cursor:pointer;" >
                                            
                                                                                        
                                            <!---- Tümü Seç --->
                                            <th exportname="Check" style="margin: auto;" ><input style="cursor:pointer;" type="checkbox" id="showAllRows" value="all" data_value=""></th>

                                            <th exportname="Id" class="sort" data-sort="type" scope="col" id="checkItemBox"  >Id</th>
                                        
                                            <th exportname="bankaAccountTitle" >Banka Hesap Adı</th>
                                            <th exportname="bankTitle" >@lang('admin.BankTitle')</th>
                                            <th exportname="branch" >@lang('admin.Branch')</th>
                                            <th exportname="accountNumber" >@lang('admin.AcountNumber')</th>
                                            <th exportname="iban" >@lang('admin.Iban')</th>
                                            

                                            <th exportname="Status" class="sort status" data-sort="status" scope="col" id="tableStatusTh" >@lang('admin.Status')</th>
                                            <th exportname="Actions" >@lang('admin.Actions')</th>
                                        </tr>
                                    </thead>
                                    <!--end thead-->
                                    <tbody class="list form-check-all">

                                        <!--tr-->
                                        <tr style="display:none;"  id="tableConst" ><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> </tr>
                                        <!--end tr-->

                                        @for ($i = 0; $i < count($DB_Find_Bank); $i++)
                                            <tr>
                                                                                                
                                                <!---- Seç --->
                                                <td exportname="Check"  id="checkItemCol" class="c-table__cell"><input id="checkItem" style="cursor:pointer;" type="checkbox" data_check_id="{{$DB_Find_Bank[$i]->id}}" > </td>
                                                <td exportname="Id" id="itemID" class="type"> {{$DB_Find_Bank[$i]->id}}</td>
                                              
                                               
                                                <td exportname="bankaAccountTitle" >{{$DB_Find_Bank[$i]->bankaAccountTitle}}</td>
                                                <td exportname="bankTitle" >{{$DB_Find_Bank[$i]->bankTitle}}</td>
                                                <td exportname="branch" >{{$DB_Find_Bank[$i]->branch}}</td>
                                                <td exportname="accountNumber" >{{$DB_Find_Bank[$i]->accountNumber}}</td>
                                                <td exportname="iban" >{{$DB_Find_Bank[$i]->iban}}</td>
                                              
                                            
                                                <td exportname="Status" class="status" id="tableStatus" data_val="{{$DB_Find_Bank[$i]->isActive}}">
                                                    @if($DB_Find_Bank[$i]->isActive == 1)  <span class="badge badge-soft-success text-uppercase" >@lang('admin.Active')</span>
                                                    @elseif($DB_Find_Bank[$i]->isActive == 0)  <span class="badge badge-soft-danger text-uppercase">@lang('admin.Passive')</span>
                                                    @endif
                                                </td>

                                                <td exportname="Actions" id="listItemActionBox" > 
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item" title ="@lang('admin.Visibility')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View" style="cursor:pointer;" > @if($DB_Find_Bank[$i]->isActive == 1) <a class="view-item-btn text-success"><button class="btn btn-success waves-effect waves-light" style="width: 45px;height: 45px;"  id="listItemActive" data_id="{{$DB_Find_Bank[$i]->id}}" data_active="true"  ><i  class="ri-eye-fill align-bottom"  id="listItemActive" data_id="{{$DB_Find_Bank[$i]->id}}"  data_active="true" ></i></button></a>  @elseif($DB_Find_Bank[$i]->isActive == 0)  <a class="view-item-btn"><button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px;" id="listItemActive" data_id="{{$DB_Find_Bank[$i]->id}}" data_active="false" ><i class="ri-eye-off-fill align-bottom" id="listItemActive" data_id="{{$DB_Find_Bank[$i]->id}}"  data_active="false" ></i></button></a>  @endif </li>
                                                        <li class="list-inline-item" title ="@lang('admin.Search')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View"><a  data-bs-toggle="modal" data-bs-target="#searchModal" data-id="{{$DB_Find_Bank[$i]->id}}"  class="view-item-btn text-success" style="cursor:pointer;"><button class="btn btn-secondary  waves-effect waves-light" style="width: 45px;height: 45px;"><i class="ri-search-eye-line align-bottom "></i></button></a> </li> 
                                                        <li class="list-inline-item edit" title ="@lang('admin.Edit')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#edit_modal" data-id="{{$DB_Find_Bank[$i]->id}}" data-created_at="{{$DB_Find_Bank[$i]->created_at}}" data-isActive="{{$DB_Find_Bank[$i]->isActive}}"  class="text-primary d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i></button> </a> </li>
                                                        <li class="list-inline-item" title ="@lang('admin.Delete')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Remove" style="cursor:pointer;" > <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" data_id="{{$DB_Find_Bank[$i]->id}}" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data_id="{{$DB_Find_Bank[$i]->id}}" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> </li>
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

                                
                                @if(count($DB_Find_Bank) == 0 )

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
                        </div>
                    </div>
                    <!-- Banka Bilgileri Son --->


                    <!-- end card -->
                    <div class="text-end mb-4">
                        <button class="btn btn-success w-100" id="btn_edit" data_id="{{$DB_Find->id}}"  data_codeNumber="{{$DB_Find->codeNumber}}" >@lang('admin.Edit')</button>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                
                    <!--- İşlemler -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">@lang('admin.Actions')</h5>
                        </div>
                        <div class="card-body">
                           <div class="col-lg-12 mb-3">
                               <a href="/current/cart/@lang('admin.lang')/view/{{$DB_Find->id}}"  title="@lang('admin.Show')"  ><button type="button" class="btn py-0 fs-16 text-body"> <i class="ri-search-eye-line align-bottom" style="color: black;font-size: 25px;" ></i> </button></a>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!--- İşlemler Son-->

                    <!--- Cari Kod -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Para - Görev</h5>
                        </div>
                        <div class="card-body row">
                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="SelectCurrency">Para Birimi</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectCurrency">
                                    <option value="">@lang('admin.SelectCurrency')</option>
                                    <option value="Euro" {{$DB_Find->currency == "Euro" ? 'selected' : ''  }}  >Euro</option>
                                    <option value="Dolar" {{$DB_Find->currency == "Dolar" ? 'selected' : ''  }} >Dolar</option>
                                    <option value="TL" {{$DB_Find->currency == "TL" ? 'selected' : ''  }} >TL</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="currentRow">Görev</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="currentRow">
                                    <option value="">Seç</option>
                                    <option value="{{config('admin.currentCode_buyer')}}" {{$DB_Find->current_row == config('admin.currentCode_buyer') ? 'selected' : ''  }} >Alıcı</option>
                                    <option value="{{config('admin.currentCode_seller')}}" {{$DB_Find->current_row == config('admin.currentCode_seller') ? 'selected' : ''  }} >Satıcı</option>
                                    <option value="{{config('admin.currentCode_buyer_seller')}}" {{$DB_Find->current_row == config('admin.currentCode_buyer_seller') ? 'selected' : ''  }} >Hem Alıcı Hemde Satıcı</option>
                                </select>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="sectorEdit">Sektor</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="sectorEdit">
                                    <option value="">Seç</option>

                                    @for ($i = 0; $i < count($DB_Find_Category); $i++)
                                    <option value="{{$DB_Find_Category[$i]->id}}"  data_codeNo="{{$DB_Find_Category[$i]->codeNumber}}"  {{$DB_Find->sectoral_type == $DB_Find_Category[$i]->id ? 'selected' : ''  }} >{{$DB_Find_Category[$i]->title}}</option>
                                    @endfor
                                    
                                </select>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!--- Cari Kod  Son -->

                    <!--- Yetkili Kişi -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">@lang('admin.AuthorizedPerson')</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="AuthorizedPersonEdit">@lang('admin.AuthorizedPerson')</label>
                                <input type="text" class="form-control" id="AuthorizedPersonEdit" placeholder="@lang('admin.AuthorizedPerson')" value="{{$DB_Find->authorized_person}}" >
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="AuthorizedPersonDepartmentEdit">@lang('admin.AuthorizedPerson') @lang('admin.Department') </label>
                                <input type="text" class="form-control" id="AuthorizedPersonDepartmentEdit" placeholder="@lang('admin.AuthorizedPerson') @lang('admin.Department')" value="{{$DB_Find->authorized_person_role}}" >
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="AuthorizedPhoneEdit">@lang('admin.AuthorizedPhone')</label>
                                <input type="text" class="form-control" id="AuthorizedPhoneEdit" placeholder="@lang('admin.AuthorizedPhone')" value="{{$DB_Find->authorized_person_tel}}" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="AuthorizedPersonWhatsapEdit">@lang('admin.AuthorizedPerson') Whatsap</label>
                                <input type="text" class="form-control" id="AuthorizedPersonWhatsapEdit" placeholder="@lang('admin.AuthorizedPerson') Whatsapp" value="{{$DB_Find->authorized_person_whatsap}}" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="AuthorizedPersonEmailEdit">@lang('admin.AuthorizedPerson') Email</label>
                                <input type="text" class="form-control" id="AuthorizedPersonEmailEdit" placeholder="@lang('admin.AuthorizedPerson') Email" value="{{$DB_Find->authorized_person_mail}}" >
                            </div>
                           
                        </div>
                        <!-- end card body -->
                    </div>
                     <!--- Yetkili Kişi Son -->
                     
                     
                    <!--- Refarans Kişi -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Referans Bilgileri</h5>
                        </div>
                        <div class="card-body row">
                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refPersonEdit">Referans Kişi</label>
                                <input type="text" class="form-control" id="refPersonEdit" placeholder="Referans Kişi" value="{{$DB_Find->ref_person}}" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refDepartmentEdit">Referans Yetkisi </label>
                                <input type="text" class="form-control" id="refDepartmentEdit" placeholder="Referans Yetkisi" value="{{$DB_Find->ref_departman}}" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refPhoneEdit">Referans Telefon</label>
                                <input type="text" class="form-control" id="refPhoneEdit" placeholder="Referans Telefon" value="{{$DB_Find->ref_phone}}" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refEmailEdit">Referans Email</label>
                                <input type="text" class="form-control" id="refEmailEdit" placeholder="Referans Email" value="{{$DB_Find->ref_email}}" >
                            </div>
                           
                        </div>
                        <!-- end card body -->
                    </div>
                     <!--- Refarans Kişi Son -->
                  

                 

                  
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

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/currentCart/currentCartAction.js"></script>

    </footer>