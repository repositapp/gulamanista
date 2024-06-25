<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Data Layanan</h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?>klinik/tambah" class="btn btn-social btn-primary btn-flat btn-sm">
            <i class="fa fa-plus-square-o"></i> Tambah Layanan Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th width="80" class="text-center">Gambar</th>
               <th>Titel</th>
               <th>Deskripsi</th>
               <th width="150">Created</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_klinik->result_array() as $klinik) : ?>
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
                                    <a href="<?= base_url(); ?>klinik/ubah/<?= $this->secure->encrypt_url($klinik['id']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>klinik/hapus/<?= $this->secure->encrypt_url($klinik['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td class="text-center">
                     <?php if (empty($klinik['img_klinik'])) { ?>
                        <img class="img-fluid" src="<?= base_url(); ?>assets/themes/img/none.png" width="50" height="50" alt="Image None">
                     <?php } else { ?>
                        <img class="img-fluid" src="<?= base_url(); ?>assets/upload/img/<?= $klinik['img_klinik']; ?>" width="50" height="50" alt="Gambar Layanan">
                     <?php } ?>
                  </td>
                  <td><?= $klinik['title_klinik']; ?></td>
                  <td><?= $klinik['deskripsi']; ?></td>
                  <td> <?= date('d M Y, H:i', strtotime($klinik['created_at'])) . ' ' . zone() ?></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>