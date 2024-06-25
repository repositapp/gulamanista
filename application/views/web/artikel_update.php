<form method="post" action="<?= base_url('web/simpan_perubahan') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="img-update img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $artikel['gambar_artikel']; ?>" alt="Gambar Artikel">
               <input type="hidden" id="old_image" name="old_image" value="<?= $artikel['gambar_artikel']; ?>">

               <p class="logo-title text-center">Gambar Artikel</p>

               <input type="file" class="form-control input-sm" id="gambar" name="gambar_artikel" onchange="validate_img(this);">
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
                  <input type="hidden" id="id_artikel" name="id_artikel" value="<?= $artikel['id_artikel']; ?>">

                  <div class="form-group">
                     <label for="id_kategori">Kategori</label>
                     <select class="form-control input-sm" id="id_kategori" name="id_kategori">
                        <option selected="selected" disabled>-Pilih Kategori-</option>
                        <?php foreach ($data_kategori->result_array() as $kategori) : ?>
                           <option <?= $kategori['id'] === $artikel['id_kategori'] ? "selected" : "" ?> value="<?= $kategori['id']; ?>"><?= $kategori['kategori']; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" class="form-control input-sm" id="judul" name="judul" placeholder="Masukan titel layanan" value="<?= $artikel['judul']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="isi_artikel">Isi Layanan</label>
                     <textarea class="tinymce" id="isi_artikel" name="isi_artikel"><?= $artikel['isi_artikel']; ?></textarea>
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