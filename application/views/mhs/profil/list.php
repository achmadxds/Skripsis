<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="profil-tab5" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">
                          <i class="fas fa-id-card"></i>Profil</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ubah-tab5" data-toggle="tab" href="#ubah" role="tab" aria-controls="ubah" aria-selected="false">
                          <i class="fas fa-lock"></i>Ubah Password</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab5">
 <form action="<?php echo base_url('mhs/profil'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="col-12">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $profil->MhsNim ?>" disabled>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $profil->MhsNama ?>" required="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" value="<?php echo $profil->MhsEmail ?>" required="">
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>NO HP</label>
                            <input name="nohp" type="number" class="form-control" value="<?php echo $profil->MhsNohp ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" type="text" style="height: 70%;"><?php echo $profil->MhsAlamat ?></textarea>
                       </div>
                        </div>
                    <div class="row">
                    <div class="col-6">
                    <label>Foto</label>   
                    <div class="custom-file">
                      <input name="foto" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >upload file .png</label>
                    </div>
                    </div>
                    <div class="col-6">
                      <div class="card-body">
                    <div class="gallery gallery-md">
                      <div class="gallery-item" data-image="<?php echo base_url('assets/upload/profil/mhs/' .$profil->MhsFoto) ?>" data-title="Image 1"></div>
                    </div>
                    </div>
                    </div>
                    
                        
                    </div>
                    <div class="card-footer text-right">
                      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
              </div>
</form>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ubah" role="tabpanel" aria-labelledby="ubah-tab5">
<form action="<?php echo base_url('mhs/profil/ubah_password'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="col-6">
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Password Baru</label>
                            <input type="text" name="pwbaru" class="form-control" required="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Masukkan kembali Password Baru</label>
                            <input type="text" name="pwbaru2" class="form-control" required="">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
</form>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>






