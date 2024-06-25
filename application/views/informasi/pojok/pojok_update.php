<form method="post" action="<?= base_url('pojok_informasi/simpan_perubahan/') ?>" enctype="multipart/form-data">
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
            <input type="hidden" id="id" name="id" value="<?= $pojok['id']; ?>">

            <div class="form-group">
               <label for="nm_dokumen" class="col-sm-3 control-label">Nama Dokumen</label>
               <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="nm_dokumen" name="nm_dokumen" placeholder="Masukan nama dokumen" value="<?= $pojok['nm_dokumen']; ?>">
               </div>
            </div>
            <div class="form-group">
               <label for="dokumen_pojok" class="col-sm-3 control-label">Dokumen</label>
               <div class="col-sm-8">
                  <p><code><i class="icon fa fa-file-pdf-o"></i> <?= $pojok['nm_dokumen']; ?></code></p>
                  <input type="hidden" id="old_doc" name="old_doc" value="<?= $pojok['dokumen_pojok']; ?>">
                  <input type="file" class="form-control input-sm" id="pdf" name="dokumen_pojok" onchange="validate_pdf(this);">
                  <div class="checkbox img-checkbox">
                     <label>
                        <input type="checkbox" name="ubah_dokumen"> Centang untuk mengubah dokumen
                     </label>
                  </div>
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