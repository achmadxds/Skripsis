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


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
</head>

<body style="background:url(<?php echo base_url() ?>assets/img/umk/auth-bg.jpg) no-repeat center center;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- <div class="login-brand">
              <img src="<?php echo base_url() ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <div class="card card-primary">
              <div style="text-align: center;" class="card-header">
                <h4>Login</h4>
              </div>
              <?php
              // //notifikasi error
              // echo validation_errors('<div class="alert alert-warning">','</div>');

              //notifikasi gagal login
              if ($this->session->flashdata('salah')) {
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('salah');
                echo '</div>';
              }

              //notifikasi relog
              if ($this->session->flashdata('relog')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('relog');
                echo '</div>';
              }

              //notifikasi logout
              // if($this->session->flashdata('logout')) {
              //   echo '<div class="alert alert-info">';
              //   echo $this->session->flashdata('logout');
              //   echo '</div>';
              // }

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
              <?php
              }
              ?>

              <div class="card-body">
                <form name="s_login" action="<?= base_url('home/secure'); ?>" onsubmit="return login_s()" method="POST">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-id-card"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control phone-number " name="username">

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

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!--   <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> -->

              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
            <!-- <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div> -->
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