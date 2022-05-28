<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <input type="hidden" id="base" value="<?php echo base_url(); ?>">
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
      <b><p align="left" style="color: white; position: relative; top: 9px;"><?php echo date('D d M Y'); ?></p></b>
        </form>
<?php 
$periode = $this->db->query("SELECT * FROM tperiodes Where PeriodesStatusaktif =1")->row_array();
$tanggal = $periode['PeriodesSelesai'];
$tanggal = new DateTime($tanggal); 
$sekarang = new DateTime();
$perbedaan = $tanggal->diff($sekarang);
// echo $perbedaan->y.' selisih tahun.';
// echo $perbedaan->m.' selisih bulan.';
// echo $perbedaan->d.' selisih hari.';
// echo $perbedaan->h.' selisih jam.';
// echo $perbedaan->i.' selisih menit.';
 ?>
   <ul class="navbar-nav navbar-right">
    <!-- notif layout -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('MhsNama'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a  class="dropdown-item has-icon">
                <i class="far fa-clock"></i>Periode : <?php echo $perbedaan->m ?> bulan
              </a>
              <a href="<?php echo base_url('mhs/profil') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('home/mhs_logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      