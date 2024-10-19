<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.SubCategory') @lang('admin.List') | {{ config('admin.Admin_Title') }}</title>
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
                    <button type="button" class="btn-close" onclick={$("#AddModal").modal('hide');} id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-6">

                            <!-- Arama Tür -->
                            <div class="mb-3">
                                <label for="selectType" class="form-label">Tür</label>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectType" style="cursor:pointer;"  >
                                    <option value="">Tür Seç</option>
                                    <option value="SektorStok" >Sektor Stok</option>
                                    <option value="SektorCari" >Sektor Cari</option>
                                    <option value="ÖdemeŞekli">Ödeme Şekli</option>
                                    <option value="SevkŞekli">Sevk Şekli</option>
                                    <option value="TeslimŞekli">Teslim Şekli</option>
                                    <option value="NakliyetŞekli">Nakliyet Şekli</option>
                                    <option value="ÖzelİzneTabiMi">Özel İzne Tabi Mi</option>
                                    <option value="İntertekTabiMi">İntertek Tabi Mi</option>
                                </select>
                            </div>
                            <!-- Son Arama Tür  -->


                           </div>
                           <div class="col-6">
                                <!-- Arama Durum Başlık  -->
                                <div class="mb-3">
                                    <label for="selectTypeCategoryAdd" class="form-label">Kategori</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectTypeCategoryAdd"  >
                                        <option value="">Başlık</option>
                                    </select>
                                </div>
                                <!--end Arama Durum  Başlık -->
                           </div>
                       </div>
                       <div class="row">
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="subCategoryAdd" class="form-label">Alt Kategori</label>
                                <input class="form-control" type="text" id="subCategoryAdd" name="subCategoryAdd" placeholder="Alt Kategori">
                            </div>
                            <div class="mb-3"> 
                                <label for="codeLetAdd" class="form-label">Kod Harf</label>
                                <input class="form-control" type="text" id="codeLetAdd" name="codeLetAdd" >
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="subCategoryENAdd" class="form-label">Alt Kategori En</label>
                                <input class="form-control" type="text" id="subCategoryENAdd" name="subCategoryENAdd" placeholder="Alt Kategori EN">
                            </div>
                            <div class="mb-3"> 
                                <label for="codeNumberAdd" class="form-label">Kod Sayı</label>
                                <input class="form-control" type="text" id="codeNumberAdd" name="codeNumberAdd" >
                            </div>
                          </div>
                       </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#AddModal").modal('hide');}  >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-success" id="new_add">@lang('admin.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ekle  Son -->
   
    <!-- Modal Güncelle -->
    <div class="modal_new fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Update') #</p>  <p id="update_data_id" style="margin:auto;">xx</p> </h5>
                    <button type="button" class="btn-close" onclick={$("#edit_modal").modal('hide');} id="close-modal"></button>
                </div>
                <form action="#">

                    <!---  Loading --->
                    <div id="LoadingFileUploadUpdate" style="display:block;" ><span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status"></span>
                        <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                    </span> </div>
                    <div id="uploadStatus"></div>
                    <!--- End Loading --->

                    <!---  ModalBodyInfoBody --->
                    <div class="modal-body" id="ModalBodyInfoUpdate" style="display:none;" >
                        <div class="row">
                            <div class="col-6">
                                <!-- Arama Durum -->
                                <div class="mb-3">
                                    <label for="selectTypeEdit" class="form-label">Tür</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectTypeEdit"  >
                                        <option value="">Tür Seç</option>
                                        <option value="SektorStok"  style="cursor:pointer;" >Sektor Stok</option>
                                        <option value="SektorCari"  style="cursor:pointer;" >Sektor Cari</option>
                                        <option value="ÖdemeŞekli">Ödeme Şekli</option>
                                        <option value="SevkŞekli">Sevk Şekli</option>
                                        <option value="TeslimŞekli">Teslim Şekli</option>
                                        <option value="NakliyetŞekli">Nakliyet Şekli</option>
                                        <option value="ÖzelİzneTabiMi">Özel İzne Tabi Mi</option>
                                        <option value="İntertekTabiMi">İntertek Tabi Mi</option>
                                    </select>
                                </div>
                                <!--end Arama Durum  -->

                                <div class="mb-3">
                                    <label for="subCategoryUpdate" class="form-label">Alt Kategori</label>
                                    <input class="form-control" type="text" id="subCategoryUpdate" name="subCategoryUpdate" placeholder="Alt Kategori">
                                </div>

                                <div class="mb-3"> 
                                    <label for="codeLetUpdate" class="form-label">Kod Harf</label>
                                    <input class="form-control" type="text" id="codeLetUpdate" name="codeLetUpdate" >
                                </div>

                            </div>
                            <div class="col-6">
                                <!-- Arama Durum Başlık  -->
                                <div class="mb-3">
                                    <label for="selectTypeCategoryUpdate" class="form-label">Başlık</label>
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectTypeCategoryUpdate"  >
                                        <option value="">Başlık</option>
                                        
                                    </select>
                                </div>
                                <!--end Arama Durum  Başlık -->

                                <div class="mb-3">
                                    <label for="subCategoryENUpdate" class="form-label">Alt Kategori En</label>
                                    <input class="form-control" type="text" id="subCategoryENUpdate" name="subCategoryENUpdate" placeholder="Alt Kategori EN">
                                </div>

                                <div class="mb-3"> 
                                    <label for="codeNumberUpdate" class="form-label">Kod Sayı</label>
                                    <input class="form-control" type="text" id="codeNumberUpdate" name="codeNumberUpdate" >
                                </div>

                            </div>
                        </div>

                      
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" onclick={$("#edit_modal").modal('hide');} >@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item">@lang('admin.Update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Güncelle  Son -->

   
   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('admin.SubCategory') @lang('admin.List') </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/category/sub/list">@lang('admin.SubCategory') @lang('admin.List')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.SubCategory')</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.SubCategory') @lang('admin.List')</p> <p> | {{count($DB_Find)}}</p> 
                                
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

                                    <!-- Arama Type -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectTypeList" class="form-label">Tür</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectTypeList"  style="cursor:pointer;" >
                                            <option value="selectedFirst" selected  >@lang('admin.All')</option>
                                            <option value="SektorStok" >Sektor Stok</option>
                                            <option value="SektorCari"   >Sektor Cari</option>
                                            <option value="ÖdemeŞekli" >Ödeme Şekli</option>
                                            <option value="SevkŞekli"  >Sevk Şekli</option>
                                            <option value="TeslimŞekli"  >Teslim Şekli</option>
                                            <option value="NakliyetŞekli"  >Nakliyet Şekli</option>
                                            <option value="ÖzelİzneTabiMi"   >Özel İzne Tabi Mi</option>
                                            <option value="İntertekTabiMi"  >İntertek Tabi Mi</option>
                                        </select>
                                    </div>
                                    <!--end Arama Type Son  -->

                                    <!-- Arama Durum Başlık  -->
                                    <div class="col-xl-2 col-md-4">
                                        <label for="selectTypeCategoryList" class="form-label">Kategori</label>
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectTypeCategoryList"  style="cursor:pointer;" >
                                            <option value="selectedFirst" selected  >@lang('admin.All')</option>
                                            @for ($i = 0; $i < count($DB_Find_Category); $i++) 
                                            <option value="{{$DB_Find_Category[$i]->id}}">{{$DB_Find_Category[$i]->title}}</option> 
                                            @endfor
                                        </select>
                                    </div>
                                    <!--end Arama Durum  Başlık -->

                                    <!--- Export -->
                                    <div class="col-xl-2 col-md-4" style="display: flex; height: 40px; gap: 10px; padding: 3px; margin-left: 10px;">
                                        <!--- yildirimdevReplace_Table_Export --->
                                    </div>
                                    <!--- end Export -->
                                
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
                                                
                                                <th exportname="type" >@lang('admin.Type')</th>
                                                <th exportname="categoryTitle" >Kategori</th>
                                                <th exportname="title" >@lang('admin.Title')</th>
                                                <th exportname="titleEN" >@lang('admin.Title') EN</th>

                                                <th exportname="codeLet" >Kod Harf</th>
                                                <th exportname="codeNumber" >Kod Sayı</th>

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
                                                   
                                                    <td exportname="type" >{{$DB_Find[$i]->categoryType}}</td>
                                                    <td exportname="categoryid" >{{$DB_Find[$i]->categoryTitle}}</td>
                                                    <td exportname="title" >{{$DB_Find[$i]->title}}</td>
                                                    <td exportname="titleEN" >{{$DB_Find[$i]->title_EN}}</td>

                                                    <td exportname="codeLet" >{{$DB_Find[$i]->codeLet}}</td>
                                                    <td exportname="codeNumber" >{{$DB_Find[$i]->codeNumber}}</td>
                                                
                                                  

                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item edit" title ="@lang('admin.Update')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#edit_modal" data-id="{{$DB_Find[$i]->id}}" data-created_at="{{$DB_Find[$i]->created_at}}" data-isActive="{{$DB_Find[$i]->isActive}}"  class="text-primary d-inline-block edit-item-btn"> <button class="btn btn-primary waves-effect waves-light" style="width: 45px;height: 45px;"> <i class="ri-pencil-fill fs-16"></i> </button> </a> </li>
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
            <script src="{{asset('/assets/admin')}}/js/settings/categorySubList.js"></script>

        </footer>