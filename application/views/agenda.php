<!-- breadcrumb-start -->
<section class="breadcrumb breadcrumb_bg banner-bg-1 overlay2 ptb200">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 offset-lg-1">
            <div class="breadcrumb_iner">
               <div class="breadcrumb_iner_item">
                  <h2><?= $title; ?></h2>
                  <p> <a href="<?= base_url(); ?>home">Home.</a> <span></span> <?= $treeview; ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb-end -->

<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 posts-list">
            <table class="table datatable " style="width:100%">
               <thead>
                  <tr>
                     <th width="10" class="text-center">No.</th>
                     <th>Nama Kegiatan</th>
                     <th>Lokasi Kegiatan</th>
                     <th width="100" class="text-center">Tanggal</th>
                     <th width="100" class="text-center">Waktu</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($data_agenda->result_array() as $agenda) : ?>
                     <tr>
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
   </div>
</section>