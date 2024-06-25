<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Pengaturan Modul</h3>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th>Nama Modul</th>
               <th width="80" class="text-center">Icon</th>
               <th width="80" class="text-center">Tampil</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_modul->result_array() as $modul) :
               $sub_modul = $this->db->get_where('set_modul', ['parent' => $modul['id']]);
            ?>
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
                                    <a href="<?= base_url(); ?>modul/ubah/<?= $this->secure->encrypt_url($modul['id']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <?php if ($modul['modul_active'] == 1) { ?>
                                       <a href="<?= base_url(); ?>modul/modul_nonactive/<?= $this->secure->encrypt_url($modul['id']); ?>" onclick="return confirm('Anda yakin ingin menonaktifkan modul ini?');" class="border-bottom-0">
                                          <i class="fa fa-unlock text-purple"></i> Non Aktifkan
                                       </a>
                                    <?php } elseif ($modul['modul_active'] == 0) { ?>
                                       <a href="<?= base_url(); ?>modul/modul_active/<?= $this->secure->encrypt_url($modul['id']); ?>" onclick="return confirm('Silakan klik OK untuk mengaktifkan modul ini!!');" class="border-bottom-0">
                                          <i class="fa fa-lock text-purple"></i> Aktifkan
                                       </a>
                                    <?php } ?>
                                 </li>
                                 <?php if ($sub_modul->num_rows() > 0) { ?>
                                    <li>
                                       <a href="<?= base_url(); ?>modul/sub_modul/<?= $this->secure->encrypt_url($modul['id']); ?>">
                                          <i class="fa fa-list text-info"></i> Sub Modul
                                       </a>
                                    </li>
                                 <?php } else { ?>
                                    <li style="display: none;">
                                       <a href="#">
                                          <i class="fa fa-list text-info"></i> Sub Modul
                                       </a>
                                    </li>
                                 <?php } ?>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><?= $modul['modul']; ?> </td>
                  <td class="text-center"><?= $modul['icon']; ?></td>
                  <td class="text-center"><i class="<?= $modul['icon']; ?>"></i></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>