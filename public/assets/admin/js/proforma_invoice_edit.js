$(function () {

    //alert("sabit");
    //console.log("js çalışıyor");

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

                    console.log("selectType:",selectType);

                    //! Ajax  Post
                    $.ajax({
                        url: "/cost/calculation/product/search/post",
                        method: "post",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id:Number(selectType)
                        },              
                        beforeSend: function() { console.log("Başlangıc"); },
                        success: function (response) {
                            // alert("başarılı");
                            console.log("response:", response);
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
                           $('#filePathUrlTechnicalFile').html(response.DB.techFileUrl);
                            
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
                        error: function (error) { console.log("search error:", error); alert("error");},
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
                    //console.log("productIDSearch:",productIDSearch);

                    //! Ajax  Post
                    $.ajax({
                        url: "/cost/calculation/product/search/post",
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
                            $('#stockEdit').attr('data_stock_id',response.DB.stock_id);
                        
                            $('#nameTrEdit').val(response.DB.nameTr);
                            $('#nameEnEdit').val(response.DB.nameEn);
                            
                            $('#StockCodeEdit').val(response.DB.stockCode);
                            $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                            $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);

                            $('#filePathUrlEdit').html(response.DB.imgUrl);
                            $('#filePathUrlTechnicalFileEdit').html(response.DB.techFileUrl);
                            
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
                        error: function (error) { console.log("search error:", error); alert("error");},
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
        $('#product_add_item').click(function(){   
            //alert("ürün ekleme"); 

            var nameTrAdd =  $('#nameTrAdd').val();
            var nameEnAdd =  $('#nameEnAdd').val();
    
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
                var data_id =  $('#btn_edit').attr('data_id');
                
                //! Ajax
                $.ajax({
                    url: "/proforma/invoice/product/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        time: Number($('#btn_edit').attr('data_time')),
                        proforma_id: Number(data_id),
                        sector: Number($('#stockAdd').attr('data_sector')),
                        sub_sector: Number($('#stockAdd').attr('data_sub_sector')),
                        stock_id: Number($('#stockAdd').attr('data_stock_id')),
                        cost_calculation_id: Number($('#stockAdd').val()),
                        
                        nameTr: $('#nameTrAdd').val(),
                        imgUrl: $('#filePathUrl').html(),
                        techFileUrl: $('#filePathUrlTechnicalFile').html(),
                        
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
                            $('#filePathUrlTechnicalFile').html("");
    
                            //! Progresbar
                            $("#progressBarFileUpload").width('0%');
                            $("#progressBarFileUploadTechnical").width('0%');
    
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
                            url: "/proforma/invoice/product/delete/post",
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
                                    productListUpdate(response.DB_Product,response.DB_Find_Product_Ret_Count,response.DB_Find_Product_TotalPayment);

                                   
    
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
            
                //! Ajax  Post
                $.ajax({
                    url: "/proforma/invoice/product/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },              
                    // beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        console.log("response:", response);
                        //console.log("status:", response.status);

                        //! Return
                        $('#edit_data_id').html(modalId);

                        //! Loading
                        if(response.status == "success") {
                            
                            $('#stockEdit option[value='+response.DB.cost_calculation_id+']').prop('selected',true); //! Select
                            $('#stockEdit').attr('data_sector',response.DB.sector);
                            $('#stockEdit').attr('data_sub_sector',response.DB.sub_sector);
                            $('#stockEdit').attr('data_stock_id',response.DB.stock_id);
                        
                            $('#nameTrEdit').val(response.DB.nameTr);
                            $('#nameEnEdit').val(response.DB.nameEn);

                            $('#StockCodeEdit').val(response.DB.stockCode);
                            $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                            $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);
        
                            $('#filePathUrlEdit').html(response.DB.imgUrl);
                            $('#filePathUrlTechnicalFileEdit').html(response.DB.techFileUrl);
                            
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
                            if(response.DB.imgUrl != "/assets/img/product/default.jpg" && response.DB.imgUrl != "" && response.DB.imgUrl != null ) {
                                $('#filePathUrlEdit').html(response.DB.imgUrl);

                                $('#productViewImage').css('display','block');
                                $('#productViewImage').attr("src",'/'+response.DB.imgUrl);

                                $('#product_dowloand_img').css('display','block');
                                $('#product_dowloand_img').attr("href",'/'+response.DB.imgUrl);
                                $('#product_dowloand_img').attr("download",'urun_resim_'+response.DB.id);
                            }
                            else if(response.DB.imgUrl == "/assets/img/product/default.jpg" || response.DB.imgUrl == "" || response.DB.imgUrl == null ) {
                                $('#productViewImage').css('display','none');
                                $('#product_dowloand_img').css('display','none');
                            }

                            if(response.DB.techFileUrl != "" && response.DB.techFileUrl != null ) {

                                //! Dosya - Teknik
                                $('#filePathUrlTechnicalFileEdit').html(response.DB.techFileUrl);

                                $('#product_dowloand_file').css('display','block');
                                $('#product_dowloand_file').attr("href",'/'+response.DB.techFileUrl);
                                $('#product_dowloand_file').attr("download",'/'+response.DB.techFileUrl);
                            }
                            else if(response.DB.techFileUrl == "" || response.DB.techFileUrl == null ) {
                                $('#product_dowloand_file').css('display','none');
                            }
                            //! Dosya - Resim Son

                            //! Görünürlük Kontrolleri
                            $('#loaderEdit').css('display','none');
                            $('#ModalBodyInfoEdit').css('display','block');
    
                        }
                        else {

                            //! Görünürlük Kontrolleri
                            $('#loaderEdit').css('display','block');
                            $('#ModalBodyInfoEdit').css('display','none');

                        }
                    
            
                    
                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {
            
                        // //! Görünürlük Kontrolleri
                        // $('#LoadingProductSearch').css('display','none');
                        // $('#ModalBodyInfoProductSearch').css('display','block');

                        // console.log("Search Ajax Bitti");
            
                    }
                }); //! Ajax Post Son
                

                //! Return
                $('#edit_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#loaderEdit').css('display','none');
                $('#ModalBodyInfoEdit').css('display','block');
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

        }); //! Modal Güncelle Son

        //! Birim Fiyat
        $('#UnitPriceEdit').keyup(function(){   
            //console.log("yazıyor...");    

            $val = $(this).val(); //!  Birim Fiyat
            $unitPrice = $('#PieceEdit').val(); //! Sayısı

            $return = Number($val.replace(',','.'))*Number($unitPrice); //! Toplam
            $return = $return.toFixed(2); //! Anlamlı Sayı
            $('#totalEdit').html($return); //! Toplam Göster

        });
        //! Birim Fiyat Son

        //! Sayısı
        $('#PieceEdit').keyup(function(){   
            //console.log("yazıyor...");    

          
            $val = $('#PieceEdit').val(); //! Sayısı
            $unitPrice = $('#UnitPriceEdit').val(); //! Sayısı

            $return = Number($unitPrice.replace(',','.'))*Number($val); //! Toplam
            $return = $return.toFixed(2); //! Anlamlı Sayı
            $('#totalEdit').html($return); //! Toplam Göster
        

        });
        //! Sayısı Son

        //! Ürün Tablo Güncelleme
        function productListUpdate(data,DB_Find_Product_TotalPayment) {
            console.log("data:",data);
        
    
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
        //! Ürün Tablo Güncelleme Son

        //! Güncelle
        $("#data_productEdit").click(function (e) {
            e.preventDefault();

            var nameTrEdit =  $('#nameTrEdit').val();
            var nameEnEdit =  $('#nameEnEdit').val();

            var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val();
            var SelectCurrencyEdit =  $('#SelectCurrencyEdit').val();

            var PriceEdit =  $('#PriceEdit').val();

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
            else if(PriceEdit == "") { 

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Birim Fiyat Yazılmadı",
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
                var data_id =  $('#edit_data_id').html();  //! Id

                //! Ajax
                $.ajax({
                    url: "/proforma/invoice/product/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number(data_id),
                        data_id: $('#btn_edit').attr('data_id'),
                        sector: Number($('#stockEdit').attr('data_sector')),
                        sub_sector: Number($('#stockEdit').attr('data_sub_sector')),
                        stock_id: Number($('#stockEdit').attr('data_stock_id')),
                        requestform_product_id: Number($('#stockEdit').val()),
                    
                        nameTr: $('#nameTrEdit').val(),
                        imgUrl: $('#filePathUrlEdit').html(),
                        techFileUrl: $('#filePathUrlTechnicalFileEdit').html(),
                    
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
                            $("#Edit_ProductModal").modal('hide');

                            //! Product Liste Güncelle
                            productListUpdate(response.DB_Product,response.DB_Find_Product_TotalPayment);

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

    //! ************ Şart  Ekleme  ***************
        //! Ekleme
        $("#new_conditions_add").click(function (e) {
            e.preventDefault();

            //! Veriler
            var conditionsNew = $('#ConditionsAdd').val();

            if(conditionsNew == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Şart Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/proforma/invoice/conditions/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        proforma_id: $('#ProformaIDAdd').val(),
                        title: $('#ConditionsAdd').val(),
                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
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


                            //! Şartlar Tablo Güncelle
                            conditionsListUptate(response.DB_Find_conditions,"0");

                            //! Temiz
                            $('#ConditionsAdd').val("")

                            //! Return
                            $("#AddConditionsModal").modal('hide');
                            

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

            

        }); //! Ekleme Son
    //! ************ Şart Ekleme Son  ***************

    //! ************ Şart Silme  ***************
        //! Şart Silme
        $('document').ready(function () {
            $("#Delete_ConditionsModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Delete_ConditionsModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 
                var data_general = button.data("general"); 

                //! Return
                console.log("data_id:",data_id);
                console.log("data_general:",data_general);

                //! Modal id
                $('#delete_expense_data_id').html(data_id);

                //! Modal Kapatma
                $("#Delete_ConditionsModal").modal('hide');
               

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
                            url: "/proforma/invoice/conditions/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                proforma_id: $('#ProformaIDUpdate').val(),
                                isGeneral:   data_general,
                            },
                            success: function (response) {
                                // alert("başarılı");
                                console.log("response Silme:", response);
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
                                    $("#Delete_ConditionsModal").modal('hide');

                                    //! Şartlar Tablo Güncelle
                                    conditionsListUptate(response.DB_Find_conditions,data_general);

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
                });
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Şart Silme Son
    //! ************Şart  Silme Son  ***************

    //! ************ Güncelle  ***************

        //! Şartlar Tablo Güncelle
        function conditionsListUptate(data,general){
            console.log('conditionsListUptate - data:',data);
            console.log('conditionsListUptate - general:',general);

            var returnData ="";
    
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
            
                returnData +='<tr id="'+data[index].id+'" class="conditions">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start">';
                returnData +='<input type="text" class="form-control bg-light border-0" id="Title-1"  value="'+data[index].title+'" readonly="readonly" >';
                returnData +=' </td>'; 

                returnData +='<td class="text-end" >';
                returnData +='   <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ConditionsModal" data-id="'+data[index].id+'"  data-general = "'+general+'" ><i  data_id="'+data[index].id+'"  class="ri-delete-bin-5-fill fs-16"></i></button> ';
                returnData +='   <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditConditionsModal" data-id="'+data[index].id+'" data-general = "'+general+'" ><i    class=" ri-edit-2-fill fs-16"></i></button> ';
                returnData +='</td>';
                
                returnData +=' </tr>';
    
            }

            //! Göster
            if(general == "1") { $('#productConditionsTable_General').html(returnData); }
            else if(general == "0") { $('#productConditionsTable_Special').html(returnData); }
    
           

        }
        //! Şartlar Tablo Güncelle Son

        //! Modal Şartlar Güncelle
        $('document').ready(function () {
            $("#EditConditionsModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Modal Açıldı");
            
                var button = $(event.relatedTarget); 
                var modalId = button.data("id"); 
                var data_general = button.data("general"); 

                //! Return
                // console.log("modalId:",modalId);
                // console.log("data_general:",data_general);
            
                //! Ajax  Post
                $.ajax({
                    url: "/proforma/invoice/conditions/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },              
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        // alert("başarılı");
                        // console.log("response:", response);
                        // console.log("status:", response.status);

                        $('#ConditionsEdit').val(response.DB.title);
                        $('#data_conditions_update').attr('data_isgeneral',response.DB.isGeneral);
                      
                    
                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {
            
                        //! Görünürlük Kontrolleri
                        $('#LoadingConditionsUpdate').css('display','none');
                        $('#ModalBodyInfConditionsUpdate').css('display','block');

                        // console.log("Search Ajax Bitti");
            
                    }
                }); //! Ajax Post Son
                

                //! Return
                $('#update_conditions_data_id').html(modalId);
            

                //! Görünürlük Kontrolleri
                $('#loaderEdit').css('display','none');
                $('#ModalBodyInfoEdit').css('display','block');
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

        }); //! Modal Şartlar Güncelle Son

        //! Güncelle
        $("#data_conditions_update").click(function (e) {
            e.preventDefault();

            //! Veriler
            var data_id =  $('#update_conditions_data_id').html(); //! Id
            var isGeneral =  $('#data_conditions_update').attr('data_isgeneral'); //! isGeneral

            //! Veriler
            var conditionsEdit = $('#ConditionsEdit').val();

            if(conditionsEdit == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Şart Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/proforma/invoice/conditions/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number(data_id),
                        proforma_id: $('#ProformaIDUpdate').val(),
                        isGeneral:   $('#data_conditions_update').attr('data_isgeneral'),
                        title: $('#ConditionsEdit').val(),
                        updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        // alert("başarılı");
                        console.log("response edit:", response);
                        // console.log("status:", response.status);

                        if (response.status == "success") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });

                            //! Şartlar Tablo Güncelle
                            conditionsListUptate(response.DB_Find_conditions,isGeneral);

                            //! Return
                            $("#EditConditionsModal").modal('hide');

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


    //! ************ Banka    ***************
    //! Aktif
    document.querySelectorAll("#listItemActive").forEach(function (i) {
        i.addEventListener("click", function (event) {
        
            //! Attr - Diğer Veri Alma
            var data_id = event.target.getAttribute("data_id");
            var data_active_status = event.target.getAttribute("data_active");

            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+' #'+data_id+'</h4></div></div>',
                showCancelButton: true,
                confirmButtonColor: data_active_status == "true" ? "#ed1c24" : "#1bb934",
                confirmButtonText: data_active_status == "true" ? $('[id=lang_change][data_key=MakePassive]').html().trim() : $('[id=lang_change][data_key=Activate]').html().trim(),
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/proforma/invoice/bank/edit/active",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr( "content" ), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id: data_id,
                            active: data_active_status,
                            updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                        },
                        success: function (response) {
                            // alert("başarılı");
                            // console.log("response:", response);
                            // console.log("success:", response.status);

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
                    }); //! Ajax
                }
            });

        });
    }); //! Aktif Son
    //! ************ Banka  Aktif Son ***************

    //! ************ Ara  ***************

    //! Modal Banka Ara
    $('document').ready(function () {
        $("#searchModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 

            //console.log("modalId:",modalId);

            //! Ajax  Post
            $.ajax({
                url: "/proforma/invoice/bank/search/post",
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

                    $('#CurrencyCartIDSearch').val(response.DB.currencyCartId);
                    $('#bankaAccountTitleSearch').val(response.DB.bankaAccountTitle);
                    $('#BankTitleSearch').val(response.DB.bankTitle);
                    $('#BranchSearch').val(response.DB.branch);
                    $('#AcountNumberSearch').val(response.DB.accountNumber);

                    $('#IbanSearch').val(response.DB.iban);
                    $('#SwiftSearch').val(response.DB.swift);
                
                },
                error: function (error) { console.log("search error:", error); alert("error");},
              complete: function() {}
            }); //! Ajax Post Son

              
            //! Return
            $('#search_data_id').html(modalId);

            
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Banka Ara Son

    //! ************ Ara Son  ***************

    //! ************ Güncelle  ***************

    //! Şartlar Tablo Güncelle
    function bankaListUptate(data){
        //console.log('bankaListUptate - data:',data);
      
        var returnData ="";

        returnData +='<tr style="display:none;"  id="tableConst" ><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> </tr>';

        for (let index = 0; index < data.length; index++) {
            const element = data[index];
        
            returnData +='<tr>';
            returnData +='<td exportname="Id" id="itemID" class="type">'+Number(index+1)+'</th>';
            returnData +='<td exportname="CreatedDate" class="order_date">'+data[index].created_at+'</td>';

            returnData +='<td exportname="bankaAccountTitle" >'+data[index].bankaAccountTitle+'</td>';
            returnData +='<td exportname="bankTitle" >'+data[index].bankTitle +'</td>';
            returnData +='<td exportname="branch" >'+data[index].branch  +'</td>';
            returnData +='<td exportname="accountNumber" >'+data[index].accountNumber +'</td>';
            returnData +='<td exportname="iban" >'+data[index].iban +'</td>'; 
            returnData +='<td exportname="swift" >'+data[index].swift +'</td>';

            returnData +='<td exportname="Status" class="status" id="tableStatus" data_val="'+data[index].isActive+'">';
            //if(data[index].isActive == 1) { returnData +='<span class="badge badge-soft-success text-uppercase" >'+$('[id=lang_change][data_key=Active]').html().trim()+'</span>'; }
            //else if(data[index].isActive == 0 ) { returnData +='<span class="badge badge-soft-success text-uppercase" >'+$('[id=lang_change][data_key=Passive]').html().trim()+'</span>'; }
            returnData +='</td>';
         

            returnData +='<td exportname="Actions" id="listItemActionBox" > ';
            returnData +=' <ul class="list-inline hstack gap-2 mb-0">';
            
            returnData +='<li class="list-inline-item"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="View"><a  data-bs-toggle="modal" data-bs-target="#searchModal" data-id="'+data[index].id+'" class="view-item-btn text-success" style="cursor:pointer;"><i class="ri-search-eye-line align-bottom "></i></a> </li> ';
            returnData +='<li class="list-inline-item edit"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#Bankedit_modal" data-id="'+data[index].id+'" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i> </a> </li>';
            returnData +='<li class="list-inline-item edit"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Remove"  style="cursor:pointer;"> <a data-bs-toggle="modal" data-bs-target="#Delete_BankModal" data-id="'+data[index].id+'" class="text-danger d-inline-block edit-item-btn"> <i class="ri-delete-bin-5-fill fs-16"></i> </a> </li>';
            
            returnData +='</ul>';
            returnData +='</td>';
            
            returnData +=' </tr>';

        }

        //! Göster
        $('#bankaTable_List').html(returnData);
        $('#bankListCount').html(data.length);

        //! Sayısı Kontrol
        if(data.length == 0 ) { $('#dataNoItemList').css('display','block'); }
        else if(data.length > 0 ) { $('#dataNoItemList').css('display','none'); }

    }
    //! Şartlar Tablo Güncelle Son
    

    //! Modal Banka Güncelle
    $('document').ready(function () {
        $("#Bankedit_modal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 

            //console.log("modalId:",modalId);
           
            //! Ajax  Post
            $.ajax({
                url: "/proforma/invoice/bank/search/post",
                method: "post",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id:Number(modalId)
                },              
                // beforeSend: function() { console.log("Başlangıc"); },
                success: function (response) {
                    // alert("başarılı");
                    //console.log("response:", response);
                    // console.log("status:", response.status);

                    $('#CurrencyCartIDEdit').val(response.DB.currencyCartId);
                    $('#bankaAccounttitleEdit').val(response.DB.bankaAccountTitle);
                    $('#BanktitleEdit').val(response.DB.bankTitle);
                    $('#BranchEdit').val(response.DB.branch);
                    $('#AcountNumberEdit').val(response.DB.accountNumber);

                    $('#IbanEdit').val(response.DB.iban);
                    $('#SwiftEdit').val(response.DB.swift);
        
                
                },
                error: function (error) { console.log("search error:", error); alert("error");},
                complete: function() {
        
                    //! Görünürlük Kontrolleri
                    $('#BankLoadingFileUploadEdit').css('display','none');
                    $('#BankaModalBodyInfoEdit').css('display','block');

                    //console.log("Search Ajax Bitti");
        
                }
            }); //! Ajax Post Son
             

            //! Return
            $('#update_bank_data_id').html(modalId);
           

            //! Görünürlük Kontrolleri
            $('#loaderEdit').css('display','none');
            $('#ModalBodyInfoEdit').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Banka Güncelle Son

    //! Güncelle
    $("#data_bank_edit").click(function (e) {
        e.preventDefault();
        

        //! Id
        var data_id =  $('#update_bank_data_id').html();

        //! Veriler
        var bankaAccountTitle = $('#bankaAccounttitleEdit').val();
        var BankTitle = $('#BanktitleEdit').val();
        var Branch = $('#BranchEdit').val();
        var AcountNumber = $('#AcountNumberEdit').val();
        var Iban = $('#IbanEdit').val();
        var Swift = $('#SwiftEdit').val();

        if(bankaAccountTitle == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Banka Hesap Adı ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(BankTitle == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Banka ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Branch == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Şube ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(AcountNumber == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Hesap Numarası ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Iban == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Iban ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Swift == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Swift ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else {

            //! Ajax
            $.ajax({
                url: "/proforma/invoice/bank/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    proforma_id: $('#ProformaIDUpdate').val(),
                    bankaAccountTitle: $('#bankaAccounttitleEdit').val(),
                    bankTitle: $('#BanktitleEdit').val(),
                    branch: $('#BranchEdit').val(),
                    accountNumber: $('#AcountNumberEdit').val(),
                    iban: $('#IbanEdit').val(),
                    swift: $('#SwiftEdit').val(),
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

                        //! Liste Güncelleme
                        bankaListUptate(response.DB_Find_Bank);

                        //! Modal Temizleme
                        $("#Edit_BankaForm")[0].reset();

                        //! Modal Kapatma
                        $("#Bankedit_modal").modal('hide');

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

    //! ************ Banka Silme  ***************
        $('document').ready(function () {
            $("#Delete_BankModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                // alert("Delete_BankModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

                //! Return
                //console.log("data_id:",data_id);
                $('#delete_banka_data_id').html(data_id);

                //! Modal Kapatma
                $("#Delete_BankModal").modal('hide');

       
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
                            url: "/proforma/invoice/bank/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                id: data_id,
                                proforma_id: $('#ProformaIDUpdate').val(),
                            },
                            success: function (response) {
                                // alert("başarılı");
                                //console.log("response Sil:", response);
                                // console.log("status:", response.status);
    
                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });

                                    //! Liste Güncelleme
                                    bankaListUptate(response.DB_Find_Bank);

                                    //! Modal Kapatma
                                    $("#Delete_BankModal").modal('hide');
    
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
                });

               
            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); 
    //! ************Banka  Silme Son  ***************


    //! ************ Banka  Ekleme  ***************
    //! Ekleme
    $("#new_bank_add").click(function (e) {
        e.preventDefault();

        //! Veriler
        var bankaAccountTitle = $('#bankaAccountTitleAdd').val();
        var BankTitle = $('#BankTitleAdd').val();
        var Branch = $('#BranchAdd').val();
        var AcountNumber = $('#AcountNumberAdd').val();
        var Iban = $('#IbanAdd').val();
        var Swift = $('#SwiftAdd').val();

        if(bankaAccountTitle == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Banka Hesap Adı ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(BankTitle == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Banka ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Branch == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Şube ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(AcountNumber == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Hesap Numarası ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Iban == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Iban ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(Swift == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: " [ Swift ] Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else {

            //! Ajax
            $.ajax({
                url: "/proforma/invoice/bank/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    proforma_id: $('#ProformaIDAdd').val(),
                    bankaAccountTitle: $('#bankaAccountTitleAdd').val(),
                    bankTitle: $('#BankTitleAdd').val(),
                    branch: $('#BranchAdd').val(),
                    accountNumber: $('#AcountNumberAdd').val(),
                    iban: $('#IbanAdd').val(),
                    swift: $('#SwiftAdd').val(),
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
                        
                        //! Liste Güncelleme
                        bankaListUptate(response.DB_Find_Bank);

                        //! Modal Temizleme
                        $("#Add_BankaForm")[0].reset();

                        //! Modal Kapatma
                        $("#Bankaadd_modal").modal('hide');

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

       

    }); //! Ekleme Son
    //! ************Banka Ekleme Son  ***************


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
            error: function (error) { console.log("search error:", error); alert("error");},
          
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
                    $('#product_dowloand_imgAdd').attr("download",resp.file_name);


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
                    $('#product_dowloand_img').attr("download",resp.file_name);


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

                            $("#progressBarFileUploadTechnical").width(percentComplete + '%');
                            $("#progressBarFileUploadTechnical").html(percentComplete+'%');

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
                    $("#progressBarFileUploadTechnical").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFile').toggle();
                    $('#uploadStatus').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFile').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFile').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFile').html("");

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
                    $("#progressBarFileUploadTechnical").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFile').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFile').html(resp.file_url);
                    $('#product_dowloand_fileAdd').css('display','block');
                    $('#product_dowloand_fileAdd').attr("href",resp.file_path);
                    $('#product_dowloand_fileAdd').attr("download",resp.file_name);


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

                            $("#progressBarFileUploadTechnicalEdit").width(percentComplete + '%');
                            $("#progressBarFileUploadTechnicalEdit").html(percentComplete+'%');

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
                    $("#progressBarFileUploadTechnicalEdit").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFileEdit').toggle();
                    $('#uploadStatus').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFileEdit').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFileEdit').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFileEdit').html("");


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
                    $("#progressBarFileUploadTechnicalEdit").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadTechnicalFileEdit').hide();

                    //! Upload Url
                    $('#filePathUrlTechnicalFileEdit').html(resp.file_url);
                    $('#product_dowloand_file').css('display','block');
                    $('#product_dowloand_file').attr("href",resp.file_path);
                    $('#product_dowloand_file').attr("download",resp.file_name);


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


        
    //! ************ Güncelle  ***************

        //! Güncelle
        $("#btn_edit").click(function (e) {
            e.preventDefault();

                var proformaDate = $('#proformaDate').val(); //! Proforma  Tarihi
                var proformaNo = $('#proformaNo').val(); //! Proforma  No
                var offerEffectiveDate = $('#offerEffectiveDate').val(); //! Teklif Geçirlilik  Tarihi
                var proformaCheckEdit = $('#proformaCheckEdit').val(); //! Proforma Onayladı mı

                var VisibilityAdd = $('#VisibilityAdd').val(); //! Public
                var CurrencyAdd = $('#CurrencyAdd').val(); //! Para Birimi
                var companyId = $('#selectCurrentCartEdit').val(); //! Firma Bilgileri

                var vendorDeliveryTypeAdd_Val = $('#vendorDeliveryTypeAdd').val(); //! Teslim Şekli
                var paymentMethodAdd_Val = $('#paymentMethodAdd').val(); //! Ödeme Şekli
                var modeofTransportAdd_Val = $('#modeofTransportAdd').val(); //! Nakliyet Şekli
                var shipmentTypeAdd_Val = $('#shipmentTypeAdd').val(); //! Sevk Şekli

                if(proformaDate == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Proforma Tarihi Yazılmadı",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else  if(proformaNo == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Proforma No Yazılmadı",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else  if(offerEffectiveDate == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Teklif Geçerlilik Tarihi Yazılmadı",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else  if(proformaCheckEdit == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Proforma Onaylandı mı",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else  if(VisibilityAdd == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Gizlilik Seçilmedi",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                else  if(CurrencyAdd == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Para Birimi Seçilmedi",
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

                    //! Ajax
                    $.ajax({
                        url: "/proforma/invoice/edit/post",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id: $('#btn_edit').attr('data_id'),
                            title: $('#Title_Input').val(),
                            public: $('#VisibilityAdd').val(),
                            currency: $('#CurrencyAdd').val(),
                            description: $('#description').val(),

                            organizingStafCompanyTitle:$('#organizingStafCompanyTitle').val(),
                            organizingStafCompanyAdress:$('#organizingStafCompanyAdress').val(),
                            organizingStaff:$('#organizingStaff').val(),
                            organizingStafTel:$('#organizingStafTel').val(),
                            organizingStafEmail:$('#organizingStafEmail').val(),
                        
                            companyId:$('#selectCurrentCartEdit').val(),
                            companyTitle: $('#selectCurrentCartEdit option[value="'+companyId +'"]').html(),

                            companyAuthorized_person:$('#companyAuthorized_person').val(),
                            companyAuthorized_email:$('#companyAuthorized_person_email').val(),
                            companyAuthorized_tel:$('#companyAuthorized_person_tel').val(),

                            companyAuthorized_person_tax_no: $('#companyAuthorized_person_tax_no').val(),
                            companyAuthorized_person_tax_adm: $('#companyAuthorized_person_tax_adm').val(),
                            companyAuthorized_person_adress: $('#companyAuthorized_person_adress').val(),

                            vendorDeliveryType: $('#vendorDeliveryTypeAdd').val(),
                            vendorDeliveryType_Title: $('#vendorDeliveryTypeAdd option[value="'+vendorDeliveryTypeAdd_Val+'"]').attr('data_title'),
                            paymentMethod: $('#paymentMethodAdd').val(),
                            paymentMethod_Title: $('#paymentMethodAdd option[value="'+paymentMethodAdd_Val +'"]').attr('data_title'),

                            
                            modeofTransport: $('#modeofTransportAdd').val(),
                            modeofTransport_Title: $('#modeofTransportAdd option[value="'+modeofTransportAdd_Val +'"]').attr('data_title'),
                        
                            shipmentType: $('#shipmentTypeAdd').val(),
                            shipmentType_title: $('#shipmentTypeAdd option[value="'+shipmentTypeAdd_Val  +'"]').attr('data_title'),

                            exitPoint:$('#exitPoint').val(),
                            clearancePlace:$('#clearancePlace').val(),
                            deliveryPlace:$('#deliveryPlace').val(),

                            orderPercentage:$('#orderPercentage').val(),
                            orderValue:$('#orderValue').val(),
                            shipmentPercentage:$('#shipmentPercentage').val(),
                            shipmentValue:$('#shipmentValue').val(),
                            deliveryPercentage:$('#deliveryPercentage').val(),
                            deliveryValue:$('#deliveryValue').val(),
                        
                            proformaDate:$('#proformaDate').val(),
                            proformaNo:$('#proformaNo').val(),
                            offerEffectiveDate:$('#offerEffectiveDate').val(),
                            proformaCheck:$('#proformaCheckEdit').val(),
                            created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                        },
                        success: function (response) {
                            //alert("başarılı");
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
            
        
        }); //! Güncelle Son

    //! ************ Güncelle Son  ***************


 
 });
 