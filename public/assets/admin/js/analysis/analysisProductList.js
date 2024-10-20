var contactList, perPage = 10;
var options = { valueNames: ["order_date", "currency_name", "type", "quantity_value", "order_value", "avg_price", "price", "status"], page: perPage, pagination: !0, plugins: [ListPagination({ left: 2, right: 2 })] };
var ContactList = document.getElementById("contactList");
var paginationNext = (ContactList && (contactList = new List("contactList", options).on("updated", function (e) { 0 == e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "block" : document.getElementsByClassName("noresult")[0].style.display = "none"; var t = 1 == e.i, n = e.i > e.matchingItems.length - e.page; document.querySelector(".pagination-prev.disabled") && document.querySelector(".pagination-prev.disabled").classList.remove("disabled"), document.querySelector(".pagination-next.disabled") && document.querySelector(".pagination-next.disabled").classList.remove("disabled"), t && document.querySelector(".pagination-prev").classList.add("disabled"), n && document.querySelector(".pagination-next").classList.add("disabled"), e.matchingItems.length <= perPage ? document.querySelector(".pagination-wrap").style.display = "none" : document.querySelector(".pagination-wrap").style.display = "flex", 0 < e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "none" : document.getElementsByClassName("noresult")[0].style.display = "block" }), isCount = (new DOMParser).parseFromString(contactList.items.slice(-1)[0]._values.id, "text/html")), document.querySelector(".pagination-next")), paginationPrev = (paginationNext && document.querySelector(".pagination-next").addEventListener("click", function () { !document.querySelector(".pagination.listjs-pagination") || document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() }), document.querySelector(".pagination-prev")); paginationPrev && document.querySelector(".pagination-prev").addEventListener("click", function () { !document.querySelector(".pagination.listjs-pagination") || document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() });


    //! ************ Tümü Seç Olayı ***************
    
    //! Tümü Seçme
    $('input[type="checkbox"][id="showAllRows"]').click(function () {
        //alert("Tümü Seçme");

        //! Tanım
        var checkItemsArray = [];  //! Tüm Seçilenler
        var table = document.getElementById("customerTable"); //! Table
        var tableTr = table.getElementsByTagName("tr"); //! Sayısı

        for (let index = 0; index < tableTr.length; index++) {
            const checked_Id_class = tableTr[index].id; //! id
            const checked_Id_text = tableTr[index].cells[1].innerHTML.trim(); //! Text id
            const checked_Display = tableTr[index].style.display; //! Display

            //! Görünürlük
            if(checked_Display != 'none' && checked_Id_text != "Id" ) {
                $("input[type=checkbox][id=checkItem][data_check_id="+checked_Id_text+"]").prop('checked',$(this).prop('checked') ); //! Seç
                if($(this).prop('checked') == true ) {  checkItemsArray.push(checked_Id_text);  } //! Ekle 
            }

        }

        $('#showAllRows').attr('data_value',checkItemsArray.join(",")); //! Seçilenleri Gösterme

    //! Tüm Seçilenler Son

    //! Seçim Paneli
    choosePanelView();

    }); //! Tümü Seçme Son


    //! Check
    $('input[type="checkbox"][id="checkItem"]').click(function () {
        //console.log("Checkbox Tıklandı");
        
        //! Tanım
        var durum = $(this).prop('checked'); //! Check
        var data_check_id = $(this).attr('data_check_id'); //! id

        var allCheckItems = $('#showAllRows').attr('data_value'); //! 0,1,2
        var allCheckItemsArray = allCheckItems.split(','); //! Ayrım

        if(durum == true ) { !allCheckItemsArray.includes(data_check_id) && allCheckItemsArray.push(data_check_id); } //! Ekleme İşlemi
    
        //! Seçili Değilse Silme
        if(durum==false) {  allCheckItemsArray.includes(data_check_id) && allCheckItemsArray.splice(allCheckItemsArray.indexOf(data_check_id ),1);  } //! Seçili Değilse Silme Son

        //! Array içine ekleme
        allCheckItemsArray.includes("") && allCheckItemsArray.splice(allCheckItemsArray.indexOf(""),1); //! Boş Olanı Siliyor
        $('#showAllRows').attr('data_value',allCheckItemsArray.join(",")); //! Seçilenleri Gösterme
        //console.log("allCheckItemsArray:", allCheckItemsArray);
        
    //! Seçim Paneli
        choosePanelView();

    }); //Checkbox Tıklama Son


    //! Panel Gösterme Durum
    function choosePanelView() {

        //! Seçili Olanlar
        var checkAll =  $('#showAllRows').attr('data_value'); //! Seçili Olanlar
        var allCheckItemsArray = checkAll.split(','); //! Array
        var allCheckItemsArrayLength = allCheckItemsArray.length; //! Sayısı
        var SelectAllStatus = true;

        //! Sayısını Yaz
        $('#choosedItemCount').html(allCheckItemsArrayLength); //! Sayısı Yaz

        //! Gösterme
        if(checkAll == '' ) { $('#choosedPanel').css('display','none'); } 
        else { $('#choosedPanel').css('display','flex'); } 

        //! Tümü Seçme
        var table = document.getElementById("customerTable"); //! Table
        var tableTr = table.getElementsByTagName("tr"); //! Sayısı

        for (let index = 0; index < tableTr.length; index++) {
            const checked_Id_text = tableTr[index].cells[1].innerHTML.trim(); //! Text id
            const checked_Display = tableTr[index].style.display; //! Display

            //! Görünürlük
            if(checked_Display != 'none' && checked_Id_text != "Id" ) {
                var  allCheckItemsStatus = allCheckItemsArray.includes(checked_Id_text);  //! Var mı Kontrol Ediyor
                if(allCheckItemsStatus == false) { SelectAllStatus = false; } //! Tümü Seç Kaldır
            }
        }

        $("input[type=checkbox][id=showAllRows]").prop('checked',SelectAllStatus); //! Tümü Seçme 

    } //! Panel Gösterme Durum Son


    //! Güncelle
    $("#edit_checkedItems").click(function (e) {
        var choosedItemActionText = $('#choosedItemAction').val(); //! Değer Okuma
        console.log("choosedItemActionText:",choosedItemActionText);

        //! Choose
        if(choosedItemActionText =="choose" ) {
            
            Swal.fire({
                position: 'center',
                icon: 'error',
                text: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                showConfirmButton: false,
                timer: 2000
            });
            
        }  //! Choose Son

        //! Delete
        else if(choosedItemActionText =="delete" ) { 

            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4><p>'+$('[id=lang_change][data_key=DeleteWarning]').html().trim()+'</p</div></div>',
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
                        url: "/analysis/product/list/delete/post/multi",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            ids: $('#showAllRows').attr('data_value').split(','),
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
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            console.log("error:", error);
                        },
                    }); //! Ajax Son
                
                }
            });

        } //! Delete Son

   
       


    }); //! Güncelle  Son

    //! ************ Tümü Seç Olayı Son ***************


    //! Tanım
    var searchJsonData = []; //! Aranan Veriler


    //! ************ Params dan Json Oluşturma  ***************

    //! Params dan Json Oluşturma
    function paramsJson() {

        //******** Params -> Json  *****/
    
        //! Params Verileri Parçalıyor
        var searchParams = window.location.search; //! Params Url 
        var searchParamsSplit = searchParams.split('?'); //! Params Ayırma
        var searchParamsArray = []; //! Params Veriler


        //! Params Verileri Alıyor
        searchParamsArray = searchParamsSplit.length >= 2 ? searchParamsSplit[1].split('&') : [];


        //! Paramsdan Json Versi İçine Kayıt Yapma
        searchParamsArray.map(function(data) { 
            
            //! Tanım
            var postData = { "exportname":data.split('=')[0], "text":data.split('=')[1] }; //! Eklenecek Veri
            var searchJsonDataIndex = searchJsonData.find(u=> u.exportname == data.split('=')[0]); //! Arama Yapıyor

            searchJsonDataIndex ? searchJsonDataIndex['text'] = data.split('=')[1] : searchJsonData.push(postData); //! Ekleme ve Güncelleme
            
        }); //! Paramsdan Json Versi İçine Kayıt Yapma Son

        //******** Params -> Json Son  *****/

        //! Sil
        //console.log("searchJsonData:",searchJsonData);

    }; //! Params dan Json Oluşturma Son

    //! Fonksiyon Çalıştırma
    paramsJson();

    //! Params dan Json Oluşturma Son

    //! ************ Params dan Json Oluşturma Son  ***************


    //! ************ Arama  ***************

    //! Arama Fonksiyon
    function searchTableControl(){
        
        //! Sil
        //console.log("searchJsonData:",searchJsonData);

        //! Json Verisinden Params Oluşturma

        //! Tanım
        var searchParamsList =[];  //! Params Veriler
        var newParams = ""; //! Params Verisi

        //! Json -> Params
        searchJsonData.map(function(data){  searchParamsList.push(data.exportname+"="+data.text);  }); //! ['Id=4', 'CreatedDate=2023-04-18', 'Status=1']
        var newParams = "?"+searchParamsList.join('&');  //! ?Id=4&CreatedDate=2023-04-18&Status=1
        var searchUrl = location.origin + location.pathname + newParams; //! Site Adresi?params


        //! Sayfa Yönlendirme
        location.href = searchUrl;

        //! Sil
        console.log("newParams:",newParams);
        //console.log("searchUrl:",searchUrl);
                
    } //! Arama Fonksiyon Son


    //! Arama Id
    document.querySelector('#searhId_Table').addEventListener('keyup', e => {

        //! Tanım
        var filter = $('#searhId_Table').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Id", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Id'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Id Son


     //! Arama Zaman
    document.querySelector('#exampleInputdate').addEventListener('change', e => {

        //! Tanım
        var filter = $('#exampleInputdate').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "CreatedDate", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'CreatedDate'); //! Json İçinde Arama 
    
        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
        
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Zaman Son


    //! Arama Durum
    document.querySelector('#selectActive').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectActive').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Status", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Status'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Durum Son


    //! ************ Arama Son  ***************


    //! ************ Json Verisine Göre Html Kontrol  ***************

    //! Json Html Kontrol
    function JsonHtml_Controller () {

        //! Sil
        // console.log("searchJsonData:",searchJsonData);

        //! Json Verilerini Alıyor
        searchJsonData.map(function(data){

            if(data.exportname == "Id") {  $('#searhId_Table').val( data.text);  } //! Input
            else if(data.exportname == "CreatedDate") {  $('#exampleInputdate').val(data.text); } //! Zaman
            else if(data.exportname == "Status") {  $('#selectActive option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "Sector") {  $('#selectSector option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            
        }); //! Json Verilerini Alıyor Son


        //! Loading Görünürlük
        $('#loader').css('display','none');

    } //! //! Json Html Kontrol Son


    //! Fonksiyon Kullanımı
    JsonHtml_Controller();

    //! ************ Json Verisine Göre Html Kontrol Son  ***************

    

    //! ************ Ekleme  ***************
    //! Ekleme
    $("#new_add").click(function (e) {
        e.preventDefault();

        //! Bilgiler
        var nameTrAdd =  $('#nameTrAdd').val();
        var SelectStockUnitAdd =  $('#SelectStockUnitAdd').val();
        var StockCountAdd =  $('#StockCountAdd').val();
        var SelectCurrencyAdd =  $('#SelectCurrencyAdd').val();
        var PriceAdd =  $('#PriceAdd').val();

        //! SelectStockUnitAdd Yok İse
        if(nameTrAdd == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ürün Adı Yazılmadı",
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
        else  if(StockCountAdd == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: 'Stok Sayısı Yazılmadı',
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else if(SelectCurrencyAdd == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });

        } 
        else if(PriceAdd == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ürün Fiyat Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        } 
        else {

           
            //! Ajax
            $.ajax({
                url: "/analysis/product/list/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    nameTr: $('#nameTrAdd').val(),
                    gtipNo: $('#gtipNoAdd').val(),
                   
                    stockUnit: $('#SelectStockUnitAdd').val(),
                    stockCount: $('#StockCountAdd').val(),
                    currency: $('#SelectCurrencyAdd').val(),
                    price: $('#PriceAdd').val(),

                    descriptionTr: $('#descriptionTRAdd').val(),
                    featuresTr: $('#featuresTRAdd').val(),
                    tech_featuresTr: $('#tech_featuresTRAdd').val(),

                    imgUrl: $('#filePathUrl').html(),
                  
                    isActive:true,
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

    }); //! Ekleme Son
    //! ************ Ekleme Son  ***************


    //! ************ Modal Resim  ***************

    //! Modal Resim
    $('document').ready(function () {
        $("#modalImage").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 

            //! Resim Url
            var modalSrc = button.data("src");
            modalSrc = "/"+modalSrc;
            
        
            //! Return
            $('#image_data_id').html(modalId);
            $('#productViewImage').attr('src',modalSrc);

            //console.log("modalSrc:",modalSrc);

            
            //! Görünürlük Kontrolleri
            $('#LoadingFileUploadImage').css('display','none');
            $('#ModalBodyInfoImage').css('display','block');

        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Resim Son

    //! ************ Modal Resim Son  ***************



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
                        url: "/analysis/product/list/delete/post",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id: data_id,
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
        $("#edit_modal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 
            
            //! Ajax  Post
            $.ajax({
                url: "/analysis/product/list/search/post",
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

                    //! Return
                    $('#edit_data_id').html(modalId);
                  
                    $('#nameTrEdit').val(response.DB.nameTr);
                    $('#gtipNoEdit').val(response.DB.gtipNo);
                    
                    $('#SelectStockUnitEdit option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                    $('#StockCountEdit').val(response.DB.stockCount);
                    $('#SelectCurrencyEdit option[value='+response.DB.currency+']').prop('selected',true); //! Select
                    $('#PriceEdit').val(response.DB.price);

                    $('#descriptionTREdit').val(response.DB.descriptionTr);
                    $('#featuresTREdit').val(response.DB.featuresTr);
                    $('#tech_featuresTREdit').val(response.DB.tech_featuresTr);

                    //! Dosya - Resim
                    if(response.DB.imgUrl != "/assets/img/product/default.jpg" && response.DB.imgUrl != "" && response.DB.imgUrl != null ) {
                        $('#filePathUrlEdit').html(response.DB.imgUrl);

                        $('#productViewImageEdit').css('display','block');
                        $('#productViewImageEdit').attr("src",'/'+response.DB.imgUrl);

                        $('#product_dowloand_imgEdit').css('display','block');
                        $('#product_dowloand_imgEdit').attr("href",'/'+response.DB.imgUrl);
                        $('#product_dowloand_imgEdit').attr("download",'/'+response.DB.imgUrl);
                    }
                    else if(response.DB.imgUrl == "/assets/img/product/default.jpg" || response.DB.imgUrl == "" || response.DB.imgUrl == null ) {
                        $('#productViewImageEdit').css('display','none');
                        $('#product_dowloand_imgEdit').css('display','none');
                    }

                    //! Progresbar
                    $("#progressBarFileUploadEdit").width('0%');
                    $("#progressBarFileUploadtechnicalEdit").width('0%');
        
                },
                error: function (error) { console.log("search error:", error); alert("error");},
               complete: function() {}
            }); //! Ajax Post Son

 
            //! Görünürlük Kontrolleri
            $('#loaderEdit').css('display','none');
            $('#ModalBodyInfoEdit').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Güncelle Son

    //! Güncelle
    $("#edit_item").click(function (e) {
        e.preventDefault();
       
        //! Bilgiler
        var nameTrEdit =  $('#nameTrEdit').val();
        var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val();
        var StockCountEdit =  $('#StockCountEdit').val();
        var SelectCurrencyEdit =  $('#SelectCurrencyEdit').val();
        var PriceEdit =  $('#PriceEdit').val();

        //! SelectStockUnitAdd Yok İse
        if(nameTrEdit == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ürün Adı Yazılmadı",
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
        else  if(StockCountEdit == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: 'Stok Sayısı Yazılmadı',
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else if(SelectCurrencyEdit == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });

        } 
        else if(PriceEdit == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ürün Fiyat Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        } 
        else {

            var data_id =  $('#edit_data_id').html();  //! Id

            //! Ajax
            $.ajax({
                url: "/analysis/product/list/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),

                    nameTr: $('#nameTrEdit').val(),
                    gtipNo: $('#gtipNoEdit').val(),
                 
                    stockUnit: $('#SelectStockUnitEdit').val(),
                    stockCount: $('#StockCountEdit').val(),
                    currency: $('#SelectCurrencyEdit').val(),
                    price: $('#PriceEdit').val(),
                   
                    descriptionTr: $('#descriptionTREdit').val(),
                    featuresTr: $('#featuresTREdit').val(),
                    tech_featuresTr: $('#tech_featuresTREdit').val(),

                    imgUrl: $('#filePathUrlEdit').html(),
                   
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


    //! ************ Ara  ***************

    //! Modal Ara
    $('document').ready(function () {
        $("#searchModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 
          
            
            //! Ajax  Post
            $.ajax({
                url: "/stock/search/post",
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
                    $('#search_data_id').html(modalId);
                    $('#sectorSearched option[value='+response.DB.sector+']').prop('selected',true); //! Select
                    $('#NameSearched').val(response.DB.name);
                    
                    $('#SelectStockUnitSearched option[value='+response.DB.stockUnit+']').prop('selected',true); //! Select
                    $('#StockCountSearched').val(response.DB.stockCount);
                    $('#SelectCurrencySearched option[value='+response.DB.currency+']').prop('selected',true); //! Select
                    $('#PriceSearched').val(response.DB.price);
                    $('#descriptionSearched').val(response.DB.description);
                    $('#featuresSearched').val(response.DB.features);

                     //! Return
        
                
                },
                error: function (error) { console.log("search error:", error); alert("error");},
              complete: function() {}
            }); //! Ajax Post Son
           

           

            //! Görünürlük Kontrolleri
            $('#LoadingFileUploadSearch').css('display','none');
            $('#ModalBodyInfoSearch').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Ara Son

    //! ************ Ara Son  ***************

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

                    //! Upload Url
                    $('#filePathUrlEdit').html(resp.file_url);

                    $('#productViewImageEdit').css('display','block');
                    $('#productViewImageEdit').attr("src",resp.file_path);

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




    
