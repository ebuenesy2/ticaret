var contactList, perPage = 10;
var options = { valueNames: ["order_date", "currency_name", "type", "quantity_value", "order_value", "avg_price", "price", "status"], page: perPage, pagination: !0, plugins: [ListPagination({ left: 2, right: 2 })] };
var ContactList = document.getElementById("contactList");
var paginationNext = (ContactList && (contactList = new List("contactList", options).on("updated", function (e) { 0 == e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "block" : document.getElementsByClassName("noresult")[0].style.display = "none"; var t = 1 == e.i, n = e.i > e.matchingItems.length - e.page; document.querySelector(".pagination-prev.disabled") && document.querySelector(".pagination-prev.disabled").classList.remove("disabled"), document.querySelector(".pagination-next.disabled") && document.querySelector(".pagination-next.disabled").classList.remove("disabled"), t && document.querySelector(".pagination-prev").classList.add("disabled"), n && document.querySelector(".pagination-next").classList.add("disabled"), e.matchingItems.length <= perPage ? document.querySelector(".pagination-wrap").style.display = "none" : document.querySelector(".pagination-wrap").style.display = "flex", 0 < e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "none" : document.getElementsByClassName("noresult")[0].style.display = "block" }), isCount = (new DOMParser).parseFromString(contactList.items.slice(-1)[0]._values.id, "text/html")), document.querySelector(".pagination-next")), paginationPrev = (paginationNext && document.querySelector(".pagination-next").addEventListener("click", function () { !document.querySelector(".pagination.listjs-pagination") || document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() }), document.querySelector(".pagination-prev")); paginationPrev && document.querySelector(".pagination-prev").addEventListener("click", function () { !document.querySelector(".pagination.listjs-pagination") || document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() });


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
        // console.log("searchJsonData:",searchJsonData);

        //! Json Verilerini Alıyor
        searchJsonData.map(function(data){

            if(data.exportname == "Id") {  $('#searhId_Table').val( data.text);  } //! Input
            else if(data.exportname == "CreatedDate") {  $('#exampleInputdate').val(data.text); } //! Zaman
            else if(data.exportname == "Status") {  $('#selectActive option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "Type") {  $('#selectTypeList option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            
        }); //! Json Verilerini Alıyor Son


        //! Loading Görünürlük
        $('#LoadingFirstDb').css('display','none');

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

    
    //! Arama Type
    document.querySelector('#selectTypeList').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectTypeList').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Type", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Type'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == 'selectedFirst') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır

        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Type Son
    

    //! ************ Arama Son ***************

    //! ************ Tablo Özellik ***************

    //! Modal Ayarlama
    $('document').ready(function () {
        $("#modalTableColoums").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");

            //! Json
            var TableJson = tableConvertJson("#customerTable"); //! Tablo Json Oluşturuyor
            var TableJsonHeader = TableJson.myhead; //! Tablo Export Json Data
            var TableJsonCol = TableJson.tabloJson; //! Tablo Export Json Data

            //    console.log("TableJson:",TableJson);
            //    console.log("TableJsonCol:",TableJsonCol);

            //! Tablo Header
            var exportModalHeaderHtml ="";

            for (let index = 0; index < TableJsonHeader.length; index++) {
                const element = TableJsonHeader[index];
            
                if(element.head_display == "" ) { 
                exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckSettings" id="modalTableTitleCheckSettings'+index+'" value="'+element.head_exportName+'" checked ><label class="form-check-label" for="modalTableTitleCheckSettings'+index+'">'+element.head_exportName+'</label></div>';
                }
                else if(element.head_display == "none"  ) { 
                exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckSettings" id="modalTableTitleCheckSettings'+index+'" value="'+element.head_exportName+'" ><label class="form-check-label" for="modalTableTitleCheckSettings'+index+'">'+element.head_exportName+'</label></div>';
                }
            }

            $('#exportModalHeaderTable').html(exportModalHeaderHtml);
            //! Tablo Header Son

            //! Görünürlük Kontrolleri
            $('#LoadingFileUpload').css('display','none');
            $('#ModalBodyInfo').css('display','block');

        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Ayarlama Son


    //! Güncelle
    $("#data_update_check_coloums").click(function (e) {
        e.preventDefault();

        //alert("data_update_check_coloums");

        //! Tüm Check
        $('input[type=checkbox][name="modalTableTitleCheckSettings"]').each(function () {
    
            var data_check_checked = $(this)[0].checked//! false/true
            var data_check_val = $(this)[0].defaultValue//! Val

            // console.log("data_check_checked:",data_check_checked);
            // console.log("data_check_val:",data_check_val);

            //! Tablo Sutun Silme
            var tablex = document.getElementById('customerTable'); //! Tablo Okuma
            //console.log("tablex:",tablex);

            var row = tablex.rows; //! Satır Alma

            for (var i = 0; i < row[0].cells.length; i++) {

                var str = row[0].cells[i].attributes["exportname"].nodeValue //! Sutun Adı
                var searchText = data_check_val; //! Aranan Metin
            
                //! Veri Varmı - Sutun Siliyor
                //if (str.search(searchText) != -1 && data_check_checked == false ) {  for (var j = 0; j < row.length; j++) { row[j].deleteCell(i); } }
                
                if (str.search(searchText) != -1 && data_check_checked == false ) {  for (var j = 0; j < row.length; j++) { row[j].cells[i].style.display="none" } }
                else if (str.search(searchText) != -1 && data_check_checked == true ) {  for (var j = 0; j < row.length; j++) { row[j].cells[i].style.display="" } }
            }
            //! Tablo Sutun Silme

        }); 
        //! Tüm Check Son

    }); //! Güncelle Coloums Son


    //! ************ Tablo Özellik Son ***************

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
         allCheckItemsArray.sort(); //! Sıralama Yapıyor
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
                        url: "/cost/calculation/fixed/expenses/delete/post/multi",
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
                confirmButtonText: data_active_status == "true" ? $('[id=lang_change][data_key=MakePassive]').html().trim() : $('[id=lang_change][data_key=Activate]').html().trim(),
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/cost/calculation/fixed/expenses/update/active/multi",
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
        }   //! Aktif Son

        //!  Pasif
        else if(choosedItemActionText =="passive" ) { 

        var data_active_status = "true";
            
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>'+$('[id=lang_change][data_key=AreYouSure]').html().trim()+'</h4></div></div>',
                showCancelButton: true,
                confirmButtonColor: data_active_status == "true" ? "#ed1c24" : "#1bb934",
                confirmButtonText: data_active_status == "true" ? $('[id=lang_change][data_key=MakePassive]').html().trim() : $('[id=lang_change][data_key=Activate]').html().trim(),
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/cost/calculation/fixed/expenses/update/active/multi",
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
        }   //!  Pasif Son



    }); //! Güncelle  Son

    //! ************ Tümü Seç Olayı Son ***************

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
                confirmButtonText: data_active_status == "true" ? $('[id=lang_change][data_key=MakePassive]').html().trim() : $('[id=lang_change][data_key=Activate]').html().trim(),
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/cost/calculation/fixed/expenses/update/active",
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
    //! ************ Aktif Son ***************

  
    

    //! ************ Kategori  ***************
        //! Arama Kategori
        document.querySelector('#selectType').addEventListener('change', e => {

            //! Tanım
            var TypeSelect = $('#selectType').val();
            
            //! Ajax  Post
            $.ajax({
                url: "/category/search/type/post",
                method: "post",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    type:$('#selectType').val(),
                },              
                // beforeSend: function() { console.log("Başlangıc"); },
                success: function (response) {
                    // alert("başarılı");
                    console.log("response:", response);
                    // console.log("status:", response.status);

                    

                    var optionSelect = '<option value="">Başlık Seç</option>';
                    if(TypeSelect == "Genel") {optionSelect+='<option selected id="typeId" data_id="'+0+'"  value="Genel"  >Genel</option>'; }

                    for (let index = 0; index < response.DB.length; index++) {
                        optionSelect+='<option id="typeId" data_id="'+response.DB[index].id+'"  value="'+response.DB[index].title+'"  >'+response.DB[index].title+'</option>';
                    }

                    $('#selectTypeCategoryAdd').html(optionSelect);

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
        

        }); //! Arama Kategori Son

        //! Arama Kategori
        document.querySelector('#selectTypeUpdate').addEventListener('change', e => {

            //! Tanım
            var TypeSelect = $('#selectTypeUpdate').val();

            
            //! Ajax  Post
            $.ajax({
                url: "/category/search/type/post",
                method: "post",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    type:$('#selectTypeUpdate').val(),
                },              
                // beforeSend: function() { console.log("Başlangıc"); },
                success: function (response) {
                    // alert("başarılı");
                    console.log("response:", response);
                    // console.log("status:", response.status);

                    var optionSelect = '<option value="">Başlık Seç</option>';
                    if(TypeSelect == "Genel") {optionSelect+='<option selected id="typeId" data_id="'+0+'"  value="Genel"  >Genel</option>'; }

                    for (let index = 0; index < response.DB.length; index++) {
                        optionSelect+='<option id="typeId" data_id="'+response.DB[index].id+'"  value="'+response.DB[index].title+'"  >'+response.DB[index].title+'</option>';
                    }

                    $('#selectTypeCategoryUpdate').html(optionSelect);

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
        

        }); //! Arama Kategori Son

    //! ************ Kategori Son***************

    //! ************ Güncelle  ***************

    //! Modal Güncelle
    $('document').ready(function () {
        $("#updateModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            //alert("Modal Açıldı");
        
            var button = $(event.relatedTarget); 
            var modalId = button.data("id"); 

            console.log("modalId:",modalId);

            //! Ajax  Post
            $.ajax({
                url: "/cost/calculation/fixed/expenses/search/post",
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

                    $('#selectTypeUpdate option[value='+response.DB.type+']').prop('selected',true);
                    
                    $('#selectTypeCategoryUpdate').html('<option  data_id="'+response.DB_Category.id+'" value="'+response.DB_Category.title+'">'+response.DB_Category.title+'</option>');
               
                    
                    $('#titleUpdate').val(response.DB.title);
                    $('#descriptionUpdate').html(response.DB.description);
                    $('#CurrencyUpdate option[value='+response.DB.currency+']').prop('selected',true);
                    $('#priceUpdate').val(response.DB.price);
        
                
                },
                error: function (error) { console.log("search error:", error); },
                complete: function() {
        
                    //! Görünürlük Kontrolleri
                    $('#LoadingFileUploadUpdate').css('display','none');
                    $('#ModalBodyInfoUpdate').css('display','block');

                    // console.log("Search Ajax Bitti");
        
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
    $("#data_update").click(function (e) {
        e.preventDefault();

        var selectType = $('#selectTypeUpdate').val();
        var selectTypeCategoryUpdate = $('#selectTypeCategoryUpdate').val();
        var CurrencyUpdate = $('#CurrencyUpdate').val();

        if (selectType == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Tür Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if (selectTypeCategoryUpdate == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Kategori Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if (CurrencyUpdate == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {


            //! Id
            var data_id =  $('#update_data_id').html();

            //! Ajax
            $.ajax({
                url: "/cost/calculation/fixed/expenses/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    type: $('#selectTypeUpdate').val(),
                    category_id: $('#selectTypeCategoryUpdate option[value="'+selectTypeCategoryUpdate +'"]').attr('data_id'),
                    title: $('#titleUpdate').val(),
                    description: $('#descriptionUpdate').val(), 
                    currency: $('#CurrencyUpdate  option[value="'+CurrencyUpdate  +'"]').val(),
                    price: $('#priceUpdate').val(),
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

    }); //! Güncelle Son

    //! ************ Güncelle Son  ***************

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
                        url: "/cost/calculation/fixed/expenses/delete/post",
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


    //! ************ Ekleme  ***************
    //! Ekleme
    $("#new_add").click(function (e) {
        e.preventDefault();

        var selectType = $('#selectType').val();
        var selectTypeCategoryAdd = $('#selectTypeCategoryAdd').val();
        var CurrencyAdd = $('#CurrencyAdd').val();

        if (selectType == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Tür Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if (selectTypeCategoryAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Kategori Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if (CurrencyAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seç",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {

            //! Ajax
            $.ajax({
                url: "/cost/calculation/fixed/expenses/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    type: $('#selectType').val(),
                    category_id: $('#selectTypeCategoryAdd option[value="'+selectTypeCategoryAdd +'"]').attr('data_id'),
                    title: $('#titleAdd').val(),
                    description: $('#descriptionAdd').val(), 
                    currency: $('#CurrencyAdd  option[value="'+CurrencyAdd  +'"]').val(),
                    price: $('#priceAdd').val(),
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

    }); //! Ekleme Son
    //! ************ Ekleme Son  ***************