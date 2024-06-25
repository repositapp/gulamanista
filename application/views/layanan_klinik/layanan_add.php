<form method="post" action="<?= base_url('klinik/simpan_data') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="img-add img-responsive" id="img" src="<?= base_url(); ?>assets/themes/img/none.png" alt="Gambar Layanan">

               <p class="logo-title text-center">Gambar Layanan</p>

               <input type="file" class="form-control input-sm" id="gambar" name="img_klinik" onchange="validate_img(this);" required>
            </div>
         </div>
      </div>
      <div class="col-md-9">
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
                  <div class="form-group">
                     <label for="title_klinik">Title</label>
                     <input type="text" class="form-control input-sm" id="title_klinik" name="title_klinik" placeholder="Masukan titel layanan">
                  </div>
                  <div class="form-group">
                     <label for="deskripsi">Deskripsi</label>
                     <input type="text" class="form-control input-sm" id="deskripsi" name="deskripsi" placeholder="Deskripsi singkat layanan">
                  </div>
                  <div class="form-group">
                     <label for="isi_layanan">Isi Layanan</label>
                     <textarea class="tinymce" id="isi_layanan" name="isi_layanan"></textarea>
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
      </div>
   </div>
</form>

<script type="text/javascript" src="<?= base_url(); ?>assets/themes/js/tinycall.js"></script>