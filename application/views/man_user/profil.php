<form method="post" action="<?= base_url('user/profil') ?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="img-update img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $user['img_user']; ?>" alt="Foto User">
               <input type="hidden" id="old_image" name="old_image" value="<?= $user['img_user']; ?>">

               <p class="logo-title text-center">Foto User</p>

               <input type="file" class="form-control input-sm" id="gambar" name="img_user" onchange="validate_img(this);">
               <div class="checkbox img-checkbox">
                  <label>
                     <input type="checkbox" name="ubah_foto"> Centang untuk mengubah gambar
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Form Management Profil</h3>
            </div>
            <div class="form-horizontal">
               <div class="box-body">
                  <input type="hidden" name="ubah_data" value="ubah">
                  <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">

                  <div class="form-group">
                     <label for="nama_user" class="col-sm-3 control-label">Nama User</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="nama_user" name="nama_user" placeholder="Nama user" value="<?= $user['nama_user']; ?>">
                     </div>
                  </div>
                  <?php if ($this->session->userdata('role_id') != 4) { ?>
                     <div class="form-group">
                        <label for="telepon_user" class="col-sm-3 control-label">Nomor Telepon/ HP</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control input-sm" id="telepon_user" name="telepon_user" placeholder="Nomor Telepon/ HP" value="<?= $user['telepon_user']; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="email_user" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                           <input type="email" class="form-control input-sm" id="email_user" name="email_user" placeholder="Email" value="<?= $user['email_user']; ?>">
                        </div>
                     </div>
                  <?php } ?>
                  <div class="form-group">
                     <label for="username" class="col-sm-3 control-label">Username</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="InputPassword" class="col-sm-3 control-label">Password</label>
                     <div class="col-sm-8">
                        <input type="password" class="form-control input-sm" id="InputPassword" name="password" placeholder="Password">
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
               <div class="box-footer">
                  <button type="submit" id="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right"><i class="fa fa-save"></i> Simpan</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<script src="<?= base_url(); ?>assets/themes/js/apps/strength.js"></script>