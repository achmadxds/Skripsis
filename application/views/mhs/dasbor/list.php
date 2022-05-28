<div class="row">
  <div class="col-12 mb-4">
              <div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert" style="color: red;">
                    <span>&times;</span>
                    </button>
                      <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                          <h2>Selamat Datang, <?php echo $this->session->userdata('MhsNama'); ?></h2>
                          <p class="lead">Bagaimanapun sikap dosen pembimbing kamu, terima beliau apa adanya, ikuti perintahnya, serta tetap sabar dan lapang dada saat menghadapi beliau. Dengan begitu kemungkinan besar tugas akhir kamu lancar dan kamu cepat lulus. Semangat!!.</p>
                        </div>
                      </div>
                </div>
             </div>
  </div>
</div>

<div class="row">
  <?php if ($judul_skripsi['SkripsiJudul']!==null): ?>
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <p style="color: #4c9be4; font-size: 20px; font-weight: bold; bottom: 10px;"><?php echo $judul_skripsi['SkripsiJudul'] ?></p>
                  </div>
                </div>     
              </div>
  <?php endif ?> 


  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Status Akun</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($status_akun->MhsStatus==1): ?>
                      <p style="color: green; font-size: 14px;">Disetujui</p>
                      <?php else: ?>
                      <p style="color: orange; font-size: 14px;">Menunggu</p>  
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>

            <?php if ($semester) {?>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Semester</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($semester['DaftarsPeriodesId2']==null): ?>
                      <p style="color: black; font-size: 14px;">1</p>
                      <?php else: ?>
                      <p style="color: black; font-size: 14px;">2</p>  
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>



             <?php if ($daftar_skripsi) {?>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Pendaftaran Skripsi</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($daftar_skripsi->DaftarsStatus==1): ?>
                      <p style="color: green; font-size: 14px;">Disetujui</p>
                      <?php elseif($daftar_skripsi->DaftarsStatus==0): ?>
                      <p style="color: orange; font-size: 14px;">Menunggu</p> 
                      <?php else: ?>
                      <p style="color: red; font-size: 14px;">Perbaikan</p>  
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

            <?php if ($daftar_seminar) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Pendaftaran Seminar</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($daftar_seminar->DafsemStatus==1): ?>
                      <p style="color: green; font-size: 14px;">Disetujui</p>
                      <?php elseif($daftar_seminar->DafsemStatus==0): ?>
                      <p style="color: orange; font-size: 14px;">Menunggu</p> 
                      <?php else: ?>
                      <p style="color: red; font-size: 14px;">Perbaikan</p>  
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

            <?php if ($daftar_sidang) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Pendaftaran Sidang</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($daftar_sidang->DafsidStatus==1): ?>
                      <p style="color: green; font-size: 14px;">Disetujui</p>
                      <?php elseif($daftar_sidang->DafsidStatus==0): ?>
                      <p style="color: orange; font-size: 14px;">Menunggu</p> 
                      <?php else: ?>
                      <p style="color: red; font-size: 14px;">Perbaikan</p>  
                      <?php endif ?>         
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

            <?php if ($seminar) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Seminar</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($seminar->SemproHasil==1): ?>
                      <p style="color: green; font-size: 14px;">LULUS</p>
                      <?php elseif($seminar->SemproHasil==0): ?>
                      <p style="color: orange; font-size: 14px;">MENUNGGU</p> 
                      <?php else: ?>
                      <p style="color: red; font-size: 14px;">MENGULANG</p>  
                      <?php endif ?>         
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

            <?php if ($sidang) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Sidang</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($sidang->SidangHasil==1): ?>
                      <p style="color: green; font-size: 14px;">LULUS</p>
                      <?php elseif($sidang->SidangHasil==0): ?>
                      <p style="color: orange; font-size: 14px;">MENUNGGU</p> 
                      <?php else: ?>
                      <p style="color: red; font-size: 14px;">MENGULANG</p>  
                      <?php endif ?>         
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

            <?php if ($lulus_skripsi) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 style="color: black; font-size: 14px;">Status Skripsi</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($lulus_skripsi['DaftarsStatusAkhir']==1): ?>
                      <p style="color: green; font-size: 14px;">LULUS</p>
                      <?php else: ?>
                      <p style="color: yellow; font-size: 14px;">PROSES</p>  
                      <?php endif ?>  
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ } ?>

<!-- <?php 
$tanggal = $selisih_tanggal['PeriodesSelesai'];
$tanggal = new DateTime($tanggal); 

$sekarang = new DateTime();

$perbedaan = $tanggal->diff($sekarang);

//gabungkan
echo $perbedaan->y.' selisih tahun.';
echo $perbedaan->m.' selisih bulan.';
echo $perbedaan->d.' selisih hari.';
echo $perbedaan->h.' selisih jam.';
echo $perbedaan->i.' selisih menit.';
 ?> -->
          </div>
