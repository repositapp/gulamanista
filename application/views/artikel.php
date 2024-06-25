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

<section class="blog_area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
               <?php foreach ($list_artikel as $artikel) :
                  $category = $this->db->get_where('kategori', ['id' => $artikel['id_kategori']])->row_array();
               ?>
                  <article class="blog_item">
                     <div class="blog_item_img">
                        <img class="card-img rounded-0" src="<?= base_url(); ?>assets/upload/img/<?= $artikel['gambar_artikel']; ?>" alt="">
                        <a href="javascript:void(0)" class="blog_item_date">
                           <h3><?= date('d', strtotime($artikel['created_at'])) ?></h3>
                           <p><?= date('M', strtotime($artikel['created_at'])) ?></p>
                        </a>
                     </div>

                     <div class="blog_details">
                        <a class="d-inline-block" href="<?= base_url(); ?>artikel/read/<?= $artikel['slug_artikel']; ?>">
                           <h2><?= $artikel['judul']; ?></h2>
                        </a>
                        <ul class="blog-info-link mb-3">
                           <li><a href="javascript:void(0)"><i class="fa fa-edit"></i> <?= $category['kategori']; ?></a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-calendar"></i> <?= date('d M Y, H:i', strtotime($artikel['created_at'])) . ' ' . zone() ?></a></li>
                        </ul>
                        <div class="blog-button">
                           <a href="<?= base_url(); ?>artikel/read/<?= $artikel['slug_artikel']; ?>" class="genric-btn primary button-view">Baca Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                     </div>
                  </article>
               <?php endforeach ?>

               <?= $this->pagination->create_links(); ?>

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