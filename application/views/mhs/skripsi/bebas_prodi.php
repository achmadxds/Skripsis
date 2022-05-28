<?php if ($cek_sidang) { ?>
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
<?php 
$id_mhs = $this->session->userdata('MhsNim'); 
$mhs=$this->db->query("SELECT * from tskripsi where SkripsiMhsNim='$id_mhs'")->row_array();?> 
<?php if ($mhs['SkripsiStatus']==1) { ?> 
                <div align="center">
                  <h6>Selamat ! Kamu Sudah Bebas Prodi</h6>
                <img src="<?php echo base_url()?>assets/img/umk/graduation.png?>" alt="" class="img img-responsive img-thumbnail" width="390">
                </div>
<?php }elseif($mhs['SkripsiStatus']==null || $mhs['SkripsiStatus']==2){ ?> 
<div class="col-12 col-md-6 col-lg-6">
           <form action="<?php echo base_url('mhs/skripsi/upload_bebas_prodi') ?>" 
                 enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="card-body">
                    
                    <div class="section-title mt-1">File Bebas Prodi</div>
                    <div class="custom-file">
                      <input  name="bebas_prodi" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .rar</label>
                    </div>

                     <div class="card-footer text-right ">
                    <button class="btn btn-primary mr-1" id="submit" name="submit" type="submit">Simpan</button>
                    </div> 
                </div>
            </form>
</div>              
       <?php }elseif($mhs['SkripsiStatus']==0){ ?>
                <div align="center">
                  <h6>Pendaftaran Kamu Sudah Terkirim, Harap Tunggu ya..</h6>
                <img src="<?php echo base_url()?>assets/img/umk/wait.jpg?>" alt="" class="img img-responsive img-thumbnail" width="430">
                </div>
        <?php } ?>   
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="ket-tab5">
<?php if($detail){?>
              <h5 class="section-title mt-1">Status &emsp;&emsp; :
                   <?php if ($detail['SkripsiStatus']==0) { ?>
                   <span class="badge badge-warning">Menunggu</span>
                   <?php } else if($detail['SkripsiStatus']==1) {?>
                   <span class="badge badge-success">Disetujui</span>
                   <?php }else{ ?>
                   <span class="badge badge-danger">Perbaikan</span>
                   <?php } ?>
               </h5>

               <h5 class="section-title mt-1">Keterangan :
               <span >
               <?php echo $detail['SkripsiKeterangan'] ??'<span style="color:red;">Kosong</span>' ?></span>
               </h5>
           
           <h2 class="section-title mt-1">File </h2>   
           <div class="row">
            
          <?php if ($detail['SkripsiBebasProdi']==null): ?>
          <?php else: ?>
                  <div class="col-4">
                    <h6 style="color: #718eef; position: relative; left: 40px; top: 15px;">File Bebas Prodi</h6>
                        <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/bebas_prodi/'.$detail['SkripsiBebasProdi']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/rar.png') ?>" alt="HTML tutorial" style="width:70px;height:70px; position: relative; top: 9px; left: 38px;"></a>
                    </div>
          <?php endif ?>
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