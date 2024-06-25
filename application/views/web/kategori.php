<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Daftar Kategori</h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?>web" class="btn btn-social btn-info btn-flat btn-sm">
            <i class="fa fa-reply"></i> Kembali Ke Artikel
         </a>
         <a class="btn btn-social btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-plus-square-o"></i> Tambah Kategori Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Kategori</th>
               <th width="50" class="text-center">Status</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_kategori->result_array() as $kategori) : ?>
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
                                    <a href="#<?= $this->secure->encrypt_url($kategori['id']); ?>" data-toggle="modal" data-target="#modal-ubah-<?= $no; ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <?php if ($kategori['is_active'] == 1) { ?>
                                       <a href="<?= base_url(); ?>web/kategori_nonactive/<?= $this->secure->encrypt_url($kategori['id']); ?>" onclick="return confirm('Anda yakin ingin menonaktifkan kategori ini?');" class="border-bottom-0">
                                          <i class="fa fa-unlock text-purple"></i> Non Aktifkan
                                       </a>
                                    <?php } elseif ($kategori['is_active'] == 0) { ?>
                                       <a href="<?= base_url(); ?>web/kategori_active/<?= $this->secure->encrypt_url($kategori['id']); ?>" onclick="return confirm('Silakan klik OKE untuk mengaktifkan kategori ini!!');" class="border-bottom-0">
                                          <i class="fa fa-lock text-purple"></i> Aktifkan
                                       </a>
                                    <?php } ?>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>web/hapus_kategori/<?= $this->secure->encrypt_url($kategori['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $kategori['kategori']; ?></td>
                  <td class="text-center">
                     <?php if ($kategori['is_active'] == 0) { ?>
                        <small class="label bg-red">Tidak Aktif</small>
                     <?php } elseif ($kategori['is_active'] == 1) { ?>
                        <small class="label bg-green">Aktif</small>
                     <?php } ?>
                  </td>
               </tr>

               <!-- Modal Ubah Data -->
               <div class="modal fade" id="modal-ubah-<?= $no; ?>">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="post" action="<?= base_url('web/kategori') ?>" enctype="multipart/form-data">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Form Ubah Kategori</h4>
                           </div>
                           <div class="modal-body">
                              <input type="hidden" name="ubah_data" value="ubah">
                              <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $kategori['id']; ?>">

                              <div class="form-horizontal">
                                 <div class="form-group">
                                    <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control pull-right input-sm" id="kategori" name="kategori" placeholder="Masukan kategori" value="<?= $kategori['kategori'] ?>" required>
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
<form method="post" action="<?= base_url('web/kategori') ?>" enctype="multipart/form-data">
   <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Form Tambah Kategori</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="tambah_data" value="tambah">

               <div class="form-horizontal">
                  <div class="form-group">
                     <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control pull-right input-sm" id="kategori" name="kategori" placeholder="Masukan kategori" required>
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