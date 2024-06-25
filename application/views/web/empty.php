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

<!--================Blog Area =================-->
<section class="blog_area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="text-center box_1170">
               <h3 class="text-heading"><b>Mohon Maaf!!!</b></h3>
               <p class="sample-text">
                  Belum ada data yang dapat ditampilkan. Data saat ini mungkin sedang dalam proses penginputan. Silahkan kunjungi dilain waktu.
               </p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">Kategori</h4>
                  <ul class="list cat-list">
                     <?php foreach ($data_kategori->result_array() as $kategori) : ?>
                        <li>
                           <a href="<?= base_url(); ?>kategori/list/<?= $this->secure->encrypt_url($kategori['id']); ?>" class="d-flex">
                              <p><?= $kategori['kategori']; ?></p>
                           </a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </aside>

               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Berita Lainnya</h3>
                  <?php foreach ($data_new->result_array() as $new) : ?>
                     <div class="media post_item">
                        <img src="<?= base_url(); ?>assets/upload/img/<?= $new['gambar_artikel']; ?>" alt="post" width="100px">
                        <div class="media-body">
                           <a href="<?= base_url(); ?>artikel/read/<?= $new['slug_artikel']; ?>">
                              <h3><?= $new['judul']; ?></h3>
                           </a>
                           <p><?= date('d M Y', strtotime($new['created_at'])); ?></p>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </aside>
            </div>
         </div>
      </div>
   </div>
</section>
<!--================Blog Area =================-->