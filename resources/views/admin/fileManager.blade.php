<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.FileManager') | {{ config('admin.Admin_Title') }}</title>
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

    <!-- Page-content -->
    <div class="page-content">
       <div class="container-fluid">

        <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
            <div class="file-manager-sidebar">
                <div class="p-3 d-flex flex-column h-100">
                    <div class="mb-3">
                        <h5 class="mb-0 fw-bold">@lang('admin.FileManager')</h5>
                    </div>
                    <div class="search-box">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-2-line search-icon"></i>
                    </div>
                    <div class="mt-3 mx-n4 px-4 file-menu-sidebar-scroll" data-simplebar>
                        <ul class="list-unstyled file-manager-menu">
                            <li>
                                <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                    <i class="ri-folder-2-line align-bottom me-2"></i> <span class="file-list-link">My Drive</span>
                                </a>
                                <div class="collapse show" id="collapseExample">
                                    <ul class="sub-menu list-unstyled">
                                        <li>
                                            <a href="#!">Assets</a>
                                        </li>
                                        <li>
                                            <a href="#!">Marketing</a>
                                        </li>
                                        <li>
                                            <a href="#!">Personal</a>
                                        </li>
                                        <li>
                                            <a href="#!">Projects</a>
                                        </li>
                                        <li>
                                            <a href="#!">Templates</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#!"><i class="ri-file-list-2-line align-bottom me-2"></i> <span class="file-list-link">Documents</span></a>
                            </li>
                            <li>
                                <a href="#!"><i class="ri-image-2-line align-bottom me-2"></i> <span class="file-list-link">Media</span></a>
                            <li>
                                <a href="#!"><i class="ri-history-line align-bottom me-2"></i> <span class="file-list-link">Recents</span></a>
                            </li>
                            <li>
                                <a href="#!"><i class="ri-star-line align-bottom me-2"></i> <span class="file-list-link">Important</span></a>
                            </li>
                            </li>
                            <li>
                                <a href="#!"><i class="ri-delete-bin-line align-bottom me-2"></i> <span class="file-list-link">Deleted</span></a>
                            </li>
                        </ul>
                    </div>


                    <div class="mt-auto">
                        <h6 class="fs-11 text-muted text-uppercase mb-3">Storage Status</h6>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-database-2-line fs-17"></i>
                            </div>
                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                <div class="progress mb-2 progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-muted fs-12 d-block text-truncate"><b>47.52</b>GB used of <b>119</b>GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="file-manager-content w-100 p-3 py-0">
                <div class="mx-n3 pt-4 px-4 file-manager-content-scroll" data-simplebar>
                    <div id="folder-list" class="mb-2">
                        <div class="row justify-content-beetwen g-2 ">

                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2 d-block d-lg-none">
                                        <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                                            <i class="ri-menu-2-fill align-bottom"></i>
                                        </button>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-16 mb-0">Folders</h5>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2 align-items-start">
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="file-type">
                                        <option value="">File Type</option>
                                        <option value="All" selected>All</option>
                                        <option value="Video">Video</option>
                                        <option value="Images">Images</option>
                                        <option value="Music">Music</option>
                                        <option value="Documents">Documents</option>
                                    </select>

                                    <button class="btn btn-success w-sm create-folder-modal" data-bs-toggle="modal" data-bs-target="#createFolderModal"><i class="ri-add-line align-bottom me-1"></i> Create Folders</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row" id="folderlist-data">
                            <div class="col-xxl-3 col-6 folder-card">
                                <div class="card bg-light shadow-none" id="folder-1">
                                    <div class="card-body">
                                        <div class="d-flex mb-1">
                                            <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                                <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_1" checked>
                                                <label class="form-check-label" for="folderlistCheckbox_1"></label>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Open</a></li>
                                                    <li><a class="dropdown-item edit-folder-list" href="#createFolderModal" data-bs-toggle="modal" role="button">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#removeFolderModal" data-bs-toggle="modal" role="button">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <div class="mb-2">
                                                <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                            </div>
                                            <h6 class="fs-15 folder-name">Projects</h6>
                                        </div>
                                        <div class="hstack mt-4 text-muted">
                                            <span class="me-auto"><b>349</b> Files</span>
                                            <span><b>4.10</b>GB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-6 folder-card">
                                <div class="card bg-light shadow-none" id="folder-2">
                                    <div class="card-body">
                                        <div class="d-flex mb-1">
                                            <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                                <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_2">
                                                <label class="form-check-label" for="folderlistCheckbox_2"></label>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Open</a></li>
                                                    <li><a class="dropdown-item edit-folder-list" href="#createFolderModal" data-bs-toggle="modal" role="button">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#removeFolderModal" data-bs-toggle="modal" role="button">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <div class="mb-2">
                                                <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                            </div>
                                            <h6 class="fs-15 folder-name">Documents</h6>
                                        </div>
                                        <div class="hstack mt-4 text-muted">
                                            <span class="me-auto"><b>2348</b> Files</span>
                                            <span><b>27.01</b>GB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-6 folder-card">
                                <div class="card bg-light shadow-none" id="folder-3">
                                    <div class="card-body">
                                        <div class="d-flex mb-1">
                                            <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                                <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_3">
                                                <label class="form-check-label" for="folderlistCheckbox_3"></label>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Open</a></li>
                                                    <li><a class="dropdown-item edit-folder-list" href="#createFolderModal" data-bs-toggle="modal" role="button">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#removeFolderModal" data-bs-toggle="modal" role="button">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <div class="mb-2">
                                                <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                            </div>
                                            <h6 class="fs-15 folder-name">Media</h6>
                                        </div>
                                        <div class="hstack mt-4 text-muted">
                                            <span class="me-auto"><b>12480</b> Files</span>
                                            <span><b>20.87</b>GB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-6 folder-card">
                                <div class="card bg-light shadow-none" id="folder-4">
                                    <div class="card-body">
                                        <div class="d-flex mb-1">
                                            <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                                <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_4" checked>
                                                <label class="form-check-label" for="folderlistCheckbox_4"></label>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Open</a></li>
                                                    <li><a class="dropdown-item edit-folder-list" href="#createFolderModal" data-bs-toggle="modal" role="button">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#removeFolderModal" data-bs-toggle="modal" role="button">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <div class="mb-2">
                                                <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                            </div>
                                            <h6 class="fs-15 folder-name">Velzon v1.7.0</h6>
                                        </div>
                                        <div class="hstack mt-4 text-muted">
                                            <span class="me-auto"><b>180</b> Files</span>
                                            <span><b>478.65</b>MB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <h5 class="flex-grow-1 fs-16 mb-0" id="filetype-title">Recent File</h5>
                            <div class="flex-shrink-0">
                                <button class="btn btn-success createFile-modal" data-bs-toggle="modal" data-bs-target="#createFileModal"><i class="ri-add-line align-bottom me-1"></i> Create File</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-active">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">File Item</th>
                                        <th scope="col">File Size</th>
                                        <th scope="col">Recent Date</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="file-list"></tbody>
                            </table>
                        </div>
                        <!-- <a href="javascript:prevPage()" id="btn_prev">Prev</a> -->
                        <ul id="pagination" class="pagination pagination-lg"></ul>
                        <!-- <a href="javascript:nextPage()" id="btn_next">Next</a> -->
                        <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                            <div class="col-sm">
                                <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">←</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">→</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
       </div>
    </div>
    <!-- End Page-content -->

    <!-- START CREATE FOLDER MODAL -->
    <div class="modal fade zoomIn" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createFolderModalLabel">Create Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" class="needs-validation createfolder-form" id="createfolder-form" novalidate>
                        <div class="mb-4">
                            <label for="foldername-input" class="form-label">Folder Name</label>
                            <input type="text" class="form-control" id="foldername-input" required>
                            <div class="invalid-feedback">Please enter a folder name.</div>
                            <input type="hidden" class="form-control" id="folderid-input" value="">
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewFolder">Add Folder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END CREATE FOLDER MODAL -->

    <footer>

        <!------- Footer --->
        @include('admin.include.footer')

        <!------- Js --->
        <script src="{{asset('/assets/admin')}}/js/5_fileManager.js"></script>

    </footer>