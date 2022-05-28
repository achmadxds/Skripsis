<!-- ambil semua akses yg ada ditable -->
<?php 
$sql ="SELECT * FROM tauth where Iduser =  ".$this->session->userdata('UserId'); 
$auth = $this->db->query($sql);
// echo "<pre>";
// print_r ($query->result());
// exit();
?>

<!-- ambil level yang aktif -->
<?php 
$sql1 ="SELECT UserLevelAktif FROM tuser where UserId =  ".$this->session->userdata('UserId'); 
$level = $this->db->query($sql1)->row_array();
?>

<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mt-2">
       <img src="<?php echo base_url() ?>assets/img/umk/android-chrome-192x192.png" height="65px" width="65px" alt="logo" >
            <h6>Portal Skripsi <br> Sistem Informasi</h6>
    </div>
    <div class="sidebar-brand sidebar-brand-sm" align="center">
      <a href="<?php echo base_url() ?>assets/stisla/pages/index.html">PS</a>
    </div>
    <hr>
    <ul class="sidebar-menu">
      <li <?php echo $this->uri->segment(2) == 'dasbor' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/dasbor/'.$level['UserLevelAktif']) ?>"><i class="fas fa-fire"></i> 
          <span>Halaman Utama</span>
        </a>      
      </li>

<li class="menu-header">MENU <?php echo $level['UserLevelAktif'] ?></li>
<!-- Koordinator -->
<?php if ($level['UserLevelAktif'] == 'koordinator') { ?>
      <!-- Periode -->
      <li <?php echo $this->uri->segment(2) == 'periode' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/periode') ?>"><i class="fas fa-stopwatch"></i> 
          <span>Periode</span>
        </a>      
      </li>
       <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'master' || $this->uri->segment(2) == 'add' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-database"></i>
          <span>Master</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'dosen' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/master/dosen') ?>"><i class="fas fa-user-tie"></i>
            <span>Dosen</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'koordinator' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/master/koordinator') ?>"><i class="fas fa-user-tie"></i>
            <span>Koordinator</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'kaprodi' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/master/kaprodi') ?>"><i class="fas fa-user-tie"></i>
            <span>Kaprodi</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'operator' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/master/operator') ?>"><i class="fas fa-user-astronaut"></i> 
            <span>Operator</span>
          </a>
        </li>
          <li <?php echo $this->uri->segment(3) == 'mahasiswa' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/master/mahasiswa') ?>"><i class="fas fa-user-graduate"></i> 
            <span>Mahasiswa</span>
          </a>
        </li>
        </ul>
        </li>

        <!-- Cek Berkas -->
        <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'pendaftaran' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-tasks"></i>
          <span>Cek Berkas</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'daftar_skripsi' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_skripsi') ?>"><i class="fas fa-file"></i>
            <span>Daftar Skripsi</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'daftar_seminar' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_seminar') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Seminar</span>
          </a>
        </li>
          <li <?php echo $this->uri->segment(3) == 'daftar_sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_sidang') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Sidang</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'bebas_skripsi' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/bebas_prodi') ?>"><i class="fas fa-file"></i> 
            <span>Bebas Prodi</span>
          </a>
        </li>
        </ul>
        </li>
        <!-- Bagi Pembimbing -->
        <li <?php echo $this->uri->segment(3) == 'bagi_dosbing' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/bimbingan/bagi_dosbing') ?>"><i class="fas fa-user-tie"></i> 
          <span>Bagi Pembimbing</span>
        </a>      
      </li>
        <!-- Penjadwalan -->
        <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jadwal' || $this->uri->segment(2) == 'add' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-calendar-alt"></i>
          <span>Pendajwalan</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'seminar' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/jadwal/seminar') ?>"><i class="fas fa-font"></i>
            <span>Seminar Proposal</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/jadwal/sidang') ?>"><i class="fas fa-file-alt"></i> 
            <span>Sidang Skripsi</span>
          </a>
        </li>
        </ul>
        </li>
        <!-- Skripsi -->
      <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'skripsi' || $this->uri->segment(2) == 'add' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-graduation-cap"></i>
          <span>Skripsi</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'judul' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/skripsi/judul') ?>"><i class="fas fa-font"></i>
            <span>Judul Skripsi</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'nilai_seminar' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/skripsi/nilai_seminar') ?>"><i class="fas fa-file-alt"></i> 
            <span>Hasil Seminar</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'nilai_sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/skripsi/nilai_sidang') ?>"><i class="fas fa-file-alt"></i> 
            <span>Hasil Sidang</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'nilai_akhir' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/skripsi/nilai_akhir') ?>"><i class="fas fa-file-alt"></i> 
            <span>Nilai Akhir</span>
          </a>
        </li>
          <li <?php echo $this->uri->segment(3) == 'penilaian' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/skripsi/penilaian') ?>"><i class="fas fa-star"></i> 
            <span>Kriteria Penilaian</span>
          </a>
        </li>
        </ul>
        </li>
        <!-- Monitoring -->
      <li <?php echo $this->uri->segment(2) == 'monitoring' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/monitoring') ?>"><i class="fas fa-tv"></i> 
          <span>Monitoring</span>
        </a>      
      </li>
      <!-- Laporan -->
        <li <?php echo $this->uri->segment(3) == 'laporan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/laporan') ?>"><i class="fas fa-chart-bar"></i> 
          <span>Laporan</span>
        </a>      
      </li>
        <!-- Ruangan -->
        <li <?php echo $this->uri->segment(2) == 'ruangan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/ruangan') ?>"><i class="fas fa-door-open"></i> 
          <span>Ruangan</span>
        </a>      
      </li> 
     
      <!-- User -->
      <li <?php echo $this->uri->segment(2) == 'user' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/user') ?>"><i class="fas fa-user"></i> 
          <span>User</span>
        </a>      
      </li>
      
<?php } ?>

<!-- Dosen -->
<?php if ($level['UserLevelAktif'] == 'dosen') { ?>
      <li <?php echo $this->uri->segment(3) == 'bimbingan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/jadwal/bimbingan') ?>"><i class="fas fa-calendar-alt"></i> 
          <span>Jadwal Bimbingan</span>
        </a>      
      </li>

      <li <?php echo $this->uri->segment(3) == 'mahasiswa' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/bimbingan/mahasiswa') ?>"><i class="fas fa-graduation-cap"></i> 
          <span>Mahasiswa Bimbingan</span>
        </a>      
      </li>

      <li <?php echo $this->uri->segment(3) == 'proses_bimbingan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/bimbingan/proses_bimbingan') ?>"><i class="fas fa-scroll"></i> 
          <span>Bimbingan</span>
        </a>      
      </li>

      <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'add' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-star"></i>
          <span>Penilaian</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'seminar' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/nilai/seminar') ?>"><i class="fas fa-font"></i>
            <span>Seminar Proposal</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/nilai/sidang') ?>"><i class="fas fa-file-invoice"></i> 
            <span>Sidang Skripsi</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'nilai_akhir' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/nilai/nilai_akhir') ?>"><i class="fas fa-graduation-cap"></i> 
            <span>Nilai Akhir</span>
          </a>
        </li>
        </ul>
        </li>
  <?php } ?>

<!-- Kaprodi -->
<?php if ($level['UserLevelAktif'] == 'kaprodi') { ?>
      <li <?php echo $this->uri->segment(2) == 'monitoring' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/monitoring') ?>"><i class="fas fa-tv"></i> 
          <span>Monitoring</span>
        </a>      
      </li>

      <li <?php echo $this->uri->segment(2) == 'laporan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('secure/laporan') ?>"><i class="fas fa-chart-bar"></i> 
          <span>Laporan</span>
        </a>      
      </li>
  <?php } ?>

<!-- Operator -->
  <?php if ($level['UserLevelAktif'] == 'operator') { ?>
     <!-- Cek Berkas -->
        <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'pendaftaran' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-tasks"></i>
          <span>Cek Berkas</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'daftar_skripsi' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_skripsi') ?>"><i class="fas fa-file"></i>
            <span>Daftar Skripsi</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'daftar_seminar' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_seminar') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Seminar</span>
          </a>
        </li>
          <li <?php echo $this->uri->segment(3) == 'daftar_sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/daftar_sidang') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Sidang</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'bebas_skripsi' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('secure/pendaftaran/bebas_prodi') ?>"><i class="fas fa-file"></i> 
            <span>Bebas Prodi</span>
          </a>
        </li>
        </ul>
        </li>
  <?php } ?>     

 <?php  if(count($auth->result())>1){ ?>
  <li class="menu-header">Hak Akses</li>
<?php 
foreach ($auth->result() as $key => $akses) {
      $active = $level['UserLevelAktif'] == $akses->Namalevel ? 'class="active"' : '';
?>
      <li <?php echo $active ?>>
        <a class="nav-link" href="<?php echo base_url('secure/akses/auth/'.$akses->Namalevel) ?>">

          <?php 
          if ($akses->Namalevel=='dosen') { ?>
            <i class="fas fa-user-tie"></i>
          <?php
          } elseif ($akses->Namalevel=='koordinator') { ?>
            <i class="fas fa-user-cog"></i>
          <?php
          }elseif ($akses->Namalevel=='kaprodi') { ?>
            <i class="fas fa-chalkboard-teacher"></i>
          <?php
          }elseif ($akses->Namalevel=='operator') { ?>
            <i class="fas fa-user-astronaut"></i>
          <?php }  ?>

          <span><?php echo $akses->Namalevel ?></span>
        </a>      
      </li>
<?php } ?>
      </li>
 <?php } ?>
       </ul>        
 </aside>
</div>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title ?></h1>
    </div>
    <div class="section-body">
<?php if ($this->session->flashdata('simpan')) 
{ echo $this->session->flashdata('simpan'); }?>
<?php if ($this->session->flashdata('edit')) 
{ echo $this->session->flashdata('edit'); }?>
<?php if ($this->session->flashdata('acc')) 
{ echo $this->session->flashdata('acc'); }?>
<?php if ($this->session->flashdata('hapus')) 
{ echo $this->session->flashdata('hapus'); }?>
<?php if (validation_errors()) {
 echo validation_errors();}?>