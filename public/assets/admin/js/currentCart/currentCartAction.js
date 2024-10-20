$(function () {

    // alert("sabit");
    // console.log("js çalışıyor");

    
    //! ************ Ekleme  ***************
    $("#new_add").click(function (e) {
        e.preventDefault();
        //alert("new_add");

        var current_name = $('#currentNameAdd').val(); //! Firma  Ad
        var ShortNameAdd = $('#ShortNameAdd').val(); //! Kısa Ad
        var CurrencyAdd = $('#SelectCurrency').val(); //! Para Birimi

        var currentRow = $('#currentRow').val(); //! Cari Kod
        var sectorAdd = $('#sectorAdd').val(); //! Sektorel Kod

        var AuthorizedPersonAdd = $('#AuthorizedPersonAdd').val();
        var AuthorizedPersonDepartmentAdd = $('#AuthorizedPersonDepartmentAdd').val();
        var AuthorizedPhoneAdd = $('#AuthorizedPhoneAdd').val();
        var AuthorizedPersonWhatsapAdd = $('#AuthorizedPersonWhatsapAdd').val();
        var AuthorizedPersonEmailAdd = $('#AuthorizedPersonEmailAdd').val();

        if(current_name == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Firma Ad Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(ShortNameAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Kısa Ad Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(CurrencyAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(currentRow == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Görev Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(sectorAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonDepartmentAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Departman Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPhoneAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Telefon Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonWhatsapAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Whatsap Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonEmailAdd == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Email Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {

            //! Ajax
            $.ajax({
                url: "/current/cart/add/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    
                    current_row: $('#currentRow').val(),
                    sectoral_type: $('#sectorAdd').val(),
                    sectoral_typeCode:$('#sectorAdd option[value='+sectorAdd+']').attr('data_codeNo'),
                    
                    current_name: $('#currentNameAdd').val(),
                    short_name: $('#ShortNameAdd').val(),

                    currency: document.getElementById("SelectCurrency").value,
                    description: document.getElementById('DescriptionAdd').value,

                    authorized_person: $('#AuthorizedPersonAdd').val(),
                    authorized_person_role: $('#AuthorizedPersonDepartmentAdd').val(),
                    authorized_person_tel: $('#AuthorizedPhoneAdd').val(),
                    authorized_person_whatsap: $('#AuthorizedPersonWhatsapAdd').val(),
                    authorized_person_mail: $('#AuthorizedPersonEmailAdd').val(),

                    ref_person: $('#refPersonAdd').val(),
                    ref_departman: $('#refDepartmentAdd').val(),
                    ref_phone: $('#refPhoneAdd').val(),
                    ref_email: $('#refEmailAdd').val(),
                    
                    country: $('#CountryAdd').val(),
                    city: $('#CityAdd').val(),
                    district: $('#DitsrictAdd').val(),
                    post_code: $('#PostCodeAdd').val(),

                    tel1: $('#TelAdd1').val(),
                    tel2: $('#TelAdd2').val(),
                    fax1: $('#FaxAdd2').val(),

                    address: document.getElementById('adressAdd').value,
                    billing_address: document.getElementById('InvoiceAddressAdd').value,
                    tax_administration: $('#tax_administration').val(),
                    tax_number: $('#tax_number').val(),

                    web_address: $('#WebAdd').val(),
                    email: $('#EmailAdd').val(),
                    email_cc: $('#EmailCCAdd').val(),
                
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


    //! ************ Ekleme  ***************
    $("#btn_edit").click(function (e) {
        e.preventDefault();

        //alert("btn_edit");

        //! Id
        var data_id =  $('#btn_edit').attr('data_id');
        var sectorEdit = $('#sectorEdit').val();

        var current_name = $('#currentNameEdit').val(); //! Firma  Ad
        var ShortNameEdit = $('#ShortNameEdit').val(); //! Kısa Ad
        var CurrencyEdit = $('#SelectCurrency').val(); //! Para Birimi

        var currentRow = $('#currentRow').val(); //! Cari Kod
        var sectorEdit = $('#sectorEdit').val(); //! Sektorel Kod

        var AuthorizedPersonEdit = $('#AuthorizedPersonEdit').val();
        var AuthorizedPersonDepartmentEdit = $('#AuthorizedPersonDepartmentEdit').val();
        var AuthorizedPhoneEdit = $('#AuthorizedPhoneEdit').val();
        var AuthorizedPersonWhatsapEdit = $('#AuthorizedPersonWhatsapEdit').val();
        var AuthorizedPersonEmailEdit = $('#AuthorizedPersonEmailEdit').val();

        if(current_name == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Firma Ad Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(ShortNameEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Kısa Ad Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(CurrencyEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Para Birimi Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(currentRow == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Görev Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(sectorEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Sektor Seçilmedi",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonDepartmentEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Departman Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPhoneEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Telefon Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonWhatsapEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Whatsap Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(AuthorizedPersonEmailEdit == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yetkili Kişi Email Yazılmadı",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {
    
            //! Ajax
            $.ajax({
                url: "/current/cart/edit/post",
                method: "post",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id: Number(data_id),
                    
                    current_no: $('#btn_edit').attr('data_codeNumber'),
                    current_row: $('#currentRow').val(),
                    sectoral_type: $('#sectorEdit').val(),
                    sectoral_typeCode:$('#sectorEdit option[value='+sectorEdit+']').attr('data_codeNo'),
                    
                    current_name: $('#currentNameEdit').val(),
                    short_name: $('#ShortNameEdit').val(),

                    currency: document.getElementById("SelectCurrency").value,
                    description: document.getElementById('DescriptionEdit').value,

                    authorized_person: $('#AuthorizedPersonEdit').val(),
                    authorized_person_role: $('#AuthorizedPersonDepartmentEdit').val(),
                    authorized_person_tel: $('#AuthorizedPhoneEdit').val(),
                    authorized_person_whatsap: $('#AuthorizedPersonWhatsapEdit').val(),
                    authorized_person_mail: $('#AuthorizedPersonEmailEdit').val(),

                    ref_person: $('#refPersonEdit').val(),
                    ref_departman: $('#refDepartmentEdit').val(),
                    ref_phone: $('#refPhoneEdit').val(),
                    ref_email: $('#refEmailEdit').val(),

                    country: $('#CountryEdit').val(),
                    city: $('#CityEdit').val(),
                    district: $('#DitsrictEdit').val(),
                    post_code: $('#PostCodeEdit').val(),

                    tel1: $('#TelEdit1').val(),
                    tel2: $('#TelEdit2').val(),
                    fax1: $('#FaxEdit2').val(),

                    address: document.getElementById('adressEdit').value,
                    billing_address: document.getElementById('InvoiceAddressEdit').value,
                    tax_administration: $('#tax_administration').val(),
                    tax_number: $('#tax_number').val(),

                    web_address: $('#WebEdit').val(),
                    email: $('#EmailEdit').val(),
                    email_cc: $('#EmailCCEdit').val(),
                
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


    //! Banka

    
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
                        url: "/bank/delete/post/multi",
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
                        url: "/bank/edit/active/multi",
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
                        url: "/bank/edit/active/multi",
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
                        url: "/bank/edit/active",
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

            //! Ajax  Post
            $.ajax({
                url: "/bank/search/post",
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

    //! Modal Banka Güncelle
    $('document').ready(function () {
        $("#edit_modal").modal({
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
                url: "/bank/search/post",
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

                    $('#CurrencyCartIDEdit').val(response.DB.currencyCartId);
                    $('#bankaAccounttitleEdit').val(response.DB.bankaAccountTitle);
                    $('#BanktitleEdit').val(response.DB.bankTitle);
                    $('#BranchEdit').val(response.DB.branch);
                    $('#AcountNumberEdit').val(response.DB.accountNumber);

                    $('#IbanEdit').val(response.DB.iban);
                    $('#SwiftEdit').val(response.DB.swift);
                
                },
                error: function (error) { console.log("search error:", error); alert("error");},
              complete: function() {}
            }); //! Ajax Post Son
             

            //! Return
            $('#edit_data_id').html(modalId);

            
            //! Görünürlük Kontrolleri
            $('#loaderEdit').css('display','none');
            $('#ModalBodyInfoEdit').css('display','block');
        
        }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });

    }); //! Modal Banka Güncelle Son

    //! Güncelle
    $("#data_bank_update").click(function (e) {
        e.preventDefault();

        //! Id
        var data_id =  $('#edit_data_id').html();

        //! Ajax
        $.ajax({
            url: "/bank/edit/post",
            method: "post",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            data: {
                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                id: Number(data_id),
                currencyCartId: $('#CurrencyCartIDEdit').val(),
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

    //! ************ Banka Silme  ***************
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
                        url: "/bank/delete/post",
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
    //! ************Banka  Silme Son  ***************


    //! ************ Banka  Ekleme  ***************
    //! Ekleme
    $("#new_bank_add").click(function (e) {
        e.preventDefault();

        //! Ajax
        $.ajax({
            url: "/bank/add/post",
            method: "post",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            data: {
                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                currencyCartId: $('#CurrencyCartIDAdd').val(),
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
    //! ************Banka Ekleme Son  ***************
 
 });
 