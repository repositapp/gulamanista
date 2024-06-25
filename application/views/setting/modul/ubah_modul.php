<form method="post" action="<?= base_url('modul/simpan_perubahan') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Form <?= $sub_menu; ?></h3>
               <div class="box-tools pull-right">
                  <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social btn-info btn-flat btn-sm">
                     <i class="fa fa-reply"></i> Kembali Ke Daftar Modul
                  </a>
               </div>
            </div>
            <div class="form-horizontal">
               <div class="box-body">
                  <input type="hidden" id="id" name="id" value="<?= $modul['id']; ?>">

                  <div class="form-group">
                     <label for="modul" class="col-sm-3 control-label">Nama Modul</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="modul" name="modul" placeholder="Nama pegawai" value="<?= $modul['modul']; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="icon" class="col-sm-3 control-label">Icon Modul</label>
                     <div class="col-sm-8">
                        <select class="form-control select2 input-sm" id="icon" name="icon" required>
                           <option selected="selected" disabled>-Pilih Icon-</option>
                           <?php foreach ($list_icon as $icon) : ?>
                              <option <?= $modul['icon'] === 'fa ' . $icon ? "selected" : "" ?> value="fa <?= $icon ?>" data-icon="fa <?= $icon ?>"><?= $icon ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="modul_active" class="col-sm-3 control-label">Status</label>
                     <div class="col-sm-8">
                        <select class="form-control input-sm" id="modul_active" name="modul_active" required>
                           <option selected="selected" disabled>-Pilih Status-</option>
                           <option <?= $modul['modul_active'] === '0' ? "selected" : "" ?> value="0">Tidak Aktif</option>
                           <option <?= $modul['modul_active'] === '1' ? "selected" : "" ?> value="1">Aktif</option>
                        </select>
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
      </div>
   </div>
</form>