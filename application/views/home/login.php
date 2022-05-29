<?php
  if($this->session->userdata('MhsNim') != null) { // Ada Login Mahasiswa
    redirect('mhs/dasbor');
  } else if($this->session->userdata('UserLevelAktif') != null) { // belum login samsek
    redirect('secure/dasbor/'.$this->session->userdata('UserLevelAktif'));
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shorcut icon" href="<?php echo base_url() ?>assets/img/umk/favicon-16x16.png">
  <!-- <title><?php echo $title ?> &mdash; <?= $si ?></title> -->
  <title>Login &mdash; Skripsi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/bootstrap-social/bootstrap-social.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ?>assets/dist/iziToast.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
</head>

<body>

  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <div align="center">
              <img src="<?php echo base_url() ?>assets/img/umk/android-chrome-192x192.png" alt="logo" height="100px" width="100px" class="shadow-light rounded-circle mb-3 mt-2">

              <h4 class="text-dark font-weight-normal">
                <span class="font-weight-bold">Portal Skripsi <br> Sistem Informasi</span>
              </h4>

              <?php
              // //notifikasi error
              // echo validation_errors('<div class="alert alert-warning">','</div>');

              //notifikasi gagal login
              if ($this->session->flashdata('salah')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('salah');
                echo '</div>';
              }

              //notifikasi berhasil register
              if ($this->session->flashdata('login')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('login');
                echo '</div>';
              }

              //notifikasi relog
              if ($this->session->flashdata('relog')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('relog');
                echo '</div>';
              }


              ?>

              <?php
              if ($this->session->flashdata('logout')) { ?>
                <div class="alert alert-info alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <?php
                    echo $this->session->flashdata('logout');
                    ?>
                  </div>
                </div>
              <?php } ?>

            </div>
            <form name="mhs_login" action="<?= base_url('home/login'); ?>" onsubmit="return login_mhs()" method="POST">
              <div class="form-group">
                <label for="nim">NIM</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-id-card"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control phone-number " name="nim">

                </div>
              </div>

              <div class="form-group">
                <label for="password2" class="d-block">Password</label>
                <div class="input-group">
                  <input id="password2" type="password" class="form-control" name="password">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="btn btn-sm" onclick="showPassword2()"><i id="icon2" class="fa fa-eye-slash"></i></div>
                    </div>
                  </div>

                </div>
              </div>


              <!-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div> -->

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Belum Punya Akun ? <a href="register">Ayo Daftar !</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; 2021 <div class="bullet"></div> Design By <a style="color: #1aa9f0;">CELTIC</a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url() ?>assets/img/umk/lobby2.jpg">

          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 align="center" class="mb-2 display-4 font-weight-bold" style="color: white;">Selamat Datang </h1>
                <h5 align="left" class="font-weight-normal text-muted-transparent">Kudus, Indonesia</h5>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/sweetalert2.all.min.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>