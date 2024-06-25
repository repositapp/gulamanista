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
               <li><a href="<?= base_url(); ?>konsultasi/sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Kategori Layanan Pesan</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table class="table no-margin">
                  <thead>
                     <tr>
                        <th width="40" class="text-center">No.</th>
                        <th>Nama Layanan</th>
                        <th width="200"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($data_klinik->result_array() as $klinik) : ?>
                        <tr>
                           <td class="text-center"><?= $no; ?>.</td>
                           <td><?= $klinik['title_klinik']; ?></td>
                           <td class="text-center">
                              <a href="<?= base_url(); ?>konsultasi/tulis/<?= $this->secure->encrypt_url($klinik['id']); ?>" class="btn btn-info btn-flat btn-sm">Pilih Layanan</a>
                           </td>
                        </tr>
                     <?php $no++;
                     endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>