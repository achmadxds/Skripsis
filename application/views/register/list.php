<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shorcut icon" href="<?php echo base_url() ?>assets/img/umk/favicon-16x16.png">
  <title><?= $title  ?> &mdash; <?= $si ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ?>assets/dist/iziToast.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/iziToast.min.css">


</head>

<body style="background:url(<?php echo base_url() ?>assets/img/umk/register.png) no-repeat center center;">
  <?php if ($this->session->flashdata('simpan')) {
    echo $this->session->flashdata('simpan');
  } ?>

  <?php if ($this->session->flashdata('edit')) {
    echo $this->session->flashdata('edit');
  } ?>

  <?php if ($this->session->flashdata('hapus')) {
    echo $this->session->flashdata('hapus');
  } ?>

  <?php if (validation_errors()) {
    echo validation_errors();
  } ?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Pendaftaran</h4>
              </div>

              <div class="card-body">
                <form name="fdaftar" action="<?= base_url('home/register'); ?>" onsubmit="return daftar_form()" method="POST">

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nim">NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control number" name="nim">

                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="nama">Nama Lengkap</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="nama">

                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="form-group col-6">
                      <label for="nohp">No Hanphone</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-mobile-alt"></i>
                          </div>
                        </div>
                        <input min="12" class="form-control" name="nohp" onchange="changeNumber(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="13">
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="alamat">Alamat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" name="alamat">

                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input type="email" class="form-control" name="email">

                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="password">Password</label>
                      <div class="input-group ">
                        <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i onclick="showPassword1()" id="icon1" class="btn btn-sm fa fa-eye-slash"></i>
                          </div>
                        </div>

                      </div>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>

                    <!--  <div class="form-group col-6">
                      <label for="password2" >Konfirmasi Password</label>
                      <div class="input-group ">
                        <input id="password2" type="password" class="form-control" name="password-confirm" required>
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i onclick="showPassword2()" id="icon2" class="btn btn-sm fa fa-eye-slash"></i>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                         Silahkan Isi Password Anda
                      </div>
                      </div>
                    </div>-->
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                    <div align="center">
                      <br>
                      <label>Sudah Punya akun ? <a href="login">Ayo Login !</a></label>
                    </div>

                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; 2021 <div class="bullet"></div> Design By <a style="color: #1aa9f0;">CELTIC</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    function changeNumber(param) {
      let val = param.value;
      let explode = val.split('');
      explode[0] = '62';
      let imp = explode.join('');
      param.value = imp;
    }
  </script>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/sweetalert2.all.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/js/page/auth-register.js"></script>

</body>

</html>