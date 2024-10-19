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
            else if(data.exportname == "RequestFormId") {  $('#selectRequestForm option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "CurrencyCartId") {  $('#selectCurrentCart option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "RequestFormProductId") {  $('#selectRequestFormProduct option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap

            else if(data.exportname == "ShipmentTypeId") {  $('#selectshipmentType option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "VendorDeliveryTypeId") {  $('#selectVendorDeliveryType option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "PaymentMethodId") {  $('#selectPaymentMethod option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "ModeofTransportId") {  $('#selectModeofTransport option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap
            else if(data.exportname == "IntertekId") {  $('#selectIntertek option[value="'+data.text+'"]').prop('selected', true );  } //! Seçim yap

            
            
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

    //! Arama Cari Kart
    document.querySelector('#selectCurrentCart').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectCurrentCart').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "CurrencyCartId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'CurrencyCartId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Cari Kart  Son

    
    //! Arama Talep Formu
    document.querySelector('#selectRequestForm').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectRequestForm').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "RequestFormId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'RequestFormId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Talep Formu  Son


    //! Özel Şartlar

    //! Arama Sevk Şekli
    document.querySelector('#selectshipmentType').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectshipmentType').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "ShipmentTypeId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'ShipmentTypeId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Sevk Şekli  Son

    
    //! Arama Satıcı Teslim Şekli
    document.querySelector('#selectVendorDeliveryType').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectVendorDeliveryType').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "VendorDeliveryTypeId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'VendorDeliveryTypeId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Satıcı Teslim Şekli  Son


    //! Arama Ödeme Şekli
    document.querySelector('#selectPaymentMethod').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectPaymentMethod').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "PaymentMethodId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'PaymentMethodId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Ödeme Şekli  Son
    
    
    //! Arama Nakliyet Şekli
    document.querySelector('#selectModeofTransport').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectModeofTransport').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "ModeofTransportId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'ModeofTransportId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Nakliyet Şekli  Son

        
    //! Arama İntertek Tabi Mi
    document.querySelector('#selectIntertek').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectIntertek').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "IntertekId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'IntertekId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama İntertek Tabi Mi  Son


    //! Ürün

    //! Arama Talep Formu Ürün
    document.querySelector('#selectRequestFormProduct').addEventListener('change', e => {

        //! Tanım
        var filter = $('#selectRequestFormProduct').val(); //! Aranacak Veri
        var searchJsonItem = { exportname: "RequestFormProductId", text:filter}; //! Aranacak Veri Item
        var searchJsonFindItem = searchJsonData.findIndex(s => s.exportname == 'RequestFormProductId'); //! Json İçinde Arama 

        //! Kontrol
        if(searchJsonFindItem == -1 ) { searchJsonData.push(searchJsonItem); } //! Yoksa Ekliyor
        else if(searchJsonFindItem != -1 ) { searchJsonData[searchJsonFindItem].text = filter; } //! Varsa Güncelliyor
        if (filter == '') { searchJsonData.splice(searchJsonFindItem, 1); } //! Arama Boş ise Kaldır
    
        //! Table Arama Kontrol
        searchTableControl();

    }); //! Arama Talep Formu Ürün  Son
 


    //! ************ Arama Son ***************



    
    //! ************ Ekleme  ***************
    //! Ekleme
    $("#new_add").click(function (e) {
        e.preventDefault();

        var title_Val = $('#TitleAdd').val(); //! Başlık
        var selectFormVal = $('#selectRequestFormAdd').val(); //!! Talep Formu

        if(title_Val == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Başlık Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else  if(selectFormVal == "") {

            Swal.fire({
                position: "center",
                icon: "error",
                title: "Talep Formu Seçildi",
                showConfirmButton: false,
                timer: 2000,
            });

        }
        else {

             //! Ajax
            $.ajax({
                url: "/get/offers/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                  
                    title: title_Val,
                    requestformid: selectFormVal,
                   
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
                        url: "/get/offers/delete/post",
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
