<?php $transLang = app('translator')->get('admin');  //! Dil Çevirme  ?>
<?php $transLangObject_key= array_keys($transLang); //! Dil Anahtar  ?>

@for ($i = 0; $i < count($transLangObject_key); $i++)
     <p style="display:none" id="lang_change" data_key="{{$transLangObject_key[$i]}}" > {{$transLang[$transLangObject_key[$i]]}} </p>
@endfor