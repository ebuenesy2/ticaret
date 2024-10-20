<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.CurrentCard')  - @lang('admin.Add') | {{ config('admin.Admin_Title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ config('admin.Admin_Meta_Title') }}">
    <meta name="author" content="{{ config('admin.Admin_Meta_Author') }}">
    <meta name="description" content="{{ config('admin.Admin_Meta_Description') }}">
    <meta name="keywords" content="{{ config('admin.Admin_Keywords') }}">

    <!------- Head --->
    @include('admin.include.head')


    <!--------- Css  --> 
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin')}}/css/sabit/0_const.css" />
    

</head>

<body>

    <!------- Header --->
    @include('admin.include.header')

    
    <!------- Lang --->
    @include('include.lang')

    <!-- Page-content -->
    <div class="page-content">
       <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cari Kart Ekleme</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/current/cart/list">@lang('admin.CurrentCardList')</a></li>
                                <li class="breadcrumb-item active">Cari Kart Ekleme</li>
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
                                <label class="form-label" for="currentNameAdd">@lang('admin.CurrentName')</label>
                                <input type="text" class="form-control" id="currentNameAdd" placeholder="@lang('admin.CurrentName')">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="ShortNameAdd">@lang('admin.ShortName')</label>
                                <input type="text" class="form-control" id="ShortNameAdd" placeholder="@lang('admin.ShortName')">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="DescriptionAdd">@lang('admin.Description')</label>
                                <textarea  class="form-control" id="DescriptionAdd" rows="3" cols="30"></textarea>
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
                                <label class="form-label" for="CountryAdd">@lang('admin.Country')</label>
                                <input type="text" class="form-control" id="CountryAdd" placeholder="@lang('admin.Country')">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="CityAdd">@lang('admin.City')</label>
                                <input type="text" class="form-control" id="CityAdd" placeholder="@lang('admin.City')">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="DitsrictAdd">@lang('admin.Ditsrict')</label>
                                <input type="text" class="form-control" id="DitsrictAdd" placeholder="@lang('admin.Ditsrict')">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" for="PostCodeAdd">@lang('admin.PostCode')</label>
                                <input type="text" class="form-control" id="PostCodeAdd" placeholder="@lang('admin.PostCode')">
                            </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="TelAdd1">Tel 1 </label>
                                <input type="text" class="form-control" id="TelAdd1" placeholder="Tel 1">
                           </div>
                            
                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="TelAdd2">Tel 2 </label>
                                <input type="text" class="form-control" id="TelAdd2" placeholder="Tel 2">
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="FaxAdd1">Fax 1 </label>
                                <input type="text" class="form-control" id="FaxAdd1" placeholder="Fax 1">
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="WebAdd">Web</label>
                                <input type="text" class="form-control" id="WebAdd" placeholder="Web">
                           </div>

                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="EmailAdd">Email </label>
                                <input type="text" class="form-control" id="EmailAdd" placeholder="Email">
                           </div>
                        
                           <div class="col-lg-4 mb-3">
                                <label class="form-label" for="EmailCCAdd">Email Cc</label>
                                <input type="text" class="form-control" id="EmailCCAdd" placeholder="Email Cc">
                           </div>

                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="tax_administration">Vergi Dairesi</label>
                                <input type="text" class="form-control" id="tax_administration" placeholder="Vergi Dairesi">
                           </div>

                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="tax_number">Vergi No</label>
                                <input type="text" class="form-control" id="tax_number" placeholder="Vergi No">
                           </div>

                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="adressAdd">@lang('admin.adress')</label>
                                <textarea  class="form-control" id="adressAdd" rows="3" cols="50"></textarea>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="InvoiceAddressAdd">@lang('admin.InvoiceAddress')</label>
                                <textarea  class="form-control" id="InvoiceAddressAdd" rows="3" cols="50"></textarea>
                            </div>

                        </div>
                    </div>
                    <!-- Cari Kart  Adres Son --->

                     <!-- Kart Son --->
                    <div class="card" style="display:none;" >
                        <div class="card-header">
                            <h5 class="card-title mb-0">Attached files</h5>
                        </div>
                        <div class="card-body">
                            <p> Dosya Yükleme </p>
                        </div>
                    </div>
                     <!-- Kart Son --->


                    <!-- end card -->
                    <div class="text-end mb-4">
                        <button class="btn btn-success w-100" id="new_add" >@lang('admin.Add')</button>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                 
                     <!--- Cari Kod -->
                     <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">@lang('admin.Code')</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="SelectCurrency">Para Birimi</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="SelectCurrency">
                                    <option value="">@lang('admin.SelectCurrency')</option>
                                    <option value="Euro">Euro</option>
                                    <option value="Dolar">Dolar</option>
                                    <option value="TL">TL</option>
                                </select>
                            </div>
                           <div class="col-lg-6 mb-3">
                                <label class="form-label" for="currentRow">Görev</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="currentRow">
                                    <option value="">Seç</option>
                                    <option value="{{config('admin.currentCode_buyer')}}" >Alıcı</option>
                                    <option value="{{config('admin.currentCode_seller')}}" >Satıcı</option>
                                    <option value="{{config('admin.currentCode_buyer_seller')}}" >Hem Alıcı Hemde Satıcı</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="sectorAdd">Sektor</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="sectorAdd">
                                    <option value="">Seç</option>
                                    @for ($i = 0; $i < count($DB_Find_Category); $i++)
                                    <option value="{{$DB_Find_Category[$i]->id}}" data_codeNo="{{$DB_Find_Category[$i]->codeNumber}}"  >{{$DB_Find_Category[$i]->title}}</option>
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
                                <label class="form-label" for="AuthorizedPersonAdd">@lang('admin.AuthorizedPerson')</label>
                                <input type="text" class="form-control" id="AuthorizedPersonAdd" placeholder="@lang('admin.AuthorizedPerson')" value="" >
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="AuthorizedPersonDepartmentAdd">@lang('admin.AuthorizedPerson') @lang('admin.Department') </label>
                                <input type="text" class="form-control" id="AuthorizedPersonDepartmentAdd" placeholder="@lang('admin.AuthorizedPerson') @lang('admin.Department')" value="" >
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="AuthorizedPhoneAdd">@lang('admin.AuthorizedPhone')</label>
                                <input type="text" class="form-control" id="AuthorizedPhoneAdd" placeholder="@lang('admin.AuthorizedPhone')" value="" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="AuthorizedPersonWhatsapAdd">@lang('admin.AuthorizedPerson') Whatsap</label>
                                <input type="text" class="form-control" id="AuthorizedPersonWhatsapAdd" placeholder="@lang('admin.AuthorizedPerson') Whatsapp" value="" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="AuthorizedPersonEmailAdd">@lang('admin.AuthorizedPerson') Email</label>
                                <input type="text" class="form-control" id="AuthorizedPersonEmailAdd" placeholder="@lang('admin.AuthorizedPerson') Email" value="" >
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
                                <label class="form-label" for="refPersonAdd">Referans Kişi</label>
                                <input type="text" class="form-control" id="refPersonAdd" placeholder="Referans Kişi" value="" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refDepartmentAdd">Referans Yetkisi </label>
                                <input type="text" class="form-control" id="refDepartmentAdd" placeholder="Referans Yetkisi" value="" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refPhoneAdd">Referans Telefon</label>
                                <input type="text" class="form-control" id="refPhoneAdd" placeholder="Referans Telefon" value="" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="refEmailAdd">Referans Email</label>
                                <input type="text" class="form-control" id="refEmailAdd" placeholder="Referans Email" value="" >
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