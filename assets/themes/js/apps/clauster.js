$(function() {
   //Initialize Select2 Elements
   $('.select2').select2()
})

function form(id) {
   if (id == 0) {
      $('#modal_title').html('Tambah Data');
      $("#_mode").val('tambah');
      $('#kadus_lama').hide();
   } else {
      $('#modal_title').html('Edit Data');
      $("#_mode").val('ubah');
      $('#kadus_lama').show();
   }

   $("#modal-form").modal('show');

   $.ajax({
      type: "POST",
      url: url+"clauster/getDusun/"+id,
      dataType: 'json',
      success: function(data) {
         console.log(data);
         $("#id").val(data.data.id);
         $("#nama_dusun").val(data.data.nama_dusun);
         $("#kepala_dusun_lama").val('Nik : ' + data.data.nik + ' - ' + data.data.nama_penduduk);
      }
   });
   return false;
}