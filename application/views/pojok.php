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
                     <th>Judul Informasi</th>
                     <th width="150">Dokumen</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($data_pojok->result_array() as $pojok) : ?>
                     <tr>
                        <td class="text-center"><?= $no; ?>.</td>
                        <td><?= $pojok['nm_dokumen']; ?></td>
                        <td>
                           <a href="<?= base_url(); ?>assets/upload/doc/<?= $pojok['dokumen_pojok']; ?>" target="_blank" class="genric-btn primary medium">
                              Detail <i class="fa fa-long-arrow-right"></i>
                           </a>
                        </td>
                     </tr>
                  <?php $no++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>