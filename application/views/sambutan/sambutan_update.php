<form method="post" action="<?= base_url('sambutan/simpan_perubahan') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="img-update img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $sambutan['foto_pimpinan']; ?>" alt="Foto Pimpinan">
               <input type="hidden" id="old_image" name="old_image" value="<?= $sambutan['foto_pimpinan']; ?>">

               <p class="logo-title text-center">Foto Pimpinan</p>

               <input type="file" class="form-control input-sm" id="gambar" name="foto_pimpinan" onchange="validate_img(this);">
               <div class="checkbox img-checkbox">
                  <label>
                     <input type="checkbox" name="ubah_foto"> Centang untuk mengubah gambar
                  </label>
               </div>
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
                  <input type="hidden" id="id_sambutan" name="id_sambutan" value="<?= $sambutan['id']; ?>">

                  <div class="form-group">
                     <label for="pemberi_sambutan">Pemberi Sambutan</label>
                     <input type="text" class="form-control input-sm" id="pemberi_sambutan" name="pemberi_sambutan" placeholder="Masukan pemberi sambutan" value="<?= $sambutan['pemberi_sambutan']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="isi_sambutan">Isi Sambutan</label>
                     <textarea class="tinymce" id="isi_sambutan" name="isi_sambutan"><?= $sambutan['isi_sambutan']; ?></textarea>
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