<div class="row">
   <div class="col-md-3">
      <a href="<?= base_url(); ?>konsultasi/layanan" class="btn btn-primary btn-block margin-bottom">Tulis Pesan</a>

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
               <li><a href="<?= base_url(); ?>konsultasi/inbox"><i class="fa fa-inbox"></i> Kontak Masuk</a></li>
               <li class="active"><a href="<?= base_url(); ?>konsultasi/sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Detail Pesan Terkirim</h3>

            <div class="box-tools pull-right">
               <a href="<?= base_url(); ?>konsultasi/sent" class="btn btn-social btn-default btn-flat btn-sm">
                  <i class="fa fa-reply"></i> Kembali
               </a>
            </div>
         </div>
         <div class="box-body no-padding">
            <div class="mailbox-read-info">
               <h3><?= $read['title_klinik']; ?></h3>
               <h5>From:
                  <?php if ($read['penerima'] == '') { ?>
                     Belum ada petugas yang menerima
                  <?php } else { ?>
                     <?= $petugas->row_array()['nama_user']; ?>
                  <?php } ?>
                  <span class="mailbox-read-time pull-right"><?= date('d M Y, H:i', strtotime($read['tgl_pengiriman'])) . ' ' . zone() ?></span>
               </h5>
            </div>

            <div class="mailbox-read-message">
               <?= $read['isi_pesan']; ?>
            </div>
         </div>
      </div>
   </div>
</div>