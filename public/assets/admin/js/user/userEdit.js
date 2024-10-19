$(function () {

    //alert("userEdit");
    //console.log("js çalışıyor");

    
    //! ************ Güncelle  ***************
    //! Güncelle
    $("#btn_edit").click(function (e) {
        e.preventDefault();

        var selectDepartman = $('#selectDepartman').val();
        var selectRole = $('#selectRole').val();

        if(selectDepartman == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Departman Seçiniz",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(selectRole == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Görev Seçiniz",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {

            //! Ajax
            $.ajax({
                url: "/user/edit/post/edit",
                method: "post",
                headers: {  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id:$('#user_info').attr('data_id'),
                    name: $('#firstnameInput').val(),
                    surname: $('#lastnameInput').val(),
                    tel: $('#phonenumberInput').val(),
                    dateofBirth: $('#exampleInputdate').val(),

                    departmanId: $('#selectDepartman').val(),
                    departman: $('#selectDepartman option[value='+selectDepartman +']').html(),
                    role: $('#selectRole').val(),

                    collection_status: $('#collection_status').val(),
                    time_experience: $('#time_experience').val(),
                    type_experience: $('#selectType_experience').val(),
                
                    created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                },
                success: function (response) {

                    if (response.status == "success") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000,
                        });

                        //! Çerezleri Düzenle
                        document.cookie="yildirimdev_name="+$('#firstnameInput').val()+";path=/";
                        document.cookie="yildirimdev_surname="+$('#lastnameInput').val()+";path=/";
                        document.cookie="yildirimdev_departman="+$('#selectDepartman option[value='+selectDepartman +']').html()+";path=/";
                       
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


    //! ************ Güncelle Şifre   ***************
    //! Güncelle Şifre
    $("#edit_pass").click(function (e) {
        e.preventDefault();

        var oldpasswordInput = $('#oldpasswordInput').val();
        var newpasswordInput = $('#newpasswordInput').val();
        var confirmpasswordInput = $('#confirmpasswordInput').val();

        if(oldpasswordInput == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Eski Şifre Yazınız",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(newpasswordInput == "") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Yeni Şifre Yazınız",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else if(confirmpasswordInput != newpasswordInput) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Şifreler Aynı Değildir",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        else {
            
             //! Ajax
            $.ajax({
                url: "/user/edit/post/pass",
                method: "post",
                headers: {  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                data: {
                    siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    id:$('#user_info').attr('data_id'),
                    oldpasswordInput: $('#oldpasswordInput').val(),
                    newpasswordInput: $('#newpasswordInput').val(),
                    confirmpasswordInput: $('#confirmpasswordInput').val(),
                 
                    created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                },
                success: function (response) {
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

    
    }); //! Güncelle Şifre Son
    //! ************ Güncelle Şifre Son  ***************


    //! ************ Profil Resim ***************

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
        formData.append("profileUserId", $('#profileUserId').val());

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
            url: "/user/edit/profile/img",
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
                $('#profileImage').attr('src','/'+resp.file_url);
                $('#profileImage').attr('data-src','/'+resp.file_url);

                //! Çerez
                document.cookie="yildirimdev_img_url="+'/'+resp.file_url+";path=/";

                //! Alert
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: $('[id=lang_change][data_key=TransactionSuccessful]').html().trim(),
                    showConfirmButton: false,
                    timer: 2000,
                });  //! Alert Son

                //! Sayfa Yenileme
               //window.location.reload();

            }
        }); //! Ajax



    });
    //! FileUpload Son

    //! ************ Profil Resim   Son ***************


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
        
 });
 