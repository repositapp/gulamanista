<?php
$aplikasi = $this->db->get('set_aplikasi')->row_array();
$kontak = $this->db->get('set_kontak')->row_array();
$q_medsos = $this->db->get('media_sosial');
?>
<!-- footer-start -->
<footer class="footer-area ">
   <div class="container">
      <div class="row justify-content-between">
         <div class="col-sm-6 col-md-3 col-xl-3">
            <div class="single-footer-widget footer_icon">
               <h4>Detail Kontak</h4>
               <div class="office-location">
                  <ul>
                     <li>
                        <p><?= $kontak['alamat']; ?></p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-3 col-xl-3">
            <div class="single-footer-widget">
               <h4>Hubungi Kami</h4>
               <ul>
                  <li><a href="javascript:void(0)"><i class="fa fa-phone pr-2"></i> <?= $kontak['telepon']; ?></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-fax pr-2"></i> <?= $kontak['fax']; ?></a></li>
                  <li><a href="mailto:<?= $kontak['email']; ?>"><i class="fa fa-envelope pr-2"></i> <?= $kontak['email']; ?></a></li>
               </ul>

            </div>
         </div>
         <div class="col-sm-6 col-md-3 col-xl-3">
            <div class="single-footer-widget footer_1">
               <h4>Sosial Media</h4>
               <div class="social-links">
                  <ul>
                     <?php foreach ($q_medsos->result_array() as $medsos) : ?>
                        <li><a href="<?= $medsos['link_akun']; ?>" target="_blank"><i class="<?= $medsos['icon']; ?>"></i></a></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-3 col-xl-3">
            <div class="single-footer-widget iframe-location">
               <h4>Lokasi</h4>
               <?= $kontak['maps_frame']; ?>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="copyright_part_text text-center">
               <p class="footer-text m-0">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  &copy;<script>
                     document.write(new Date().getFullYear());
                  </script> GULAMANISTA - <a href="https://diskominfo.baubaukota.go.id" target="_blank">Dinas Komunikasi dan Informatika Kota Baubau</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer-end -->

<!-- <div class="scrolltop-wrap">
   <a href="#" role="button" aria-label="Scroll to top">
      <svg height="48" viewBox="0 0 48 48" width="48" height="48px" xmlns="http://www.w3.org/2000/svg">
         <path id="scrolltop-bg" d="M0 0h48v48h-48z"></path>
         <path id="scrolltop-arrow" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
      </svg>
   </a>
</div> -->

<!-- JS here -->
<script src="<?= base_url(); ?>assets/themes/ui/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/themes/ui/js/vendor/jquery-1.12.4.min.js"></script> -->
<script src="<?= base_url(); ?>assets/themes/ui/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/ajax-form.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/scrollIt.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/wow.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/nice-select.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.slicknav.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/plugins.js"></script>

<!-- DataTables -->
<script type="text/javascript" src="<?= base_url(); ?>assets/themes/ui/js/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/themes/ui/js/DataTables/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/themes/ui/js/DataTables/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/themes/ui/js/DataTables/responsive.bootstrap.min.js"></script>

<!--contact js-->
<script src="<?= base_url(); ?>assets/themes/ui/js/contact.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.form.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/ui/js/mail-script.js"></script>

<script src="<?= base_url(); ?>assets/themes/ui/js/main.js"></script>

</body>

</html>