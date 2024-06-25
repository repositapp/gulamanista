<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Pengaturan Sub Modul</h3>
      <div class="box-tools pull-left">
         <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social btn-info btn-flat btn-sm">
            <i class="fa fa-reply"></i> Kembali Ke Daftar Modul
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table table-bordered table-striped">
         <thead>
            <tr>
               <th width="40">Aksi</th>
               <th width="40" class="text-center">No.</th>
               <th>Nama Modul</th>
               <th width="150" class="text-center">Icon</th>
               <th width="80" class="text-center">Tampil</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($sub_modul->result_array() as $modul) : ?>
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