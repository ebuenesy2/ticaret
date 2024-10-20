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
        //console.log("choosedItemActionText:",choosedItemActionText);

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
                        url: "/logistics/company/delete/post/multi",
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
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
                        url: "/logistics/company/edit/active/multi",
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
                confirmButtonText: data_active_status == "true" ? $('[id=lang_change][data_key=MakePassive]').html().trim() : $('[id=lang_change][data_key=Activate]').html().trim(),
                cancelButtonColor: "black",
                cancelButtonText: $('[id=lang_change][data_key=No]').html().trim(),
            }).then((result) => {
                if (result.isConfirmed) {
                    //! Ajax
                    $.ajax({
                        url: "/logistics/company/edit/active/multi",
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
        //console.log("searchJsonData:",searchJsonData);

        //! Json Verilerini Alıyor
        searchJsonData.map(function(data){

            if(data.exportname == "Id") {  $('#searhId_Table').val( data.text);  } //! Input
            else if(data.exportname == "Name") {  $('#searhId_Name').val( data.text);  } //! Input
            else if(data.exportname == "CreatedDate") {  $('#exampleInputdate').val(data.text); } //! Zaman
            else if(data.exportname == "Status") {  $('#selectActive option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "Transport") {  $('#selectTransport option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap

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

     //! Arama Id
     document.querySelector('#searhId_Name').addEventListener('keyup', e => {

        //! Tanım
        var filter = $('#searhId_Name').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Name", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Name'); //! Json İçinde Arama 

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

    
    //! Arama Ulaşım
    document.querySelector('#selectTransport').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectTransport').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "Transport", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'Transport'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Ulaşım Son

    //! ************ Arama Son ***************



    //! ************ Ekleme  ***************
    //! Ekleme
    $("#new_add").click(function (e) {
        e.preventDefault();

        //! Ajax
        $.ajax({
            url: "/logistics/company/add/post",
            method: "post",
            headers: {  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            data: {
                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                name: $('#name').val(),
                
                authorized_person: $('#AuthorizedPersonAdd').val(),
                authorized_person_tel: $('#AuthorizedPhoneAdd').val(),
            
                country: $('#CountryAdd').val(),
                city: $('#CityAdd').val(),
                district: $('#DitsrictAdd').val(),

                airline: $('#AirlineAdd')[0].checked,
                highway: $('#LandRoadAdd')[0].checked,
                seaway: $('#SeawayAdd')[0].checked,
                railway: $('#RailwayAdd')[0].checked,

                address: $('#adressAdd').val(),

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

    }); //! Ekleme Son
    //! ************ Ekleme Son  ***************



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
                        url: "/logistics/company/delete/post",
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
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
            var modal_Name = button.data("name"); 
            var modal_Authorized_person = button.data("authorized_person"); 
            var modal_Authorized_person_tel = button.data("authorized_person_tel"); 

            var modal_country = button.data("country"); 
            var modal_city = button.data("city"); 
            var modal_district = button.data("district"); 

            var modal_airline = button.data("airline"); 
            var modal_highway = button.data("highway"); 
            var modal_seaway = button.data("seaway"); 
            var modal_railway = button.data("railway"); 

            var modal_address = button.data("address"); 
        

            //! Return
            $('#edit_data_id').html(modalId);
            $('#UpdatedName').val(modal_Name);
            $('#UpdatedAuthorizedPerson').val(modal_Authorized_person);
            $('#UpdatedAuthorizedPhone').val(modal_Authorized_person_tel);

            $('#UpdatedCountry').val(modal_country);
            $('#UpdatedCity').val(modal_city);
            $('#UpdatedDitsrict').val(modal_district);

            $('#UpdatedAirline').prop('checked', modal_airline == true ? true : false);
            $('#UpdatedLandRoad').prop('checked', modal_highway == true ? true : false);
            $('#UpdatedSeaway').prop('checked', modal_seaway == true ? true : false);
            $('#UpdatedRailway').prop('checked', modal_railway == true ? true : false);

            $('#UpdatedAdress').val(modal_address);

            //! Görünürlük Kontrolleri
            $('#loaderEdit').css('display','none');
            $('#ModalBodyInfoEdit').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Güncelle Son

    //! Güncelle
    $("#edit_item").click(function (e) {
        e.preventDefault();

        //! Id
        var data_id =  $('#edit_data_id').html();

        //! Ajax
        $.ajax({
            url: "/logistics/company/edit/post",
            method: "post",
            headers: {  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            data: {
                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                id: Number(data_id),
                name: $('#UpdatedName').val(),
                authorized_person: $('#UpdatedAuthorizedPerson').val(),
                authorized_person_tel: $('#UpdatedAuthorizedPhone').val(),
                country: $('#UpdatedCountry').val(),
                city: $('#UpdatedCity').val(),
                district: $('#UpdatedDitsrict').val(),
                airline: $('#UpdatedAirline')[0].checked,
                highway: $('#UpdatedLandRoad')[0].checked,
                seaway: $('#UpdatedSeaway')[0].checked,
                railway: $('#UpdatedRailway')[0].checked,
                address: $('#UpdatedAdress').val(),
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
            var modal_Name = button.data("name"); 
            var modal_Authorized_person = button.data("authorized_person"); 
            var modal_Authorized_person_tel = button.data("authorized_person_tel"); 

            var modal_country = button.data("country"); 
            var modal_city = button.data("city"); 
            var modal_district = button.data("district"); 

            var modal_airline = button.data("airline"); 
            var modal_highway = button.data("highway"); 
            var modal_seaway = button.data("seaway"); 
            var modal_railway = button.data("railway"); 

            var modal_address = button.data("address"); 
        

            //! Return
            $('#search_data_id').html(modalId);
            $('#SearchName').val(modal_Name);
            $('#SearchAuthorizedPerson').val(modal_Authorized_person);
            $('#SearchAuthorizedPhone').val(modal_Authorized_person_tel);

            $('#SearchCountry').val(modal_country);
            $('#SearchCity').val(modal_city);
            $('#SearchDitsrict').val(modal_district);

            $('#SearchAirline').prop('checked', modal_airline == true ? true : false);
            $('#SearchLandRoad').prop('checked', modal_highway == true ? true : false);
            $('#SearchSeaway').prop('checked', modal_seaway == true ? true : false);
            $('#SearchRailway').prop('checked', modal_railway == true ? true : false);

            $('#SearchAdress').val(modal_address);        

            //! Görünürlük Kontrolleri
            $('#LoadingFileUploadSearch').css('display','none');
            $('#ModalBodyInfoSearch').css('display','block');

        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Ara Son

    //! ************ Ara Son  ***************



    //! ************ Aktif  ***************
    //! Aktif
    document.querySelectorAll("#listItemActive").forEach(function (i) {
        i.addEventListener("click", function (event) {
        
            //! Attr - Diğer Veri Alma
            var data_id = event.target.getAttribute("data_id");
            var data_active_status = event.target.getAttribute("data_active");

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
                        url: "/logistics/company/edit/active",
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
                exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckSettings" id="modalTableTitleCheckSettings'+index+'" value="'+element.head_exportName+'" checked ><label class="form-check-label" for="modalTableTitleCheck'+index+'">'+element.head_exportName+'</label></div>';
                }
                else if(element.head_display == "none"  ) { 
                exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckSettings" id="modalTableTitleCheckSettings'+index+'" value="'+element.head_exportName+'" ><label class="form-check-label" for="modalTableTitleCheck'+index+'">'+element.head_exportName+'</label></div>';
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
    $("#edit_item_check_coloums").click(function (e) {
        e.preventDefault();

        //alert("edit_item_check_coloums");

        //! Tüm Check
        $('input[type=checkbox][name="modalTableTitleCheckSettings"]').each(function () {
    
            var data_check_checked = $(this)[0].checked; //! false/true
            var data_check_val = $(this)[0].defaultValue; //! Val

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

    //! ************ Export ***************

    //! Fonksiyon - Tablo -> JSON
    function tableConvertJson(tableFind) {
        var i = 0;
        var tableObj = { myhead: [], myrows: [], tabloJson: [] }; //! Tablo
        $.each($(tableFind + " thead th"), function () {
            var head = $(this);
            var head_id = $(this)[0].childNodes[0].id; //! id
            var head_text = $(this)[0].innerText; //! Text
            var head_exportName = $(this)[0].attributes['exportName'].nodeValue; //! ExportName
            var head_display = $(this)[0].style["display"]; //! Style Display

            if(head_id == "showAllRows") { head_text="Check" }

            // console.log("head:",head);
            // console.log("head_id:",head_id);
            // console.log("head_text:",head_text);
            // console.log("head_exportName:",head_exportName);
            // console.log("head_display:",head_display);

            //! Table Header Ekleme Yapıyor
            if (head_text != ""  && head_exportName !="Actions" ) { tableObj.myhead[i++] =  {head_exportName:head_exportName,head_display:head_display} ;}

        });

        //! console.log("head:", tableObj.myhead);

        $.each($(tableFind + " tbody tr"), function () {
            var $row = $(this);
            var $row_id = $(this)[0].id;
            var rowObj = [];
            var rowItem = {};
            var itemCount = 0;

            // console.log("row:",$row);
            // console.log("row_id:",$row_id);

            if($row_id != "tableConst" ) {

                $.each($("td", $row), function () {
                    var $colID="";
                    var $col_value = "";

                    var col = $(this);
                    var col_id = $(this)[0].id; //! id
                    var col_text = $(this)[0].innerText; //! Text
                    var col_childNodes_id = $(this)[0].childNodes[0].id; //! Node - id
                
                    // console.log("col:",col);
                    // console.log("col_id:",col_id);
                    // console.log("col_text:",col_text);
                    // console.log("col_childNodes_id:",col_childNodes_id);

                    //! Check
                    if(col_id == "checkItemCol") { $colID="checkItemCol";  $col_value = $(this)[0].childNodes[0].checked; }

                    //! ID
                    else if(col_id == "itemID") { $colID = col_id; $col_value = $(this)[0].innerText;  }

                    //! Resim
                    else if (col_id == "listItemImageBox") { var $col_value = $(this)[0].childNodes[1].currentSrc; } //! Resim Son

                    //! Active
                    else if (col_id == "tableStatus") {  var $col_value = $(this)[0].attributes["data_val"].nodeValue == "1" ? true : false ; } //! Active Son

                    //! Ulaşım
                    else if (col_id == "tableTransportation") {  var $col_value = $(this)[0].attributes["data_val"].nodeValue == "1" ? true : false ; } //! Active Son

                    //! Diğer
                    else { $col_value = col_text; } //! Diğer Son

                    //! Ekleme
                    if ( col_id != "listItemActionBox" ) {
                        //console.log("itemCount:", itemCount);
                        //console.log("listItemActionBox var");

                        var head_item = tableObj.myhead[itemCount]; //! Tablo Header
                        //console.log("head_item", head_item);

                        //! Yeni Veriler
                        var rowObjNew = {
                            id: $colID,
                            val: $col_value,
                            header: head_item.head_exportName,
                            display:head_item.head_display
                        }; //! Yeni Veriler Son

                        rowItem[head_item.head_exportName] = $col_value; //! Tablo Json item

                        rowObj.push(rowObjNew); //! Yeni verileri ekliyor
                        itemCount++;

                        //console.log("rowObjNew:", rowObjNew);
                    } //! Ekleme Son
                    
                });

            }

            // console.log("rowObj:", rowObj);
            // console.log("rowItem:",rowItem);
        
            if(rowObj.length != 0 ) {
                
                tableObj.myrows.push(rowObj); //! Tablo Satır Json Ekle
                tableObj.tabloJson.push(rowItem); //! Tablo Veri Json Ekleniyor

            } 
        
        });

        //! console.log("tableObj:",tableObj);

        return tableObj;
    } //! Fonksiyon - Tablo -> JSON Son

    //! Export Json
    function exportToJsonFile(jsonData, exportFileName) {
        
        try {

            //! İndirme
            let dataStr = JSON.stringify(jsonData);
            let dataUri =
                "data:application/json;charset=utf-8," +
                encodeURIComponent(dataStr);

            let exportFileDefaultName = exportFileName + ".json";

            let linkElement = document.createElement("a");
            linkElement.setAttribute("href", dataUri);
            linkElement.setAttribute("download", exportFileDefaultName);
            linkElement.click();

            //! Alert
            Swal.fire({
                position: "center",
                icon: "success",
                title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });  //! Alert Son

            //! Return
            var result = {
                status:true,
                msg:  $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
            }
            return result
        } catch (error) {

            //! Alert
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });  //! Alert Son

            console.log("export json error: ",error);

            var result = {
                status:false,
                msg:  error
            }
            return result;
            
        }

    } //! Export Json Son

    


    //! Fonksiyon Export - Excel
    function JsonToExcel(JsonFind, FileName) {
        //console.log("Json Excel");

        try {

            const worksheet = XLSX.utils.json_to_sheet(JsonFind); //! Excel Formatına Dönüştürüyor

            const workbook = XLSX.utils.book_new(); //! Yeni Çalışma Oluşturuyor
            XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1"); //! Yeni Sheet oluşturuyor

            XLSX.writeFile(workbook, FileName + ".xlsx", { compression: true }); //! Excel Yazıyor

            //! Alert
            Swal.fire({
                position: "center",
                icon: "success",
                title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });  //! Alert Son

            //! Return
            var result = {
                status:true,
                msg:  $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
            }
            return result
        } catch (error) {

            //! Alert
            Swal.fire({
                position: "center",
                icon: "error",
                title: $('[id=lang_change][data_key=TransactionFailed]').html().trim(),
                showConfirmButton: false,
                timer: 2000,
            });  //! Alert Son

            console.log("export json error: ",error);

            var result = {
                status:false,
                msg:  error
            }
            return result;
            
        }
        
    } //! Fonksiyon Export - Excel Son


 
    //! Modal Excel
    $('document').ready(function () {
        $("#exportExcelModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        
        }).on("show.bs.modal", function(event){
            // alert("Modal Açıldı");

            //! Table
            var TableTitle = $('#tableTitle').html();
            $('#ModalTableTitleExcel').html(TableTitle);
            
            //! Json
            var TableJson = tableConvertJson("#customerTable"); //! Tablo Json Oluşturuyor
            var TableJsonHeader = TableJson.myhead; //! Tablo Export Json Data
            var TableJsonCol = TableJson.tabloJson; //! Tablo Export Json Data

            // console.log("TableJson:",TableJson);
            // console.log("TableJsonCol:",TableJsonCol);

            //! Tablo Header
            var exportModalHeaderHtml ="";

            for (let index = 0; index < TableJsonHeader.length; index++) {
                const element = TableJsonHeader[index];

                if(element.head_exportName == "Check" ) { 
                    exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckExcel" id="modalTableTitleCheckExcel'+index+'" value="'+element.head_exportName+'" ><label class="form-check-label" for="modalTableTitleCheckExcel'+index+'">'+element.head_exportName+'</label></div>';
                }
                else if(element.head_exportName != "İşlemler" && element.head_exportName != "Check" ) { 
                    exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckExcel" id="modalTableTitleCheckExcel'+index+'" value="'+element.head_exportName+'" checked ><label class="form-check-label" for="modalTableTitleCheckExcel'+index+'">'+element.head_exportName+'</label></div>';
                }
            }

            $('#exportModalHeaderExcel').html(exportModalHeaderHtml);
            //! Tablo Header Son


            //! Görünürlük Kontrolleri
            $('#LoadingFileUploadExcel').css('display','none');
            $('#ModalBodyInfoExcel').css('display','block');

        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Excel Son


    //! Modal Export Excel
    document.querySelectorAll("#exportExcelModal").forEach(function (i) {
        i.addEventListener("click", function (event) {

            //! Table
            var TableTitle = $('#tableTitle').html();
            $('#ModalTableTitleExcel').html(TableTitle);
            
            //! Json
            var TableJson = tableConvertJson("#customerTable"); //! Tablo Json Oluşturuyor
            var TableJsonHeader = TableJson.myhead; //! Tablo Export Json Data
            var TableJsonCol = TableJson.tabloJson; //! Tablo Export Json Data

            // console.log("TableJson:",TableJson);
            // console.log("TableJsonCol:",TableJsonCol);

            //! Tablo Header
            var exportModalHeaderHtml ="";

            for (let index = 0; index < TableJsonHeader.length; index++) {
                const element = TableJsonHeader[index];

                if(element.head_exportName == "Check" ) { 
                    exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckExcel" id="modalTableTitleCheckExcel'+index+'" value="'+element.head_exportName+'" ><label class="form-check-label" for="modalTableTitleCheckExcel'+index+'">'+element.head_exportName+'</label></div>';
                }
                else if(element.head_exportName != "İşlemler" && element.head_exportName != "Check" ) { 
                    exportModalHeaderHtml += '<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="modalTableTitleCheckExcel" id="modalTableTitleCheckExcel'+index+'" value="'+element.head_exportName+'" checked ><label class="form-check-label" for="modalTableTitleCheckExcel'+index+'">'+element.head_exportName+'</label></div>';
                }
            
            }

            $('#exportModalHeaderExcel').html(exportModalHeaderHtml);
            //! Tablo Header Son


        });
    }); //! Modal Export Excel Son

    //! Export - Excel
    document.querySelectorAll("#exportExcel").forEach(function (i) {
        i.addEventListener("click", function (event) {

            //! Table
            var TableTitle = $('#tableTitle').html(); //! Tablo Adı
            var checkAll =  $('#showAllRows').attr('data_value'); //! Tümü Seçme

            //! Elemanları alıyor
            var eleman = $("input[type=checkbox][name=modalTableTitleCheckExcel]"); //! Row Seçili
            var eleman_sayisi = eleman.length; //! Sayısı
            var checkEleman = [];

            // console.log("eleman:",eleman);
            // console.log("eleman_sayisi:",eleman_sayisi);

            for (var i = 0; i < eleman_sayisi; i++) {
                var eleman_value = eleman[i].value; //! Değer
                var ischecked = eleman[i].checked; //! true - false
                if(ischecked) { checkEleman.push(eleman_value) } //! Array Ekleme Yapıyor
                    
                //console.log("eleman_value:", eleman_value, " ischecked:", ischecked);        
            }

            //console.log("checkEleman:",checkEleman);
            //! Elemanları Alıyor Son

            //! Json
            var TableJson = tableConvertJson("#customerTable"); //! Tablo Json Oluşturuyor
            var TableJsonCol = TableJson.tabloJson; //! Tablo Export Json Data

        
        var tableExportRadio =  $("input[name='modalTableTitleRadioExcel']:checked").val();
            if(tableExportRadio == "all" ) { 

                //! Yeni Json
                TableJsonCol.map(function(item) { 
                    var tableItemKey = Object.keys(item);
                    //console.log("tableItemKey:",tableItemKey);
                    
                    for (let index = 0; index < tableItemKey.length; index++) {
                        const element = tableItemKey[index];
                        var checkEleman_Find=checkEleman.includes(element); //true
                        if(checkEleman_Find == false) { delete item[element]; } //! Seçilenleri Ekliyor
                    }

                });  //! Yeni Json Son


                //! Export
                var exportFileName = TableTitle+"_" + new Date().getTime(); //! Export Dosya Adı
                var status = JsonToExcel(TableJsonCol, exportFileName); //! Json Xml Oluşturma Fonksiyon Kullanımı
            } 
            else if(tableExportRadio == "select" ) {  
                
                if(checkAll == '') { 

                    //! Alert
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: $('[id=lang_change][data_key=NoDataSelected]').html().trim(),
                        showConfirmButton: false,
                        timer: 2000,
                    });  //! Alert Son
                    
                }
                else {
                //! Seçili İse Alıyor
                TableJsonCol = TableJsonCol.filter(s=> s.Check == true);

                    //! Yeni Json
                    TableJsonCol.map(function(item) { 
                        var tableItemKey = Object.keys(item);
                        //console.log("tableItemKey:",tableItemKey);
                        
                        for (let index = 0; index < tableItemKey.length; index++) {
                            const element = tableItemKey[index];
                            var checkEleman_Find=checkEleman.includes(element); //true
                            if(checkEleman_Find == false) { delete item[element]; } //! Seçilenleri Ekliyor
                        }

                    });  //! Yeni Json Son
                    
                    //! Export
                    var exportFileName = TableTitle+"_" + new Date().getTime(); //! Export Dosya Adı
                    var status = JsonToExcel(TableJsonCol, exportFileName); //! Json Xml Oluşturma Fonksiyon Kullanımı
                }
            } 
            
            // console.log("TableJson:",TableJson);

        });
    }); //! Export - Excel Son


    //! ************ Export  Son ***************


    //! ************ Import ***************

    //! FileUpload
    $("#fileUploadClick").click(function (e) {
        e.preventDefault();
        //alert("fileUploadClick");

        //! Dosya Yükleme
        const fileInput = document.querySelector("#fileInput");
        const fileInputFiles = fileInput.files;
        //console.log("fileInputFiles:",fileInputFiles);
        

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
            url: "/logistics/company/export/file",
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

                //! Alert
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });  //! Alert Son

                //! Sayfa Yenileme
                if(resp.DB_importStatus) { window.location.reload(); }

            }
        }); //! Ajax



    });
    //! FileUpload Son

    //! ************ Import  Son ***************