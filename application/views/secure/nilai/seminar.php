<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dosen-tab5" data-toggle="tab" href="#dosen" role="tab" aria-controls="dosen" aria-selected="true">
                          <i class="fas fa-user-tie"></i> Sebagai Dosen Pembimbing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ketua-tab5" data-toggle="tab" href="#ketua" role="tab" aria-controls="ketua" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Sebagai Ketua Penguji</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="dosen" role="tabpanel" aria-labelledby="dosen-tab5">
              <div class="row">
                <div class="col-3">
                   <p><button type="" class="far fa-edit btn btn-info btn btn-md"></button> : Belum dinilai</p>
       
                </div>
                <div class="col-4">
                   <p><button type="" class="far fa-edit btn btn-success btn btn-md"></button> : Sudah dinilai</p>
                </div>
              </div>
       
                        <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; foreach ($nilai_dosen as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim']?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td><?php echo $mhs['RuangNama'] ?></td>
                            <td><?php echo $mhs['SemproJam'] ?></td>
                            <td><?php echo $mhs['SemproTgl'] ?></td>
                            <td>
                            <?php if ($mhs['SemproHasil']==1): ?>
                                      <div class="badge badge-success">
                                      <?php echo 'Diterima';?>
                                      </div>
                            <?php elseif($mhs['SemproHasil']==2): ?>
                                      <div class="badge badge-danger">
                                      <?php echo 'Ditolak';?>
                                      </div>
                            <?php elseif($mhs['SemproHasil']==3): ?>
                                      <div class="badge badge-warning">
                                      <?php echo 'Mengulang';?>
                                      </div>
                            <?php else: ?>
                                      <div class="badge badge-primary">
                                      <?php echo 'Menunngu';?>
                                      </div>
                            <?php endif ?>
                            </td>
                            <td style="text-align: center">
                          
                            <?php
                             $sempro = $mhs['SemproId'];
                             $dosen  = $this->session->userdata('UserId');
                             $cek_sempro = $this->db->query("SELECT *  FROM tdetailsempro WHERE DetsemSemproId='$sempro' AND DetsemDosenId='$dosen'")->row_array(); 
                             ?>

                            <?php if ($cek_sempro==null): ?>
                              <a data-toggle="modal" data-target="#dosen_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>" 
                              href="" 
                              class="btn btn-md btn-info">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#editdosen_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>" 
                              href="<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>" 
                              class="btn btn-md btn-success">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php endif ?>

                        
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ketua" role="tabpanel" aria-labelledby="ketua-tab5">
              <div class="row">
                <div class="col-3">
                   <p><button type="" class="far fa-edit btn btn-info btn btn-md"></button> : Belum dinilai</p>
       
                </div>
                <div class="col-4">
                   <p><button type="" class="far fa-edit btn btn-success btn btn-md"></button> : Sudah dinilai</p>
                </div>
              </div>
                         <div class="table table-responsive">
                      <table  id="tabelku2" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; foreach ($nilai_ketua as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim']?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td><?php echo $mhs['RuangNama'] ?></td>
                            <td><?php echo $mhs['SemproJam'] ?></td>
                            <td><?php echo $mhs['SemproTgl'] ?></td>
                            <td>
                            <?php if ($mhs['SemproHasil']==1): ?>
                                      <div class="badge badge-success">
                                      <?php echo 'Diterima';?>
                                      </div>
                            <?php elseif($mhs['SemproHasil']==2): ?>
                                      <div class="badge badge-danger">
                                      <?php echo 'Ditolak';?>
                                      </div>
                            <?php elseif($mhs['SemproHasil']==3): ?>
                                      <div class="badge badge-warning">
                                      <?php echo 'Mengulang';?>
                                      </div>
                            <?php else: ?>
                                      <div class="badge badge-primary">
                                      <?php echo 'Menunngu';?>
                                      </div>
                            <?php endif ?>
                            </td>
                            <td style="text-align: center">
                          
                             <?php
                             $sempro = $mhs['SemproId'];
                             $dosen  = $this->session->userdata('UserId');
                             $cek_sempro = $this->db->query("SELECT *  FROM tdetailsempro WHERE DetsemSemproId='$sempro'AND DetsemDosenId='$dosen'")->row_array(); 
                             ?>

                            <?php if ($cek_sempro==null): ?>
                              <a data-toggle="modal" data-target="#ketua_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>" 
                              href="" 
                              class="btn btn-info">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#ketuaedit_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>" 
                              href="" 
                              class="btn btn-success">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php endif ?>

                          
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
</section>

<?php  foreach ($nilai_dosen as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/penilaian_seminar_d'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="dosen_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Penilaian Seminar</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
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
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
                      </div>
                    </div>
                  </div>
                      <br>
                      <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 30%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>
                      <br>
                      <label>Revisi</label>
                      <div class="input-group">
                        <textarea name="revisi" class="form-control" type="text" style="height: 50%;"></textarea>
                      </div>

                      <input type="hidden" name="daftar" value="<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>">
                      <input type="hidden" name="sempro" value="<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>">
                      <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SemproPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji3']): ?>
                       value="3" 
                       <?php endif ?> 
                      >
                    
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


<?php  foreach ($edit_nilai_dosen as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/edit_penilaian_seminar_d'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="editdosen_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Penilaian Seminar</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
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
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
                      </div>
                    </div>
                  </div>
                  <br>
                      <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 30%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>
                      <br>
                      <label>Revisi</label>
                      <div class="input-group">
                        <textarea name="revisi_d" class="form-control" type="text" style="height: 50%;"><?php echo $mhs['DetsemKetRevisi'] ?></textarea>
                      </div>
                      <input type="hidden" name="detsem" value="<?php echo $this->enkripsi->encrypt_url($mhs['DetsemId']) ?>">
                       <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SemproPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji3']): ?>
                       value="3" 
                       <?php endif ?> 
                      >
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


<?php  foreach ($nilai_ketua as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/penilaian_seminar_k'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="ketua_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Penilaian Seminar</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
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
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
                      </div>
                    </div>
                  </div>
                      <br>
                      <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 30%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>
                      <br>
                      <label>Revisi</label>
                      <div class="input-group">
                        <textarea name="revisi" class="form-control" type="text" style="height: 50%;"></textarea>
                      </div>
                      <br>
                    <div class="row">
                      <div class="col-6">
                        <label>Hasil</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <select name="hasil" class="form-control">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1" style="color: green">DiTerima</option>
                        <option value="2" style="color: red">DiTolak</option>
                      </select>
                      </div>
                      </div>
                      <div class="col-6">
                         <label>Status Revisi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <select name="status_revisi" class="form-control">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1" >Revisi Kecil</option>
                        <option value="2" >Revisi Besar</option>
                      </select>
                      </div>
                      </div>
                    </div>
                      


                      <input type="hidden" name="daftar" value="<?php echo $this->enkripsi->encrypt_url($mhs['DafsemId']) ?>">
                      <input type="hidden" name="sempro" value="<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>">
                      <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SemproPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SemproPenguji3']): ?>
                       value="3" 
                       <?php endif ?> 
                      >
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

<?php  foreach ($edit_nilai_ketua as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/edit_penilaian_seminar_k'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="ketuaedit_<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Penilaian Seminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label>NIM</label>
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
                    </div>
                    <div class="col-6">
                      <label>Nama</label>
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control daterange-cus" readonly>
                    </div>
                  </div>
                  <br>
                  <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 30%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>
                      <br>
                      <label>Revisi</label>
                      <div class="input-group">
                        <textarea name="revisi_k" class="form-control" type="text" style="height: 50%;"><?php echo $mhs['DetsemKetRevisi'] ?></textarea>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <br>
                        <label>Hasil</label>
                        <select name="hasil" class="form-control select2">
                        <option value="<?php echo $mhs['SemproHasil']?>" selected>
                                <?php if ($mhs['SemproHasil']==1) {
                                  echo 'Diterima';
                                }else{
                                  echo 'Ditolak';
                                } ?>
                        </option>
                        <option value="1" style="color: green">DiTerima</option>
                        <option value="2" style="color: red">DiTolak</option>
                        </select>
                        </div>
                        <div class="col-6">
                          <br>
                          <label>Status Revisi</label>  
                        <select name="status_revisi" class="form-control select2">
                        <option value="<?php echo $mhs['SemproStatusRevisi']?>" selected>
                                <?php if ($mhs['SemproStatusRevisi']==1) {
                                  echo 'Revisi Kecil';
                                }else{
                                  echo 'Revisi Besar';
                                } ?>
                        </option>
                        <option value="1" >Revisi Kecil</option>
                        <option value="2" >Revisi besar</option>
                        </select>
                        </div>
                      </div>
                      
                      </select>

                      <input type="hidden" name="detsem" value="<?php echo $this->enkripsi->encrypt_url($mhs['DetsemId']) ?>">
                      <input type="hidden" name="sempro" value="<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>">
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