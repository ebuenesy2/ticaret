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
    $("#update_checkedItems").click(function (e) {
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
                        url: "/stock/delete/post/multi",
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

        //! Aktif
        else if(choosedItemActionText =="active" ) { 
        
            var data_active_status = "false";
            
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4></div></div>',
                showCancelButton: true,
                confirmButtonColor: data_active_status == "true" ? "#ed1c24" : "#1bb934",
                confirmButtonText: data_active_status == "true" ? "Onay Beklemeye Al": "Onayla",
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/stock/update/active/multi",
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            ids: $('#showAllRows').attr('data_value').split(','),
                            active: data_active_status,
                            updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                        },
                        success: function (response) {
                            // alert("başarılı");
                            console.log("response:", response);
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
        }   //! Aktif Son

        //!  Pasif
        else if(choosedItemActionText =="passive" ) { 

        var data_active_status = "true";
            
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4></div></div>',
                showCancelButton: true,
                confirmButtonColor: data_active_status == "true" ? "#ed1c24" : "#1bb934",
                confirmButtonText: data_active_status == "true" ? "Onay Beklemeye Al": "Onayla",
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/stock/update/active/multi",
                        method: "post",
                        headers: {  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            ids: $('#showAllRows').attr('data_value').split(','),
                            active: data_active_status,
                            updated_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                        },
                        success: function (response) {
                            // alert("başarılı");
                            console.log("response:", response);
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
        }   //!  Pasif Son



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

    //! ************ Json Verisine Göre Html Kontrol  ***************

    //! Json Html Kontrol
    function JsonHtml_Controller () {

        //! Sil
        console.log("searchJsonData:",searchJsonData);

        //! Json Verilerini Alıyor
        searchJsonData.map(function(data){

            if(data.exportname == "Id") {  $('#searhId_Table').val( data.text);  } //! Input
            else if(data.exportname == "CreatedDate") {  $('#exampleInputdate').val(data.text); } //! Zaman
            else if(data.exportname == "Status") {  $('#selectActive option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
          
            
        }); //! Json Verilerini Alıyor Son


        //! Loading Görünürlük
        $('#loader').css('display','none');

    } //! //! Json Html Kontrol Son


    //! Fonksiyon Kullanımı
    JsonHtml_Controller();

    //! ************ Json Verisine Göre Html Kontrol Son  ***************
    

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


    //! Arama Sektor
    document.querySelector('#selectSector').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectSector').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Sector", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Sector'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Sektor Son
    
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

    //! ************ Değişimler  ***************
        //! Arama Kategori Add
        document.querySelector('#sectorAdd').addEventListener('change', e => {

            var selectType = $('#sectorAdd').val();
    
            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Sektor Seçilmedi",
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
                        console.log("response:", response);
                        // console.log("status:", response.status);

                        var optionSelect = '<option value="">Başlık Seç</option>';
                        for (let index = 0; index < response.DB.length; index++) {
                            optionSelect+='<option id="typeId" data_title="'+response.DB[index].title+'" data_codeLet="'+response.DB[index].codeLet+'"  value="'+response.DB[index].id+'"  >'+response.DB[index].title+'</option>';
                        }

                        $('#selectSubCategoryAdd').html(optionSelect);

                     
                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {
            
                        // //! Görünürlük Kontrolleri
                        // $('#LoadingFileUploadSearch').css('display','none');
                        // $('#ModalBodyInfoSearch').css('display','block');

                        // console.log("Search Ajax Bitti");
            
                    }
                }); //! Ajax Post Son

            }
        

        }); //! Arama Kategori Add Son
        
        //! Arama Alt Kategori Add
        document.querySelector('#selectSubCategoryAdd').addEventListener('change', e => {

            //! Select
            var sectorAdd =  $('#sectorAdd').val();
            var selectSubCategoryAdd =  $('#selectSubCategoryAdd').val();

            var sectorCode = $('#sectorAdd option[value='+sectorAdd+']').attr('data_codeLet');
            var sub_sectorCode = $('#selectSubCategoryAdd option[value='+selectSubCategoryAdd+']').attr('data_codeLet');
            var stockNumber = $('#new_add').attr('data_stockNumber');

            var StockCode = sectorCode+"-"+sub_sectorCode+"-"+stockNumber;
            var accountingCode_buy = "153"+"."+stockNumber;
            var accountingCode_sel = "610"+"."+stockNumber;

            $('#StockCodeAdd').val(StockCode);
            $('#accountingCodeBuyAdd').val(accountingCode_buy);
            $('#accountingCodeSelAdd').val(accountingCode_sel);

        }); //! Arama Alt Kategori Add Son

        //! Arama Kategori Edit
        document.querySelector('#sectorEdit').addEventListener('change', e => {

            var selectType = $('#sectorEdit').val();
    
            if (selectType == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Sektor Seçilmedi",
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
                         alert("başarılı");
                        //console.log("response:", response);
                        // console.log("status:", response.status);

                        var optionSelect = '<option value="">Başlık Seç</option>';
                        for (let index = 0; index < response.DB.length; index++) {
                            optionSelect+='<option id="typeId" data_title="'+response.DB[index].title+'" data_codeLet="'+response.DB[index].codeLet+'" value="'+response.DB[index].id+'"  >'+response.DB[index].title+'</option>';
                        }

                        $('#selectSubCategoryEdit').html(optionSelect);

                        //! response.DB.title
                    
                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
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
        document.querySelector('#selectSubCategoryEdit').addEventListener('change', e => {

            //! Select
            var sectorEdit =  $('#sectorEdit').val();
            var selectSubCategoryEdit =  $('#selectSubCategoryEdit').val();

            var sectorCode = $('#sectorEdit option[value='+sectorEdit+']').attr('data_codeLet');
            var sub_sectorCode = $('#selectSubCategoryEdit option[value='+selectSubCategoryEdit+']').attr('data_codeLet');
            var stockNumber = $('#edit_item').attr('data_stockNumber');

            var StockCode = sectorCode+"-"+sub_sectorCode+"-"+stockNumber;
            var accountingCode_buy = "153"+"."+stockNumber;
            var accountingCode_sel = "610"+"."+stockNumber;

            $('#StockCodeEdit').val(StockCode);
            $('#accountingCodeBuyEdit').val(accountingCode_buy);
            $('#accountingCodeSelEdit').val(accountingCode_sel);

        }); //! Arama Alt Kategori Add Son

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

    //! ************ Ekleme  ***************
    //! Ekleme
    $("#new_add").click(function (e) {
        e.preventDefault();

        //! Select
        var sectorAdd =  $('#sectorAdd').val();
        var selectSubCategoryAdd =  $('#selectSubCategoryAdd').val();

        var nameTrAdd =  $('#nameTrAdd').val();
        var nameEnAdd =  $('#nameEnAdd').val();

        var SelectStockUnitAdd =  $('#SelectStockUnitAdd').val();
        var StockCountAdd =  $('#StockCountAdd').val();
        var SelectCurrencyAdd =  $('#SelectCurrencyAdd').val();
        var PriceAdd =  $('#PriceAdd').val();

        //! SelectStockUnitAdd Yok İse
        if(sectorAdd == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        } 
        else if(selectSubCategoryAdd == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Alt Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        } 
        else if(nameTrAdd == "") { 
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Ürün Adı Yazılmadı",
            showConfirmButton: false,
            timer: 2000,
        });
        } 
        else if(nameEnAdd == "") { 
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Ad En Yazılmadı",
            showConfirmButton: false,
            timer: 2000,
        });
        } 
        else if(SelectStockUnitAdd == "") { 

        Swal.fire({
            position: "center",
            icon: "error",
            title: 'Stok Birimi Seçiniz',
            showConfirmButton: false,
            timer: 2000,
        });

        }
        else if(StockCountAdd == "") { 

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
                title: "Para Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else if(PriceAdd == "") { 

            Swal.fire({
                position: "center",
                icon: "error",
                title: 'Birim Fiyat Yazılmadı',
                showConfirmButton: false,
                timer: 2000,
            });
    
        }
        else {

            //! Loading - Veri Yükleniyor
            $('#loaderAdd').css('display','block'); //! Laoding Göster
            $('#new_add').attr('disabled','disabled'); //! Button Gizleme
            $('#add_modal input,textarea,select').attr('disabled','disabled'); //! İnputları Gizleme

            //! Loading - Veri Yüklendi
            function loadingYuklendi(){
                $('#loaderAdd').hide(); //! Laoding Gizle
                $('#new_add').removeAttr('disabled'); //! //! Button Göster
                $('#add_modal input,textarea,select').removeAttr('disabled'); //! //! İnputları Göster
            }
            //! Loading - Veri Yüklendi Son

            //! Ajax
            $.ajax({
                url: "/stock/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    sector: $('#sectorAdd').val(),
                    sectorCode:$('#sectorAdd option[value='+sectorAdd+']').attr('data_codeLet'),
                    sub_sector: $('#selectSubCategoryAdd').val(),
                    sub_sectorCode:$('#selectSubCategoryAdd option[value='+selectSubCategoryAdd+']').attr('data_codeLet'),

                    nameTr: $('#nameTrAdd').val(),
                    nameEn: $('#nameEnAdd').val(),

                    imgUrl: $('#filePathUrl').html(),
                    techFileUrl: $('#filePathUrltechnicalFile').html(),
                   
                    stockUnit: $('#SelectStockUnitAdd').val(),
                    stockCount: $('#StockCountAdd').val(),
                    currency: $('#SelectCurrencyAdd').val(),
                    price: $('#PriceAdd').val(),

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

                    //! Loading
                    loadingYuklendi();
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

                    //! Loading
                    loadingYuklendi();
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
            var modalSrc = button.data("src"); 
        
            //! Return
            $('#image_data_id').html(modalId);
            $('#productViewImage').attr('src',modalSrc);

            console.log("modalSrc:",modalSrc);

            
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
                        url: "/stock/delete/post",
                        method: "post",
                        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                        data: {
                            siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                            id: data_id,
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

            //! Loading - Veri Yükleniyor
            $('#loaderEdit').css('display','block'); //! Laoding Göster
            $('#edit_item').attr('disabled','disabled'); //! Button Gizleme
            $('#edit_modal input,textarea,select').attr('disabled','disabled'); //! İnputları Gizleme

            //! Loading - Veri Yüklendi
            function loadingYuklendi(){
                $('#loaderEdit').hide(); //! Laoding Gizle
                $('#edit_item').removeAttr('disabled'); //! //! Button Göster
                $('#edit_modal input,textarea,select').removeAttr('disabled'); //! //! İnputları Göster
            }
            //! Loading - Veri Yüklendi Son
            
            //! Ajax  Post
            $.ajax({
                url: "/stock/search/post",
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
                    // console.log("status:", response.status);

                    //! Return
                    $('#update_data_id').html(modalId);
                    $('#edit_item').attr("data_stockNumber",response.DB.codeNumber);
                    
                    $('#modalInfo').attr("data_stockNumber",response.DB.codeNumber);
                    $('#StockCodeEdit').val(response.DB.stockCode);
                    $('#accountingCodeBuyEdit').val(response.DB.accountingCode_buy);
                    $('#accountingCodeSelEdit').val(response.DB.accountingCode_sel);

                    $('#sectorEdit option[value='+response.DB.sector+']').prop('selected',true); //! Select

                    var optionSelect = '<option value="">Başlık Seç</option>';
                    for (let index = 0; index < response.DB_Find_Category.length; index++) {
                        optionSelect+='<option id="typeId" data_title="'+response.DB_Find_Category[index].title+'" data_codeLet="'+response.DB_Find_Category[index].codeLet+'"  value="'+response.DB_Find_Category[index].id+'"  >'+response.DB_Find_Category[index].title+'</option>';
                    }

                    $('#selectSubCategoryEdit').html(optionSelect);
                    $('#selectSubCategoryEdit option[value='+response.DB.sub_sector+']').prop('selected',true); //! Select
                  
                    $('#nameTrEdit').val(response.DB.nameTr);
                    $('#nameEnEdit').val(response.DB.nameEn);

                    //! Dosya - Resim
                    if(response.DB.imgUrl != "/assets/img/product/default.jpg" && response.DB.imgUrl != "" && response.DB.imgUrl != null ) {
                        $('#filePathUrlEdit').html(response.DB.imgUrl);

                        // console.log("resim var");
                        // console.log(response.DB.imgUrl);

                        $('#productViewImageEdit').css('display','block');
                        $('#productViewImageEdit').attr("src",'/'+response.DB.imgUrl);

                        $('#product_dowloand_img').css('display','block');
                        $('#product_dowloand_img').attr("href",'/'+response.DB.imgUrl);
                        $('#product_dowloand_img').attr("download",'urun_resim_'+response.DB.id);
                    }
                    else if( response.DB.imgUrl == "/assets/img/product/default.jpg" || response.DB.imgUrl == "" || response.DB.imgUrl == null ) {
                        $('#productViewImageEdit').css('display','none');
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

                    //! Progresbar
                    $("#progressBarFileUploadEdit").width('0%');
                    $("#progressBarFileUploadtechnicalEdit").width('0%');

                    //! Görünürlük Kontrolleri - Tamamlandı
                    loadingYuklendi(); //! Loading
                    $('#loaderEdit').css('display','none');
                    $('#ModalBodyInfoEdit').css('display','block');
        
                },
                error: function (error) { console.log("search error:", error); alert("error");},
                complete: function() {}
            }); //! Ajax Post Son
            
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Güncelle Son

    //! Güncelle
    $("#edit_item").click(function (e) {
        e.preventDefault();
       
        //! Select
        var sectorEdit =  $('#sectorEdit').val();
        var selectSubCategoryEdit =  $('#selectSubCategoryEdit').val();

        var nameTrEdit =  $('#nameTrEdit').val();
        var nameEnEdit =  $('#nameEnEdit').val();

        var SelectStockUnitEdit =  $('#SelectStockUnitEdit').val();
        var SelectCurrencyEdit =  $('#SelectCurrencyEdit').val();

        //! SelectStockUnitAdd Yok İse
        if(sectorEdit == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
         } 
        else if(selectSubCategoryEdit == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Alt Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
         } 
         else if(nameTrEdit == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ad Tr Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
         } 
         else if(nameEnEdit == "") { 
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ad En Yazılmadı",
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


            var data_id =  $('#update_data_id').html();  //! Id

            //! Ajax
            $.ajax({
                url: "/stock/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    data_stockNumber:$('#modalInfo').attr("data_stockNumber"),
                    sector: $('#sectorEdit').val(),
                    sectorCode:$('#sectorEdit option[value='+sectorEdit+']').attr('data_codeLet'),
                    sub_sector: $('#selectSubCategoryEdit').val(),
                    sub_sectorCode:$('#selectSubCategoryEdit option[value='+selectSubCategoryEdit+']').attr('data_codeLet'),
                   
                    nameTr: $('#nameTrEdit').val(),
                    nameEn: $('#nameEnEdit').val(),

                    imgUrl: $('#filePathUrlEdit').html(),
                    techFileUrl: $('#filePathUrltechnicalFileEdit').html(),
                   
                    stockUnit: $('#SelectStockUnitEdit').val(),
                    stockCount: $('#StockCountEdit').val(),
                    currency: $('#SelectCurrencyEdit').val(),
                    price: $('#PriceEdit').val(),

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

    //! ************ Ürün Resmi  ***************

    //! Dosya Yükleme
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
    //! Dosya Yükleme Son

    //! ************ Ürün Resmi Son  ***************


    //! ************ Ürün Resmi Edit ***************

    //! Dosya Yükleme
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
    //! Dosya Yükleme Son

    //! ************ Ürün Resmi Edit Son  ***************


    //! ************ Teknik Özellikler ***************

    //! Dosya Yükleme
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
    //! Dosya Yükleme Son

    //! ************ Teknik Özellikler Son  ***************


    //! ************ Teknik Özellikler Edit ***************

    //! Dosya Yükleme
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
    //! Dosya Yükleme Son

    //! ************ Teknik Özellikler Edit Son  ***************


    //! ************ Aktif  ***************
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
                confirmButtonText: data_active_status == "true" ? "Onay Beklemeye Al": "Onayla",
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/stock/update/active",
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
                            console.log("response:", response);
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
    //! ************ Aktif Son ***************


