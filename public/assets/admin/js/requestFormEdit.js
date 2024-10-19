$(function () {

    //alert("sabit");
    //console.log("js çalışıyor");

    document.querySelectorAll("#unitPriceEdit").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! Ürün Fiyat
    document.querySelectorAll("#countEdit").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! Ürün Fiyat

    //! Hesaplama
    function general() {
        var unitPriceEdit = $('#unitPriceEdit').val().trim().replace(',','.'); //! Birim adet
        var countEdit = $('#countEdit').val().trim().replace(',','.'); //! Sayısı

        var total = parseFloat(unitPriceEdit)*parseFloat(countEdit); //! Toplam Fiyat
        var total = total.toFixed(2); //! Anlamlı
        $('#totalEdit').val(total);
    }
    //! Hesaplama Son

    //! Public
    document.querySelectorAll("#VisibilityEdit").forEach(function (i) { i.addEventListener("change", function (event) { publicControl(); }); }); //! Public Değişiklik
    document.querySelectorAll("#requestVisibilityEdit").forEach(function (i) { i.addEventListener("change", function (event) { reqPublicControl(); }); }); //! Public Değişiklik

    function publicControl() {

        var VisibilityEdit = $('#VisibilityEdit').val();
        if(Number(VisibilityEdit) == 1 || Number(VisibilityEdit) == 2 ) { $('#publicRow').css('display','block'); }
        else { $('#publicRow').css('display','none'); }
    }
    function reqPublicControl() {

        var VisibilityEdit = $('#requestVisibilityEdit').val();
        if(VisibilityEdit == "1") { $('#reqPublicRow').css('display','block'); }
        else { $('#reqPublicRow').css('display','none'); }
    }

    $('#copy_text').click(function () {
        var metin = $('#public_url').val(); //! Okuma
        navigator.clipboard.writeText(metin); //! Kopyala
        alert("Kopyalandı");
    });

    $('#request_copy_text').click(function () {
        var metin = $('#request_public_url').val(); //! Okuma
        navigator.clipboard.writeText(metin); //! Kopyala
        alert("Kopyalandı");
    });

    publicControl();  //! Fonksiyon Kullan
    reqPublicControl(); //! Fonksiyon Kullan

    //! Public Son


        //! ************ Değişimler  ***************
        //! Arama Kategori Add
        document.querySelector('#sectorAdd').addEventListener('change', e => {

            var selectType = $('#sectorAdd').val();

            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SectorNotSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                //! Ajax  Post
                $.ajax({
                    url: "/category/sub/type/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:$('#sectorAdd option[value="'+selectType+'"]').attr('data_id')
                    },
                    // beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        //console.log("response:", response);
                        // console.log("status:", response.status);

                        var selectTitle = $('html').attr('lang') == "en" ? 'Select Title' : 'Başlık Seç';
                        var optionSelect = '<option value="">'+ selectTitle +'</option>';
                        for (let index = 0; index < response.DB.length; index++) {  var title = $('html').attr('lang') == "en" ?  response.DB[index].title_EN :  response.DB[index].title;
                            optionSelect+='<option id="typeId" data_title="'+response.DB[index].title+'" data_codeLet="'+response.DB[index].codeLet+'"  value="'+response.DB[index].id+'"  >'+ title +'</option>';
                        }

                        $('#selectSubCategoryAdd').html(optionSelect);

                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {

                        // //! Görünürlük Kontrolleri
                        // $('#LoadingFileUploadSearch').css('display','none');
                        // $('#ModalBodyInfoSearch').css('display','block');

                        // console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son

            }


        }); //! Arama Kategori Add Son


        //! Arama Kategori Edit
        document.querySelector('#sectorEdit').addEventListener('change', e => {

            var selectType = $('#sectorEdit').val();

            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SectorNotSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                //! Ajax  Post
                $.ajax({
                    url: "/category/sub/type/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:$('#sectorEdit option[value="'+selectType+'"]').attr('data_id')
                    },
                    // beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        //console.log("response:", response);
                        // console.log("status:", response.status);

                        var selectTitle = $('html').attr('lang') == "en" ? 'Select Title' : 'Başlık Seç';
                        var optionSelect = '<option value="">'+ selectTitle +'</option>';
                        for (let index = 0; index < response.DB.length; index++) {  var title = $('html').attr('lang') == "en" ?  response.DB[index].title_EN :  response.DB[index].title;
                            optionSelect+='<option id="typeId" data_title="'+response.DB[index].title+'" data_codeLet="'+response.DB[index].codeLet+'"  value="'+response.DB[index].id+'"  >'+ title +'</option>';
                        }

                        $('#selectSubCategoryEdit').html(optionSelect);

                        //! response.DB.title

                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {

                        // //! Görünürlük Kontrolleri
                        // $('#LoadingFileUploadSearch').css('display','none');
                        // $('#ModalBodyInfoSearch').css('display','block');

                        // console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son

            }


        }); //! Arama Kategori Edit Son


        //! Arama Alt Kategori Add
        document.querySelector('#selectSubCategoryAdd').addEventListener('change', e => {

            var selectType = $('#selectSubCategoryAdd').val();

            $('#stockAdd option[value=""]').prop('selected', true); //! Seçim yap
            document.querySelectorAll('[id=stockAddOption]').forEach(function(el) { el.style.display="none" });
            document.querySelectorAll('[id=stockAddOption][data_sub_sector="'+selectType+'"]').forEach(function(el) { el.style.display="block" });

        }); //! Arama Alt Kategori Add Son

        //! Arama Alt Kategori Add
        document.querySelector('#selectSubCategoryEdit').addEventListener('change', e => {

            var selectType = $('#selectSubCategoryEdit').val();

            $('#stockEdit option[value=""]').prop('selected', true); //! Seçim yap
            document.querySelectorAll('[id=stockEditOption]').forEach(function(el) { el.style.display="none" });
            document.querySelectorAll('[id=stockEditOption][data_sub_sector="'+selectType+'"]').forEach(function(el) { el.style.display="block" });

        }); //! Arama Alt Kategori Add Son

        //! Arama Stok Add
        document.querySelector('#stockAdd').addEventListener('change', e => {

            var selectType = $('#stockAdd').val();

            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SelectStockUnit]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (selectType == "newStock") {

                //! Select
                var sectorAdd =  $('#sectorAdd').val();
                var selectSubCategoryAdd =  $('#selectSubCategoryAdd').val();

                var sectorCode = $('#sectorAdd option[value='+sectorAdd+']').attr('data_codeLet');
                var sub_sectorCode = $('#selectSubCategoryAdd option[value='+selectSubCategoryAdd+']').attr('data_codeLet');
                var stockNumber = $('#product_add_item').attr('data_stockNumber');

                var StockCode = sectorCode+"-"+sub_sectorCode+"-"+stockNumber;
                var accountingCode_buy = "153"+"."+stockNumber;
                var accountingCode_sel = "610"+"."+stockNumber;

                $('#StockCodeAdd').val(StockCode);
                $('#accountingCodeBuyAdd').val(accountingCode_buy);
                $('#accountingCodeSelAdd').val(accountingCode_sel);

            }
            else {

                var productIDSearch = $('#stockAdd').val();

                //! Ajax  Post
                $.ajax({
                    url: "/stock/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(productIDSearch)
                    },
                    // beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        //console.log("response:", response);
                        // console.log("status:", response.status);


                        $('#stockEdit option[value="'+response.DB.stock_id+'"]').prop('selected', true); //! Seçim yap
                        document.querySelectorAll('[id=stockEditOption]').forEach(function(el) { el.style.display="none" });
                        document.querySelectorAll('[id=stockEditOption][data_sub_sector="'+response.DB.sub_sector+'"]').forEach(function(el) { el.style.display="block" });

                        $('#nameTrAdd').val(response.DB.nameTr);
                        $('#nameEnAdd').val(response.DB.nameEn);

                        $('#StockCodeAdd').val(response.DB.stockCode);
                        $('#accountingCodeBuyAdd').val(response.DB.accountingCode_buy);
                        $('#accountingCodeSelAdd').val(response.DB.accountingCode_sel);


                        //! Dosya - Resim
                        if(response.DB.imgUrl != "" ) {
                            $('#filePathUrlEdit').html(response.DB.imgUrl);

                            $('#productViewImageAdd').css('display','block');
                            $('#productViewImageAdd').attr("src",'/'+response.DB.imgUrl);

                            $('#product_dowloand_imgAdd').css('display','block');
                            $('#product_dowloand_imgAdd').attr("href",'/'+response.DB.imgUrl);
                            $('#product_dowloand_imgAdd').attr("download",'/'+response.DB.imgUrl);
                        }
                        else if(response.DB.imgUrl == "" ) {
                            $('#productViewImageAdd').css('display','none');
                            $('#product_dowloand_imgAdd').css('display','none');
                        }

                        if(response.DB.techFileUrl != "" && response.DB.techFileUrl != null ) {

                            //! Dosya - Teknik
                            $('#filePathUrltechnicalFile').html(response.DB.techFileUrl);

                            $('#product_dowloand_fileAdd').css('display','block');
                            $('#product_dowloand_fileAdd').attr("href",'/'+response.DB.techFileUrl);
                            $('#product_dowloand_fileAdd').attr("download",'/'+response.DB.techFileUrl);
                        }
                        else if(response.DB.techFileUrl == "" || response.DB.techFileUrl == null ) {
                            $('#product_dowloand_fileAdd').css('display','none');
                        }

                        $('#SelectStockUnitAdd option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                        $('#StockCountAdd').val(response.DB.stockCount);
                        //$('#SelectCurrencyAdd option[value='+response.DB.currency+']').prop('selected',true); //! Select
                        $('#PriceAdd').val(response.DB.price);

                        $('#kdv_buyAdd').val(response.DB.kdv_buy);
                        $('#kdv_sellAdd').val(response.DB.kdv_sell);


                        if(response.DB.export_registered =="true" ) {
                            $("input[name='export_registeredAdd']").prop('checked', true);

                            $('#export_registered_kdv_buyAdd').attr('disabled',false)
                            $('#export_registered_kdv_sellAdd').attr('disabled',false)

                            $('#export_registered_kdv_buyAdd').val(response.DB.export_registered_kdv_buy);
                            $('#export_registered_kdv_sellAdd').val(response.DB.export_registered_kdv_sell);
                        }

                        if(response.DB.export_registered !="true" ) {
                            $("input[name='export_registeredAdd']").prop('checked', false);

                            $('#export_registered_kdv_buyAdd').attr('disabled',true)
                            $('#export_registered_kdv_sellAdd').attr('disabled',true)

                            $('#export_registered_kdv_buyAdd').val("");
                            $('#export_registered_kdv_sellAdd').val("");
                        }


                        $('#descriptionTRAdd').val(response.DB.descriptionTr);
                        $('#descriptionENAdd').val(response.DB.descriptionEn);

                        $('#featuresTRAdd').val(response.DB.featuresTr);
                        $('#featuresENAdd').val(response.DB.featuresEn);

                        $('#tech_featuresTRAdd').val(response.DB.tech_featuresTr);
                        $('#tech_featuresENAdd').val(response.DB.tech_featuresEn);

                        $('#webSiteAdd').val(response.DB.web_address);
                        $('#catalogLinkAdd').val(response.DB.catalogLink);
                        $('#gtipNoAdd').val(response.DB.gtipNo);

                        $('#productModelAdd').val(response.DB.productModel);
                        $('#productCodeAdd').val(response.DB.productCode);
                        $('#is_warrantyAdd option[value='+response.DB.is_warranty+']').prop('selected',true); //! Select
                        $('#warrantyTimeAdd').val(response.DB.warrantyTime);

                        $('#setupAdd option[value='+response.DB.setup+']').prop('selected',true); //! Select
                        $('#brandAdd').val(response.DB.brand);
                        $('#colorCodeAdd').val(response.DB.colorCode);

                        $('#productUsePurposeTRAdd').val(response.DB.productUsePurposeTR);
                        $('#productUsePurposeENAdd').val(response.DB.productUsePurposeEN);

                        $('#ownBrandAdd').val(response.DB.ownBrand);
                        $('#specialDesignAdd').val(response.DB.specialDesign);
                        $('#specialPacketAdd').val(response.DB.specialPacket);
                        $('#salesOutletAdd').val(response.DB.salesOutlet);

                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingFileUploadSearch').css('display','none');
                        $('#ModalBodyInfoSearch').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son

            }


        }); //! Arama Stok Add Son

        //! Arama Stok Edit
        document.querySelector('#stockEdit').addEventListener('change', e => {

            var selectType = $('#stockEdit').val();

            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SelectStockUnit]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                var productIDSearch = $('#stockEdit').val();

                //! Ajax  Post
                $.ajax({
                    url: "/stock/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(productIDSearch)
                    },
                    beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        console.log("response:", response);
                        // console.log("status:", response.status);


                        $('#stockEdit option[value="'+response.DB.stock_id+'"]').prop('selected', true); //! Seçim yap
                        document.querySelectorAll('[id=stockEditOption]').forEach(function(el) { el.style.display="none" });
                        document.querySelectorAll('[id=stockEditOption][data_sub_sector="'+response.DB.sub_sector+'"]').forEach(function(el) { el.style.display="block" });

                        $('#nameTrEdit').val(response.DB.nameTr);
                        $('#nameEnEdit').val(response.DB.nameEn);

                        $('#StockCodeEdit').val(response.DB.stockCode);
                        $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                        $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);


                        //! Dosya - Resim
                        if(response.DB.imgUrl != "" ) {
                            $('#filePathUrlEdit').html(response.DB.imgUrl);

                            $('#productViewImage').css('display','block');
                            $('#productViewImage').attr("src",'/'+response.DB.imgUrl);

                            $('#product_dowloand_img').css('display','block');
                            $('#product_dowloand_img').attr("href",'/'+response.DB.imgUrl);
                            $('#product_dowloand_img').attr("download",'/'+response.DB.imgUrl);
                        }
                        else if(response.DB.imgUrl == "" ) {
                            $('#productViewImage').css('display','none');
                            $('#product_dowloand_img').css('display','none');
                        }

                        if(response.DB.techFileUrl != "" && response.DB.techFileUrl != null ) {

                            //! Dosya - Teknik
                            $('#filePathUrltechnicalFileEdit').html(response.DB.techFileUrl);

                            $('#product_dowloand_file').css('display','block');
                            $('#product_dowloand_file').attr("href",'/'+response.DB.techFileUrl);
                            $('#product_dowloand_file').attr("download",'/'+response.DB.techFileUrl);
                        }
                        else if(response.DB.techFileUrl == "" || response.DB.techFileUrl == null ) {
                            $('#product_dowloand_file').css('display','none');
                        }

                        $('#SelectStockUnitEdit option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                        $('#StockCountEdit').val(response.DB.stockCount);
                        $('#SelectCurrencyEdit option[value='+response.DB.currency+']').prop('selected',true); //! Select
                        $('#PriceEdit').val(response.DB.price);

                        $('#kdv_buyEdit').val(response.DB.kdv_buy);
                        $('#kdv_sellEdit').val(response.DB.kdv_sell);


                        if(response.DB.export_registered =="true" ) {
                            $("input[name='export_registeredEdit']").prop('checked', true);

                            $('#export_registered_kdv_buyEdit').attr('disabled',false)
                            $('#export_registered_kdv_sellEdit').attr('disabled',false)

                            $('#export_registered_kdv_buyEdit').val(response.DB.export_registered_kdv_buy);
                            $('#export_registered_kdv_sellEdit').val(response.DB.export_registered_kdv_sell);
                        }

                        if(response.DB.export_registered !="true" ) {
                            $("input[name='export_registeredEdit']").prop('checked', false);

                            $('#export_registered_kdv_buyEdit').attr('disabled',true)
                            $('#export_registered_kdv_sellEdit').attr('disabled',true)

                            $('#export_registered_kdv_buyEdit').val("");
                            $('#export_registered_kdv_sellEdit').val("");
                        }


                        $('#descriptionTREdit').val(response.DB.descriptionTr);
                        $('#descriptionENEdit').val(response.DB.descriptionEn);

                        $('#featuresTREdit').val(response.DB.featuresTr);
                        $('#featuresENEdit').val(response.DB.featuresEn);

                        $('#tech_featuresTREdit').val(response.DB.tech_featuresTr);
                        $('#tech_featuresENEdit').val(response.DB.tech_featuresEn);

                        $('#webSiteEdit').val(response.DB.web_address);
                        $('#catalogLinkEdit').val(response.DB.catalogLink);
                        $('#gtipNoEdit').val(response.DB.gtipNo);

                        $('#productModelEdit').val(response.DB.productModel);
                        $('#productCodeEdit').val(response.DB.productCode);
                        $('#is_warrantyEdit option[value='+response.DB.is_warranty+']').prop('selected',true); //! Select
                        $('#warrantyTimeEdit').val(response.DB.warrantyTime);

                        $('#setupEdit option[value='+response.DB.setup+']').prop('selected',true); //! Select
                        $('#brandEdit').val(response.DB.brand);
                        $('#colorCodeEdit').val(response.DB.colorCode);

                        $('#productUsePurposeTREdit').val(response.DB.productUsePurposeTR);
                        $('#productUsePurposeENEdit').val(response.DB.productUsePurposeEN);

                        $('#ownBrandEdit').val(response.DB.ownBrand);
                        $('#specialDesignEdit').val(response.DB.specialDesign);
                        $('#specialPacketEdit').val(response.DB.specialPacket);
                        $('#salesOutletEdit').val(response.DB.salesOutlet);

                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingFileUploadSearch').css('display','none');
                        $('#ModalBodyInfoSearch').css('display','block');

                        console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son

            }


        }); //! Arama Stok Edit Son


        //İhraç Kayıtlı Add
        $('input[type="checkbox"][name="export_registeredAdd"]').click(function () {

            //! Seçili ise
            var this_check = $(this).is(":checked"); //! Check Durumu - true/false
            if(this_check) {
                $('#export_registered_kdv_buyAdd').attr('disabled',false);
                $('#export_registered_kdv_sellAdd').attr('disabled',false);
            }
            else {
                $('#export_registered_kdv_buyAdd').attr('disabled',true);
                $('#export_registered_kdv_sellAdd').attr('disabled',true);
            }

        }); //İhraç Kayıtlı Add Son


        //İhraç Kayıtlı Edit
        $('input[type="checkbox"][name="export_registeredEdit"]').click(function () {

            //! Seçili ise
            var this_check = $(this).is(":checked"); //! Check Durumu - true/false
            if(this_check) {
                $('#export_registered_kdv_buyEdit').attr('disabled',false);
                $('#export_registered_kdv_sellEdit').attr('disabled',false);
            }
            else {
                $('#export_registered_kdv_buyEdit').attr('disabled',true);
                $('#export_registered_kdv_sellEdit').attr('disabled',true);
            }

        }); //İhraç Kayıtlı Edit Son


        //! ************ Değişimler Son ***************

        //! Birim Fiyat
        $('#UnitPriceAdd').keyup(function(){
            //console.log("yazıyor...");

            $val = $(this).val(); //!  Birim Fiyat
            $unitPrice = $('#PieceAdd').val(); //! Sayısı

            $return = Number($val.replace(',','.'))*Number($unitPrice); //! Toplam
            $return = $return.toFixed(2); //! Anlamlı Sayı
            $('#totalAdd').html($return); //! Toplam Göster

        });
        //! Birim Fiyat Son

        //! Sayısı
        $('#PieceAdd').keyup(function(){
            //console.log("yazıyor...");


            $val = $('#PieceAdd').val(); //! Sayısı
            $unitPrice = $('#UnitPriceAdd').val(); //! Sayısı

            $return = Number($unitPrice.replace(',','.'))*Number($val); //! Toplam
            $return = $return.toFixed(2); //! Anlamlı Sayı
            $('#totalAdd').html($return); //! Toplam Göster


        });
        //! Sayısı Son

        //! Ürün Ekleme
        $("#product_add_item").click(function (e) {
            e.preventDefault();

            //! Select
            var sectorAdd =  $('#sectorAdd').val();
            var selectSubCategoryAdd =  $('#selectSubCategoryAdd').val();
            var stockAdd =  $('#stockAdd').val();

            var nameTrAdd =  $('#nameTrAdd').val();
            var nameEnAdd =  $('#nameEnAdd').val();

            var SelectStockUnitAdd =  $('#SelectStockUnitAdd').val();
            var SelectCurrencyAdd =  $('#SelectProductCurrencyAdd').val(); //! Para Birimi


            if(sectorAdd == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SectorNotSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(selectSubCategoryAdd == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NoSubSectorSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(stockAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=StockNotSelected]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
            }
            else if( nameTrAdd == "" ) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameTRNotWritten]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
            }
            else if(nameEnAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameEnNotWritten]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
            }
            else if( nameTrAdd == "" ) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameTRNotWritten]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
            }
            else if( nameEnAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameEnNotWritten]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
            }
            else  if(SelectStockUnitAdd == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=SelectStockUnit]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });

            }
            else {

            $val = $('#StockCountAdd').val(); //! Sayısı
            $unitPrice = $('#PriceAdd').val(); //! Birim Fiyat

            $total = Number($unitPrice.replace(',','.'))*Number($val); //! Toplam
            $total = $total.toFixed(2); //! Anlamlı Sayı

            //! Id
            var data_id_req =  $('#edit_item').attr('data_id');

            //! Ajax
            $.ajax({
                url: "/request/form/product/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    requestform_id: Number(data_id_req),
                    sector: $('#sectorAdd').val(),
                    sub_sector: $('#selectSubCategoryAdd').val(),
                    stock_id: $('#stockAdd').val(),

                    codeNumber: $('#product_add_item').attr('data_stockNumber'),
                    stockCode: $('#StockCodeAdd').val(),
                    accountingCode_buy: $('#accountingCodeBuyAdd').val(),
                    accountingCode_sel: $('#accountingCodeSelAdd').val(),

                    nameTr: $('#nameTrAdd').val(),
                    namePublic: $('#namePublicAdd').val(),
                   
                    imgUrl: $('#filePathUrl').html(),
                    techFileUrl: $('#filePathUrltechnicalFile').html(),

                    stockUnit: $('#SelectStockUnitAdd').val(),
                    stockCount: $('#StockCountAdd').val(),

                    //currency: $('#SelectProductCurrencyAdd').val(),
                    price: $('#PriceAdd').val(),
                    total: $total,

                    kdv_buy: $('#kdv_buyAdd').val(),
                    kdv_sell: $('#kdv_sellAdd').val(),

                    export_registered: $('#export_registeredAdd').is(':checked'),
                    export_registered_kdv_buy: $('#export_registered_kdv_buyAdd').val(),
                    export_registered_kdv_sell: $('#export_registered_kdv_sellAdd').val(),

                    descriptionTr: $('#descriptionTRAdd').val(),
                    descriptionEn: $('#descriptionENAdd').val(),

                    featuresTr: $('#featuresTRAdd').val(),
                    featuresEn: $('#featuresENAdd').val(),

                    tech_featuresTr: $('#tech_featuresTRAdd').val(),
                    tech_featuresEn: $('#tech_featuresENAdd').val(),

                    web_address: $('#webSiteAdd').val(),
                    catalogLink: $('#catalogLinkAdd').val(),
                    gtipNo: $('#gtipNoAdd').val(),

                    productModel:  $('#productModelAdd').val(),
                    productCode:  $('#productCodeAdd').val(),
                    is_warranty:  $('#is_warrantyAdd').val(),
                    warrantyTime:  $('#warrantyTimeAdd').val(),

                    setup:  $('#setupAdd').val(),
                    brand:  $('#brandAdd').val(),
                    colorCode:  $('#colorCodeAdd').val(),

                    productUsePurposeTR:  $('#productUsePurposeTRAdd').val(),
                    productUsePurposeEN:  $('#productUsePurposeENAdd').val(),

                    ownBrand:  $('#ownBrandAdd').val(),
                    specialDesign:  $('#specialDesignAdd').val(),
                    specialPacket:  $('#specialPacketAdd').val(),
                    salesOutlet:  $('#salesOutletAdd').val(),

                    isActive: stockAdd == "newStock" ? false : true,
                    created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                },
                success: function (response) {
                    // alert("başarılı");
                    //console.log("response eklendi:", response);
                    // console.log("status:", response.status);

                    if (response.status == "success") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000,
                        });

                        //! Product Liste Güncelle
                        productListUpdate(response.DB_Product,response.DB_Find_Product_Ret_Count,response.DB_Find_Product_TotalPayment);

                        //! Modal Temizleme
                        $("#Add_ProductForm")[0].reset();

                        //! Ürün Resmi
                        $('#productViewImageAdd').css('display','none');
                        $('#product_dowloand_imgAdd').css('display','none');
                        $('#filePathUrl').html("");

                        //! Teknik Resim
                        $('#product_dowloand_fileAdd').css('display','none');
			            $('#filePathUrltechnicalFile').html("");

                        //! Progresbar
                        $("#progressBarFileUpload").width('0%');
                        $("#progressBarFileUploadtechnical").width('0%');

                        //! Modal Kapatma
                        $("#Add_ProductModal").modal('hide');

                        //! Sayfa Yenileme
                        //window.location.reload();
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                },
                error: function (error) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    console.log("error:", error);
                },
            }); //! Ajax Son

            }

        });
        //! Ürün Ekleme Son

        //! Product Listesi
        function productListUpdate(data,DB_Find_Product_Ret_Count,DB_Find_Product_TotalPayment) {
            // console.log("data:",data);
            // console.log("DB_Find_Product_Ret_Count:",DB_Find_Product_Ret_Count);
            // console.log("DB_Find_Product_TotalPayment:",DB_Find_Product_TotalPayment);

            if(DB_Find_Product_Ret_Count == 0 ) { $('#product_RetCart').css('visibility','hidden'); }
            else { $('#product_ret_count').html(4); }

            var returnData ="";

            for (let index = 0; index < data.length; index++) {
                const element = data[index];

                returnData +='<tr id="'+data[index].id+'" class="product">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start">';
                returnData +='<div class="mb-2">';

                if(data[index].isActive == 0) {  returnData +='<div style="display:block"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }
                else if(data[index].isActive == 1 ) {  returnData +='<div style="display:none"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }

                returnData +='<input type="text" class="form-control bg-light border-0" id="productName-1"  value="'+data[index].nameTr+'" readonly="readonly" >';
                returnData +='</div>';
                returnData +='<textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" readonly="readonly"  >'+data[index].descriptionTr +'</textarea>';
                returnData +=' </td>';
                returnData +='<td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="'+Number(index+1)+'" step="0.01" placeholder="0.00" value="'+data[index].price+'" readonly="readonly" ></td>';
                returnData +=' <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="'+Number(index+1)+'" value="'+data[index].stockCount+'"  readonly="readonly" > </div> </td>';
                returnData +='<td class="text-end" id="DB_Find_Product_stockUnit"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productStockUnit" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].stockUnit+'" readonly="" > </div> </td>';
                returnData +='<td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].total+'" readonly="" > </div> </td>';
                returnData +='<td class="text-end" >';
                returnData +='        <button class="btn btn-danger waves-effect waves-light" style="width: 45px;height: 45px; color:white;" id="listItemDelete" onClick="DeleteItem('+data[index].id+')" data-id="'+data[index].id+'" > <a  class="text-white d-inline-block remove-item-btn" ><i id="listItemDelete" data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i> </a> </button> ';
                returnData +='        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Edit_ProductModal" data-id="'+data[index].id+'" ><i    class=" ri-edit-2-fill fs-16"></i></button> ';
                returnData +='  </td>';

                returnData +=' </tr>';

            }

            $('#productTable').html(returnData);
            $('#productTotalPayment').val(DB_Find_Product_TotalPayment);

            //! Ürün Durumları
            if(DB_Find_Product_Ret_Count > 0) { $('#product_RetCart').css('display','block'); $('#product_ret_count').html(DB_Find_Product_Ret_Count);  }
            else if(DB_Find_Product_Ret_Count == 0) { $('#product_RetCart').css('display','none'); }


        } //! Product Listesi Son


        //! ************ Silme  ***************
        document.querySelectorAll("#listItemDelete").forEach(function (i) {
            i.addEventListener("click", function (event) {
                //! Attr - Diğer Veri Alma
                var data_id = event.target.getAttribute("data_id");

                //! Return
                //console.log("data_id:", data_id);

                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4><p>'+$('[id=lang_change][data_key=DeleteWarning]').html().trim()+'</p><p class="text-muted mx-4 mb-0">#'+data_id+'</p></div></div>',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: $('[id=lang_change][data_key=Delete]').html().trim(),
                    cancelButtonColor: '#cadetblue',
                    cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
                }).then((result) => {
                    if (result.isConfirmed) {

                        //! Ajax
                        $.ajax({
                            url: "/request/form/product/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                requestform_id: $('#edit_item').attr('data_id'),
                            },
                            success: function (response) {
                                // alert("başarılı");
                                // console.log("response:", response);
                                // console.log("status:", response.status);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });

                                    //! Product Liste Güncelle
                                    productListUpdate(response.DB_Product,response.DB_Find_Product_Ret_Count,response.DB_Find_Product_TotalPayment);

                                } else {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                }
                            },
                            error: function (error) {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                console.log("error:", error);
                            },
                        }); //! Ajax Son

                    }
                });

            });
        }); //! Silme Son


        //! ************ Silme Son  ***************


        //! ************ Güncelle  ***************

        //! Modal Güncelle
        $('document').ready(function () {
            $("#Edit_ProductModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event){
                // alert("Modal Açıldı");

                var button = $(event.relatedTarget);
                var modalId = button.data("id");

                // console.log("modalId:",modalId);

                //! Ajax  Post
                $.ajax({
                    url: "/request/form/product/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        console.log("response:", response);
                        // console.log("status:", response.status);

                       
                        //! Return
                        $('#update_data_id').html(modalId);
                        
                        //! sector
                        if(response.DB.sector) {
                            $('#sectorEdit option[value='+response.DB.sector+']').prop('selected',true); //! Select
                            var selectTitle = $('html').attr('lang') == "en" ? 'Select Title' : 'Başlık Seç';
                            var optionSelect = '<option value="">'+selectTitle+'</option>';
                            for (let index = 0; index < response.DB_Find_Category.length; index++) { var title = $('html').attr('lang') == "en" ?  response.DB_Find_Category[index].title_EN :  response.DB_Find_Category[index].title;
                                optionSelect+='<option id="typeId" data_title="'+response.DB_Find_Category[index].title+'"  value="'+response.DB_Find_Category[index].id+'"  >'+title+'</option>';
                            }
                        }
                        else { $('#sectorEdit option[value=""]').prop('selected',true); }
                        //! sector Son

                        //! sub-sector
                        if(response.DB.sub_sector) {
                            $('#selectSubCategoryEdit').html(optionSelect);
                            $('#selectSubCategoryEdit option[value='+response.DB.sub_sector+']').prop('selected',true); //! Select
                            $('#stockEdit option[value="'+response.DB.stock_id+'"]').prop('selected', true); //! Seçim yap

                            document.querySelectorAll('[id=stockEditOption]').forEach(function(el) { el.style.display="none" });
                            document.querySelectorAll('[id=stockEditOption][data_sub_sector="'+response.DB.sub_sector+'"]').forEach(function(el) { el.style.display="block";  });
                        }
                        else { $('#selectSubCategoryEdit option[value=""]').prop('selected',true); }
                        //! sub-sector Son

                        
                        //! Stok Kontrol
                        $('#stockEdit').attr('data_status',response.DB.isActive)
                        $('#stockEdit').attr('data_id',response.DB.stock_id)
                        if(response.DB.isActive == 1) {  $('#stokEditPanel').css('display','block'); $('#codeEditPanel').css('display','flex'); $('#productNewAlert').css('display','none');  }
                        else if(response.DB.isActive == 0) { $('#stokEditPanel').css('display','none'); $('#codeEditPanel').css('display','none'); $('#productNewAlert').css('display','block'); }


                        $('#nameTrEdit').val(response.DB.nameTr);
                        $('#productNameEdit').val(response.DB.namePublic);

                        $('#StockCodeEdit').val(response.DB.stockCode);
                        $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                        $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);

                       
                        //! Dosya - Resim
                        if(response.DB.imgUrl != "" && response.DB.imgUrl != null ) {
                            $('#filePathUrlEdit').html(response.DB.imgUrl);

                            $('#productViewImage').css('display','block');
                            $('#productViewImage').attr("src",'/'+response.DB.imgUrl);

                            $('#product_dowloand_img').css('display','block');
                            $('#product_dowloand_img').attr("href",'/'+response.DB.imgUrl);
                            $('#product_dowloand_img').attr("download",'/'+response.DB.imgUrl);
                        }
                        else if(response.DB.imgUrl == "" || response.DB.imgUrl == null ) {
                            $('#productViewImage').css('display','none');
                            $('#product_dowloand_img').css('display','none');
                            $('#filePathUrlEdit').html(null);
                        }

                        if(response.DB.techFileUrl != "" && response.DB.techFileUrl != null ) {

                            //! Dosya - Teknik
                            $('#filePathUrltechnicalFileEdit').html(response.DB.techFileUrl);

                            $('#product_dowloand_file').css('display','block');
                            $('#product_dowloand_file').attr("href",'/'+response.DB.techFileUrl);
                            $('#product_dowloand_file').attr("download",'/'+response.DB.techFileUrl);
                        }
                        else if(response.DB.techFileUrl == "" || response.DB.techFileUrl == null ) {
                            $('#product_dowloand_file').css('display','none');
                            $('#filePathUrltechnicalFileEdit').html(null);
                        }
                        //! Dosya - Resim Son


                        $('#SelectStockUnitEdit option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                        $('#StockCountEdit').val(response.DB.stockCount);
                        $('#SelectCurrencyEdit option[value='+response.DB.currency+']').prop('selected',true); //! Select
                        $('#PriceEdit').val(response.DB.price);

                        $('#kdv_buyEdit').val(response.DB.kdv_buy);
                        $('#kdv_sellEdit').val(response.DB.kdv_sell);


                        if(response.DB.export_registered =="true" ) {
                            $("input[name='export_registeredEdit']").prop('checked', true);

                            $('#export_registered_kdv_buyEdit').attr('disabled',false)
                            $('#export_registered_kdv_sellEdit').attr('disabled',false)

                            $('#export_registered_kdv_buyEdit').val(response.DB.export_registered_kdv_buy);
                            $('#export_registered_kdv_sellEdit').val(response.DB.export_registered_kdv_sell);
                        }

                        if(response.DB.export_registered !="true" ) {
                            $("input[name='export_registeredEdit']").prop('checked', false);

                            $('#export_registered_kdv_buyEdit').attr('disabled',true)
                            $('#export_registered_kdv_sellEdit').attr('disabled',true)

                            $('#export_registered_kdv_buyEdit').val("");
                            $('#export_registered_kdv_sellEdit').val("");
                        }

                        $('#featuresTREdit').val(response.DB.featuresTr);
                        $('#featuresPublicEdit').val(response.DB.featuresPublic);

                        $('#tech_featuresTREdit').val(response.DB.tech_featuresTr);
                        $('#tech_featuresPublicEdit').val(response.DB.tech_featuresPublic);

                        $('#descriptionTREdit').val(response.DB.descriptionTr);
                        $('#descriptionPublicEdit').val(response.DB.descriptionPublic);

                        $('#webSiteEdit').val(response.DB.web_address);
                        $('#catalogLinkEdit').val(response.DB.catalogLink);
                        $('#gtipNoEdit').val(response.DB.gtipNo);

                        $('#productModelEdit').val(response.DB.productModel);
                        $('#productCodeEdit').val(response.DB.productCode);
                        $('#is_warrantyEdit option[value='+response.DB.is_warranty+']').prop('selected',true); //! Select
                        $('#warrantyTimeEdit').val(response.DB.warrantyTime);

                        $('#setupEdit option[value='+response.DB.setup+']').prop('selected',true); //! Select
                        $('#brandEdit').val(response.DB.brand);
                        $('#colorCodeEdit').val(response.DB.colorCode);

                        $('#productUsePurposeTREdit').val(response.DB.productUsePurposeTR);
                        $('#productUsePurposeENEdit').val(response.DB.productUsePurposeEN);

                        $('#ownBrandEdit').val(response.DB.ownBrand);
                        $('#specialDesignEdit').val(response.DB.specialDesign);
                        $('#specialPacketEdit').val(response.DB.specialPacket);
                        $('#salesOutletEdit').val(response.DB.salesOutlet);

                        //! Progresbar
                        $("#progressBarFileUploadEdit").width('0%');
                        $("#progressBarFileUploadtechnicalEdit").width('0%');

                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingFileUploadSearch').css('display','none');
                        $('#ModalBodyInfoSearch').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son


                //! Return
                $('#update_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#loaderEdit').css('display','none');
                $('#ModalBodyInfoEdit').css('display','block');

            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Modal Güncelle Son


        //! Güncelle
        $("#data_productUpdate").click(function (e) {
            e.preventDefault();

            //! Select
            var sectorEdit =  $('#sectorEdit').val();
            var selectSubCategoryEdit =  $('#selectSubCategoryEdit').val();
            var stockEdit =  $('#stockEdit').val();

            //! Stok Kontrol
            var stockActive = $('#stockEdit').attr('data_status');
            var stockId = $('#stockEdit').attr('data_id');

            // console.log('stockActive:',stockActive);
            // console.log('stockId:',stockId);
            // console.log('stockEdit:',stockEdit);

            var productNameEdit =  $('#productNameEdit').val();
            var nameTrEdit =  $('#nameTrEdit').val();
            var nameEnEdit =  $('#nameEnEdit').val();

            var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val();
            var SelectCurrencyEdit =  $('#SelectProductCurrencyAdd').val(); //! Para Birimi

            if(sectorEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SectorNotSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(selectSubCategoryEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NoSubSectorSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(stockEdit == "" && stockActive == "1") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=StockNotSelected]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(productNameEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NameNotWritten]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(nameTrEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NameTRNotWritten]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(nameEnEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NameEnNotWritten]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(nameTrEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NameTRNotWritten]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(nameEnEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=NameEnNotWritten]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else  if(SelectStockUnitEdit == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: $('[id=lang_change][data_key=SelectStockUnit]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                $val = $('#StockCountEdit').val(); //! Sayısı
                $unitPrice = $('#PriceEdit').val(); //! Birim Fiyat

                $total = Number($unitPrice.replace(',','.'))*Number($val); //! Toplam
                $total = $total.toFixed(2); //! Anlamlı Sayı

                var data_id =  $('#update_data_id').html();  //! Id

                //! Stok
                if(stockActive == "0") {
            
                    //! Stok
                    var sectorCode = $('#sectorEdit  option[value='+sectorEdit +']').attr('data_codeLet');
                    var sub_sectorCode = $('#selectSubCategoryEdit option[value='+selectSubCategoryEdit+']').attr('data_codeLet');
                    var stockNumber = $('#product_add_item').attr('data_stockNumber');
    
                    var StockCode = sectorCode+"-"+sub_sectorCode+"-"+stockNumber;
                    var accountingCode_buy = "153"+"."+stockNumber;
                    var accountingCode_sel = "610"+"."+stockNumber;

                }
                //! Stok Son

                //! Ajax
                $.ajax({
                    url: "/request/form/product/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number(data_id),
                        requestform_id: $('#edit_item').attr('data_id'),
                        public: false,
                        sector: $('#sectorEdit').val(),
                        sub_sector: $('#selectSubCategoryEdit').val(),
                        stock_id: stockActive == "1" ? $('#stockEdit').val() : stockId,
                        stockActive: stockActive ? stockActive : null,

                        codeNumber: stockNumber ? stockNumber : null,
                        stockCode: StockCode ? StockCode : null,
                        accountingCode_buy: accountingCode_buy ? accountingCode_buy : null,
                        accountingCode_sel: accountingCode_sel ? accountingCode_sel : null,

                        namePublic: $('#productNameEdit').val(),
                        nameTr: $('#nameTrEdit').val(),
                      
                        imgUrl: $('#filePathUrlEdit').html(),
                        techFileUrl: $('#filePathUrltechnicalFileEdit').html(),

                        stockUnit: $('#SelectStockUnitEdit').val(),
                        stockCount: $('#StockCountEdit').val(),
                        price: $('#PriceEdit').val(),
                        total: $total,

                        kdv_buy: $('#kdv_buyEdit').val(),
                        kdv_sell: $('#kdv_sellEdit').val(),

                        export_registered: $('#export_registeredEdit').is(':checked'),
                        export_registered_kdv_buy: $('#export_registered_kdv_buyEdit').val(),
                        export_registered_kdv_sell: $('#export_registered_kdv_sellEdit').val(),

                        featuresTr: $('#featuresTREdit').val(),
                        featuresPublic: $('#featuresPublicEdit').val(),

                        tech_featuresTr: $('#tech_featuresTREdit').val(),
                        tech_featuresPublic: $('#tech_featuresPublicEdit').val(),

                        descriptionTr: $('#descriptionTREdit').val(),
                        descriptionPublic: $('#descriptionPublicEdit').val(),

                        catalogLink: $('#catalogLinkEdit').val(),
                        web_address: $('#webSiteEdit').val(),
                        gtipNo: $('#gtipNoEdit').val(),

                        imgUrl: $('#filePathUrlEdit').html(),
                        techFileUrl: $('#filePathUrltechnicalFileEdit').html(),

                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        // alert("başarılı");
                        // console.log("response:", response);
                        // console.log("status:", response.status);

                        if (response.status == "success") {

                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });

                            //! Kapatma
                            $("#Edit_ProductModal").modal('hide');

                            //! Product Liste Güncelle
                            productListUpdate(response.DB_Product,response.DB_Find_Product_Ret_Count,response.DB_Find_Product_TotalPayment);

                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        console.log("error:", error);
                    },
                }); //! Ajax Son

            }


        }); //! Güncelle Son

        //! ************ Güncelle Son  ***************


     //! ************  Ürün Bilgileri Modal  Son  ***************


        //! ************ Güncelle   ***************

        //! Güncelle
        $("#edit_item").click(function (e) {
            e.preventDefault();

            var requestFormTitle = $('#requestFormTitle').val(); //! Adı

            var selectCurrentCartEdit = $('#selectCurrentCartEdit').val(); //! Firma
            var VisibilityEdit = $('#VisibilityEdit').val(); //! Görünürlük
            var personelVal = $('#selectPersonelEdit').val(); //! Personel
            var SelectProductCurrencyAdd = $('#SelectProductCurrencyAdd').val(); //! Para Birimi

            var sector_Val = $('#SectorAdd').val(); //! Sektor
            var vendorDeliveryTypeAdd_Val = $('#vendorDeliveryTypeAdd').val(); //! Teslim Şekli
            var paymentMethodAdd_Val = $('#paymentMethodAdd').val(); //! Ödeme Şekli
            var modeofTransportAdd_Val = $('#modeofTransportAdd').val(); //! Nakliyet Şekli
            var shipmentTypeAdd_Val = $('#shipmentTypeAdd').val(); //! Sevk Şekli
            var specialPermitAdd_Val = $('#specialPermitAdd').val(); //! Özel İzin
            var intertekAdd_Val = $('#intertekAdd').val(); //! intertek

            if (requestFormTitle == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Adı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else  if (selectCurrentCartEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Firma  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (VisibilityEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Görünürlük  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (personelVal == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Personel  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (SelectProductCurrencyAdd == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Para Birimi Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (sector_Val == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Sektor  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (vendorDeliveryTypeAdd_Val == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Teslim Şekli  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (paymentMethodAdd_Val == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Ödeme Şekli  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (modeofTransportAdd_Val == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Nakliyet Şekli  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if (shipmentTypeAdd_Val == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Sevk Şekli  Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                //! Id
                var data_id =  $('#edit_item').attr('data_id');

                //! Ajax
                $.ajax({
                    url: "/request/form/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number(data_id),
                        requestFormTitle: $('#requestFormTitle').val(),
                        currency: $('#SelectProductCurrencyAdd').val(),
                        description: $('#requestFormDescription').val(),
                        requestEffectiveDate: $('#offerEffectiveDateEdit').val(),

                        currencyCartId: $('#selectCurrentCartEdit').val(),
                        companyAuthorized_person: $('#companyAuthorized_person').val(),
                        companyAuthorized_email: $('#companyAuthorized_person_email').val(),
                        companyAuthorized_tel: $('#companyAuthorized_person_tel').val(),

                        companyAuthorized_person_tax_no: $('#companyAuthorized_person_tax_no').val(),
                        companyAuthorized_person_tax_adm: $('#companyAuthorized_person_tax_adm').val(),
                        companyAuthorized_person_adress: $('#companyAuthorized_person_adress').val(),

                        public: $('#VisibilityEdit').val(),
                        public_username: $('#public_username').val(),
                        public_pass: $('#public_pass').val(),
                        personeId: $('#selectPersonelEdit').val(),

                        delivery_at: $('#delivery_atEdit').val(),
                        vendorDeliveryType: $('#vendorDeliveryTypeAdd option[value="'+vendorDeliveryTypeAdd_Val+'"]').attr('data_id'),
                        vendorDeliveryType_Title: $('#vendorDeliveryTypeAdd').val(),

                        paymentMethod: $('#paymentMethodAdd option[value="'+paymentMethodAdd_Val+'"]').attr('data_id'),
                        paymentMethod_Title: $('#paymentMethodAdd').val(),

                        modeofTransport: $('#modeofTransportAdd option[value="'+modeofTransportAdd_Val+'"]').attr('data_id'),
                        modeofTransport_Title: $('#modeofTransportAdd').val(),

                        shipmentType: $('#shipmentTypeAdd option[value="'+shipmentTypeAdd_Val+'"]').attr('data_id'),
                        shipmentType_title: $('#shipmentTypeAdd').val(),

                        intertek: $('#intertekAdd option[value="'+intertekAdd_Val+'"]').attr('data_id'),
                        intertek_Title: $('#intertekAdd').val(),

                        specialPermit: $('#specialPermitAdd option[value="'+specialPermitAdd_Val+'"]').attr('data_id'),
                        specialPermit_Title: $('#specialPermitAdd').val(),

                        requested_document: $('#requested_document').val(),
                        purchaseAmount: $('#purchaseAmount').val(),
                        purchaseAmountStockUnit: $('#SelectPurchaseAmountStockUnitEdit').val(),

                        purchaseTime: $('#purchaseTimeEdit').val(),
                        initialPurchaseAmount: $('#initialPurchaseAmount').val(),
                        initialPurchaseAmountStockUnit: $('#SelectInitialPurchaseAmountStockUnitEdit').val(),
                        initialPurchaseAmount_at: $('#initialPurchaseAmount_at').val(),
                        deliveryLocation: $('#deliveryLocation').val(),
                        packagingType: $('#packagingType').val(),

                        reqSample: $('#reqSample_Val').val(),
                        updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        // alert("başarılı");
                        // console.log("response:", response);
                        // console.log("status:", response.status);

                        if (response.status == "success") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });

                            //! Sayfa Yenileme
                            //window.location.reload();

                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        console.log("error:", error);
                    },
                }); //! Ajax Son

            }



        }); //! Güncelle Son


        //! ************ Güncelle Son  ***************

        //! ************ Ürün Resmi  ***************

            //! FileUpload
            $("#fileUploadClick").click(function (e) {
                e.preventDefault();
                //alert("fileUploadClick");

                //! Dosya Yükleme
                const fileInput = document.querySelector("#fileInput");
                const fileInputFiles = fileInput.files;
                console.log("fileInputFiles:",fileInputFiles);


                //! Yeni Form Veriler
                var formData = new FormData();
                formData.append("file", fileInputFiles[0]);
                formData.append("fileDbSave", $('#fileDbSave').val());
                formData.append("fileWhere", $('#fileWhere').val());

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                console.log("Dosya Yükleme Durumu: %", percentComplete);

                                $("#progressBarFileUpload").width(percentComplete + '%');
                                $("#progressBarFileUpload").html(percentComplete+'%');

                            }
                        }, false);
                        return xhr;
                    },
                    url: "/file/upload/control",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function () {
                        console.log("Dosya yükleme başladı");

                        //! ProgressBar
                        $("#progressBarFileUpload").width('0%');

                        //! Upload Durum
                        $('#LoadingFileUpload').toggle();
                        $('#uploadStatus').hide();

                        //! Upload Url
                        $('#filePathUrl').html("");
                    },
                    error: function (error) {
                        alert("başarısız");
                        console.log("Hata oluştu error:", error);

                        //! Upload Durum
                        $('#LoadingFileUpload').hide();
                        $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                        //! Upload Url
                        $('#filePathUrl').html("");


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    },
                success: function (resp) {
                    //alert("Başarılı");
                    console.log("file resp:", resp);

                        //! ProgressBar
                        $("#progressBarFileUpload").width('100%');

                        //! Upload Durum
                        $('#LoadingFileUpload').hide();
                        $('#uploadStatus').hide();

                        //! Upload Url
                        $('#filePathUrl').html(resp.file_url);
                        $('#productViewImageAdd').css('display','block');
                        $('#productViewImageAdd').attr("src",resp.file_path);

                        $('#product_dowloand_imgAdd').css('display','block');
                        $('#product_dowloand_imgAdd').attr("href",resp.file_path);
                        $('#product_dowloand_imgAdd').attr("download",resp.file_path);


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    }
                }); //! Ajax



            });
            //! FileUpload Son

        //! ************ Ürün Resmi Son  ***************


        //! ************ Ürün Resmi Edit ***************

            //! FileUpload
            $("#fileUploadClickEdit").click(function (e) {
                e.preventDefault();
                //alert("fileUploadClick");

                //! Dosya Yükleme
                const fileInput = document.querySelector("#fileInputEdit");
                const fileInputFiles = fileInput.files;
                console.log("fileInputFiles:",fileInputFiles);


                //! Yeni Form Veriler
                var formData = new FormData();
                formData.append("file", fileInputFiles[0]);
                formData.append("fileDbSave", $('#fileDbSaveEdit').val());
                formData.append("fileWhere", $('#fileWhereEdit').val());

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                console.log("Dosya Yükleme Durumu: %", percentComplete);

                                $("#progressBarFileUploadEdit").width(percentComplete + '%');
                                $("#progressBarFileUploadEdit").html(percentComplete+'%');

                            }
                        }, false);
                        return xhr;
                    },
                    url: "/file/upload/control",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function () {
                        console.log("Dosya yükleme başladı");

                        //! ProgressBar
                        $("#progressBarFileUploadEdit").width('0%');

                        //! Upload Durum
                        $('#LoadingFileUploadEdit').toggle();
                        $('#uploadStatusEdit').hide();

                        //! Upload Url
                        $('#filePathUrlEdit').html("");
                    },
                    error: function (error) {
                        alert("başarısız");
                        console.log("Hata oluştu error:", error);

                        //! Upload Durum
                        $('#progressBarFileUploadEdit').hide();
                        $('#uploadStatusEdit').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                        //! Upload Url
                        $('#filePathUrlEdit').html("");


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    },
                success: function (resp) {
                    //alert("Başarılı");
                    console.log("file resp:", resp);

                        //! ProgressBar
                        $("#progressBarFileUploadEdit").width('100%');

                        //! Upload Durum
                        $('#LoadingFileUploadEdit').hide();
                        $('#uploadStatusEdit').hide();

                        console.log("ürün:",resp);

                        //! Upload Url
                        $('#filePathUrlEdit').html(resp.file_url);


                        $('#productViewImage').css('display','block');
                        $('#productViewImage').attr("src",resp.file_path);

                        $('#product_dowloand_img').css('display','block');
                        $('#product_dowloand_img').attr("href",resp.file_path);
                        $('#product_dowloand_img').attr("download",resp.file_path);


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    }
                }); //! Ajax



            });
            //! FileUpload Son

        //! ************ Ürün Resmi Edit Son  ***************


        //! ************ Teknik Özellikler ***************

            //! FileUpload
            $("#techFileUploadClick").click(function (e) {
                e.preventDefault();
                //alert("fileUploadClick");

                //! Dosya Yükleme
                const fileInput = document.querySelector("#fileInputTech");
                const fileInputFiles = fileInput.files;
                console.log("fileInputFiles:",fileInputFiles);


                //! Yeni Form Veriler
                var formData = new FormData();
                formData.append("file", fileInputFiles[0]);
                formData.append("fileDbSave", $('#fileDbSave_technicalFile').val());
                formData.append("fileWhere", $('#fileWhere_technicalFile').val());

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                console.log("Dosya Yükleme Durumu: %", percentComplete);

                                $("#progressBarFileUploadtechnical").width(percentComplete + '%');
                                $("#progressBarFileUploadtechnical").html(percentComplete+'%');

                            }
                        }, false);
                        return xhr;
                    },
                    url: "/file/upload/control",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function () {
                        console.log("Dosya yükleme başladı");

                        //! ProgressBar
                        $("#progressBarFileUploadtechnical").width('0%');

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFile').toggle();
                        $('#uploadStatus').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFile').html("");
                    },
                    error: function (error) {
                        alert("başarısız");
                        console.log("Hata oluştu error:", error);

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFile').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFile').html("");

                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    },
                success: function (resp) {
                    //alert("Başarılı");
                    console.log("file resp:", resp);

                        //! ProgressBar
                        $("#progressBarFileUploadtechnical").width('100%');

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFile').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFile').html(resp.file_url);
                        $('#product_dowloand_fileAdd').css('display','block');
                        $('#product_dowloand_fileAdd').attr("href",resp.file_path);
                        $('#product_dowloand_fileAdd').attr("download",resp.file_path);


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    }
                }); //! Ajax



            });
            //! FileUpload Son

        //! ************ Teknik Özellikler Son  ***************


        //! ************ Teknik Özellikler Edit ***************

            //! FileUpload
            $("#techFileUploadClickEdit").click(function (e) {
                e.preventDefault();
                //alert("fileUploadClick");

                //! Dosya Yükleme
                const fileInput = document.querySelector("#fileInputEditTech");
                const fileInputFiles = fileInput.files;
                console.log("fileInputFiles:",fileInputFiles);


                //! Yeni Form Veriler
                var formData = new FormData();
                formData.append("file", fileInputFiles[0]);
                formData.append("fileDbSave", $('#fileDbSave_technicalFileEdit').val());
                formData.append("fileWhere", $('#fileWhere_technicalFileEdit').val());

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                console.log("Dosya Yükleme Durumu: %", percentComplete);

                                $("#progressBarFileUploadtechnicalEdit").width(percentComplete + '%');
                                $("#progressBarFileUploadtechnicalEdit").html(percentComplete+'%');

                            }
                        }, false);
                        return xhr;
                    },
                    url: "/file/upload/control",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function () {
                        console.log("Dosya yükleme başladı");

                        //! ProgressBar
                        $("#progressBarFileUploadtechnicalEdit").width('0%');

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFileEdit').toggle();
                        $('#uploadStatus').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFileEdit').html("");
                    },
                    error: function (error) {
                        alert("başarısız");
                        console.log("Hata oluştu error:", error);

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFileEdit').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFileEdit').html("");


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    },
                success: function (resp) {
                    //alert("Başarılı");
                    console.log("file resp:", resp);

                        //! ProgressBar
                        $("#progressBarFileUploadtechnicalEdit").width('100%');

                        //! Upload Durum
                        $('#LoadingFileUploadtechnicalFileEdit').hide();

                        //! Upload Url
                        $('#filePathUrltechnicalFileEdit').html(resp.file_url);
                        $('#product_dowloand_file').css('display','block');
                        $('#product_dowloand_file').attr("href",resp.file_path);
                        $('#product_dowloand_file').attr("download",resp.file_path);


                        //! Alert
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                            showConfirmButton: false,
                            timer: 2000,
                        });  //! Alert Son

                    }
                }); //! Ajax



            });
            //! FileUpload Son

        //! ************ Teknik Özellikler Edit Son  ***************

            //! Talep Formu
            $("#selectCurrentCartEdit").change(function(){ // Değişiklik olduğunda

                var selectFormVal = $('#selectCurrentCartEdit').val();

                    //! Ajax  Post
                    $.ajax({
                        url: "/current/cart/search/post",
                        method: "post",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id:Number(selectFormVal)
                        },
                        success: function (response) {
                            // alert("başarılı");
                            console.log("response:", response);
                            // console.log("status:", response.status);


                            $('#companyAuthorized_person').val(response.DB.authorized_person);
                            $('#companyAuthorized_person_email').val(response.DB.authorized_person_mail);
                            $('#companyAuthorized_person_tel').val(response.DB.authorized_person_tel);

                            $('#companyAuthorized_person_tax_no').val(response.DB.tax_number);
                            $('#companyAuthorized_person_tax_adm').val(response.DB.tax_administration);
                            $('#companyAuthorized_person_adress').html(response.DB.billing_address);


                        },
                        error: function (error) { console.log("search error:", error); },

                    }); //! Ajax Post Son

            }); //! Talep Formu Son


 });
