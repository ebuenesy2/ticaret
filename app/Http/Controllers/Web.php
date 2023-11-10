<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB; //Veri Tabanı İşlemleri


//! Zaman
use Carbon\Carbon;
Carbon::now('Europe/Istanbul');
Carbon::setLocale('tr');
//! Zaman Son

class Web extends Controller
{
    
  //************* Test ***************** */

  //! Test
  public function Test()
  {
    
    echo "web test"; echo "<br/>";
     
  } //! Test Son


  //! Test View
  public function TestView()
  {
    
    //echo "test view"; echo "<br/>";

    return view('web/test');
      
  } //! Test View Son
  
  
  
  //************* Web ***************** */

   //! Index
  public function Index()
  {

     return view('web/index');
  } //! Index Son
    
}
