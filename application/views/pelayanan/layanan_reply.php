<div class="row">
   <div class="col-md-3">
      <div class="box box-solid">
         <div class="box-header with-border">
            <h3 class="box-title">Main</h3>
            <div class="box-tools">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
            </div>
         </div>
         <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
               <li class="active"><a href="<?= base_url(); ?>pelayanan/inbox"><i class="fa fa-inbox"></i> Kontak Masuk</a></li>
               <li><a href="<?= base_url(); ?>pelayanan/sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <form method="post" action="<?= base_url('pelayanan/kirim_balasan') ?>" enctype="multipart/form-data">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Tulis Pesan Baru</h3>
            </div>
            <div class="box-body">
               <div class="form-group">
                  <label for="kategori">Kategori Layanan:</label>
                  <input class="form-control" placeholder="Kategori Layanan Konsultasi" value="<?= $inbox['title_klinik']; ?>" disabled>
                  <input type="hidden" id="kategori" name="kategori" value="<?= $inbox['id']; ?>">
                  <input type="hidden" id="kode_pesan" name="kode_pesan" value="<?= $inbox['kode_pesan']; ?>">
                  <input type="hidden" id="kode_berkas" name="kode_berkas" value="<?= $kode_berkas; ?>">
                  <input type="hidden" id="penerima" name="penerima" value="<?= $inbox['id_akun']; ?>">
                  <input type="hidden" id="pengirim" name="pengirim" value="<?= $this->session->userdata('id_user'); ?>">
                  <input type="hidden" id="parent" name="parent" value="<?= $inbox['id_konsultasi']; ?>">
               </div>
               <div class="form-group">
                  <label for="kategori">Kepada:</label>
                  <input class="form-control" placeholder="Kategori Layanan Konsultasi" value="<?= $inbox['nama_pemilik']; ?>" disabled>
               </div>
               <div class="form-group">
                  <label for="isi_pesan">Isi Pesan:</label>
                  <textarea class="tinymce" id="isi_pesan" name="isi_pesan"></textarea>
               </div>
            </div>
            <div class="box-footer">
               <div class="pull-right">
                  <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm"><i class="fa fa-send"></i> Kirim Pesan</button>
               </div>
               <button onclick="location.reload()" class="btn btn-social btn-danger btn-flat btn-sm">
                  <i class="fa fa-close"></i> Batal
               </button>
            </div>
         </div>
      </form>
   </div>
</div>

<script type="text/javascript" src="<?= base_url(); ?>assets/themes/js/tinycall.js"></script>