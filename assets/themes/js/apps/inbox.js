$(document).ready(function(){
   $('.view').click(function(){
       var id_konsul = $(this).attr("data-id");
      $.ajax({
         url: url + 'pelayanan/view/'+id_konsul,
         type: "GET",
         dataType: "JSON",
         success:function(data){
            window.location = url+'pelayanan/read_inbox/'+data.id_konsultasi;
         }
      });
   });

   $('.view_umkm').click(function(){
      var id_konsul = $(this).attr("data-id");
     $.ajax({
        url: url + 'konsultasi/view/'+id_konsul,
        type: "GET",
        dataType: "JSON",
        success:function(data){
           window.location = url+'konsultasi/read_inbox/'+data.id_konsultasi;
        }
     });
  });
});