var _logoExtensions = [".png"];
var _imgExtensions = [".png", ".jpg", ".jpeg", ".svg", ".gif"];
var _pdfExtensions = [".pdf"];

function validate_logo(file) {
   if (file.type == "file") {
      var sFileName = file.value;
      if (sFileName.length > 0) {
         var blnValid = false;
         for (var j = 0; j < _logoExtensions.length; j++) {
            var sCurExtension = _logoExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
               var file_size = $('#logo_aplikasi')[0].files[0].size;
               if (file_size > 1000000) {
                  alert("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB");
                  break;
               } else {
                  blnValid = true;
                  document.getElementById("logo").style.display = "block";
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("logo_aplikasi").files[0]);
                
                    oFReader.onload = function(oFREvent) {
                        document.getElementById("logo").src = oFREvent.target.result;
                    };
                  break;
               }
            }
         }

         if (!blnValid) {
            alert("Maaf Hanya Boleh File yang Berextensi : " + _logoExtensions.join(", "));
            file.value = "";
            return false;
         }
      }
   }
   return true;
}

function validate_img(file) {
    if (file.type == "file") {
       var sFileName = file.value;
       if (sFileName.length > 0) {
          var blnValid = false;
          for (var j = 0; j < _imgExtensions.length; j++) {
             var sCurExtension = _imgExtensions[j];
             if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                var file_size = $('#gambar')[0].files[0].size;
                if (file_size > 4000000) {
                   alert("Maaf. File Terlalu Besar ! Maksimal Upload 4 MB");
                   break;
                } else {
                   blnValid = true;
                   document.getElementById("img").style.display = "block";
                     var oFReader = new FileReader();
                     oFReader.readAsDataURL(document.getElementById("gambar").files[0]);
                 
                     oFReader.onload = function(oFREvent) {
                         document.getElementById("img").src = oFREvent.target.result;
                     };
                   break;
                }
             }
          }
 
          if (!blnValid) {
             alert("Maaf Hanya Boleh File yang Berextensi : " + _imgExtensions.join(", "));
             file.value = "";
             return false;
          }
       }
    }
    return true;
}

function validate_pdf(file) {
    if (file.type == "file") {
       var sFileName = file.value;
       if (sFileName.length > 0) {
          var blnValid = false;
          for (var j = 0; j < _pdfExtensions.length; j++) {
             var sCurExtension = _pdfExtensions[j];
             if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                var file_size = $('#pdf')[0].files[0].size;
                if (file_size > 30000000) {
                   alert("Maaf. File Terlalu Besar ! Maksimal Upload 30 MB");
                   break;
                } else {
                   blnValid = true;
                   break;
                }
             }
          }
 
          if (!blnValid) {
             alert("Maaf Hanya Boleh File yang Berextensi : " + _pdfExtensions.join(", "));
             file.value = "";
             return false;
          }
       }
    }
    return true;
}