<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Daftar Gambar</h3>
      <div class="box-tools pull-right">
         <a class="btn btn-social btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-plus-square-o"></i> Tambah Gambar Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Nama Gambar</th>
               <th width="150" class="text-center">Dimuat Pada</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_gambar->result_array() as $gambar) : ?>
               <tr>
                  <td>
                     <div class="dropdown action">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                           <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <a href="#<?= $this->secure->encrypt_url($gambar['id']); ?>" data-toggle="modal" data-target="#modal-ubah-<?= $no; ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>galeri/hapus_gambar/<?= $this->secure->encrypt_url($gambar['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $gambar['nm_gambar']; ?></td>
                  <td class="text-center"><?= date('d M Y, H:i', strtotime($gambar['upload_at'])) . ' ' . zone() ?></td>
               </tr>

               <!-- Modal Ubah Data -->
               <div class="modal fade" id="modal-ubah-<?= $no; ?>">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="post" action="<?= base_url('galeri/gambar') ?>" enctype="multipart/form-data">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Form Ubah Gambar</h4>
                           </div>
                           <div class="modal-body">
                              <input type="hidden" name="ubah_data" value="ubah">
                              <input type="hidden" id="id_gambar" name="id_gambar" value="<?= $gambar['id']; ?>">

                              <div class="form-horizontal">
                                 <div class="form-group">
                                    <label for="nm_gambar" class="col-sm-3 control-label">Nama Gambar</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control pull-right input-sm" id="nm_gambar" name="nm_gambar" placeholder="Masukan nama gambar" value="<?= $gambar['nm_gambar'] ?>" required>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label for="gambar" class="col-sm-3 control-label">File Gambar</label>
                                    <div class="col-sm-9">
                                       <p><code><i class="icon fa fa-file-pdf-o"></i> <?= $gambar['nm_gambar']; ?></code></p>
                                       <input type="hidden" id="old_image" name="old_image" value="<?= $gambar['gambar']; ?>">

                                       <input type="file" class="form-control input-sm" id="gambar" name="gambar_galeri" onchange="validate_img(this);">
                                       <div class="checkbox img-checkbox">
                                          <label>
                                             <input type="checkbox" name="ubah_foto"> Centang untuk mengubah gambar
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-social btn-danger btn-flat btn-sm pull-left" data-dismiss="modal">
                                 <i class="fa fa-close"></i> Batal
                              </button>
                              <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>

<!-- Modal Tambah Data -->
<form method="post" action="<?= base_url('galeri/gambar') ?>" enctype="multipart/form-data">
   <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Form Tambah Gambar</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="tambah_data" value="tambah">

               <div class="form-horizontal">
                  <div class="form-group">
                     <label for="nm_gambar" class="col-sm-3 control-label">Nama Gambar</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control pull-right input-sm" id="nm_gambar" name="nm_gambar" placeholder="Masukan nama gambar" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="gambar" class="col-sm-3 control-label">File Gambar</label>
                     <div class="col-sm-9">
                        <input type="file" class="form-control input-sm" id="gambar" name="gambar_galeri" onchange="validate_img(this);" required>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-social btn-danger btn-flat btn-sm pull-left" data-dismiss="modal">
                  <i class="fa fa-close"></i> Batal
               </button>
               <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan</button>
            </div>
         </div>
      </div>
   </div>
</form>