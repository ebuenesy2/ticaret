
<!------- Menu Array ------->
<?php 

    $menuList = array(
       'dashboard' =>  array(
            'id' => 'dashboards',
            'icon'=>'bx bxs-dashboard',
            'tr'=> array('title'=> 'Dashboard', 'url'=> '#'),
            'en'=> array('title'=> 'Dashboard', 'url'=> '#'),
            'de'=> array('title'=> 'Armaturenbrett', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Dashboard', 'url'=> '/admin'),
                    'en'=> array('icon'=>'#','title'=> 'Dashboard', 'url'=> '/admin/en'),
                    'de'=> array('icon'=>'#','title'=> 'Armaturenbrett', 'url'=> '/admin/de')
                ),
            )
        ),
       'current_card' =>  array(
            'id' => 'current_card',
            'icon'=>'ri-building-4-fill',
            'tr'=> array('title'=> 'Kart', 'url'=> '#'),
            'en'=> array('title'=> 'Card', 'url'=> '#'),
            'de'=> array('title'=> 'Karte', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Stok', 'url'=> '/stock'),
                    'en'=> array('icon'=>'#','title'=> 'Stock', 'url'=> '/stock/en'),
                    'de'=> array('icon'=>'#','title'=> 'Aktie', 'url'=> '/stock/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Cari Kart', 'url'=> '/current/cart/list'),
                    'en'=> array('icon'=>' #','title'=> 'Current Card', 'url'=> '/current/cart/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Aktuelle Karte', 'url'=> '/current/cart/list/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Personel Kartı', 'url'=> '/user/list'),
                    'en'=> array('icon'=>' #','title'=> 'Personnel Card', 'url'=> '/user/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Personalkarte', 'url'=> '/user/list/de')
                )             
            
            )
        ),
       'request_form' =>  array(
            'id' => 'request_form',
            'icon'=>'ri-git-repository-line',
            'tr'=> array('title'=> 'Müşteri Talep Formu', 'url'=> '#'),
            'en'=> array('title'=> 'Request', 'url'=> '#'),
            'de'=> array('title'=> 'Inquiry', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Müşteri Talep Formu', 'url'=> '/request/form/list'),
                    'en'=> array('icon'=>'#','title'=> 'Request Form', 'url'=> '/request/form/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Anfrageformular', 'url'=> '/request/form/list/de')
                ),
                  
            )
        ),
        'get_offers' =>  array(
            'id' => 'get_offers',
            'icon'=>' ri-dual-sim-1-fill',
            'tr'=> array('title'=> 'Tedarik Talep Formu ', 'url'=> '#'),
            'en'=> array('title'=> 'Get Offers', 'url'=> '#'),
            'de'=> array('title'=> 'Holen Sie sich Angebote', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Tedarik Talep Formu ', 'url'=> '/get/offers/list'),
                    'en'=> array('icon'=>'#','title'=> 'Get Offers Form', 'url'=> '/get/offers/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Angebotsformular einholen', 'url'=> '/get/offers/list/de')
                ),
                  
            )
        ),
       'finance' =>  array(
            'id' => 'finance',
            'icon'=>'ri-wallet-line',
            'tr'=> array('title'=> 'Maliye', 'url'=> '#'),
            'en'=> array('title'=> 'Finance', 'url'=> '#'),
            'de'=> array('title'=> 'Finanzen', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Maliyet Hesaplama Listesi', 'url'=> '/cost/calculation/list'),
                    'en'=> array('icon'=>'#','title'=> 'Cost Calculation List', 'url'=> '/cost/calculation/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Proforma-Rechnung', 'url'=> '/cost/calculation/list/de')
                ),
            )
        ),
        'proforma' =>  array(
            'id' => 'proforma',
            'icon'=>'ri-attachment-line',
            'tr'=> array('title'=> 'Proforma', 'url'=> '#'),
            'en'=> array('title'=> 'Proforma', 'url'=> '#'),
            'de'=> array('title'=> 'Proforma', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Proforma Fatura Listesi', 'url'=> '/proforma/invoice/list'),
                    'en'=> array('icon'=>'#','title'=> 'Proforma Invoice List', 'url'=> '/proforma/invoice/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Proforma-Rechnungsliste', 'url'=> '/proforma/invoice/list/de')
                ),
            )
         ),

       'work' =>  array(
            'id' => 'work',
            'icon'=>'ri-boxing-line',
            'tr'=> array('title'=> 'İŞ', 'url'=> '#'),
            'en'=> array('title'=> 'Work', 'url'=> '#'),
            'de'=> array('title'=> 'Arbeiten', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'İş Takip Durum Raporu', 'url'=> '/job_tracking_report'),
                    'en'=> array('icon'=>'#','title'=> 'Job Tracking Status Report', 'url'=> '/job_tracking_report/en'),
                    'de'=> array('icon'=>'#','title'=> 'Job-Tracking-Statusbericht', 'url'=> '/job_tracking_report/de')
                ),
            )
         ),
       'pages' =>  array(
            'id' => 'pages',
            'icon'=>'bx bx-file',
            'tr'=> array('title'=> 'Sayfalar', 'url'=> '#'),
            'en'=> array('title'=> 'Pages', 'url'=> '#'),
            'de'=> array('title'=> 'Seiten', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Sabit', 'url'=> '/sabit'),
                    'en'=> array('icon'=>'#','title'=> 'Const', 'url'=> '/sabit/en'),
                    'de'=> array('icon'=>'#','title'=> 'Konstante', 'url'=> '/sabit/de')
                ),
             
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Hata Sayfaları', 'url'=> '/const'),
                    'en'=> array('icon'=>'#','title'=> 'Error Pages', 'url'=> '/const/en'),
                    'de'=> array('icon'=>'#','title'=> 'Fehlerseiten', 'url'=> '/const/de'),
                    'pages'=> array(
                         array(
                             'tr'=> array('icon'=>' #','title'=> '500 Hatası', 'url'=> '/error/500'),
                             'en'=> array('icon'=>' #','title'=> '500 Error', 'url'=> '/error/500/en'),
                             'de'=> array('icon'=>' #','title'=> '500 Fehler', 'url'=> '/error/500/de')
                         ),
                         array(
                             'tr'=> array('icon'=>' #','title'=> 'Hesap Askıda', 'url'=> '/error/account/block/500'),
                             'en'=> array('icon'=>' #','title'=> 'Account Suspend', 'url'=> '/error/account/block/en'),
                             'de'=> array('icon'=>' #','title'=> 'Konto sperren', 'url'=> '/error/account/block/de')
                         )
                    )
                )
            )
         ),
       'personel' =>  array(
            'id' => 'personel',
            'icon'=>'bx bx-user-circle',
            'tr'=> array('title'=> 'Personel', 'url'=> '#'),
            'en'=> array('title'=> 'Personnel', 'url'=> '#'),
            'de'=> array('title'=> 'Personnel', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Giriş Sayfası', 'url'=> '/user/login'),
                    'en'=> array('icon'=>' #','title'=> 'Login Page', 'url'=> '/user/login/en'),
                    'de'=> array('icon'=>' #','title'=> 'Loginseite', 'url'=> '/user/login/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Kayıt Sayfası', 'url'=> '/user/register'),
                    'en'=> array('icon'=>' #','title'=> 'Register Page', 'url'=> '/user/register/en'),
                    'de'=> array('icon'=>' #','title'=> 'Seite registrieren', 'url'=> '/user/register/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Şifremi Unuttum', 'url'=> '/user/forgot_password'),
                    'en'=> array('icon'=>' #','title'=> 'Forgot My Password', 'url'=> '/user/forgot_password/en'),
                    'de'=> array('icon'=>' #','title'=> 'Passwort Vergessen', 'url'=> '/user/forgot_password/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Yeni Şifre Oluştur', 'url'=> '/user/create_password'),
                    'en'=> array('icon'=>' #','title'=> 'Create New Password', 'url'=> '/user/create_password/en'),
                    'de'=> array('icon'=>' #','title'=> 'Neues Passwort erstellen', 'url'=> '/user/create_password/de')
                ),
            )
        ),
       'file' =>  array(
            'id' => 'file',
            'icon'=>'ri-file-fill',
            'tr'=> array('title'=> 'Dosya', 'url'=> '#'),
            'en'=> array('title'=> 'File', 'url'=> '#'),
            'de'=> array('title'=> 'Datei', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Sabit Dosya Yükleme', 'url'=> '/file/upload'),
                    'en'=> array('icon'=>'#','title'=> 'Const FileUpload', 'url'=> '/file/upload/en'),
                    'de'=> array('icon'=>'#','title'=> 'Konstante Datei-Upload', 'url'=> '/file/upload/de')
                ),
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Sabit Çoklu Dosya Yükleme', 'url'=> '/file/upload_multi'),
                    'en'=> array('icon'=>'#','title'=> 'Const Multi FileUpload', 'url'=> '/file/upload_multi/en'),
                    'de'=> array('icon'=>'#','title'=> 'Konstante Multi-Datei-Upload', 'url'=> '/file/upload_multi/de')
                ),
            )
        ),
        'analysis' =>  array(
            'id' => 'file',
            'icon'=>'ri-file-fill',
            'tr'=> array('title'=> 'Ürün Fiyat Analizi', 'url'=> '#'),
            'en'=> array('title'=> 'Product Price Analysis', 'url'=> '#'),
            'de'=> array('title'=> 'Produktpreisanalyse', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Ürün Listesi', 'url'=> '/analysis/product/list'),
                    'en'=> array('icon'=>'#','title'=> 'Product List', 'url'=> '/analysis/product/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Produktliste', 'url'=> '/analysis/product/list/de')
                ),
                array(
                    'tr'=> array('icon'=>'#','title'=> 'Analiz Listesi', 'url'=> '/analysis/list'),
                    'en'=> array('icon'=>'#','title'=> 'Analysis List', 'url'=> '/analysis/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Analyseliste', 'url'=> '/analysis/list/de')
                ),
            )
        ),
        'tracking' =>  array(
            'id' => 'file',
            'icon'=>'bx bx-task',
            'tr'=> array('title'=> 'İş Takibi', 'url'=> '#'),
            'en'=> array('title'=> 'Business Tracking', 'url'=> '#'),
            'de'=> array('title'=> 'Geschäftsverfolgung', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>'#','title'=> 'İş Takibi', 'url'=> '/business/tracking/list'),
                    'en'=> array('icon'=>'#','title'=> 'Business Tracking', 'url'=> '/business/tracking/list/en'),
                    'de'=> array('icon'=>'#','title'=> 'Geschäftsverfolgung', 'url'=> '/business/tracking/list/de')
                ),
            )
        ),
       'settings' =>  array(
            'id' => 'setting',
            'icon'=>'mdi mdi-cog-outline',
            'tr'=> array('title'=> 'Ayarlar', 'url'=> '#'),
            'en'=> array('title'=> 'Settings', 'url'=> '#'),
            'de'=> array('title'=> 'Einstellungen', 'url'=> '#'),
            'pages'=> array(
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Kategori Listesi', 'url'=> '/category/list'),
                    'en'=> array('icon'=>' #','title'=> 'Category List', 'url'=> '/category/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Kategorieliste', 'url'=> '/category/list/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Alt Kategori Listesi', 'url'=> '/category/sub/list'),
                    'en'=> array('icon'=>' #','title'=> 'Sub Category List', 'url'=> '/category/sub/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Unterkategorieliste', 'url'=> '/category/sub/list/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Maliyet Hesaplama Sabit Giderler', 'url'=> '/cost/calculation/fixed/expenses/list'),
                    'en'=> array('icon'=>' #','title'=> 'Cost Calculation Fixed Expenses', 'url'=> '/cost/calculation/fixed/expenses/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Kostenberechnung Fixkosten', 'url'=> '/cost/calculation/fixed/expenses/list/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Banka Listesi', 'url'=> '/bank/list'),
                    'en'=> array('icon'=>' #','title'=> 'Bank List', 'url'=> '/bank/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Bankliste', 'url'=> '/bank/list/de')
                ),
                array(
                    'tr'=> array('icon'=>' #','title'=> 'Proforma Şartları', 'url'=> '/general/conditions/list'),
                    'en'=> array('icon'=>' #','title'=> 'Proforma Conditions', 'url'=> '/general/conditions/list/en'),
                    'de'=> array('icon'=>' #','title'=> 'Allgemeine Bedingungen Liste', 'url'=> '/general/conditions/list/de')
                ),
            )
        ),
      
    );  
    

 ?>
<!------- Menu Array Son ------->
 <!------- Menu List Gösterme ------->
<div class="app-menu navbar-menu">
   
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ config('admin.Admin_Logo.dark.url') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.dark.sm.imgUrl') }}" alt="{{ config('admin.Admin_Logo.dark.sm.imgAltDescription') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.dark.lg.imgUrl') }}" alt="{{ config('admin.Admin_Logo.dark.lg.imgAltDescription') }}" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ config('admin.Admin_Logo.light.url') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.light.sm.imgUrl') }}" alt="{{ config('admin.Admin_Logo.light.sm.imgAltDescription') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/assets') }}{{ config('admin.Admin_Logo.light.lg.imgUrl') }}" alt="{{ config('admin.Admin_Logo.light.lg.imgAltDescription') }}" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <!-- END LOGO -->

    <!-- Menu List -->
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
               
                    <!-- Dashboard  -->
                    <li class="nav-item" style="display:none;" >
                        <a class="nav-link menu-link" href="#{{$menuList['dashboard']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['dashboard']['id']}}">
                            <i class="{{$menuList['dashboard']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['dashboard'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['dashboard']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['dashboard']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['dashboard']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                            
                            </ul>
                        </div>
                    </li>
                    <!-- Dashboard Son -->

                    <!-- Current_card  -->
                    <li class="nav-item"  >
                        <a class="nav-link menu-link" href="#{{$menuList['current_card']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['current_card']['id']}}">
                            <i class="{{$menuList['current_card']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['current_card'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['current_card']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['current_card']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['current_card']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['current_card']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['current_card']['pages'][1][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['current_card']['pages'][2][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['current_card']['pages'][2][__('admin.lang')]['title']}} </a> </li>
                            
                            </ul>
                        </div>
                    </li>
                    <!-- Current_card Son -->

                    <!-- Request_form  -->
                    <li class="nav-item"  >
                        <a class="nav-link menu-link" href="#{{$menuList['request_form']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['request_form']['id']}}">
                            <i class="{{$menuList['request_form']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['request_form'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['request_form']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['request_form']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['request_form']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                              
                            
                            </ul>
                        </div>
                    </li>
                    <!-- request_form Son -->

                    <!--  get_offers -->
                    <li class="nav-item"  >
                        <a class="nav-link menu-link" href="#{{$menuList['get_offers']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['get_offers']['id']}}">
                            <i class="{{$menuList['get_offers']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['get_offers'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['get_offers']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['get_offers']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['get_offers']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                              
                            
                            </ul>
                        </div>
                    </li>
                    <!-- get_offers Son -->

                    <!-- Finance  -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#{{$menuList['finance']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['finance']['id']}}">
                            <i class="{{$menuList['finance']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['finance'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['finance']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['finance']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['finance']['pages'][0][__('admin.lang')]['title']}} </a> </li>

                            </ul>
                        </div>
                    </li>
                    <!-- Finance Son -->

                    <!-- Proforma  -->
                    <li class="nav-item" >
                        <a class="nav-link menu-link" href="#{{$menuList['proforma']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['proforma']['id']}}">
                            <i class="{{$menuList['proforma']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['proforma'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['proforma']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['proforma']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['proforma']['pages'][0][__('admin.lang')]['title']}} </a> </li>

                            </ul>
                        </div>
                    </li>
                    <!-- Proforma Son -->

                    <!-- work  -->
                    <li class="nav-item"  style="display:none;" >
                        <a class="nav-link menu-link" href="#{{$menuList['work']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['work']['id']}}">
                            <i class="{{$menuList['work']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['work'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['work']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['work']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['work']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                            
                            </ul>
                        </div>
                    </li>
                    <!-- work Son -->

                    <!-- Pages  -->
                    <li class="nav-item" style="display:none;"  >
                        <a class="nav-link menu-link" href="#{{$menuList['pages']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['pages']['id']}}">
                            <i class="{{$menuList['pages']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['pages'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['pages']['id']}}">
                            <ul class="nav nav-sm flex-column">
                                
                               <li class="nav-item"> <a href="{{$menuList['pages']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['pages']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                          
                                                         
                               <!--- Multi Page -->
                               <li class="nav-item">
                                    <a href="{{$menuList['pages']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email"> {{$menuList['pages']['pages'][1][__('admin.lang')]['title']}} </a>

                                    <div class="collapse menu-dropdown" id="sidebarEmail">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item"> <a href="{{$menuList['pages']['pages'][1]['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['pages']['pages'][1]['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                            <li class="nav-item"> <a href="{{$menuList['pages']['pages'][1]['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['pages']['pages'][1]['pages'][1][__('admin.lang')]['title']}} </a> </li>
                                        </ul>
                                    </div>
                                </li>
                            
                            
                            </ul>
                        </div>
                    </li>
                    <!-- Pages Son -->

                    <!-- personel  -->
                    <li class="nav-item" style="display:none;"  >
                        <a class="nav-link menu-link" href="#{{$menuList['personel']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['personel']['id']}}">
                            <i class="{{$menuList['personel']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['personel'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['personel']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['personel']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['personel']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['personel']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['personel']['pages'][1][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['personel']['pages'][2][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['personel']['pages'][2][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['personel']['pages'][3][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['personel']['pages'][3][__('admin.lang')]['title']}} </a> </li>
                                
                            </ul>
                        </div>
                    </li>
                    <!-- personel Son -->

                    <!-- File  -->
                    <li class="nav-item" style="display:none;"  >
                        <a class="nav-link menu-link" href="#{{$menuList['file']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['file']['id']}}">
                            <i class="{{$menuList['file']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['file'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['file']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['file']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['file']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['file']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['file']['pages'][1][__('admin.lang')]['title']}} </a> </li>
                               
                            </ul>
                        </div>
                    </li>
                    <!-- File Son -->


                    <!-- Analiz  -->
                    <li class="nav-item"   >
                        <a class="nav-link menu-link" href="#{{$menuList['analysis']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['analysis']['id']}}">
                            <i class="{{$menuList['analysis']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['analysis'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['analysis']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['analysis']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['analysis']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['analysis']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['analysis']['pages'][1][__('admin.lang')]['title']}} </a> </li>
                               
                            </ul>
                        </div>
                    </li>
                    <!-- Analiz Son -->


                    <!-- Takip  -->
                    <li class="nav-item"   >
                        <a class="nav-link menu-link" href="#{{$menuList['tracking']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['tracking']['id']}}">
                            <i class="{{$menuList['tracking']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['tracking'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['tracking']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['tracking']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['tracking']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                              
                            </ul>
                        </div>
                    </li>
                    <!-- Takip Son -->

                    
                   <!-- settings  -->
                   <li class="nav-item"  >
                        <a class="nav-link menu-link" href="#{{$menuList['settings']['id']}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$menuList['settings']['id']}}">
                            <i class="{{$menuList['settings']['icon']}}"></i> <span data-key="t-apps"> {{$menuList['settings'][__('admin.lang')]['title']}} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{$menuList['settings']['id']}}">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item"> <a href="{{$menuList['settings']['pages'][0][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['settings']['pages'][0][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['settings']['pages'][1][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['settings']['pages'][1][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['settings']['pages'][2][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['settings']['pages'][2][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['settings']['pages'][3][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['settings']['pages'][3][__('admin.lang')]['title']}} </a> </li>
                                <li class="nav-item"> <a href="{{$menuList['settings']['pages'][4][__('admin.lang')]['url']}}" class="nav-link" data-key="t-calendar"> {{$menuList['settings']['pages'][4][__('admin.lang')]['title']}} </a> </li>
                            
                            </ul>
                        </div>
                    </li>
                    <!-- settings Son -->


                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
 <!------- Menu List Gösterme Son ------->