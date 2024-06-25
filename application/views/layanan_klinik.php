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
            <div class="single-post">
               <div class="blog_details">
                  <h2><?= $layanan['title_klinik']; ?></h2>

                  <?= $layanan['isi_layanan']; ?>

                  <div class="form-group">
                     <a href="<?= base_url(); ?>login" class="button button-contactForm btn_1 boxed-btn text-white">Mulai Konsultasi</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget post_category_widget">
                  <h5 class="widget_title">Layanan Klinik</h5>
                  <ul class="list cat-list">
                     <?php foreach ($data_klinik->result_array() as $klinik) : ?>
                        <li>
                           <a href="<?= base_url(); ?>klinik/detail/<?= $klinik['slug_klinik'] ?>" class="d-flex">
                              <p><?= $klinik['title_klinik']; ?></p>
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