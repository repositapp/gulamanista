<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Data Agenda</h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?>agenda/tambah" class="btn btn-social btn-primary btn-flat btn-sm">
            <i class="fa fa-plus-square-o"></i> Tambah Agenda Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Judul Kegiatan</th>
               <th>Lokasi Kegiatan</th>
               <th width="100" class="text-center">Tanggal</th>
               <th width="100" class="text-center">Waktu</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_agenda->result_array() as $agenda) : ?>
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
                                    <a href="<?= base_url(); ?>agenda/ubah/<?= $this->secure->encrypt_url($agenda['id']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>agenda/hapus/<?= $this->secure->encrypt_url($agenda['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $agenda['judul_kegiatan']; ?></td>
                  <td><?= $agenda['lokasi_kegiatan']; ?></td>
                  <td class="text-center"><?= date('d M Y', strtotime($agenda['tgl_kegiatan'])) ?></td>
                  <td class="text-center"><?= date('H:i', strtotime($agenda['waktu_kegiatan'])) . ' ' . zone() ?></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>