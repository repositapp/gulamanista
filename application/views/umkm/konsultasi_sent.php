<div class="row">
   <div class="col-md-3">
      <a href="<?= base_url(); ?>konsultasi/layanan" class="btn btn-primary btn-block margin-bottom">Tulis Pesan</a>

      <div class="box box-solid">
         <div class="box-header with-border">
            <h3 class="box-title">Main</h3>
            <div class="box-tools">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
            </div>
         </div>
         <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
               <li><a href="<?= base_url(); ?>konsultasi/inbox"><i class="fa fa-inbox"></i> Kontak Masuk</a></li>
               <li class="active"><a href="<?= base_url(); ?>konsultasi/sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Pesan Terkirim</h3>
         </div>
         <div class="box-body">
            <table class="table datatable table-bordered table-striped">
               <thead>
                  <tr>
                     <th width="10">Aksi</th>
                     <th width="10" class="text-center">No.</th>
                     <th>Kategori Layanan</th>
                     <th>Tujuan</th>
                     <th width="50" class="text-center">Status</th>
                     <th width="120" class="text-center">Dikirim Pada</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($data_sent->result_array() as $sent) :
                     $petugas = $this->db->get_where('user', ['id_user' => $sent['penerima']]);
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
                                          <a href="<?= base_url(); ?>konsultasi/read_sent/<?= $this->secure->encrypt_url($sent['id_konsultasi']); ?>">
                                             <i class="fa fa-eye text-green"></i> Lihat Pesan
                                          </a>
                                       </li>
                                       <li>
                                          <a href="<?= base_url(); ?>konsultasi/hapus_sent/<?= $this->secure->encrypt_url($sent['id_konsultasi']); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="border-bottom-0">
                                             <i class="fa fa-trash-o text-red"></i> Hapus Data
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </td>
                        <td class="text-center"><?= $no; ?>.</td>
                        <td><?= $sent['title_klinik']; ?></td>
                        <td>
                           <?php if ($sent['penerima'] == '') { ?>
                              Belum Diterima
                           <?php } else { ?>
                              <?= $petugas->row_array()['nama_user']; ?>
                           <?php } ?>
                        </td>
                        <td class="text-center">
                           <?php if ($sent['is_read'] == 0) { ?>
                              <small class="label bg-primary">unread</small>
                           <?php } elseif ($sent['is_read'] == 1) { ?>
                              <small class="label bg-green">read</small>
                           <?php } ?>
                        </td>
                        <td class="text-center"><?= date('d M Y, H:i', strtotime($sent['tgl_pengiriman'])) ?></td>
                     </tr>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>