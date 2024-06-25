<form method="post" action="<?= base_url('web/simpan_data') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Unggah Gambar</h3>

               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
               </div>
            </div>
            <div class="box-body box-profile">
               <img class="img-add img-responsive" id="img" src="<?= base_url(); ?>assets/themes/img/none.png" alt="Gambar Artikel">

               <p class="logo-title text-center">Gambar Artikel</p>

               <input type="file" class="form-control input-sm" id="gambar" name="gambar_artikel" onchange="validate_img(this);" required>
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
                     <label for="id_kategori">Kategori</label>
                     <select class="form-control input-sm" id="id_kategori" name="id_kategori">
                        <option selected="selected" disabled>-Pilih Kategori-</option>
                        <?php foreach ($data_kategori->result_array() as $kategori) : ?>
                           <option value="<?= $kategori['id']; ?>"><?= $kategori['kategori']; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" class="form-control input-sm" id="judul" name="judul" placeholder="Masukan judul artikel">
                  </div>
                  <div class="form-group">
                     <label for="isi_artikel">Isi Artikel</label>
                     <textarea class="tinymce" id="isi_artikel" name="isi_artikel"></textarea>
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