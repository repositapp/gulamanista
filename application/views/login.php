<!-- breadcrumb-start -->
<section class="breadcrumb breadcrumb_bg banner-bg-1 overlay2 ptb200 authentication">
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

<div class="about-area section-padding authentication-area">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-7 col-md-12 col-lg-6">
            <div class="section-title p-0">
               <h3>Login</h3>
               <p class="text-muted">Gunakan Username dan Password anda untuk login</p>

               <form class="form-contact contact_form" id="logForm">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <label for="username">Username</label>
                           <input class="form-control" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan username'" placeholder="Masukan username" required>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label for="InputPassword">Password</label>
                           <input class="form-control" name="password" id="InputPassword" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan password'" placeholder="Masukan password" required>
                           <div class="checkbox password-strength">
                              <label>
                                 <input type="checkbox" id="show"> Lihat password
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div id="responseDiv" class="alert alert-dismissible" role="alert" style="display:none;">
                           <span id="message"></span>
                        </div>

                        <div class="form-group">
                           <button type="submit" id="submit" class="button button-contactForm boxed-btn">Masuk</button>
                        </div>
                     </div>
                     <div class="col-12">
                        <p class="text-muted">
                           Apabila anda belum mempunyai akun, silahkan <a href="<?= base_url(); ?>pendaftaran" class="text-theme-color-2">klik disini untuk mendaftar</a>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-xl-5 col-md-12 col-lg-6">
            <div class="about-thumb">
               <img src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_login_umkm']; ?>" alt="">
            </div>
         </div>
      </div>
   </div>
</div>

<script src="<?= base_url(); ?>assets/themes/js/apps/auth.js"></script>