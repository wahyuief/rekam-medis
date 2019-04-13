<div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medic Allya</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('medical-checkup') ?>">
          <i class="fas fa-fw fa-notes-medical"></i>
          <span>Medical Check Up</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('rekam-medis') ?>">
          <i class="fas fa-fw fa-file-medical"></i>
          <span>Rekam Medis</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataPasien" aria-expanded="true" aria-controls="DataPasien">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Pasien</span>
        </a>
        <div id="DataPasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('tambah/pasien') ?>">Tambah Pasien</a>
            <a class="collapse-item" href="<?php echo base_url('data/pasien') ?>">Data Pasien</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataObat" aria-expanded="true" aria-controls="DataObat">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Obat</span>
        </a>
        <div id="DataObat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('tambah/obat') ?>">Tambah Obat</a>
            <a class="collapse-item" href="<?php echo base_url('data/obat') ?>">Data Obat</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataDokter" aria-expanded="true" aria-controls="DataDokter">
          <i class="fas fa-fw fa-user-nurse"></i>
          <span>Dokter</span>
        </a>
        <div id="DataDokter" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('tambah/dokter') ?>">Tambah Dokter</a>
            <a class="collapse-item" href="<?php echo base_url('data/dokter') ?>">Data Dokter</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataPegawai" aria-expanded="true" aria-controls="DataPegawai">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Pegawai</span>
        </a>
        <div id="DataPegawai" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('tambah/pegawai') ?>">Tambah Pegawai</a>
            <a class="collapse-item" href="<?php echo base_url('data/pegawai') ?>">Data Pegawai</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">

              <div class="d-none d-sm-block"></div>

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('medhicallya')['nama'] ?></span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/avatar.png') ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('profile') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="<?php echo base_url('profile/password') ?>">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('keluar') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
