var _videoExtensions = [".mp4", ".webm"];

function validate_video(file) {
   if (file.type == "file") {
      var sFileName = file.value;
      if (sFileName.length > 0) {
         var blnValid = false;
         for (var j = 0; j < _videoExtensions.length; j++) {
            var sCurExtension = _videoExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
               var file_size = $('#video')[0].files[0].size;
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
            alert("Maaf Hanya Boleh File yang Berextensi : " + _videoExtensions.join(", "));
            file.value = "";
            return false;
         }
      }
   }
   return true;
}