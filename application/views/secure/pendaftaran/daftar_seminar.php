<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
              <?php if(!empty($list_daftar)): ?>      
              <div class="table table-responsive">
                    <table id="tabelku" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                         <tbody>

                            <?php $no=1; foreach  ($list_daftar as $mhs): ?>
                            <tr align="center">

                              <td><?php echo $no ?></td>
                              <td><?php echo $mhs['MhsNim']  ?></td>
                              <td><?php echo $mhs['MhsNama']  ?></td>
                              

                              
                              <td >
                                <?php if ($mhs['DafsemStatus']==0) { ?>
                                  <div class="badge badge-warning">
                                     <?php echo 'Menunngu';?>
                                  </div>
                                 
                                  <?php } else if($mhs['DafsemStatus']==1) {?>
                                    <div class="badge badge-success">
                                      <?php  echo 'Disetujui'; ?>
                                    </div>
                                  
                                 <?php }else{ ?>
                                    <div class="badge badge-danger">
                                      <?php  echo 'Perbaikan'; ?>
                                    </div>
                                 <?php } ?>
                              </td>

                              <td>
                                <a data-toggle="modal" data-target="#modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>" 
                                  href="" 
                                  class="btn btn-md btn-icon btn-info">
                                  <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Cek Berkas"></i>
                                  </a>
                              </td>

                              <td>
                               
                                  <?php if ($mhs['DafsemStatus']==0): ?>
                                  <a href="<?php echo base_url('secure/pendaftaran/acc_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsemId'])); ?>"  
                                     class="btn btn-md btn-success" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/pendaftaran/acc_daftar_seminar/'.$this->enkripsi->encrypt_url($mhs['DafsemId'])); ?>' ">
                                    <i  class="fas fa-check" data-toggle="tooltip" data-placement="top" title="ACC"></i>
                                  </a>

                                  <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>" 
                                  href="<?php echo base_url('secure/pendaftaran/edit_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsemId'])); ?>" 
                                  class="btn btn-md btn-icon btn-info">
                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                                  </a>

                                  <?php elseif ($mhs['DafsemStatus']==2): ?>
                                  <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>" 
                                  href="<?php echo base_url('secure/pendaftaran/edit_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsemId'])); ?>" 
                                  class="btn btn-md btn-icon btn-info">
                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                                  </a>

                                  <?php elseif ($mhs['DafsemStatus']==1): ?>
                                    <a href="<?php echo base_url('secure/pendaftaran/download_seminar_zip/'.$this->enkripsi->encrypt_url($mhs['DaftarsId'])); ?>" 
                                  class="btn btn-icon btn-primary">
                                    <i class="fas fa-download" data-toggle="tooltip" data-placement="top" title="Download Zip"></i>
                                  </a>


                                  <?php else: ?>
                                  <?php endif ?>
                               
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


<?php foreach ($cek_daftar as $mhs) {?> 
<div class="modal fade" id="modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cek Berkas Pendaftaran Seminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">

          <div class="row" align="center">
            <div class="col-3">
              <h6 style="color: #718eef;">Transkrip Nilai</h6>
              <?php if ($mhs['DafsemFileTranskrip']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileTranskrip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>

            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Pengesahan</h6>
              <?php if ($mhs['DafsemFilePengesahan']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFilePengesahan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">BUku Bimbingan</h6>
              <?php if ($mhs['DafsemFileBukubimbingan']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileBukubimbingan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>     
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Bukti Bayar</h6>
              <?php if ($mhs['DafsemFileSlip']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileSlip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>  
              <?php endif ?>
            </div>
          </div>

          <div class="row" align="center">
            <div class="col-3">
              <h6 style="color: #718eef;">KW Komputer</h6>
              <?php if ($mhs['DafsemFileKWKomputer']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileKWKomputer']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>   
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">KW B.Inggris</h6>
              <?php if ($mhs['DafsemFileKWInggris']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileKWInggris']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">KW Kewirausahaan</h6>
              <?php if ($mhs['DafsemFileKWKewirausahaan']==null): ?>
              <span style="color: red">kosong</span>  
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFileKWKewirausahaan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Plagiasi</h6>
              <?php if ($mhs['DafsemFilePlagiasi']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$mhs['DafsemFilePlagiasi']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>  
              <?php endif ?>
            </div>
            
       </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
 <?php } ?>

<?php foreach ($keterangan_daftar as $mhs) {?> 
 <form action="<?php echo base_url('secure/pendaftaran/ket_daftar_seminar/'.$this->enkripsi->encrypt_url($mhs['DafsemId'])); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="keterangan" type="text" class="form-control daterange-cus" value="<?php echo $mhs['DafsemKet'] ?>" >
                      </div>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>">
       
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
 <?php } ?>


