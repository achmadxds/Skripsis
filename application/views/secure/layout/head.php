<?php
  if($this->session->userdata('UserLevelAktif') == null && $this->session->userdata('MhsNim') != null) { // Ada Login Mahasiswa
    redirect('mhs/dasbor');
  } else if($this->session->userdata('UserLevelAktif') == null) { // belum login samsek
    redirect('home/secure');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shorcut icon"  href="<?php echo base_url() ?>assets/img/umk/favicon-16x16.png">
  <title><?php echo $title ?>  &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>vendor/stisla/node_modules/bootstrap-daterangepicker/daterangepicker.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ?>assets/dist/iziToast.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/iziToast.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <!-- <script src="https://kit.fontawesome.com/10ac531b4d.js" crossorigin="anonymous"></script> -->
  
  </head>