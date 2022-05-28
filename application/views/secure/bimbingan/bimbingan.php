<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="belum-tab5" data-toggle="tab" href="#belum" role="tab" aria-controls="belum" aria-selected="true">
                          <i class="fas fa-pen-nib"></i>Belum di Cek</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="sudah-tab5" data-toggle="tab" href="#sudah" role="tab" aria-controls="sudah" aria-selected="false">
                          <i class="fas fa-check-circle"></i>Sudah di Cek</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="belum" role="tabpanel" aria-labelledby="belum-tab5">
                        <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>FOTO</th>
                            <th>TANGGAL</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>BAB</th>
                            <th>FILE</th>
                            <th>KET</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; foreach ($bimbingan_belum as $belum) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td>
                              <?php if ($belum['MhsFoto']==!null): ?>
                            <div class="gallery">
                            <div class="gallery-item" data-image="<?php echo base_url('assets/upload/profil/mhs/'. $belum['MhsFoto']) ?>" data-title="Image 1"></div>
                           </div>
                              <?php endif ?>
                            </td>
                            <td><?php echo $belum['BimbingansTgl'] ?></td>
                            <td><?php echo $belum['MhsNim'] ?></td>
                            <td><?php echo $belum['MhsNama'] ?></td>
                            <td>
                                <?php if     ($belum['BimbingansBab']==1): ?>
                                <?php echo 'I' ?>
                                <?php elseif ($belum['BimbingansBab']==2): ?>
                                <?php echo 'II' ?>
                                <?php elseif ($belum['BimbingansBab']==3): ?>
                                <?php echo 'III' ?>
                                <?php elseif ($belum['BimbingansBab']==4): ?>
                                <?php echo 'IV' ?>
                                <?php elseif ($belum['BimbingansBab']==5): ?>
                                <?php echo 'V' ?>
                                <?php elseif ($belum['BimbingansBab']=='judul'): ?>
                                <?php echo 'JUDUL' ?>
                                <?php elseif ($belum['BimbingansBab']=='proposal'): ?>
                                <?php echo 'PROPOSAL' ?>
                                <?php elseif ($belum['BimbingansBab']=='revisi'): ?>
                                <?php echo 'REVISI SIDANG' ?>
                                <?php endif ?>
                            </td>
                            <td style="color: blue">
                              <a href="<?php echo base_url('assets/upload/bimbingan/'.$belum['BimbingansFile']) ?>" target="_blank" >
                              <?php echo $belum['BimbingansBab'] ?>
                              </a>
                               
                            </td>
                            <td><?php echo $belum['BimbingansKet'] ?></td>
                            <td>
                               <a href="<?php echo $belum['MhsNim'] ?>" data-toggle="modal" data-target="#balas_<?php echo $belum['MhsNim'] ?>" class="btn btn-primary">Balas</a>
                            </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="sudah" role="tabpanel" aria-labelledby="sudah-tab5">
                        <table  id="tabelku2" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>FOTO</th>
                            <th>BALAS</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>BAB</th>
                            <th>FILE</th>
                            <th>FILE BALAS</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; foreach ($bimbingan_sudah as $sudah) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td>
                              <?php if ($sudah['MhsFoto']==!null): ?>
                            <div class="gallery">
                            <div class="gallery-item" data-image="<?php echo base_url('assets/upload/profil/mhs/'. $sudah['MhsFoto']) ?>" data-title="Image 1"></div>
                           </div>
                            <td><?php echo date("d-m-Y", strtotime($sudah['BimbingansBalasanTgl'])) ?></td>
                            <td><?php echo $sudah['MhsNim'] ?></td>
                            <td><?php endif ?><?php echo $sudah['MhsNama'] ?></td>
                            <td>
                                <?php if     ($sudah['BimbingansBab']==1): ?>
                                <?php echo 'I' ?>
                                <?php elseif ($sudah['BimbingansBab']==2): ?>
                                <?php echo 'II' ?>
                                <?php elseif ($sudah['BimbingansBab']==3): ?>
                                <?php echo 'III' ?>
                                <?php elseif ($sudah['BimbingansBab']==4): ?>
                                <?php echo 'IV' ?>
                                <?php elseif ($sudah['BimbingansBab']==5): ?>
                                <?php echo 'V' ?>
                                <?php elseif ($sudah['BimbingansBab']=='judul'): ?>
                                <?php echo 'JUDUL' ?>
                                <?php elseif ($sudah['BimbingansBab']=='proposal'): ?>
                                <?php echo 'PROPOSAL' ?>
                                <?php elseif ($sudah['BimbingansBab']=='revisi'): ?>
                                <?php echo 'REVISI SIDANG' ?>
                                <?php endif ?>
                            </td>
                            <td style="color: blue">
                              <a href="<?php echo base_url('assets/upload/bimbingan/'.$sudah['BimbingansFile']) ?>" target="_blank" >
                              <?php echo $sudah['BimbingansBab'] ?>
                              </a>
                            </td>
                            </td>
                            <td style="color: blue">
                              <a href="<?php echo base_url('assets/upload/bimbingan/'.$sudah['BimbingansBalasanFile']) ?>" target="_blank" >
                              <?php echo $sudah['BimbingansBab'].'_'.'Balasan' ?>
                              </a>
                            </td>
                            <td>
                              <?php if ($sudah['BimbingansStatus']==1): ?>
                               <p style="color: green">ACC</p>
                              <?php else :?>                           
                               <p style="color: red">Revisi</p>
                              <?php endif ?>
                            </td>
                            <td>
                               <a href="<?php echo $sudah['MhsNim'] ?>" data-toggle="modal" data-target="#edit_<?php echo $sudah['MhsNim'] ?>" class="btn btn-primary">Ubah</a>
                            </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>
                      </table>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
</section>



<?php  foreach ($balasan as $balasan) {?>
<form action="<?php echo base_url('secure/bimbingan/balas_bimbingan'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="balas_<?php echo $balasan['MhsNim'] ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Balas Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                  
                 
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input value="<?php echo $balasan['MhsNim'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                
                  
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input value="<?php echo $balasan['MhsNama'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                
                 
                  <br>
                      <label>File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-word"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file balasan</label>
                      </div>
                      </div>
                      <br>
                      <label>Status</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <select name="status" class="form-control">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="2" style="color: red">REVISI</option>
                        <option value="1" style="color: green">ACC</option>
                      </select>
                      </div>
                      <br>
                      <label>Cantumkan keterangan</label>
                      <label></label>
                      <textarea name="ket" class="form-control" type="text" style="height: 35%;"></textarea>


                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($balasan['BimbingansId']) ?>">
                       
                    
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





<?php  foreach ($edit_balasan as $balasan) {?>
<form action="<?php echo base_url('secure/bimbingan/balas_bimbingan'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="edit_<?php echo $balasan['MhsNim'] ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Balas Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                  <div class="row">
                    <div class="col-4">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input value="<?php echo $balasan['MhsNim'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-8">
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input value="<?php echo $balasan['MhsNama'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                     <br>
                      <label>File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-word"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file word</label>
                      </div>
                      </div>
                      <br>
                      <label>Status</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <select name="status" class="form-control">
                        <?php if ($balasan['BimbingansStatus']==1): ?>
                          <option value="1" style="color: green" selected>ACC</option>
                        <?php else: ?>
                          <option value="2" style="color: red"selected>REVISI</option>
                        <?php endif ?>
                        <option value="2" style="color: red">REVISI</option>
                        <option value="1" style="color: green">ACC</option>
                      </select>
                      </div>
                      <br>
                      <label>Balasan Keterangan</label>
                      <textarea name="ket" class="form-control" type="text" style="height: 35%;"><?php echo $balasan['BimbingansBalasanKet'] ?></textarea>


                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($balasan['BimbingansId']) ?>">
                       
                    
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