<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Data Regulasi <?= $regulasi['nama_regulasi'] ?></h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social bg-purple btn-flat btn-sm">
            <i class="fa fa-reply"></i> Kembali Ke Regulasi
         </a>
         <a href="<?= base_url(); ?>hukum/tambah/<?= $regulasi['slug_regulasi'] ?>" class="btn btn-social btn-primary btn-flat btn-sm">
            <i class="fa fa-plus-square-o"></i> Tambah Produk Hukum Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Nama Dokumen</th>
               <th width="150" class="text-center">Dokumen</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_produk_hukum->result_array() as $produk_hukum) : ?>
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
                                    <a href="<?= base_url(); ?>hukum/ubah/<?= $regulasi['slug_regulasi'] ?>/<?= $this->secure->encrypt_url($produk_hukum['id_hukum']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>hukum/hapus/<?= $regulasi['slug_regulasi'] ?>/<?= $this->secure->encrypt_url($produk_hukum['id_hukum']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $produk_hukum['nm_dokumen']; ?></td>
                  <td class="text-center">
                     <a href="<?= base_url(); ?>assets/upload/doc/<?= $produk_hukum['dokumen_hukum']; ?>" target="_blank" class="btn btn-info btn-flat btn-sm">
                        <i class="fa fa-file-pdf-o"></i> Lihat Dokumen
                     </a>
                  </td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>