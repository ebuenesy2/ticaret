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

            <!--- Info -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{asset('/assets/admin')}}/assets/images/brands/slack.png" alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">Velzon - Admin & Dashboard</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-building-line align-bottom me-1"></i> Themesbrand</div>
                                                        <div class="vr"></div>
                                                        <div>Create Date : <span class="fw-medium">15 Sep, 2021</span></div>
                                                        <div class="vr"></div>
                                                        <div>Due Date : <span class="fw-medium">29 Dec, 2021</span></div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-info fs-12">New</div>
                                                        <div class="badge rounded-pill bg-danger fs-12">High</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-1 flex-wrap">
                                            <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                                <i class="ri-star-fill"></i>
                                            </button>
                                            <button type="button" class="btn py-0 fs-16 text-body">
                                                <i class="ri-share-line"></i>
                                            </button>
                                            <button type="button" class="btn py-0 fs-16 text-body">
                                                <i class="ri-flag-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-body active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                            Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab">
                                            Documents
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body fw-semibold" data-bs-toggle="tab" href="#project-activities" role="tab">
                                            Activities
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                            Team
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
             <!--- Info End -->
       
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Project</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Projects</a></li>
                                <li class="breadcrumb-item active">Create Project</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            

            <!--  row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="project-title-input">Project Title</label>
                                <input type="text" class="form-control" id="project-title-input" placeholder="Enter project title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                                <input class="form-control" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="descriptionEdit">@lang('admin.Description')</label>
                                <textarea  class="form-control" id="descriptionEdit" rows="10" cols="80"> !!$DB_Find->description!! </textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-lg-0">
                                        <label for="choices-priority-input" class="form-label">Priority</label>
                                        <select class="form-select" data-choices data-choices-search-false id="choices-priority-input">
                                            <option value="High" selected>High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-lg-0">
                                        <label for="choices-status-input" class="form-label">Status</label>
                                        <select class="form-select" data-choices data-choices-search-false id="choices-status-input">
                                            <option value="Inprogress" selected>Inprogress</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Deadline</label>
                                        <input type="text" class="form-control" id="datepicker-deadline-input" placeholder="Enter due date" data-provider="flatpickr">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Attached files</h5>
                        </div>
                        <div class="card-body">
                            <p> Dosya Yükleme </p>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-danger w-sm">Delete</button>
                        <button type="submit" class="btn btn-secondary w-sm">Draft</button>
                        <button type="submit" class="btn btn-success w-sm">Create</button>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Privacy</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="choices-privacy-status-input" class="form-label">Status</label>
                                <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                                    <option value="Private" selected>Private</option>
                                    <option value="Team">Team</option>
                                    <option value="Public">Public</option>
                                </select>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="choices-categories-input" class="form-label">Categories</label>
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing" selected>Designing</option>
                                    <option value="Development">Development</option>
                                </select>
                            </div>

                            <div>
                                <label for="choices-text-input" class="form-label">Skills</label>
                                <input class="form-control" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Enter Skills" type="text" value="UI/UX, Figma, HTML, CSS, Javascript, C#, Nodejs" />
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Members</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="choices-lead-input" class="form-label">Team Lead</label>
                                <select class="form-select" data-choices data-choices-search-false id="choices-lead-input">
                                    <option value="Brent Gonzalez" selected>Brent Gonzalez</option>
                                    <option value="Darline Williams">Darline Williams</option>
                                    <option value="Sylvia Wright">Sylvia Wright</option>
                                    <option value="Ellen Smith">Ellen Smith</option>
                                    <option value="Jeffrey Salazar">Jeffrey Salazar</option>
                                    <option value="Mark Williams">Mark Williams</option>
                                </select>
                            </div>

                            <div>
                                <label class="form-label">Team Members</label>
                                <div class="avatar-group">
                                    <a href="#" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <img src="/assets/img/user/default.jpg" alt="" class="rounded-circle img-fluid">
                                        </div>
                                    </a>
                                  
                                    <a href="#" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                        <div class="avatar-xs">
                                            <img src="/assets/img/user/default.jpg" alt="" class="rounded-circle img-fluid">
                                        </div>
                                    </a>
                                    <a href="#" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                        <div class="avatar-xs" data-bs-toggle="modal" data-bs-target="#inviteMembersModal">
                                            <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                +
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
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
        <script src="{{asset('/assets/admin')}}/js/sabit/0_const.js"></script>

    </footer>