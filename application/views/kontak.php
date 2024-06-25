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

<section class="contact-section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h3 class="text-heading mb-30">Hubungi <span class="text-theme-color-2">Kami</span></h3>
         </div>
         <div class="col-lg-8">
            <div class="d-none d-sm-block">
               <?= $kontak['maps_frame']; ?>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-home"></i></span>
               <div class="media-body">
                  <h3>Lokasi Kami.</h3>
                  <p><a href="javascript:void(0)"><?= $kontak['alamat']; ?></a></p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-tablet"></i></span>
               <div class="media-body">
                  <h3>Telepon</h3>
                  <p><a href="javascript:void(0)"><?= $kontak['telepon']; ?></a></p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-tablet"></i></span>
               <div class="media-body">
                  <h3>Fax</h3>
                  <p><a href="javascript:void(0)"><?= $kontak['fax']; ?></a></p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-email"></i></span>
               <div class="media-body">
                  <h3>Email</h3>
                  <p><a href="mailto:<?= $kontak['email']; ?>"><?= $kontak['email']; ?></a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>