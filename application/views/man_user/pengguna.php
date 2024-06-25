<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Management Pengguna</h3>
      <div class="box-tools pull-right">
         <a href="<?= base_url(); ?>user/tambah" class="btn btn-social btn-primary btn-flat btn-sm">
            <i class="fa fa-plus-square-o"></i> Tambah Pengguna Baru
         </a>
      </div>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th class="text-center">Foto</th>
               <th width="100">Username</th>
               <th>Nama</th>
               <th>Peran</th>
               <th>Pelayanan</th>
               <th>Login Terakhir</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_user->result_array() as $user) :
               $layanan = $this->db->get_where('layanan_klinik', ['id' => $user['petugas_pelayanan']])->row_array();
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
                                    <a href="<?= base_url(); ?>user/ubah/<?= $this->secure->encrypt_url($user['id_user']); ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>user/hapus/<?= $this->secure->encrypt_url($user['id_user']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                       <i class="fa fa-trash-o text-red"></i> Hapus Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td class="text-center"><img class="img-fluid rounded" src="<?= base_url(); ?>assets/upload/img/<?= $user['img_user']; ?>" width="50" height="50" alt="Foto User"></td>
                  <td><?= $user['username']; ?></td>
                  <td><?= $user['nama_user']; ?></td>
                  <td><?= $user['role']; ?></td>
                  <td>
                     <?php if ($user['petugas_pelayanan'] == '0') { ?>
                        Tidak Ada
                     <?php } elseif ($user['petugas_pelayanan'] == '20') { ?>
                        Semua Layanan Klinik
                     <?php } else { ?>
                        <?= $layanan['title_klinik']; ?>
                     <?php } ?>
                  </td>
                  <td> <?= $user['last_login'] === null || $user['last_login'] === '0000-00-00 00:00:00' ? "<div class='text-red'>User belum pernah login</div>" : date('d M Y, H:i', strtotime($user['last_login'])) . ' ' . zone() ?></td>
               </tr>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>