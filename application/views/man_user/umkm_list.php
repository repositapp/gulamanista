<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Data UMKM Kota Baubau</h3>
      <div class="box-tools pull-right">
         <div class="box-tools pull-right">
            <a href="<?= base_url(); ?>umkm/tambah" class="btn btn-social btn-primary btn-flat btn-sm">
               <i class="fa fa-plus-square-o"></i> Tambah UMKM Baru
            </a>
         </div>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Kecamatan</th>
               <th>Kelurahan</th>
               <th>Komoditas</th>
               <th>Nama Usaha</th>
               <th>Nama Pemilik</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_umkm->result_array() as $umkm) : ?>
               <tr>
                  <td>
                     <div class="dropdown action">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                           <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                           <li>
                              <a href="<?= base_url(); ?>umkm/ubah/<?= $this->secure->encrypt_url($umkm['id_umkm']); ?>">
                                 <i class="fa fa-edit text-green"></i> Ubah Data
                              </a>
                           </li>
                           <li>
                              <a href="<?= base_url(); ?>umkm/hapus/<?= $this->secure->encrypt_url($umkm['id_umkm']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                 <i class="fa fa-trash-o text-red"></i> Hapus Data
                              </a>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $umkm['kecamatan']; ?></td>
                  <td><?= $umkm['kelurahan']; ?></td>
                  <td><?= $umkm['komoditas']; ?></td>
                  <td><?= $umkm['nama_usaha']; ?></td>
                  <td><?= $umkm['nama_pemilik']; ?></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>

<!-- Modal Tambah Data -->
<form method="post" action="<?= base_url('umkm/import_excel') ?>" enctype="multipart/form-data">
   <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Form Tambah Data UMKM</h4>
            </div>
            <div class="modal-body">
               <div class="form-horizontal">
                  <div class="form-group">
                     <label for="fileExcel" class="col-sm-3 control-label">Pilih Dokumen</label>
                     <div class="col-sm-9">
                        <input type="file" class="form-control input-sm" id="fileExcel" name="fileExcel" required>
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