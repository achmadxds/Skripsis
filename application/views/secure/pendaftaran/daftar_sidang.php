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
                          <th>Cek</th>
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
                                <?php if ($mhs['DafsidStatus']==0) { ?>
                                  <div class="badge badge-warning">
                                     <?php echo 'Menunngu';?>
                                  </div>
                                 
                                  <?php } else if($mhs['DafsidStatus']==1) {?>
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
                                <a data-toggle="modal" data-target="#modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>" 
                                  href="" 
                                  class="btn btn-md btn-icon btn-info">
                                  <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Cek Berkas"></i>
                                  </a>
                              </td>
                              <td>
                                  <?php if ($mhs['DafsidStatus']==0): ?>
                                  <a href="<?php echo base_url('secure/pendaftaran/acc_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsidId'])); ?>"  
                                     class="btn btn-md btn-success" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/pendaftaran/acc_daftar_sidang/'.$this->enkripsi->encrypt_url($mhs['DafsidId'])); ?>' ">
                                    <i  class="fas fa-check" data-toggle="tooltip" data-placement="top" title="ACC"></i>
                                  </a>
                                  <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>" 
                                  href="<?php echo base_url('secure/pendaftaran/edit_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsidId'])); ?>" 
                                  class="btn btn-md btn-icon btn-info">
                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                                  </a>

                                  <?php elseif ($mhs['DafsidStatus']==2) :?>
                                  <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>" 
                                  href="<?php echo base_url('secure/pendaftaran/edit_mhs/'.$this->enkripsi->encrypt_url($mhs['DafsidId'])); ?>" 
                                  class="btn btn-md btn-icon btn-info">
                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                                  </a>

                                  <?php elseif ($mhs['DafsidStatus']==1) :?>
                                    <a href="<?php echo base_url('secure/pendaftaran/download_sidang_zip/'.$this->enkripsi->encrypt_url($mhs['DaftarsId'])); ?>" 
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
  
<div class="modal fade" id="modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cek Berkas Daftar Sidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
          <div class="row" align="center">
            <div class="col-4">
              <h6 style="color: #718eef;">Proposal</h6>  
              <?php if ($mhs['DafsidFileProposal']==null): ?> 
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileProposal']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>   
               <?php endif ?>
            </div>
            <div class="col-4">
              <h6 style="color: #718eef;">Buku Bimbingan</h6>  
              <?php if ($mhs['DafsidFileBukubimbingan']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileBukubimbingan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-4">
              <h6 style="color: #718eef;">Surat Balasan</h6>  
              <?php if ($mhs['DafsidFileSuratBalasan']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileSuratBalasan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
          </div>

          <div class="row" align="center">
            <div class="col-3">
              <h6 style="color: #718eef;">KW Komputer</h6>  
              <?php if ($mhs['DafsidFileKWKomputer']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileKWKomputer']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">KW B.Inggris</h6>  
              <?php if ($mhs['DafsidFileKWInggris']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileKWInggris']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">KW Kewirausahaan</h6>  
              <?php if ($mhs['DafsidFileKWKewirausahaan']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileKWKewirausahaan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Berita Acara</h6>  
              <?php if ($mhs['DafsidFileBeritaAcara']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileBeritaAcara']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
          </div>

          <div class="row" align="center">
            <div class="col-3">
              <h6 style="color: #718eef;">Transkrip Nilai</h6>  
              <?php if ($mhs['DafsidFileTranskrip']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileTranskrip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Plagiasi</h6>  
              <?php if ($mhs['DafsidFilePlagiasi']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFilePlagiasi']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a>  
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">Bukti Bayar</h6>  
              <?php if ($mhs['DafsidFileSlip']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileSlip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
            <div class="col-3">
              <h6 style="color: #718eef;">ESQ</h6>  
              <?php if ($mhs['DafsidFileEsq']==null): ?>
              <span style="color: red">kosong</span>
              <?php else: ?>  
              <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$mhs['DafsidFileEsq']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" style="width:50px;height:50px;"></a> 
              <?php endif ?>
            </div>
          </div>

       </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
 <?php } ?>

<?php foreach ($ket_daftar as $mhs) {?> 

 <form action="<?php echo base_url('secure/pendaftaran/ket_daftar_sidang/'.$this->enkripsi->encrypt_url($mhs['DafsidId'])); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <input name="keterangan" type="text" class="form-control daterange-cus" value="<?php echo $mhs['DafsidKet'] ?>" >
                      </div>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>">
       
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


