<footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © {{ config('admin.CompanyTitle') }}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block"> {{ config('admin.CompanyDescription') }} </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
  

    <!-- JAVASCRIPT -->
    <script src="{{asset('/assets/admin')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/assets/admin')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('/assets/admin')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('/assets/admin')}}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('/assets/admin')}}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('/assets/admin')}}/assets/js/plugins.js"></script>


    <!----  ckeditor --->
    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

    <!-- App js -->
    <script src="{{asset('/assets/admin')}}/assets/js/app.js"></script>

    <!--------- Jquery  Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  

     <!-- Sweet Alerts js -->
     <script src="{{asset('/assets/js')}}/sweetalert2/sweetalert2.min.js"></script>

     <!--- Alert toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>