<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.TestList') | {{ config('admin.Admin_Title') }}</title>
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

    <!-- Modal Coloums -->
    <div class="modal fade" id="modalTableColoums" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > @lang('admin.TableSettings')   </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">

                        <!---  Loading --->
                        <div id="LoadingFileUpload" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfo --->
                        <div id="ModalBodyInfo" style="display:none;"  >
                            <p>@lang('admin.SelectVisibilityColumnsTable')</p>
                            <div id="exportModalHeaderTable"  style="display: flex;flex-wrap: wrap;gap: 15px;" ></div>
                        </div>
                         <!---  ModalBodyInfo Son --->

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item_check_coloums">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Coloums  Son -->

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
                        <!--- Son Loading --->

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
    <!-- Modal Resim  Son -->

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
                        <div class="mb-3"> 
                            <label for="nameAdd" class="form-label">@lang('admin.name')</label>
                            <input class="form-control" type="text" id="nameAdd" name="nameAdd" placeholder="@lang('admin.name')">
                        </div>

                        <div class="mb-3">
                            <label for="surnameAdd" class="form-label">@lang('admin.surname')</label>
                            <input class="form-control" type="text" id="surnameAdd" name="surnameAdd" placeholder="@lang('admin.surname')">
                        </div>

                        <div class="mb-3">
                            <label for="emailAdd" class="form-label">@lang('admin.email')</label>
                            <input class="form-control" type="email" id="emailAdd" name="emailAdd" placeholder="@lang('admin.email')">
                        </div>

                        <!--- CheckList --->
                        <div class="col-12 mb-3">
                            <div class="col">
                               <label class="form-label">CheckList</label>
                            </div>
                            <div class="col-12 d-flex gap-1">
                                <div class="col-4">
                                    <input class="form-check-input" type="checkbox" id="CheckAdd1">
                                    <label for="CheckAdd1" class="form-label">Check1</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-check-input" type="checkbox" id="CheckAdd2">
                                    <label for="CheckAdd2" class="form-label">Check2</label>
                                </div>   
                                <div class="col-4">
                                    <input class="form-check-input" type="checkbox" id="CheckAdd3">
                                    <label for="CheckAdd3" class="form-label">Check3</label>
                                </div>                            
                            </div>
                        </div>
                        <!--- CheckList Son --->

                        <div class="mb-3"> 
                            <label for="valueAdd" class="form-label">@lang('admin.value')</label>
                            <input class="form-control" type="number" id="valueAdd" name="valueAdd" placeholder="0">
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

    <!-- Modal Güncelle -->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <p id="modalInfo" data_id="121" style="display:none;" >Modal Bilgi</p>
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" >@lang('admin.Edit') #</p>  <p id="edit_data_id" style="margin:auto;">xx</p> </h5>
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
                        <div class="mb-3">
                            <label for="nameEditd" class="form-label">@lang('admin.name')</label>
                            <input class="form-control" type="text" id="nameEditd" name="nameEditd" placeholder="@lang('admin.name')">
                        </div>

                        <div class="mb-3">
                            <label for="SurnameEditd" class="form-label">@lang('admin.surname')</label>
                            <input class="form-control" type="text" id="SurnameEditd" name="SurnameEditd" placeholder="@lang('admin.surname')">
                        </div>

                        <div class="mb-3">
                            <label for="EmailEdit" class="form-label">@lang('admin.email')</label>
                            <input class="form-control" type="email" id="EmailEdit" name="EmailEdit" placeholder="@lang('admin.email')">
                        </div>

                        <div class="mb-3">
                            <label for="ValueUpdated" class="form-label">@lang('admin.value')</label>
                            <input class="form-control" type="number" id="ValueUpdated" name="valueUpdated" placeholder="0">
                        </div>
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="edit_item">@lang('admin.Edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Güncelle  Son -->

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
                        <div class="mb-3">
                            <label for="NameSearch" class="form-label">@lang('admin.name')</label>
                            <input class="form-control" type="text" id="NameSearch" name="nameSearch" placeholder="@lang('admin.name')" disabled >
                        </div>

                        <div class="mb-3">
                            <label for="SurnameSearch" class="form-label">@lang('admin.surname')</label>
                            <input class="form-control" type="text" id="SurnameSearch" name="SurnameSearch" placeholder="@lang('admin.surname')" disabled >
                        </div>

                        <div class="mb-3">
                            <label for="EmailSearch" class="form-label">@lang('admin.email')</label>
                            <input class="form-control" type="email" id="EmailSearch" name="EmailSearch" placeholder="@lang('admin.email')" disabled >
                        </div>

                        <div class="mb-3">
                            <label for="ValueSearch" class="form-label">@lang('admin.value')</label>
                            <input class="form-control" type="number" id="ValueSearch" name="ValueSearch" placeholder="0" disabled >
                        </div>
                    </div>
                    <!---  ModalBodyInfoBody Son --->

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Arama  Son -->

    <!-- Modal Export Json -->
    <div class="modal fade" id="exportJsonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > Export Json  </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">

                        <!---  Loading --->
                        <div id="LoadingFileUploadJson" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfoJson --->
                        <div id="ModalBodyInfoJson" style="display:none;"  >
                       
                            <p id="ModalTableTitle" style="font-weight: bold;font-size: 15px;" >xx Listesi</p>
                            <p>@lang('admin.SelectWhichDataExport')</p>
                            
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadio" id="modalTableTitleRadioButton1" value="all"  checked="">
                                <label class="form-check-label" for="modalTableTitleRadioButton1">@lang('admin.AllDataTable')</label>
                            </div>
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadio" id="modalTableTitleRadioButton2" value="select" >
                                <label class="form-check-label" for="modalTableTitleRadioButton2">@lang('admin.SelectedDataTable')</label>
                            </div>                       

                            <hr>
                            <p>@lang('admin.SelectColumnsExport')</p>
                            <div id="exportModalHeader"  style="display: flex;flex-wrap: wrap;gap: 15px;" >
                                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheck"  id="modalTableTitleCheck" value="Check" ><label class="form-check-label" for="modalTableTitleCheck">Check</label></div>
                            </div>
                        

                          </div>
                        </div>
                         <!---  ModalBodyInfoJson Son --->

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="exportJson">Export JSON</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Export Json Son -->

     <!-- Modal Export Xml -->
     <div class="modal fade" id="exportXmlModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > Export Xml  </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                         
                        <!---  Loading --->
                        <div id="LoadingFileUploadXml" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfoXml --->
                        <div id="ModalBodyInfoXml" style="display:none;"  >
                            <p id="ModalTableTitleXml" style="font-weight: bold;font-size: 15px;" >xx Listesi</p>
                            <p>@lang('admin.SelectWhichDataExport')</p>
                            
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadioXml" id="modalTableTitleRadioButtonXml1" value="all"  checked="">
                                <label class="form-check-label" for="modalTableTitleRadioButtonXml1">@lang('admin.AllDataTable')</label>
                            </div>
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadioXml" id="modalTableTitleRadioButtonXml2" value="select" >
                                <label class="form-check-label" for="modalTableTitleRadioButtonXml2">@lang('admin.SelectedDataTable')</label>
                            </div>
                          <hr>

                          <div>
                            <p>@lang('admin.SelectColumnsExport')</p>
                            <div id="exportModalHeaderXml"  style="display: flex;flex-wrap: wrap;gap: 15px;" >
                                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheck"  id="modalTableTitleCheck" value="Check" ><label class="form-check-label" for="modalTableTitleCheck">Check</label></div>
                            </div>
                          </div>
                        </div>
                        <!---  ModalBodyInfoXml Son --->

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="exportXml">Export Xml</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Export Xml Son -->
    
    <!-- Modal Export Excel -->
    <div class="modal fade" id="exportExcelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > Export Excel  </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">

                           
                        <!---  Loading --->
                        <div id="LoadingFileUploadExcel" style="display:block;" ><span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status"></span>
                            <span class="flex-grow-1 ms-2">@lang('admin.Loading') </span>
                        </span> </div>
                        <div id="uploadStatus"></div>
                        <!--- Son Loading --->

                        <!---  ModalBodyInfoExcel --->
                        <div id="ModalBodyInfoExcel" style="display:none;"  >
                            <p id="ModalTableTitleExcel" style="font-weight: bold;font-size: 15px;" >xx Listesi</p>
                            <p>@lang('admin.SelectWhichDataExport')</p>
                            
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadioExcel" id="modalTableTitleRadioButtonExcel1" value="all"  checked="">
                                <label class="form-check-label" for="modalTableTitleRadioButtonExcel1">@lang('admin.AllDataTable')</label>
                            </div>
                            <div class="form-check form-radio-primary mb-3">
                                <input class="form-check-input" type="radio" name="modalTableTitleRadioExcel" id="modalTableTitleRadioButtonExcel2" value="select" >
                                <label class="form-check-label" for="modalTableTitleRadioButtonExcel2">@lang('admin.SelectedDataTable')</label>
                            </div>

                            <hr>

                            <div>
                                <p>@lang('admin.SelectColumnsExport')</p>
                                <div id="exportModalHeaderExcel"  style="display: flex;flex-wrap: wrap;gap: 15px;" >
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheck"  id="modalTableTitleCheck" value="Check" ><label class="form-check-label" for="modalTableTitleCheck">Check</label></div>
                                </div>
                          </div>
                        </div>
                        <!---  ModalBodyInfoExcel Son --->

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Close')</button>
                            <button type="button" class="btn btn-info" id="exportExcel">Export Excel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Export Excel Son -->

    <!-- Modal Import -->
    <div class="modal fade" id="modalTableImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel" style="display:flex;" ><p style="margin:auto;" > Import  </p> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <!-- Dosya Yükleme Kutusu ----->
                        <div style="width: 450px;border: 2px solid;padding: 10px;">
                        
                            <!-- Dosya Yükleme ----->
                            <form method="POST" id="uploadForm" enctype="multipart/form-data">
                                <div style="display: flex;flex-direction: column; gap: 15px;">

                                     <!-- Dosya Yükleme Bilgileri ----->
                                    <input type="hidden" name="fileDbSave" id="fileDbSave" value="true" >
                                    <input type="hidden" name="fileWhere" id="fileWhere" value="Import" >

                                    <!---  Loading --->
                                    <div id="LoadingFileUpload" style="display:none;" ><span class="d-flex align-items-center">
                                        <span class="spinner-border flex-shrink-0" role="status"></span>
                                        <span class="flex-grow-1 ms-2"> @lang('admin.Loading')  </span>
                                    </span> </div>
                                    <div id="uploadStatus"></div>
                                    <!--- Son Loading --->

                                    <input type="file" name="file" id="fileInput" style="display: flex; color: steelblue; margin-left: 10px; ">
                                    <div style="display: flex; gap: 10px; margin-bottom: -25px;" ><p>@lang('admin.FileUrl'):</p><p id="filePathUrl"></p></div>
                                    <button type="button" id="fileUploadClick" class="btn btn-success" style="background-image: linear-gradient(#04519b, #033c73 60%, #02325f);color: #ffffff;border-bottom: 1px solid #022241;padding: 12px;width: 100%;border-radius: 6px;display: flex; gap:10px; justify-content: center;align-items: center;">
                                        <i class="ri-folder-upload-line" style="margin-top: -8px;  margin-bottom: -8px; font-size: 24px;"></i> 
                                        <p style=" color: blanchedalmond; font-size: 14px; font-weight: bold; margin-bottom: auto; " > @lang('admin.FileUpload') </p>
                                    </button>
                                    
                                    <!-- ProgressBar ---->
                                    <div class="progress" style="margin-top: 20px;">
                                    <div class="progress-bar" id="progressBarFileUpload" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: teal;color: rgb(255, 255, 255);border-radius: 6px;display: flex;justify-content: center;"></div>
                                </div>
                                    <!-- ProgressBar Son ---->
                                    
                                </div>
                            </form>
                            <!-- Dosya Yükleme Son ---->
                    
                        </div>
                        <!-- Dosya Yükleme Kutusu Son ----->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Import  Son -->


   <div class="page-content">
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <!-- Body Title -->
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('admin.TestList') </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/sabit/@lang('admin.lang')">@lang('admin.Const')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.TestList')</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- End Body Title -->

                <div class="row" id="contactList">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.TestList')</p> <p> | {{count($DB_Find)}}</p> 
                               
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
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ri-add-line align-bottom me-1"></i> @lang('admin.newAdd') - Modal</button>
                                        <a href="/sabit_list/add/view" > <button class="btn btn-soft-info">@lang('admin.newAdd') - Url</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <div class="row g-2">
                                    
                                    <!-- Arama id -->
                                    <div class="col-xl-2 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control search" id="searhId_Table" placeholder="@lang('admin.searchById')">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!-- Arama id Son -->
                                    
                                    <!-- Arama Takvim-->
                                    <div class="col-xl-2 col-md-6"> <div> <input type="date" class="form-control" id="exampleInputdate"  style="cursor: pointer;"> </div></div>
                                    <!--son Arama Takvim-->

                                    <!-- Arama Durum -->
                                    <div class="col-xl-2 col-md-4">
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2" id="selectActive">
                                            <option value="">@lang('admin.All')</option>
                                            <option value="All">@lang('admin.All')</option>
                                            <option value="1">@lang('admin.Active')</option>
                                            <option value="0">@lang('admin.Passive')</option>
                                        </select>
                                    </div>
                                    <!--son Arama Durum  -->

                                    <!----- Coloumn --->
                                    <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#modalTableColoums"  style="width: 150px;display: flex;gap: 10px;background-color: cadetblue;" ><i class="ri-grid-line"></i> @lang('admin.TableSettings') </button>
                                    <!----- End Coloumn --->

                                    <!--- Import ----->
                                    <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#modalTableImport"  style="width: 150px; margin-left:10px; display: flex;gap: 10px;background-color: slateblue;" ><i class="ri-folder-upload-line"></i> Import</button>
                                    <!--- Son Import ----->
                                    

                                    <!--- Export -->
                                    <div class="col-xl-2 col-md-4" style="display: flex; height: 40px; gap: 10px; padding: 3px; margin-left: 10px;">
                                        <img data-bs-toggle="modal" data-bs-target="#exportJsonModal" title="Json" src="/assets/img/icon/json-file.png" style=" cursor:pointer;" alt="" srcset="">
                                        <img data-bs-toggle="modal" data-bs-target="#exportXmlModal" title="Xml" src="/assets/img/icon/xml.png" style=" cursor:pointer;" alt="" srcset="">
                                        <img data-bs-toggle="modal" data-bs-target="#exportExcelModal" title="Excel" src="/assets/img/icon/excel.png" style="cursor:pointer;height: 35px;" alt="" srcset="">
                                        <img title="Pdf" src="/assets/img/icon/pdf.png" style=" cursor:pointer;" alt="" srcset="">
                                    </div>
                                    <!--- Son Export -->
                                
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
                                                <th exportname="Image" >@lang('admin.Image')</th>
                                                <th exportname="Name" >@lang('admin.name')</th>
                                                <th exportname="Surname" >@lang('admin.surname')</th>
                                                <th exportname="Email" >@lang('admin.email')</th>
                                                <th exportname="Value" class="sort" data-sort="order_value" scope="col" >Value</th>
                                                <th exportname="Status" class="sort status" data-sort="status" scope="col" id="tableStatusTh" >@lang('admin.Status')</th>
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
                                                    <td exportname="Image" id="listItemImageBox" class="c-table__cell" style="width: 100px; cursor:pointer;" > <img src="{{asset($DB_Find[$i]->img_url)}}" data-bs-toggle="modal" data-bs-target="#modalImage" data-id="{{$DB_Find[$i]->id}}" data-src="{{$DB_Find[$i]->img_url}}"  alt="" class="avatar-xs rounded-circle me-2" data-toggle="modal" data-target="#modalImage" ></td>
                                                    
                                                    <td exportname="Name" > {{$DB_Find[$i]->name}}</td>
                                                    <td exportname="Surname" > {{$DB_Find[$i]->surname}}</td>
                                                    <td exportname="Email" > {{$DB_Find[$i]->email}}</td>
                                                    <td exportname="Value" class="order_value"> {{$DB_Find[$i]->value}}</td>
                                                
                                                    <td exportname="Status" class="status" id="tableStatus" data_val="{{$DB_Find[$i]->isActive}}">
                                                        @if($DB_Find[$i]->isActive == 1)  <span class="badge badge-soft-success text-uppercase" >@lang('admin.Active')</span>
                                                        @elseif($DB_Find[$i]->isActive == 0)  <span class="badge badge-soft-danger text-uppercase">@lang('admin.Passive')</span>
                                                        @endif
                                                    </td>

                                                    <td exportname="Actions" id="listItemActionBox" > 
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                           <li class="list-inline-item" title ="@lang('admin.Visibility')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View" style="cursor:pointer;" > @if($DB_Find[$i]->isActive == 1) <a class="view-item-btn text-success"><button class="btn btn-success waves-effect waves-light" style="width: 45px;height: 45px;"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="true"  ><i  class="ri-eye-fill align-bottom"  id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="true" ></i></button></a>  @elseif($DB_Find[$i]->isActive == 0)  <a class="view-item-btn"><button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px;" id="listItemActive" data_id="{{$DB_Find[$i]->id}}" data_active="false" ><i class="ri-eye-off-fill align-bottom" id="listItemActive" data_id="{{$DB_Find[$i]->id}}"  data_active="false" ></i></button></a>  @endif </li>
                                                            <li class="list-inline-item" title ="@lang('admin.Search')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View"><a href="/sabit_list/view/{{$DB_Find[$i]->id}}" class="view-item-btn text-info "><i class="ri-search-eye-line align-bottom "></i></a> </li>
                                                            <li class="list-inline-item" title ="@lang('admin.Search')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View"><a  data-bs-toggle="modal" data-bs-target="#searchModal" data-id="{{$DB_Find[$i]->id}}" data-name="{{$DB_Find[$i]->name}}" data-surname="{{$DB_Find[$i]->surname}}" data-email="{{$DB_Find[$i]->email}}" data-value="{{$DB_Find[$i]->value}}" class="view-item-btn text-success" style="cursor:pointer;"><i class="ri-search-eye-line align-bottom "></i></a> </li>
                                                            <li class="list-inline-item edit"  title ="@lang('admin.Edit')"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"> <a href="/sabit_list/edit/{{$DB_Find[$i]->id}}" class="text-info d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i> </a> </li>
                                                            <li class="list-inline-item edit" title ="@lang('admin.Edit')" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#edit_modal" data-id="{{$DB_Find[$i]->id}}" data-created_at="{{$DB_Find[$i]->created_at}}" data-isActive="{{$DB_Find[$i]->isActive}}" data-name="{{$DB_Find[$i]->name}}" data-surname="{{$DB_Find[$i]->surname}}" data-email="{{$DB_Find[$i]->email}}" data-value="{{$DB_Find[$i]->value}}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i> </a> </li>
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
            <script src="{{asset('/assets/admin')}}/js/3_list.js"></script>

        </footer>