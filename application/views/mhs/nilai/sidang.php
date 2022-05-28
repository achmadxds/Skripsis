<?php if ($jadwal==null) { ?>
<div align="center">
  <img src="<?php echo base_url()?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
</div>
<?php } else { ?>
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="jadwal-tab5" data-toggle="tab" href="#jadwal" role="tab" aria-controls="jadwal" aria-selected="true">
                          <i class="fas fa-calendar-alt"></i>Jadwal</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nilai-tab5" data-toggle="tab" href="#nilai" role="tab" aria-controls="nilai" aria-selected="false">
                          <i class="fas fa-star"></i>Nilai</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab5">
                        <?php 
  $d1= $jadwal['SidangPenguji1'];
  $d2= $jadwal['SidangPenguji2'];
  $d3= $jadwal['SidangPenguji3'];
  $sql1 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d1'")->row_array();
  $sql2 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d2'")->row_array();
  $sql3 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d3'")->row_array();
 ?>
                      <p style="font-weight: bold;">Tanggal : <?php echo $jadwal['SidangTgl'] ?></p>
                      <p style="font-weight: bold;">Ruangan : <?php echo $jadwal['RuangNama'] ?></p>
                      <p style="font-weight: bold;">Jam : <?php echo $jadwal['SidangJam'] ?></p>
                      <p style="font-weight: bold;">Ketua : <?php echo $sql1['DosenNama'] ?></p>
                      <p style="font-weight: bold;">Penguji 1 : <?php echo $sql2['DosenNama'] ?></p>
                      <p style="font-weight: bold;">Penguji 2 : <?php echo $sql3['DosenNama'] ?></p>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="nilai" role="tabpanel" aria-labelledby="nilai-tab5">
                        <?php if ($sidang['SidangHasil']==1): ?>
                     <p style="font-size: 15px;color: green;" align="right">
                     Hasil : Diterima/Lulus
                     </p>
                     <?php else: ?>
                     <p style="font-size: 15px;color: red;" align="right">
                     Hasil : Ditolak/Tidak Lulus
                     </p>
                    <?php endif ?>

                    <div class="row">
                    
                    <div class="col-4">
                    <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Ketua Penguji</h6>
                      <br>
                     <p>&mdash; <?php echo $ketua['DosenNama'] ?></p>

                     <p>&mdash; revisi : <?php echo $ketua['DetsidKetRevisi'] ?></p>
                    </div> 

                    <div class="col-4">
                    <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Anggota Penguji 1</h6>
                      <br>
                     <p>&mdash; <?php echo $dosen1['DosenNama'] ?></p>

                     <p>&mdash; revisi : <?php echo $dosen1['DetsidKetRevisi'] ?></p>
                    </div>

                    <div class="col-4">
                    <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Anggota Penguji 2</h6>
                      <br>
                     <p>&mdash; <?php echo $tamu['DosenNama'] ?></p>

                     <p>&mdash; revisi : <?php echo $tamu['DetsidKetRevisi'] ?></p>
                    </div>

                    
                    </div>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>