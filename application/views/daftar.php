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

<section class="contact-section authentication-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h3 class="text-heading mb-30">Pendaftaran <span class="text-theme-color-2">UMKM</span></h3>
         </div>
         <div class="col-lg-12">
            <form class="form-contact contact_form" id="regForm">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label for="nama_usaha">Nama Usaha</label>
                        <input class="form-control valid" name="nama_usaha" id="nama_usaha" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan nama usaha'" placeholder="Masukan nama usaha" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="komoditas">Komoditas</label>
                        <select class="form-control valid" name="komoditas" id="komoditas" required>
                           <option selected="selected" disabled>-Pilih Komoditas-</option>
                           <option>Agribisnis</option>
                           <option>Agrobisnis</option>
                           <option>Fashion</option>
                           <option>Kerajinan</option>
                           <option>Kuliner</option>
                           <option>Wirausaha</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="ijin_usaha">Izin Usaha</label>
                        <select class="form-control valid" name="ijin_usaha" id="ijin_usaha" required>
                           <option selected="selected" disabled>-Pilih Keterangan Izin-</option>
                           <option>Ada</option>
                           <option>Belum Ada</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="tahun_berdiri">Tahun Berdiri</label>
                        <input class="form-control valid" name="tahun_berdiri" id="tahun_berdiri" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan tahun berdiri usaha'" placeholder="Masukan tahun berdiri usaha" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="tipe_kelas_digital">Tipe Kelas Digital</label>
                        <select class="form-control valid" name="tipe_kelas_digital" id="tipe_kelas_digital" required>
                           <option selected="selected" disabled>-Pilih Tipe Kelas-</option>
                           <option>Adopter</option>
                           <option>Beginer</option>
                           <option>Leader</option>
                           <option>Observer</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-8">
                     <div class="form-group">
                        <label for="alamat_usaha">Alamat Usaha</label>
                        <input class="form-control" name="alamat_usaha" id="alamat_usaha" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan alamat usaha'" placeholder="Masukan alamat usaha" required>
                     </div>
                  </div>
                  <div class="col-sm-8">
                     <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input class="form-control valid" name="nama_pemilik" id="nama_pemilik" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan nama pemilik usaha'" placeholder="Masukan nama pemilik usaha" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control valid" name="jenis_kelamin" id="jenis_kelamin" required>
                           <option selected="selected" disabled>-Pilih Jenis Kelamin-</option>
                           <option value="L">Laki-Laki</option>
                           <option value="P">Perempuan</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-group">
                        <label for="alamat_pemilik">Alamat Pemilik</label>
                        <input class="form-control" name="alamat_pemilik" id="alamat_pemilik" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan alamat pemilik usaha'" placeholder="Masukan alamat pemilik usaha" required>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input class="form-control" name="kecamatan" id="kecamatan" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan kecamatan tempat usaha'" placeholder="Masukan kecamatan tempat usaha" required>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <input class="form-control" name="kelurahan" id="kelurahan" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan kelurahan tempat usaha'" placeholder="Masukan kelurahan tempat usaha" required>
                     </div>
                  </div>
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
                        <small class="text-muted">
                           Password setidaknya berisikan angka, satu huruf besar dan satu kecil, satu karakter spesial dan 8 karakter atau lebih
                        </small>
                        <progress max="100" value="0" id="strength" style="width: 100%"></small>
                        </progress>
                        <div class="checkbox password-strength">
                           <label>
                              <input type="checkbox" id="show"> Lihat password
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div id="responseDiv" class="alert alert-dismissible text-center" role="alert" style="display:none;">
                        <span id="message"></span>
                     </div>

                     <div class="form-group">
                        <button type="submit" id="submit" class="button button-contactForm boxed-btn button-register">Daftar</button>
                     </div>
                  </div>
                  <div class="col-12">
                     <span class="text-muted">
                        Sudah Mendaftar, <a href="<?= base_url(); ?>login" class="text-theme-color-2">Klik disini untuk login</a>
                     </span>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

<script src="<?= base_url(); ?>assets/themes/js/apps/strength.js"></script>
<script src="<?= base_url(); ?>assets/themes/js/apps/daftar.js"></script>