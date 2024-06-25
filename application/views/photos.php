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
         <?php foreach ($list_gambar as $gambar) : ?>
            <div class="col-xl-4 col-md-4">
               <div class="galery-list">
                  <div class="galery-header">
                     <img src="<?= base_url(); ?>assets/upload/img/<?= $gambar['gambar']; ?>" alt="<?= $gambar['nm_gambar']; ?>">
                  </div>
                  <div class="galery-body">
                     <h3><?= $gambar['nm_gambar']; ?></h3>
                     <a href="<?= base_url(); ?>assets/upload/img/<?= $gambar['gambar']; ?>" class="genric-btn primary button-blok img-pop-up">Lihat Penuh</a>
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