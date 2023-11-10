<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Anasayfa | {{ config('admin.Web_Title') }} </title>
</head>
<body>
  

  <h1> Web Anasayfa </h1>
  
  <a href="admin">Admin</a>
  
  <p> Api : {{ config('admin.Api_Url') }} </p> 

   

   @include('web.include.header')
  
</body>
</html>