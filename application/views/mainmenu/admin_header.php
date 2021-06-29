<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="manifest" href="/manifest.json">

  <title>Rest | Sistem Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/adminlte.min.css'?>">
  <!-- jQuery -->
  <script src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js'?>"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url().'assets/img/AdminLTELogo.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rest</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <h4 style="color: #d6d7d8; margin-left: 1%;"><?php echo $this->session->userdata('nama');?></h4>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if(($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '10')):?>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('Administrator');?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Administrator/laporan')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laporan
              </p>
            </a>
          </li> -->
          <li class="nav-header"><h6>PRODUK</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Administrator/produk');?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Inventori
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Administrator/stok')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Administrator/stok_in')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Administrator/stok_out')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"><h6>PENGATURAN</h6></li>
          <?php if($this->session->userdata('akses') == '1'):?>
          <li class="nav-item">
            <a href="<?php echo base_url('Administrator/akun');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a href="<?php echo base_url('Welcome/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Keluar</p>
            </a>
          </li>
          <?php endif;?>

          <!-- Batas level dapur bersih -->

          <?php if($this->session->userdata('akses') == '11'):?>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('Bersih');?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/laporan')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laporan
              </p>
            </a>
          </li> -->
          <li class="nav-header"><h6>ORDER</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/order')?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Order
              </p>
            </a>
          </li>
          <li class="nav-header"><h6>PRODUK</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Administrator/produk');?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Inventori Bahan Baku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Bersih/stok')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Bersih/stok_in')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Bersih/stok_out')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"><h6>Pembukuan</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Kasir/pengeluaran')?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Keuangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Kasir/pos')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/laba');?>" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Laba Harian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/laba_resmi');?>" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Laba
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/stok_terjual');?>" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Laporan Stok
              </p>
            </a>
          </li>
          <li class="nav-header"><h6>PENGATURAN</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Welcome/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Keluar</p>
            </a>
          </li>
          <?php endif;?>

          <!-- Batas kasir -->

          <?php if($this->session->userdata('akses') == '12'):?>
          <li class="nav-item">
            <a href="<?php echo base_url('Kasir');?>" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Tambah Order
              </p>
            </a>
          </li>
          <li class="nav-header"><h6>Order & Stok</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Kasir/order')?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Bersih/stok')?>" class="nav-link">
              <i class="fas fa-layer-group nav-icon"></i>
              <p>
                Stok Tersedia
              </p>
            </a>
          </li>
          <li class="nav-header"><h6>Pembukuan</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Kasir/laporan_penjualan');?>" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Laporan Penjualan
              </p>
            </a>
          </li>
          <li class="nav-header"><h6>PENGATURAN</h6></li>
          <li class="nav-item">
            <a href="<?php echo base_url('Welcome/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Keluar</p>
            </a>
          </li>
          <?php endif;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


