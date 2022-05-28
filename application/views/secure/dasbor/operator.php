<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>CEK Pendaftaran Skripsi</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($cek_skripsi): ?>
                      <?php echo $cek_skripsi ?>
                      <?php else: ?>
                      <?php echo 'Kosong' ?>
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>CEK Pendaftaran Seminar</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($cek_seminar): ?>
                      <?php echo $cek_seminar ?>
                      <?php else: ?>
                      <?php echo 'Kosong' ?>
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>CEK Pendaftaran Sidang</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($cek_sidang): ?>
                      <?php echo $cek_sidang ?>
                      <?php else: ?>
                      <?php echo 'Kosong' ?>
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pendaftaran Bebas Prodi</h4>
                  </div>
                  <div class="card-body">
                    <h6>
                      <?php if ($cek_bebas_prodi): ?>
                      <?php echo $cek_bebas_prodi ?>
                      <?php else: ?>
                      <?php echo 'Kosong' ?>
                      <?php endif ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
