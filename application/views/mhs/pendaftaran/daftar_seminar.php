<?php 
$dosen1= $cek_status1['BimbingansDosenId'];
$bimbingan1 = $this->db->query("SELECT tbimbingans.*,tdosbings.DosbingsDaftarsId,tdaftars.DaftarsStatusAkhir from tbimbingans 
join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
where tbimbingans.BimbingansDosenId='$dosen1' and tbimbingans.BimbingansBab='proposal'
and tbimbingans.BimbingansStatus=1 and tdaftars.DaftarsStatusAkhir!=2")->row_array();
  
$dosen2= $cek_status2['BimbingansDosenId'];
$bimbingan2 = $this->db->query("SELECT tbimbingans.*,tdosbings.DosbingsDaftarsId,tdaftars.DaftarsStatusAkhir from tbimbingans 
join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
where tbimbingans.BimbingansDosenId='$dosen2' and tbimbingans.BimbingansBab='proposal'
and tbimbingans.BimbingansStatus=1 and tdaftars.DaftarsStatusAkhir!=2")->row_array();
?>
<?php if ($lulus) { ?>
  <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="lulus-tab5" data-toggle="tab" href="#lulus" role="tab" aria-controls="lulus" aria-selected="true">
                          <i class="fas fa-lulus"></i>File Pendaftaran</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
                      <div class="tab-pane fade show active" id="lulus" role="tabpanel" aria-labelledby="lulus-tab5">
         <br>
          <div class="row" align="center">
                <div class="col-3">
                 <h6 style="color: #718eef;">Transkrip Acc Kaprodi</h6>
                <?php if ($lulus->DafsemFileTranskrip==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileTranskrip) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Transkrip" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Pengesahan</h6>
                <?php if ($lulus->DafsemFilePengesahan==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFilePengesahan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Pengesahan" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                 <h6 style="color: #718eef;">Bukti Pembayaran</h6>
                <?php if ($lulus->DafsemFileSlip==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileSlip) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                  <h6 style="color: #718eef;">Bukti Bimbingan</h6>
                <?php if ($lulus->DafsemFileBukubimbingan==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileBukubimbingan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Buku Bimbingan" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
              </div>
                <br>
              <div class="row" align="center">
                <div class="col-3">
                  <h6 style="color: #718eef;">Plagiasi</h6>
                <?php if ($lulus->DafsemFilePlagiasi==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFilePlagiasi) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Plagiasi" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                  <h6 style="color: #718eef;">KW Komputer</h6>
                <?php if ($lulus->DafsemFileKWKomputer==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                 <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileKWKomputer) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Komputer" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                  <h6 style="color: #718eef;">KW B.Inggris</h6>
                <?php if ($lulus->DafsemFileKWInggris==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileKWInggris) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW B.Inggris" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                  <h6 style="color: #718eef;">KW Kewirausahaan</h6>
                <?php if ($lulus->DafsemFileKWKewirausahaan==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$lulus->DafsemFileKWKewirausahaan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Usaha" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php }elseif ($bimbingan1 && $bimbingan2) { ?>
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="upload-tab5" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">
                          <i class="fas fa-upload"></i>Upload File</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ket-tab5" data-toggle="tab" href="#ket" role="tab" aria-controls="ket" aria-selected="false">
                          <i class="fas fa-clipboard-list"></i>Keterangan</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab5">

        <?php if ($daftar_seminar['DafsemStatus']==1) { ?> 
                  <div align="center">
                    <h6>Selamat ! Pendaftaran Seminar kamu DiSetujui</h6>
                  <img src="<?php echo base_url()?>assets/img/umk/acc.png?>" alt="" class="img img-responsive img-thumbnail" width="430">
                  </div>         
       <?php }elseif($daftar_seminar['DafsemStatus']==null || $daftar_seminar['DafsemStatus']==2){ ?>
<div class="col-12">
           <form action="<?php echo base_url('mhs/pendaftaran/proses_daftar_seminar'); ?>" 
                 enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="card-body">

                <div class="row">
                  <div class="col-6">
                    <div class="section-title mt-1">File Transkrip Acc Kaprodi</div>
                    <div class="custom-file">
                      <input name="transkrip" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="section-title mt-1">KW Komputer</div>
                    <div class="custom-file">
                      <input name="kwkomputer" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="section-title mt-1">File Pengesahan</div>
                    <div class="custom-file">
                      <input name="pengesahan" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .png</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="section-title mt-1">KW Kewirausahaan</div>
                    <div class="custom-file">
                      <input  name="kwusaha" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="section-title mt-1">File Buku Bimbingan</div>
                    <div class="custom-file">
                      <input name="bukubimbingan" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="section-title mt-1">KW B.Inggris</div>
                    <div class="custom-file">
                      <input  name="kwbinggris" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="section-title mt-1">File Bukti Pembayaran</div>
                    <div class="custom-file">
                      <input name="slip" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="section-title mt-1">File Plagiasi</div>
                    <div class="custom-file">
                      <input name="plagiasi" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                  </div>
                </div>

                

                     <div class="card-footer text-right ">
                    <button class="btn btn-primary mr-1" name="submit" type="submit">Simpan</button>
                    </div> 
            </div>
        </form>
</div>
          <?php }elseif($daftar_seminar['DafsemStatus']==0){ ?>
                          <div align="center">
                            <h6>Pendaftaran Kamu Sudah Terkirim, Harap Tunggu ya..</h6>
                          <img src="<?php echo base_url()?>assets/img/umk/wait.jpg?>" alt="" class="img img-responsive img-thumbnail" width="430">
                          </div>
          <?php } ?>         
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="ket-tab5">
      <?php if($daftar_seminar){?>
              <h5 class="section-title mt-1">Status&emsp;&emsp;&emsp;: 
                  <?php if ($daftar_seminar['DafsemStatus']==0) { ?>
                        <span class="badge badge-warning">Menunggu</span>
                        <?php } else if($daftar_seminar['DafsemStatus']==1) {?>
                        <span class="badge badge-success">Disetujui</span>
                       <?php }else{ ?>
                        <span class="badge badge-danger">Perbaikan</span>
                   <?php } ?>
                 
               </h5>
               <h5 class="section-title mt-1">Keterangan &nbsp;&nbsp;:
               <span><?php echo $daftar_seminar['DafsemKet'] ??'<span style="color:red;">Kosong</span>' ?></span>
               </h5>
               <h2 class="section-title mt-1">File </h2> 

               <div class="row" align="center">
                <div class="col-3">
                 <h6 style="color: #718eef;">Transkrip Acc Kaprodi</h6>
                <?php if ($daftar_seminar['DafsemFileTranskrip']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileTranskrip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Transkrip" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Pengesahan</h6>
                <?php if ($daftar_seminar['DafsemFilePengesahan']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFilePengesahan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Pengesahan" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                 <h6 style="color: #718eef;">Bukti Pembayaran</h6>
                <?php if ($daftar_seminar['DafsemFileSlip']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileSlip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                  <h6 style="color: #718eef;">Bukti Bimbingan</h6>
                <?php if ($daftar_seminar['DafsemFileBukubimbingan']==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileBukubimbingan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Buku Bimbingan" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
              </div>
                <br>
              <div class="row" align="center">
                <div class="col-3">
                  <h6 style="color: #718eef;">Plagiasi</h6>
                <?php if ($daftar_seminar['DafsemFilePlagiasi']==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFilePlagiasi']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Plagiasi" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                  <h6 style="color: #718eef;">KW Komputer</h6>
                <?php if ($daftar_seminar['DafsemFileKWKomputer']==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                 <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileKWKomputer']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Komputer" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
                
                <div class="col-3">
                  <h6 style="color: #718eef;">KW B.Inggris</h6>
                <?php if ($daftar_seminar['DafsemFileKWInggris']==null): ?>
                   <span style="color: red">kosong</span>
                <?php else: ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileKWInggris']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW B.Inggris" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                  <h6 style="color: #718eef;">KW Kewirausahaan</h6>
                <?php if ($daftar_seminar['DafsemFileKWKewirausahaan']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/seminar/' .$daftar_seminar['DafsemFileKWKewirausahaan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Usaha" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>
              </div>
<!--  -->
        <?php }else{ ?>
          <p align="center">Belum Ada Data</p>
        <?php } ?>
  
<?php } else { ?>
  <div align="center">
    <img src="<?php echo base_url()?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
  </div>
<?php  } ?> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
