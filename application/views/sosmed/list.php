<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Daftar Sosial Media</h3>
   </div>
   <div class="box-body">
      <table class="table datatable table-bordered table-striped">
         <thead>
            <tr>
               <th width="10">Aksi</th>
               <th width="10" class="text-center">No.</th>
               <th width="150">Sosial Media</th>
               <th>Link Akun</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1;
            foreach ($data_sosmed->result_array() as $sosmed) : ?>
               <tr>
                  <td>
                     <div class="dropdown action">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                           <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <a href="#<?= $this->secure->encrypt_url($sosmed['id']); ?>" data-toggle="modal" data-target="#modal-ubah-<?= $no; ?>">
                                       <i class="fa fa-edit text-green"></i> Ubah Data
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td class="text-center"><?= $no; ?>.</td>
                  <td><i class="<?= $sosmed['icon']; ?>"></i> &nbsp; <?= $sosmed['nm_sosmed']; ?></td>
                  <td><?= $sosmed['link_akun']; ?></td>
               </tr>

               <!-- Modal Ubah Data -->
               <div class="modal fade" id="modal-ubah-<?= $no; ?>">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="post" action="<?= base_url('sosmed') ?>" enctype="multipart/form-data">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Form Ubah Link</h4>
                           </div>
                           <div class="modal-body">
                              <input type="hidden" name="ubah_data" value="ubah">
                              <input type="hidden" id="id_sosmed" name="id_sosmed" value="<?= $sosmed['id']; ?>">

                              <div class="form-horizontal">
                                 <div class="form-group">
                                    <label for="link_akun" class="col-sm-3 control-label">Link Akun</label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control input-sm" id="link_akun" name="link_akun" rows="3" placeholder="Masukan link akun sosial media ..." required><?= $sosmed['link_akun'] ?></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-social btn-danger btn-flat btn-sm pull-left" data-dismiss="modal">
                                 <i class="fa fa-close"></i> Batal
                              </button>
                              <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            <?php $no++;
            endforeach; ?>
         </tbody>
      </table>
   </div>
</div>