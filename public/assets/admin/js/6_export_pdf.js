$(document).ready(function () {
 

    //! Pdf Çevir
    async function  generatePDF() {
        
        // Choose the element id which you want to export.
        var element = document.getElementById('divToExport');
        // element.style.width = '700px';
        // element.style.height = '900px';
        var opt = {
            margin:       0.5,
            filename:     $('#pdf_Code').html()+'.pdf',
            image:        { type: 'png', quality: 100 },
            html2canvas:  { scale: 1 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait',precision: '10' }
          };
        
        // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
        const savePdf =  html2pdf().set(opt).from(element).save();
        //console.log("savePdf:",savePdf);

        return savePdf;

         
    }  //! Pdf Çevir Son


    //! Export Fonksiyon
    async function çalıştırma () {

          //! Export Göster
          $('#divToExport').css('display','block');
       

          setTimeout(() => {

            //! Export Pdf Fonksiyon
            generatePDF().then(
                function(value) { console.log("başarılı value:",value); $('#divToExport').css('display','none'); window.history.back();    },
                function(error) { console.log("hata error:",error);}
            );

        }, 100);

          

          

    } //! Export Fonksiyon


    //! Export Fonksiyon Kullanımı
    //! çalıştırma();
   
    

});
 