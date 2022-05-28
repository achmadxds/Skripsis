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
        <a class="nav-link" href="<?php echo base_url('mhs/dasbor') ?>"><i class="fas fa-fire"></i> 
          <span>Halaman Utama</span>
        </a>      
      </li>
<!-- Pendaftaran -->
        <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'pendaftaran' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-file-alt"></i>
          <span>Pendaftaran</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'daftar_skripsi' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('mhs/pendaftaran/daftar_skripsi') ?>"><i class="fas fa-file"></i>
            <span>Daftar Skripsi</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'daftar_seminar' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('mhs/pendaftaran/daftar_seminar') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Seminar</span>
          </a>
        </li>
          <li <?php echo $this->uri->segment(3) == 'daftar_sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('mhs/pendaftaran/daftar_sidang') ?>"><i class="fas fa-file"></i> 
            <span>Daftar Sidang</span>
          </a>
        </li>
        </ul>
        </li>
<!-- Jadwal Bimbingan -->
      <li <?php echo $this->uri->segment(3) == 'bimbingan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('mhs/jadwal/bimbingan') ?>"><i class="fas fa-calendar-week"></i> 
          <span>Jadwal Bimbingan</span>
        </a>      
      </li>
<!-- Bimbingan -->
      <li <?php echo $this->uri->segment(2) == 'bimbingan' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('mhs/bimbingan') ?>"><i class="fas fa-scroll"></i> 
          <span>Bimbingan</span>
        </a>      
      </li>
<!-- nilai -->
      <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'add' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-star"></i>
          <span>Nilai Sidang</span>
        </a>
        <ul class="dropdown-menu">
         <li <?php echo $this->uri->segment(3) == 'seminar' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('mhs/nilai/seminar') ?>"><i class="fas fa-font"></i>
            <span>Seminar Proposal</span>
          </a>
        </li>
         <li <?php echo $this->uri->segment(3) == 'sidang' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('mhs/nilai/sidang') ?>"><i class="fas fa-file-alt"></i> 
            <span>Sidang Skripsi</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'nilai_akhir' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('mhs/nilai/nilai_akhir') ?>"><i class="fas fa-file-alt"></i> 
            <span>Nilai Akhir</span>
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
         <li <?php echo $this->uri->segment(3) == 'judul_skripsi' ? 'class="active"' : '' ?>>
         <a class="nav-link" href="<?php echo base_url('mhs/skripsi/judul_skripsi') ?>"><i class="fas fa-font"></i>
            <span>Judul Skripsi</span>
          </a>
        </li>
        <li <?php echo $this->uri->segment(3) == 'bebas_skripsi' ? 'class="active"' : '' ?>>
           <a class="nav-link" href="<?php echo base_url('mhs/skripsi/bebas_prodi') ?>"><i class="fas fa-file-upload"></i> 
            <span>Bebas Prodi</span>
          </a>
        </li>
        </ul>
        </li>    
<!-- profil -->
      <li <?php echo $this->uri->segment(2) == 'profil' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="<?php echo base_url('mhs/profil') ?>"><i class="fas fa-id-card-alt"></i> 
          <span>Profil</span>
        </a>      
      </li>
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

<?php if ($this->session->flashdata('hapus')) 
{ echo $this->session->flashdata('hapus'); }?>

<?php if (validation_errors()) 
{ echo validation_errors(); }?>