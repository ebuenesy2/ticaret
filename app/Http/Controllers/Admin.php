<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB; //Veri Tabanı İşlemleri
use CURLFile; //! Curl 


//! Zaman
use Carbon\Carbon;
Carbon::now('Europe/Istanbul');
Carbon::setLocale('tr');
date_default_timezone_set('Etc/GMT-3');
//! Zaman Son

class Admin extends Controller
{
    
   //************* Deneme Sayfaları ***************** */

   //! Example
   public function Example()
   {

      echo "Example App.php"; echo "<br/>";
      

      //return view('admin/example');

   } //! Example Son

    //! Example View
    public function ExampleView()
    {
        //echo "Example View App.php"; echo "<br/>";

        return view('admin/example');
    } //! Example View Son

    
    //! Example View Theme
    public function ExampleViewTheme($site_lang="tr")
    {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();

           //! Return
           $DB["userId"] =  $yildirimdev_userID;
           $DB["name"] =  $yildirimdev_name;
           $DB["surname"] =  $yildirimdev_surname;
           $DB["role"] =   $yildirimdev_departman;
           $DB["userImageUrl"] =  $yildirimdev_img_url;
           

             //! Çoklu Dil
             \Illuminate\Support\Facades\App::setLocale($site_lang);
             return view('admin/example_view',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }


    } //! Example View Theme Son

        
    //! Example View Theme Test
    public function ExampleViewThemeTest($site_lang="tr")
    {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
             //echo "üye girişi oldu"; die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =   $DB_Find;
            $DB["DB_Columns"] =   \DB::getSchemaBuilder()->getColumnListing("test");


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/example_view_test',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

    } //! Example View Theme Test Son


   //************* Cookie Kontrol ********************* */

   //! Cookie Kontrol
   public function cookieCheck() {

      //! Tanım
      $yildirimdev_userCheck = 0;
      $yildirimdev_userID = "";
      $yildirimdev_name = "";
      $yildirimdev_surname = "";
      $yildirimdev_img_url = "";
                  
      //? Cookie Varmı
      if(isset($_COOKIE["yildirimdev_userCheck"])) { 

         try {
           
            $DB["cookie"] = "true";
            $DB["yildirimdev_userCheck"] = $_COOKIE["yildirimdev_userCheck"];
            $DB["yildirimdev_userID"] = $_COOKIE["yildirimdev_userID"]; //! id
            $DB["yildirimdev_name"]=$_COOKIE["yildirimdev_name"]; //! name
            $DB["yildirimdev_surname"]=$_COOKIE["yildirimdev_surname"]; //! surname
            $DB["yildirimdev_img_url"]=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $DB["yildirimdev_departman"]=$_COOKIE["yildirimdev_departman"]; //! departman
            $DB["yildirimdev_email"]=$_COOKIE["yildirimdev_email"]; //! email
            $DB["yildirimdev_tel"]=$_COOKIE["yildirimdev_tel"]; //! tel
            
            //echo "yildirimdev_userToken cookie:"; echo $yildirimdev_userToken; die();

            //! Return
            return $DB; 
            
         } 
         catch (\Throwable $th) {   $DB["cookie"] ="false"; return $DB;   } //! Çerezleri Yenile
         
      } //? Cookie Varmı Son
      else {  $DB["cookie"] ="false"; return $DB; }
   
   } //! Cookie Kontrol Son

   //************* Cookie Kontrol Son ***************** */

   //************* Admin ***************** */

   //! AdminIndex
   public function AdminIndex($site_lang="tr")
   {

      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil


      //! Verileri Sıfırlama
      function cookieRemove() {
            
         //! Cookie Silme 
         setcookie("yildirimdev_userCheck",0,time()-86400); 
         setcookie("yildirimdev_userID",'',time()-86400); 
         setcookie("yildirimdev_name",'',time()-86400); 
         setcookie("yildirimdev_surname",'',time()-86400); 
         setcookie("yildirimdev_img_url",'',time()-86400); 
         setcookie("yildirimdev_tel",'',time()-86400); 
         setcookie("yildirimdev_departman",'',time()-86400); 
         setcookie("yildirimdev_email",'',time()-86400); 
         //! Cookie Silme Son 


         //! Kullanıcı Sayfasına Yönlendirme Yapıyor
         return redirect('user/login/'.__('admin.lang'));

      }  //! Verileri Sıfırlama Son

      //! User Kontrol
      $userCheck = 0;
      $parameter_userCookie = request('userCookie');
      if($parameter_userCookie) { cookieRemove();} 
      //! User Kontrol Son
      
      try {
       
         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
         $yildirimdev_email = "";
         $yildirimdev_tel = "";

        

         
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {
            
            
            $error = false;

            try {


               $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];

               isset($_COOKIE["yildirimdev_userID"]) ?  $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]  : $error = true;
               isset($_COOKIE["yildirimdev_name"]) ?  $yildirimdev_name=$_COOKIE["yildirimdev_name"]  : $error = true;
               isset($_COOKIE["yildirimdev_surname"]) ?  $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]  : $error = true;
               isset($_COOKIE["yildirimdev_img_url"]) ?  $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]  : $error = true;
               isset($_COOKIE["yildirimdev_departman"]) ?  $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]  : $error = true;
               isset($_COOKIE["yildirimdev_email"]) ?  $yildirimdev_email=$_COOKIE["yildirimdev_email"]  : $error = true;
               isset($_COOKIE["yildirimdev_tel"]) ?  $yildirimdev_tel=$_COOKIE["yildirimdev_tel"]  : $error = true;

               $error == false ?  $yildirimdev_userCheck = 1 : $yildirimdev_userCheck = 0;
               
            } 
            catch (\Throwable $th) { cookieRemove();   } //! Çerezleri Yenile
            
         } //? Cookie Varmı Son

         
         if(session('status')=="succes") {          
            // echo "üye girişi oldu"; die();
            $yildirimdev_userCheck = 1;
            $yildirimdev_userID = session('yildirimdev_userID'); //! id
            $yildirimdev_name = session('yildirimdev_name'); //! name
            $yildirimdev_surname = session('yildirimdev_surname'); //! surname
            $yildirimdev_img_url = session('yildirimdev_img_url'); //! imgUrl

            $yildirimdev_email = session('yildirimdev_email'); //! email
            $yildirimdev_tel = session('yildirimdev_tel'); //! tel
            $yildirimdev_departman = session('yildirimdev_departman'); //! tel

            //echo "yildirimdev_tel cookie:"; echo $yildirimdev_tel; die();

            

            //! Cookie Ayarlama
            setcookie("yildirimdev_userCheck",1,time()+86400,'/');
            setcookie("yildirimdev_userID",$yildirimdev_userID ,time()+86400,'/'); //! id
            setcookie("yildirimdev_name",$yildirimdev_name ,time()+86400,'/'); //! name
            setcookie("yildirimdev_surname",$yildirimdev_surname ,time()+86400,'/'); //! surname
            setcookie("yildirimdev_img_url",$yildirimdev_img_url ,time()+86400,'/'); //! imgUrl
            setcookie("yildirimdev_email",$yildirimdev_email ,time()+86400,'/'); //! email
            setcookie("yildirimdev_tel",$yildirimdev_tel ,time()+86400,'/'); //! tel
            setcookie("yildirimdev_departman",$yildirimdev_departman ,time()+86400,'/'); //! tel
            //! Cookie Ayarlama Son

         }

         //! Kullanıcı Çıkış Durumu
         $parameter_userCheck = request('userCheck');
         if($parameter_userCheck == "false" && $yildirimdev_userCheck == 1 ) {  cookieRemove(); }
         //! Kullanıcı Çıkış Durumu Son
         
         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();


            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            // echo "<pre>"; print_r($DB); die();

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return redirect('cost/calculation/list');
         }
         else {
            //echo "üye giriş yapınız"; die();
            return redirect('user/login');
         }
   
         
      } catch (\Throwable $th) {  throw $th; }

      
   } //! AdminIndex Son


   //************* User Login ***************** */

   //! UserLogin
   public function UserLogin($site_lang="tr")
   {

      //? Cookie Varsa - Siliyor
      if(isset($_COOKIE["yildirimdev_userCheck"])) {
               
         //! Silme
         return redirect('/login')
               ->cookie('yildirimdev_userCheck',null,-1)
               ->cookie('yildirimdev_userID',null,-1)
               ->cookie('yildirimdev_name',null,-1)
               ->cookie('yildirimdev_surname',null,-1)
               ->cookie('yildirimdev_tel',null,-1)
               ->cookie('yildirimdev_departman',null,-1)
               ->cookie('yildirimdev_email',null,-1)
               ->cookie('yildirimdev_role',null,-1)
               ->cookie('yildirimdev_img_url',null,-1);
         //! Silme Son

      } 
      else {  return view('admin/user/user_login'); }
   

   } //! UserLogin Son

      
   //! UserLoginControl
   public function UserLoginControl(Request $request)
   {

      try {

            //Veri Okuma
            // [ Name] - değerlerine göre oku
            $token= $request->_token;
            $siteLang= $request->siteLang; //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

            //! Login
            $email= $request->email;
            $password= $request->password;
            
            //! Login Bilgileri
            $yildirimdev_userID= "yildirimdev_userID";
            $yildirimdev_userToken= "yildirimdev_userToken";

            //! Tanım
            $loginCheck=0; //! Login Durumu
            $activeCheck=0; //! Aktif Durumu

            $ServerId = config('admin.ServerId');
            $ServerToken = config('admin.ServerToken');
            
            // echo "token: "; echo $token; echo "<br/>";
            // echo "siteLang: "; echo $siteLang; echo "<br/>";
            // echo "email: "; echo $email; echo "<br/>";
            // echo "password: "; echo $password; echo "<br/>";
         
            // echo "<br/>";
            // echo "ServerId: "; echo $ServerId; echo "<br/>";
            // echo "ServerToken: "; echo $ServerToken; echo "<br/>";

            //veri tabanı işlemleri
            $DB_Where= DB::table('users')
            ->where('ServerId','=',$ServerId)->where('ServerToken','=',$ServerToken)
            ->where('email','=',$email)->where('password','=',$password)
            ->first();

            // echo "<pre>";
            // print_r($DB_Where); die();
      
            if($DB_Where) {  
               $loginCheck = 1;
               $activeCheck = $DB_Where->isActive;
               
               $yildirimdev_userID = $DB_Where->id;
               $yildirimdev_userToken = $DB_Where->token;

               $yildirimdev_name = $DB_Where->name;
               $yildirimdev_surname = $DB_Where->surname;
               $yildirimdev_img_url = $DB_Where->img_url;

               $yildirimdev_email = $DB_Where->email;
               $yildirimdev_tel = $DB_Where->tel;
               $yildirimdev_departman = $DB_Where->departman;

               // echo "Kullanıcı Giriş Başarılı"; echo "<br/>";
               // echo "<pre>"; print_r($DB_Where);  echo "<br/>"; die();

            }
            
            // echo "<br/>";
            // echo "loginCheck: "; echo $loginCheck; echo "<br/>";
            // echo "activeCheck: "; echo $activeCheck; echo "<br/>";
            // echo "yildirimdev_userID: "; echo $yildirimdev_userID; echo "<br/>";
            // echo "yildirimdev_userToken: "; echo $yildirimdev_userToken; echo "<br/>";


            //! Login Durumuna Yönlendirme
            if($loginCheck == 1) {

               if($activeCheck == 0) { return redirect()->route('errorAccountBlock'); }
               else { return redirect('admin/'.__('admin.lang'))->with('status',"succes")->with('yildirimdev_userID',$yildirimdev_userID)->with('yildirimdev_userToken',$yildirimdev_userToken)
                  ->with('yildirimdev_name',$yildirimdev_name)->with('yildirimdev_surname',$yildirimdev_surname)->with('yildirimdev_img_url',$yildirimdev_img_url) 
                  ->with('yildirimdev_email',$yildirimdev_email)->with('yildirimdev_tel',$yildirimdev_tel)->with('yildirimdev_departman',$yildirimdev_departman); }

            }
            else {  return redirect('user/login/'.__('admin.lang'))->with('status',"error")->with('msg', __('admin.TheEmailPasswordMayBeIncorrect')); }
            //! Login Durumuna Yönlendirme


      } catch (\Throwable $th) {  throw $th;  }

   } //! UserLoginControl Son


   
   //************* User Register ***************** */

   //! UserRegister
   public function UserRegister($site_lang="tr")
   {

      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/user/user_register');
   } //! UserRegister Son

      
   //! UserRegisterControl
   public function UserRegisterControl(Request $request)
   {

      try {

         //Veri Okuma
         // [ Name] - değerlerine göre oku
         $token= $request->_token;
         $siteLang= $request->siteLang; //! Çoklu Dil
         \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

         //! Bilgiler
         $email= $request->email;
         $password= $request->password;
         $repassword= $request->repassword;

         //Sifreler Uyuşmuyor
         if($password !=  $repassword ) { return redirect('user/register/'.__('admin.lang'))->with('status',"error")->with('msg',__('admin.PasswordsDoNotMatch')); } 
         else {

            //veri tabanı işlemleri
            $DB_Where= DB::table('users')->where('ServerId','=',config('admin.ServerId'))->where('ServerToken','=',config('admin.ServerToken'))->where('email','=',$email)->first();
         
            if($DB_Where) {  return redirect('user/register/'.__('admin.lang'))->with('status',"error")->with('msg',__('admin.EmailIsUsed')); }  //! Bu Email Kullanılıyor
            else {
            
               DB::table('users')->insert([
                  'serverId'=>config('admin.ServerId'),
                  'serverToken'=>config('admin.ServerToken'),
                  'name' => $request->name,
                  'surname' => $request->surname,
                  'email' => $request->email,
                  'password'=>$request->password,
                  'img_url'=> config('admin.Default_UserImgUrl'),
                  'dateofBirth'=>$request->dateofBirth,
                  'created_byId'=> null
               ]);
               
               return redirect('user/login/'.__('admin.lang'))->with('status',"succes")->with('msg',__('admin.MemberRegistrationCreatedYouCanLogin'));   //! Kayıt Olundu
               
            }
    
         }


     } catch (\Throwable $th) {  throw $th;  }

   } //! UserRegisterControl Son
      

   //************* User Forgot Password ***************** */

   //! UserForgotPassword
   public function UserForgotPassword($site_lang="tr")
   {

      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/user/user_forgot_password');

   } //! UserForgotPassword Son
   
   //! UserForgotPasswordControl
   public function UserForgotPasswordControl(Request $request)
   {

      try {

            //Veri Okuma
            // [ Name] - değerlerine göre oku
            $token= $request->_token;
            $siteLang= $request->siteLang; //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

            $email= $request->email;
            $password= $request->password;

            //! yildirimdev_userToken
            $yildirimdev_userToken="yildirimdev_userToken";

            //! Tanım
            $loginCheck=0; //! Login Durumu
            $activeCheck=1; //! Aktif Durumu

            $yildirimdev_userToken = "yildirimdev_userToken"; //! Token
            $yildirimdev_userID = "yildirimdev_userID"; //! Id


            echo "Sifremi Unuttum "; echo "<br/>";
            echo "token: "; echo $token; echo "<br/>";
            echo "siteLang: "; echo $siteLang; echo "<br/>";
            echo "email: "; echo $email; echo "<br/>";


      } catch (\Throwable $th) { throw $th; }

   } //! UserForgotPasswordControl Son

         
   //************* User Create Password ***************** */

   //! UserCreatePassword
   public function UserCreatePassword($site_lang="tr")
   {

      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/user/user_create_password');

   } //! UserCreatePassword Son

   
   //! UserCreatePasswordControl
   public function UserCreatePasswordControl(Request $request)
   {

      try {

            //Veri Okuma
            // [ Name] - değerlerine göre oku
            $token= $request->_token;
            $siteLang= $request->siteLang; //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

            $password= $request->password;
            $repassword= $request->repassword;

            //! yildirimdev_userToken
            $yildirimdev_userToken="yildirimdev_userToken";

            //! Tanım
            $loginCheck=0; //! Login Durumu
            $activeCheck=1; //! Aktif Durumu

            $yildirimdev_userToken = "yildirimdev_userToken"; //! Token
            $yildirimdev_userID = "yildirimdev_userID"; //! Id


            echo "Sifremi Yenile "; echo "<br/>";
            echo "token: "; echo $token; echo "<br/>";
            echo "siteLang: "; echo $siteLang; echo "<br/>";
            echo "password: "; echo $password; echo "<br/>";
            echo "repassword: "; echo $repassword; echo "<br/>";


      } catch (\Throwable $th) { throw $th; }

   } //! UserCreatePasswordControl Son

            
   //************* User  ***************** */

   //! UserList
   public function UserList($site_lang="tr")
   {
      
     try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
         }
 
         if($yildirimdev_userCheck ) {
             


             //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "isActive";  $data_item_object="="; }
               else if($data_key_item == "Departman") { $data_key_item = "departmanId";  $data_item_object="="; }
               else if($data_key_item == "Role") { $data_key_item = "role";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('users')->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son

          
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/user/user_list',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }


   } //! UserList Son

   
   //! UserList AddPost Add  
   public function UserListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Bilgiler
         $email= $request->email;
         $password= $request->password;
         $repassword= $request->repassword;

         //Sifreler Uyuşmuyor
         if($password !=  $repassword ) { $response = array( 'status' => 'error', 'msg' =>  __('admin.PasswordsDoNotMatch'),); return response()->json($response); } 
         else {

            //veri tabanı işlemleri
            $DB_Where= DB::table('users')->where('ServerId','=',config('admin.ServerId'))->where('ServerToken','=',config('admin.ServerToken'))->where('email','=',$email)->first();
         
            if($DB_Where) { $response = array( 'status' => 'error', 'msg' =>  __('admin.EmailIsUsed')); return response()->json($response); }  //! Bu Email Kullanılıyor
            else {

                  //! Veri Ekleme
                  DB::table('users')->insert([
                        'serverId' => config('admin.ServerId'),
                        'serverToken' => config('admin.ServerToken'),
                        'name' => $request->name,
                        'surname' => $request->surname,
                        'tel' => $request->tel,
                        'email' => $request->email,
                        'password'=>$request->password,
                        
                        'departmanId'=>$request->departmanId,
                        'departman'=>$request->departman,
                        'role'=>$request->role,

                        'img_url'=> config('admin.Default_UserImgUrl'),
                        'dateofBirth'=>$request->dateofBirth,
                        'created_byId'=>$request->created_byId,
                  ]); //! Veri Ekleme Son


                  $response = array(
                     'status' => 'success',
                     'msg' => __('admin.TransactionSuccessful'),
                  );

                  return response()->json($response);
            }
         }

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! UserLis tAddPost Add  Son

   
   //! UserList Delete  
   public function UserListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('users')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! UserList Delete  Son


   //! UserList Delete  Multi
   public function UserListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('users')->whereIn('id',$request->ids)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'dataId'=> $request->ids
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! UserList Delete  Son
      
   //! UserList Update  
   public function UserListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Gelen Veriler
         $password= $request->password;
         $repassword= $request->repassword;

         //Sifreler Uyuşmuyor
         if($password !=  $repassword ) { $response = array( 'status' => 'error', 'msg' =>  __('admin.PasswordsDoNotMatch'),); return response()->json($response); }
         else {

            //! Veri Güncelle
            $DB_Status = DB::table('users')->where('id',$request->id)
            ->update([            
               'name'=>$request->name,
               'surname'=>$request->surname,
               'tel'=>$request->tel,
               'email'=>$request->email,
               'password'=>$request->password,
               
               'departmanId'=>$request->departmanId,
               'departman'=>$request->departman,
               'role'=>$request->role,

               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);

            if($DB_Status) {

               $response = array(
                  'status' => 'success',
                  'msg' => __('admin.TransactionSuccessful'),
               );
               return response()->json($response);
            }

            else {

               $response = array(
                  'status' => 'error',
                  'msg' => __('admin.DataNotFound'),
                  'dataId'=> $request->id
               );

               return response()->json($response);

            }

         }

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! UserList Update  Son


   //! UserList Update Edit 
   public function UserListEditPostEdit(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

      

         //! Veri Güncelle
         $DB_Status = DB::table('users')->where('id',$request->id)
         ->update([            
            'name'=>$request->name,
            'surname'=>$request->surname,
            'tel'=>$request->tel,
            'dateofBirth'=>$request->dateofBirth,

            'departmanId'=>$request->departmanId,
            'departman'=>$request->departman,
            'role'=>$request->role,

            'collection_status'=>$request->collection_status,
            'time_experience'=>$request->time_experience,
            'type_experience'=>$request->type_experience,
         
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);


         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );
            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }

      

      } catch (\Throwable $th) {
      
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! UserList Update  Edit Son

   
   //! UserList Update Pass 
   public function UserListEditPostPass(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         
         //! Gelen Veriler
         $DB_Find = DB::table('users')->where('id',$request->id)->where('password',$request->oldpasswordInput)->first(); //Tüm verileri çekiyor


         //Sifreler Uyuşmuyor
         if($DB_Find ) {


            //! Veri Güncelle
            $DB_Status = DB::table('users')->where('id',$request->id)
            ->update([            
               'password'=>$request->newpasswordInput,
               
               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);


            if($DB_Status) {

               $response = array(
                  'status' => 'success',
                  'msg' => __('admin.TransactionSuccessful'),
               );
               return response()->json($response);
            }

            else {

               $response = array(
                  'status' => 'error',
                  'msg' => __('admin.DataNotFound'),
                  'dataId'=> $request->id
               );

               return response()->json($response);

            }

         }
         else { $response = array( 'status' => 'error', 'msg' =>  __('admin.PasswordsDoNotMatch'), ); return response()->json($response); }
       

      } catch (\Throwable $th) {
      
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,

            'db' => DB::table('users')->where('id',$id)->first(),
         );

         return response()->json($response);
      }
      
   } //! UserList Update  Pass Son
 

   //! UserList Update View
   public function UserListEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('users')->where('id',$id)->first(); //Tüm verileri çekiyor
            //echo "<pre>";  print_r($DB_Find); die();
   
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/user/user_edit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! UserList Update View Son

   //! UserList View
   public function UserListView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
               

            echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('users')->where('id',$id)->first(); //Tüm verileri çekiyor
   
           //! Return
           $DB["userId"] =  $yildirimdev_userID;
           $DB["name"] =  $yildirimdev_name;
           $DB["surname"] =  $yildirimdev_surname;
           $DB["role"] =   $yildirimdev_departman;
           $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/user/user_detail',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! UserList View Son


   //! UserList Edit Active
   public function UserListEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('users')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! UserList Edit Active Son


   //! UserList Edit Active Multi
   public function UserListEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('users')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );
            return response()->json($response);
         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! UserList Edit Active Multi Son


   //! UserList Import File
   public function UserListExportFile(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! ************** Import *************
            $data ='';
            $fileUrl = "upload/uploads/".$fileName; //! Dosya yeri
            $DB_importStatus = false;
            $DB=[]; //! DB

            if($file_status) {

               if($fileExt == "json") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $DB = json_decode($data,true); //! Veri Json Çeviriyor

                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('users')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'password'=> $DB[$i]["Password"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"],
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }
               else if($fileExt == "xml") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $xmlObject = simplexml_load_string($data); //! Xml Dosyası Okuma

                  $json = json_encode($xmlObject); 
                  $DB = json_decode($json, true); //! Dosya Array Çevirme 
                  $DB = $DB["Data"]; //! Array
                  
                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('users')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'password'=> $DB[$i]["Password"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"] == "true" ? true : false,
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }



            }
            //! ************** Import Son *************

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),
               'DB_importStatus' => $DB_importStatus,
               'DB' => $DB,
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! UserList Import File Son


   //! User Profile Image Edit
   public function UserEditProfileImage(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! Veri Güncelle
            $DB_Status = DB::table('users')->where('id',$request->profileUserId)
            ->update([            
               'img_url'=>"/upload/uploads/".$fileName,

               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);
            //! Veri Güncelle
           

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),

               'profileUserId' => $request->profileUserId,
               'db' => $DB_Status
              
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! User Profile Image Edit Son


   //! User Profile View
   public function UserProfileView($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('users')->where('id',$yildirimdev_userID)->first(); //Tüm verileri çekiyor
            //echo "<pre>";  print_r($DB_Find); die();
   
   
            //! Return
            $DB["userId"] =  $DB_Find->id;
            $DB["name"] =  $DB_Find->name;
            $DB["surname"] =  $DB_Find->surname;
            $DB["role"] =  $DB_Find->departman;
            $DB["userImageUrl"] =  $DB_Find->img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/user/user_edit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! User Profile View Son

      
   //************* Stok List ***************** */

   //! StockList
   public function StockList($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "stock.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "stock.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "stock.isActive";  $data_item_object="="; }
               else if($data_key_item == "sector") { $data_key_item = "stock.sector";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('stock')
            ->leftJoin('category', 'category.id', '=', 'stock.sector')
            ->select('stock.*', 'category.title')
            ->where($data_all)->orderBy('stock.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find_stok_Ret = DB::table('stock')
            ->join('category', 'category.id', '=', 'stock.sector')
            ->select('stock.*', 'category.title')
            ->where($data_all)->where('stock.isActive','=',0)
            ->orderBy('stock.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_stok_Ret); die();

            //! Params Verileri Where Formatında Yazılacak Son    
            
            //veri tabanı işlemleri
            $DB_Find_Category = DB::table('category')->where('type','SektorStok')->orderBy('category.title','asc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Category); die();

            //! Kod
            $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
            $DB_Find_Number = "00";
            $DB_Find_no = (int)$DB_Find_site_code->stock_no;
            $DB_Find_no=$DB_Find_no+1;

            if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
            else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
            else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else { $DB_Find_Number = (string)$DB_Find_no; }
            //! Kod Son

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find_Number"] =  $DB_Find_Number; //! Stok Numarası
           
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_stok_Ret"] =  $DB_Find_stok_Ret;
            $DB["DB_Find_Category"] =  $DB_Find_Category;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/stock/stockList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }
   } //! StockList Son

   //! StockList Add  
   public function StockListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
         
            //! Kod Oluşturma
         
            //veri tabanı işlemleri
            $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_site_code); die();
            //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

            $DB_Find_Number="";
            $DB_Find_type=$request->sectorCode;
            $DB_Find_type_sub=$request->sub_sectorCode;
            $DB_Find_no=(int)$DB_Find_site_code->stock_no;
            $DB_Find_no=$DB_Find_no+1;
            
            if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
            else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
            else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else { $DB_Find_Number = (string)$DB_Find_no; }

            //! Veri Güncelle
            $DB_Status = DB::table('site_code')->where('id',1)->update([ 'stock_no'=>$DB_Find_no ]);

            $returnCode=$DB_Find_type."-".$DB_Find_type_sub."-".$DB_Find_Number;
            $accountingCode_buy="153".".".$DB_Find_Number;
            $accountingCode_sel="610".".".$DB_Find_Number;
            //echo "returnCode:"; echo $returnCode; die();

            //! Kod Oluşturma Son

            //! Veri Ekleme
            DB::table('stock')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'sector' => $request->sector,
               'sub_sector' => $request->sub_sector,

               'codeNumber' => $DB_Find_Number,
               'stockCode' =>  $returnCode,
               'accountingCode_buy' => $accountingCode_buy,
               'accountingCode_sel' => $accountingCode_sel,
               
               'nameTr' => $request->nameTr,
               'nameEn' => $request->nameEn,

               'imgUrl' => $request->imgUrl == "" ? config('admin.Default_ProductImgUrl') : $request->imgUrl,
               'techFileUrl' => $request->techFileUrl,
               
               'stockUnit' => $request->stockUnit,
               'stockCount' => $request->stockCount,
               'currency' => $request->currency,
               'price' => $request->price,
               
               'kdv_buy' => $request->kdv_buy,
               'kdv_sell' => $request->kdv_sell,

               'export_registered' => $request->export_registered,
               'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
               'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

               'descriptionTr' => $request->descriptionTr,
               'descriptionEn' => $request->descriptionEn,
               
               'featuresTr' => $request->featuresTr,
               'featuresEn' => $request->featuresEn,

               'tech_featuresTr' => $request->tech_featuresTr,
               'tech_featuresEn' => $request->tech_featuresEn,

               'web_address' => $request->web_address,
               'catalogLink' => $request->catalogLink,
               'gtipNo' => $request->gtipNo,

               'isActive'=>$request->isActive == "true" ? true : false,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! StockList Add  Son
   
   //! StockList Delete  
   public function StockListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stock')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! StockList Delete  Son

   //! StockList Delete  Multi
   public function StockListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stock')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! StockList Delete  Son

   //! StockList Post
   public function StockListSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('stock')->where('id',$request->id)->first(); //Tüm verileri çekiyor
         
         if($DB_Find) {

            $DB_Find_Category = DB::table('categorysub')->where('categoryid',(int)$DB_Find->sector)->get(); //Tüm verileri çekiyor

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
               'DB_Find_Category' =>  $DB_Find_Category
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! StockList Search Post Son
     
   //! StockList Update  
   public function StockListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Kod Oluşturma
         $DB_Find_Number="";
         $DB_Find_type=$request->sectorCode;
         $DB_Find_type_sub=$request->sub_sectorCode;
         $DB_Find_no=(int)$request->data_stockNumber; 
                  
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         $returnCode=$DB_Find_type."-".$DB_Find_type_sub."-".$DB_Find_Number;
         //echo "returnCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son
        

         //! Veri Güncelle
         $DB_Status = DB::table('stock')->where('id',$request->id)
         ->update([            
            'sector' => $request->sector,
            'sub_sector' => $request->sub_sector,
            'stockCode' =>  $returnCode,
           
            'nameTr' => $request->nameTr,
            'nameEn' => $request->nameEn,

            'imgUrl' => $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
           
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
            'price' => $request->price,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! StockList Update  Son

   //! StockList Edit Active
   public function StockListEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('stock')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! StockList Edit Active Son

   //! StockList Edit Active Multi
   public function StockListEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('stock')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! StockList Edit Active Multi Son
      
   //! StockList Update Product Image
   public function StockListUpdateProductImage(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son
            
             //! Veri Güncelle
            $DB_Status = DB::table('stock')->where('id',$request->productId)
            ->update([            
               'imgUrl' => "/upload/uploads/".$fileName,
               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);
      

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),
               'productId' => $request->productId,
               'DB_Status' => $DB_Status,
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! StockList Update Product Image

         
   //************* Stok Firma List ***************** */

   //! Stok Firma
   public function StockCompanyList($id, $site_lang="tr")
   {
      try {

        
         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "stockcompany.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "stockcompany.id";  $data_item_object="=";  }
               else if($data_key_item == "Role") { $data_key_item = "stockcompany.current_row";  $data_item_object="="; }
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";

            //veri tabanı işlemleri
            $DB_Find_Stock = DB::table('stock')->where('id',$id)->first(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Stock); die();
            if(!$DB_Find_Stock) { echo "Ürün Bulunmuyor"; die(); }
         

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('stockcompany')
            ->leftJoin('stock', 'stock.id', '=', 'stockcompany.stock_id')
            ->join('current_cart', 'current_cart.id', '=', 'stockcompany.current_cart_id')
            ->select('stockcompany.*','stock.nameTr as stockNameTR','stock.nameEn as stockNameEN' ,'current_cart.id as current_cartId','current_cart.current_name as current_cartName','current_cart.current_code as current_cartCode')
            ->where('stockcompany.stock_id',$id)
            ->where($data_all)->orderBy('stockcompany.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            $DB_Find_Current = DB::table('current_cart')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($current_cart); die();

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
           
            $DB["StockId"] =  $id;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Stock"] =  $DB_Find_Stock;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
           

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/stock/stockCompanyList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }
   } //! Stok Firma Son

   
   //! Stok Firma Add Post  
   public function StockCompanyAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

            //! Veri Ekleme
         DB::table('stockcompany')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'stock_id' => $request->stock_id,
            'current_cart_id' => $request->current_cart_id,
            'current_row' => $request->current_row,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'post' => $request->all(),
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Post Son

   //! Stok Firma Delete  
   public function StockCompanyDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stockcompany')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Delete  Son
   
   //! Stok Firma Delete  Multi
   public function StockCompanyDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stockcompany')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Delete Multi  Son

   
   //! Stok Firma Post
   public function StockCompanySearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('stockcompany')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Search Post Son

   //! Stok Firma Edit  
   public function StockCompanyEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('stockcompany')->where('id',$request->id)
         ->update([            
            'stock_id' => $request->stock_id,
            'current_cart_id' => $request->current_cart_id,
            'current_row' => $request->current_row,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Edit Son

   
   //! Stok Firma Edit Active
   public function StockCompanyEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('bank')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Edit Active Son

   //! Stok Firma Edit Active Multi
   public function StockCompanyEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('bank')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Stok Firma Edit Active Multi Son
   
   //************* Current Cart ***************** */

   //! currentCartList
   public function currentCartList($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {

            
            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "current_cart.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "current_cart.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "current_cart.isActive";  $data_item_object="="; }
               else if($data_key_item == "currentCode") { $data_key_item = "current_cart.current_row";  $data_item_object="="; }
               else if($data_key_item == "sector") { $data_key_item = "current_cart.sectoral_type";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('current_cart')
            ->join('category', 'category.id', '=', 'current_cart.sectoral_type')
            ->select('current_cart.*', 'category.title')
            ->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son  
            
            
            //veri tabanı işlemleri
            $DB_Find_Category = DB::table('category')->where('type','SektorCari')->orderBy('title','asc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Category); die();

 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
          
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Category"] =  $DB_Find_Category;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/currentCart/currentCartList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! currentCartList Son

   //! currentCartList Add  
   public function currentCartListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
       
        
         //! Kod Oluşturma
      
         //veri tabanı işlemleri
         $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
         //echo "<pre>"; print_r($DB_Find_site_code); die();
         //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

         $DB_Find_Number="";
         $DB_Find_type=$request->current_row;
         $DB_Find_type_sub=$request->sectoral_typeCode;
         $DB_Find_no=(int)$DB_Find_site_code->current_no;
         $DB_Find_no=$DB_Find_no+1;
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         //! Veri Güncelle
         $DB_Status = DB::table('site_code')->where('id',1)->update([ 'current_no'=>$DB_Find_no ]);

         $returnCode=$DB_Find_type.".".$DB_Find_type_sub.".".$DB_Find_Number;
         //echo "returnCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son
        

         //! Veri Ekleme
         DB::table('current_cart')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
           
            'current_row' => $request->current_row,
            'sectoral_type' => $request->sectoral_type,
            'current_code' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,
          
            'current_name' => $request->current_name,
            'short_name' => $request->short_name,

            'currency' => $request->currency,
            'description' => $request->description,

            'authorized_person' => $request->authorized_person,
            'authorized_person_role' => $request->authorized_person_role,            
            'authorized_person_tel' => $request->authorized_person_tel,
            'authorized_person_whatsap' => $request->authorized_person_whatsap,
            'authorized_person_mail' => $request->authorized_person_mail,

            'ref_person' => $request->ref_person,
            'ref_departman' => $request->ref_departman,            
            'ref_phone' => $request->ref_phone,
            'ref_email' => $request->ref_email,

            'country' => $request->country,
            'city' => $request->city,
            'district' => $request->district,
            'post_code' => $request->post_code,

            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'fax1' => $request->fax1,
            'fax2' => $request->fax2,

            'address' => $request->address,
            'billing_address' => $request->billing_address,
            'tax_administration' => $request->tax_administration,
            'tax_number' => $request->tax_number,

            'web_address' => $request->web_address,
            'email' => $request->email,
            'email_cc' => $request->email_cc,
           
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! currentCartList Add  Son


   //! currentCartList Add View
   public function currentCartListAddView($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {


             //veri tabanı işlemleri
             $DB_Find_Category = DB::table('category')->where('type','SektorCari')->orderBy('title','asc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
             //echo "<pre>"; print_r($DB_Find_Category); die();

       
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find_Category"] =  $DB_Find_Category;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/currentCart/currentCartAdd',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! currentCartList Add View Son

   
   //! currentCartList Delete  
   public function currentCartListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('current_cart')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! currentCartList Delete  Son


   //! currentCartList Delete  Multi
   public function currentCartListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('current_cart')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! currentCartList Delete  Son

     
   //! currentCartList Update  
   public function currentCartListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Kod Oluşturma
         $DB_Find_Number="";
         $DB_Find_type=$request->current_row;
         $DB_Find_type_sub=$request->sectoral_typeCode;
         $DB_Find_no=(int)$request->current_no;         
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         $returnCode=$DB_Find_type.".".$DB_Find_type_sub.".".$DB_Find_Number;
         //echo "returnCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son
        

         //! Veri Güncelle
         $DB_Status = DB::table('current_cart')->where('id',$request->id)
         ->update([    
            'current_row' => $request->current_row,
            'sectoral_type' => $request->sectoral_type,
            'current_code' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,
           
            'current_name' => $request->current_name,
            'short_name' => $request->short_name,

            'currency' => $request->currency,
            'description' => $request->description,

            'authorized_person' => $request->authorized_person,
            'authorized_person_role' => $request->authorized_person_role,            
            'authorized_person_tel' => $request->authorized_person_tel,
            'authorized_person_whatsap' => $request->authorized_person_whatsap,
            'authorized_person_mail' => $request->authorized_person_mail,

            'ref_person' => $request->ref_person,
            'ref_departman' => $request->ref_departman,            
            'ref_phone' => $request->ref_phone,
            'ref_email' => $request->ref_email,

            'country' => $request->country,
            'city' => $request->city,
            'district' => $request->district,
            'post_code' => $request->post_code,

            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'fax1' => $request->fax1,
            'fax2' => $request->fax2,

            'address' => $request->address,
            'billing_address' => $request->billing_address,
            'tax_administration' => $request->tax_administration,
            'tax_number' => $request->tax_number,

            'web_address' => $request->web_address,
            'email' => $request->email,
            'email_cc' => $request->email_cc,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! currentCartList Update  Son


   //! currentCartList Update View
   public function currentCartListEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

           
            // //veri tabanı işlemleri
            $DB_Find = DB::table('current_cart')->where('id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();


            //veri tabanı işlemleri
            $DB_Find_Category = DB::table('category')->where('type','SektorCari')->orderBy('title','asc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Category); die();

            // //veri tabanı işlemleri
            $DB_Find_Bank = DB::table('bank')->where('currencyCartId',$id)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Bank); die();
         
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Category"] =  $DB_Find_Category;
            $DB["DB_Find_Bank"] =  $DB_Find_Bank;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/currentCart/currentCartEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! currentCartList Update View Son


   //! currentCartList View
   public function currentCartListView($site_lang="tr",$id)
   {

      try {

        //! Tanım
        $yildirimdev_userCheck = 0;
        $yildirimdev_userID = "";
        $yildirimdev_name = "";
        $yildirimdev_surname = "";
        $yildirimdev_img_url = "";

        //? Cookie Varmı
        if(isset($_COOKIE["yildirimdev_userCheck"])) {

           $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
           $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
           $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
           $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
           $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

           //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
           
        }
   
         if($yildirimdev_userCheck ) {
               

            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('current_cart')->where('id',$id)->first(); //Tüm verileri çekiyor
            //print_r($DB_Find); die();

            // //veri tabanı işlemleri
            $DB_Find_Bank = DB::table('bank')->where('currencyCartId',$id)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Bank); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Bank"] =  $DB_Find_Bank;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/currentCart/currentCartView',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! currentCartList View Son

   //! currentCartList Post
   public function currentCartSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('current_cart')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! currentCartList Search Post Son


   //! currentCartList Edit Active
   public function currentCartListEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('current_cart')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! currentCartList Edit Active Son


   //! currentCartList Edit Active Multi
   public function currentCartListEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('current_cart')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! currentCartList Edit Active Multi Son

      
   //! currentCartList Import File
   public function currentCartListExportFile(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! ************** Import *************
            $data ='';
            $fileUrl = "upload/uploads/".$fileName; //! Dosya yeri
            $DB_importStatus = false;
            $DB=[]; //! DB

            if($file_status) {

               if($fileExt == "json") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $DB = json_decode($data,true); //! Veri Json Çeviriyor

                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"],
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }
               else if($fileExt == "xml") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $xmlObject = simplexml_load_string($data); //! Xml Dosyası Okuma

                  $json = json_encode($xmlObject); 
                  $DB = json_decode($json, true); //! Dosya Array Çevirme 
                  $DB = $DB["Data"]; //! Array
                  
                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"] == "true" ? true : false,
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }



            }
            //! ************** Import Son *************

      

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),
               'DB_importStatus' => $DB_importStatus,
               'DB' => $DB,
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! currentCartList Import File

   
   //************* Firma Stok List ***************** */

   //! Firma Stok
   public function currentCartStockList($id, $site_lang="tr")
   {
      try {


         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "stockcompany.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "stockcompany.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "stockcompany.isActive";  $data_item_object="="; }
               else if($data_key_item == "sector") { $data_key_item = "stockcompany.sector";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->where('id',$id)->first(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Stock); die();
            if(!$DB_Find_Current) { echo "Ürün Bulunmuyor"; die(); }
         

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('stockcompany')
            ->leftJoin('stock', 'stock.id', '=', 'stockcompany.stock_id')
            ->join('current_cart', 'current_cart.id', '=', 'stockcompany.current_cart_id')
            ->select('stockcompany.*','stock.stockCode','stock.nameTr as stockNameTR','stock.nameEn as stockNameEN' ,'current_cart.id as current_cartId','current_cart.current_name as current_cartName','current_cart.current_code as current_cartCode')
            ->where('stockcompany.current_cart_id',$id)
            ->where($data_all)->orderBy('stockcompany.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();

         
            $DB_Find_Stock = DB::table('stock')->where('isActive',1)->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Stock); die();

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
           
            $DB["CurrentId"] =  $id;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Stock"] =  $DB_Find_Stock;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
           

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/currentCart/currentCartStockList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }
   } //! Firma Stok Son

   
   //! Firma Stok Add Post  
   public function currentCartStockAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

            //! Veri Ekleme
         DB::table('stockcompany')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'stock_id' => $request->stock_id,
            'current_cart_id' => $request->current_cart_id,
            'current_row' => $request->current_row,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'post' => $request->all(),
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Firma Stok Post Son

   //! Firma  Stok Delete  
   public function currentCartStockDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stockcompany')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Firma  Stok Delete  Son
   
   //!  Firma Stok Delete  Multi
   public function currentCartStockDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('stockcompany')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //!  Firma Stok Delete Multi  Son

   
   //! Firma Stok Post
   public function currentCartStockSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('stockcompany')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Firma Stok Search Post Son

   //! Firma Stok Edit  
   public function currentCartStockEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('stockcompany')->where('id',$request->id)
         ->update([            
            'current_cart_id' => $request->current_cart_id,
            'current_row' => $request->current_row,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Firma Stok Edit Son


  //************* RequestForm ***************** */

   //! RequestForm
   public function RequestFormList ($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "requestform.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "requestform.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "requestform.isActive";  $data_item_object="="; }
               else if($data_key_item == "PersonelId") { $data_key_item = "requestform.personeId";  $data_item_object="="; }
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('requestform')
            ->join('users', 'users.id', '=', 'requestform.personeId')
            ->select('requestform.*','users.name','users.surname','users.img_url')
            ->where($data_all)->orderBy('requestform.id','desc') ->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();


            //! Params Verileri Where Formatında Yazılacak Son     

            //veri tabanı işlemleri
            $DB_Find_User = DB::table('users')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_User); die();

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();
 
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
          
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_User"] =  $DB_Find_User;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
           

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/requestFormList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! RequestForm Son

   //! RequestFormAdd Post  
   public function RequestFormAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Firma Bilgileri
         $DB_Find_Current = DB::table('current_cart')->where('id',(int)$request->currencyCartId)->first();
         //echo "<pre>";print_r($DB_Find_Current); die();
        

         //! Kod Oluşturma
      
         //veri tabanı işlemleri
         $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();
         //echo "<pre>"; print_r($DB_Find_site_code); die();
         //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

         $DB_Find_Number="";
         $DB_Find_type=$DB_Find_site_code->request;
         $DB_Find_no=(int)$DB_Find_site_code->request_no;
         $DB_Find_no=$DB_Find_no+1;
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         //! Veri Güncelle
         $DB_Status = DB::table('site_code')->where('id',1)->update([ 'request_no'=>$DB_Find_no ]);

         $returnCode=$DB_Find_type."-".date('dmY').'-'.$DB_Find_Number;
         //echo "ProformaCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son


         //! Veri Ekleme
         DB::table('requestform')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'reqCode' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,

            'requestFormTitle' => $request->requestFormTitle,
            'public' => $request->public,
            'personeId'=>$request->personeId,

            'currencyCartId'=>(int)$request->currencyCartId,
            'companyAuthorized_person'=>$DB_Find_Current->authorized_person,
            'companyAuthorized_email'=>$DB_Find_Current->authorized_person_mail,
            'companyAuthorized_tel'=>$DB_Find_Current->authorized_person_tel,

            'companyAuthorized_person_tax_no'=>$DB_Find_Current->tax_number,
            'companyAuthorized_person_tax_adm'=>$DB_Find_Current->tax_administration,
            'companyAuthorized_person_adress'=>$DB_Find_Current->billing_address,

            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'deneme' => "Ekleme",
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestFormAdd Post Son

   //! RequestForm Delete  
   public function RequestFormDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('requestform')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestForm Delete  Son
   
   //! RequestForm Delete  Multi
   public function RequestFormDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('requestform')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestForm Delete Multi  Son

   //! RequestForm Edit  
   public function RequestFormEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->where('id',$request->id)
         ->update([            
            'requestFormTitle'=>$request->requestFormTitle,
            'currency'=>$request->currency,
            'description'=>$request->description,
            'requestEffectiveDate'=>$request->requestEffectiveDate,
            'currencyCartId'=>$request->currencyCartId,

            'companyAuthorized_person'=>$request->companyAuthorized_person,
            'companyAuthorized_email'=>$request->companyAuthorized_email,
            'companyAuthorized_tel'=>$request->companyAuthorized_tel,

            'companyAuthorized_person_tax_no'=>$request->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm'=>$request->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress'=>$request->companyAuthorized_person_adress,

            'public'=>$request->public,
            'public_username'=>$request->public_username,
            'public_pass'=>$request->public_pass,
            'personeId'=>$request->	personeId,
          

            'delivery_at'=>$request->delivery_at,
            'vendorDeliveryType'=>$request->vendorDeliveryType,
            'vendorDeliveryType_Title'=>$request->vendorDeliveryType_Title,
          
            'paymentMethod'=>$request->paymentMethod,
            'paymentMethod_Title'=>$request->paymentMethod_Title,

            'modeofTransport'=>$request->modeofTransport,
            'modeofTransport_Title'=>$request->modeofTransport_Title,

            'shipmentType'=>$request->shipmentType,
            'shipmentType_title'=>$request->shipmentType_title,

            'intertek'=>$request->intertek,
            'intertek_Title'=>$request->intertek_Title,

            'specialPermit'=>$request->specialPermit,
            'specialPermit_Title'=>$request->specialPermit_Title,

           
            'requested_document'=>$request->requested_document,
            'purchaseAmount'=>$request->purchaseAmount,
            'purchaseAmountStockUnit'=>$request->purchaseAmountStockUnit,

            'purchaseTime'=>$request->purchaseTime,
            'initialPurchaseAmount'=>$request->initialPurchaseAmount,
            'initialPurchaseAmountStockUnit'=>$request->initialPurchaseAmountStockUnit,

            'initialPurchaseAmount_at'=>$request->initialPurchaseAmount_at,
            'deliveryLocation'=>$request->deliveryLocation,
            'packagingType'=>$request->packagingType,

         
            'reqSample'=>$request->reqSample,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestForm Edit Son


   //! RequestForm Edit Settings 
   public function RequestFormEditSettingsPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
      

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->where('id',$request->id)
         ->update([     
            'currencyCartId'=>$request->currencyCartId,
            'public'=>$request->public,
            'public_username'=>$request->public_username,
            'public_pass'=>$request->public_pass,
            'personeId'=>$request->	personeId,
         
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_status' =>  $DB_Status
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
      
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestForm Edit Settings Son


   //! RequestForm Public Edit  
   public function RequestFormEditPublicPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->where('id',$request->id)
         ->update([
            'currency'=>$request->currency,
            'description'=>$request->description,
            'requestEffectiveDate'=>$request->requestEffectiveDate,

            'delivery_at'=>$request->delivery_at,
            'vendorDeliveryType'=>$request->vendorDeliveryType,
            'vendorDeliveryType_Title'=>$request->vendorDeliveryType_Title,
          
            'paymentMethod'=>$request->paymentMethod,
            'paymentMethod_Title'=>$request->paymentMethod_Title,

            'modeofTransport'=>$request->modeofTransport,
            'modeofTransport_Title'=>$request->modeofTransport_Title,

            'shipmentType'=>$request->shipmentType,
            'shipmentType_title'=>$request->shipmentType_title,

            'intertek'=>$request->intertek,
            'intertek_Title'=>$request->intertek_Title,

            'specialPermit'=>$request->specialPermit,
            'specialPermit_Title'=>$request->specialPermit_Title,

           
            'requested_document'=>$request->requested_document,
            'purchaseAmount'=>$request->purchaseAmount,
            'purchaseAmountStockUnit'=>$request->purchaseAmountStockUnit,

            'purchaseTime'=>$request->purchaseTime,
            'initialPurchaseAmount'=>$request->initialPurchaseAmount,
            'initialPurchaseAmountStockUnit'=>$request->initialPurchaseAmountStockUnit,

            'initialPurchaseAmount_at'=>$request->initialPurchaseAmount_at,
            'deliveryLocation'=>$request->deliveryLocation,
            'packagingType'=>$request->packagingType,
         
            'reqSample'=>$request->reqSample,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestForm Public Edit Son

   //! RequestForm Edit View
   public function RequestFormEditView($site_lang="tr",$id)
   {

      try {

          //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            // Talep Bilgileri
            $DB_Find = DB::table('requestform')->where('id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //! Firma Bilgileri
            $DB_Find_Current = DB::table('current_cart')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();

            //! Kullanıcı Bilgileri
            $DB_Find_User = DB::table('users')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_User); die();

            //! Kategori Bilgileri
            $DB_Find_Category = DB::table('category')->where('type','SektorStok')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Category); die();
            
            //! Ürün Bilgileri
            $DB_Find_Stock = DB::table('stock')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Stock); die();
            
            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('requestform_product_list')
            ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
            ->select('requestform_product_list.*','stock.isActive as stockActive')
            ->where('requestform_product_list.requestform_id',$id)->get();
            //echo "<pre>"; print_r($DB_Find_Product); die();
            //! Ürün Bilgileri Son

            //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı
            $DB_Find_Product_Ret_Count = DB::table('requestform_product_list')
            ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
            ->select('requestform_product_list.*','stock.isActive as stockActive')
            ->where('requestform_product_list.requestform_id',$id)
            ->where('stock.isActive','=',0)
            ->count();
            //echo "<pre>"; print_r($DB_Find_Product_Ret_Count); die();
            //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı Son


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son
      

             //! Diğer Veriler
             $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
             $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
             $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
             $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
             $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
             $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();


            //! Kod
            $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
            $DB_Find_Number = "00";
            $DB_Find_no = (int)$DB_Find_site_code->stock_no;
            $DB_Find_no=$DB_Find_no+1;

            if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
            else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
            else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else { $DB_Find_Number = (string)$DB_Find_no; }
            //! Kod Son

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Number"] =  $DB_Find_Number; //! Stok Numarası
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            $DB["DB_Find_User"] =  $DB_Find_User;
            $DB["DB_Find_Category"] =  $DB_Find_Category;
            $DB["DB_Find_Stock"] =  $DB_Find_Stock;

            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_Ret_Count"] =  $DB_Find_Product_Ret_Count;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;
          


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/requestFormEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! RequestForm Edit View Son


   //! RequestForm Post
   public function RequestFormSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('requestform')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! RequestForm Search Post Son

   //! RequestForm View
   public function RequestFormSearchView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
       
            //veri tabanı işlemleri
            $DB_Find = DB::table('requestform')->where('id',$id)->first(); //Tüm verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/requestFormView',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! RequestForm View Son
   
   //! RequestForm Edit Active
   public function RequestFormEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! RequestForm Edit Active Son

   //! RequestForm Edit Active Multi
   public function RequestFormEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! RequestForm Edit Active Multi Son

   
   //! Dosya Yükleme - Ürün Resmi
   public function RequestFormFileUploadProductImage(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! Veri Güncelle
            $DB_Status = DB::table('requestform')->where('id',$request->requestformId)
            ->update([            
               'product_image'=>"/upload/uploads/".$fileName,

               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);
            //! Veri Güncelle
           

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),

               'requestformId' => $request->requestformId,
               //'db' => $DB_Status
              
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! Dosya Yükleme - Ürün Resmi Son


   //! RequestForm File Export
   public function RequestFormFileExport($site_lang="tr",$id)
   {

      try {

          //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('requestform')
            ->select('requestform.*')
            ->where('requestform.id',$id)
            ->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->where('id',$DB_Find->currencyCartId)->first(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('requestform_product_list')->where('requestform_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son

   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/requestFormExport',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! RequestForm File Export Son


   //! RequestForm public View
   public function RequestFormPublicView($site_lang="tr",$id)
   {

      //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($site_lang);

      try {

         //! Tanım
         $yildirimdev_publc_userCheck = 0;
         $yildirimdev_public_ID = "";
         $yildirimdev_public_companyID = "";
         $yildirimdev_public_request = ""; //! Talep id

        
         //! Çerez
         if(isset($_COOKIE["yildirimdev_public_request"])) { $yildirimdev_public_request  = request()->cookie('yildirimdev_public_request'); }
         if($yildirimdev_public_request == "") { $yildirimdev_publc_userCheck = 0; }
         if($yildirimdev_public_request != "") {
            
            $public_request = explode(',',$yildirimdev_public_request); //! Verileri Parçalıyor

            if(in_array($id, $public_request)) { $yildirimdev_publc_userCheck = 1; }
            else { $yildirimdev_publc_userCheck = 0; }
            
         }
         //! Çerez Son
         
          
         //! Session
         if(session('status')=="succes") {  
          
            $yildirimdev_publc_userCheck = 1;
            $yildirimdev_public_ID = session('yildirimdev_public_ID'); //! id
            $yildirimdev_public_companyID = session('yildirimdev_public_companyID'); //! company id

            if($yildirimdev_public_request == "" ) { $yildirimdev_public_request = $id; }
            else if($yildirimdev_public_request != "" ) {  

               //! Çerezleri Kontrol
               $public_request = explode(',',$yildirimdev_public_request); //! Verileri Parçalıyor
               $public_request[] = $id;

               $yildirimdev_public_request = implode(',',$public_request); //! Verileri Birleştirme

            }
             
            //! Çerez Oluşturma
            return redirect('request/form/'.__('admin.lang').'/'.'public'.'/'.$id)
            ->cookie('yildirimdev_public_request',$yildirimdev_public_request,86400); 

         } //! Session Son
    

         if( $yildirimdev_publc_userCheck == 1 ) {  //! Kullanıcı Giriş Var
            //veri tabanı işlemleri
            $DB_Find = DB::table('requestform')->where('id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();


            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();


            //veri tabanı işlemleri
            $DB_Find_User = DB::table('users')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_User); die();

            //veri tabanı işlemleri
            $DB_Find_Category = DB::table('category')->where('type','SektorStok')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Category); die();

            //veri tabanı işlemleri
            $DB_Find_Stock = DB::table('stock')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Stock); die();
            
            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('requestform_product_list')
            ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
            ->select('requestform_product_list.*','stock.isActive as stockActive')
            ->where('requestform_product_list.requestform_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();
            //! Ürün Bilgileri Son

            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son
       

            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();


            //! Kod
            $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
            $DB_Find_Number = "00";
            $DB_Find_no = (int)$DB_Find_site_code->stock_no;
            $DB_Find_no=$DB_Find_no+1;

            if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
            else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
            else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
            else { $DB_Find_Number = (string)$DB_Find_no; }
            //! Kod Son


            
   
            //! Return
            $DB["id"] =  $yildirimdev_public_ID;
            $DB["visible"] =  true;
            $DB["companyId"] =  $yildirimdev_public_companyID;
            $DB["userId"] =  $yildirimdev_public_companyID;
            $DB["name"] =  "User";
            $DB["surname"] =  "Surname";
            $DB["role"] =  "Hello";
            $DB["userImageUrl"] = config('admin.Default_UserImgUrl');
            $DB["loginUrl"] = '/request/form/'.$site_lang.'/login'.'/'.$id;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Number"] =  $DB_Find_Number; //! Stok Numarası
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            $DB["DB_Find_User"] =  $DB_Find_User;

            $DB["DB_Find_Category"] =  $DB_Find_Category;
            $DB["DB_Find_Stock"] =  $DB_Find_Stock;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            //! Public Control
            $publicControl = $DB_Find->public; 
            if( $publicControl == "1" || $publicControl == "2") {  return view('admin/requestFormPublic',$DB); } 
            else {  return view('admin/error404',$DB);  }



         }
         else if( $yildirimdev_publc_userCheck == 0 ) { return redirect('request/form/'.__('admin.lang').'/login'.'/'.$id);  }
         
   
      } catch (\Throwable $th) {  throw $th; }
   } //! RequestForm public View Son


   //! RequestForm public Login
   public function RequestFormPublicLogin($site_lang="tr",$id)
   {

      try {

         //? Cookie Varsa 
         if(isset($_COOKIE["yildirimdev_public_request"])) {

            //! Çerezleri Kontrol
            $yildirimdev_public_request  = request()->cookie('yildirimdev_public_request');
            $public_request = explode(',',$yildirimdev_public_request); //! Verileri Parçalıyor
            
            if(in_array($id, $public_request)) { 
               $data_find = array_search($id,$public_request); //! Arama
               unset($public_request[$data_find]); //! Silme
           

               if (count($public_request) > 0 ) {  

                  $yildirimdev_public_request = implode(',',$public_request); //! Verileri Birleştirme

                  //! Çerez Oluşturma
                  return redirect('request/form/'.__('admin.lang').'/'.'login'.'/'.$id)
                  ->cookie('yildirimdev_public_request',$yildirimdev_public_request,86400); 

               }
               else {

                  //! Silme
                  return redirect('request/form/'.__('admin.lang').'/'.'login/'. $id)->cookie('yildirimdev_public_request',null,-1);

               }
            }
         } 
      
            
         $DB["id"] =  $id; 
         $DB["visible"] =  false;
         $DB["name"] =  "User";
         $DB["surname"] =  "Surname";
         $DB["role"] =  "Hello";
         $DB["userImageUrl"] = config('admin.Default_UserImgUrl');
         $DB["loginUrl"] = 'loginUrl';
         
         //! Çoklu Dil
         \Illuminate\Support\Facades\App::setLocale($site_lang);
         return view('admin/requestFormPublicLogin',$DB);

         
   
      } catch (\Throwable $th) {  throw $th; }

     
   } //! RequestForm public Login Son


   //!  RequestForm public View Login Control
   public function RequestFormPublicLoginControl(Request $request)
   {

      try { 

         //Veri Okuma
         // [ Name] - değerlerine göre oku
         $token= $request->_token;
         $siteLang= $request->siteLang; //! Çoklu Dil
         \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

         //! Login
         $username= $request->username;
         $password= $request->password;
         $id= $request->id;

         //veri tabanı işlemleri
         $DB_Where= DB::table('requestform')
         ->where('id','=',(int)$request->id)
         ->where('public_username','=',$request->username)->where('public_pass','=',$request->password)
         ->first();

         if($DB_Where) { 
            return redirect('request/form/'.__('admin.lang').'/public'.'/'.$id)
                  ->with('status',"succes")
                  ->with('yildirimdev_public_companyID',$DB_Where->currencyCartId)
                  ->with('yildirimdev_public_ID',$id);
         }
         else { return redirect('request/form/'.__('admin.lang').'/login'.'/'.$id)->with('status',"error")->with('msg', __('admin.TheUserPasswordMayBeIncorrect')); }


      } catch (\Throwable $th) {  throw $th; }
      
   } //! RequestForm public View Login Control Son


   //************* Talep Alma Stok List ***************** */

   //! RequestFormStockList Add  
   public function RequestFormStockListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Stok Id
         $stockId = $request->stock_id;
         $stockId_new = 0;
         $id = $request->requestform_id;
        
        if($request->isActive == "false") { 

            //! Stok Veri Ekleme
            $stockId_new =  DB::table('stock')->insertGetId([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'sector' => $request->sector? $request->sector : null ,
               'sub_sector' => $request->sub_sector? $request->sub_sector : null ,

               'codeNumber' => $request->codeNumber? $request->codeNumber : null ,
               'stockCode' =>  $request->stockCode ? $request->stockCode : null ,
               'accountingCode_buy' => $request->accountingCode_buy ? $request->accountingCode_buy : null ,
               'accountingCode_sel' => $request->accountingCode_sel ? $request->accountingCode_sel : null ,
               
               'namePublic' => $request->namePublic ? $request->namePublic : null ,
               'nameTr' => $request->nameTr ? $request->nameTr : null ,
               'nameEn' => $request->nameEn ? $request->nameEn : null ,

               'imgUrl' => $request->imgUrl == "" ? config('admin.Default_ProductImgUrl') : $request->imgUrl,
               'techFileUrl' => $request->techFileUrl ? $request->techFileUrl : null ,
               
               'stockUnit' => $request->stockUnit ? $request->stockUnit : null ,
               'stockCount' => $request->stockCount ? $request->stockCount : null ,
                //'currency' => $request->currency,
               'price' => $request->price ? $request->price : null ,
               
               'kdv_buy' => $request->kdv_buy ? $request->kdv_buy : null ,
               'kdv_sell' => $request->kdv_sell ? $request->kdv_sell : null ,

               'export_registered' => $request->export_registered ? $request->export_registered : null ,
               'export_registered_kdv_buy' => $request->export_registered_kdv_buy ? $request->export_registered_kdv_buy : null ,
               'export_registered_kdv_sell' => $request->export_registered_kdv_sell  ? $request->export_registered_kdv_sell : null ,

               'descriptionTr' => $request->descriptionTr ? $request->descriptionTr : null ,
               'descriptionEn' => $request->descriptionEn ? $request->descriptionEn : null ,
               
               'featuresTr' => $request->featuresTr ? $request->featuresTr : null ,
               'featuresEn' => $request->featuresEn ? $request->featuresEn : null ,

               'tech_featuresTr' => $request->tech_featuresTr ? $request->tech_featuresTr : null ,
               'tech_featuresEn' => $request->tech_featuresEn ? $request->tech_featuresEn : null ,

               'web_address' => $request->web_address ? $request->web_address : null ,
               'catalogLink' => $request->catalogLink ? $request->catalogLink : null ,
               'gtipNo' => $request->gtipNo ? $request->gtipNo : null ,

               'isActive'=>$request->isActive == "true" ? true : false,
               'created_byId'=>$request->created_byId,
            ]); //! Stok Veri Ekleme Son


           //echo "Yeni Ürün stockId:"; echo $stockId_new; die();

        }

        //! Veri Ekleme
        DB::table('requestform_product_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'requestform_id'=> $request->requestform_id,
            'sector' => $request->sector ? $request->sector : null ,
            'sub_sector' => $request->sub_sector ? $request->sub_sector : null ,
            'stock_id' => $request->isActive == "true" ? $stockId : $stockId_new,
           
            'namePublic' => $request->namePublic ? $request->namePublic : null ,
            'nameTr' => $request->nameTr ? $request->nameTr : null ,
            'nameEn' => $request->nameEn ? $request->nameEn : null ,

            'imgUrl' => $request->imgUrl == "" ? null: $request->imgUrl,
            'techFileUrl' => $request->techFileUrl ? $request->techFileUrl : null ,
          
            'stockUnit' => $request->stockUnit ? $request->stockUnit : null ,
            'stockCount' => $request->stockCount ? $request->stockCount : null ,
            'currency' => $request->currency ? $request->currency : null ,
            'price' => $request->price ? $request->price : null ,
            'total' => $request->total ? $request->total : null ,
            
            'kdv_buy' => $request->kdv_buy ? $request->kdv_buy : null ,
            'kdv_sell' => $request->kdv_sell ? $request->kdv_sell : null ,

            'export_registered' => $request->export_registered ? $request->export_registered : null ,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy ? $request->export_registered_kdv_buy : null ,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell ? $request->export_registered_kdv_sell : null ,

            'descriptionTr' => $request->descriptionTr ? $request->descriptionTr : null ,
            'descriptionPublic' => $request->descriptionPublic ? $request->descriptionPublic : null ,
            
            'featuresTr' => $request->featuresTr ? $request->featuresTr : null ,
            'featuresPublic' => $request->featuresPublic ? $request->featuresPublic : null ,

            'tech_featuresTr' => $request->tech_featuresTr ? $request->tech_featuresTr : null ,
            'tech_featuresPublic' => $request->tech_featuresPublic ? $request->tech_featuresPublic : null ,

            'web_address' => $request->web_address ? $request->web_address : null ,
            'catalogLink' => $request->catalogLink ? $request->catalogLink : null ,
            'gtipNo' => $request->gtipNo ? $request->gtipNo : null ,

            'productModel' => $request->productModel ? $request->productModel : null ,
            'productCode' => $request->productCode ? $request->productCode : null ,
            'is_warranty' => $request->is_warranty ? $request->is_warranty : null ,
            'warrantyTime' => $request->warrantyTime ? $request->warrantyTime : null ,

            'setup' => $request->setup ? $request->setup : null ,
            'brand' => $request->brand ? $request->brand : null ,
            'colorCode' => $request->colorCode ? $request->colorCode : null ,

            'productUsePurposeTR' => $request->productUsePurposeTR ? $request->productUsePurposeTR : null ,
            'productUsePurposeEN' => $request->productUsePurposeEN ? $request->productUsePurposeEN : null ,

            'ownBrand' => $request->ownBrand ? $request->ownBrand : null ,
            'specialDesign' => $request->specialDesign ? $request->specialDesign : null ,
            'specialPacket' => $request->specialPacket ? $request->specialPacket : null ,
            'salesOutlet' => $request->salesOutlet ? $request->salesOutlet : null ,
            
            'isActive'=>$request->isActive == "true" ? true : false,
            'created_byId'=>$request->created_byId ? $request->created_byId : 0,
        ]); //! Veri Ekleme Son

        //echo "Talep Stok Eklendi"; echo $stockId_new; die();

         //! Ürün Bilgileri
         $DB_Find_Product = DB::table('requestform_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
         ->select('requestform_product_list.*','stock.isActive as stockActive')
         ->where('requestform_product_list.requestform_id',$id)->get();
         //echo "<pre>"; print_r($DB_Find_Product); die();
         //! Ürün Bilgileri Son

         //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı
         $DB_Find_Product_Ret_Count = DB::table('requestform_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
         ->select('requestform_product_list.*','stock.isActive as stockActive')
         ->where('requestform_product_list.requestform_id',$id)
         ->where('stock.isActive','=',0)
         ->count();
         //echo "<pre>"; print_r($DB_Find_Product_Ret_Count); die();
         //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı Son


         //! Ürün Toplam Tutar
         $DB_Find_Product_TotalPayment = 0; 
         for ($i=0; $i <count($DB_Find_Product); $i++) {  
            $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
            $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
         }
         //! Ürün Bilgileri Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'DB_Product' => $DB_Find_Product,
            'DB_Find_Product_Ret_Count' => $DB_Find_Product_Ret_Count,
            'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Add  Son

   //! RequestFormStockList Delete  
   public function RequestFormStockListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Silme
         $DB_Status = DB::table('requestform_product_list')->where('id',$request->id)->delete();

         $id = $request->requestform_id;

         //! Ürün Bilgileri
         $DB_Find_Product = DB::table('requestform_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
         ->select('requestform_product_list.*','stock.isActive as stockActive')
         ->where('requestform_product_list.requestform_id',$id)->get();
         //echo "<pre>"; print_r($DB_Find_Product); die();
         //! Ürün Bilgileri Son

         //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı
         $DB_Find_Product_Ret_Count = DB::table('requestform_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
         ->select('requestform_product_list.*','stock.isActive as stockActive')
         ->where('requestform_product_list.requestform_id',$id)
         ->where('stock.isActive','=',0)
         ->count();
         //echo "<pre>"; print_r($DB_Find_Product_Ret_Count); die();
         //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı Son


         //! Ürün Toplam Tutar
         $DB_Find_Product_TotalPayment = 0; 
         for ($i=0; $i <count($DB_Find_Product); $i++) {  
            $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
            $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
         }
         //! Ürün Bilgileri Son
        

        

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_Ret_Count' => $DB_Find_Product_Ret_Count,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Delete  Son

   //! RequestFormStockList Delete  Multi
   public function RequestFormStockListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('requestform_product_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Delete  Son


   //! RequestFormStockList Post
   public function RequestFormStockListSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
         //! Veri Arama
         $DB_Find = DB::table('requestform_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
         ->select('requestform_product_list.*','stock.stockCode','stock.codeNumber','stock.accountingCode_buy','stock.accountingCode_sel','stock.isActive as stockActive')
         ->where('requestform_product_list.id',$request->id)
         ->first(); //Tüm verileri çekiyor
         //echo "<pre>"; echo print_r($DB_Find); die();
         
         if($DB_Find) {

            $DB_Find_Category = DB::table('categorysub')->where('categoryid',(int)$DB_Find->sector)->get(); //Tüm verileri çekiyor

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
               'DB_Find_Category' =>  $DB_Find_Category
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Search Post Son

     
   //! RequestFormStockList Update  
   public function RequestFormStockListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Tanım
         $DB_Status = 0;

         if($request->public == "false") {  //! Normal
            
            if($request->stockActive == "0" ) { //! Stok Güncelleme
          
               //! Veri Güncelle
               $DB_Status_Stock = DB::table('stock')->where('id',$request->stock_id)
               ->update([            
               
                  'sector' => $request->sector ? $request->sector : null,
                  'sub_sector' => $request->sub_sector ? $request->sub_sector : null,

                  'codeNumber' => $request->codeNumber ? $request->codeNumber : null,
                  'stockCode' => $request->stockCode ? $request->stockCode : null,
                  'accountingCode_buy' => $request->accountingCode_buy ? $request->accountingCode_buy : null,
                  'accountingCode_sel' => $request->accountingCode_sel ? $request->accountingCode_sel : null,
               
                  'namePublic' => $request->namePublic ? $request->namePublic : null,
                  'nameTr' => $request->nameTr ? $request->nameTr : null,

                  'featuresTr' => $request->featuresTr ?  $request->featuresTr : null,
                  'tech_featuresTr' => $request->tech_featuresTr ? $request->tech_featuresTr : null,
                  'descriptionTr' => $request->descriptionTr ? $request->descriptionTr : null,

                  'catalogLink' => $request->catalogLink ? $request->catalogLink : null,
                  'web_address' => $request->web_address ? $request->web_address : null,
                  'gtipNo' => $request->gtipNo ? $request->gtipNo : null,
               
                  'imgUrl' => $request->imgUrl,
                  'techFileUrl' => $request->techFileUrl,

                  'isActive'=>true,
                  'isUpdated'=>true,
                  'updated_at'=>Carbon::now(),
                  'updated_byId'=>$request->updated_byId,

               ]); //! Veri Güncelle

            }
          
            //! Veri Güncelle
            $DB_Status = DB::table('requestform_product_list')->where('id',$request->id)
            ->update([            
            
               'sector' => $request->sector ? $request->sector : null,
               'sub_sector' => $request->sub_sector ? $request->sub_sector : null,
               'stock_id' => $request->stock_id ? $request->stock_id : null,

               'namePublic' => $request->namePublic ? $request->namePublic : null,
               'nameTr' => $request->nameTr ? $request->nameTr : null,
               
               'stockUnit' => $request->stockUnit ? $request->stockUnit : null,
               'stockCount' => $request->stockCount ? $request->stockCount : null,
               'price' => $request->price ? $request->price : null,
               'total' => $request->total ? $request->total : null,
            
               'kdv_buy' =>  $request->kdv_buy ? $request->kdv_buy : null,
               'kdv_sell' => $request->kdv_sell ? $request->kdv_sell : null,

               'export_registered' => $request->export_registered ? $request->export_registered : null,
               'export_registered_kdv_buy' => $request->export_registered_kdv_buy ? $request->export_registered_kdv_buy : null,
               'export_registered_kdv_sell' => $request->export_registered_kdv_sell ? $request->export_registered_kdv_sell : null,

               'featuresTr' => $request->featuresTr ?  $request->featuresTr : null,
               'featuresPublic' => $request->featuresPublic ?  $request->featuresPublic : null,

               'tech_featuresTr' => $request->tech_featuresTr ? $request->tech_featuresTr : null,
               'tech_featuresPublic' => $request->tech_featuresPublic ? $request->tech_featuresPublic : null,

               'descriptionTr' => $request->descriptionTr ? $request->descriptionTr : null,
               'descriptionPublic' => $request->descriptionPublic ? $request->descriptionPublic : null,

               'catalogLink' => $request->catalogLink ? $request->catalogLink : null,
               'web_address' => $request->web_address ? $request->web_address : null,
               'gtipNo' => $request->gtipNo ? $request->gtipNo : null,
            
               'imgUrl' => $request->imgUrl,
               'techFileUrl' => $request->techFileUrl,

               'isActive'=>true,
               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);  //! Veri Güncelle Son

         }
         else {  //! Public 
        
            //! Veri Güncelle
            $DB_Status = DB::table('requestform_product_list')->where('id',$request->id)
            ->update([            
            
               'sector' => $request->sector ? $request->sector : null,
               'sub_sector' => $request->sub_sector ? $request->sub_sector : null,
               'namePublic' => $request->namePublic ? $request->namePublic : null,
            
               'stockUnit' => $request->stockUnit ? $request->stockUnit : null,
               'stockCount' => $request->stockCount ? $request->stockCount : null,
               'price' => $request->price ? $request->price : null,
               'total' => $request->total ? $request->total : null,

               'featuresPublic' => $request->featuresPublic ?  $request->featuresPublic : null,
               'tech_featuresPublic' => $request->tech_featuresPublic ? $request->tech_featuresPublic : null,
               'descriptionPublic' => $request->descriptionPublic ? $request->descriptionPublic : null,

               'catalogLink' => $request->catalogLink ? $request->catalogLink : null,
               'web_address' => $request->web_address ? $request->web_address : null,
               'gtipNo' => $request->gtipNo ? $request->gtipNo : null,
            
               'imgUrl' => $request->imgUrl,
               'techFileUrl' => $request->techFileUrl,

               // 'isActive'=>true,
               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]); //! Veri Güncelle Son




         }

     
 
         
         if($DB_Status) {

            $id = $request->requestform_id;

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('requestform_product_list')
            ->leftJoin('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
            ->select('requestform_product_list.*','stock.isActive as stockActive')
            ->where('requestform_product_list.requestform_id',$id)->get();
            //echo "<pre>"; print_r($DB_Find_Product); die();
            //! Ürün Bilgileri Son
   
            //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı
            $DB_Find_Product_Ret_Count = DB::table('requestform_product_list')
            ->join('stock', 'stock.id', '=', 'requestform_product_list.stock_id')
            ->select('requestform_product_list.*','stock.isActive as stockActive')
            ->where('requestform_product_list.requestform_id',$id)
            ->where('stock.isActive','=',0)
            ->count();
            //echo "<pre>"; print_r($DB_Find_Product_Ret_Count); die();
            //! Ürün Bilgileri - Stok Onaylanmayan Stok Sayısı Son
   
   
            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son
           

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_Ret_Count' => $DB_Find_Product_Ret_Count,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB_Product' => [],
               'DB_Find_Product_Ret_Count' => [],
               'DB_Find_Product_TotalPayment' => [],
               'dataId'=> $request->id
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'DB_Product' => [],
            'DB_Find_Product_Ret_Count' => [],
            'DB_Find_Product_TotalPayment' => [],
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Update  Son
   

   //! RequestFormStockList Edit Active
   public function RequestFormStockListEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('requestform_product_list')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Edit Active Son


   //! RequestFormStockList Edit Active Multi
   public function RequestFormStockListEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('requestform_product_list')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! RequestFormStockList Edit Active Multi Son



   //************* GetOffers ***************** */

   //! GetOffers
   public function GetOffersList ($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı

            //! Talep Ürün
            $isRequestFormId=false;  //! Talep Onay
            $data_RequestFormId=0; //! Talep id
            $isRequestFormProductId=false; 
            $data_RequestFormProductId=0; //! Ürün id


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "get_offers.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "get_offers.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "get_offers.isActive";  $data_item_object="="; }
               else if($data_key_item == "CurrencyCartId") { $data_key_item = "get_offers.currencyCartId";  $data_item_object="="; }

               //! Talep 
               else if($data_key_item == "RequestFormId" && $data_item != "All"  ) {$isRequestFormId= true; $data_RequestFormId=$data_item;  }

               else if($data_key_item == "ShipmentTypeId") { $data_key_item = "get_offers.shipmentType";  $data_item_object="="; }
               else if($data_key_item == "VendorDeliveryTypeId") { $data_key_item = "get_offers.vendorDeliveryType";  $data_item_object="="; }
               else if($data_key_item == "PaymentMethodId") { $data_key_item = "get_offers.paymentMethod";  $data_item_object="="; }
               else if($data_key_item == "ModeofTransportId") { $data_key_item = "get_offers.modeofTransport";  $data_item_object="="; }
               else if($data_key_item == "IntertekId") { $data_key_item = "get_offers.intertek";  $data_item_object="="; }

               //! Ürün
               else if($data_key_item == "RequestFormProductId" && $data_item != "All" ) { $isRequestFormProductId=true; $data_RequestFormProductId=$data_item;  }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               // echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
              if($data_key_item != "RequestFormProductId" && $data_item != "All" ) { array_push($data_all,$data_search_key);  }

            } //! Params Verileri Where Formatında Yazılacak Son

           
            //! Çoklu Arama
            if($isRequestFormProductId==false ) {
              
               //veri tabanı işlemleri
               $DB_Find = DB::table('get_offers')
               ->leftJoin('current_cart', 'current_cart.id', '=', 'get_offers.currencyCartId')
               ->leftJoin('requestform', 'requestform.id', '=', 'get_offers.requestformid')
               ->where($data_all)
               ->select('get_offers.*','current_cart.current_name','requestform.requestFormTitle')
               ->orderBy('get_offers.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
               //echo "<pre>"; print_r($DB_Find); die();
               
            }
            else {
               
               //veri tabanı işlemleri
               $DB_Find = DB::table('get_offers')
               ->leftJoin('current_cart', 'current_cart.id', '=', 'get_offers.currencyCartId')
               ->leftJoin('requestform', 'requestform.id', '=', 'get_offers.requestformid')
               ->leftJoin('get_offers_product_list', 'get_offers_product_list.get_offers_id', '=', 'get_offers.id')
               ->where($data_all)
               ->where('get_offers_product_list.requestform_product_id','=',$data_RequestFormProductId)
               ->select(
                        'get_offers.*','current_cart.current_name','requestform.requestFormTitle',
                        'get_offers_product_list.nameTr',
                        
                        'get_offers_product_list.productModel',
                        'get_offers_product_list.brand',
                        'get_offers_product_list.colorCode',
                        'get_offers_product_list.productCode',

                        'get_offers_product_list.stockCount',
                        'get_offers_product_list.stockUnit',
                        'get_offers_product_list.price',
                        'get_offers_product_list.currency',
                        'get_offers_product_list.total',
                     )
               ->orderBy('get_offers.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
               //echo "<pre>"; print_r($DB_Find); die();
               

            }
            //! Çoklu Arama Son
           
        
            //! Params Verileri Where Formatında Yazılacak Son      
            
            
            //! Talep Formu
            $DB_Find_requestform = DB::table('requestform')->get();//! Talepler
            $DB_Find_current_cart = DB::table('current_cart')->get();//! Cari Kart
            //echo "<pre>"; print_r($DB_Find_current_cart); die();


            //! Talep Ürün Bilgileri
            $DB_Find_requestform_product_list = DB::table('requestform_product_list')->where('requestform_id',$data_RequestFormId)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_requestform_product_list); die();

            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();

            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_requestform"] =  $DB_Find_requestform;
            $DB["DB_Find_current_cart"] =  $DB_Find_current_cart;
            
            $DB["isRequestFormId"] =  $isRequestFormId;  //! Talep
            
            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            $DB["DB_Find_requestform_product_list"] =  $DB_Find_requestform_product_list; //! Talep
            $DB["isRequestFormProductId"] =  $isRequestFormProductId ? true : false; //! Ürün

            // echo "isRequestFormProductId:"; echo $DB["isRequestFormProductId"]; die();
            // echo "<pre>"; print_r($DB); die();

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/getOffersList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! GetOffers Son

   //! GetOffersAdd Post  
   public function GetOffersAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         
         //! Kod Oluşturma
         
         //veri tabanı işlemleri
         $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
         //echo "<pre>"; print_r($DB_Find_site_code); die();
         //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

         $DB_Find_Number="";
         $DB_Find_type=$DB_Find_site_code->get_offers;
         $DB_Find_no=(int)$DB_Find_site_code->get_offers_no;
         $DB_Find_no=$DB_Find_no+1;
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         //! Veri Güncelle
         $DB_Status = DB::table('site_code')->where('id',1)->update([ 'get_offers_no'=>$DB_Find_no ]);

         $returnCode=$DB_Find_type."-".date('dmY').'-'.$DB_Find_Number;
         //echo "ProformaCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son

         //! Talepten Verileri Çekme
         $DB_Find_requestform_where = DB::table('requestform')->where('id',(int)$request->requestformid)->first();
         //echo "<pre>"; print_r($DB_Find_requestform_where); die();
 

         //! Veri Ekleme
         DB::table('get_offers')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'getOfferNo' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,
           
            'paymentMethod' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> paymentMethod : null,
            'paymentMethod_Title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> paymentMethod_Title : null,

            'modeofTransport' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> modeofTransport : null,
            'modeofTransport_Title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> modeofTransport_Title : null,
            'shipmentType' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> shipmentType : null,
            'shipmentType_title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> shipmentType_title : null,

            'intertek' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> intertek : null,
            'intertek_Title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> intertek_Title : null,
            'specialPermit' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> specialPermit : null,
            'specialPermit_Title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> specialPermit_Title : null,

            'vendorDeliveryType' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> vendorDeliveryType : null,
            'vendorDeliveryType_Title' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> vendorDeliveryType_Title : null,
            
            'deliveryLocation' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> deliveryLocation : null,
            'delivery_at' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> delivery_at : null,
            'packagingType' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> packagingType : null,
            'reqSample' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> reqSample : null,
          
            
            'title' => $request->title,
            'requestformid' => $request->requestformid,
            'currency' => $DB_Find_requestform_where ? $DB_Find_requestform_where -> currency : null,

            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful')
         ); 

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersAdd Post Son

   //! GetOffersProduct Search Post
   public function GetOffersSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         
         //! Veri Arama
         $DB_Find = DB::table('get_offers')->where('id',$request->id)->first(); //Tüm verileri çekiyor
         
         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Search Post Son

   //! GetOffersAdd Delete  
   public function GetOffersDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('get_offers')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersAdd Delete  Son

   //! GetOffers Edit  
   public function GetOffersEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('get_offers')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            
            'currencyCartId'=>$request->currencyCartId,
            'companyAuthorized_person'=>$request->companyAuthorized_person,
            'companyAuthorized_email'=>$request->companyAuthorized_email,
            'companyAuthorized_tel'=>$request->companyAuthorized_tel,

            'companyAuthorized_person_tax_no'=>$request->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm'=>$request->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress'=>$request->companyAuthorized_person_adress,

            'delivery_at'=>$request->delivery_at,
            'deliveryLocation'=>$request->deliveryLocation,
            'vendorDeliveryType'=>$request->vendorDeliveryType,
            'vendorDeliveryType_Title'=>$request->vendorDeliveryType_Title,
            'packagingType'=>$request->packagingType,

            'paymentMethod'=>$request->paymentMethod,
            'paymentMethod_Title'=>$request->paymentMethod_Title,

            'modeofTransport'=>$request->modeofTransport,
            'modeofTransport_Title'=>$request->modeofTransport_Title,

            'shipmentType'=>$request->shipmentType,
            'shipmentType_title'=>$request->shipmentType_title,

            'intertek'=>$request->intertek,
            'intertek_Title'=>$request->intertek_Title,

            'specialPermit'=>$request->specialPermit,
            'specialPermit_Title'=>$request->specialPermit_Title,

            'productTotal'=>$request->productTotal,
            'currency'=>$request->currency,

            'offerEffectiveDate'=>$request->offerEffectiveDate,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffers Edit Son

   //! GetOffers Edit View
   public function GetOffersEditView($site_lang="tr",$id)
   {

      try {

          //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('get_offers')
            ->leftJoin('current_cart', 'current_cart.id', '=', 'get_offers.currencyCartId')
            ->where('get_offers.id',$id)
            ->select('get_offers.*','current_cart.current_name')
            ->first();//Tüm verileri çekiyor
             //echo "<pre>"; print_r($DB_Find); die();


            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();

            
            //! Talep Ürün Bilgileri
            $DB_Find_requestform_product_list = DB::table('requestform_product_list')->where('requestform_id',$DB_Find->requestformid)->where('isActive','1')->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_requestform_product_list); die();

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son


            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();


            //! Talep Formu
            $DB_Find_requestform = DB::table('requestform')->get();//! Talepler


            //! Para Birimi
            $currency = $DB_Find->currency;
            //echo "currency:"; echo $currency; die();
            

            //! Borsa
            $URL = 'https://finans.truncgil.com/today.json';
            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $URL);
            $contents = curl_exec($c);
            curl_close($c);

            //! Veri
            $DB_Find_Borsa = [];
    
            if ($contents) { $DB_Find_Borsa=json_decode($contents,true); }
            else {$DB_Find_Borsa = []; }

            //echo "<pre>"; print_r($DB_Find_Borsa);  die();
            //echo "EUR: "; echo $DB_Find_Borsa['EUR']['Satış']; die(); 
            //! Borsa

            $currencyPrice = "1";

            if($currency == "Euro") { $currencyPrice = $DB_Find_Borsa['EUR']['Satış']; }
            else if($currency == "Dolar") { $currencyPrice = $DB_Find_Borsa['USD']['Satış']; }
            else if($currency == "TL") { $currencyPrice = '1'; }
            //echo "currencyPrice:"; echo $currencyPrice; die();
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
           
            $DB["DB_Find_requestform_product_list"] =  $DB_Find_requestform_product_list;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            $DB["DB_Find_requestform"] =  $DB_Find_requestform;
            $DB["currencyPrice"] =  $currencyPrice;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/getOffersEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! GetOffers Edit View Son


   //! Dosya Yükleme - Ürün Resmi
   public function GetOffersFileUploadProductImage(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! Veri Güncelle
            $DB_Status = DB::table('get_offers')->where('id',$request->requestformId)
            ->update([            
               'product_image'=>"/upload/uploads/".$fileName,

               'isUpdated'=>true,
               'updated_at'=>Carbon::now(),
               'updated_byId'=>$request->updated_byId,
            ]);
            //! Veri Güncelle
           

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),

               'requestformId' => $request->requestformId,
               //'db' => $DB_Status
              
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! Dosya Yükleme - Ürün Resmi Son

   //! GetOffers File Export
   public function GetOffersFileExport($site_lang="tr",$id)
   {

      try {

            //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
   
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('get_offers')
            ->leftJoin('current_cart', 'current_cart.id', '=', 'get_offers.currencyCartId')
            ->where('get_offers.id',$id)
            ->select('get_offers.*','current_cart.current_name')
            ->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->where('id',$DB_Find->currencyCartId)->first(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();


            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son

   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;
          

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/getOfferExportPdf',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! GetOffers File Export Son


   //************* Teklif Alma Ürün List ***************** */

   //! GetOffersProduct Add  
   public function GetOffersProductAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

        //! Veri Ekleme
        DB::table('get_offers_product_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'get_offers_id'=> $request->get_offers_id,
            'sector' => $request->sector,
            'sub_sector' => $request->sub_sector,
            'stock_id' => $request->stock_id,
            'requestform_product_id' => $request->requestform_product_id,
           
            'nameTr' => $request->nameTr,

            'imgUrl' => $request->imgUrl == "" ? null : $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
          
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
            'price' => $request->price,
            'total' => $request->total,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'productModel' => $request->productModel,
            'productCode' => $request->productCode,
            'is_warranty' => $request->is_warranty,
            'warrantyTime' => $request->warrantyTime,

            'setup' => $request->setup,
            'brand' => $request->brand,
            'colorCode' => $request->colorCode,

            'productUsePurposeTR' => $request->productUsePurposeTR,
            'productUsePurposeEN' => $request->productUsePurposeEN,


            'ownBrand' => $request->ownBrand,
            'specialDesign' => $request->specialDesign,
            'specialPacket' => $request->specialPacket,
            'salesOutlet' => $request->salesOutlet,

            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son

        $id = $request->get_offers_id;

        //! Ürün Bilgileri
        $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',$id)->get();// Ürün Bilgileri
        //echo "<pre>"; print_r($DB_Find_Product); die();


        //! Ürün Toplam Tutar
        $DB_Find_Product_TotalPayment = 0; 
        for ($i=0; $i <count($DB_Find_Product); $i++) {  
           $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
           $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
        }
        //! Ürün Bilgileri Son

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'DB_Product' => $DB_Find_Product,
            'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Add  Son

   
   //! GetOffersProduct Delete  
   public function GetOffersProductDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('get_offers_product_list')->where('id',$request->id)->delete();

         $id = $request->data_id;

        //! Ürün Bilgileri
        $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',$id)->get();// Ürün Bilgileri
        //echo "<pre>"; print_r($DB_Find_Product); die();


        //! Ürün Toplam Tutar
        $DB_Find_Product_TotalPayment = 0; 
        for ($i=0; $i <count($DB_Find_Product); $i++) {  
           $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
           $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
        }
        //! Ürün Bilgileri Son

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Delete  Son


   //! GetOffersProduct Delete  Multi
   public function GetOffersProductDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('get_offers_product_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Delete  Son


   //! GetOffersProduct Post
   public function GetOffersProductSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find = DB::table('get_offers_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'get_offers_product_list.stock_id')
         ->select('get_offers_product_list.*','stock.stockCode','stock.codeNumber','stock.accountingCode_buy','stock.accountingCode_sel')
         ->where('get_offers_product_list.id',$request->id)
         ->first(); //Tüm verileri çekiyor
         //echo "<pre>"; echo print_r($DB_Find); die();
   
         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Search Post Son

     
   //! GetOffersProduct Update  
   public function GetOffersProductEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('get_offers_product_list')->where('id',$request->id)
         ->update([            
            'sector' => $request->sector,
            'sub_sector' => $request->sub_sector,
            'stock_id' => $request->stock_id,
            'requestform_product_id' => $request->requestform_product_id,
           
            'nameTr' => $request->nameTr,

            'imgUrl' => $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
           
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
           
            'price' => $request->price,
            'total' => $request->total,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'productModel' => $request->productModel,
            'productCode' => $request->productCode,
            'is_warranty' => $request->is_warranty,
            'warrantyTime' => $request->warrantyTime,

            'setup' => $request->setup,
            'brand' => $request->brand,
            'colorCode' => $request->colorCode,

            'productUsePurposeTR' => $request->productUsePurposeTR,
            'productUsePurposeEN' => $request->productUsePurposeEN,

            'ownBrand' => $request->ownBrand,
            'specialDesign' => $request->specialDesign,
            'specialPacket' => $request->specialPacket,
            'salesOutlet' => $request->salesOutlet,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {
            
            $id = $request->data_id;

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();
   
   
            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Update  Son
   

   //! GetOffersProduct Edit Active
   public function GetOffersProductEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('get_offers_product_list')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Edit Active Son


   //! GetOffersProduct Edit Active Multi
   public function GetOffersProductEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('get_offers_product_list')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! GetOffersProduct Edit Active Multi Son



 
   //************* Maliyet Hesaplama Listesi ***************** */

   //! CostCalculation
   public function CostCalculation($site_lang="tr")
   {

      try {

          
         //! Cookie Kontrol
         $cookie_function = $this->cookieCheck(); //! Fonksiyon Gönderme
         $cookie_check = $cookie_function["cookie"]; //! Cookie Verileri Alıyor

         //echo "cookie_check:"; echo $cookie_check; die();
         //echo "<pre>"; print_r($cookie_function); die();
         if($cookie_check == "false") { //echo "veri yok"; die();

             //! Cookie Silme
             return redirect('user/login/'.__('admin.lang'))
             ->cookie('yildirimdev_userCheck',null,-1)
             ->cookie('yildirimdev_userID',null,-1)
             ->cookie('yildirimdev_role',null,-1)
             ->cookie('yildirimdev_name',null,-1)
             ->cookie('yildirimdev_surname',null,-1)
             ->cookie('yildirimdev_img_url',null,-1)
             ->cookie('yildirimdev_tel',null,-1)
             ->cookie('yildirimdev_departman',null,-1)
             ->cookie('yildirimdev_email',null,-1);
             //! Cookie Silme Son

         }
         //! Cookie Kontrol Son

         //! Veri Okuma
         // $cookie_function["yildirimdev_userCheck"]


 
         if($cookie_function["yildirimdev_userCheck"] ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "isActive";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('cost_calculation_list')->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son

            //! Talep Formu
            $DB_Find_get_offers = DB::table('get_offers')->where('isUpdated',1)->get();//! Talepler
         
            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();


            //! Borsa
            $URL = 'https://finans.truncgil.com/today.json';
            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $URL);
            $contents = curl_exec($c);
            curl_close($c);

            //! Veri
            $DB_Find_Borsa = [];
    
            if ($contents) { $DB_Find_Borsa=json_decode($contents,true); }
            else {$DB_Find_Borsa = []; }

            //echo "<pre>"; print_r($DB_Find_Borsa);  die();
            //echo "EUR: "; echo $DB_Find_Borsa['EUR']['Satış']; die(); 
            //! Borsa
 
 
            //! Return
            $DB["userId"] =  $cookie_function["yildirimdev_userID"];
            $DB["name"] = $cookie_function["yildirimdev_name"];
            $DB["surname"] =  $cookie_function["yildirimdev_surname"]; 
            $DB["role"] = $cookie_function["yildirimdev_departman"];
            $DB["userImageUrl"] =  $cookie_function["yildirimdev_img_url"]; 

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_get_offers"] =  $DB_Find_get_offers;
            
            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;
            $DB["DB_Find_Borsa"] =  $DB_Find_Borsa;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/cost_calculation/costCalculationList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! CostCalculation Son


   //! CostCalculation Add  
   public function CostCalculationAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //veri tabanı işlemleri
         $DB_Where= DB::table('users')->where('id','=',$request->created_byId)->first();
         $DB_Where_offer= DB::table('get_offers')->where('id','=',(int)$request->get_offers_id)->first();
         $time = time();

          //! Kod Oluşturma
         
         //veri tabanı işlemleri
         $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
         //echo "<pre>"; print_r($DB_Find_site_code); die();
         //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

         $DB_Find_Number="";
         $DB_Find_type=$DB_Find_site_code->cost_calculation;
         $DB_Find_no=(int)$DB_Find_site_code->	cost_calculation_no;
         $DB_Find_no=$DB_Find_no+1;
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         //! Veri Güncelle
         $DB_Status = DB::table('site_code')->where('id',1)->update([ 'cost_calculation_no'=>$DB_Find_no ]);

         $returnCode=$DB_Find_type."-".date('dmY').'-'.$DB_Find_Number;
         //echo "ProformaCode:"; echo $returnCode; die();
         
         //! Kod Oluşturma Son
         
         //! Talepten Verileri Çekme
         $DB_Find_requestform_where = DB::table('requestform')->where('id',(int)$DB_Where_offer->requestformid)->first();
         //echo "<pre>"; print_r($DB_Find_requestform_where); die();


         //! Veri Ekleme
         DB::table('cost_calculation_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'costCalculationCode' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,
            'time' =>$time,
            'currency' => $request->currency,
            'currency_rate' => $request->currency_rate,

            'title' => $request->title,
            'requestformid' => (int)$DB_Where_offer->requestformid,
            'get_offers_id' => (int)$request->get_offers_id,

            'companyId' => (int)$DB_Find_requestform_where->currencyCartId,
            'companyAuthorized_person' => $DB_Find_requestform_where->companyAuthorized_person,
            'companyAuthorized_email' => $DB_Find_requestform_where->companyAuthorized_email,
            'companyAuthorized_tel' => $DB_Find_requestform_where->companyAuthorized_tel,
            'companyAuthorized_person_tax_no' => $DB_Find_requestform_where->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm' => $DB_Find_requestform_where->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress' => $DB_Find_requestform_where->companyAuthorized_person_adress,

            // 'sector' => $request->sector,
            // 'sector_title' => $request->sector_title,
            'vendorDeliveryType' => $request->vendorDeliveryType,
            'vendorDeliveryType_Title' => $request->vendorDeliveryType_Title,
            'paymentMethod' => $request->paymentMethod,
            'paymentMethod_Title' => $request->paymentMethod_Title,
            'modeofTransport' => $request->modeofTransport,
            'modeofTransport_Title' => $request->modeofTransport_Title,
            'shipmentType' => $request->shipmentType,
            'shipmentType_title' => $request->shipmentType_title,
            'specialPermit' => $request->specialPermit,
            'specialPermit_Title' => $request->specialPermit_Title,
            'intertek' => $request->intertek,
            'intertek_Title' => $request->intertek_Title,

            'packagingType' => $request->packagingType,

            'organizingStaff' => $DB_Where->name." ".$DB_Where->surname." ( ".$DB_Where->email." )",
            'organizingStafTel' => $DB_Where->tel,
            'organizingStafEmail' => $DB_Where->email,

            'const' => 1,
            'costCalculationCheck' => "Bekleme",
            'offerEffectiveDate'=>$request->offerEffectiveDate,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         //! Ürün Bilgileri
         $DB_Find_Product = DB::table('get_offers_product_list')->where('get_offers_id',(int)$request->get_offers_id)->get();// Ürün Bilgileri

         for ($i=0; $i <count($DB_Find_Product) ; $i++) { 

            //! Veri Ekleme
            DB::table('cost_calculation_product_list')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'time'=> $time,
                  'get_offers_id'=> (int) $DB_Find_Product[$i]->id,
                  'sector' => (int) $DB_Find_Product[$i]->sector,
                  'sub_sector' => $DB_Find_Product[$i]->sub_sector,
                  'stock_id' => $DB_Find_Product[$i]->stock_id,
               
                  'nameTr' => $DB_Find_Product[$i]->nameTr,
                  'nameEn' => $DB_Find_Product[$i]->nameEn,

                  'imgUrl' => $DB_Find_Product[$i]->imgUrl == "" ? config('admin.Default_ProductImgUrl') : $DB_Find_Product[$i]->imgUrl,
                  'techFileUrl' => $DB_Find_Product[$i]->techFileUrl,
               
                  'stockUnit' => $DB_Find_Product[$i]->stockUnit,
                  'stockCount' => $DB_Find_Product[$i]->stockCount,
                  'currency' => $DB_Find_Product[$i]->currency,
                  'price' => $DB_Find_Product[$i]->price,
                  'total' => $DB_Find_Product[$i]->total,
                  
                  'kdv_buy' => $DB_Find_Product[$i]->kdv_buy,
                  'kdv_sell' => $DB_Find_Product[$i]->kdv_sell,

                  'export_registered' => $DB_Find_Product[$i]->export_registered,
                  'export_registered_kdv_buy' => $DB_Find_Product[$i]->export_registered_kdv_buy,
                  'export_registered_kdv_sell' => $DB_Find_Product[$i]->export_registered_kdv_sell,

                  'descriptionTr' => $DB_Find_Product[$i]->descriptionTr,
                  'descriptionEn' => $DB_Find_Product[$i]->descriptionEn,
                  
                  'featuresTr' => $DB_Find_Product[$i]->featuresTr,
                  'featuresEn' => $DB_Find_Product[$i]->featuresEn,

                  'tech_featuresTr' => $DB_Find_Product[$i]->tech_featuresTr,
                  'tech_featuresEn' => $DB_Find_Product[$i]->tech_featuresEn,

                  'web_address' => $DB_Find_Product[$i]->web_address,
                  'catalogLink' => $DB_Find_Product[$i]->catalogLink,
                  'gtipNo' => $DB_Find_Product[$i]->gtipNo,

                  'productModel' => $DB_Find_Product[$i]->productModel,
                  'productCode' => $DB_Find_Product[$i]->productCode,
                  'is_warranty' => $DB_Find_Product[$i]->is_warranty,
                  'warrantyTime' => $DB_Find_Product[$i]->warrantyTime,

                  'setup' => $DB_Find_Product[$i]->setup,
                  'brand' => $DB_Find_Product[$i]->brand,
                  'colorCode' => $DB_Find_Product[$i]->colorCode,

                  'productUsePurposeTR' => $DB_Find_Product[$i]->productUsePurposeTR,
                  'productUsePurposeEN' => $DB_Find_Product[$i]->productUsePurposeEN,

                  'ownBrand' => $DB_Find_Product[$i]->ownBrand,
                  'specialDesign' => $DB_Find_Product[$i]->specialDesign,
                  'specialPacket' => $DB_Find_Product[$i]->specialPacket,
                  'salesOutlet' => $DB_Find_Product[$i]->salesOutlet,

                  'created_byId'=>$DB_Find_Product[$i]->created_byId,
            ]); //! Veri Ekleme Son

         }



         //! Sabit Giderler
         $DB_Find_Const = DB::table('cost_calculation_fixed_expenses')
         ->where('category_id',$request->paymentMethod)
         ->orwhere('category_id',$request->modeofTransport)
         // ->orwhere('category_id',$request->sector)
         ->orwhere('category_id',$request->specialPermit)
         ->orwhere('category_id',$request->shipmentType)
         ->orwhere('category_id',$request->vendorDeliveryType)
         ->orwhere('category_id',$request->intertek)
         ->orwhere('type','Genel')->get();// Sektor Bilgileri
         //echo "<pre>"; print_r($DB_Find_Const); die();
    
       
         for ($i=0; $i <count($DB_Find_Const) ; $i++) { 

            //! Veri Ekleme
            DB::table('cost_calculation_expense_list')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               
               'time' => $time,
               'const' => $DB_Find_Const[$i]->type == "Genel" ? 1 : 0,
               'title' => $DB_Find_Const[$i]->title,
               'description' => $DB_Find_Const[$i]->description,
               'price' => $DB_Find_Const[$i]->price,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son

         }


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            // 'DB_Find_Product' => $DB_Find_Product
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Add  Son

   
   //! CostCalculation Delete  
   public function CostCalculationDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Delete  Son


   //! CostCalculation Delete  Multi
   public function CostCalculationDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Delete  Son

     
   //! CostCalculation Update  
   public function CostCalculationEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_list')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            'currency'=>$request->currency,
            'currency_rate'=>$request->currency_rate,

            'companyId'=>$request->companyId,
            'companyTitle'=>$request->companyTitle,
            'companyAuthorized_person'=>$request->companyAuthorized_person,
            'companyAuthorized_tel'=>$request->companyAuthorized_tel,
            'companyAuthorized_email'=>$request->companyAuthorized_email,

            'companyAuthorized_person_tax_no'=>$request->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm'=>$request->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress'=>$request->companyAuthorized_person_adress,
            
            'profit'=>$request->profit,
            'ibm'=>$request->ibm,
            'serviceFee'=>$request->serviceFee,

            'exitPoint'=>$request->exitPoint,
            'clearancePlace'=>$request->clearancePlace,
            'destination'=>$request->destination,
            'deliveryLocation'=>$request->deliveryLocation,

            'releaseDate'=>$request->releaseDate,
            'shipmentDate'=>$request->shipmentDate,
            'arrivalDate'=>$request->arrivalDate,
            'deliveryDate'=>$request->deliveryDate,

            'offerEffectiveDate'=>$request->offerEffectiveDate,
            'costCalculationCheck'=>$request->costCalculationCheck,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'dataId'=> $request->id
            );

            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Update  Son

   //! CostCalculation Update View
   public function CostCalculationEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //veri tabanı işlemleri
            $DB_Find = DB::table('cost_calculation_list')->where('id',$id)->first();// Veri Detayları
            //echo "<pre>"; print_r($DB_Find); die();
            //echo "const "; echo $DB_Find->const; die();

            //! Talep Formu
            $DB_Find_get_offers = DB::table('get_offers')->get();//! Talepler

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();

             //! Diğer Veriler
             $DB_Find_sektor = DB::table('category')->where('type',"SektorStok")->get();//Sektor
             $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
             $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
             $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
             $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
             $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
             $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
             //echo "<pre>"; print_r($DB_Find_teslimSekli); die();
  
            //! Ürünleri Güncelleme - Control
            $DB_Status = DB::table('cost_calculation_product_list')->where('time',$DB_Find->time)->update([ 'cost_calculation_id'=>$DB_Find->id ]);
            //echo "Control:"; echo $DB_Status; die();

            //! Telifteki Ürünler
            $DB_Find_get_offers_product_list = DB::table('get_offers_product_list')->where('get_offers_id',(int)$DB_Find->get_offers_id)->get();// Ürün Bilgileri

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('cost_calculation_product_list')->where('time',$DB_Find->time)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son


            //! Gider Kalemleri
            $DB_Find_Expense_List = DB::table('cost_calculation_expense_list')->where('time',$DB_Find->time)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Expense_List); die();

            //! Ürün Toplam Tutar
            $DB_Find_Expense_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Expense_List) ; $i++) {  $db_price = str_replace(',','.',$DB_Find_Expense_List[$i]->price);  $DB_Find_Expense_TotalPayment= $DB_Find_Expense_TotalPayment + floatval($db_price); }
            //! Gider Kalemleri Son
         
   
            //! Return
            $DB["lang"] =  $site_lang;
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_get_offers"] =  $DB_Find_get_offers;
            $DB["DB_Find_Current"] =  $DB_Find_Current;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            $DB["DB_Find_get_offers_product_list"] =  $DB_Find_get_offers_product_list;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_Expense"] =  $DB_Find_Expense_List;
            $DB["DB_Find_Expense_TotalPayment"] =  $DB_Find_Expense_TotalPayment;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/cost_calculation/costCalculationEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! CostCalculation Update View Son

   //! CostCalculation View
   public function CostCalculationView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
               

            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('test')->where('id',$id)->first(); //Tüm verileri çekiyor
            //print_r($DB_Find); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/00_2_sabit_list_view',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! CostCalculation View Son


   //! CostCalculation Export Pdf
   public function CostCalculationViewExportFile($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
               
      
            //veri tabanı işlemleri
            $DB_Find = DB::table('cost_calculation_list')->where('id',$id)->first();// Veri Detayları
            //echo "<pre>"; print_r($DB_Find); die();
            //echo "const "; echo $DB_Find->const; die();
            
            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('cost_calculation_product_list')->where('time',$DB_Find->time)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();

            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product) ; $i++) {  $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + $DB_Find_Product[$i]->total; }
            //! Ürün Bilgileri Son


            //! Gider Kalemleri
            $DB_Find_Expense_Params = DB::table('cost_calculation_expense_list')->where('time',$DB_Find->time)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Expense_Params); die();

            //! Ürün Toplam Tutar
            $DB_Find_Expense_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Expense_Params) ; $i++) {  $db_price = str_replace(',','.',$DB_Find_Expense_Params[$i]->price);     $DB_Find_Expense_TotalPayment= $DB_Find_Expense_TotalPayment + floatval($db_price); }
            //! Gider Kalemleri Son

            $DB_Find_Total = $DB_Find_Product_TotalPayment + $DB_Find_Expense_TotalPayment; //! Toplam

            //floatval($DB_Find->profit)

            //! Hizmet Bedeli 
            $hizmet = str_replace(',','.',$DB_Find->serviceFee);
            $DB_Find_Hizmet = floatval($DB_Find_Total)*(floatval($hizmet)/100);
            $DB_Find_Hizmet = number_format($DB_Find_Hizmet,2,'.', ""); //! Anlamlı sayı
            $DB_Find_HizmetDahil = $DB_Find_Total + $DB_Find_Hizmet;

            //! iBM
            $ibm = str_replace(',','.',$DB_Find->ibm);
            $DB_Find_ibmDahil = floatval($DB_Find_HizmetDahil)*(floatval($ibm)/100);
            $DB_Find_İbm = number_format($DB_Find_ibmDahil,2,'.', ""); //! Anlamlı sayı

            $DB_Find_Expense_TotalPayment =$DB_Find_Expense_TotalPayment+$DB_Find_İbm; 
            $DB_Find_Total = $DB_Find_Product_TotalPayment + $DB_Find_Expense_TotalPayment + $DB_Find_Hizmet; //! Toplam
   
            //! Return
            $DB["lang"] =  $site_lang;
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_Expense"] =  $DB_Find_Expense_Params;
            $DB["DB_Find_Expense_TotalPayment"] =  $DB_Find_Expense_TotalPayment;
            $DB["DB_Find_Total"] =  $DB_Find_Total;
          
            $DB["ibm"] =  $ibm;
            $DB["DB_Find_İbm"] =  $DB_Find_İbm;

            $DB["CompanyName"] =  config('admin.CompanyName');

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/cost_calculation/costCalculationExportPdf',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! CostCalculation Export Pdf Son

   //! CostCalculation Edit Active
   public function CostCalculationEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_list')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Edit Active Son


   //! CostCalculation Edit Active Multi
   public function CostCalculationEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_list')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Edit Active Multi Son

      

   //*** Maliyet Kalemi Ürün  */

   //! CostCalculation Product Add
   public function CostCalculationProductAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Ekleme
         DB::table('cost_calculation_product_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'time'=> $request->time,
            'cost_calculation_id'=> $request->cost_calculation_id,
            'get_offers_id' => $request->get_offers_id,

            'sector' =>(int) $request->sector,
            'sub_sector' =>(int) $request->sub_sector,
            'stock_id' =>(int) $request->stock_id,

            'nameTr' => $request->nameTr,
            
            'imgUrl' => $request->imgUrl == "" ? null : $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
            
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
            'price' => $request->price,
            'total' => $request->total,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'productModel' => $request->productModel,
            'productCode' => $request->productCode,
            'is_warranty' => $request->is_warranty,
            'warrantyTime' => $request->warrantyTime,

            'setup' => $request->setup,
            'brand' => $request->brand,
            'colorCode' => $request->colorCode,

            'productUsePurposeTR' => $request->productUsePurposeTR,
            'productUsePurposeEN' => $request->productUsePurposeEN,

            'ownBrand' => $request->ownBrand,
            'specialDesign' => $request->specialDesign,
            'specialPacket' => $request->specialPacket,
            'salesOutlet' => $request->salesOutlet,

            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         
        $id = $request->data_id;

        //! Ürün Bilgileri
        $DB_Find_Product = DB::table('cost_calculation_product_list')->where('cost_calculation_id',$request->cost_calculation_id)->get();// Ürün Bilgileri
        //echo "<pre>"; print_r($DB_Find_Product); die();


        //! Ürün Toplam Tutar
        $DB_Find_Product_TotalPayment = 0; 
        for ($i=0; $i <count($DB_Find_Product); $i++) {  
           $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
           $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
        }
        //! Ürün Bilgileri Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'DB_Product' => $DB_Find_Product,
            'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Product Add  Son


   //! CostCalculation Product Delete  
   public function CostCalculationProductDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_product_list')->where('id',$request->id)->delete();

         if($DB_Status) {
                    
          
            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('cost_calculation_product_list')->where('cost_calculation_id',$request->data_id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Product Delete  Son
   

   //! CostCalculation Product Search Post
   public function CostCalculationProductSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         
         //! Veri Arama
         $DB_Find = DB::table('cost_calculation_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'cost_calculation_product_list.stock_id')
         ->select('cost_calculation_product_list.*','stock.stockCode','stock.codeNumber','stock.accountingCode_buy','stock.accountingCode_sel')
         ->where('cost_calculation_product_list.id',$request->id)
         ->first(); //Tüm verileri çekiyor
         //echo "<pre>"; echo print_r($DB_Find); die();


         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Product Search Post Son


   //! CostCalculation Product Edit Post 
   public function CostCalculationProductEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

        

          //! Veri Güncelle
          $DB_Status = DB::table('cost_calculation_product_list')->where('id',$request->id)
          ->update([ 
             'get_offers_id' => $request->get_offers_id,

             'sector' => $request->sector,
             'sub_sector' => $request->sub_sector,
            
             'nameTr' => $request->nameTr,
 
             'imgUrl' => $request->imgUrl,
             'techFileUrl' => $request->techFileUrl,
            
             'stockUnit' => $request->stockUnit,
             'stockCount' => $request->stockCount,
             'currency' => $request->currency,
            
             'price' => $request->price,
             'total' => $request->total,
             
             'kdv_buy' => $request->kdv_buy,
             'kdv_sell' => $request->kdv_sell,
 
             'export_registered' => $request->export_registered,
             'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
             'export_registered_kdv_sell' => $request->export_registered_kdv_sell,
 
             'descriptionTr' => $request->descriptionTr,
             'descriptionEn' => $request->descriptionEn,
             
             'featuresTr' => $request->featuresTr,
             'featuresEn' => $request->featuresEn,
 
             'tech_featuresTr' => $request->tech_featuresTr,
             'tech_featuresEn' => $request->tech_featuresEn,
 
             'web_address' => $request->web_address,
             'catalogLink' => $request->catalogLink,
             'gtipNo' => $request->gtipNo,
 
             'productModel' => $request->productModel,
             'productCode' => $request->productCode,
             'is_warranty' => $request->is_warranty,
             'warrantyTime' => $request->warrantyTime,
 
             'setup' => $request->setup,
             'brand' => $request->brand,
             'colorCode' => $request->colorCode,
 
             'productUsePurposeTR' => $request->productUsePurposeTR,
             'productUsePurposeEN' => $request->productUsePurposeEN,
 
             'ownBrand' => $request->ownBrand,
             'specialDesign' => $request->specialDesign,
             'specialPacket' => $request->specialPacket,
             'salesOutlet' => $request->salesOutlet,
 
             'isUpdated'=>true,
             'updated_at'=>Carbon::now(),
             'updated_byId'=>$request->updated_byId,
          ]);

         if($DB_Status) {

              //! Ürün Bilgileri
              $DB_Find_Product = DB::table('cost_calculation_product_list')->where('cost_calculation_id',$request->data_id)->get();// Ürün Bilgileri
              //echo "<pre>"; print_r($DB_Find_Product); die();
  
  
              //! Ürün Toplam Tutar
              $DB_Find_Product_TotalPayment = 0; 
              for ($i=0; $i <count($DB_Find_Product); $i++) {  
                 $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
                 $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
              }
              //! Ürün Bilgileri Son
  
  
              $response = array(
                 'status' => 'success',
                 'msg' => __('admin.TransactionSuccessful'),
                 'dataId'=> $request->id,
                 'DB_Product' => $DB_Find_Product,
                 'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
              );

          

            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Product Edit  Son


   //*** Maliyet Kalemi Etkileyen Giderler  */

   //! CostCalculationExpenseAddPost
   public function CostCalculationExpenseAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Veri Ekleme
         $DB_Status =  DB::table('cost_calculation_expense_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'time' => (int)$request->time,
            'const' => 0,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son

         if($DB_Status) {

            
            //! Gider Kalemleri
            $DB_Find_Expense_List = DB::table('cost_calculation_expense_list')->where('time',$request->time)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Expense_List); die();

            //! Ürün Toplam Tutar
            $DB_Find_Expense_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Expense_List) ; $i++) {  $db_price = str_replace(',','.',$DB_Find_Expense_List[$i]->price);  $DB_Find_Expense_TotalPayment= $DB_Find_Expense_TotalPayment + floatval($db_price); }
            //! Gider Kalemleri Son

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Find_Expense_List'=> $DB_Find_Expense_List,
               'DB_Find_Expense_TotalPayment'=> $DB_Find_Expense_TotalPayment,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.TransactionFailed'),
               'DB_Find_Expense_List'=> [],
               'DB_Find_Expense_TotalPayment'=> [],
            );

            return response()->json($response);

         }

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'DB_Find_Expense_List'=> [],
            'DB_Find_Expense_TotalPayment'=> [],
         );

         return response()->json($response);
      }
      
   } //! CostCalculationExpenseAddPost Son

   //! CostCalculationExpenseDeletePost
   public function CostCalculationExpenseDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_expense_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            //! Gider Kalemleri
            $DB_Find_Expense_List = DB::table('cost_calculation_expense_list')->where('time',$request->time)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Expense_List); die();

            //! Ürün Toplam Tutar
            $DB_Find_Expense_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Expense_List) ; $i++) {  $db_price = str_replace(',','.',$DB_Find_Expense_List[$i]->price);  $DB_Find_Expense_TotalPayment= $DB_Find_Expense_TotalPayment + floatval($db_price); }
            //! Gider Kalemleri Son

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Find_Expense_List'=> $DB_Find_Expense_List,
               'DB_Find_Expense_TotalPayment'=> $DB_Find_Expense_TotalPayment,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculationExpenseDeletePost  Son

   
   //! CostCalculation Expense Search Post
   public function CostCalculationExpenseSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('cost_calculation_expense_list')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Expense Search Post Son


   //! CostCalculation Expense Edit Post 
   public function CostCalculationExpenseEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_expense_list')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
           
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]); //! Veri Güncelle Son

         if($DB_Status) {

            //echo "time:"; echo $DB_Status

            //! Gider Kalemleri
            $DB_Find_Expense_List = DB::table('cost_calculation_expense_list')->where('time',$request->time)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Expense_List); die();

            //! Ürün Toplam Tutar
            $DB_Find_Expense_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Expense_List) ; $i++) {  $db_price = str_replace(',','.',$DB_Find_Expense_List[$i]->price);  $DB_Find_Expense_TotalPayment= $DB_Find_Expense_TotalPayment + floatval($db_price); }
            //! Gider Kalemleri Son

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Find_Expense_List'=> $DB_Find_Expense_List,
               'DB_Find_Expense_TotalPayment'=> $DB_Find_Expense_TotalPayment,
               'dataId'=> $request->id
            );

            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB_Find_Expense_List'=> [],
               'DB_Find_Expense_TotalPayment'=> [],
               'dataId'=> $request->id
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculation Expense Edit  Son
   
   //************* Proforma Fatura ***************** */

   //! ProformaInvoice
   public function ProformaInvoice($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "proforma_invoice.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "proforma_invoice.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "proforma_invoice.isActive";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


           
            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('proforma_invoice')
            ->leftJoin('current_cart', 'current_cart.id', '=', 'proforma_invoice.companyId')
            ->leftJoin('cost_calculation_list', 'cost_calculation_list.id', '=', 'proforma_invoice.cost_calculation_id')
            ->where($data_all)
            ->select('proforma_invoice.*','current_cart.current_name','cost_calculation_list.title as cost_calculationTitle')
            ->orderBy('proforma_invoice.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son    

            //! Maliyet Kalemi
            $DB_Find_Cost_Calculation_List = DB::table('cost_calculation_list')->where('costCalculationCheck',"Evet")->get();//! Talepler
            //echo "<pre>";print_r($DB_Find_Cost_Calculation_List); die();

            $DB_Find_requestform = DB::table('requestform')->where('id',59)->first();//! Talepler
            //echo "<pre>" ;print_r($DB_Find_requestform); die();
            //echo "currencyCartId:"; echo $DB_Find_requestform->currencyCartId;   die();


            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Cost_Calculation_List"] =  $DB_Find_Cost_Calculation_List;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/proformaInvoiceList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! ProformaInvoice Son


   //! ProformaInvoice Add  
   public function ProformaInvoiceAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
           
         //! Kod Oluşturma
      
         //veri tabanı işlemleri
         $DB_Find_site_code = DB::table('site_code')->where('id',1)->first();//Tüm verileri çekiyor
         $DB_Where_calculation= DB::table('cost_calculation_list')->where('id','=',(int)$request->cost_calculation_id)->first();
         //echo "<pre>"; print_r($DB_Find_site_code); die();
         //echo "proforma:"; echo $DB_Find_site_code->proforma; die();

         $DB_Find_Number="";
         $DB_Find_type=$DB_Find_site_code->proforma;
         $DB_Find_no=(int)$DB_Find_site_code->proforma_no;
         $DB_Find_no=$DB_Find_no+1;
         
         if($DB_Find_no == 0) {$DB_Find_Number = "001"; }
         else if(0<$DB_Find_no && $DB_Find_no <10) {$DB_Find_Number = "00".(string)($DB_Find_no); }
         else if(9<$DB_Find_no && $DB_Find_no <100) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else if(99<$DB_Find_no && $DB_Find_no <1000) {$DB_Find_Number = "0".(string)$DB_Find_no; }
         else { $DB_Find_Number = (string)$DB_Find_no; }

         $returnCode=$DB_Find_type."-".date('dmY').'-'.$DB_Find_Number;
         //echo "ProformaCode:"; echo $ProformaCode; die();

         //! Veri Güncelle
         $DB_Status = DB::table('site_code')->where('id',1)->update([ 'proforma_no'=>$DB_Find_no ]);
         //! Kod Oluşturma Son

         //! Time
         $timeFind = time();

         //! Ürün Bilgileri
         $DB_Find_Product = DB::table('cost_calculation_product_list')->where('cost_calculation_id',(int)$request->cost_calculation_id)->get();// Ürün Bilgileri

         for ($i=0; $i <count($DB_Find_Product) ; $i++) { 

            //! Veri Ekleme
            DB::table('proforma_product_list')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'time'=> $timeFind,
                  'cost_calculation_id'=> (int) $DB_Find_Product[$i]->id,

                  'sector' => (int) $DB_Find_Product[$i]->sector,
                  'sub_sector' => $DB_Find_Product[$i]->sub_sector,
                  'stock_id' => $DB_Find_Product[$i]->stock_id,
               
                  'nameTr' => $DB_Find_Product[$i]->nameTr,
                  'nameEn' => $DB_Find_Product[$i]->nameEn,

                  'imgUrl' => $DB_Find_Product[$i]->imgUrl == "" ? config('admin.Default_ProductImgUrl') : $DB_Find_Product[$i]->imgUrl,
                  'techFileUrl' => $DB_Find_Product[$i]->techFileUrl,
               
                  'stockUnit' => $DB_Find_Product[$i]->stockUnit,
                  'stockCount' => $DB_Find_Product[$i]->stockCount,
                  'currency' => $DB_Find_Product[$i]->currency,
                  'price' => $DB_Find_Product[$i]->price,
                  'total' => $DB_Find_Product[$i]->total,
                  
                  'kdv_buy' => $DB_Find_Product[$i]->kdv_buy,
                  'kdv_sell' => $DB_Find_Product[$i]->kdv_sell,

                  'export_registered' => $DB_Find_Product[$i]->export_registered,
                  'export_registered_kdv_buy' => $DB_Find_Product[$i]->export_registered_kdv_buy,
                  'export_registered_kdv_sell' => $DB_Find_Product[$i]->export_registered_kdv_sell,

                  'descriptionTr' => $DB_Find_Product[$i]->descriptionTr,
                  'descriptionEn' => $DB_Find_Product[$i]->descriptionEn,
                  
                  'featuresTr' => $DB_Find_Product[$i]->featuresTr,
                  'featuresEn' => $DB_Find_Product[$i]->featuresEn,

                  'tech_featuresTr' => $DB_Find_Product[$i]->tech_featuresTr,
                  'tech_featuresEn' => $DB_Find_Product[$i]->tech_featuresEn,

                  'web_address' => $DB_Find_Product[$i]->web_address,
                  'catalogLink' => $DB_Find_Product[$i]->catalogLink,
                  'gtipNo' => $DB_Find_Product[$i]->gtipNo,

                  'productModel' => $DB_Find_Product[$i]->productModel,
                  'productCode' => $DB_Find_Product[$i]->productCode,
                  'is_warranty' => $DB_Find_Product[$i]->is_warranty,
                  'warrantyTime' => $DB_Find_Product[$i]->warrantyTime,

                  'setup' => $DB_Find_Product[$i]->setup,
                  'brand' => $DB_Find_Product[$i]->brand,
                  'colorCode' => $DB_Find_Product[$i]->colorCode,

                  'productUsePurposeTR' => $DB_Find_Product[$i]->productUsePurposeTR,
                  'productUsePurposeEN' => $DB_Find_Product[$i]->productUsePurposeEN,

                  'ownBrand' => $DB_Find_Product[$i]->ownBrand,
                  'specialDesign' => $DB_Find_Product[$i]->specialDesign,
                  'specialPacket' => $DB_Find_Product[$i]->specialPacket,
                  'salesOutlet' => $DB_Find_Product[$i]->salesOutlet,

                  'created_byId'=>$DB_Find_Product[$i]->created_byId,
            ]); //! Veri Ekleme Son

         }
        
         //! Firma Bilgileri
         $DB_Find_requestform = DB::table('requestform')->where('id',(int)$DB_Where_calculation->requestformid)->first();//! Talepler
         

         //! Veri Ekleme
         DB::table('proforma_invoice')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'proformaCode' =>  $returnCode,
            'codeNumber' => $DB_Find_Number,
            'time' => $timeFind,

            'title' => $request->title,
            'requestformid' => (int)$DB_Where_calculation->requestformid,
            'get_offers_id' => (int)$DB_Where_calculation->get_offers_id,
            'cost_calculation_id' => $request->cost_calculation_id, 
            'currency' => $DB_Where_calculation->currency, 

            'companyId' => (int)$DB_Find_requestform->currencyCartId,
            'companyAuthorized_person' => $DB_Find_requestform->companyAuthorized_person,
            'companyAuthorized_email' => $DB_Find_requestform->companyAuthorized_email,
            'companyAuthorized_tel' => $DB_Find_requestform->companyAuthorized_tel,
            'companyAuthorized_person_tax_no' => $DB_Find_requestform->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm' => $DB_Find_requestform->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress' => $DB_Find_requestform->companyAuthorized_person_adress,

            'offerEffectiveDate' => $DB_Where_calculation->offerEffectiveDate, 
            'vendorDeliveryType' => $DB_Where_calculation->vendorDeliveryType,
            'vendorDeliveryType_Title' => $DB_Where_calculation->vendorDeliveryType_Title,
            'paymentMethod' => $DB_Where_calculation->paymentMethod,
            'paymentMethod_Title' => $DB_Where_calculation->paymentMethod_Title,
            'modeofTransport' => $DB_Where_calculation->modeofTransport,
            'modeofTransport_Title' => $DB_Where_calculation->modeofTransport_Title,
            'shipmentType' => $DB_Where_calculation->shipmentType,
            'shipmentType_title' => $DB_Where_calculation->shipmentType_title,
            // 'specialPermit' => $DB_Where_calculation->specialPermit,
            // 'specialPermit_Title' => $DB_Where_calculation->specialPermit_Title,
            // 'intertek' => $DB_Where_calculation->intertek,
            // 'intertek_Title' => $DB_Where_calculation->intertek_Title,

            //'packagingType' => $DB_Where_calculation->packagingType,
            'exitPoint' => $DB_Where_calculation->exitPoint,
            'clearancePlace' => $DB_Where_calculation->clearancePlace,
            'deliveryPlace' => $DB_Where_calculation->deliveryLocation,
            
            'public' => (int)$request->public,
            'const' => 0,
            
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son
     

         //! Sabit Şartlar
         $DB_Find_Const = DB::table('general_conditions')
            ->orwhere('type','OzelSart')// Sektor Bilgileri
            ->orwhere('type','Genel')->get();// Sektor Bilgileri
         //echo "<pre>"; print_r($DB_Find_Const); die();

         for ($i=0; $i <count($DB_Find_Const) ; $i++) { 

            //! Veri Ekleme
            DB::table('proforma_conditions_list')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'time' => $timeFind,
               'proforma_id' => null,
               'isGeneral' => $DB_Find_Const[$i]->type == "OzelSart" ? 0 : 1,
               'title' => $DB_Find_Const[$i]->title,
               'created_byId'=>0,
            ]); //! Veri Ekleme Son
            
         }
         //! Sabit Şartlar Son


         //! Banka Bilgileri
         $DB_Find_Bank = DB::table('bank')->where('currencyCartId',0)->get();// Sektor Bilgileri
         //echo "<pre>"; print_r($DB_Find_Bank); die();

         for ($i=0; $i <count($DB_Find_Bank) ; $i++) { 

            //! Veri Ekleme
            DB::table('proforma_bank_list')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'time' => $timeFind,
               'proforma_id' => null,
               'bankaAccountTitle' => $DB_Find_Bank[$i]->bankaAccountTitle,
               'bankTitle' => $DB_Find_Bank[$i]->bankTitle,
               'branch' => $DB_Find_Bank[$i]->branch,
               'accountNumber' => $DB_Find_Bank[$i]->accountNumber,
               'iban' => $DB_Find_Bank[$i]->iban,
               'swift' => $DB_Find_Bank[$i]->swift,
               'created_byId'=>0,
            ]); //! Veri Ekleme Son
            
         }


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),

            'DB_Find_Product' => $DB_Find_Product,
         );

         return response()->json($response);

      } catch (\Throwable $th) {

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Add  Son

   
   //! ProformaInvoice Delete  
   public function ProformaInvoiceDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('proforma_invoice')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Delete  Son


   //! ProformaInvoice Delete  Multi
   public function ProformaInvoiceDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('proforma_invoice')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Delete  Son

     
   //! ProformaInvoice Update  
   public function ProformaInvoiceEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_invoice')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            'public'=>$request->public,
            'currency'=>$request->currency,
            'description'=>$request->description,

            'organizingStafCompanyTitle'=>$request->organizingStafCompanyTitle,
            'organizingStafCompanyAdress'=>$request->organizingStafCompanyAdress,
            'organizingStaff'=>$request->organizingStaff,
            'organizingStafTel'=>$request->organizingStafTel,
            'organizingStafEmail'=>$request->organizingStafEmail,


            'companyId'=>$request->companyId,
            'companyTitle'=>$request->companyTitle,
            'companyAuthorized_person'=>$request->companyAuthorized_person,
            'companyAuthorized_tel'=>$request->companyAuthorized_tel,
            'companyAuthorized_email'=>$request->companyAuthorized_email,

            'companyAuthorized_person_tax_no'=>$request->companyAuthorized_person_tax_no,
            'companyAuthorized_person_tax_adm'=>$request->companyAuthorized_person_tax_adm,
            'companyAuthorized_person_adress'=>$request->companyAuthorized_person_adress,

            'proformaDate' => $request->proformaDate,
            'proformaNo' => $request->proformaNo,
            'offerEffectiveDate' => $request->offerEffectiveDate,
            'proformaCheck' => $request->proformaCheck,

            'vendorDeliveryType' => $request->vendorDeliveryType,
            'vendorDeliveryType_Title' => $request->vendorDeliveryType_Title,
            'paymentMethod' => $request->paymentMethod,
            'paymentMethod_Title' => $request->paymentMethod_Title,

            'modeofTransport' => $request->modeofTransport,
            'modeofTransport_Title' => $request->modeofTransport_Title,
            'shipmentType' => $request->shipmentType,
            'shipmentType_title' => $request->shipmentType_title,

            'exitPoint' => $request->exitPoint,
            'clearancePlace' => $request->clearancePlace,
            'deliveryPlace' => $request->deliveryPlace,

            'orderPercentage' => $request->orderPercentage,
            'orderValue' => $request->orderValue,
            'shipmentPercentage' => $request->shipmentPercentage,
            'shipmentValue' => $request->shipmentValue,
            'deliveryPercentage' => $request->deliveryPercentage,
            'deliveryValue' => $request->deliveryValue,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Update  Son

   //! ProformaInvoice Update View
   public function ProformaInvoiceEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {


            //veri tabanı işlemleri
            $DB_Find = DB::table('proforma_invoice')
                  ->leftJoin('requestform', 'requestform.id', '=', 'proforma_invoice.requestformid')
                  ->select('proforma_invoice.*','requestform.description as requestformDescription')
                  ->where('proforma_invoice.id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();
            
            //! Params Verileri Where Formatında Yazılacak Son    

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->get(); // Cari Kart
            //echo "<pre>";print_r($DB_Find_Current); die();

            //! Maliyetteki Ürünler
            $DB_Find_cost_calculation_product_list = DB::table('cost_calculation_product_list')->where('cost_calculation_id',(int)$DB_Find->cost_calculation_id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_cost_calculation_product_list); die();

            //! Proforma Ürünleri Güncelleme - Control
            try { $DB_Status = DB::table('proforma_product_list')->where('time',$DB_Find->time)->update([ 'proforma_id'=>$DB_Find->id ]); } catch (\Throwable $th) { }   //throw $th;
         

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('proforma_product_list')->where('time',$DB_Find->time)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son

            //! Şartlar
            try { $DB_Status = DB::table('proforma_conditions_list')->where('time',$DB_Find->time)->update([ 'proforma_id'=>$DB_Find->id ]); } catch (\Throwable $th) { }   //throw $th;

            $DB_Find_conditions_General = DB::table('proforma_conditions_list')->where('proforma_id',$id)->where('isGeneral',"1")->get();// Şart Bilgileri
            $DB_Find_conditions_Special = DB::table('proforma_conditions_list')->where('proforma_id',$id)->where('isGeneral',"0")->get();// Şart Bilgileri
            //echo "<pre>"; print_r($DB_Find_conditions_General); die();
            

            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"Sektor")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();

            
            //! Banka Bilgileri
            try { $DB_Status = DB::table('proforma_bank_list')->where('time',$DB_Find->time)->update([ 'proforma_id'=>$DB_Find->id ]); } catch (\Throwable $th) { }   //throw $th;
            $DB_Find_Bank = DB::table('proforma_bank_list')->where('proforma_id',$id)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Bank); die();
         
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            $DB["DB_Find_cost_calculation_product_list"] =  $DB_Find_cost_calculation_product_list;
            
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_conditions_General"] =  $DB_Find_conditions_General;
            $DB["DB_Find_conditions_Special"] =  $DB_Find_conditions_Special;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            $DB["DB_Find_Bank"] =  $DB_Find_Bank;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/proformaInvoiceEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! ProformaInvoice Update View Son

   //! ProformaInvoice View
   public function ProformaInvoiceView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
               

            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('test')->where('id',$id)->first(); //Tüm verileri çekiyor
            //print_r($DB_Find); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;

            echo "Proforma Önizleme"; die();


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/00_2_sabit_list_view',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! ProformaInvoice View Son


   //! ProformaInvoice View Export PDF
   public function ProformaInvoiceViewExportFile($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
            
            //veri tabanı işlemleri
            $DB_Find = DB::table('proforma_invoice')
            ->leftJoin('requestform', 'requestform.id', '=', 'proforma_invoice.requestformid')
            ->select('proforma_invoice.*','requestform.description as requestformDescription')
            ->where('proforma_invoice.id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();

            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->where('id',$DB_Find->companyId)->first(); // Cari Kart
            //echo "<pre>"; print_r($DB_Find_Current); die();

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('proforma_product_list')->where('proforma_id',$id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();

            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); }
            //! Ürün Bilgileri Son

            //! Ürün Bilgileri
            $DB_Find_conditions_General = DB::table('proforma_conditions_list')->where('proforma_id',$id)->where('isGeneral',"1")->get();// Şart Bilgileri
            $DB_Find_conditions_Special = DB::table('proforma_conditions_list')->where('proforma_id',$id)->where('isGeneral',"0")->get();// Şart Bilgileri
            //echo "<pre>"; print_r($DB_Find_conditions_General); die();
            

            //! Diğer Veriler
            $DB_Find_sektor = DB::table('category')->where('type',"Sektor")->get();//Sektor
            $DB_Find_teslimSekli = DB::table('category')->where('type',"TeslimŞekli")->get();//Teslim Şekli
            $DB_Find_ödemeSekli = DB::table('category')->where('type',"ÖdemeŞekli")->get();//Ödeme Şekli
            $DB_Find_nakliyatSekli = DB::table('category')->where('type',"NakliyetŞekli")->get();//Nakliyet Şekli
            $DB_Find_sevkSekli = DB::table('category')->where('type',"SevkŞekli")->get();//Sevk Şekli
            $DB_Find_özelİzneTabi = DB::table('category')->where('type',"ÖzelİzneTabiMi")->get();//Özel İzne Tabi Mi
            $DB_Find_intertekTabi = DB::table('category')->where('type',"İntertekTabiMi")->get();//İntertek Tabi Mi
            //echo "<pre>"; print_r($DB_Find_teslimSekli); die();

            
            // //veri tabanı işlemleri
            $DB_Find_Bank = DB::table('proforma_bank_list')->where('proforma_id',$id)->get();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find_Bank); die();
   
            //! Return
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;
            
            $DB["DB_Find_Product"] =  $DB_Find_Product;
            $DB["DB_Find_Product_TotalPayment"] =  $DB_Find_Product_TotalPayment;

            $DB["DB_Find_conditions_General"] =  $DB_Find_conditions_General;
            $DB["DB_Find_conditions_Special"] =  $DB_Find_conditions_Special;

            $DB["DB_Find_sektor"] =  $DB_Find_sektor;
            $DB["DB_Find_teslimSekli"] =  $DB_Find_teslimSekli;
            $DB["DB_Find_ödemeSekli"] =  $DB_Find_ödemeSekli;
            $DB["DB_Find_nakliyatSekli"] =  $DB_Find_nakliyatSekli;
            $DB["DB_Find_sevkSekli"] =  $DB_Find_sevkSekli;
           
            $DB["DB_Find_özelİzneTabi"] =  $DB_Find_özelİzneTabi;
            $DB["DB_Find_intertekTabi"] =  $DB_Find_intertekTabi;

            $DB["DB_Find_Bank"] =  $DB_Find_Bank;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/proformaInvoiceExportPdf',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! ProformaInvoice View Export PDF Son


   //! ProformaInvoice Edit Active
   public function ProformaInvoiceEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_invoice')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Edit Active Son


   //! ProformaInvoice Edit Active Multi
   public function ProformaInvoiceEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_invoice')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! ProformaInvoice Edit Active Multi Son

      
   //! ProformaInvoice Import File
   public function ProformaInvoiceExportFile(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! ************** Import *************
            $data ='';
            $fileUrl = "upload/uploads/".$fileName; //! Dosya yeri
            $DB_importStatus = false;
            $DB=[]; //! DB

            if($file_status) {

               if($fileExt == "json") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $DB = json_decode($data,true); //! Veri Json Çeviriyor

                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"],
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }
               else if($fileExt == "xml") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $xmlObject = simplexml_load_string($data); //! Xml Dosyası Okuma

                  $json = json_encode($xmlObject); 
                  $DB = json_decode($json, true); //! Dosya Array Çevirme 
                  $DB = $DB["Data"]; //! Array
                  
                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"] == "true" ? true : false,
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }



            }
            //! ************** Import Son *************

      

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),
               'DB_importStatus' => $DB_importStatus,
               'DB' => $DB,
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! ProformaInvoice Import File


   //*** Proforma Ürün  */

   //! Proforma Product Add  
   public function ProformaProductAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

       
         //! Veri Ekleme
         DB::table('proforma_product_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'time'=> $request->time,
            'cost_calculation_id'=> $request->cost_calculation_id,
            'proforma_id'=> $request->proforma_id,

            'sector' =>(int) $request->sector,
            'sub_sector' =>(int) $request->sub_sector,
            'stock_id' =>(int) $request->stock_id,

            'nameTr' => $request->nameTr,

            'imgUrl' => $request->imgUrl == "" ? null : $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
            
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
            'price' => $request->price,
            'total' => $request->total,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'productModel' => $request->productModel,
            'productCode' => $request->productCode,
            'is_warranty' => $request->is_warranty,
            'warrantyTime' => $request->warrantyTime,

            'setup' => $request->setup,
            'brand' => $request->brand,
            'colorCode' => $request->colorCode,

            'productUsePurposeTR' => $request->productUsePurposeTR,
            'productUsePurposeEN' => $request->productUsePurposeEN,

            'ownBrand' => $request->ownBrand,
            'specialDesign' => $request->specialDesign,
            'specialPacket' => $request->specialPacket,
            'salesOutlet' => $request->salesOutlet,

            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         //! Ürün Bilgileri
         $DB_Find_Product = DB::table('proforma_product_list')->where('proforma_id',$request->proforma_id)->get();// Ürün Bilgileri
         //echo "<pre>"; print_r($DB_Find_Product); die();


         //! Ürün Toplam Tutar
         $DB_Find_Product_TotalPayment = 0; 
         for ($i=0; $i <count($DB_Find_Product); $i++) {  
            $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
            $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
         }
         //! Ürün Bilgileri Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'DB_Product' => $DB_Find_Product,
            'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Proforma Product Add  Son

   //! Proforma Product Delete  
   public function ProformaProductDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('proforma_product_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            //! Ürün Bilgileri
            $DB_Find_Product = DB::table('proforma_product_list')->where('proforma_id',$request->data_id)->get();// Ürün Bilgileri
            //echo "<pre>"; print_r($DB_Find_Product); die();


            //! Ürün Toplam Tutar
            $DB_Find_Product_TotalPayment = 0; 
            for ($i=0; $i <count($DB_Find_Product); $i++) {  
               $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
               $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
            }
            //! Ürün Bilgileri Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Product' => $DB_Find_Product,
               'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Proforma Product Delete  Son
   

   //! Proforma Product Search Post
   public function ProformaProductSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         //$DB_Find = DB::table('proforma_product_list')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         
         //! Veri Arama
         $DB_Find = DB::table('proforma_product_list')
         ->leftJoin('stock', 'stock.id', '=', 'proforma_product_list.stock_id')
         ->select('proforma_product_list.*','stock.stockCode','stock.codeNumber','stock.accountingCode_buy','stock.accountingCode_sel')
         ->where('proforma_product_list.id',$request->id)
         ->first(); //Tüm verileri çekiyor
         //echo "<pre>"; echo print_r($DB_Find); die();

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Proforma Product Search Post Son


   //! Proforma Product Edit Post 
   public function ProformaProductEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
         
         //! Veri Güncelle
         $DB_Status = DB::table('proforma_product_list')->where('id',$request->id)
         ->update([            
            'sector' => $request->sector,
            'sub_sector' => $request->sub_sector,
            'stock_id' => $request->stock_id,
            //'requestform_product_id' => $request->requestform_product_id,
           
            'nameTr' => $request->nameTr,

            'imgUrl' => $request->imgUrl,
            'techFileUrl' => $request->techFileUrl,
           
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
           
            'price' => $request->price,
            'total' => $request->total,
            
            'kdv_buy' => $request->kdv_buy,
            'kdv_sell' => $request->kdv_sell,

            'export_registered' => $request->export_registered,
            'export_registered_kdv_buy' => $request->export_registered_kdv_buy,
            'export_registered_kdv_sell' => $request->export_registered_kdv_sell,

            'descriptionTr' => $request->descriptionTr,
            'descriptionEn' => $request->descriptionEn,
            
            'featuresTr' => $request->featuresTr,
            'featuresEn' => $request->featuresEn,

            'tech_featuresTr' => $request->tech_featuresTr,
            'tech_featuresEn' => $request->tech_featuresEn,

            'web_address' => $request->web_address,
            'catalogLink' => $request->catalogLink,
            'gtipNo' => $request->gtipNo,

            'productModel' => $request->productModel,
            'productCode' => $request->productCode,
            'is_warranty' => $request->is_warranty,
            'warrantyTime' => $request->warrantyTime,

            'setup' => $request->setup,
            'brand' => $request->brand,
            'colorCode' => $request->colorCode,

            'productUsePurposeTR' => $request->productUsePurposeTR,
            'productUsePurposeEN' => $request->productUsePurposeEN,

            'ownBrand' => $request->ownBrand,
            'specialDesign' => $request->specialDesign,
            'specialPacket' => $request->specialPacket,
            'salesOutlet' => $request->salesOutlet,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

             //! Ürün Bilgileri
             $DB_Find_Product = DB::table('proforma_product_list')->where('proforma_id',$request->data_id)->get();// Ürün Bilgileri
             //echo "<pre>"; print_r($DB_Find_Product); die();
 
 
             //! Ürün Toplam Tutar
             $DB_Find_Product_TotalPayment = 0; 
             for ($i=0; $i <count($DB_Find_Product); $i++) {  
                $DB_Find_Product[$i]->total = str_replace(",", ".", $DB_Find_Product[$i]->total ); 
                $DB_Find_Product_TotalPayment= $DB_Find_Product_TotalPayment + floatval($DB_Find_Product[$i]->total); 
             }
             //! Ürün Bilgileri Son
 
 
             $response = array(
                'status' => 'success',
                'msg' => __('admin.TransactionSuccessful'),
                'DB_Product' => $DB_Find_Product,
                'DB_Find_Product_TotalPayment' => $DB_Find_Product_TotalPayment,
                'dataId'=> $request->id
             );


            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Proforma Product Edit  Son

   
   //*** Proforma Şart  */

   //! Proforma Şart Add  
   public function ProformaConditionsAddPost (Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Ekleme
         DB::table('proforma_conditions_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'proforma_id' => (int)$request->proforma_id,
            'title' => $request->title,
            'isGeneral' => 0,
          
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


         //! Şartlar
         $DB_Find_conditions = DB::table('proforma_conditions_list')->where('proforma_id',$request->proforma_id)->where('isGeneral','0')->get();

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'proforma_id'=> $request->proforma_id,
            'DB_Find_conditions'=> $DB_Find_conditions,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'proforma_id'=> $request->proforma_id,
            'DB_Find_conditions'=> [],
         );

         return response()->json($response);
      }
      
   } //! Proforma Şart Add  Son

   //! Proforma Şart Delete  
   public function ProformaConditionsDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
         //! Veri Silme
         $DB_Status = DB::table('proforma_conditions_list')->where('id',(int)$request->id)->delete();

         if($DB_Status) {

            
            //! Şartlar
            $DB_Find_conditions = DB::table('proforma_conditions_list')->where('proforma_id',$request->proforma_id)->where('isGeneral',$request->isGeneral)->get();
            
            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'dataId'=> $request->id,
               'proforma_id'=> $request->proforma_id,
               'DB_Find_conditions'=> $DB_Find_conditions,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'dataId'=> $request->id,
               'proforma_id'=> $request->proforma_id,
               'DB_Find_conditions'=> [],
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Proforma Şart Delete  Son
   

   //! Proforma Şart Search Post
   public function ProformaConditionsSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('proforma_conditions_list')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Proforma Şart Search Post Son


   //! Proforma Şart Edit Post 
   public function ProformaConditionsEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

        
         //! Veri Güncelle
         $DB_Status = DB::table('proforma_conditions_list')->where('id',$request->id)
         ->update([            
            'proforma_id' => (int)$request->proforma_id,
            'title' => $request->title,
            'isGeneral' =>(int)$request->isGeneral,
            
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {


            //! Şartlar
            $DB_Find_conditions = DB::table('proforma_conditions_list')->where('proforma_id',$request->proforma_id)->where('isGeneral',$request->isGeneral)->get();

            
            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'dataId'=> $request->id,
               'proforma_id'=> $request->proforma_id,
               'DB_Find_conditions'=> $DB_Find_conditions,
            );

            return response()->json($response);
         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'dataId'=> $request->id,
               'proforma_id'=> null,
               'DB_Find_conditions'=> [],
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Proforma Şart Edit  Son

   
   //************* Proforma Bank ***************** */

   //! BankAdd Post  
   public function ProformaBankAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Ekleme
         DB::table('proforma_bank_list')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'proforma_id' => $request->proforma_id,
            'bankaAccountTitle' => $request->bankaAccountTitle,
            'bankTitle' => $request->bankTitle,
            'branch' => $request->branch,
            'accountNumber' => $request->accountNumber,
            'iban' => $request->iban,
            'swift' => $request->swift,
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


        $DB_Find_Bank = DB::table('proforma_bank_list')->where('proforma_id',$request->proforma_id)->get();

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'DB_Find_Bank' => $DB_Find_Bank,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'DB_Find_Bank' => [],
         );

         return response()->json($response);
      }
      
   } //! BankAdd Post Son

   //! Bank Delete  
   public function ProformaBankDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('proforma_bank_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            $DB_Find_Bank = DB::table('proforma_bank_list')->where('proforma_id',$request->proforma_id)->get();

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Find_Bank' => $DB_Find_Bank,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Delete  Son
   
   //! Bank Delete  Multi
   public function ProformaBankDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('proforma_bank_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Delete Multi  Son

   //! Bank Edit  
   public function ProformaBankEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_bank_list')->where('id',$request->id)
         ->update([            
            'proforma_id' => $request->proforma_id,
            'bankaAccountTitle' => $request->bankaAccountTitle,
            'bankTitle' => $request->bankTitle,
            'branch' => $request->branch,
            'accountNumber' => $request->accountNumber,
            'iban' => $request->iban,
            'swift' => $request->swift,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $DB_Find_Bank = DB::table('proforma_bank_list')->where('proforma_id',$request->proforma_id)->get();

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB_Find_Bank' => $DB_Find_Bank,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'dataId'=> $request->id,
               'DB_Find_Bank' => [],
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Son


   //! Bank Post
   public function ProformaBankSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('proforma_bank_list')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Bank Search Post Son
   
   //! Bank Edit Active
   public function ProformaBankEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_bank_list')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Active Son

   //! Bank Edit Active Multi
   public function ProformaBankEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('proforma_bank_list')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Active Multi Son

   
   //************* Ayarlar ***************************************************************** */


   //************* Category ***************** */

   //! Category
   public function CategoryList ($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "isActive";  $data_item_object="="; }
               else if($data_key_item == "Type") { $data_key_item = "type";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('category')->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son         
 
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/settings/categoryList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! Category Son

   //! CategoryAdd Post  
   public function CategoryAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find_title = DB::table('category')->where('type',$request->type)->where('title',$request->title)->first(); //! Arama
         $DB_Find_codeLet = DB::table('category')->where('type',$request->type)->where('codeLet',$request->codeLet)->first(); //! Arama
         $DB_Find_codeNumber = DB::table('category')->where('type',$request->type)->where('codeNumber',$request->codeNumber)->first(); //! Arama

         if($DB_Find_title) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Başlık Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else  if($DB_Find_codeLet) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Kod Harf Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else  if($DB_Find_codeNumber) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Kod Sayısı Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }

         else {
        

            //! Veri Ekleme
            DB::table('category')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'type' => $request->type,
               'title' => $request->title,
               'title_EN' => $request->title_EN,
               'codeLet' => $request->codeLet,
               'codeNumber' => $request->codeNumber,
               'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'post' => $request->all(),
            );

            return response()->json($response);

         }

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CategoryAdd Post Son

   //! CategoryAdd View
   public function CategoryAddView($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
               

         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
               

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/categoryAdd',$DB);

         }
         else {
            //echo "üye giriş yapınız"; die();
            return redirect('user/login');
         }

      } catch (\Throwable $th) {  throw $th; }
   } //! CategoryAdd View Son

   //! Category Delete  
   public function CategoryDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('category')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Category Delete  Son
   
   //! Category Delete  Multi
   public function CategoryDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('category')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Category Delete Multi  Son

   //! Category Edit  
   public function CategoryEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find = DB::table('category')->where('id',$request->id)->first(); //! Arama

         if($DB_Find) {
            
            $DB_Find_title = DB::table('category')->where('id','!=',$DB_Find->id)->where('type',$request->type)->where('title',$request->title)->first(); //! Arama
            $DB_Find_codeLet = DB::table('category')->where('id','!=',$DB_Find->id)->where('type',$request->type)->where('codeLet',$request->codeLet)->first(); //! Arama
            $DB_Find_codeNumber = DB::table('category')->where('id','!=',$DB_Find->id)->where('type',$request->type)->where('codeNumber',$request->codeNumber)->first(); //! Arama

            if($DB_Find_title) {

               $response = array(
                  'status' => 'error',
                  'msg' => "Bu Başlık Kayıtlıdır",
                  'DB' =>  []
               );
   
               return response()->json($response);
   
            }
            else if($DB_Find_codeLet) {
   
               $response = array(
                  'status' => 'error',
                  'msg' => "Bu Kod Harf Kayıtlıdır",
                  'DB' =>  []
               );
   
               return response()->json($response);
   
            }
            else if($DB_Find_codeNumber) {
   
               $response = array(
                  'status' => 'error',
                  'msg' => "Bu Kod Sayısı Kayıtlıdır",
                  'DB' =>  []
               );
   
               return response()->json($response);
   
            }
            else {
               
               //! Veri Güncelle
               $DB_Status = DB::table('category')->where('id',$request->id)
               ->update([            
                  'type' => $request->type,
                  'title' => $request->title,
                  'title_EN' => $request->title_EN,
                  'codeLet' => $request->codeLet,
                  'codeNumber' => $request->codeNumber,
                  'isUpdated'=>true,
                  'updated_at'=>Carbon::now(),
                  'updated_byId'=>$request->updated_byId,
               ]);

               if($DB_Status) {

                  $response = array(
                     'status' => 'success',
                     'msg' => __('admin.TransactionSuccessful'),
                  );

                  return response()->json($response);

               }
               else {

                  $response = array(
                     'status' => 'error',
                     'msg' => __('admin.DataNotFound'),
                     'dataId'=> $request->id
                  );

                  return response()->json($response);

               }

            }

         }
         else {

            $response = array(
               'status' => 'error',
               'msg' => "Veri Bulunamdı",
               'error' => $th,
            );
   
            return response()->json($response);

         }

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Category Edit Son

   //! Category Search Post
   public function CategorySearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('category')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Category Search Post Son
   
   //! Category Search Type Post
   public function CategorySearchTypePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('category')->where('type',$request->type)->orderBy('category.title','asc')->get(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Category Search Type Post Son
   
   //! Category Edit Active
   public function CategoryEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('category')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Category Edit Active Son

   //! Category Edit Active Multi
   public function CategoryEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('category')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Category Edit Active Multi Son

   
   //************* SubCategory ***************** */

   //! SubCategory
   public function SubCategoryList ($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı

            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "categorysub.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "categorysub.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "categorysub.isActive";  $data_item_object="="; }
               else if($data_key_item == "Category") { $data_key_item = "category.id";  $data_item_object="="; }
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //print_r($data_all); die();


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('categorysub')
                       ->leftJoin('category', 'category.id', '=', 'categorysub.categoryid')
                       ->select('categorysub.*','category.type as categoryType','category.title as categoryTitle')
                       ->where($data_all)
                       ->orderBy('categorysub.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son   
            
            //! Kategori
            $DB_Find_Category = [];
            $parameter_Type = request('Type');
            if($parameter_Type) { $DB_Find_Category = DB::table('category')->where('type',$parameter_Type)->orderBy('category.title','asc')->get(); }
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Category"] =  $DB_Find_Category;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/settings/categorySubList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! SubCategory Son

   //! SubCategoryAdd Post  
   public function SubCategoryAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find_title = DB::table('categorysub')->where('categoryid',$request->categoryid)->where('title',$request->title)->first(); //! Arama
         $DB_Find_codeLet = DB::table('categorysub')->where('categoryid',$request->categoryid)->where('codeLet',$request->codeLet)->first(); //! Arama
         $DB_Find_codeNumber = DB::table('categorysub')->where('categoryid',$request->categoryid)->where('codeNumber',$request->codeNumber)->first(); //! Arama

         if($DB_Find_title) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Başlık Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else  if($DB_Find_codeLet) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Kod Harf Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else  if($DB_Find_codeNumber) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Kod Sayısı Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else { 

            //! Veri Ekleme
            DB::table('categorysub')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'categoryid' => $request->categoryid,
               'title' => $request->title,
               'title_EN' => $request->title_EN,
               'codeLet' => $request->codeLet,
               'codeNumber' => $request->codeNumber,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'error' => null,
            );

            return response()->json($response);

         }

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SubCategoryAdd Post Son

   //! SubCategory Delete  
   public function SubCategoryDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('categorysub')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SubCategory Delete  Son
   
   //! SubCategory Delete  Multi
   public function SubCategoryDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('categorysub')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SubCategory Delete Multi  Son

   //! SubCategory Edit  
   public function SubCategoryEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('categorysub')->where('id',$request->id)
         ->update([            
            'categoryid' => $request->categoryid,
            'title' => $request->title,
            'title_EN' => $request->title_EN,
            'codeLet' => $request->codeLet,
            'codeNumber' => $request->codeNumber,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SubCategory Edit Son

   //! SubCategory Post
   public function SubCategorySearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('categorysub')->where('id',$request->id)->first(); //Tüm verileri çekiyor
         

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
               'DB_Category' =>  DB::table('category')->where('id',$DB_Find->categoryid)->first(),
               'categoryid' => $DB_Find->categoryid
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! SubCategory Search Post Son

   //! SubCategory Search Type Post
   public function SubCategoryTypeSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('categorysub')->where('categoryid',$request->id)->get(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! SubCategory Search Type Post Son

   //! SubCategory Edit Active
   public function SubCategoryEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('categorysub')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! SubCategory Edit Active Son

   //! SubCategory Edit Active Multi
   public function SubCategoryEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('categorysub')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! SubCategory Edit Active Multi Son


   //************* CostCalculationFixedExpenses ***************** */

   //! CostCalculationFixedExpenses
   public function CostCalculationFixedExpensesList ($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "cost_calculation_fixed_expenses.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "cost_calculation_fixed_expenses.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "cost_calculation_fixed_expenses.isActive";  $data_item_object="="; }
               else if($data_key_item == "Type") { $data_key_item = "cost_calculation_fixed_expenses.type";  $data_item_object="="; }
               else if($data_key_item == "Category") { $data_key_item = "category.id";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('cost_calculation_fixed_expenses')
                        ->leftJoin('category', 'category.id', '=', 'cost_calculation_fixed_expenses.category_id')
                        ->select('cost_calculation_fixed_expenses.*','category.title as categoryTitle')
                        ->where($data_all)
                        ->orderBy('cost_calculation_fixed_expenses.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son  
            
            //! Kategori
            $DB_Find_Category = [];
            $parameter_Type = request('Type');
            if($parameter_Type) { $DB_Find_Category = DB::table('category')->where('type',$parameter_Type)->orderBy('category.title','asc')->get(); }
 
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Category"] =  $DB_Find_Category;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/settings/costCalculationFixedExpensesList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! CostCalculationFixedExpenses Son

   //! CostCalculationFixedExpensesAdd Post  
   public function CostCalculationFixedExpensesAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find_title = DB::table('cost_calculation_fixed_expenses')->where('category_id',$request->category_id)->where('title',$request->title)->first(); //! Arama

         if($DB_Find_title) {

            $response = array(
               'status' => 'error',
               'msg' => "Bu Başlık Kayıtlıdır",
               'DB' =>  []
            );

            return response()->json($response);

         }
         else {
          
            //! Veri Ekleme
            DB::table('cost_calculation_fixed_expenses')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),
               'type' => $request->type,
               'category_id' => $request->category_id,
               'title' => $request->title,
               'description' => $request->description ,
               'price' => $request->price,
               'currency' => $request->currency,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'post' => $request->all(),
            );

            return response()->json($response);
            
         }

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpensesAdd Post Son

   //! CostCalculationFixedExpensesAdd View
   public function CostCalculationFixedExpensesAddView($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
               

         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
               

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/costCalculationFixedExpensesAdd',$DB);

         }
         else {
            //echo "üye giriş yapınız"; die();
            return redirect('user/login');
         }

      } catch (\Throwable $th) {  throw $th; }
   } //! CostCalculationFixedExpensesAdd View Son

   //! CostCalculationFixedExpenses Delete  
   public function CostCalculationFixedExpensesDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_fixed_expenses')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Delete  Son
   
   //! CostCalculationFixedExpenses Delete  Multi
   public function CostCalculationFixedExpensesDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('cost_calculation_fixed_expenses')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Delete Multi  Son

   //! CostCalculationFixedExpenses Edit  
   public function CostCalculationFixedExpensesEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Arama
         $DB_Find = DB::table('cost_calculation_fixed_expenses')->where('id',$request->id)->first(); //! Arama

         if($DB_Find) {

               //! Veri Arama
               $DB_Find_title = DB::table('cost_calculation_fixed_expenses')->where('id','!=',$DB_Find->id)->where('category_id',$request->category_id)->where('title',$request->title)->first(); //! Arama

               if($DB_Find_title) {

                  $response = array(
                     'status' => 'error',
                     'msg' => "Bu Başlık Kayıtlıdır",
                     'DB' =>  []
                  );

                  return response()->json($response);

               }
               else { 

                  //! Veri Güncelle
                  $DB_Status = DB::table('cost_calculation_fixed_expenses')->where('id',$request->id)
                  ->update([            
                     'type' => $request->type,
                     'category_id' => $request->category_id,
                     'title' => $request->title,
                     'description' => $request->description ,
                     'price' => $request->price,
                     'currency' => $request->currency,
                     'isUpdated'=>true,
                     'updated_at'=>Carbon::now(),
                     'updated_byId'=>$request->updated_byId,
                  ]);
         
                  if($DB_Status) {
         
                     $response = array(
                        'status' => 'success',
                        'msg' => __('admin.TransactionSuccessful'),
                     );
         
                     return response()->json($response);
                  }
                  else {
         
                     $response = array(
                        'status' => 'error',
                        'msg' => __('admin.TransactionFailed'),
                        'dataId'=> $request->id
                     );
         
                     return response()->json($response);
                  }

               }
            }
            else {
 
               $response = array(
                  'status' => 'error',
                  'msg' => __('admin.DataNotFound'),
                  'dataId'=> $request->id
               );
   
               return response()->json($response);
            } 

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Edit Son

   //! CostCalculationFixedExpenses Post
   public function CostCalculationFixedExpensesSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('cost_calculation_fixed_expenses')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         //! Genel Kategori
         $DB_Find_Category = array(
            "id"=>0,
            "title" => "Genel"
         );

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
               'DB_Category' => $DB_Find->category_id == 0 ?  $DB_Find_Category : DB::table('category')->where('id',$DB_Find->category_id)->first(),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Search Post Son
   
   //! CostCalculationFixedExpenses Edit Active
   public function CostCalculationFixedExpensesEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_fixed_expenses')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Edit Active Son

   //! CostCalculationFixedExpenses Edit Active Multi
   public function CostCalculationFixedExpensesEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('cost_calculation_fixed_expenses')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! CostCalculationFixedExpenses Edit Active Multi Son

  
   //************* Bank ***************** */

   //! Bank
   public function BankList ($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "bank.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "bank.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "bank.isActive";  $data_item_object="="; }
               else if($data_key_item == "CurrentCart") { $data_key_item = "bank.currencyCartId";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('bank')
            ->leftJoin('current_cart', function ($join) {
               $join->on('current_cart.id', '=', 'bank.currencyCartId')->where('bank.currencyCartId', '!=', 0);
            })
            ->select('bank.*', 'current_cart.current_name')
            ->where($data_all)
            //->orWhere('bank.currencyCartId', '=', 0)
            ->orderBy('bank.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();
            
            //! Params Verileri Where Formatında Yazılacak Son     
            
            //veri tabanı işlemleri
            $DB_Find_Current = DB::table('current_cart')->orderBy('current_cart.current_name','asc')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Current"] =  $DB_Find_Current;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/settings/bankList',$DB);
         }
         else {  return redirect('user/login'); }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! Bank Son

   //! BankAdd Post  
   public function BankAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Ekleme
         DB::table('bank')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'currencyCartId' => $request->currencyCartId,
            'bankaAccountTitle' => $request->bankaAccountTitle,
            'bankTitle' => $request->bankTitle,
            'branch' => $request->branch,
            'accountNumber' => $request->accountNumber,
            'iban' => $request->iban,
            'swift' => $request->swift,
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'post' => $request->all(),
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BankAdd Post Son

   //! BankAdd View
   public function BankAddView($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
               

         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
               

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/bankAdd',$DB);

         }
         else {
            //echo "üye giriş yapınız"; die();
            return redirect('user/login');
         }

      } catch (\Throwable $th) {  throw $th; }
   } //! BankAdd View Son

   //! Bank Delete  
   public function BankDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('bank')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Delete  Son
   
   //! Bank Delete  Multi
   public function BankDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('bank')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Delete Multi  Son

   //! Bank Edit  
   public function BankEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('bank')->where('id',$request->id)
         ->update([            
            'currencyCartId' => $request->currencyCartId,
            'bankaAccountTitle' => $request->bankaAccountTitle,
            'bankTitle' => $request->bankTitle,
            'branch' => $request->branch,
            'accountNumber' => $request->accountNumber,
            'iban' => $request->iban,
            'swift' => $request->swift,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Son


   //! Bank Post
   public function BankSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('bank')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! Bank Search Post Son
   
   //! Bank Edit Active
   public function BankEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('bank')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Active Son

   //! Bank Edit Active Multi
   public function BankEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('bank')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! Bank Edit Active Multi Son


   //************* GeneralConditions ***************** */

   //! GeneralConditions
   public function GeneralConditionsList ($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "isActive";  $data_item_object="="; }
               else if($data_key_item == "Type") { $data_key_item = "type";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('general_conditions')->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son         
 
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/settings/generalConditionsList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! GeneralConditions Son

   //! GeneralConditionsAdd Post  
   public function GeneralConditionsAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Ekleme
         DB::table('general_conditions')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'type' => $request->type,
            'title' => $request->title,
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful')
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GeneralConditionsAdd Post Son

   //! GeneralConditions Delete  
   public function GeneralConditionsDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('general_conditions')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Delete  Son
   
   //! GeneralConditions Delete  Multi
   public function GeneralConditionsDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('general_conditions')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Delete Multi  Son

   //! GeneralConditions Edit  
   public function GeneralConditionsEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('general_conditions')->where('id',$request->id)
         ->update([            
            'type' => $request->type,
            'title' => $request->title,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Edit Son


   //! GeneralConditions Post
   public function GeneralConditionsSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('general_conditions')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Search Post Son
   
   //! GeneralConditions Edit Active
   public function GeneralConditionsEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('general_conditions')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Edit Active Son

   //! GeneralConditions Edit Active Multi
   public function GeneralConditionsEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('general_conditions')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! GeneralConditions Edit Active Multi Son

         
   //************* Analiz Ürün Listesi ***************** */

   //! AnalysisProductList
   public function AnalysisProductList($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "analysis_product_list.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "analysis_product_list.id";  $data_item_object="=";  }
              
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('analysis_product_list')
            ->select('analysis_product_list.*',)
            ->where($data_all)->orderBy('analysis_product_list.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            // //echo "<pre>"; print_r($DB_Find); die();
            
            //! Params Verileri Where Formatında Yazılacak Son  
           

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;
         

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/analysis/analysisProductList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }
   } //! AnalysisProductList Son


   //! AnalysisProductList Add  
   public function AnalysisProductListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
            //! Veri Ekleme
            DB::table('analysis_product_list')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),

               'nameTr' => $request->nameTr,
               'gtipNo' => $request->gtipNo,
               
               'stockUnit' => $request->stockUnit,
               'stockCount' => $request->stockCount,
               'currency' => $request->currency,
               'price' => $request->price,
               
               
               'descriptionTr' => $request->descriptionTr,
               'featuresTr' => $request->featuresTr,
               'tech_featuresTr' => $request->tech_featuresTr,

               'imgUrl' => $request->imgUrl == "" ? config('admin.Default_ProductImgUrl') : $request->imgUrl,

               'isActive'=>$request->isActive == "true" ? true : false,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisProductList Add  Son

   
   //! AnalysisProductList Delete  
   public function AnalysisProductListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('analysis_product_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisProductList Delete  Son


   //! AnalysisProductList Delete  Multi
   public function AnalysisProductListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('analysis_product_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisProductList Delete  Son


   //! AnalysisProductList Post
   public function AnalysisProductListSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('analysis_product_list')->where('id',$request->id)->first(); //Tüm verileri çekiyor
         
         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! AnalysisProductList Search Post Son

     
   //! AnalysisProductList Update  
   public function AnalysisProductListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Güncelle
         $DB_Status = DB::table('analysis_product_list')->where('id',$request->id)
         ->update([            
            'nameTr' => $request->nameTr,
            'gtipNo' => $request->gtipNo,
           
            'stockUnit' => $request->stockUnit,
            'stockCount' => $request->stockCount,
            'currency' => $request->currency,
            'price' => $request->price,

            'descriptionTr' => $request->descriptionTr,
            'featuresTr' => $request->featuresTr,
            'tech_featuresTr' => $request->tech_featuresTr,

            'imgUrl' => $request->imgUrl,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisProductList Update  Son


   //************* Analiz Listesi ***************** */

   //! AnalysisList
   public function AnalysisList($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "analysis_list.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "analysis_list.id";  $data_item_object="=";  }
               else if($data_key_item == "Product") { $data_key_item = "analysis_list.product_id";  $data_item_object="=";  }
              
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";

            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('analysis_list')
            ->select('analysis_list.*','analysis_product_list.nameTr','analysis_product_list.gtipNo','analysis_product_list.price as productPrice','analysis_product_list.imgUrl as product_imgUrl')
            ->join('analysis_product_list', 'analysis_product_list.id', '=', 'analysis_list.product_id')
            ->where($data_all)->orderBy('analysis_list.id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();
            
            //! Params Verileri Where Formatında Yazılacak Son  

            //! Ürün Listesi
            $DB_Find_Product = DB::table('analysis_product_list')->orderBy('id','desc')->get();
            //! Ürün Listesi Son
           

            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_Product"] =  $DB_Find_Product;
         

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/analysis/analysisList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
      } catch (\Throwable $th) {  throw $th; }
   } //! AnalysisList Son


   //! AnalysisList Add  
   public function AnalysisListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        
            //! Veri Ekleme
            DB::table('analysis_list')->insert([
               'ServerId' => config('admin.ServerId'),
               'ServerToken' => config('admin.ServerToken'),

               'product_id' => $request->product_id,
               'pratform_id' => $request->pratform_id,
               
               'currency' => $request->currency,
               'price' => $request->price,
               
               'descriptionTr' => $request->descriptionTr,
               'featuresTr' => $request->featuresTr,
               'tech_featuresTr' => $request->tech_featuresTr,

               'imgUrl' => $request->imgUrl == "" ? null : $request->imgUrl,

               'isActive'=>$request->isActive == "true" ? true : false,
               'created_byId'=>$request->created_byId,
            ]); //! Veri Ekleme Son


            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisList Add  Son

   
   //! AnalysisList Delete  
   public function AnalysisListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('analysis_list')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisList Delete  Son


   //! AnalysisList Delete  Multi
   public function AnalysisListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('analysis_list')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisList Delete  Son


   //! AnalysisList Post
   public function AnalysisListSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         
         $DB_Find = DB::table('analysis_list')
            ->select('analysis_list.*','analysis_product_list.nameTr','analysis_product_list.gtipNo','analysis_product_list.price as productPrice')
            ->join('analysis_product_list', 'analysis_product_list.id', '=', 'analysis_list.product_id')
            ->where('analysis_list.id',$request->id)->first(); //Tüm verileri çekiyor
         
         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! AnalysisList Search Post Son

     
   //! AnalysisList Update  
   public function AnalysisListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Güncelle
         $DB_Status = DB::table('analysis_list')->where('id',$request->id)
         ->update([            
            'product_id' => $request->product_id,
            'pratform_id' => $request->pratform_id,
            
            'currency' => $request->currency,
            'price' => $request->price,

            'descriptionTr' => $request->descriptionTr,
            'featuresTr' => $request->featuresTr,
            'tech_featuresTr' => $request->tech_featuresTr,

            'imgUrl' => $request->imgUrl,

            'systemCommission' => $request->systemCommission,
            'systemCommissionTotal' => $request->systemCommissionTotal,
            'vat' => $request->vat,
            'vatTotal' => $request->vatTotal,

            'profitTax' => $request->profitTax,
            'profitTaxTotal' => $request->profitTaxTotal,
            'shippingCost' => $request->shippingCost,
            'shippingCostTotal' => $request->shippingCostTotal,

            'inventoryCost' => $request->inventoryCost,
            'inventoryCostTotal' => $request->inventoryCostTotal,
            'salesProfitRate' => $request->salesProfitRate,
            'salesProfitRateTotal' => $request->salesProfitRateTotal,
            'netPrice' => $request->netPrice,

            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! AnalysisList Update  Son

   
   //************* BusinessTracking ***************** */

   //! BusinessTracking
   public function BusinessTrackingList ($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "business_tracking.created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "business_tracking.id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "business_tracking.isActive";  $data_item_object="="; }
               else if($data_key_item == "PersonelId") { $data_key_item = "business_tracking.personel_id";  $data_item_object="="; }
               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //veri tabanı işlemleri
            $DB_Find = DB::table('business_tracking')
            ->join('users', 'users.id', '=', 'business_tracking.personel_id')
            ->leftJoin('requestform', 'requestform.id', '=', 'business_tracking.requestform_id')
            ->select('business_tracking.*','users.name','users.surname','users.img_url','requestform.requestFormTitle')
            ->where($data_all)->orderBy('business_tracking.id','desc') ->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //! echo "<pre>"; print_r($DB_Find); die();


            //! Params Verileri Where Formatında Yazılacak Son     

            //veri tabanı işlemleri
            $DB_Find_User = DB::table('users')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_User); die();

            //veri tabanı işlemleri
            $DB_Find_requestform = DB::table('requestform')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_Current); die();
 
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
          
            $DB["DB_Find"] =  $DB_Find;
            $DB["DB_Find_User"] =  $DB_Find_User;
            $DB["DB_Find_requestform"] =  $DB_Find_requestform;
           

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/businessTracking/businessTrackingList',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }

   } //! BusinessTracking Son

   //! BusinessTrackingAddPost   
   public function BusinessTrackingAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Veri Ekleme
         DB::table('business_tracking')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'title' => $request->title,
            'starting_at' => $request->starting_at,

            'requestform_id'=>(int)$request->requestform_id,
            'personel_id'=>(int)$request->personeId,
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'deneme' => "Ekleme",
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTrackingAddPost  Son

   //! BusinessTracking Delete Post
   public function BusinessTrackingDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('business_tracking')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Delete Post  Son
   
   //! BusinessTracking Multi Delete Post
   public function BusinessTrackingDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('requestform')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Multi Delete Post Son

   //! BusinessTracking Edit  
   public function BusinessTrackingEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('business_tracking')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            'description'=>$request->description,
            'authorized_statement'=>$request->authorized_statement,
         
            'starting_at'=>$request->starting_at,
            'finished_at'=>$request->finished_at,
            'status'=>$request->status,
            
            'personel_id'=>$request->personel_id,

            'collocutor_nameSurname'=>$request->collocutor_nameSurname,
            'collocutor_phone'=>$request->collocutor_phone,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Edit Son


   //! BusinessTracking Edit View
   public function BusinessTrackingEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            //! Tanım
            $requestform_id = null;

            // İş Bilgileri
            $DB_Find = DB::table('business_tracking')->where('id',$id)->first();//Tüm verileri çekiyor
            //echo "<pre>"; print_r($DB_Find); die();
            if($DB_Find) { $requestform_id = $DB_Find->requestform_id; }
            else  { echo "Veri Bulunamadı"; die();  }
            
            // Notlar
            $DB_Find_Note = DB::table('business_tracking_notes')->where('business_id',$id)->get();//Tüm verileri çekiyor
            //! echo "<pre>"; print_r($DB_Find_Note); die();

            // Belgeler
            $DB_Find_Doc = DB::table('business_tracking_doc')->where('business_id',$id)->get();//Tüm verileri çekiyor
            //! echo "<pre>"; print_r($DB_Find_Doc); die();

            // Todo List
            $DB_Find_Todo = DB::table('business_tracking_todos')->where('business_id',$id)->get();//Tüm verileri çekiyor
            //! echo "<pre>"; print_r($DB_Find_Todo); die();

            // Log
            $DB_Find_Log = DB::table('business_tracking_log')->where('business_id',$id)->get();//Tüm verileri çekiyor
            //! echo "<pre>"; print_r($DB_Find_Log); die();

            //! Kullanıcı Bilgileri
            $DB_Find_User = DB::table('users')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_User); die();

            //! Talep
            $DB_Find_requestform = DB::table('requestform')->get(); //Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_requestform); die();

            //! Teklif
            $DB_Find_get_offers = DB::table('get_offers')->where('requestformid',$requestform_id)->get();//Tüm verileri çekiyor
            //echo "<pre>";print_r($DB_Find_get_offers); die();

            //! Veriler
            $DB_Find_Doc_Log = array();

            for ($i=0; $i < count($DB_Find_get_offers) ; $i++) { 

               $DB_Find_cost_calculation = DB::table('cost_calculation_list')->where('get_offers_id',$DB_Find_get_offers[$i]->id)->get();//Tüm verileri çekiyor
               //echo "<pre>";print_r($DB_Find_get_offers); die();

               $cost = array();
               for ($y=0; $y <count($DB_Find_cost_calculation); $y++) { 

                  //! Proforma
                  $DB_Find_proforma = DB::table('proforma_invoice')->where('cost_calculation_id',$DB_Find_cost_calculation[$y]->id)->get();//Tüm verileri çekiyor
                  //echo "<pre>";print_r($DB_Find_get_offers); die();

                  $prof = array();
                  for ($k=0; $k <count($DB_Find_proforma); $k++) { 
                     $prof[] = array(
                        "id" => $DB_Find_proforma[$k]->id,
                        "title" => $DB_Find_proforma[$k]->title,
                        "created_at" => $DB_Find_get_offers[$i]->created_at,
                      );

                  }
                  //! Proforma Son

                   $cost[] = array(
                     "id" => $DB_Find_cost_calculation[$y]->id,
                     "title" => $DB_Find_cost_calculation[$y]->title,
                     "created_at" => $DB_Find_get_offers[$i]->created_at,
                     "proforma" => $prof
                   );
               }

               $DB_Find_Doc_Log[] = array(
                  "id" => $DB_Find_get_offers[$i]->id,
                  "title" => $DB_Find_get_offers[$i]->title,
                  "created_at" => $DB_Find_get_offers[$i]->created_at,
                  "cost_calculation" => $cost
               );
              
            }
            
            //echo "<pre>";print_r($DB_Find_Doc_Log); die();
            //! Veriler Son
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;
            
            $DB["DB_Find_Note"] =  $DB_Find_Note;
            $DB["DB_Find_Doc"] =  $DB_Find_Doc;
            $DB["DB_Find_Todo"] =  $DB_Find_Todo;
            $DB["DB_Find_Log"] =  $DB_Find_Log;

            $DB["DB_Find_User"] =  $DB_Find_User;
            $DB["DB_Find_requestform"] =  $DB_Find_requestform;

            $DB["DB_Find_Doc_Log"] =  $DB_Find_Doc_Log;
         

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/businessTracking/businessTrackingEdit',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! BusinessTracking Edit View Son


   //! BusinessTracking Search Post
   public function BusinessTrackingSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('requestform')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Search Post Son

   //! BusinessTracking View
   public function BusinessTrackingSearchView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
       
            //veri tabanı işlemleri
            $DB_Find = DB::table('requestform')->where('id',$id)->first(); //Tüm verileri çekiyor
            // echo "<pre>"; print_r($DB_Find); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/requestFormView',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! BusinessTracking View Son
   
   //! BusinessTracking Edit Active
   public function BusinessTrackingEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Edit Active Son

   //! BusinessTracking Edit Active Multi
   public function BusinessTrackingEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('requestform')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Edit Active Multi Son


   //************* BusinessTracking Not ***************** */

   //! BusinessTracking Not AddPost   
   public function BusinessTrackingNoteAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Veri Ekleme
         DB::table('business_tracking_notes')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
            'fileUrl' => $request->fileUrl,

            'business_id'=>(int)$request->business_id,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_notes')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'DB_Filter' => $DB_Filter,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Not AddPost  Son

   
   //! BusinessTracking Not  Search Post
   public function BusinessTrackingNoteSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         
         //! Veri Arama
         $DB_Find = DB::table('business_tracking_notes')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Not  Search Post Son
   
   //! BusinessTracking Not Edit 
   public function BusinessTrackingNoteEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('business_tracking_notes')->where('id',$request->id)
         ->update([            
            'date'=>$request->date,
            'category'=>$request->category,
            'description'=>$request->description,
            'fileUrl' => $request->fileUrl,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);
         
         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_notes')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Not Edit Son

   //! BusinessTracking Not Delete Post
   public function BusinessTrackingNoteDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('business_tracking_notes')->where('id',$request->id)->delete();

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_notes')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Not Delete Post  Son


   
   //************* BusinessTracking Doc ***************** */

   //! BusinessTracking Doc AddPost   
   public function BusinessTrackingDocAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {

         //! Veri Ekleme
         DB::table('business_tracking_doc')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'fileUrl' => $request->fileUrl,

            'business_id'=>(int)$request->business_id,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_doc')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'DB_Filter' => $DB_Filter,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Doc AddPost  Son

   
   //! BusinessTracking Doc  Search Post
   public function BusinessTrackingDocSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         
         //! Veri Arama
         $DB_Find = DB::table('business_tracking_doc')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Doc  Search Post Son
   
   //! BusinessTracking Doc Edit 
   public function BusinessTrackingDocEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('business_tracking_doc')->where('id',$request->id)
         ->update([            
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'fileUrl' => $request->fileUrl,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);
         
         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_doc')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Doc Edit Son

   //! BusinessTracking Doc Delete Post
   public function BusinessTrackingDocDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('business_tracking_doc')->where('id',$request->id)->delete();

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_doc')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Doc Delete Post  Son


   //************* BusinessTracking Todo ***************** */

   //! BusinessTracking Todo AddPost   
   public function BusinessTrackingTodoAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Veri Ekleme
         DB::table('business_tracking_todos')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'title' => $request->title,
            'todo' => $request->todo,
            'description' => $request->description,
            'fileUrl' => $request->fileUrl,

            'business_id'=>(int)$request->business_id,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_todos')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'DB_Filter' => $DB_Filter,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Todo AddPost  Son

   
   //! BusinessTracking Todo  Search Post
   public function BusinessTrackingTodoSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         
         //! Veri Arama
         $DB_Find = DB::table('business_tracking_todos')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Todo  Search Post Son
   
   //! BusinessTracking Todo Edit 
   public function BusinessTrackingTodoEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('business_tracking_todos')->where('id',$request->id)
         ->update([            
            'title'=>$request->title,
            'todo'=>$request->todo,
            'description'=>$request->description,
           
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);
         
         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_todos')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Todo Edit Son

   //! BusinessTracking Todo Delete Post
   public function BusinessTrackingTodoDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('business_tracking_todos')->where('id',$request->id)->delete();

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_todos')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Todo Delete Post  Son



    //************* BusinessTracking Log ***************** */

   //! BusinessTracking Log AddPost   
   public function BusinessTrackingLogAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {


         //! Veri Ekleme
         DB::table('business_tracking_log')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            
            'date' => $request->date,
            'description' => $request->description,
            'fileUrl' => $request->fileUrl,

            'business_id'=>(int)$request->business_id,
            'created_byId'=>$request->created_byId,
         ]); //! Veri Ekleme Son

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_log')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            
            'DB_Filter' => $DB_Filter,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
         
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Log AddPost  Son

   
   //! BusinessTracking Log  Search Post
   public function BusinessTrackingLogSearchPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Arama
         $DB_Find = DB::table('business_tracking_log')->where('id',$request->id)->first(); //Tüm verileri çekiyor

         if($DB_Find) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'DB' =>  $DB_Find
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
               'DB' =>  []
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,            
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Log  Search Post Son
   
   //! BusinessTracking Log Edit 
   public function BusinessTrackingLogEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('business_tracking_log')->where('id',$request->id)
         ->update([            
            'date'=>$request->date,
            'description'=>$request->description,
            'fileUrl' => $request->fileUrl,
          
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);
         
         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_log')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Log Edit Son


   //! BusinessTracking Log Delete Post
   public function BusinessTrackingLogDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Silme
         $DB_Status = DB::table('business_tracking_log')->where('id',$request->id)->delete();

         //! Kalan Veriler
         $DB_Filter = DB::table('business_tracking_log')->where('business_id',$request->business_id)->get(); //Tüm verileri çekiyor

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),

               'DB_Filter' => $DB_Filter,
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! BusinessTracking Log Delete Post  Son


   //************* Sabit ***************** */

   //! Sabit
   public function Sabit($site_lang="tr")
   {

      try {

        //! Tanım
        $yildirimdev_userCheck = 0;
        $yildirimdev_userID = "";
        $yildirimdev_name = "";
        $yildirimdev_surname = "";
        $yildirimdev_img_url = "";

        //? Cookie Varmı
        if(isset($_COOKIE["yildirimdev_userCheck"])) {

           $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
           $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
           $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
           $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
           $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

           //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
           
        }
       
 
         if($yildirimdev_userCheck ) {
             //echo "üye girişi oldu"; die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
 

             //! Çoklu Dil
             \Illuminate\Support\Facades\App::setLocale($site_lang);
             return view('admin/00_0_sabit',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! Sabit Son

   
   //************* Sabit Form ***************** */

   //! SabitForm
   public function SabitForm($site_lang="tr")
   {

      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/sabit/00_sabit_form');

   } //! SabitForm Son
   
   
   //! Sabit Form
   public function SabitFormControl(Request $request)
   {

      try {

            //Veri Okuma
            // [ Name] - değerlerine göre oku
            $token= $request->_token;
            $siteLang= $request->siteLang; //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

            $email= $request->email;
            $password= $request->password;

            echo "Sabit Form "; "<br/>";
            echo "email: "; echo $email; echo "<br/>";
            echo "password: "; echo $password; echo "<br/>";


      } catch (\Throwable $th) { throw $th; }

   } //! Sabit Form Son


   //************* Sabit List ***************** */

   //! SabitList
   public function SabitList($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
 
         if($yildirimdev_userCheck ) {
             

            //! Params Verileri Where Formatında Yazılacak

            //! Tanım
            $parameter_all = request()->all(); //! Tüm Params Veriler
            $data_keys = array_keys($parameter_all); //! Tüm Params Keys
            $data_all= []; //! Tüm Veriler
            $data_count = count(request()->all()); //! Params Sayısı


            for ($i=0; $i < count(request()->all()) ; $i++) { 
               
               //! Tanım
               $data_search_key = [];
               $data_key_item = $data_keys[$i]; //! Anahtar Kelime * id
               $data_item = $parameter_all[$data_key_item]; //! Arama Sonuc  * 1
               $data_item_object = "=";

            
               if($data_key_item == "CreatedDate") { $data_key_item = "created_at";   $data_item_object="like"; $data_item=$data_item ."%";  }
               else if($data_key_item == "Id") { $data_key_item = "id";  $data_item_object="=";  }
               else if($data_key_item == "Status") { $data_key_item = "isActive";  $data_item_object="="; }

               
               //! Ekleme Yapıyor
               array_push($data_search_key,$data_key_item); //! id
               array_push($data_search_key,$data_item_object); //! =
               array_push($data_search_key,$data_item); //1

               //echo $data_key_item.":".$data_item; echo "<br/>";

               //! Where Veri Ekleme
               if($data_item != "All" ) { array_push($data_all,$data_search_key); }

            } //! Params Verileri Where Formatında Yazılacak Son

            //! print_r($data_all); echo "<br/>";


            //! Çoklu Arama
            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('test')->where($data_all)->orderBy('id','desc')->get(); //! Paramsa Göre Tüm Verileri çekiyor
            //print_r($DB_Find); die();

            //! Params Verileri Where Formatında Yazılacak Son         
 
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            $DB["DB_Find"] =  $DB_Find;

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/00_0_sabit_list',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! SabitList Son


   //! SabitList View
   public function SabitListAddView($site_lang="tr")
   {
      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";

         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }

         if($yildirimdev_userCheck ) {
            
            
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
            

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/00_1_sabit_list_add',$DB);
         }
         else {
            //echo "üye giriş yapınız"; die();
            return redirect('user/login');
         }

      } catch (\Throwable $th) {  throw $th; }
   } //! SabitList View Son


   //! SabitList Add  
   public function SabitListAddPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Ekleme
         DB::table('test')->insert([
            'ServerId' => config('admin.ServerId'),
            'ServerToken' => config('admin.ServerToken'),
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'value' => $request->value,
            'img_url'=> config('admin.Default_UserImgUrl'),
            'created_byId'=>$request->created_byId,
        ]); //! Veri Ekleme Son


         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SabitList Add  Son

   
   //! SabitList Delete  
   public function SabitListDeletePost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('test')->where('id',$request->id)->delete();

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful')
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SabitList Delete  Son


   //! SabitList Delete  Multi
   public function SabitListDeletePostMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Silme
         $DB_Status = DB::table('test')->whereIn('id',$request->ids)->delete();
         
         //$DB_Status = 1;

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids' => $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SabitList Delete  Son

     
   //! SabitList Update  
   public function SabitListEditPost(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('test')->where('id',$request->id)
         ->update([            
            'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
            'value'=>$request->value,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
         );

         return response()->json($response);
      }
      
   } //! SabitList Update  Son

   //! SabitList Update View
   public function SabitListEditView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {

            // echo "<pre>";
            // //veri tabanı işlemleri
            $DB_Find = DB::table('test')->where('id',1)->get();//Tüm verileri çekiyor
            // print_r($DB_Find); die();
         
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/04_sabit_add_edit_design',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! SabitList Update View Son

   //! SabitList View
   public function SabitListView($site_lang="tr",$id)
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
   
         if($yildirimdev_userCheck ) {
               

            //echo "<pre>";
            //veri tabanı işlemleri
            $DB_Find = DB::table('test')->where('id',$id)->first(); //Tüm verileri çekiyor
            //print_r($DB_Find); die();
   
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;

            $DB["DB_Find"] =  $DB_Find;


            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/00_2_sabit_list_view',$DB);
         }
         else {
               //echo "üye giriş yapınız"; die();
               return redirect('user/login');
         }
   
      } catch (\Throwable $th) {  throw $th; }
   } //! SabitList View Son


   //! SabitList Edit Active
   public function SabitListEditActive(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         //! Veri Güncelle
         $DB_Status = DB::table('test')->where('id',$request->id)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
        
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! SabitList Edit Active Son


   //! SabitList Edit Active Multi
   public function SabitListEditActiveMulti(Request $request)
   {

      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
         

         //! Veri Güncelle
         $DB_Status = DB::table('test')->whereIn('id',$request->ids)
         ->update([  
            'isActive'=>$request->active == "true" ? false : true,
            'isUpdated'=>true,
            'updated_at'=>Carbon::now(),
            'updated_byId'=>$request->updated_byId,
         ]);

         if($DB_Status) {

            $response = array(
               'status' => 'success',
               'msg' => __('admin.TransactionSuccessful'),
               'ids'=> $request->ids
            );

            return response()->json($response);

         }

         else {

            $response = array(
               'status' => 'error',
               'msg' => __('admin.DataNotFound'),
            );

            return response()->json($response);

         }
         

      } catch (\Throwable $th) {
         
         
         $response = array(
            'status' => 'error',
            'msg' => __('admin.TransactionFailed'),
            'error' => $th,
            'dataId'=> $request->active
         );

         return response()->json($response);
      }
      
   } //! SabitList Edit Active Multi Son

      
   //! SabitList Import File
   public function SabitListExportFile(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) { $uploadStatus = true; }

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;

            if($fileDbSaveCheck == "true") {
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
               ]);
            } 
            //! Veri Tabanı Kayıt Yapma Son


            //! ************** Import *************
            $data ='';
            $fileUrl = "upload/uploads/".$fileName; //! Dosya yeri
            $DB_importStatus = false;
            $DB=[]; //! DB

            if($file_status) {

               if($fileExt == "json") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $DB = json_decode($data,true); //! Veri Json Çeviriyor

                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"],
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }
               else if($fileExt == "xml") {

                  //! Dosya Kontrol ediyor 
                  if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
                  $xmlObject = simplexml_load_string($data); //! Xml Dosyası Okuma

                  $json = json_encode($xmlObject); 
                  $DB = json_decode($json, true); //! Dosya Array Çevirme 
                  $DB = $DB["Data"]; //! Array
                  
                  //! Veri Tabanı işlemleri
                  try {

                     for ($i=0; $i < count($DB); $i++) { 
                        
                        //! VeriTabanına Kayıt Yapıyor
                        $DB_importStatus = DB::table('test')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'name'=> $DB[$i]["Name"],
                           'surname'=> $DB[$i]["Surname"],
                           'email'=> $DB[$i]["Email"],
                           'value'=> $DB[$i]["Value"],
                           'img_url'=> $DB[$i]["Image"],
                           'isActive'=> $DB[$i]["Status"] == "true" ? true : false,
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]); //! VeriTabanına Kayıt Yapıyor Son

                     }

                  } catch (\Throwable $th) { throw $th; }
                  //! Veri Tabanı işlemleri Son

               }



            }
            //! ************** Import Son *************

      

            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads'),
               'DB_importStatus' => $DB_importStatus,
               'DB' => $DB,
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! SabitList Import File


   //************* File Upload ***************** */

   //! FileUpload
   public function fileUpload($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
 

             //! Çoklu Dil
             \Illuminate\Support\Facades\App::setLocale($site_lang);
             return view('admin/sabit/01_sabit_fileUpload',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! FileUpload Son

   
   //! Post - File Upload
   public function fileUploadControl(Request $request)
   {
      
      try {
       
            $request->validate([
               'file' => 'required',
            ]);
         
            //! Dosya Boyutu
            $fileSize = $request->file('file')->getSize();  //kb - Boyutu
            $fileSize_kb = round($fileSize/1024,2);
            $fileSize_mb = round($fileSize/1024/1024,2);
            $fileSize_gb = round($fileSize/1024/1024/1024,2);

            $fileSizeTotal = 0;
            $fileSizeTotalType = 'kb';

            if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
            else if($fileSize_gb < 1) {
               if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
               else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
            }
            //! Dosya Boyutu Son

            //! FileName
            $fileName = time().'.'.$request->file->extension();

            //! Dosya Yükleme Durumu
            $file_status= $request->file->move(public_path('upload/uploads'), $fileName);

            //! Dosya Türü
            $fileExt = request()->file->getClientOriginalExtension(); //! Uzantısı
            $fileType = $_FILES['file']['type']; //! Türü
            $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image

            //! Tanım
            $uploadStatus = false;
            if($file_status) {  $uploadStatus = true; }


             //! Veri Tabanı Kayıt Yapma
             $fileWhere = $request->fileWhere;
             $fileDbSaveCheck = $request->fileDbSave;
             $fileDbSaveStatus = false;

             if($fileDbSaveCheck == "true") {
              
               
               $fileDbSaveStatus = DB::table('files')->insert([
                  'ServerId' => config('admin.ServerId'),
                  'ServerToken' => config('admin.ServerToken'),
                  'fileWhere'=> $fileWhere,
                  'fileName'=> $fileName,
                  'fileExt'=> request()->file->getClientOriginalExtension(),
                  'fileType'=> $fileType,
                  'fileOriginalName'=> request()->file->getClientOriginalName(),
                  'fileUploadUrl' => "upload/uploads/".$fileName,
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType,
                  'created_byId' => (int)$request->created_byId,
               ]);

             } 
             //! Veri Tabanı Kayıt Yapma Son


            $response = array(
               'status' => $uploadStatus ? 'success' : 'error',
               'userId' => (int)$request->created_byId || 0, 
               'fileDbSaveCheck' => $fileDbSaveCheck,
               'fileDbSaveStatus' => $fileDbSaveStatus,
               'fileWhere' => $fileWhere,
               'file_upload_status'=>$uploadStatus,
               'file_path'=>url('upload/uploads/'.$fileName),
               'file_name'=>$fileName,
               'file_originName'=>request()->file->getClientOriginalName(),
               'file_size'=>array(
                  'sizeByte' => $fileSize,
                  'sizeTotal' => $fileSizeTotal,
                  'sizeTotalType' => $fileSizeTotalType
               ),
               'file_ext'=>$fileExt,
               'file_type'=> $fileType,
               'file_url'=>"upload/uploads/".$fileName,
               'file_url_public'=>public_path('upload\uploads')
            );

            return response()->json($response);
         
      } catch (\Throwable $th) { throw $th; }

   }  //! Post - File Upload Son

      
   //************* File Upload Multi ***************** */

   //! FileUpload Multi
   public function fileUploadMulti($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
             //echo "üye girişi oldu"; die();
 
             //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
 

            //! Çoklu Dil
            \Illuminate\Support\Facades\App::setLocale($site_lang);
            return view('admin/sabit/02_sabit_fileUploadMulti',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! FileUpload Multi Son

   //! Post - Çoklu File Upload
   public function fileUploadMultiControl(Request $request)
   {

      try {
         

         $request->validate([
            'files' => 'required',
         ]);
   
   
         //! Dosya Durumu
         $fileControl =false;
         $fileData =array(); //! Yeni Data
   
   
         if($request->hasfile('files'))
         {

            //! Dosya Durumu
            $fileControl = true;
            $fileCount = 0 ;
            $fileSizeTotalGeneral = 0 ; //! Toplam Boyut
            $fileCountSuccess = 0 ; //! Başarılı Olan Sayı

            //! Veri Tabanı Kayıt Yapma
            $fileWhere = $request->fileWhere;
            $fileDbSaveCheck = $request->fileDbSave;
            $fileDbSaveStatus = false;
   
            //! Dosyaları Alıyor
            foreach($request->file('files') as $file)
            {
                  //! Dosya Yükleme
                  $fileName=time().'.'.$file->getClientOriginalExtension(); //! Dosya Adı
                  //$fileName = time().'.'.$file->extension();
                  $file_status= $file->move(public_path('upload/uploads'), $fileName); //!  //! Dosya Yüklüyor

                  //! Dosya Türü
                  $fileExt = $file->getClientOriginalExtension(); //! Uzantısı
                  $fileType = $_FILES['files']['type'][$fileCount]; //! Türü
                  $fileType = explode('/',$fileType)[0]; //! Türü Ayırma - > Image
   
   
                  //! Dosya Boyutu
                  $fileSize = $_FILES['files']['size'][$fileCount];  //kb - Boyutu
                  $fileSize_kb = round($fileSize/1024,2);
                  $fileSize_mb = round($fileSize/1024/1024,2);
                  $fileSize_gb = round($fileSize/1024/1024/1024,2);

                  $fileSizeTotal = 0;
                  $fileSizeTotalType = 'kb';
   
                  if($fileSize_gb >= 1) {  $fileSizeTotal = $fileSize_gb;  $fileSizeTotalType = 'gb';   }
                  else if($fileSize_gb < 1) {
                     if($fileSize_mb >= 1) {  $fileSizeTotal = $fileSize_mb;  $fileSizeTotalType = 'mb';   }
                     else if($fileSize_mb < 1) {  $fileSizeTotal = $fileSize_kb;  $fileSizeTotalType = 'kb';   }
                  }
                  //! Dosya Boyutu Son


                    //! Sorun Yoksa
                    if($_FILES['files']['error'][$fileCount] == 0) {

                     $fileSizeTotalGeneral =  $fileSize + $fileSizeTotalGeneral ;  //! Toplam Boyut
                     $fileCountSuccess++; //! Başarılı Olan Sayı


                     //! Veri Tabanına Kayıt Yapma
                     if($fileDbSaveCheck == "true") {
              
               
                        $fileDbSaveStatus = DB::table('files')->insert([
                           'ServerId' => config('admin.ServerId'),
                           'ServerToken' => config('admin.ServerToken'),
                           'fileWhere'=> $fileWhere,
                           'fileName'=> $fileName,
                           'fileExt'=> $file->getClientOriginalExtension(),
                           'fileType'=> $fileType,
                           'fileOriginalName'=> $file->getClientOriginalName(),
                           'fileUploadUrl' => "upload/uploads/".$fileName,
                           'sizeByte' => $fileSize,
                           'sizeTotal' => $fileSizeTotal,
                           'sizeTotalType' => $fileSizeTotalType,
                           'created_byId' => (int)$_COOKIE["yildirimdev_userID"],
                        ]);
         
                      }  //! Veri Tabanına Kayıt Yapma Son

                  } //! Sorun Yoksa Son
   
   
                  if($file_status) {
   
                     //! Json içine kayıt yapıyor
                     $fileData[] =  array(
                        'file_upload_error'=> $_FILES['files']['error'][$fileCount],
                        'file_path'=>url('upload/uploads/'.$fileName),
                        'file_name'=>$fileName,
                        'file_originName'=>$file->getClientOriginalName(),
                        'file_size'=>array(
                              'sizeByte' => $fileSize,
                              'sizeTotal' => $fileSizeTotal,
                              'sizeTotalType' => $fileSizeTotalType
                        ),
                        'file_ext'=>$fileExt,
                        'file_type'=> $fileType,
                        'file_url'=>"upload/uploads/".$fileName,
                        'file_url_public'=>public_path('upload\uploads')
                     );
   
                  }
   
                  $fileCount++;
   
            }   //! Dosyaları Alıyor Son
         }
   
         
         $response = array(
            'status' => $fileControl ? 'success' : 'error',
            'userId' =>  (int)$_COOKIE["yildirimdev_userID"],
            'fileDbSaveCheck' => $fileDbSaveCheck,
            'fileDbSaveStatus' => $fileDbSaveStatus,
            'fileWhere' => $fileWhere,
            'fileControl' =>  $fileControl,
            'files' =>  $fileData,
            'fileCount' => $fileCount,
            'file_size' => $fileSizeTotalGeneral,
            'file_url'=>"upload/uploads/",
            'file_url_public'=>public_path('upload/uploads')
         );
   
         return response()->json($response);

      } catch (\Throwable $th) { throw $th; }

   }  //! Post - Çoklu File Upload Son

   
   //************* FileManager ***************** */

   //! Sabit
   public function fileManager($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
 

             //! Çoklu Dil
             \Illuminate\Support\Facades\App::setLocale($site_lang);
             return view('admin/fileManager',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! Sabit Son

   
   //************* Import ***************** */

   //! Import Json
   public function importJson()
   {

      try {

         $data ='';
         $fileUrl = 'assets/DB/user.json'; //! Dosya yeri

         //! Dosya Kontrol ediyor 
         if(is_file($fileUrl)){ $data = file_get_contents($fileUrl);  } //! Okuyor
         $json_arr = json_decode($data,true); //! Veri Json Çeviriyor
         
         //echo "<pre>";
         //print_r($json_arr); echo "<br/>";
         //echo $json_arr[0]["id"]; //! Tek Veri

         $response = array(
            'status' => 'success',
            'DB' => $json_arr
         );

         return response()->json($response); 

      } catch (\Throwable $th) { throw $th; }
      
   } //! Import Json Son


   //! Import Xml
   public function importXml()
   {

      try {

         $data ='';
         $fileUrl = 'assets/DB/test.xml'; //! Dosya yeri

         //! Dosya Kontrol ediyor 
         if(is_file($fileUrl)){ $data = file_get_contents($fileUrl); } //! Okuyor
         
         $xmlObject = simplexml_load_string($data); //! Xml Dosyası Okuma

         $json = json_encode($xmlObject); 
         $DB = json_decode($json, true); //! Dosya Array Çevirme 

         // echo "<pre>";
         // print_r($phpArray); //! Tümü Göster
         //print_r($phpArray["data"]); //! Tek Array

         // echo "Veri Sayısı:";  echo count($phpArray["DATA"]);  echo "<br>"; //! Tek Veri
         // echo "Tek Veri:";  echo $phpArray["DATA"][0]["Id"]; echo "<br>";  //! Tek Veri


         $response = array(
            'status' => 'success',
            'DB' => $DB
         );

         return response()->json($response); 

      } catch (\Throwable $th) { throw $th; }
      
   } //! Import Xml Son


   //! Export Pdf
   public function exportPdf($site_lang="tr")
   {

      try {

         //! Tanım
         $yildirimdev_userCheck = 0;
         $yildirimdev_userID = "";
         $yildirimdev_name = "";
         $yildirimdev_surname = "";
         $yildirimdev_img_url = "";
 
         //? Cookie Varmı
         if(isset($_COOKIE["yildirimdev_userCheck"])) {

            $yildirimdev_userCheck = $_COOKIE["yildirimdev_userCheck"];
            $yildirimdev_userID=$_COOKIE["yildirimdev_userID"]; //! id
            $yildirimdev_name=$_COOKIE["yildirimdev_name"]; //! name
            $yildirimdev_surname=$_COOKIE["yildirimdev_surname"]; //! surname
            $yildirimdev_img_url=$_COOKIE["yildirimdev_img_url"]; //! imgUrl
            $yildirimdev_departman=$_COOKIE["yildirimdev_departman"]; //! departman

            //echo "yildirimdev_userID ccokie:"; echo $yildirimdev_userID; die();
            
         }
       
 
         if($yildirimdev_userCheck ) {
            //echo "üye girişi oldu"; die();
 
            //! Return
            $DB["userId"] =  $yildirimdev_userID;
            $DB["name"] =  $yildirimdev_name;
            $DB["surname"] =  $yildirimdev_surname;
            $DB["role"] =   $yildirimdev_departman;
            $DB["userImageUrl"] =  $yildirimdev_img_url;
 

             //! Çoklu Dil
             \Illuminate\Support\Facades\App::setLocale($site_lang);
             return view('admin/sabit/03_sabit_export_pdf',$DB);
         }
         else {
             //echo "üye giriş yapınız"; die();
             return redirect('user/login');
         }
 
     } catch (\Throwable $th) {  throw $th; }
   } //! Export Pdf Son


   //************* Ajax ***************** */

   //! Get
   public function ajaxFunctionExampleGet()
   {
      $response = array(
         'status' => 'success',
         'ajaxStatus' => 'get'
      );

      return response()->json($response); 
   } //! Get Son


   //! Ajax - Post
   public function ajaxFunctionExamplePost(Request $request)
   {
     
      $siteLang= $request->siteLang; //! Çoklu Dil
      \Illuminate\Support\Facades\App::setLocale($siteLang); //! Çoklu Dil

      try {
        

         $user_name = $request->name;

         $response = array(
            'status' => 'success',
            'msg' => __('admin.TransactionSuccessful'),
            'post' => $request->all(),
            'user_name' => $request->name,
         );

         return response()->json($response);

      } catch (\Throwable $th) {
        
         $user_name = $request->name;

         $response = array(
            'status' => 'error',
            'msg' => $th,
         );

         return response()->json($response);
      }

   } //! Ajax - Post Son



   //! **************** Api ****************

   //! Get Api
   public function apiGet()
   {

      //url
      //$url="http://localhost:3002/api/file/all";
      $url = config('admin.Api_Url').'/api/file/all'; //! Api Adresi 
      echo 'url:'; echo $url; echo "<br/>";

      //aç
      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, $url);
      // SSL important
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_POST, 0);


      //veri okunuyor
      $output = curl_exec($curl);

      //sorun varsa
      if($e=curl_error($curl))
      {
         echo $e;
      }
      else
      {
         // Json verisine dönüştür
         //array oluştur
         $decoded=json_decode($output,true);
         //print_r($decoded);

         //okuma * dönüştürme işlemleri
         $title=$decoded["title"];
         $table=$decoded["table"];
         $status=$decoded["status"];
         //$created_at=$decoded["created_at"];

         //iç içe json
         //echo "<br>"; print_r($decoded["DB"]);  echo "<br>";  echo "<br>";
         $data_sayisi=count($decoded["DB"]);
         $data_id=$decoded["DB"][0]["id"];
         //$data_id=$decoded["DB"]["id"];

         //Ekran Çıktısı
         echo  "Veri Çekiyor";
         echo "<br>";
         echo  "title: ".$title;
         echo "<br>";
         echo  "data - id : ".$data_id;
      }

      //kapat
      curl_close($curl);

   }   //! Get Api

   
   //! Post Api
   public function apiPost()
   {
  
       //url
      //$url="http://localhost:3002/api/file/find_post";
      $url = config('admin.Api_Url').'/api/file/find_post'; //! Api Adresi 
      echo 'url:'; echo $url; echo "<br/>";

      //Eklenecek Veriler
      $data_array=array
      (
            'id' => 2
      );

      $data=http_build_query($data_array);
      $headers = array("Content-Type" => "application/json");

      $curl = curl_init();  //! Curl Başlatıyor
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

      curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($curl, CURLOPT_TIMEOUT, 30);


      $output = curl_exec($curl); //! Veri Okunuyor
      //echo $output;  echo "<br>";   echo "<br>";   //! Curl Request

      $decoded = "";

      //sorun varsa
      if($e=curl_error($curl)) { echo $e; }
      else
      {
         // Json verisine dönüştür
         //array oluştur
         $decoded=json_decode($output,true);
         //print_r($decoded);

         //okuma * dönüştürme işlemleri
         $title=$decoded["title"];
         $table=$decoded["table"];
         $status=$decoded["status"];
         //$created_at=$decoded["created_at"];

         //iç içe json
         //echo "<br>"; print_r($decoded["DB"]);  echo "<br>";  echo "<br>";
         $data_sayisi=count($decoded["DB"]);
         //$data_id=$decoded["DB"][0]["id"];
         $data_id=$decoded["DB"]["id"];

         //Ekran Çıktısı
         echo  "Veri Çekiyor";
         echo "<br>";
         echo  "title: ".$title;
         echo "<br>";
         echo  "data - id : ".$data_id;

      }

       //kapat
       curl_close($curl);


   }   //! Post Api


   //************* Hata Sayfaları ***************** */
  
   //! errorAccountBlock
   public function errorAccountBlock($site_lang="tr")
   {
      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/errorAccountBlock');
   } //! errorAccountBlock Son


   //! error500
   public function error500($site_lang="tr")
   {
      \Illuminate\Support\Facades\App::setLocale($site_lang); //! Çoklu Dil
      return view('admin/error500');
   } //! error500 Son

   
}
