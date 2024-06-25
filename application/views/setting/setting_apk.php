<form method="post" action="<?= base_url('aplikasi/ubah') ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Logo Aplikasi</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <img class="logo-update img-responsive" id="logo" src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_aplikasi']; ?>" alt="logo">
                    <input type="hidden" id="old_logo" name="old_logo" value="<?= $aplikasi['logo_aplikasi']; ?>">
                    <br>
                    <input type="file" class="form-control input-sm" id="logo_aplikasi" name="logo_aplikasi" onchange="validate_logo(this);">
                    <div class="checkbox img-checkbox">
                        <label>
                            <input type="checkbox" name="ubah_logo"> Centang untuk mengubah logo
                        </label>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latar Login Admin</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <img class="img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['login_bg']; ?>" alt="logo">
                    <input type="hidden" id="old_image" name="old_image" value="<?= $aplikasi['login_bg']; ?>">
                    <br>
                    <input type="file" class="form-control input-sm" id="gambar" name="login_bg" onchange="validate_img(this);">
                    <div class="checkbox img-checkbox">
                        <label>
                            <input type="checkbox" name="ubah_bg"> Centang untuk mengubah gambar
                        </label>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Gambar Login UMKM</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <img class="img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_login_umkm']; ?>" alt="logo">
                    <input type="hidden" id="old_image_umkm" name="old_image_umkm" value="<?= $aplikasi['logo_login_umkm']; ?>">
                    <br>
                    <input type="file" class="form-control input-sm" id="gambar" name="logo_login_umkm" onchange="validate_img(this);">
                    <div class="checkbox img-checkbox">
                        <label>
                            <input type="checkbox" name="ubah_img_login_umkm"> Centang untuk mengubah gambar
                        </label>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latar Header Utama</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <img class="img-responsive" id="img" src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['bg_header']; ?>" alt="logo">
                    <input type="hidden" id="old_image_header" name="old_image_header" value="<?= $aplikasi['bg_header']; ?>">
                    <br>
                    <input type="file" class="form-control input-sm" id="gambar" name="bg_header" onchange="validate_img(this);">
                    <div class="checkbox img-checkbox">
                        <label>
                            <input type="checkbox" name="ubah_bg_header"> Centang untuk mengubah gambar
                        </label>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latar Opening</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <video class="img-responsive" autoplay muted loop>
                        <source src="<?= base_url(); ?>assets/upload/video/<?= $aplikasi['opening']; ?>" type="video/mp4">
                    </video>
                    <input type="hidden" id="old_video" name="old_video" value="<?= $aplikasi['opening']; ?>">
                    <br>
                    <input type="file" class="form-control input-sm" id="video" name="opening" onchange="validate_video(this);">
                    <div class="checkbox img-checkbox">
                        <label>
                            <input type="checkbox" name="ubah_opening"> Centang untuk mengubah video
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengaturan Dasar</h3>
                    <div class="box-tools pull-right">
                        <a href="<?= base_url(); ?><?= $menu_link; ?>" class="btn btn-social btn-default btn-flat btn-sm">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="form-horizontal">
                    <div class="box-body">
                        <input type="hidden" id="id" name="id" value="<?= $aplikasi['id']; ?>">

                        <div class="form-group">
                            <label for="tab_title" class="col-sm-3 control-label">Tab Bar Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="tab_title" name="tab_title" placeholder="Tab bar title" value="<?= $aplikasi['tab_title']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sidebar_title_long" class="col-sm-3 control-label">Sidebar Title Long</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="sidebar_title_long" name="sidebar_title_long" placeholder="Sidebar title long" value="<?= $aplikasi['sidebar_title_long']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sidebar_title_short" class="col-sm-3 control-label">Sidebar Title Short</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="sidebar_title_short" name="sidebar_title_short" placeholder="Sidebar title short" value="<?= $aplikasi['sidebar_title_short']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sidebar_hidden" class="col-sm-3 control-label">Sidebar Hidden</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm" id="sidebar_hidden" name="sidebar_hidden" required>
                                    <option selected="selected" disabled>-Pilih Jenis-</option>
                                    <option <?= $aplikasi['sidebar_hidden'] === '0' ? "selected" : "" ?> value="0">Tidak Aktif</option>
                                    <option <?= $aplikasi['sidebar_hidden'] === '1' ? "selected" : "" ?> value="1">Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="panel_active" class="col-sm-3 control-label">Panel</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm" id="panel_active" name="panel_active" required>
                                    <option selected="selected" disabled>-Pilih Panel-</option>
                                    <option <?= $aplikasi['panel_active'] === '0' ? "selected" : "" ?> value="0">Tidak Aktif</option>
                                    <option <?= $aplikasi['panel_active'] === '1' ? "selected" : "" ?> value="1">Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time_zone" class="col-sm-3 control-label">Time Zone</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm" id="time_zone" name="time_zone" required>
                                    <option selected="selected" disabled>-Pilih Time Zone-</option>
                                    <option <?= $aplikasi['time_zone'] === 'Asia/Jakarta' ? "selected" : "" ?> value="Asia/Jakarta">Asia/Jakarta</option>
                                    <option <?= $aplikasi['time_zone'] === 'Asia/Makassar' ? "selected" : "" ?> value="Asia/Makassar">Asia/Makassar</option>
                                    <option <?= $aplikasi['time_zone'] === 'Asia/Jayapura' ? "selected" : "" ?> value="Asia/Jayapura">Asia/Jayapura</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login_title" class="col-sm-3 control-label">Login Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="login_title" name="login_title" placeholder="Login title" value="<?= $aplikasi['login_title']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button onclick="location.reload()" class="btn btn-social btn-danger btn-flat btn-sm">
                            <i class="fa fa-close"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="<?= base_url(); ?>assets/themes/js/pages/video.js"></script>