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

<div class="galery-area">
   <div class="container">
      <div class="row">
         <?php foreach ($list_video as $video) : ?>
            <div class="col-xl-4 col-md-4">
               <div class="galery-list">
                  <div class="galery-header">
                     <?= $video['iframe_video']; ?>
                  </div>
                  <div class="galery-body video">
                     <h3><?= $video['nm_video']; ?></h3>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
      </div>
      <div class="galery-pagination">
         <?= $this->pagination->create_links(); ?>
      </div>
   </div>
</div>