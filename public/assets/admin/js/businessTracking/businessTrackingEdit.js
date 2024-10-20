$(function () {

    //alert("sabit");
    //console.log("js çalışıyor");

    //! ************ Note İşlemler  *******************
    
        
        //! Not Listeleme
        function notListView(data) {
            //console.log("data:",data);

            var returnData ="";

            for (let index = 0; index < data.length; index++) {
                const element = data[index];

                returnData +='<tr id="'+data[index].id+'" class="conditions">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih" value="'+data[index].date+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="" value="'+data[index].category+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >'+data[index].description+'</textarea> </td>';
              
                returnData +=' <td class="text-end">';
                returnData +=' <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_NoteModal" data-id="'+data[index].id+'" data-general="0"><i data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i></button>';
                returnData +=' <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditNoteModal" data-id="'+data[index].id+'"  data-general="0"><i data-id="'+data[index].id+'"  class=" ri-edit-2-fill fs-16"></i></button>';
                returnData +='</td>';
                returnData +='</tr>';
            }

            $('#DB_Find_Note').html(returnData);
            
        }
        //! Not Listeleme Son


        //! Not Ekleme
        $("#new_note_add").click(function (e) {
            e.preventDefault();

        
            //! Veriler
            var noteDate = $('#noteDate').val();
            var noteCategory = $('#noteCategory').val();
            var noteDescription = $('#noteDescription').val();

            if(noteDate == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Not Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(noteCategory == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Not Kategori Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(noteDescription == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Not Detayı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/note/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    
                        date: $('#noteDate').val(),
                        category: $('#noteCategory').val(),
                        description: $('#noteDescription').val(),
                        fileUrl: $('#filePathUrlNote').html(),

                        business_id: $('#btn_edit').attr('data_id'),
                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        //! alert("başarılı");
                        //! console.log("response:", response);
                        //! console.log("status:", response.status);

                        if (response.status == "success") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });


                            //!  Tablo Güncelle
                            notListView(response.DB_Filter);

                            //! Temiz
                            $('#noteDate').val("")
                            $('#noteCategory').val("")
                            $('#noteDescription').val("")

                            //! Dosya Temizleme
                            $('#filePathUrlNote').html(null);
                            $('#fileInputNote').val("")
                            $('#product_dowloand_imgAddNote').css('display','none');
                            $('#product_dowloand_imgAddNote').attr("href",null);

                            //! ProgressBar
                            $("#progressBarFileUploadNote").width('0%');

                            //! Return
                            $("#AddNoteModal").modal('hide');
                            

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

        }); //! Not Ekleme Son

        
        //! Not Silme
        $('document').ready(function () {
            $("#Delete_NoteModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Delete_ConditionsModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

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
                            url: "/business/tracking/note/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                business_id: $('#btn_edit').attr('data_id'),
                                id: data_id,
                            },
                            success: function (response) {

                                //console.log("response:",response);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
        
                                    //!  Tablo Güncelle
                                    notListView(response.DB_Filter);

                                    //! Modal Kapatma
                                    $("#Delete_NoteModal").modal('hide');

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
                        
                        //! Modal Kapatma
                        $("#Delete_NoteModal").modal('hide');

                    }
                });

            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Not Silme Son


        //! ************ Güncelle  ***************

        //! Not Modal Güncelle
        $('document').ready(function () { 
            $("#EditNoteModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event){
                //! alert("EditNoteModal Açıldı");

                var button = $(event.relatedTarget);
                var modalId = button.data("id");

                //console.log("modalId:",modalId);

                //! Ajax  Post
                $.ajax({
                    url: "/business/tracking/note/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        //! alert("başarılı");
                        //! console.log("response:", response);
                        //! console.log("status:", response.status);

                        //! Görünürlük Kontrolleri
                        $('#LoadingNoteUpdate').css('display','block');
                        $('#ModalBodyInfNoteUpdate').css('display','none');
                       
                        //! Veriler
                        $('#noteDateEdit').val(response.DB.date);
                        $('#noteCategoryEdit').val(response.DB.category);
                        $('#noteDescriptionEdit').val(response.DB.description);
                      

                        //! Dosya - Resim
                        if(response.DB.fileUrl != "" && response.DB.fileUrl != null ) {
                           
                            //! ProgressBar
                            $("#progressBarFileUploadEditNote").width('100%');

                            //! Upload Durum
                            $('#LoadingFileUploadEditNote').hide();
                            $('#uploadStatusEditNote').hide();

                            //! Upload Url
                            $('#filePathUrlEditNote').html(response.DB.fileUrl);

                            $('#product_dowloand_imgEditNote').css('display','block');
                            $('#product_dowloand_imgEditNote').attr("href","/"+response.DB.fileUrl);

                            
                        }
                        else if(response.DB.fileUrl == "" || response.DB.fileUrl == null ) {
                            $('#filePathUrlEditNote').html(null);
                            $('#product_dowloand_imgEdit').css('display','none');

                            //! ProgressBar
                            $("#progressBarFileUploadEditNote").width('0%');
                        }


                        //! Return
                        $('#update_note_data_id').html(modalId);

                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingNoteUpdate').css('display','none');
                        $('#ModalBodyInfNoteUpdate').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son


                //! Return
                $('#update_note_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#LoadingNoteUpdate').css('display','none');
                $('#ModalBodyInfNoteUpdate').css('display','block');

            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Not Modal Güncelle Son


        //! Not Güncelle
        $("#data_note_update").click(function (e) {
            e.preventDefault();

              //! Veriler
              var noteDate = $('#noteDateEdit').val();
              var noteCategory = $('#noteCategoryEdit').val();
              var noteDescription = $('#noteDescriptionEdit').val();
  
              if(noteDate == "") {
  
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Not Tarihi Yazılmadı",
                      showConfirmButton: false,
                      timer: 2000,
                  });
  
              }
              else  if(noteCategory == "") {
  
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Not Kategori Yazılmadı",
                      showConfirmButton: false,
                      timer: 2000,
                  });
  
              }
              else  if(noteDescription == "") {
  
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Not Detayı Yazılmadı",
                      showConfirmButton: false,
                      timer: 2000,
                  });
  
              }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/note/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number($('#update_note_data_id').html()),

                        date: $('#noteDateEdit').val(),
                        category: $('#noteCategoryEdit').val(),
                        description: $('#noteDescriptionEdit').val(),
                        fileUrl: $('#filePathUrlEditNote').html(),

                        business_id: $('#btn_edit').attr('data_id'),
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

                            //! Kapatma
                            $("#EditNoteModal").modal('hide');

                           //!  Tablo Güncelle
                           notListView(response.DB_Filter);

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


        }); //! Not  Güncelle Son

        //! ************ Güncelle Son  ***************


        //! Not - Dosya Yükle - Ekle
        $("#fileUploadNoteClick").click(function (e) {
            e.preventDefault();
            //! alert("note fileUploadNoteClick");

            //! Dosya Yükleme
            const fileInput = document.querySelector("#fileInputNote");
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

                            $("#progressBarFileUploadNote").width(percentComplete + '%');
                            $("#progressBarFileUploadNote").html(percentComplete+'%');

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
                    $("#progressBarFileUploadNote").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadNote').toggle();
                    $('#uploadStatusNote').hide();

                    //! Upload Url
                    $('#filePathUrlNote').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadNote').hide();
                    $('#uploadStatusNote').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                    //! Upload Url
                    $('#filePathUrlNote').html("");


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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

                    //! ProgressBar
                    $("#progressBarFileUploadNote").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadNote').hide();
                    $('#uploadStatusNote').hide();

                    //! Upload Url
                    $('#filePathUrlNote').html(resp.file_url);
                    $('#productViewImageAddNote').css('display','block');
                    $('#productViewImageAddNote').attr("src",resp.file_path);

                    $('#product_dowloand_imgAddNote').css('display','block');
                    $('#product_dowloand_imgAddNote').attr("href",resp.file_path);
                    

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

        }); //! Not - Dosya Yükle - Ekle Son


        //! Not - Dosya Yükle - Güncelle
        $("#fileUploadClickEditNote").click(function (e) {
            e.preventDefault();
            //! alert("Note fileUploadClick Edit");

            //! Dosya Yükleme
            const fileInput = document.querySelector("#fileInputEditNote");
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

                            $("#progressBarFileUploadEditNote").width(percentComplete + '%');
                            $("#progressBarFileUploadEditNote").html(percentComplete+'%');

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
                    $("#progressBarFileUploadEditNote").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadEditNote').toggle();
                    $('#uploadStatusEditNote').hide();

                    //! Upload Url
                    $('#filePathUrlEditNote').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadEditNote').hide();
                    $('#uploadStatusEditNote').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                    //! Upload Url
                    $('#filePathUrlEditNote').html("");


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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

                    //! ProgressBar
                    $("#progressBarFileUploadEditNote").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadEditNote').hide();
                    $('#uploadStatusEditNote').hide();

                    //! Upload Url
                    $('#filePathUrlEditNote').html(resp.file_url);
                    $('#productViewImageEditNote').css('display','block');
                    $('#productViewImageEditNote').attr("src",resp.file_path);

                    $('#product_dowloand_imgEditNote').css('display','block');
                    $('#product_dowloand_imgEditNote').attr("href",resp.file_path);
                    

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
        //! Not - Dosya Yükle - Güncelle Son

    

    //! ************ Note İşlemler Son  ***************


    //! ************ Belge İşlemler  *******************

        
        //! Belge Listeleme
        function docListView(data) {
            //console.log("data:",data);

            var returnData ="";

            for (let index = 0; index < data.length; index++) {
                const element = data[index];

                returnData +='<tr id="'+data[index].id+'" class="conditions">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih" value="'+data[index].date+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="" value="'+data[index].title+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >'+data[index].description+'</textarea> </td>';
            
                returnData +=' <td class="text-end">';
                returnData +=' <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_DocModal" data-id="'+data[index].id+'" data-general="0"><i data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i></button>';
                returnData +=' <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditDocModal" data-id="'+data[index].id+'"  data-general="0"><i data-id="'+data[index].id+'"  class=" ri-edit-2-fill fs-16"></i></button>';
                returnData +='</td>';
                returnData +='</tr>';
            }

            $('#DB_Find_Doc').html(returnData);
            
        }
        //! Belge Listeleme Son

        //! Belge Ekleme
        $("#new_doc_add").click(function (e) {
            e.preventDefault();

           
            //! Veriler
            var docDate = $('#docDate').val();
            var docTitle = $('#docTitle').val();
            var docDescription = $('#docDescription').val();
            var docFile = $('#filePathUrlDoc').html();

            if(docDate == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Belge Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(docTitle == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Belge Adı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(docDescription == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Belge Detayı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(docFile == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Dosya Yüklenmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/doc/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    
                        date: $('#docDate').val(),
                        title: $('#docTitle').val(),
                        description: $('#docDescription').val(),
                        fileUrl: $('#filePathUrlDoc').html(),

                        business_id: $('#btn_edit').attr('data_id'),
                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        //! alert("başarılı");
                        //! console.log("response:", response);
                        //! console.log("status:", response.status);

                        if (response.status == "success") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });


                            //!  Tablo Güncelle
                            docListView(response.DB_Filter);

                            //! Temiz
                            $('#docDate').val("")
                            $('#docTitle').val("")
                            $('#docDescription').val("")

                            //! Dosya Temizleme
                            $('#filePathUrlDoc').html(null);
                            $('#fileInputDoc').val("")
                            $('#productViewImageAddDoc').css('display','none');
                            $('#productViewImageAddDoc').attr("href",null);

                            $('#product_dowloand_imgAddDoc').css('display','none');
                            $('#product_dowloand_imgAddDoc').attr("href",null);

                            //! ProgressBar
                            $("#progressBarFileUploadDoc").width('0%');

                            //! Return
                            $("#AddDocModal").modal('hide');
                            

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

        }); //! Belge Ekleme Son


        //! Belge Silme
        $('document').ready(function () {
            $("#Delete_DocModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Doc Delete_Modal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

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
                            url: "/business/tracking/doc/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                business_id: $('#btn_edit').attr('data_id'),
                                id: data_id,
                            },
                            success: function (response) {

                                //console.log("response:",response);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
        
                                    //!  Tablo Güncelle
                                    docListView(response.DB_Filter);

                                    //! Modal Kapatma
                                    $("#Delete_DocModal").modal('hide');

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
                        
                        //! Modal Kapatma
                        $("#Delete_DocModal").modal('hide');

                    }
                });

            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Belge Silme Son

        
        //! ************ Güncelle  ***************

        //! Belge Modal Güncelle
        $('document').ready(function () { 
            $("#EditDocModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event){
                //! alert("EditNoteModal Açıldı");

                var button = $(event.relatedTarget);
                var modalId = button.data("id");

                //console.log("modalId:",modalId);

                //! Ajax  Post
                $.ajax({
                    url: "/business/tracking/doc/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        //! alert("başarılı");
                        //! console.log("response:", response);
                        //! console.log("status:", response.status);

                        //! Görünürlük Kontrolleri
                        $('#LoadingDocUpdate').css('display','block');
                        $('#ModalBodyInfDocUpdate').css('display','none');
                       
                        //! Veriler
                        $('#docDateEdit').val(response.DB.date);
                        $('#docTitleEdit').val(response.DB.title);
                        $('#docDescriptionEdit').val(response.DB.description);
                      

                        //! Dosya - Resim
                        if(response.DB.fileUrl != "" && response.DB.fileUrl != null ) {
                           
                            //! ProgressBar
                            $("#progressBarFileUploadEditDoc").width('100%');

                            //! Upload Durum
                            $('#LoadingFileUploadEditDoc').hide();
                            $('#uploadStatusEditDoc').hide();

                            //! Upload Url
                            $('#filePathUrlEditDoc').html(response.DB.fileUrl);

                            $('#product_dowloand_imgEditDoc').css('display','block');
                            $('#product_dowloand_imgEditDoc').attr("href","/"+response.DB.fileUrl);

                            
                        }
                        else if(response.DB.fileUrl == "" || response.DB.fileUrl == null ) {
                            $('#filePathUrlEditDoc').html(null);
                            $('#product_dowloand_imgEdit').css('display','none');

                            //! ProgressBar
                            $("#progressBarFileUploadEditDoc").width('0%');
                        }


                        //! Return
                        $('#update_doc_data_id').html(modalId);

                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingDocUpdate').css('display','none');
                        $('#ModalBodyInfDocUpdate').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son


                //! Return
                $('#update_doc_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#LoadingDocUpdate').css('display','none');
                $('#ModalBodyInfDocUpdate').css('display','block');

            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Belge Modal Güncelle Son


        //! Belge Güncelle
        $("#data_doc_update").click(function (e) {
            e.preventDefault();

          
           //! Veriler
           var docDate = $('#docDateEdit').val();
           var docTitle = $('#docTitleEdit').val();
           var docDescription = $('#docDescriptionEdit').val();
           var docFile = $('#filePathUrlEditDoc').html();

           if(docDate == "") {

               Swal.fire({
                   position: "center",
                   icon: "error",
                   title: "Belge Tarihi Yazılmadı",
                   showConfirmButton: false,
                   timer: 2000,
               });

           }
           else  if(docTitle == "") {

               Swal.fire({
                   position: "center",
                   icon: "error",
                   title: "Belge Adı Yazılmadı",
                   showConfirmButton: false,
                   timer: 2000,
               });

           }
           else  if(docDescription == "") {

               Swal.fire({
                   position: "center",
                   icon: "error",
                   title: "Belge Detayı Yazılmadı",
                   showConfirmButton: false,
                   timer: 2000,
               });

           }
           else  if(docFile == "") {

               Swal.fire({
                   position: "center",
                   icon: "error",
                   title: "Dosya Yüklenmedi",
                   showConfirmButton: false,
                   timer: 2000,
               });

           }
            else {

             
                //! Ajax
                $.ajax({
                    url: "/business/tracking/doc/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number($('#update_doc_data_id').html()),

                        date: $('#docDateEdit').val(),
                        title: $('#docTitleEdit').val(),
                        description: $('#docDescriptionEdit').val(),
                        fileUrl: $('#filePathUrlEditDoc').html(),

                        business_id: $('#btn_edit').attr('data_id'),
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

                            //! Kapatma
                            $("#EditDocModal").modal('hide');

                           //!  Tablo Güncelle
                           docListView(response.DB_Filter);

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


        }); //! Belge  Güncelle Son

        //! ************ Güncelle Son  ***************


        //! Belge - Dosya Yükle - Ekle
        $("#fileUploadDocClick").click(function (e) {
            e.preventDefault();
            //alert("doc fileUploadNoteClick");

            //! Dosya Yükleme
            const fileInput = document.querySelector("#fileInputDoc");
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

                            $("#progressBarFileUploadDoc").width(percentComplete + '%');
                            $("#progressBarFileUploadDoc").html(percentComplete+'%');

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
                    $("#progressBarFileUploadDoc").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadDoc').toggle();
                    $('#uploadStatusDoc').hide();

                    //! Upload Url
                    $('#filePathUrlDoc').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadDoc').hide();
                    $('#uploadStatusDoc').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                    //! Upload Url
                    $('#filePathUrlDoc').html("");


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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

                    //! ProgressBar
                    $("#progressBarFileUploadDoc").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadDoc').hide();
                    $('#uploadStatusDoc').hide();

                    //! Upload Url
                    $('#filePathUrlDoc').html(resp.file_url);
                    $('#productViewImageAddDoc').css('display','block');
                    $('#productViewImageAddDoc').attr("src",resp.file_path);

                    $('#product_dowloand_imgAddDoc').css('display','block');
                    $('#product_dowloand_imgAddDoc').attr("href",resp.file_path);
                    

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

        }); //! Belge - Dosya Yükle - Ekle Son

        
        //! Belge - Dosya Yükle - Güncelle
        $("#fileUploadClickEditDoc").click(function (e) {
            e.preventDefault();
            //! alert("fileUploadClick Edit");

            //! Dosya Yükleme
            const fileInput = document.querySelector("#fileInputEditDoc");
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

                            $("#progressBarFileUploadEditDoc").width(percentComplete + '%');
                            $("#progressBarFileUploadEditDoc").html(percentComplete+'%');

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
                    $("#progressBarFileUploadEditDoc").width('0%');

                    //! Upload Durum
                    $('#LoadingFileUploadEditDoc').toggle();
                    $('#uploadStatusEditDoc').hide();

                    //! Upload Url
                    $('#filePathUrlEditDoc').html("");
                },
                error: function (error) {
                    alert("başarısız");
                    console.log("Hata oluştu error:", error);

                    //! Upload Durum
                    $('#LoadingFileUploadEditDoc').hide();
                    $('#uploadStatusEditDoc').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');

                    //! Upload Url
                    $('#filePathUrlEditDoc').html("");


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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

                    //! ProgressBar
                    $("#progressBarFileUploadEditDoc").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadEditDoc').hide();
                    $('#uploadStatusEditDoc').hide();

                    //! Upload Url
                    $('#filePathUrlEditDoc').html(resp.file_url);
                    $('#productViewImageEditDoc').css('display','block');
                    $('#productViewImageEditDoc').attr("src",resp.file_path);

                    $('#product_dowloand_imgEditDoc').css('display','block');
                    $('#product_dowloand_imgEditDoc').attr("href",resp.file_path);
                    

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
        //! Belge - Dosya Yükle - Güncelle Son


    //! ************ Belge İşlemler Son  *******************


    //! ************ Todo İşlemler  ***********************

        //! Todo Listeleme
        function todoListView(data) {
            //console.log("data:",data);

            var returnData ="";

            for (let index = 0; index < data.length; index++) {
                const element = data[index];

                returnData +='<tr id="'+data[index].id+'" class="conditions">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih" value="'+data[index].title+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="" value="'+data[index].todo+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >'+data[index].description+'</textarea> </td>';
              
                returnData +=' <td class="text-end">';
                returnData +=' <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_TodoModal" data-id="'+data[index].id+'" data-general="0"><i data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i></button>';
                returnData +=' <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditTodoModal" data-id="'+data[index].id+'"  data-general="0"><i data-id="'+data[index].id+'"  class=" ri-edit-2-fill fs-16"></i></button>';
                returnData +='</td>';
                returnData +='</tr>';
            }

            $('#DB_Find_Todo').html(returnData);
            
        }
        //! Todo Listeleme Son

    
        //! Todo Ekleme
        $("#new_todo_add").click(function (e) {
            e.preventDefault();

            //! Veriler
            var todoTitle = $('#todoTitle').val();
            var todoStatus = $('#todoStatus').val();
            var todoDescription = $('#todoDescription').val();

            if(todoTitle == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Başlık Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(todoStatus == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Durum Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(todoDescription == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Açıklama Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/todo/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                    
                        title: $('#todoTitle').val(),
                        todo: $('#todoStatus').val(),
                        description: $('#todoDescription').val(),
                        fileUrl: $('#filePathUrlTodo').html(),

                        business_id: $('#btn_edit').attr('data_id'),
                        created_byId: document.cookie.split(';').find((row) => row.startsWith(' yildirimdev_userID='))?.split('=')[1]
                    },
                    success: function (response) {
                        //! alert("başarılı");
                        console.log("response:", response);
                        //! console.log("status:", response.status);

                        if (response.status == "success") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                            });


                            //!  Tablo Güncelle
                            todoListView(response.DB_Filter);

                            //! Temiz
                            $('#todoTitle').val("")
                            $('#todoStatus').val("")
                            $('#todoDescription').val("")

                            //! Dosya Temizleme
                            $('#filePathUrlTodo').html(null);
                            $('#fileInputTodo').val("")
                            $('#product_dowloand_imgAddTodo').css('display','none');
                            $('#product_dowloand_imgAddTodo').attr("href",null);

                            //! ProgressBar
                            $("#progressBarFileUploadTodo").width('0%');

                            //! Return
                            $("#AddTodoModal").modal('hide');

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

        }); //! Todo Ekleme Son

        
        //! Todo Silme
        $('document').ready(function () {
            $("#Delete_TodoModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Doc Delete_Modal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

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
                            url: "/business/tracking/todo/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                business_id: $('#btn_edit').attr('data_id'),
                                id: data_id,
                            },
                            success: function (response) {

                                //console.log("response:",response);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
        
                                    //!  Tablo Güncelle
                                    todoListView(response.DB_Filter);

                                    //! Modal Kapatma
                                    $("#Delete_TodoModal").modal('hide');

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
                        
                        //! Modal Kapatma
                        $("#Delete_TodoModal").modal('hide');

                    }
                });

            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Todo Silme Son

        //! ************ Güncelle  ***************

        //! Todo Modal Güncelle
        $('document').ready(function () { 
            $("#EditTodoModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event){
                //! alert("EditNoteModal Açıldı");

                var button = $(event.relatedTarget);
                var modalId = button.data("id");

                //console.log("modalId:",modalId);

                //! Ajax  Post
                $.ajax({
                    url: "/business/tracking/todo/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        //! alert("başarılı");
                        //! console.log("response:", response);
                        //! console.log("status:", response.status);

                        //! Görünürlük Kontrolleri
                        $('#LoadingTodoUpdate').css('display','block');
                        $('#ModalBodyInfTodoUpdate').css('display','none');
                       
                        //! Veriler
                        $('#todoTitleEdit').val(response.DB.title);
                        $('#todoStatusEdit').val(response.DB.todo);
                        $('#todoDescriptionEdit').val(response.DB.description);
                      

                        //! Return
                        $('#update_todo_data_id').html(modalId);

                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingTodoUpdate').css('display','none');
                        $('#ModalBodyInfTodoUpdate').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son


                //! Return
                $('#update_todo_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#LoadingTodoUpdate').css('display','none');
                $('#ModalBodyInfTodoUpdate').css('display','block');

            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Todo Modal Güncelle Son


        //! Todo Güncelle
        $("#data_todo_update").click(function (e) {
            e.preventDefault();

           
            //! Veriler
            var todoTitle = $('#todoTitleEdit').val();
            var todoStatus = $('#todoStatusEdit').val();
            var todoDescription = $('#todoDescriptionEdit').val();
  
            if(todoTitle == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Başlık Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(todoStatus == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Durum Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(todoDescription == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Açıklama Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/todo/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number($('#update_todo_data_id').html()),

                        title: $('#todoTitleEdit').val(),
                        todo: $('#todoStatusEdit').val(),
                        description: $('#todoDescriptionEdit').val(),
                       

                        business_id: $('#btn_edit').attr('data_id'),
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

                            //! Kapatma
                            $("#EditTodoModal").modal('hide');

                        //!  Tablo Güncelle
                        todoListView(response.DB_Filter);

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


        }); //! Todo  Güncelle Son

        //! ************ Güncelle Son  ***************

    //! ************ Todo İşlemler  Son *******************

    
    //! ************ Log İşlemler  ***************
    
        //! Log Listeleme
        function logListView(data) {
            //console.log("data:",data);

            var returnData ="";

            for (let index = 0; index < data.length; index++) {
                const element = data[index];

                returnData +='<tr id="'+data[index].id+'" class="conditions">';
                returnData +='<th scope="row" class="product-id">'+Number(index+1)+'</th>';
                returnData +='<td class="text-start"><input type="text" class="form-control bg-light border-0" id="Title-1" placeholder="Tarih" value="'+data[index].date+'"readonly="readonly"> </td>';
                returnData +='<td class="text-start"><textarea class="form-control" id="description" rows="2" readonly="readonly"  >'+data[index].description+'</textarea> </td>';
              
                returnData +=' <td class="text-end">';
                returnData +=' <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete_ConditionsModal" data-id="'+data[index].id+'" data-general="0"><i data-id="'+data[index].id+'" class="ri-delete-bin-5-fill fs-16"></i></button>';
                returnData +=' <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditConditionsModal" data-id="'+data[index].id+'"  data-general="0"><i data-id="'+data[index].id+'"  class=" ri-edit-2-fill fs-16"></i></button>';
                returnData +='</td>';
                returnData +='</tr>';
            }

            $('#DB_Find_Log').html(returnData);
            
        }
        //! Log Listeleme Son

        //! Log Ekleme
        $("#new_log_add").click(function (e) {
            e.preventDefault();

            //! Veriler
            var logDateEdit = $('#logDateEdit').val();
            var logDescriptionEdit = $('#logDescriptionEdit').val();

            if(logDateEdit == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "İşlem Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else  if(logDescriptionEdit == "") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "İşlem Detayı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });

            }
            else {

              
                //! Ajax
                $.ajax({
                    url: "/business/tracking/log/add/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                      
                        date: $('#logDateEdit').val(),
                        description: $('#logDescriptionEdit').val(),
                        fileUrl: $('#filePathUrl').html(),

                        business_id: $('#btn_edit').attr('data_id'),
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


                            //!  Tablo Güncelle
                            logListView(response.DB_Filter);

                            //! Temiz
                            $('#logDescriptionEdit').val("")

                            //! Dosya Temizleme
                            $('#filePathUrl').html(null);
                            $('#fileInput').val("")
                            $('#product_dowloand_imgAdd').css('display','none');
                            $('#product_dowloand_imgAdd').attr("href",null);

                            //! ProgressBar
                            $("#progressBarFileUpload").width('0%');

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

            

        }); //! Log Ekleme Son

    
        //! Log Silme
        $('document').ready(function () {
            $("#Delete_ConditionsModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            
            }).on("show.bs.modal", function(event){
                //alert("Delete_ConditionsModal Açıldı");
            
                var button = $(event.relatedTarget); 
                var data_id = button.data("id"); 

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
                            url: "/business/tracking/log/delete/post",
                            method: "post",
                            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                            data: {
                                siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                                business_id: $('#btn_edit').attr('data_id'),
                                id: data_id,
                            },
                            success: function (response) {

                                //console.log("response:",response);

                                if (response.status == "success") {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response.msg,
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
        
                                    //!  Tablo Güncelle
                                    logListView(response.DB_Filter);

                                    //! Modal Kapatma
                                    $("#Delete_ConditionsModal").modal('hide');

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
                        
                        //! Modal Kapatma
                        $("#Delete_ConditionsModal").modal('hide');

                    }
                });

            
            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //!Log  Silme Son


        //! ************ Güncelle  ***************

        //! Log Modal Güncelle
        $('document').ready(function () { 
            $("#EditConditionsModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event){
                //! alert("Modal Açıldı");

                var button = $(event.relatedTarget);
                var modalId = button.data("id");

                // console.log("modalId:",modalId);

                //! Ajax  Post
                $.ajax({
                    url: "/business/tracking/log/search/post",
                    method: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id:Number(modalId)
                    },
                    //beforeSend: function() { console.log("Başlangıc"); },
                    success: function (response) {
                        //! alert("başarılı");
                        console.log("response:", response);
                        //! console.log("status:", response.status);

                        //! Görünürlük Kontrolleri
                        $('#LoadingConditionsUpdate').css('display','block');
                        $('#ModalBodyInfConditionsUpdate').css('display','none');
                       
                        //! Veriler
                        $('#logDateValue').val(response.DB.date);
                        $('#logDescriptionValue').val(response.DB.description);


                        //! Dosya - Resim
                        if(response.DB.fileUrl != "" && response.DB.fileUrl != null ) {
                           
                            //! ProgressBar
                            $("#progressBarFileUploadEdit").width('100%');

                            //! Upload Durum
                            $('#LoadingFileUploadEdit').hide();
                            $('#uploadStatusEdit').hide();

                            //! Upload Url
                            $('#filePathUrlEdit').html(response.DB.fileUrl);

                            $('#product_dowloand_imgEdit').css('display','block');
                            $('#product_dowloand_imgEdit').attr("href","/"+response.DB.fileUrl);

                            
                        }
                        else if(response.DB.fileUrl == "" || response.DB.fileUrl == null ) {
                            $('#filePathUrlEdit').html(null);
                            $('#product_dowloand_imgEdit').css('display','none');

                            //! ProgressBar
                            $("#progressBarFileUploadEdit").width('0%');
                        }


                        //! Return
                        $('#update_conditions_data_id').html(modalId);

                    },
                    error: function (error) { console.log("search error:", error); alert("error");},
                    complete: function() {

                        //! Görünürlük Kontrolleri
                        $('#LoadingConditionsUpdate').css('display','none');
                        $('#ModalBodyInfConditionsUpdate').css('display','block');

                        //console.log("Search Ajax Bitti");

                    }
                }); //! Ajax Post Son


                //! Return
                $('#update_conditions_data_id').html(modalId);

                //! Görünürlük Kontrolleri
                $('#loaderEdit').css('display','none');
                $('#ModalBodyInfoEdit').css('display','block');

            }).on("hide.bs.modal", function (event) {  /* alert("Modal Kapat"); */ });
        }); //! Log Modal Güncelle Son


        //! Log Güncelle
        $("#data_log_update").click(function (e) {
            e.preventDefault();

            //! Select
            var logDateValue =  $('#logDateValue').val();
            var logDescriptionValue =  $('#logDescriptionValue').val();

            if(logDateValue == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "İşlem Tarihi Yazılmnadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(logDescriptionValue == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "İşlem Detayı Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                //! Ajax
                $.ajax({
                    url: "/business/tracking/log/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: Number($('#update_conditions_data_id').html()),

                        date: $('#logDateValue').val(),
                        description: $('#logDescriptionValue').val(),
                        fileUrl: $('#filePathUrlEdit').html(),

                        business_id: $('#btn_edit').attr('data_id'),
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

                            //! Kapatma
                            $("#EditConditionsModal").modal('hide');

                           //!  Tablo Güncelle
                           logListView(response.DB_Filter);

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


        }); //!Log  Güncelle Son

        //! ************ Güncelle Son  ***************

        //! Dosya Yükle - Ekle
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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

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
        //! Dosya Yükle - Ekle Son

        //! Dosya Yükle - Güncelle
        $("#fileUploadClickEdit").click(function (e) {
            e.preventDefault();
            //! alert("fileUploadClick Edit");

            //! Dosya Yükleme
            const fileInput = document.querySelector("#fileInputEdit");
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
                    $('#LoadingFileUploadEdit').hide();
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
                //! alert("Başarılı");
                //! console.log("file resp:", resp);

                    //! ProgressBar
                    $("#progressBarFileUploadEdit").width('100%');

                    //! Upload Durum
                    $('#LoadingFileUploadEdit').hide();
                    $('#uploadStatusEdit').hide();

                    //! Upload Url
                    $('#filePathUrlEdit').html(resp.file_url);
                    $('#productViewImageEdit').css('display','block');
                    $('#productViewImageEdit').attr("src",resp.file_path);

                    $('#product_dowloand_imgEdit').css('display','block');
                    $('#product_dowloand_imgEdit').attr("href",resp.file_path);
                    

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
        //! Dosya Yükle - Güncelle Son

       

    //! ************ Log İşlemleri Son  ***************

        
    //! ************ Güncelle  ***************

        //! Güncelle
        $("#btn_edit").click(function (e) {
            e.preventDefault();

            var Title_Input = $('#Title_Input').val(); 
            var startingDateEdit = $('#startingDateEdit').val(); //! Başlangıc Tarihi
            var finishedDateEdit = $('#finishedDateEdit').val(); //! Bitiş Tarihi
            var status =  $('#StatusEdit').val();

            var personeId =  $('#selectPersonelEdit').val();
            
            
            if(Title_Input == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Başlık Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(startingDateEdit == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Başlangıç Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(status == "Tamamlandı" && finishedDateEdit == ""  ) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bitiş Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(status == "İptal" && finishedDateEdit == ""  ) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bitiş Tarihi Yazılmadı",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else if(personeId == "") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Personel Seçilmedi",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            else {

                
                //! Ajax
                $.ajax({
                    url: "/business/tracking/edit/post",
                    method: "post",
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
                    data: {
                        siteLang: $('[id=lang_change][data_key=lang]').html().trim(),
                        id: $('#btn_edit').attr('data_id'),
                        title: $('#Title_Input').val(),
                        description: $('#description').val(),
                        authorized_statement: $('#requestFormDescription').val(),
                    
                        starting_at:$('#startingDateEdit').val(),
                        finished_at: status == "Devam Ediyor" ? "" :  $('#finishedDateEdit').val(),
                        status:$('#StatusEdit').val(),

                        collocutor_nameSurname:$('#collocutor_nameSurnameEdit').val(),
                        collocutor_phone:$('#collocutor_phoneEdit').val(),

                        personel_id:$('#selectPersonelEdit').val(),
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
 