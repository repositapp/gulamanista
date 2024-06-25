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
            <table class="table datatable " style="width:100%">
               <thead>
                  <tr>
                     <th width="10" class="text-center">No.</th>
                     <th>Komoditas</th>
                     <th width="150">Total UMKM</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($umkm_komoditas->result_array() as $umkm_komoditas) : ?>
                     <tr>
                        <td class="text-center"><?= $no; ?>.</td>
                        <td>
                           <a href="<?= base_url(); ?>umkm/detail_komoditas/<?= $this->secure->encrypt_url($umkm_komoditas['komoditas']); ?>"><?= $umkm_komoditas['komoditas']; ?></a>
                        </td>
                        <td><?= $umkm_komoditas['total']; ?></td>
                     </tr>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>