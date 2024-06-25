<!-- breadcrumb-start -->
<section class="breadcrumb breadcrumb_bg banner-bg-1 overlay2 ptb200 authentication">
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

<section class="blog_area single-post-area section-padding authentication-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 posts-list">
            <table class="table datatable2" style="width:100%">
               <thead>
                  <tr>
                     <th width="10" class="text-center">No.</th>
                     <th>Kecamatan</th>
                     <th>Kelurahan</th>
                     <th>Nama Usaha</th>
                     <th>Alamat Usaha</th>
                     <th>Nama Pemilik</th>
                     <th>Alamat Pemilik</th>
                     <th>Komoditas</th>
                     <th>Tahun Berdiri</th>
                     <th>Izin Usaha</th>
                     <th>Tipe Kelas Digital</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($umkm_kecamatan->result_array() as $kecamatan) : ?>
                     <tr>
                        <td class="text-center"><?= $no; ?>.</td>
                        <td><?= $kecamatan['kecamatan']; ?></td>
                        <td><?= $kecamatan['kelurahan']; ?></td>
                        <td><?= $kecamatan['nama_usaha']; ?></td>
                        <td><?= $kecamatan['alamat_usaha']; ?></td>
                        <td><?= $kecamatan['nama_pemilik']; ?></td>
                        <td><?= $kecamatan['alamat_pemilik']; ?></td>
                        <td><?= $kecamatan['komoditas']; ?></td>
                        <td><?= $kecamatan['tahun_berdiri']; ?></td>
                        <td><?= $kecamatan['ijin_usaha']; ?></td>
                        <td><?= $kecamatan['tipe_kelas_digital']; ?></td>
                     </tr>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>