<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
             <?php if(!empty($bebas_prodi)): ?>
              <div class="table table-responsive">
                    <table id="tabelku" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>File Bebas Prodi</th>
                          <th>Status</th>
                          <th>Ket</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                         <tbody>
                            

                            <?php $no=1; foreach  ($bebas_prodi as $mhs): ?>
                            <tr align="center">

                              <td><?php echo $no ?></td>
                              <td><?php echo $mhs['MhsNim']  ?></td>
                              <td><?php echo $mhs['MhsNama']  ?></td>

                              <td>
                                <?php if ($mhs['SkripsiBebasProdi']==null): ?>
                                <span style="color: red">kosong</span>
                                <?php else: ?>

                               <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/bebas_prodi/' .$mhs['SkripsiBebasProdi']) ?>">Program</a>
                                <?php endif ?>
                              </td>


                              <td >
                                <?php if ($mhs['SkripsiStatus']==0) { ?>
                                  <div class="badge badge-warning">
                                     <?php echo 'Menunngu';?>
                                  </div>
                                 
                                  <?php } else if($mhs['SkripsiStatus']==1) {?>
                                    <div class="badge badge-success">
                                      <?php  echo 'Disetujui'; ?>
                                    </div>
                                  
                                 <?php }else{ ?>
                                    <div class="badge badge-danger">
                                      <?php  echo 'Perbaikan'; ?>
                                    </div>
                                 <?php } ?>
                              </td>

                              <td><?php echo $mhs['SkripsiKeterangan'] ?? 
                              '<span style="color:red;">Kosong</span>' ?></td>

                              <td>
                               <div class="btn-group mb-3 btn-group-md" role="group">
                                  <?php if ($mhs['SkripsiStatus']==0): ?>
                                  <a href="<?php echo base_url('secure/pendaftaran/acc_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>"  
                                     class="btn btn-sm btn-success" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/pendaftaran/acc_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>' ">
                                    <i  class="fas fa-check"></i>
                                  </a>
                                  <?php elseif ($mhs['SkripsiStatus']==2): ?>
                                     <a href="<?php echo base_url('secure/pendaftaran/acc_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>"  
                                     class="btn btn-sm btn-success" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/pendaftaran/acc_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>' ">
                                    <i  class="fas fa-check"></i>
                                  </a>

                                  <?php else: ?>
                                  <?php endif ?>


                                  <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['SkripsiMhsNim']) ?>" 
                                  href="<?php echo base_url('secure/pendaftaran/edit_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>" 
                                  class="btn btn-sm btn-icon btn-info">
                                    <i class="far fa-edit"></i>
                                  </a>

                        

                                </div>
                              </td>

                            </tr>
                            <?php $no++; ?>
                            <?php endforeach ?>
                            
                         </tbody>
                            <?php else: ?>
                                <p style="font-weight: bold; text-align: center;">Tidak Ada Data</p>
                            <?php endif ?>
                  </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
</section>


<?php foreach ($edit_bebas_prodi as $mhs) {?> 

 <form action="<?php echo base_url('secure/pendaftaran/edit_bebas_prodi/'.$this->enkripsi->encrypt_url($mhs['SkripsiMhsNim'])); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['SkripsiMhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">

                      <label>Keterangan</label>
                      <div class="input-group">
                        <textarea name="keterangan" class="form-control" type="text" style="height: 70%;"><?php echo $mhs['SkripsiKeterangan'] ?></textarea>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['SkripsiMhsNim']) ?>">
       
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
 <?php } ?>


