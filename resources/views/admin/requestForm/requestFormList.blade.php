<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> Müşteri Talep Formu | {{ config('admin.Admin_Title') }}</title>
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
                              <div class="col-12 mb-3">
                                    <label for="requestFormTitleAdd" class="form-label">@lang('admin.Title')</label>
                                    <input class="form-control" type="text" id="requestFormTitleAdd" name="requestFormTitleAdd" placeholder="@lang('admin.Title')">
                              </div>
                              <div class="col-6">
                                   
                                    <!-- Personel  -->
                                    <div class="mb-3">
                                        <label for="selectPersoneAdd" class="form-label">Personel Seçiniz</label>
                                        <select class="form-select" id="selectPersoneAdd">
                                            <option value="">Personel Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_User); $i++) 
                                              <option value="{{$DB_Find_User[$i]->id}}" > {{$DB_Find_User[$i]->name}} {{$DB_Find_User[$i]->surname}} </option>
                                            @endfor                          
                                        </select>
                                    </div>

                              </div>
                              <div class="col-6">
                                    <div class="mb-3">
                                        <label for="CurrencyCartIDAdd" class="form-label">Firma Seçiniz</label>
                                        <select class="form-select" id="CurrencyCartIDAdd">
                                            <option value="">Cari Kart Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_Current); $i++) 
                                              <option value="{{$DB_Find_Current[$i]->id}}" > {{$DB_Find_Current[$i]->current_name}} </option>
                                            @endfor  
                                        </select>
                                    </div>
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


    <!-- Modal Setting -->
    <div class="modal_new fade" id="SettingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > Ayar Güncelle #</p>  <p id="update_setting_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" onclick={$("#SettingsModal").modal('hide');} ></button>
                </div>
                <form action="#">

                     <!---  Loading --->
                    <div id="LoadingUpdateSetting" style="display:block;" ><span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status"></span>
                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                    </span> </div>
                    <div id="uploadStatus"></div>
                    <!--- Son Loading --->

                    <!---  ModalBodyInfoBody --->
                    <div class="modal-body" id="ModalBodyInfoEditSetting" style="display:none;" >
                           <div class="row">
                              <div class="col-6">
                                    <div class="mb-3">
                                        <label for="selectPersonelEditSetting" class="form-label">Personel Seçiniz</label>
                                        <select class="form-select" id="selectPersonelEditSetting">
                                            <option value="">Personel Seç</option>
                                            @for ($i = 0; $i < count($DB_Find_User); $i++) 
                                              <option value="{{$DB_Find_User[$i]->id}}" > {{$DB_Find_User[$i]->name}} {{$DB_Find_User[$i]->surname}} </option>
                                            @endfor                          
                                        </select>
                                    </div>
                                   
                              </div>
                              <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="VisibilityEditSetting">Görünürlük</label>
                                        <select class="form-control" name="choices-single-default2" id="VisibilityEditSetting">
                                            <option value="" selected="">Görünürlük Seç</option>
                                            <option value="0" >Private ( Kapalı )</option>
                                            <option value="1" >Public ( Açık )</option>
                                            <option value="2" >View ( Sadece Görebilir )</option>
                                        </select>
                                    </div>

                                    <div class="row" id="publicRow" style="display: none;">
                                        <div class="mb-3">
                                            <label for="public_url" class="form-label">URL</label>
                                            <div class="d-flex gap-1">
                                                <input type="text" class="form-control" id="request_public_url" data_config="{{config('admin.Web_Url')}}" value="" disabled>
                                                <button type="button" id="request_copy_text" class="btn btn-outline-success btn-icon waves-effect waves-light"><i class="ri-file-copy-2-line"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="public_usernameEditSetting" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="public_usernameEditSetting" value="">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="public_passEditSetting" class="form-label">Sifre</label>
                                            <input type="text" class="form-control" id="public_passEditSetting" value="">
                                        </div>
                                    </div> 
                              </div>
                             
                           </div>
                       

                       
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#SettingsModal").modal('hide');} >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="update_setting">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Setting  Son -->
  

   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Müşteri Talep Formu </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/request/form/list"> Müşteri Talep Formu </a></li>
                            <li class="breadcrumb-item active"> Müşteri Talep Formu </li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" > Müşteri Talep Formu </p> <p> | {{count($DB_Find)}}</p> 
                               
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
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="exampleInputdate" class="form-label">Oluşturma Zamanı</label>
                                        <input type="date" class="form-control" id="exampleInputdate"  style="cursor: pointer;"> 
                                    </div>
                                    <!--son Arama Takvim-->


                                    <!-- Arama Durum -->
                                    <div class="col-xl-2 col-md-4 d-none">
                                        <label for="selectActive" class="form-label">Durum</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectActive">
                                            <option value="All">@lang('admin.All')</option>
                                            <option value="1">@lang('admin.Active')</option>
                                            <option value="0">@lang('admin.Passive')</option>
                                        </select>
                                    </div>
                                    <!--son Arama Durum  -->

                                    <!-- Arama Cari Kart -->
                                    <div class="col-lg-2 col-md-12 mb-md-3"> 
                                        <label for="selectActive" class="form-label"> Cari Kart Seç</label>
                                        <select class="form-control" style="cursor: pointer;"  name="choices-single-default2" id="selectCurrentCart">
                                            <option value=""> @lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_Current); $i++) <option value="{{$DB_Find_Current[$i]->id}}" >{{$DB_Find_Current[$i]->current_name}}</option>  @endfor
                                        </select>
                                    </div>
                                    <!--son Arama  Cari Kart  -->

                                    <!-- Arama Personel -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectActive" class="form-label">Personel Arama</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectPersonel">
                                            <option value="All">@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_User); $i++) 
                                              <option value="{{$DB_Find_User[$i]->id}}" > {{$DB_Find_User[$i]->name}} {{$DB_Find_User[$i]->surname}} </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <!--son Arama Personel  -->
                                   
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
                                                
                                                                                            
                                                <!---- Tümü Seç --->
                                                <th exportname="Check" style="margin: auto;" ><input style="cursor:pointer;" type="checkbox" id="showAllRows" value="all" data_value=""></th>

                                                <th exportname="Id" class="sort" data-sort="type" scope="col" id="checkItemBox"  >Id</th>
                                                <th exportname="CreatedDate" class="sort" data-sort="order_date" scope="col" >@lang('admin.createdDate')</th>
                                                
                                                <th exportname="reqCode" >Talep Kodu</th>
                                                <th exportname="title" >@lang('admin.Title')</th>
                                                <th exportname="currentCardName" >Firma Adı</th>
                                                <th exportname="Personel" >Personel</th>

                                                <th exportname="public" >@lang('admin.Visibility')</th>
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
                                                   
                                                    <td exportname="reqCode" >{{$DB_Find[$i]->reqCode}}</td>
                                                    <td exportname="title" >{{$DB_Find[$i]->requestFormTitle}}</td>
                                                    <td exportname="currentCardName" >{{$DB_Find[$i]->current_name}}</td>
                                                    <td exportname="Personel" >
                                                        <img src="{{$DB_Find[$i]->img_url}}" alt="" class="avatar-xs rounded-circle me-2">
                                                        {{$DB_Find[$i]->name}} {{$DB_Find[$i]->surname}}
                                                    </td>
                                                
                                                    <td exportname="public" >
                                                        @if($DB_Find[$i]->public == "0" ) <span class="badge badge-soft-danger text-uppercase">private</span>
                                                        @elseif($DB_Find[$i]->public == "1" ) <span class="badge badge-soft-success text-uppercase">public</span>
                                                        @elseif($DB_Find[$i]->public == "2" ) <span class="badge badge-soft-success text-uppercase">public - view</span>
                                                        @endif
                                                    </td>

                                                

                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item d-none" title ="@lang('admin.Visibility')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View" style="cursor:pointer;" > @if($DB_Find[$i]->isActive == 1) <a class="view-item-btn text-success"><button class="btn btn-success waves-effect waves-light" style="width: 45px;height: 45px;"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="true"  ><i  class="ri-eye-fill align-bottom"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="true" ></i></button></a>  @elseif($DB_Find[$i]->isActive == 0)  <a class="view-item-btn"><button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px;" id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="false" ><i class="ri-eye-off-fill align-bottom" id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="false" ></i></button></a>  @endif </li>
                                                            <li class="list-inline-item edit"  title ="@lang('admin.Edit')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"> <a href="/request/form/@lang('admin.lang')/edit/{{$DB_Find[$i]->id}}" class="text-info d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i> </button></a> </li>
                                                            <li class="list-inline-item settings" title ="Ayarlar" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#SettingsModal" data-id="{{$DB_Find[$i]->id}}" class="text-primary d-inline-block edit-item-btn"><button class="btn btn-secondary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="mdi mdi-cog-outline"></i> </button></a> </li>
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
            <script src="{{asset('/assets/admin')}}/js/requestForm/requestFormList.js"></script>

        </footer>