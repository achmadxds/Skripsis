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
                 <h6 style="color: #718eef;">Proposal</h6>
                <?php if ($lulus->DafsidFileProposal==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileProposal) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Proposal" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Bukti Bimbingan</h6>
                <?php if ($lulus->DafsidFileBukubimbingan==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileBukubimbingan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bimbingan" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Surat Penelitian</h6>
                <?php if ($lulus->DafsidFileSuratBalasan==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileSuratBalasan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Surat Penelitian" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div>  

                <div class="col-3">
                 <h6 style="color: #718eef;">Transkrip Nilai</h6>
                <?php if ($lulus->DafsidFileTranskrip==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileTranskrip) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="HTranskrip" style="width:50px;height:50px;"></a> 
                <?php endif ?>
                </div> 
              </div>
              <br>
              <div class="row" align="center">
                <div class="col-4">
                 <h6 style="color: #718eef;">Berita Acara</h6>
                <?php if ($lulus->DafsidFileBeritaAcara==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileBeritaAcara) ?>"> <img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Berita Acara" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div>

                <div class="col-4">
                 <h6 style="color: #718eef;">Plagiasi</h6>
                <?php if ($lulus->DafsidFilePlagiasi==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFilePlagiasi) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Plagiasi" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div> 

                <div class="col-4">
                 <h6 style="color: #718eef;">Bukti Bayar</h6>
                <?php if ($lulus->DafsidFileSlip==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileSlip) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div> 
              </div>
              <br>  
              <div class="row" align="center">
                <div class="col-3">
                 <h6 style="color: #718eef;">KW Komputer</h6>
                <?php if ($lulus->DafsidFileKWKomputer==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileKWKomputer) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Komputer" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                 <h6 style="color: #718eef;">KW B.Inggris</h6>
                <?php if ($lulus->DafsidFileKWInggris==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileKWInggris) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW B.Inggris" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                 <h6 style="color: #718eef;">KW Kewirausahaan</h6>
                <?php if ($lulus->DafsidFileKWKewirausahaan==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>  
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileKWKewirausahaan) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Usaha" style="width:50px;height:50px;"></a>
                <?php endif ?>
                </div> 

                <div class="col-3">
                 <h6 style="color: #718eef;">ESQ</h6>
                <?php if ($lulus->DafsidFileEsq==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>  
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileEsq) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="ESQl" style="width:50px;height:50px;"></a>
                    <!-- <div class="gallery">
                      <div class="gallery-item" data-image="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$lulus->DafsidFileEsq) ?>" data-title="ESQ" style="width:50px;height:50px;"></div>
                    </div> -->
                <?php endif ?>
                </div> 
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php }elseif($cek_status1['BimbingansBab']==5 && $cek_status1['BimbingansStatus']==1 &&
    $cek_status2['BimbingansBab']==5 && $cek_status2['BimbingansStatus']==1) { ?>

<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="upload-tab5" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">
                          <i class="fas fa-upload"></i>Upload</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ket-tab5" data-toggle="tab" href="#ket" role="tab" aria-controls="ket" aria-selected="false">
                          <i class="fas fa-clipboard-list"></i>Keterangan</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab5">

      <?php if ($daftar_sidang['DafsidStatus']==1) { ?> 
                <div align="center">
                  <h6>Selamat ! Pendaftaran Sidang kamu DiSetujui</h6>
                <img src="<?php echo base_url()?>assets/img/umk/acc.png?>" alt="" class="img img-responsive img-thumbnail" width="430">
                </div>         
     <?php }elseif($daftar_sidang['DafsidStatus']==null || $daftar_sidang['DafsidStatus']==2){ ?>
<div class="col-12">
           <form action="<?php echo base_url('mhs/pendaftaran/proses_daftar_sidang'); ?>" 
                 enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="section-title mt-1">File Proposal</div>
                      <div class="custom-file">
                      <input name="proposal" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                    </div>
                     <div class="col-6">
                      <div class="section-title mt-1">File Buku Bimbingan</div>
                      <div class="custom-file">
                      <input name="bukubimbingan" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="section-title mt-1">Surat Balasan</div>
                      <div class="custom-file">
                      <input name="suratbalasan" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                    </div>
                   <div class="col-6">
                      <div class="section-title mt-1">Transkrip Acc Kaprodi</div>
                      <div class="custom-file">
                      <input name="transkrip" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
                    </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="section-title mt-1">Bukti Bayar</div>
                      <div class="custom-file">
                      <input  name="slip" type="file" class="custom-file-input" >
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
                      <div class="section-title mt-1">Berita Acara</div>
                      <div class="custom-file">
                      <input  name="beritaacara" type="file" class="custom-file-input" >
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
                      <div class="section-title mt-1">File Plagiasi</div>
                      <div class="custom-file">
                      <input name="plagiasi" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .pdf</label>
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
                      <div class="section-title mt-1">File ESQ</div>
                      <div class="custom-file">
                      <input  name="esq" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .jpeg</label>
                    </div>
                    </div>
                    <div class="col6">
                      
                    </div>
                  </div>

                     <div class="card-footer text-right ">
                    <button class="btn btn-primary mr-1" name="submit" type="submit">Simpan</button>
                    </div> 
                </div>
            </form>
</div> 
<?php }elseif($daftar_sidang['DafsidStatus']==0){ ?>
                <div align="center">
                  <h6>Pendaftaran Kamu Sudah Terkirim, Harap Tunggu ya..</h6>
                <img src="<?php echo base_url()?>assets/img/umk/wait.jpg?>" alt="" class="img img-responsive img-thumbnail" width="430">
                </div>
<?php } ?>       
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="ket-tab5">
                         <?php if($daftar_sidang){ ?>
              <h5 class="section-title mt-1">Status &emsp;&emsp;&emsp;:
                  <?php if ($daftar_sidang['DafsidStatus']==0) { ?>
                  <span class="badge badge-warning">Menunggu</span>
                  <?php } else if($daftar_sidang['DafsidStatus']==1) {?>
                  <span class="badge badge-success">Disetujui</span>
                  <?php }else{ ?>
                  <span class="badge badge-danger">Perbaikan</span>
                  <?php } ?>
               </h5>

               <h5 class="section-title mt-1">Keterangan &nbsp;&nbsp;:
               <span>
               <?php echo $daftar_sidang['DafsidKet'] ??'<span style="color:red;">Kosong</span>' ?></span>
              </h5>
               <h2 class="section-title mt-1">File </h2>

               <div class="row" align="center">
                <div class="col-3">
                 <h6 style="color: #718eef;">Proposal</h6>
                <?php if ($daftar_sidang['DafsidFileProposal']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileProposal']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Proposal" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Bukti Bimbingan</h6>
                <?php if ($daftar_sidang['DafsidFileBukubimbingan']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileBukubimbingan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bimbingan" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div>

                <div class="col-3">
                 <h6 style="color: #718eef;">Surat Penelitian</h6>
                <?php if ($daftar_sidang['DafsidFileSuratBalasan']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileSuratBalasan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Surat Penelitian" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div>  

                <div class="col-3">
                 <h6 style="color: #718eef;">Transkrip Nilai</h6>
                <?php if ($daftar_sidang['DafsidFileTranskrip']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileTranskrip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="HTranskrip" style="width:70px;height:70px;"></a> 
                <?php endif ?>
                </div> 
              </div>
              <br>
              <div class="row" align="center">
                <div class="col-4">
                 <h6 style="color: #718eef;">Berita Acara</h6>
                <?php if ($daftar_sidang['DafsidFileBeritaAcara']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileBeritaAcara']) ?>"> <img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Berita Acara" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div>

                <div class="col-4">
                 <h6 style="color: #718eef;">Plagiasi</h6>
                <?php if ($daftar_sidang['DafsidFilePlagiasi']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFilePlagiasi']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Plagiasi" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div> 

                <div class="col-4">
                 <h6 style="color: #718eef;">Bukti Bayar</h6>
                <?php if ($daftar_sidang['DafsidFileSlip']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileSlip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:70px;height:70px; "></a>
                <?php endif ?>
                </div> 
              </div>
              <br>  
              <div class="row" align="center">
                <div class="col-3">
                 <h6 style="color: #718eef;">KW Komputer</h6>
                <?php if ($daftar_sidang['DafsidFileKWKomputer']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileKWKomputer']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Komputer" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                 <h6 style="color: #718eef;">KW B.Inggris</h6>
                <?php if ($daftar_sidang['DafsidFileKWInggris']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileKWInggris']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW B.Inggris" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div> 
                
                <div class="col-3">
                 <h6 style="color: #718eef;">KW Kewirausahaan</h6>
                <?php if ($daftar_sidang['DafsidFileKWKewirausahaan']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>  
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileKWKewirausahaan']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KW Usaha" style="width:70px;height:70px;"></a>
                <?php endif ?>
                </div> 

                <div class="col-3">
                 <h6 style="color: #718eef;">ESQ</h6>
                <?php if ($daftar_sidang['DafsidFileEsq']==null): ?>
                  <span style="color: red">kosong</span>
                <?php else: ?>  
                   <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileEsq']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="ESQl" style="width:70px;height:70px; "></a>
                    <!-- <div class="gallery">
                      <div class="gallery-item" data-image="<?php echo base_url('assets/upload/pendaftaran/sidang/' .$daftar_sidang['DafsidFileEsq']) ?>" data-title="ESQ" style="width60px; height:60px;"></div>
                    </div> -->
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