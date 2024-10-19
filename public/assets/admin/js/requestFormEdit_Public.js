    function productListUpdate(data,DB_Find_Product_Ret_Count,DB_Find_Product_TotalPayment) {
        // console.log("data:",data);
        // console.log("DB_Find_Product_Ret_Count:",DB_Find_Product_Ret_Count);
        // console.log("DB_Find_Product_TotalPayment:",DB_Find_Product_TotalPayment);
        
        var returnData ="";

        for (let index = 0; index < data.length; index++) {
            const element = data[index];
    
            returnData +='<tr id="'+data[index].id+'" class="product">';
            returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
            returnData +='<td class="text-start">';
            returnData +='<div class="mb-2">';
            // if(data[index].stockActive == 0) {  returnData +='<div style="display:block"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }
            // else if(data[index].stockActive == 1 ) {  returnData +='<div style="display:none"> <span class="badge text-bg-danger">Onay Bekliyor</span></div>'; }
            returnData +='<input type="text" class="form-control bg-light border-0" id="productName-1"  value="'+data[index].namePublic+'" readonly="readonly" >';
            returnData +='</div>';
            returnData +='<textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" readonly="readonly"  >'+data[index].descriptionPublic +'</textarea>';
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


    }

    //! Ürün Ekleme
    $("#product_add_item_public").click(function (e) {
        e.preventDefault();

        //! Bilgiler
        var nameAdd =  $('#namePublicAdd').val(); //! Ürün Bilgiler
        var gtipNoAdd =  $('#gtipNoAdd').val(); //! GTIP

        var SelectStockUnitAdd =  $('#SelectStockUnitAdd').val(); //! Stok Birimi
        var StockCountAdd =  $('#StockCountAdd').val(); //! Stok Sayısı
        var PriceAdd =  $('#PriceAdd').val(); //! Hedef Birim Fiyat

        if( nameAdd == "" ) { 
            Swal.fire({ 
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameNotWritten]').html().trim(),
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
        else  if(StockCountAdd == "") { 
        
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=StockNotCount]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else  if(PriceAdd == "") { 
        
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=PriceNot]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {

            var total = Number(PriceAdd.replace(',','.'))*Number(StockCountAdd); //! Toplam
            var total = total.toFixed(2); //! Anlamlı Sayı
            var data_id_req =  $('#edit_item').attr('data_id'); //! Id
            
        
            //! Ajax
            $.ajax({
                url: "/request/form/product/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    requestform_id: Number(data_id_req),
                    namePublic: $('#namePublicAdd').val(),
                    nameTr: $('#namePublicAdd').val(),

                    stockUnit: $('#SelectStockUnitAdd').val(),
                    stockCount: $('#StockCountAdd').val(),
                    price: $('#PriceAdd').val(),
                    total: total,
                
                    featuresPublic: $('#featuresPublicAdd').val(),
                    tech_featuresPublic: $('#tech_featuresPublicAdd').val(),
                    descriptionPublic: $('#descriptionPublicAdd').val(),

                    imgUrl: $('#filePathUrl').html(),
                    techFileUrl: $('#filePathUrltechnicalFile').html(),

                    catalogLink: $('#catalogLinkAdd').val(),
                    web_address: $('#webSiteAdd').val(),
                    gtipNo: $('#gtipNoAdd').val(),
                    
                    isActive: false,
                    created_byId: 0
                },
                success: function (response) {
                    // alert("başarılı");
                    console.log("response eklendi:", response);
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


    //! Silme #2
    function DeleteItem(items) {
        //! Veriler
        var data_id = items;

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
    } //! Silme #2

//! ************ Silme Son  ***************

        
//! ************ Güncelle  ***************

    //! Modal Güncelle
    $('document').ready(function () {
        $("#Edit_ProductModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
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
                beforeSend: function() { console.log("Başlangıc");  },
                success: function (response) {
                    // alert("başarılı");
                    // console.log("response:", response);
                    // console.log("status:", response.status);

                    //! Return
                    $('#update_data_id').html(modalId);
                    $('#namePublicEdit').val(response.DB.namePublic);

                    
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
                    
                    $('#featuresPublicEdit').val(response.DB.featuresPublic);
                    $('#tech_featuresPublicEdit').val(response.DB.tech_featuresPublic);
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

                    console.log("Search Ajax Bitti");
        
                }
            }); //! Ajax Post Son
            

            //! Return
            $('#update_data_id').html(modalId);

            //! Görünürlük Kontrolleri
            $('#LoadingFileUploadUpdate').css('display','none');
            $('#ModalBodyInfoUpdate').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
    }); //! Modal Güncelle Son


    //! Güncelle
    $("#data_productUpdate").click(function (e) {
        e.preventDefault();

        //! Bilgiler
        var nameEdit =  $('#namePublicEdit').val(); //! Ürün Bilgiler
        var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val(); //! Stok Birimi
        var StockCountEdit =  $('#StockCountEdit').val(); //! Stok Sayısı
        var PriceEdit =  $('#PriceEdit').val(); //! Hedef Birim Fiyat

        //! SelectStockUnitAdd Yok İse
   
        if( nameEdit == "" ) { 
            Swal.fire({ 
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=NameNotWritten]').html().trim(),
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
        else  if(StockCountEdit == "") { 
        
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=StockNotCount]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else  if(PriceEdit == "") { 
        
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=PriceNot]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {

            //! Bilgileri
            var total = Number(PriceEdit.replace(',','.'))*Number(StockCountEdit); //! Toplam
            total = total.toFixed(2); //! Anlamlı Sayı
            var data_id =  $('#update_data_id').html();  //! Id
            var data_id_req =  $('#edit_item').attr('data_id'); //! Id

            //! Ajax
            $.ajax({
                url: "/request/form/product/update/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    requestform_id: Number(data_id_req),
                    public: true,
                    namePublic: $('#namePublicEdit').val(),
                
                    stockUnit: $('#SelectStockUnitEdit').val(),
                    stockCount: $('#StockCountEdit').val(),
                    price: $('#PriceEdit').val(),
                    total: total,

                    featuresPublic: $('#featuresPublicEdit').val(),
                    tech_featuresPublic: $('#tech_featuresPublicEdit').val(),
                    descriptionPublic: $('#descriptionPublicEdit').val(),
                
                    catalogLink: $('#catalogLinkEdit').val(),
                    web_address: $('#webSiteEdit').val(),
                    gtipNo: $('#gtipNoEdit').val(),
                  

                    imgUrl: $('#filePathUrlEdit').html(),
                    techFileUrl: $('#filePathUrltechnicalFileEdit').html(),
                
                    created_byId: 0
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

                        //! Kapatma
                        $("#Edit_ProductModal").modal('hide');
                        

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


//! ************ Güncelle ***************

//Güncelle Public
$("#data_public_update").click(function (e) {
    e.preventDefault();
    

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

    if (selectCurrentCartEdit == "") {
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
        var data_id =  $('#data_public_update').attr('data_id');

        //! Ajax
        $.ajax({
            url: "/request/form/edit/public/post",
            method: "post",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            data: {
                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                id: Number(data_id),
                currency: $('#SelectProductCurrencyAdd').val(),
                description: $('#requestFormDescription').val(),
                requestEffectiveDate: $('#offerEffectiveDateEdit').val(),
                

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
                updated_byId: 0
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

}); //! //Güncelle Public Son

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



   
