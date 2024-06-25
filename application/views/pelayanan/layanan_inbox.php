<div class="row">
   <div class="col-md-3">
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
               <li class="active"><a href="<?= base_url(); ?>pelayanan/inbox"><i class="fa fa-inbox"></i> Kontak Masuk</a></li>
               <li><a href="<?= base_url(); ?>pelayanan/sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Kontak Masuk Layanan <?= $petugas_layanan['title_klinik']; ?></h3>
         </div>
         <div class="box-body">
            <table class="table datatable table-bordered table-striped">
               <thead>
                  <tr>
                     <th width="10">Aksi</th>
                     <th width="10" class="text-center">No.</th>
                     <th>Pengirim</th>
                     <th width="50" class="text-center">Status</th>
                     <th width="120" class="text-center">Diterima Pada</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($data_inbox->result_array() as $inbox) : ?>
                     <?php if ($inbox['penerima'] == '') { ?>
                        <tr>
                           <td>
                              <button type="button" class="btn btn-success btn-sm btn-flat view" data-id="<?= $inbox['id_konsultasi']; ?>">
                                 <i class="fa fa-eye"></i>
                              </button>
                           </td>
                           <td class="text-center"><?= $no; ?>.</td>
                           <td>
                              Usaha: <?= $inbox['nama_usaha']; ?><br>
                              Pemilik: <?= $inbox['nama_pemilik']; ?>
                           </td>
                           <td class="text-center">
                              <?php if ($inbox['is_read'] == 0) { ?>
                                 <small class="label bg-primary">unread</small>
                              <?php } elseif ($inbox['is_read'] == 1) { ?>
                                 <small class="label bg-green">read</small>
                              <?php } ?>
                           </td>
                           <td class="text-center"><?= date('d M Y, H:i', strtotime($inbox['tgl_pengiriman'])) ?></td>
                        </tr>
                     <?php } elseif ($inbox['penerima'] == $this->session->userdata('id_user')) { ?>
                        <tr>
                           <td>
                              <button type="button" class="btn btn-success btn-sm btn-flat view" data-id="<?= $inbox['id_konsultasi']; ?>">
                                 <i class="fa fa-eye"></i>
                              </button>
                           </td>
                           <td class="text-center"><?= $no; ?>.</td>
                           <td>
                              Usaha: <?= $inbox['nama_usaha']; ?><br>
                              Pemilik: <?= $inbox['nama_pemilik']; ?>
                           </td>
                           <td class="text-center">
                              <?php if ($inbox['is_read'] == 0) { ?>
                                 <small class="label bg-primary">unread</small>
                              <?php } elseif ($inbox['is_read'] == 1) { ?>
                                 <small class="label bg-green">read</small>
                              <?php } ?>
                           </td>
                           <td class="text-center"><?= date('d M Y, H:i', strtotime($inbox['tgl_pengiriman'])) ?></td>
                        </tr>
                     <?php } ?>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script src="<?= base_url(); ?>assets/themes/js/apps/inbox.js"></script>