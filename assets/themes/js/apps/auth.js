$(document).ready(function() {
   // login form
   $('#logText').html('Masuk');
   $('#logForm').submit(function(e) {
      e.preventDefault();
      $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
      $('#message').html('Memeriksa...');
      $('#logText').html('Tunggu...');
      $('#submit').prop('disabled', true);
      var user = $('#logForm').serialize();
      var login = function() {
         $.ajax({
            type: 'POST',
            url: url + 'auth/login',
            dataType: 'json',
            data: user,
            success: function(response) {
               $('#message').html(response.message);
               $('#logText').html('Masuk');
               $('#submit').prop('disabled', false);
               if (response.error) {
                  $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                  $('#username').focus();
               } else {
                  $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                  setTimeout(function() {
                     location.reload();
                  }, 1000);
               }
            }
         });
      };
      setTimeout(login, 1000);
   });
});