<form method="post" action="<?= base_url('umkm/simpan_perubahan') ?>" enctype="multipart/form-data">
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
            <input type="hidden" name="ubah_data" value="ubah">
            <input type="hidden" id="id_umkm" name="id_umkm" value="<?= $umkm['id_umkm']; ?>">

            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="nama_usaha">Nama Usaha</label>
                     <input type="text" class="form-control input-sm" id="nama_usaha" name="nama_usaha" placeholder="Masukan nama usaha" value="<?= $umkm['nama_usaha']; ?>" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="komoditas">Komoditas</label>
                     <select class="form-control input-sm" id="komoditas" name="komoditas" required>
                        <option selected="selected" disabled>-Pilih Komoditas-</option>
                        <option <?= $umkm['komoditas'] === 'Agribisnis' ? "selected" : "" ?>>Agribisnis</option>
                        <option <?= $umkm['komoditas'] === 'Agrobisnis' ? "selected" : "" ?>>Agrobisnis</option>
                        <option <?= $umkm['komoditas'] === 'Fashion' ? "selected" : "" ?>>Fashion</option>
                        <option <?= $umkm['komoditas'] === 'Kerajinan' ? "selected" : "" ?>>Kerajinan</option>
                        <option <?= $umkm['komoditas'] === 'Kuliner' ? "selected" : "" ?>>Kuliner</option>
                        <option <?= $umkm['komoditas'] === 'Wirausaha' ? "selected" : "" ?>>Wirausaha</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="ijin_usaha">Izin Usaha</label>
                     <select class="form-control input-sm" id="ijin_usaha" name="ijin_usaha" required>
                        <option selected="selected" disabled>-Pilih Keterangan Izin-</option>
                        <option <?= $umkm['ijin_usaha'] === 'Ada' ? "selected" : "" ?>>Ada</option>
                        <option <?= $umkm['ijin_usaha'] === 'Belum Ada' ? "selected" : "" ?>>Belum Ada</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="tahun_berdiri">Tahun Berdiri</label>
                     <input type="text" class="form-control input-sm" id="tahun_berdiri" name="tahun_berdiri" placeholder="Masukan tahun berdiri usaha" value="<?= $umkm['tahun_berdiri']; ?>" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="tipe_kelas_digital">Tipe Kelas Digital</label>
                     <select class="form-control input-sm" id="tipe_kelas_digital" name="tipe_kelas_digital" required>
                        <option selected="selected" disabled>-Pilih Tipe Kelas-</option>
                        <option <?= $umkm['tipe_kelas_digital'] === 'Adopter' ? "selected" : "" ?>>Adopter</option>
                        <option <?= $umkm['tipe_kelas_digital'] === 'Beginer' ? "selected" : "" ?>>Beginer</option>
                        <option <?= $umkm['tipe_kelas_digital'] === 'Leader' ? "selected" : "" ?>>Leader</option>
                        <option <?= $umkm['tipe_kelas_digital'] === 'Observer' ? "selected" : "" ?>>Observer</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="form-group">
                     <label for="alamat_usaha">Alamat Usaha</label>
                     <input type="text" class="form-control input-sm" id="alamat_usaha" name="alamat_usaha" placeholder="Masukan alamat usaha" value="<?= $umkm['alamat_usaha']; ?>" required>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="form-group">
                     <label for="nama_pemilik">Nama Pemilik</label>
                     <input type="text" class="form-control input-sm" id="nama_pemilik" name="nama_pemilik" placeholder="Masukan nama pemilik usaha" value="<?= $umkm['nama_pemilik']; ?>" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="jenis_kelamin">Jenis Kelamin</label>
                     <select class="form-control input-sm" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option selected="selected" disabled>-Pilih Jenis Kelamin-</option>
                        <option <?= $umkm['jenis_kelamin'] === 'L' ? "selected" : "" ?> value="L">Laki-Laki</option>
                        <option <?= $umkm['jenis_kelamin'] === 'P' ? "selected" : "" ?> value="P">Perempuan</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="alamat_pemilik">Alamat Pemilik</label>
                     <input type="text" class="form-control input-sm" id="alamat_pemilik" name="alamat_pemilik" placeholder="Masukan alamat pemilik usaha" value="<?= $umkm['alamat_pemilik']; ?>" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="kecamatan">Kecamatan</label>
                     <input type="text" class="form-control input-sm" id="kecamatan" name="kecamatan" placeholder="Masukan kecamatan tempat usaha" value="<?= $umkm['kecamatan']; ?>" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="kelurahan">Kelurahan</label>
                     <input type="text" class="form-control input-sm" id="kelurahan" name="kelurahan" placeholder="Masukan kelurahan tempat usaha" value="<?= $umkm['kelurahan']; ?>" required>
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