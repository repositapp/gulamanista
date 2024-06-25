$(document).ready(function() {
   // form pendaftaran
   $('#regText').html('Daftar');
   $('#regForm').submit(function(e) {
      e.preventDefault();
      $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
      $('#message').html('Checking...');
      $('#regText').html('Please wait...');
      $('#submit').prop('disabled', true);
      var user = $('#regForm').serialize();
      var reg_akun = function() {
         $.ajax({
            type: 'POST',
            url: url + 'auth/daftar',
            dataType: 'json',
            data: user,
            success: function(response) {
               $('#message').html(response.message);
               $('#regText').html('Daftar');
               $('#submit').prop('disabled', false);
               if (response.error) {
                  $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
               } else {
                  $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                  $('#regForm')[0].reset();
                  setTimeout(function() {
                     window.location = url+'login';
                  }, 2000);

                  // setTimeout(function() {
                  //    location.reload();
                  // }, 1000);
               }
            }
         });
      };
      setTimeout(reg_akun, 2000);
   });
});