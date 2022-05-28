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
                      <i class="fas fa-calendar-alt"></i> Jadwal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="nilai-tab5" data-toggle="tab" href="#nilai" role="tab" aria-controls="nilai" aria-selected="false">
                      <i class="fas fa-star"></i> Nilai</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent5">

<?php 
  $d1= $jadwal['SemproPenguji1'];
  $d2= $jadwal['SemproPenguji2'];
  $d3= $jadwal['SemproPenguji3'];
  $sql1 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d1'")->row_array();
  $sql2 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d2'")->row_array();
  $sql3 = $this->db->query(" SELECT * FROM tdosen WHERE DosenId='$d3'")->row_array();
 ?>
 <!--  -->
                  <div class="tab-pane fade show active" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab5">
 
                <p style="font-weight: bold;">Tanggal : <?php echo $jadwal['SemproTgl'] ?></p>
                <p style="font-weight: bold;">Ruangan : <?php echo $jadwal['RuangNama'] ?></p>
                <p style="font-weight: bold;">Jam : <?php echo $jadwal['SemproJam'] ?></p>
                <p style="font-weight: bold;">Penguji1 : <?php echo $sql1['DosenNama'] ?></p>
                <p style="font-weight: bold;">Penguji2 : <?php echo $sql2['DosenNama'] ?></p>
                <p style="font-weight: bold;">Penguji3 : <?php echo $sql3['DosenNama'] ?></p>
                  </div>
<!--  -->
                  <div class="tab-pane fade" id="nilai" role="tabpanel" aria-labelledby="nilai-tab5">
                    <div class="row">
                      <div class="col-6">
                         <?php if ($sempro['SemproHasil']==1): ?>
                         <p style="font-size: 15px;color: green;" align="left">
                         Hasil : Diterima/Lulus
                         </p>
                         <?php elseif ($sempro['SemproHasil']==2): ?>
                          <p style="font-size: 15px;color: red;" align="left">
                         Hasil : Ditolak/Tidak Lulus
                         </p>
                         <?php else: ?>
                         
                        <?php endif ?>
                      </div>

                      <?php if ($sempro['SemproHasil']==0): ?>
                      <?php else : ?>
                        <div class="col-6" align="right">
                         <div class="btn">
                          <a href="<?php echo base_url('mhs/nilai/cetak_berita_acara') ?>" target="_blank" title="cetak" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Berita Acara</a>
                         </div>
                        </div>
                      <?php endif ?>
                    </div>

                    <?php if ($sempro['SemproHasil']==0): ?>
                        <p style="font-weight: bold; text-align: center;">Seminar Belum Dilaksanakan</p>
                    <?php else : ?>
                    <div class="row">
                      <div class="col-lg-4 col-md-7">
                        <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Ketua Penguji</h6><br>
                         <p>&mdash; <?php echo $ketua['DosenNama'] ?></p>
                         <p>&mdash; revisi : <?php echo $ketua['DetsemKetRevisi'] ?></p>
                      </div>  
                    
                      <div class="col-lg-4 col-md-7">
                        <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Dosen Pembimbing 1</h6><br>
                         <p>&mdash; <?php echo $dosen1['DosenNama'] ?></p>
                         <p>&mdash; revisi : <?php echo $dosen1['DetsemKetRevisi'] ?></p>
                      </div>

                      <div class="col-lg-4 col-md-7">
                        <h6 style="color: #718eef; position: relative; left: 20px; top: 15px;">Dosen Pembimbing 2</h6><br>
                         <p>&mdash; <?php echo $dosen2['DosenNama'] ?></p>
                         <p>&mdash; revisi : <?php echo $dosen2['DetsemKetRevisi'] ?></p>
                      </div>
                    </div>
                      <?php endif ?>
                    
                  </div>
<!--  -->
                </div>
              </div>
            </div>
          </div>
        </div>
<?php } ?>