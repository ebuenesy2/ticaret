<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabit | Form </title>
</head>
<body>
    
      <h1> Sabit Form Sayfası </h1>


      <!------- Sabit Form ----------->
      <form action="{{route('sabit.form.control')}}" method="post" class="c-card__body" >
        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
        <input name="siteLang" type="hidden" value= "@lang('admin.lang')" />
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="email">@lang('admin.email')</label> 
            <input class="c-input" type="email" id="email" name="email"  placeholder="info@email.com"> 
        </div>

        <div class="c-field u-mb-small">
            <label class="c-field__label" for="password">@lang('admin.password')</label> 
            <input class="c-input" type="password" id="password" name="password" placeholder="@lang('admin.enterUrPassword')"> 
        </div>

        <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">@lang('admin.login')</button>
            
      </form>

      <!------- Sabit Form Son ----------->

</body>
</html>