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
         <div class="col-lg-8 posts-list">
            <table class="table datatable " style="width:100%">
               <thead>
                  <tr>
                     <th width="10" class="text-center">No.</th>
                     <th>Nama Dokumen</th>
                     <th width="150">Dokumen</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($data_produk_hukum->result_array() as $produk_hukum) : ?>
                     <tr>
                        <td class="text-center"><?= $no; ?>.</td>
                        <td><?= $produk_hukum['nm_dokumen']; ?></td>
                        <td>
                           <a href="<?= base_url(); ?>assets/upload/doc/<?= $produk_hukum['dokumen_hukum']; ?>" target="_blank" class="genric-btn primary medium">
                              Detail <i class="fa fa-long-arrow-right"></i>
                           </a>
                        </td>
                     </tr>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>

         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget post_category_widget">
                  <h5 class="widget_title">Regulasi</h5>
                  <ul class="list cat-list">
                     <?php foreach ($data_regulasi->result_array() as $regulasi) : ?>
                        <li>
                           <a href="<?= base_url(); ?>regulasi/list/<?= $regulasi['slug_regulasi'] ?>" class="d-flex">
                              <p><?= $regulasi['nama_regulasi']; ?></p>
                           </a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </aside>
            </div>
         </div>
      </div>
   </div>
</section>