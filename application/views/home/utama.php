<!-- details-banner-area-start -->
<div class="banner">
   <video autoplay muted loop>
      <source src="<?= base_url(); ?>assets/upload/video/<?= $aplikasi['opening']; ?>" type="video/mp4">
   </video>
   <div class="content container">
      <img src="<?= base_url(); ?>assets/upload/img/logodiskominfo.png" alt="Logo Gulamanista">
      <h1>KLINIK GULAMANISTA UMKM</h1>
   </div>
</div>

<div class="project-review-area section-padding">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-6 col-md-6">
            <div class="single-review">
               <h3 class="text-heading">Sambutan <span class="text-theme-color-2"><?= $sambutan['pemberi_sambutan']; ?></span></h3>
               <?= $sambutan['isi_sambutan']; ?>
            </div>
         </div>
         <div class="col-xl-6 col-md-6">
            <div class="review-thumb">
               <img src="<?= base_url(); ?>assets/upload/img/<?= $sambutan['foto_pimpinan']; ?>" alt="">
            </div>
         </div>
      </div>
   </div>
</div>

<div class="counter-area gray-bg">
   <div class="container">
      <div class="row">
         <div class="col-xl-4 col-md-4">
            <a href="<?= base_url(); ?>umkm/list_kota">
               <div class="single-counter">
                  <div class="icon">
                     <img src="<?= base_url(); ?>assets/themes/ui/img/icon/conunter-icon2.png" alt="">
                  </div>
                  <div class="counter-number">
                     <h3><span class="counter"><?= $total_umkm_kota->num_rows(); ?></span><span>+</span></h3>
                     <p>UMKM <span>Kota Baubau</span> </p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-xl-4 col-md-4">
            <a href="<?= base_url(); ?>umkm/list_kecamatan">
               <div class="single-counter">
                  <div class="icon">
                     <img src="<?= base_url(); ?>assets/themes/ui/img/icon/conunter-icon2.png" alt="">
                  </div>
                  <div class="counter-number">
                     <h3><span class="counter">8</span><span>+</span></h3>
                     <p>UMKM <span>Per Kecamatan</span></p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-xl-4 col-md-4">
            <a href="<?= base_url(); ?>umkm/list_komoditas">
               <div class="single-counter">
                  <div class="icon">
                     <img src="<?= base_url(); ?>assets/themes/ui/img/icon/conunter-icon2.png" alt="">
                  </div>
                  <div class="counter-number">
                     <h3><span class="counter">6</span><span>+</span></h3>
                     <p>UMKM <span>Per Komoditas</span></p>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>

<!-- service-area-start -->
<div class="service-area layanan">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="section-title text-center mb-65">
            <h3 class="text-heading">Layanan Klinik <span class="text-theme-color-2">Gulamanista UMKM</span></h3>
         </div>
      </div>
      <div class="row">
         <?php foreach ($data_klinik->result_array() as $klinik) : ?>
            <div class="col-xl-4 col-md-4">
               <a href="<?= base_url(); ?>klinik/detail/<?= $klinik['slug_klinik'] ?>">
                  <div class="single-service">
                     <div class="service-thumb">
                        <img src="<?= base_url(); ?>assets/upload/img/<?= $klinik['img_klinik']; ?>" alt="">
                     </div>
                     <h3><?= $klinik['title_klinik']; ?></h3>
                     <p><?= $klinik['deskripsi']; ?></p>
                  </div>
               </a>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<!-- service-area-end -->