<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Daftar Artikel</h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?>web/tambah_artikel" class="btn btn-social btn-primary btn-flat btn-sm">
            <i class="fa fa-plus-square-o"></i> Tambah Artikel Baru
         </a>
         <a href="<?= base_url(); ?>web/kategori" class="btn btn-social bg-purple btn-flat btn-sm">
            <i class="fa fa-list"></i> Kategori Artikel
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th width="150">Kategori</th>
               <th>Judul</th>
               <th width="50" class="text-center">Visit</th>
               <th width="50" class="text-center">Status</th>
               <th width="120" class="text-center">Posting</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_artikel->result_array() as $artikel) : ?>
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
                                    <a href="<?= base_url(); ?>web/ubah_artikel/<?= $this->secure->encrypt_url($artikel['id_artikel']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <?php if ($artikel['enabled'] == 1) { ?>
                                       <a href="<?= base_url(); ?>web/artikel_nonactive/<?= $this->secure->encrypt_url($artikel['id_artikel']); ?>" onclick="return confirm('Anda yakin ingin menonaktifkan artikel ini?');" class="border-bottom-0">
                                          <i class="fa fa-unlock text-purple"></i> Non Aktifkan
                                       </a>
                                    <?php } elseif ($artikel['enabled'] == 0) { ?>
                                       <a href="<?= base_url(); ?>web/artikel_active/<?= $this->secure->encrypt_url($artikel['id_artikel']); ?>" onclick="return confirm('Silakan klik OKE untuk mengaktifkan artikel ini!!');" class="border-bottom-0">
                                          <i class="fa fa-lock text-purple"></i> Aktifkan
                                       </a>
                                    <?php } ?>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>web/hapus_artikel/<?= $this->secure->encrypt_url($artikel['id_artikel']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $artikel['kategori']; ?></td>
                  <td><?= $artikel['judul']; ?></td>
                  <td class="text-center"><?= $artikel['visit']; ?> Kali</td>
                  <td class="text-center">
                     <?php if ($artikel['enabled'] == 0) { ?>
                        <small class="label bg-red">Tidak Aktif</small>
                     <?php } elseif ($artikel['enabled'] == 1) { ?>
                        <small class="label bg-green">Aktif</small>
                     <?php } ?>
                  </td>
                  <td class="text-center"><?= date('d M Y, H:i', strtotime($artikel['created_at'])) . ' ' . zone() ?></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>