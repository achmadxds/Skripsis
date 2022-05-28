<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="belum-tab5" data-toggle="tab" href="#belum" role="tab" aria-controls="belum" aria-selected="true">
                          <i class="fas fa-clock"></i> Belum dapat Pembimbing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="sudah-tab5" data-toggle="tab" href="#sudah" role="tab" aria-controls="sudah" aria-selected="false">
                          <i class="fas fa-user-friends"></i> Sudah Dapat Pembimbing</a>
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
                        <?php $no=1; foreach ($mhs_belum as $mhs) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->DaftarsNIM ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td>
                        <div class="buttons">
                            <a data-toggle="modal" data-target="#modaladd_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/bimbingan/tambah_dosbing/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
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
                        <?php $no=1; foreach ($mhs_sudah as $mhs) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->MhsNim ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td>
                        <div class="buttons">
                            <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/bimbingan/edit_dosbing/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-md  btn-icon btn-info">
                                <i class="far fa-edit"></i>
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

<?php foreach ($edit as $mhs) {?>
<!-- Modal Edit Mahasiswa-->
 <form action="<?php echo base_url('secure/bimbingan/edit_dosbing'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Dosen Pembimbing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">

        <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsId']) ?>">
                  <div class="row">
                    <div class="col-6">
                      <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled="" >
                      </div>
                    </div>
                    <div class="col-6">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim"type="text" class="form-control" value="<?php echo $mhs['MhsNim'] ?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control daterange-cus" value="<?php echo $mhs['MhsNama'] ?>" disabled="">
                      </div>
                      <br>
                      <label>Dosen Pembimbing 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing1" class="form-control">
                   <?php 
                   $dosen1   = $mhs['DosbingsDosenId1'];
                   $sql      = "SELECT tdosbings.*, tdosen.DosenNama,tdosen.DosenId
                               FROM tdosbings
                               JOIN tdosen ON tdosen.DosenId = tdosbings.DosbingsDosenId1
                               WHERE tdosbings.DosbingsDosenId1='$dosen1'";
                   $dosbing1 = $this->db->query($sql)->row_array();

                   $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$dosen1' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                   $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId  join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$dosen1' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                   ?>  

                  <option value="<?php echo $this->enkripsi->encrypt_url($dosbing1['DosenId']);?>" selected><?php echo $dosbing1['DosenNama'] ?>
                    (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                  </option>

                  <?php  
                  $edit_dosbing1=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();
                  ?>

                  <?php foreach ($edit_dosbing1 as $edit_dosbing1 ) { ?>
                        <?php 
                        $id_dosen = $edit_dosbing1['DosenId'];
                        $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                        $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                        ?>
                  <option 
                  value="<?php echo $this->enkripsi->encrypt_url($edit_dosbing1['DosenId']);?>"><?php echo $edit_dosbing1['DosenNama'];?>
                  (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                  </option>
                  <?php } ?>
                        
                      </select>
                      </div>
                      <br>
                      <label>Dosen Pembimbing 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing2" class="form-control">
                   <?php 
                   $dosen2    = $mhs['DosbingsDosenId2'];
                   $sql      = "SELECT tdosbings.*, tdosen.DosenNama,tdosen.DosenId
                               FROM tdosbings
                               JOIN tdosen ON tdosen.DosenId = tdosbings.DosbingsDosenId2
                               WHERE tdosbings.DosbingsDosenId2='$dosen2'";
                   $dosbing2 = $this->db->query($sql)->row_array();

                   $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$dosen2' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                   $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$dosen2' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                   ?>  

                  <option value="<?php echo $this->enkripsi->encrypt_url($dosbing2['DosenId']);?>" selected><?php echo $dosbing2['DosenNama'] ?>
                    (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                  </option>

                  <?php  $edit_dosbing2=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();
                  ?>

                  <?php foreach ($edit_dosbing2 as $edit_dosbing2 ) {?>
                        <?php 
                        $id_dosen = $edit_dosbing2['DosenId'];
                        $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                        $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                        ?>
                  <option 
                  value="<?php echo $this->enkripsi->encrypt_url($edit_dosbing2['DosenId']);?>"><?php echo $edit_dosbing2['DosenNama'];?>
                  (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                  </option>
                  <?php } ?>
                      </select>
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




<?php foreach ($tambah as $mhs) {?>
<!-- Modal tambah -->
 <form action="<?php echo base_url('secure/bimbingan/tambah_dosbing'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dosen Pembimbing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
<input type="hidden" name="id" id="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsId']) ?>">
                  <div class="row">
                    <div class="col-6">
                      <label>Tanggal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <input name="tgl" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled="" >
                      </div>
                    </div>
                    <div class="col-6">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim"type="text" class="form-control" value="<?php echo $mhs['MhsNim'] ?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control daterange-cus" value="<?php echo $mhs['MhsNama'] ?>" disabled="">
                      </div>
                      <br>
                      <label>Dosen Pembimbing 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select onchange="dosbing1(this);" name="dosbing1" id="dosbing1_<?php echo $mhs['DaftarsId'] ?>" class="form-control">
                        <option value="" disabled selected>Pilih Pembimbing 1</option>
                        <?php  $dosbing=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>
                          <?php foreach ($dosbing as $dosbing ) {?>
                            <?php 
                            $id_dosen = $dosbing['DosenId'];
                            $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                            $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId  join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array();  
                             ?>
                          <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosbing['DosenId']);?>"><?php echo $dosbing['DosenNama'];?>
                               (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                          </option>
                           <?php } ?>
               
                        ?>
                      </select>
                      </div>
                      <br>
                      <label>Dosen Pembimbing 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosbing2" id="dosbing2_<?php echo $mhs['DaftarsId'] ?>" class="form-control">
                        <option value="" disabled selected>Pilih Pembimbing 2</option>
                        <?php  $dosbing=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();  ?>

                          <?php foreach ($dosbing as $dosbing ) {?>
                            <?php 
                            $id_dosen = $dosbing['DosenId'];
                            $p1  = $this->db->query("SELECT DISTINCT count(*) AS p1 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId1=tdosen.DosenId join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array(); 
                            $p2  = $this->db->query("SELECT DISTINCT count(*) AS p2 FROM tdosen join tdosbings on tdosbings.DosbingsDosenId2=tdosen.DosenId  join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId where tdosen.DosenId = '$id_dosen' and tdaftars.DaftarsStatusAkhir = 0")->row_array();  
                             ?>
                          <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosbing['DosenId']);?>"><?php echo $dosbing['DosenNama'];?>
                               (<?php echo $p1['p1'] ?>) (<?php echo $p2['p2'] ?>)
                          </option>
                           <?php } ?>
                        ?>
                      </select>
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