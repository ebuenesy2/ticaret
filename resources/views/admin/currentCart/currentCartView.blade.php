
<!doctype html>
<html lang="@lang('admin.lang')" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> @lang('admin.CurrentCardInformation') | {{ config('admin.Admin_Title') }}</title>
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

           
            <!--- Info -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{$DB_Find->current_name}}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div>@lang('admin.createdDate') : <span class="fw-medium">{{$DB_Find->created_at}}</span></div>
                                                        <div class="vr"></div>
                                                        <div>@lang('admin.CurrentCode') : <span class="fw-medium">{{$DB_Find->current_code}}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-1 flex-wrap">
                                            <a href="/current/cart/@lang('admin.lang')/update/{{$DB_Find->id}}"><button type="button" class="btn py-0 fs-16 text-body"> <i class="ri-pencil-fill " style="color: black;font-size: 25px;" ></i> </button></a>
                                        </div> 
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-body active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab"> @lang('admin.Information') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab"> @lang('admin.adress') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body fw-semibold" data-bs-toggle="tab" href="#project-BankInformation" role="tab"> @lang('admin.BankInformation') </a>
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
                        <h4 class="mb-sm-0">@lang('admin.CurrentCardInformation')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/current/cart/list/@lang('admin.lang')">@lang('admin.CurrentCardList')</a></li>
                                <li class="breadcrumb-item active">@lang('admin.CurrentCardInformation')</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">

                        <!--- Bilgiler -->
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                               
                                <div class="col-xl-9 col-lg-8">

                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">@lang('admin.Information')</h6>
                                                <div class="d-flex flex-column" style="gap: 0.5px;" >
                                                    <div class="d-flex flex-row gap-1" ><p>@lang('admin.CurrentName'):</p><p>{{$DB_Find->current_name}}</p></div>
                                                    <div class="d-flex flex-row gap-1" ><p>@lang('admin.ShortName'):</p><p>{{$DB_Find->short_name}}</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                     <!-- Card Son -->

                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">@lang('admin.Description')</h6>
                                                {!!$DB_Find->description!!}
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                     <!-- Card Son -->
                                    

                                </div>
                              
                                
                                <div class="col-xl-3 col-lg-4">

                                     <!--Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">@lang('admin.AuthorizedPerson')</h5>
                                            <div class="d-flex flex-column" style="gap: 0.5px;" >
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.AuthorizedPerson'):</p><p>{{$DB_Find->authorized_person}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.AuthorizedPerson') @lang('admin.Department'):</p><p>{{$DB_Find->authorized_person_role}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.AuthorizedPhone'):</p><a href="tel://{{$DB_Find->authorized_person_tel}}">{{$DB_Find->authorized_person_tel}}</a></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.AuthorizedPerson') Whatsap:</p><a href="https://wa.me/{{$DB_Find->authorized_person_whatsap}}" target="_blank" rel="noopener noreferrer">WhatsApp</a></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.AuthorizedPerson') Email:</p><a class="c-btn c-btn--info" target="_blank" href="mailto:{{$DB_Find->authorized_person_mail}}">{{$DB_Find->authorized_person_mail}}</a></div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                     <!--Card Son -->

                                       <!--Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Referans Bilgileri</h5>
                                            <div class="d-flex flex-column" style="gap: 0.5px;" >
                                                <div class="d-flex flex-row gap-1" ><p>Refarans Adı:</p><p>{{$DB_Find->ref_person}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.Department'):</p><p>{{$DB_Find->ref_departman}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>Tel</p><a href="tel://{{$DB_Find->ref_phone}}">{{$DB_Find->ref_phone}}</a></div>
                                                <div class="d-flex flex-row gap-1" ><p>Email:</p><a class="c-btn c-btn--info" target="_blank" href="mailto:{{$DB_Find->ref_email}}">{{$DB_Find->ref_email}}</a></div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                     <!--Card Son -->

                        
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!--- Bilgiler Son -->

                        <!--- Adres -->
                        <div class="tab-pane fade" id="project-documents" role="tabpanel">

                           <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                   
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">@lang('admin.adress')</h6>
                                                {{$DB_Find->address}}
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">@lang('admin.InvoiceAddress')</h6>
                                                {{$DB_Find->billing_address}}
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->


                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">Vergi Dairesi</h6>
                                                {{$DB_Find->tax_administration}}
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->


                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 text-uppercase">Vergi No</h6>
                                                {{$DB_Find->tax_number}}
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                    

                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">

                                    <!--- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">@lang('admin.Information')</h5>
                                            <div class="d-flex flex-column" style="gap: 0.5px;" >
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.Country'):</p><p>{{$DB_Find->country}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.City'):</p><p>{{$DB_Find->city}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.Ditsrict'):</p><p>{{$DB_Find->district}}</p></div>
                                                <div class="d-flex flex-row gap-1" ><p>@lang('admin.PostCode'):</p><p>{{$DB_Find->post_code}}</p></div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!--- Card Son -->


                                    <!--- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Web</h5>
                                            <div class="d-flex flex-column" style="gap: 0.5px;" >
                                                <div class="d-flex flex-row gap-1" ><p>Web:</p><a href="{{$DB_Find->web_address}}">{{$DB_Find->web_address}}</a></div>
                                                <div class="d-flex flex-row gap-1" ><p>Email:</p><a class="c-btn c-btn--info" target="_blank" href="mailto:{{$DB_Find->email}}">{{$DB_Find->email}}</a></div>
                                                <div class="d-flex flex-row gap-1" ><p>Email cc:</p><a class="c-btn c-btn--info" target="_blank" href="mailto:{{$DB_Find->email_cc}}">{{$DB_Find->email_cc}}</a></div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!--- Card Son -->

                        
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                         <!--- Adres Son -->

                         <!--- BankInformation -->
                        <div class="tab-pane fade" id="project-BankInformation" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <!-- Banka Bilgileri  --->
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between ">
                                            <h5 class="card-title mb-0 flex-grow-1" style="display: flex;gap: 5px;" > <p id="tableTitle" >@lang('admin.Bank') @lang('admin.List')</p> <p> | {{count($DB_Find_Bank)}}</p> </h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="table-responsive table-card">
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light text-muted">
                                                        <tr style="cursor:pointer;" >

                                                            <th exportname="Id" class="sort" data-sort="type" scope="col" id="checkItemBox"  >Id</th>
                                                            <th exportname="CreatedDate" class="sort" data-sort="order_date" scope="col" >@lang('admin.createdDate')</th>
                                                        
                                                            <th exportname="bankTitle" >@lang('admin.BankTitle')</th>
                                                            <th exportname="branch" >@lang('admin.Branch')</th>
                                                            <th exportname="accountNumber" >@lang('admin.AcountNumber')</th>
                                                            <th exportname="iban" >@lang('admin.Iban')</th>
                                                            <th exportname="swift" >@lang('admin.Swift')</th>

                                                            <th exportname="Status" class="sort status" data-sort="status" scope="col" id="tableStatusTh" >@lang('admin.Status')</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end thead-->
                                                    <tbody class="list form-check-all">

                                                        <!--tr-->
                                                        <tr style="display:none;"  id="tableConst" ><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> </tr>
                                                        <!--end tr-->

                                                        @for ($i = 0; $i < count($DB_Find_Bank); $i++)
                                                            <tr>
                                                                                                                
                                                              
                                                                <td exportname="Id" id="itemID" class="type"> {{$DB_Find_Bank[$i]->id}}</td>
                                                                <td exportname="CreatedDate" class="order_date"> {{$DB_Find_Bank[$i]->created_at}}</td>
                                                            
                                                                <td exportname="bankTitle" >{{$DB_Find_Bank[$i]->bankTitle}}</td>
                                                                <td exportname="branch" >{{$DB_Find_Bank[$i]->branch}}</td>
                                                                <td exportname="accountNumber" >{{$DB_Find_Bank[$i]->accountNumber}}</td>
                                                                <td exportname="iban" >{{$DB_Find_Bank[$i]->iban}}</td>
                                                                <td exportname="swift" >{{$DB_Find_Bank[$i]->swift}}</td>
                                                            
                                                                <td exportname="Status" class="status" id="tableStatus" data_val="{{$DB_Find_Bank[$i]->isActive}}">
                                                                    @if($DB_Find_Bank[$i]->isActive == 1)  <span class="badge badge-soft-success text-uppercase" >@lang('admin.Active')</span>
                                                                    @elseif($DB_Find_Bank[$i]->isActive == 0)  <span class="badge badge-soft-danger text-uppercase">@lang('admin.Passive')</span>
                                                                    @endif
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

                                 

                                </div>
                                <!-- ene col -->
                                 


                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!--- BankInformation Son -->

                        
                       
                    </div>
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
        <script src="{{asset('/assets/admin')}}/js/0_const.js"></script>

    </footer>