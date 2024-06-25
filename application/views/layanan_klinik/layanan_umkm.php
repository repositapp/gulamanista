<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Kategori Layanan</h3>
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
                     <td>
                        <?php if (empty($klinik['img_klinik'])) { ?>
                           <img class="img-fluid" src="<?= base_url(); ?>assets/themes/img/none.png" width="50" height="50" alt="Image None">
                        <?php } else { ?>
                           <img class="img-fluid" src="<?= base_url(); ?>assets/upload/img/<?= $klinik['img_klinik']; ?>" width="50" height="50" alt="Gambar Layanan">
                        <?php } ?>
                        <?= $klinik['title_klinik']; ?>
                     </td>
                     <td class="text-center">
                        <a href="#" class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#modal-view-<?= $klinik['id']; ?>">Deskripsi Layanan</a>
                     </td>
                  </tr>

                  <div class="modal fade" id="modal-view-<?= $klinik['id']; ?>">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><?= $klinik['title_klinik']; ?></h4>
                           </div>
                           <div class="modal-body">
                              <?= $klinik['isi_layanan']; ?>
                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Oke, mengerti!</button>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php $no++;
               endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>