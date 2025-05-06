<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors') }}/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('vendors') }}/css/vendor.bundle.base.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors') }}/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('js') }}/select.dataTables.min.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css') }}/vertical-layout-light/style.css">
  <!-- Custom dark theme -->
  <link rel="stylesheet" href="{{ asset('css') }}/custom-dark.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body style="background-color: #ff0000; color: #fff;">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- Navbar Start -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #31302c; color: #fff; overflow: hidden;">
      <!-- Brand/logo -->
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-left" style="background-color: #31302c;">
        <a class="navbar-brand brand-logo mr-5" href="index.html">
          <img src="{{ asset('images') }}/logo.svg" class="mr-2" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{ asset('images') }}/logo-mini.svg" alt="logo" />
        </a>
      </div>
    
      <!-- Menu -->
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #31302c;">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu" style="color: #000000;"></span>
        </button>
    
        <!-- Search -->
        <!-- Search -->
<!-- Search -->
<ul class="navbar-nav mr-lg-2 ml-3">
  <li class="nav-item nav-search d-none d-lg-block">
    <div class="input-group" style="flex-grow: 1;">
      <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
        <span class="input-group-text" id="search" style="background-color: #ffffff; border: none;">
          <i class="icon-search" style="color: #31302c;"></i>
        </span>
      </div>
      <input type="text" class="form-control" id="navbar-search-input"
        placeholder="Search now" aria-label="search" aria-describedby="search"
        style="background-color: #000000; color: #31302c; border: none;">
    </div>
  </li>
</ul>
a

    
        <!-- Profile (Move this to the left) -->
        <ul class="navbar-nav navbar-nav-left""> <!-- Change navbar-nav-right to navbar-nav-left -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('images') }}/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="background-color: #31302c; color: #fff;">
              <a class="dropdown-item" style="color: #fff;">
                <i class="ti-settings" style="color: #fff;"></i> Settings
              </a>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #fff;">
                <i class="ti-power-off" style="color: #fff;"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrfa
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
<!-- Navbar End -->


    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="background-color: #ffffff; color: #fff; border-radius: 12px; overflow: hidden;">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings" style="color: #fff;"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close" style="color: #fff;"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle" style="background-color: #000000; border: none;"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" style="background-color: #000000; color: #000000; overflow: hidden;" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html" style="color: #ffffff;">
              <i class="icon-grid menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html" style="color: #fff;">
              <i class="icon-file menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Laporan Album</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html" style="color: #fff;">
              <i class="icon-paper menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Genre</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html" style="color: #fff;">
              <i class="icon-paper menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Menu Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html" style="color: #fff;">
              <i class="icon-file menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Laporan Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html" style="color: #fff;">
              <i class="icon-disc menu-icon" style="color: #ea6a69;"></i>
              <span class="menu-title">Menu Album</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
