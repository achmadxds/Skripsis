<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="ketua-tab5" data-toggle="tab" href="#ketua" role="tab" aria-controls="ketua" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Sebagai Ketua Penguji</a>
                      <li class="nav-item">
                        <a class="nav-link " id="dosen-tab5" data-toggle="tab" href="#dosen" role="tab" aria-controls="dosen" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Sebagai Anggota Penguji 1</a>
                      </li>
                      </li>
                        <li class="nav-item">
                        <a class="nav-link" id="tamu-tab5" data-toggle="tab" href="#tamu" role="tab" aria-controls="tamu" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Anggota Penguji 2</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="ketua" role="tabpanel" aria-labelledby="ketua-tab5">
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
                            <td><?php echo $mhs['SidangJam'] ?></td>
                            <td><?php echo $mhs['SidangTgl'] ?></td>
                            <td style="text-align: center">
                          
                             <?php
                             $sidang = $mhs['SidangId'];
                             $dosen  = $this->session->userdata('UserId');
                             $cek_nilai = $this->db->query("SELECT * FROM tnilaikriteria WHERE NiketSidangId='$sidang' AND NiketDosenId='$dosen'")->row_array(); 
                             ?>

                            <?php if ($cek_nilai==null): ?>
                              <a data-toggle="modal" data-target="#na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
                              href="" 
                              class="btn btn-info">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#editna_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
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
                      <div class="tab-pane fade" id="dosen" role="tabpanel" aria-labelledby="dosen-tab5">
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
                            <td><?php echo $mhs['SidangJam'] ?></td>
                            <td><?php echo $mhs['SidangTgl'] ?></td>
                            <td style="text-align: center">
                          
                            <?php
                             $sidang = $mhs['SidangId'];
                             $dosen  = $this->session->userdata('UserId');
                             $cek_nilai = $this->db->query("SELECT * FROM tnilaikriteria WHERE NiketSidangId='$sidang' AND NiketDosenId='$dosen'")->row_array(); 
                             ?>

                            <?php if ($cek_nilai==null): ?>
                              <a data-toggle="modal" data-target="#na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
                              href="" 
                              class="btn btn-info">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#editna_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
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
                      <div class="tab-pane fade" id="tamu" role="tabpanel" aria-labelledby="tamu-tab5">
              <div class="row">
                <div class="col-3">
                   <p><button type="" class="far fa-edit btn btn-info btn btn-md"></button> : Belum dinilai</p>
       
                </div>
                <div class="col-4">
                   <p><button type="" class="far fa-edit btn btn-success btn btn-md"></button> : Sudah dinilai</p>
                </div>
              </div>
                         <div class="table table-responsive">
                       <table  id="tabelku3" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php $no=1; foreach ($nilai_tamu as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim']?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td><?php echo $mhs['RuangNama'] ?></td>
                            <td><?php echo $mhs['SidangJam'] ?></td>
                            <td><?php echo $mhs['SidangTgl'] ?></td>
                            <td style="text-align: center">
                          
                             <?php
                             $sidang = $mhs['SidangId'];
                             $dosen  = $this->session->userdata('UserId');
                             $cek_nilai = $this->db->query("SELECT * FROM tnilaikriteria WHERE NiketSidangId='$sidang' AND NiketDosenId='$dosen'")->row_array(); 
                             ?>

                            <?php if ($cek_nilai==null): ?>
                              <a data-toggle="modal" data-target="#na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
                              href="" 
                              class="btn btn-info">
                                <i class="far fa-edit"></i>
                              </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#editna_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>" 
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
<form action="<?php echo base_url('secure/nilai/tambah_na'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nilai Akhir</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control" readonly>
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
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                      <br>
                       <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 50%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>

                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Analisa Dan Perancangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k1" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Pemahaman Materi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k2" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Program Aplikasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k3" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Presentasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k4" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                      <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
                      <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SidangPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji3']): ?>
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
<form action="<?php echo base_url('secure/nilai/tambah_na'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nilai Akhir</h5>
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
                        <textarea name="judul" class="form-control" type="text" style="height: 50%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>

                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Analisa Dan Perancangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k1" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Pemahaman Materi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k2" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Program Aplikasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k3" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Presentasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k4" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                      <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
                      <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SidangPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji3']): ?>
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

<?php  foreach ($nilai_tamu as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/tambah_na'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="na_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nilai Akhir</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control" readonly>
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
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                        <br>
                       <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 50%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>

                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Analisa Dan Perancangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k1" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Pemahaman Materi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k2" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Program Aplikasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k3" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Presentasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k4" type="text" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                      <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
                      <input type="hidden" name="level"
                       <?php if ($this->session->userdata('UserId')==$mhs['SidangPenguji1']): ?>
                        value="1"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji2']): ?> 
                        value="2"
                       <?php elseif ($this->session->userdata('UserId')==$mhs['SidangPenguji3']): ?>
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


<?php  foreach ($edit_na as $mhs) {?>
<form action="<?php echo base_url('secure/nilai/edit_na'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="editna_<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nilai Akhir</h5>
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
                        <input value="<?php echo $mhs['MhsNim'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-8">
                       <label>NAMA</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input value="<?php echo $mhs['MhsNama'] ?>" name="nama" type="text" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <br>
                       <label>Judul Skripsi</label>
                      <div class="input-group">
                        <textarea name="judul" class="form-control" type="text" style="height: 50%;" readonly><?php echo $mhs['SkripsiJudul'] ?></textarea>
                      </div>

                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Analisa Dan Perancangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k1" type="text" min="0" max="100" value="<?php echo $mhs['NiketK1'] ?>" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Pemahaman Materi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k2" type="text" min="0" max="100" value="<?php echo $mhs['NiketK2'] ?>" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Program Aplikasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k3" type="text" min="0" max="100" value="<?php echo $mhs['NiketK3'] ?>" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Presentasi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="k4" type="text" min="0" max="100" value="<?php echo $mhs['NiketK4'] ?>" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" rquired>
                      </div>
                    </div>
                  </div>
                  <br>
                  <label>Nilai Akhir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>
                        <input  name="total" type="text" min="0" max="100" value="<?php echo $mhs['NiketTotal'] ?>" class="form-control"readonly>
                      </div>
                      <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
                      <input type="hidden" name="NiketId" value="<?php echo $this->enkripsi->encrypt_url($mhs['NiketId']) ?>">
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