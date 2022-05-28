<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="belum-tab5" data-toggle="tab" href="#belum" role="tab" aria-controls="belum" aria-selected="true">
                          <i class="fas fa-hourglass-start"></i> Bulum Dapat Jadwal</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="sudah-tab5" data-toggle="tab" href="#sudah" role="tab" aria-controls="sudah" aria-selected="false">
                          <i class="fas fa-calendar-day"></i> Sudah Dapat Jadwal</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ulang-tab5" data-toggle="tab" href="#ulang" role="tab" aria-controls="ulang" aria-selected="false">
                          <i class="fas fa-calendar-times"></i> Sidang Ulang</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="lulus-tab5" data-toggle="tab" href="#lulus" role="tab" aria-controls="lulus" aria-selected="false">
                          <i class="fas fa-calendar-check"></i> Lulus Sidang</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="belum" role="tabpanel" aria-labelledby="belum-tab5">
                        <div class="table table-responsive">
                    <table id="tabelku" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($mhs_belum as $mhs) { ?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->DaftarsNIM ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td>
                        <div class="buttons">
                            <a data-toggle="modal" data-target="#modaladd_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/jadwal/tambah_sidang/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-md  btn-icon btn-success">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                           </td>
                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                    </table>
                   </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="sudah" role="tabpanel" aria-labelledby="sudah-tab5">

            <div class="row">
                <div class="col-3">
                   <p><button type="" class="far fa-edit btn btn-info btn btn-md"></button> : Sudah Dapat Jadwal</p>
       
                </div>
                <div class="col-4">
                   <p><button type="" class="far fa-edit btn btn-warning btn btn-md"></button> : Jadwal Seminar Ulang</p>
                </div>
                <div class="col-5" align="right">
                 
                   <a href="" title="umumkan" class="far fa-bullhorn btn btn-success btn btn-sm" data-confirm="PENGUMUMAN JADWAL SIDANG | Apakah Anda Ingin Mengumumkan Jadwal Sidang Ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/jadwal/umumkan_sidang');?>' "> Umumkan</a>
                  
                   <a href="<?php echo base_url('secure/jadwal/cetak_sidang') ?>" target="_blank" title="cetak" class="far fa-print btn btn-primary btn btn-sm"> Cetak</a>
                
              </div>
                        <div class="table table-responsive">
                    <table id="tabelku2" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($mhs_sudah as $mhs) { ?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->DaftarsNIM ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td>
                          <?php
                             $sidang = $mhs->DafsidId;
                             $sql    = "SELECT *  FROM tsidang WHERE SidangDafsidId='$sidang'";
                             $cek_sidang = $this->db->query($sql)->row_array(); 
                          ?>             
                          <div class="buttons">
                            <?php if ($cek_sidang['SidangHasil']==3): ?>
                               <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/jadwal/edit_sidang/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-md  btn-icon btn-warning">
                                <i class="far fa-edit"></i>
                            </a>
                            <?php else: ?>
                              <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/jadwal/edit_sidang/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-md  btn-icon btn-info">
                                <i class="far fa-edit"></i>
                            </a>
                            <?php endif ?>
                            </a>
                           </div>
                           </td>
                           
                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                    </table>
                   </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="ulang" role="tabpanel" aria-labelledby="ulang-tab5">
                        <div class="table table-responsive">
                    <table id="tabelku3" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($mhs_ulang as $mhs) { ?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->DaftarsNIM ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td>
                        <div class="buttons">
                            <a data-toggle="modal" data-target="#modalulang_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/jadwal/tambah_sidang/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-md  btn-icon btn-success">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                           </td>
                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                    </table>
                   </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="lulus" role="tabpanel" aria-labelledby="lulus-tab5">
                        <div class="table table-responsive">
                    <table id="tabelku4" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($mhs_lulus as $mhs) { ?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs['DaftarsNIM'] ?></td>
                          <td><?php echo $mhs['MhsNama'] ?></td>
                          <td>
                        <div class="buttons">
                            <a data-toggle="modal" data-target="#lulus_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" 
                              href="" 
                              class="btn btn-md  btn-icon btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
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


<?php foreach ($tambah_sidang as $mhs) {?>
<!-- Modal tambah -->
 <form action="<?php echo base_url('secure/jadwal/tambah_sidang'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal Sidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
          <input type="hidden" name="dafsid" value="<?php echo $this->enkripsi->encrypt_url($mhs['DafsidId']) ?>">
                  <div class="row">
                    <div class="col-4">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim" type="text" class="form-control"  value="<?php echo $mhs['MhsNim'] ?>" disabled="">
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
                        <input name="nama"type="text" class="form-control"  value="<?php echo $mhs['MhsNama'] ?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <br>
                      <label>Ketua Penguji</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ketua" class="form-control">
                   <?php 
                   $ketua_p   = $mhs['SemproPenguji1'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$ketua_p'";
                   $ketua    = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($ketua['DosenId']);?>" selected><?php echo $ketua['DosenNama'] ?></option>
                  <?php  $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                  <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Anggota Penguji 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing1" class="form-control">
                   <?php 
                   $dosen1    = $mhs['SemproPenguji2'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$dosen1'";
                   $dosbing1 = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($dosbing1['DosenId']);?>" selected><?php echo $dosbing1['DosenNama'] ?></option>
                  <?php  $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                  <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Anggota Penguji 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="tamu" class="form-control">
                          <option disabled selected>Pilih Anggota Penguji 2</option>
                        <?php  $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                        <?php  $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                          <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Ruangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ruangan" class="form-control" required="">
                       <option disabled selected>Pilih Ruangan</option>
                       <?php  $ruangan=$this->db->query("SELECT * FROM truang ORDER BY RuangNama ASC")->result_Array();{  ?>
                          <?php foreach ($ruangan as $ruangan ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($ruangan['RuangId']);?>"><?php echo $ruangan['RuangNama'];?>
                               </option>
                           <?php } ?>
               
                        <?php } ?>
                      </select>
                      </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control daterange-cus" value="<?php echo date("Y-m-d"); ?>">
                      </div>
                  </div>
                  <div class="col-6">
                    <label>Jam</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="jam" class="form-control timepicker">
                      </div>
                  </div>
                </div>
                     
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


<?php foreach ($edit_sidang as $mhs) {?>
 <form action="<?php echo base_url('secure/jadwal/edit_sidang'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Jadwal Sidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
          <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
          <input type="hidden" name="hasil" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangHasil']) ?>">
                  <div class="row">
                    <div class="col-4">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim" type="text" class="form-control"  value="<?php echo $mhs['MhsNim'] ?>" disabled="">
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
                        <input name="nama"type="text" class="form-control"  value="<?php echo $mhs['MhsNama'] ?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <br>
                      <label>Ketua Penguji</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ketua" class="form-control">
                   <?php 
                   $ketua_p   = $mhs['SidangPenguji1'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$ketua_p'";
                   $ketua = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($ketua['DosenId']);?>" selected><?php echo $ketua['DosenNama'] ?></option>
                  <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Anggota Penguji 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing1" class="form-control">
                   <?php 
                   $dosen1    = $mhs['SidangPenguji2'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$dosen1'";
                   $dosbing1 = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($dosbing1['DosenId']);?>" selected><?php echo $dosbing1['DosenNama'] ?></option>
                  <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Anggota Penguji 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="tamu" class="form-control">
                         <?php 
                         $tamu_p   = $mhs['SidangPenguji3'];
                         $sql      = "SELECT * FROM tdosen WHERE DosenId='$tamu_p'";
                         $tamu = $this->db->query($sql)->row_array();
                         ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($tamu['DosenId']);?>" selected><?php echo $tamu['DosenNama'] ?></option>

                          <?php $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                          <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <br>
                      <label>Ruangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ruangan" class="form-control">
                       <?php
                       $idruang   = $mhs['SidangRuangId'];
                       $sql      = "SELECT * FROM truang WHERE RuangId ='$idruang'";
                       $ruang = $this->db->query($sql)->row_array();
                       ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($ruang['RuangId']);?>" selected><?php echo $ruang['RuangNama'] ?></option>
                         <?php $ruangan=$this->db->query("SELECT * FROM truang ORDER BY RuangNama ASC")->result_Array();{  ?>
                          <?php foreach ($ruangan as $ruangan ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($ruangan['RuangId']);?>"><?php echo $ruangan['RuangNama'];?>
                               </option>
                           <?php } ?>
               
                        <?php } ?>
                      </select>
                      </div>
                <div class="row">
                  <div class="col-6">
                    <br>
                    <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control daterange-cus" value="<?php echo date("Y-m-d"); ?>">
                      </div>
                  </div>
                  <div class="col-6">
                    <br>
                    <label>Jam</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="jam" class="form-control timepicker">
                      </div>
                  </div>
                </div>
                     
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


<?php foreach ($edit_sidang_ulang as $mhs) {?>
 <form action="<?php echo base_url('secure/jadwal/edit_sidang_ulang'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modalulang_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Jadwal Sidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
          <input type="hidden" name="sidang" value="<?php echo $this->enkripsi->encrypt_url($mhs['SidangId']) ?>">
                       <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim" type="text" class="form-control daterange-cus"  value="<?php echo $mhs['MhsNim'] ?>" disabled="">
                      </div>

                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control daterange-cus"  value="<?php echo $mhs['MhsNama'] ?>" disabled="">
                      </div>

                      <label>Ketua Penguji</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ketua" class="form-control">
                   <?php 
                   $ketua_p   = $mhs['SidangPenguji1'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$ketua_p'";
                   $ketua = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($ketua['DosenId']);?>" selected><?php echo $ketua['DosenNama'] ?></option>
                      </select>
                      </div>

                      <label>Dosen Pembimbing 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing1" class="form-control">
                   <?php 
                   $dosen1    = $mhs['SidangPenguji2'];
                   $sql      = "SELECT * FROM tdosen WHERE DosenId='$dosen1'";
                   $dosbing1 = $this->db->query($sql)->row_array();
                   ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($dosbing1['DosenId']);?>" selected><?php echo $dosbing1['DosenNama'] ?></option>
                      </select>
                      </div>

                      <label>Dosen Tamu</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="tamu" class="form-control">
                         <?php 
                         $tamu_p   = $mhs['SidangPenguji3'];
                         $sql      = "SELECT * FROM tdosen WHERE DosenId='$tamu_p'";
                         $tamu = $this->db->query($sql)->row_array();
                         ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($tamu['DosenId']);?>" selected><?php echo $tamu['DosenNama'] ?></option>

                          <?php $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                          <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
               
                          ?>
                      </select>
                      </div>

                      <label>Ruangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="ruangan" class="form-control">
                       <?php
                       $idruang   = $mhs['SidangRuangId'];
                       $sql      = "SELECT * FROM truang WHERE RuangId ='$idruang'";
                       $ruang = $this->db->query($sql)->row_array();
                       ?>  
                  <option value="<?php echo $this->enkripsi->encrypt_url($ruang['RuangId']);?>" selected><?php echo $ruang['RuangNama'] ?></option>
                         <?php $ruangan=$this->db->query("SELECT * FROM truang ORDER BY RuangNama ASC")->result_Array();{  ?>
                          <?php foreach ($ruangan as $ruangan ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($ruangan['RuangId']);?>"><?php echo $ruangan['RuangNama'];?>
                               </option>
                           <?php } ?>
               
                        <?php } ?>
                      </select>
                      </div>

                      <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control daterange-cus" value="<?php echo date("Y-m-d"); ?>">
                      </div>

                      <label>Jam</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="jam" class="form-control timepicker">
                      </div>
                     
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



<?php foreach ($sidang_lulus as $mhs) {?>
<div class="modal fade" id="lulus_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Sidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
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
                        <input name="nim" type="text" class="form-control daterange-cus"  value="<?php echo $mhs['MhsNim'] ?>" readonly>
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
                        <input name="nama"type="text" class="form-control daterange-cus"  value="<?php echo $mhs['MhsNama'] ?>" readonly>
                      </div>
                    </div>
                   </div>
                      <br>
                      <label>Ketua Penguji</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <?php 
                         $ketua_p   = $mhs['SidangPenguji1'];
                         $sql      = "SELECT * FROM tdosen WHERE DosenId='$ketua_p'";
                         $ketua = $this->db->query($sql)->row_array();
                         ?>
                         <input class="form-control" value="<?php echo $ketua['DosenNama'] ?>" readonly="">
                      </div>
                      <br>
                      <label>Anggota Penguji 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <?php 
                         $dosen1    = $mhs['SidangPenguji2'];
                         $sql      = "SELECT * FROM tdosen WHERE DosenId='$dosen1'";
                         $dosbing1 = $this->db->query($sql)->row_array();
                         ?>
                         <input class="form-control" value="<?php echo $dosbing1['DosenNama'] ?>" readonly="">
                      </div>
                      <br>
                      <label>Anggota Penguji 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <?php 
                         $tamu_p   = $mhs['SidangPenguji3'];
                         $sql      = "SELECT * FROM tdosen WHERE DosenId='$tamu_p'";
                         $tamu = $this->db->query($sql)->row_array();
                         ?>
                         <input class="form-control" value="<?php echo $tamu['DosenNama'] ?>" readonly="">
                      </div>
                      <br>
                      <label>Ruangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                         <?php
                         $idruang   = $mhs['SidangRuangId'];
                         $ruang = $this->db->query("SELECT * FROM truang WHERE RuangId ='$idruang'")->row_array();
                         ?>
                         <input type="text" name="jam" class="form-control" value="<?php echo $ruang['RuangNama'] ?>" readonly>
                      </div>
                  <div class="row">
                    <div class="col-6">
                      <br>
                      <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control daterange-cus" value="<?php echo $mhs['SidangTgl'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-6">
                      <br>
                      <label>Jam</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="jam" class="form-control" value="<?php echo $mhs['SidangJam']; ?>" readonly>
                      </div>
                    </div>
                  </div>
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>