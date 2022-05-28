<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
          <input type="hidden" id="base" value="<?php echo base_url(); ?>">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <b><p align="left" style="color: white; position: relative; top: 9px;"><?php echo date('D d M Y'); ?></p></b>
        </form>
   <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('UserUsername'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url('secure/profil') ?>" class="dropdown-item has-icon" style="color: black;">
                <i class="far fa-user"></i>Profil
              </a>
              <button class="btn" onclick="exit_toast()" style="color: red; position: relative; left: 10px;"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</button>
            </div>
          </li>
        </ul>
      </nav>