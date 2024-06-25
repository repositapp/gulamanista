<form method="post" action="<?= base_url('agenda/simpan_perubahan') ?>" enctype="multipart/form-data">
   <div class="box box-primary">
      <div class="box-header with-border">
         <h3 class="box-title">Form <?= $sub_menu; ?></h3>
         <div class="box-tools pull-right">
            <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social btn-default btn-flat btn-sm">
               <i class="fa fa-reply"></i> Kembali
            </a>
         </div>
      </div>
      <div class="form-horizontal">
         <div class="box-body">
            <input type="hidden" id="id_agenda" name="id_agenda" value="<?= $agenda['id']; ?>">

            <div class="form-group">
               <label for="judul_kegiatan" class="col-sm-2 control-label">Judul Kegiatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control input-sm" id="judul_kegiatan" name="judul_kegiatan" placeholder="Masukan judul Kegiatan" value="<?= $agenda['judul_kegiatan']; ?>" required>
               </div>
            </div>
            <div class="form-group">
               <label for="tgl_kegiatan" class="col-sm-2 control-label">Tanggal Kegiatan</label>
               <div class="col-sm-10">
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" class="form-control pull-right input-sm datepicker" id="tgl_kegiatan" name="tgl_kegiatan" placeholder="Tanggal kegiatan" value="<?= $agenda['tgl_kegiatan']; ?>" required>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="waktu_kegiatan" class="col-sm-2 control-label">Waktu Kegiatan</label>
               <div class="col-sm-10">
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                     </div>
                     <input type="text" class="form-control pull-right input-sm timepicker" id="waktu_kegiatan" name="waktu_kegiatan" placeholder="Waktu Kegiatan" value="<?= $agenda['waktu_kegiatan']; ?>" required>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="lokasi_kegiatan" class="col-sm-2 control-label">Lokasi Kegiatan</label>
               <div class="col-sm-10">
                  <textarea class="form-control input-sm" id="lokasi_kegiatan" name="lokasi_kegiatan" rows="3" placeholder="Lokasi kegiatan ..." required><?= $agenda['lokasi_kegiatan']; ?></textarea>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <button onclick="location.reload()" class="btn btn-social btn-danger btn-flat btn-sm">
               <i class="fa fa-close"></i> Batal
            </button>
            <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right"><i class="fa fa-save"></i> Simpan</button>
         </div>
      </div>
   </div>
</form>