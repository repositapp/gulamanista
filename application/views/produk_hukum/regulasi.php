<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Data Regulasi</h3>
      <div class="box-tools pull-right">
         <a class="btn btn-social btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-plus-square-o"></i> Tambah Regulasi Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Regulasi</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_regulasi->result_array() as $regulasi) : ?>
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
                                    <a href="#<?= $this->secure->encrypt_url($regulasi['id']); ?>" data-toggle="modal" data-target="#modal-ubah-<?= $no; ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>hukum/hapus_regulasi/<?= $this->secure->encrypt_url($regulasi['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>hukum/detail_regulasi/<?= $regulasi['slug_regulasi']; ?>">
                                       <i class="fa fa-list text-info"></i> Produk Hukum
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $regulasi['nama_regulasi']; ?></td>
               </tr>

               <!-- Modal Ubah Data -->
               <div class="modal fade" id="modal-ubah-<?= $no; ?>">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="post" action="<?= base_url('hukum/regulasi') ?>" enctype="multipart/form-data">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Form Ubah Regulasi</h4>
                           </div>
                           <div class="modal-body">
                              <input type="hidden" name="ubah_data" value="ubah">
                              <input type="hidden" id="regulasi_id" name="regulasi_id" value="<?= $regulasi['id']; ?>">

                              <div class="form-horizontal">
                                 <div class="form-group">
                                    <label for="nama_regulasi" class="col-sm-3 control-label">Nama Regulasi</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control pull-right input-sm" id="nama_regulasi" name="nama_regulasi" placeholder="Masukan nama regulasi" value="<?= $regulasi['nama_regulasi'] ?>" required>
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
<form method="post" action="<?= base_url('hukum/regulasi') ?>" enctype="multipart/form-data">
   <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Form Tambah Regulasi</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="tambah_data" value="tambah">

               <div class="form-horizontal">
                  <div class="form-group">
                     <label for="nama_regulasi" class="col-sm-3 control-label">Nama Regulasi</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control pull-right input-sm" id="nama_regulasi" name="nama_regulasi" placeholder="Masukan nama regulasi" required>
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