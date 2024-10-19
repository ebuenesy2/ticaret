$(function () {

    // alert("cost_calculation_edit");
    // console.log("cost_calculation_edit çalışıyor");

        //! ************ Ürün Bilgileri Modal ***************

        //! ************ Değişimler  ***************
            //! Arama Stok Add
            document.querySelector('#stockAdd').addEventListener('change', e => {

                var selectType = $('#stockAdd').val();
        
                if (selectType == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Stok Seçilmedi",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else {

                    //! Ajax  Post
                    $.ajax({
                        url: "/get/offers/product/search/post",
                        method: "post",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id:Number(selectType)
                        },              
                        beforeSend: function() { console.log("Başlangıc"); },
                        success: function (response) {
                            // alert("başarılı");
                            //console.log("response:", response);
                            // console.log("status:", response.status);
                            
                            $('#stockAdd').attr('data_sector',response.DB.sector);
                            $('#stockAdd').attr('data_sub_sector',response.DB.sub_sector);
                            $('#stockAdd').attr('data_stock_id',response.DB.stock_id);
                        
                            $('#nameTrAdd').val(response.DB.nameTr);
                            $('#nameEnAdd').val(response.DB.nameEn);

                            $('#StockCodeAdd').val(response.DB.stockCode);
                            $('#accountingCodeBuyAdd').val(response.DB.accountingCode_buy);
                            $('#accountingCodeSelAdd').val(response.DB.accountingCode_sel);
        
                           $('#filePathUrl').html(response.DB.imgUrl);
                           $('#filePathUrltechnicalFile').html(response.DB.techFileUrl);
                            
                            $('#SelectStockUnitAdd option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                            $('#StockCountAdd').val(response.DB.stockCount);
                            $('#SelectCurrencyAdd option[value='+response.DB.currency+']').prop('selected',true); //! Select
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
                            $('#is_warrantyEdit option[value='+response.DB.is_warranty+']').prop('selected',true); //! Select
                            $('#warrantyTimeAdd').val(response.DB.warrantyTime);
        
                            $('#setupEdit option[value='+response.DB.setup+']').prop('selected',true); //! Select
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
        
                            console.log("Search Ajax Bitti");
                
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
                        title: "Stok Seçilmedi",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else {

                    var productIDSearch = $('#stockEdit').val();

                    //! Ajax  Post
                    $.ajax({
                        url: "/get/offers/product/search/post",
                        method: "post",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id:Number(productIDSearch)
                        },              
                        beforeSend: function() { console.log("Başlangıc"); },
                        success: function (response) {
                            // alert("başarılı");
                            // console.log("response:", response);
                            // console.log("status:", response.status);
                           
                            $('#stockEdit option[value="'+response.DB.stock_id+'"]').prop('selected', true); //! Seçim yap
                            $('#stockEdit').attr('data_sector',response.DB.sector);
                            $('#stockEdit').attr('data_sub_sector',response.DB.sub_sector);
                        
                            $('#nameTrEdit').val(response.DB.nameTr);
                            $('#nameEnEdit').val(response.DB.nameEn);
                            
                            $('#StockCodeEdit').val(response.DB.stockCode);
                            $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                            $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);

                            $('#filePathUrlEdit').html(response.DB.imgUrl);
                            $('#filePathUrltechnicalFileEdit').html(response.DB.techFileUrl);
                            
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
    
            var nameTrAdd =  $('#nameTrAdd').val();
           
            var SelectStockUnitAdd =  $('#SelectStockUnitAdd').val();
            var SelectCurrencyAdd =  $('#SelectCurrencyAdd').val();
                    
            if(nameTrAdd == "") { 
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Ad Tr Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            } 
            else  if(SelectStockUnitAdd == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: 'Stok Birimi Seçiniz',
                showConfirmButton: false,
                timer: 2000,
            });

            }
            else if(SelectCurrencyAdd == "") { 
    
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Para Yazılmadı",
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
                var cost_calculation_id =  $('#btn_edit').attr('data_id');
                var cost_calculation_time =  $('#btn_edit').attr('data_time');
    
                //! Ajax
                $.ajax({
                    url: "/cost/calculation/product/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        time: Number(cost_calculation_time),
                        cost_calculation_id: Number(cost_calculation_id),
                        sector: Number($('#stockAdd').attr('data_sector')),
                        sub_sector: Number($('#stockAdd').attr('data_sub_sector')),
                        stock_id: Number($('#stockAdd').attr('data_stock_id')),
                        get_offers_id: Number($('#stockAdd').val()),

                        nameTr: $('#nameTrAdd').val(),
    
                        imgUrl: $('#filePathUrl').html(),
                        techFileUrl: $('#filePathUrltechnicalFile').html(),
                       
                        stockUnit: $('#SelectStockUnitAdd').val(),
                        stockCount: $('#StockCountAdd').val(),
                       
                        currency: $('#SelectCurrencyAdd').val(),
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
                       
                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        // alert("başarılı");
                        //console.log("response:", response);
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
                            productListUpdate(response.DB_Product,response.DB_Find_Product_TotalPayment);
    
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

        
        //! Modal Ürün Silme
        $('document').ready(function () {
            $("#Delete_ProductModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Delete_ProductModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

                //! Return
                console.log("data_id:",data_id);
                $('#delete_data_id').html(data_id);

                $("#Delete_ProductModal").modal('hide');

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
                            url: "/cost/calculation/product/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                data_id: $('#btn_edit').attr('data_id'),
                            },
                            success: function (response) {
                                // alert("başarılı");
                                console.log("response:", response);
                                // console.log("status:", response.status);
    
                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });

                                    //! Modal Kapatma
                                    $("#Delete_ProductModal").modal('hide');

                                    //! Product Liste Güncelle
                                    productListUpdate(response.DB_Product,response.DB_Find_Product_TotalPayment);

                                   
    
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
                    else {
                        $("#Delete_ProductModal").modal('hide');
                    }
                });

               
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Modal Ürün Silme Son

        
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
                    url: "/cost/calculation/product/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },              
                    beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        console.log("response:", response);
                        // console.log("status:", response.status);
    
                        //! Return
                        $('#update_data_id').html(modalId);

                        //! Loading
                        if(response.status == "success") {

                            $('#stockEdit option[value='+response.DB.get_offers_id+']').prop('selected',true); //! Select
                            $('#stockEdit').attr('data_sector',response.DB.sector);
                            $('#stockEdit').attr('data_sub_sector',response.DB.sub_sector);
                        
                            $('#nameTrEdit').val(response.DB.nameTr);
                            $('#nameEnEdit').val(response.DB.nameEn);
                            
                            $('#StockCodeEdit').val(response.DB.stockCode);
                            $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                            $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);
        
                            $('#filePathUrlEdit').html(response.DB.imgUrl);
                            $('#filePathUrltechnicalFileEdit').html(response.DB.techFileUrl);
                            
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
                            //! Dosya - Resim Son

                            //! Progresbar
                            $("#progressBarFileUploadEdit").width('0%');
                            $("#progressBarFileUploadtechnicalEdit").width('0%');

                        }
                        else {

                            //! Görünürlük Kontrolleri
                            $('#loaderEdit').css('display','block');
                            $('#ModalBodyInfoEdit').css('display','none');

                        }
            
                    },
                    error: function (error) { console.log("search error:", error); },
                    complete: function() {
            
                        // //! Görünürlük Kontrolleri
                        // $('#LoadingFileUploadSearch').css('display','none');
                        // $('#ModalBodyInfoSearch').css('display','block');
    
                        // console.log("Search Ajax Bitti");
            
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

            var nameTrEdit =  $('#nameTrEdit').val();
            var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val();
            var SelectCurrencyEdit =  $('#SelectCurrencyEdit').val();

            if(nameTrEdit == "") { 
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Ad Tr Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            } 
         
            else  if(SelectStockUnitEdit == "") { 

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: 'Stok Birimi Seçiniz',
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else if(SelectCurrencyEdit == "") { 

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Para Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            } 
            else {

                $val = $('#StockCountEdit').val(); //! Sayısı
                $unitPrice = $('#PriceEdit').val(); //! Birim Fiyat

                $total = Number($unitPrice.replace(',','.'))*Number($val); //! Toplam
                $total = $total.toFixed(2); //! Anlamlı Sayı
                

                //! Id
                var data_id =  $('#update_data_id').html();  //! Id

                //! Ajax
                $.ajax({
                    url: "/cost/calculation/product/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number(data_id),
                        data_id: $('#btn_edit').attr('data_id'),
                        sector: Number($('#stockEdit').attr('data_sector')),
                        sub_sector: Number($('#stockEdit').attr('data_sub_sector')),
                        get_offers_id: Number($('#stockEdit').val()),
                    
                        nameTr: $('#nameTrEdit').val(),

                        imgUrl: $('#filePathUrlEdit').html(),
                        techFileUrl: $('#filePathUrltechnicalFileEdit').html(),
                    
                        stockUnit: $('#SelectStockUnitEdit').val(),
                        stockCount: $('#StockCountEdit').val(),
                        currency: $('#SelectCurrencyEdit').val(),
                        price: $('#PriceEdit').val(),
                        total: $total,

                        kdv_buy: $('#kdv_buyEdit').val(),
                        kdv_sell: $('#kdv_sellEdit').val(),

                        export_registered: $('#export_registeredEdit').is(':checked'),
                        export_registered_kdv_buy: $('#export_registered_kdv_buyEdit').val(),
                        export_registered_kdv_sell: $('#export_registered_kdv_sellEdit').val(),

                        descriptionTr: $('#descriptionTREdit').val(),
                        descriptionEn: $('#descriptionENEdit').val(),
                    
                        featuresTr: $('#featuresTREdit').val(),
                        featuresEn: $('#featuresENEdit').val(),

                        tech_featuresTr: $('#tech_featuresTREdit').val(),
                        tech_featuresEn: $('#tech_featuresENEdit').val(),

                        web_address: $('#webSiteEdit').val(),
                        catalogLink: $('#catalogLinkEdit').val(),
                        gtipNo: $('#gtipNoEdit').val(),

                        productModel:  $('#productModelEdit').val(),
                        productCode:  $('#productCodeEdit').val(),
                        is_warranty:  $('#is_warrantyEdit').val(),
                        warrantyTime:  $('#warrantyTimeEdit').val(),

                        setup:  $('#setupEdit').val(),
                        brand:  $('#brandEdit').val(),
                        colorCode:  $('#colorCodeEdit').val(),

                        productUsePurposeTR:  $('#productUsePurposeTREdit').val(),
                        productUsePurposeEN:  $('#productUsePurposeENEdit').val(),

                        ownBrand:  $('#ownBrandEdit').val(),
                        specialDesign:  $('#specialDesignEdit').val(),
                        specialPacket:  $('#specialPacketEdit').val(),
                        salesOutlet:  $('#salesOutletEdit').val(),
                    
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
                           
                            //! Modal Kapatma
                            $("#Edit_ProductModal").modal('hide');

                            //! Product Liste Güncelle
                            productListUpdate(response.DB_Product,response.DB_Find_Product_TotalPayment);

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
            

        }); //! Güncelle Son

        //! ************ Güncelle Son  ***************

 
     //! ************  Ürün Bilgileri Modal  Son  ***************
 
    
    //! ************ Ürün Fiyatları  ***************

        //! Birim Fiyat
        $('#ProductUnitPrice').keyup(function(){   
            //console.log("yazıyor...");    

            $val = $(this).val(); //!  Birim Fiyat
            $val_attr = $(this)[0].attributes['data_id'].nodeValue; //! İD
            $unitPrice = $('input[id=product-qty][data_id='+ $val_attr +']').val(); //! Sayısı

            $return = Number($val.replace(',','.'))*Number($unitPrice); //! Toplam
            $('input[id=productTotal][data_id='+ $val_attr +']').val($return); //! Toplam Göster

        });
        //! Birim Fiyat Son

        //! Sayısı
        $('.product-quantity').keyup(function(){   
            //console.log("yazıyor...");    

            $val = $(this).val(); //! Sayısı
            $val_attr = $(this)[0].attributes['data_id'].nodeValue; //! İD
            $unitPrice = $('input[id=ProductUnitPrice][data_id='+ $val_attr +']').val(); //! Birim Fiyat

            $return = Number($val)*Number($unitPrice); //! Toplam
            $('input[id=productTotal][data_id='+ $val_attr +']').val($return); //! Toplam Göster
        

        });
        //! Sayısı Son


    //! ************ Ürün Fiyatları Son  ***************

    //! ************ Maliyet Kalemi  ***************
       
        //! Maliyet Kalem 
         document.querySelectorAll("#ProductExpencePrice").forEach(function (i) {
            i.addEventListener("keyup", function (event) {
                //console.log("yazıyor...");    
                
                //! Hesaplama Yapıyor
                general(); 
    
            });
        }); //! Maliyet Kalem  Son
 
     
        //! Maliyet Kalemi  Ekleme
        $('#expense_add_item').click(function(){   
            //alert("maliyet Kalemi EKle"); 


            //! Ajax
            $.ajax({
                url: "/cost/calculation/expense/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    time: $('#btn_edit').attr('data_time'),
                    title: $('#CostItemNameAdd').val(),
                    description:document.getElementById('CostItemDescriptionAdd').value,
                    price: $('#CostItemPriceAdd').val(),
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

                        //! Maliyet Liste Güncelle
                        currentListUpdate(response);

                        //! Modal Temizleme
                        $("#Add_ExpenseForm")[0].reset();

                        //! Modal Kapatma
                        $("#AddExpenseModal").modal('hide');

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
            

        });
        //! Maliyet Kalemi  Ekleme Son


        //! Maliyet Kalemi Silme
        $('document').ready(function () {
            $("#Delete_ExpenseModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Delete_ExpenseModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

                //! Return
                //console.log("data_id:",data_id);
                $('#delete_expense_data_id').html(data_id);

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
                            url: "/cost/calculation/expense/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                time: Number($('#btn_edit').attr('data_time')),
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

                                    //! Maliyet Liste Güncelle
                                    currentListUpdate(response);

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

                        //! Return
                        $("#Delete_ExpenseModal").modal('hide');
                    
                    }
                    else {
                        $("#Delete_ProductModal").modal('hide');
                    }
                });

               
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Maliyet Kalemi Silme Son

      
        //! ************ Güncelle  ***************

        //! Modal Güncelle
        $('document').ready(function () {
            $("#Edit_ExpenseModal").modal({
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
                    url: "/cost/calculation/expense/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },              
                    // beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        // console.log("response:", response);
                        // console.log("status:", response.status);

                      
                        $('#CostItemNameEdit').val(response.DB.title);
                        $('#CostItemDescriptionEdit').val(response.DB.description);
                        $('#CostItemPriceEdit').val(response.DB.price);
                    
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
                $('#update_expense_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#LoadingExpenseUpdate').css('display','none');
                $('#ModalBodyInfoExpenseUpdate').css('display','block');
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

        }); //! Modal Güncelle Son

        //! Güncelle
        $("#data_expenseUpdate").click(function (e) {
            e.preventDefault();

            //! Id
            var data_id =  $('#update_expense_data_id').html();

            //! Ajax
            $.ajax({
                url: "/cost/calculation/expense/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    time: Number($('#btn_edit').attr('data_time')),

                    title: $('#CostItemNameEdit').val(),
                    description: $('#CostItemDescriptionEdit').val(),
                    price: $('#CostItemPriceEdit').val(),
                   
                    updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                },
                success: function (response) {
                    //alert("başarılı");
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

                        //! Modal Kapatma
                        $("#Edit_ExpenseModal").modal('hide');

                        //! Maliyet Liste Güncelle
                        currentListUpdate(response);

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

        }); //! Güncelle Son

        //! ************ Güncelle Son  ***************

    //! ************ Maliyet Kalemi  Son  ***************


     //! ************ Genel İşlemler   ***************

        //! Hesaplamalar
        document.querySelectorAll("#ProductUnitPrice").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! Ürün Fiyat
        document.querySelectorAll("#product-qty").forEach(function (i) { i.addEventListener("keyup", function (event) {  general(); }); }); //! Ürün Sayısı
        document.querySelectorAll("#DB_Find_Product_total").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! Ürün Tutarı

        document.querySelectorAll("#cart_profit").forEach(function (i) { i.addEventListener("keyup", function (event)  {  general(); }); }); //! Kar
        document.querySelectorAll("#cart_serviceFee").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! Hizmet Bedeli
        document.querySelectorAll("#cart_ibm").forEach(function (i) { i.addEventListener("keyup", function (event) { general(); }); }); //! ibm
    
      
    
        //! Tüm Verileri Hesaplıyor
        function general () {


                //! Toplam Ürün Sayısı
                var totalProduct_count = 0;

                //! Hesaplama
                for (let index = 0; index < $('#product-qty').length; index++) {
                    var qytProduct = $('#product-qty')[index].defaultValue.replace(',','.');
                    totalProduct_count = totalProduct_count + Number(qytProduct);
                }
                
                //! Toplam Ürün Gider
                var totalProduct_price = $('#productTotalPayment').val();

                //! Toplam Maliyet Gideri
                var totalExpense_price = $('#expenseTotalPayment').val();

              
                //! Toplam - Ürün + Maliyet
                var total =   Number(totalProduct_price) +  Number(totalExpense_price);
                //console.log("total:",total);
                $('#firstTotal').val(total); //! ilk toplam

                //! Kar hesaplama
                var profit_yüzde = $('#cart_profit').val().replace(',','.'); //! Sayıya Çevirme
                var profit_yüzde_tutar = (total*Number(profit_yüzde))/100; //! Kar YÜZDE HESAPLAMA
                $('#cart_profit_total').val(profit_yüzde_tutar.toFixed(2)); //! ibm tutarı


                //! Kurumlar Vergisi
                var profit_institutional = (20*Number(profit_yüzde))/100; //! %20
                var totalprofit_institutional = (20*Number(profit_yüzde_tutar))/100; //! %20 Toplam
                $('#profit_institutional').val(profit_institutional.toFixed(2)); //! Kurumlar Payı
                $('#profit_institutional_total').val(totalprofit_institutional.toFixed(2)); //! Kurumlar Payı

                //! Kar ve Kurumlar
                var totalProfit = profit_yüzde_tutar+ total; //! Kar Hesabı
                var totalProfit = totalprofit_institutional+ totalProfit; //! Kar'ın Kurumlar Vergisi Payı
                $('#generalTotal_Profit').val(totalProfit.toFixed(2)); //! Toplam

                //! ibm hesaplama
                var ibm_yüzde = $('#cart_ibm').val().replace(',','.'); //! Sayıya Çevirme
                var ibm_yüzdeTutar = (totalProfit*Number(ibm_yüzde))/100; //! İBM YÜZDE HESAPLAMA
                var generalTotal_ibm = totalProfit+ ibm_yüzdeTutar; //! Toplam ibm
                $('#cart_ibm_total').val(ibm_yüzdeTutar.toFixed(2)); //! ibm tutarı
                $('#generalTotal_ibm').val(generalTotal_ibm.toFixed(2)); //! Toplam genel - ibm


               

        } //! Tüm Verileri Hesaplıyor Son

        general(); //! Fonksiyon Çağırma

        //! ************ Genel İşlemler  Son  ***************


        //! Ürün Bilgileri Listeleme
        function productListUpdate(data,DB_Find_Product_TotalPayment) {
            // console.log("data:",data);
            // console.log("DB_Find_Product_TotalPayment:",DB_Find_Product_TotalPayment);
           
            var returnData ="";
    
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
            
                returnData +='<tr id="'+data[index].id+'" class="product">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start">';
                returnData +='<div class="mb-2">';
                returnData +='<div style="display: none"  > <span class="badge text-bg-danger">Onay Bekliyor</span></div>';
                returnData +='<input type="text" class="form-control bg-light border-0" id="productName-1"  value="'+data[index].nameTr+'" readonly="readonly" >';
                returnData +='</div>';
                returnData +='<textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" readonly="readonly"  >'+data[index].descriptionTr+'</textarea>';
                returnData +=' </td>';
                returnData +='<td><input type="text" class="form-control product-price bg-light border-0" id="product-qty" data_id="'+Number(index+1)+'" step="0.01" placeholder="0.00" value="'+data[index].price+'" readonly="readonly" ></td>';
                returnData +=' <td id="DB_Find_Product_count"> <div class="input-step"> <input type="number" class="product-quantity bg-light border-0 " id="Productprice" data_id="'+Number(index+1)+'" value="'+data[index].stockCount+'"  readonly="readonly" > </div> </td>';
                returnData +='<td class="text-end" id="DB_Find_Product_stockUnit"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productStockUnit" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].stockUnit+'" readonly="" > </div> </td>';
                returnData +='<td class="text-end" id="DB_Find_Product_total"> <div> <input type="text" class="form-control bg-light border-0 product-line-price" id="productTotal" data_id="'+Number(index+1)+'" placeholder="0.00" value="'+data[index].total+'" readonly="" > </div> </td>';
                returnData +='<td class="text-end" >';
                returnData +='        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ProductModal" data-id="'+data[index].id+'"  ><i  data_id="'+data[index].id+'"  class="ri-delete-bin-5-fill fs-16"></i></button> ';
                returnData +='        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Edit_ProductModal" data-id="'+data[index].id+'" ><i    class=" ri-edit-2-fill fs-16"></i></button> ';
                returnData +='  </td>';
                
                returnData +=' </tr>';
    
            }
    
            $('#productTable').html(returnData);
            $('#productTotalPayment').val(DB_Find_Product_TotalPayment);
        }
        //! Ürün Bilgileri Listeleme Son


        //! Maliyet Listeleme
        function currentListUpdate(data){
            //console.log("data current:",data);

            //! Veriler
            var DB_Find_Expense_List = data.DB_Find_Expense_List;
            var DB_Find_Expense_TotalPayment = data.DB_Find_Expense_TotalPayment;
            var returnData ="";

            for (let index = 0; index < DB_Find_Expense_List.length; index++) {
                const element = DB_Find_Expense_List[index];

                returnData +='<tr id="'+DB_Find_Expense_List[index].id+'" class="product">';
                returnData +=' <th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +=' <td class="text-start">';
                returnData +='     <div class="mb-2 d-flex gap-1">';

                if(DB_Find_Expense_List[index].const == 1) {  returnData +='<div style="display:block"> <span class="badge text-bg-success">Sabit</span></div>'; }
            
                returnData +='        <input type="text" class="form-control bg-light border-0" id="productName-1" placeholder=""  value="'+DB_Find_Expense_List[index].title+'" readonly="readonly" >';
                returnData +='     </div>';
                returnData +='    <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="" readonly="readonly" >'+DB_Find_Expense_List[index].description+'</textarea>';
                returnData +=' </td>';
                returnData +=' <td id="DB_Find_Expense_price" ><input type="text" class="form-control product-price bg-light border-0" id="ProductExpencePrice"  data_id="'+Number(index+1)+'"  step="0.01" placeholder="0.00" value="'+DB_Find_Expense_List[index].price+'" readonly="readonly" ></td>';
                returnData +=' <td class="d-flex gap-3"  > ';
             
                if(DB_Find_Expense_List[index].const == 0) {  returnData +='     <button style="display: block" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ExpenseModal" data-id="'+DB_Find_Expense_List[index].id+'"  ><i   data-id="'+DB_Find_Expense_List[index].id+'" class="ri-delete-bin-5-fill fs-16"></i></button> '; }
             
                returnData +='     <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Edit_ExpenseModal"  data-id="'+DB_Find_Expense_List[index].id+'"  ><i    class=" ri-edit-2-fill fs-16"></i></button> ';
                returnData +=' </td>';
                returnData +=' </tr>';
                
            }

            //! Return
            $("#expenseTable").html(returnData);
            $('#expenseTotalPayment').val(DB_Find_Expense_TotalPayment);
            general();

        } //! Maliyet Listeleme Son

        
        //! Tüm Verileri Güncelle
        document.querySelectorAll("#btn_edit").forEach(function (i) {
            i.addEventListener("click", function (event) {
                general(); //! Fonksiyon Çağırma

                var offerEffectiveDate = $('#offerEffectiveDate').val(); //! Teklif Geçirlilik  Tarihi
                var companyId = $('#selectCurrentCartEdit').val(); //! Firma Bilgileri
                var costCalculationCheck = $('#costCalculationCheckEdit').val(); //! Onay Kontrol
    
                if(offerEffectiveDate == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Teklif Geçerlilik Tarihi Yazılmadı",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else if(companyId == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Firma Seçilmedi",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else if(costCalculationCheck == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Onay Durumu Seçilmedi",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else {
    
                    //! Ajax
                    $.ajax({
                        url: "/cost/calculation/update/post",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id: $('#expense_add_item').attr('data_id'),
                            title: $('#Title_Input').val(),
                            currency:$('#CurrencyAdd').val(),
                            currency_rate:$('#CurrencyRate_Input').val(),
    
                            companyId:$('#selectCurrentCartEdit').val(),
                            companyTitle: $('#selectCurrentCartEdit option[value="'+companyId +'"]').html(),
                           
                            companyAuthorized_person:$('#companyAuthorized_person').val(),
                            companyAuthorized_email:$('#companyAuthorized_person_email').val(),
                            companyAuthorized_tel:$('#companyAuthorized_person_tel').val(),

                            companyAuthorized_person_tax_no: $('#companyAuthorized_person_tax_no').val(),
                            companyAuthorized_person_tax_adm: $('#companyAuthorized_person_tax_adm').val(),
                            companyAuthorized_person_adress: $('#companyAuthorized_person_adress').val(),
    
                            profit:$('#cart_profit').val(),
                            ibm:$('#cart_ibm').val(),
                            serviceFee:$('#cart_serviceFee').val(),

                            exitPoint:$('#exitPoint').val(),
                            clearancePlace:$('#clearancePlace').val(),
                            destination:$('#destination').val(),
                            deliveryLocation:$('#deliveryLocation').val(),

                            releaseDate:$('#releaseDate').val(),
                            shipmentDate:$('#shipmentDate').val(),
                            arrivalDate:$('#arrivalDate').val(),
                            deliveryDate:$('#deliveryDate').val(),
    
                            offerEffectiveDate:$('#offerEffectiveDate').val(),
                            costCalculationCheck:$('#costCalculationCheckEdit').val(),
                            created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                        },
                        success: function (response) {
                            //alert("başarılı");
                            //console.log("response:", response);
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
                                window.location.reload();
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
        }); //! Tüm Verileri Güncelle Son


        //! Talep Formu
        $("#selectCurrentCartEdit").change(function(){ // Değişiklik olduğunda              
            
            var selectFormVal = $('#selectCurrentCartEdit').val();

            console.log("selectFormVal:",selectFormVal);
                            
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
                //console.log("file resp:", resp);

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



 
 });
 