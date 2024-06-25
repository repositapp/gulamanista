<form method="post" action="<?= base_url('umkm/simpan_data') ?>" enctype="multipart/form-data">
   <div class="box box-primary">
      <div class="box-header with-border">
         <h3 class="box-title">Form <?= $sub_menu; ?></h3>
         <div class="box-tools pull-right">
            <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social btn-default btn-flat btn-sm">
               <i class="fa fa-reply"></i> Kembali
            </a>
         </div>
      </div>
      <div class="form-horizontal">
         <div class="box-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="nama_usaha">Nama Usaha</label>
                     <input type="text" class="form-control input-sm" id="nama_usaha" name="nama_usaha" placeholder="Masukan nama usaha" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="komoditas">Komoditas</label>
                     <select class="form-control input-sm" id="komoditas" name="komoditas" required>
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
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="ijin_usaha">Izin Usaha</label>
                     <select class="form-control input-sm" id="ijin_usaha" name="ijin_usaha" required>
                        <option selected="selected" disabled>-Pilih Keterangan Izin-</option>
                        <option>Ada</option>
                        <option>Belum Ada</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="tahun_berdiri">Tahun Berdiri</label>
                     <input type="text" class="form-control input-sm" id="tahun_berdiri" name="tahun_berdiri" placeholder="Masukan tahun berdiri usaha" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="tipe_kelas_digital">Tipe Kelas Digital</label>
                     <select class="form-control input-sm" id="tipe_kelas_digital" name="tipe_kelas_digital" required>
                        <option selected="selected" disabled>-Pilih Tipe Kelas-</option>
                        <option>Adopter</option>
                        <option>Beginer</option>
                        <option>Leader</option>
                        <option>Observer</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="form-group">
                     <label for="alamat_usaha">Alamat Usaha</label>
                     <input type="text" class="form-control input-sm" id="alamat_usaha" name="alamat_usaha" placeholder="Masukan alamat usaha" required>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="form-group">
                     <label for="nama_pemilik">Nama Pemilik</label>
                     <input type="text" class="form-control input-sm" id="nama_pemilik" name="nama_pemilik" placeholder="Masukan nama pemilik usaha" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="jenis_kelamin">Jenis Kelamin</label>
                     <select class="form-control input-sm" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option selected="selected" disabled>-Pilih Jenis Kelamin-</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="alamat_pemilik">Alamat Pemilik</label>
                     <input type="text" class="form-control input-sm" id="alamat_pemilik" name="alamat_pemilik" placeholder="Masukan alamat pemilik usaha" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="kecamatan">Kecamatan</label>
                     <input type="text" class="form-control input-sm" id="kecamatan" name="kecamatan" placeholder="Masukan kecamatan tempat usaha" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="kelurahan">Kelurahan</label>
                     <input type="text" class="form-control input-sm" id="kelurahan" name="kelurahan" placeholder="Masukan kelurahan tempat usaha" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Username" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="InputPassword">Password</label>
                     <input type="password" class="form-control input-sm" id="InputPassword" name="password" placeholder="Berisi angka, huruf besar dan kecil, karakter spesial dan 8 karakter atau lebih" required>
                     <progress max="100" value="0" id="strength" style="width: 100%"></small>
                     </progress>
                     <div class="checkbox password-strength">
                        <label>
                           <input type="checkbox" id="show"> Lihat password
                        </label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <button onclick="location.reload()" class="btn btn-social btn-danger btn-flat btn-sm">
               <i class="fa fa-close"></i> Batal
            </button>
            <button type="submit" id="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right"><i class="fa fa-save"></i> Simpan</button>
         </div>
      </div>
   </div>
</form>

<script src="<?= base_url(); ?>assets/themes/js/apps/strength.js"></script>