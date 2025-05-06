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
  <link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('js') }}/select.dataTables.min.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css') }}/vertical-layout-light/style.css">
  <!-- Custom Dark Theme -->
  <link rel="stylesheet" href="{{ asset('css') }}/custom-dark.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body style="background-color: #000; color: #000000;">
  <div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #000; color: #121212;">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #000;">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('images') }}/logo.svg" class="mr-2" alt="logo" style="filter: brightness(0) invert(1);"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images') }}/logo-mini.svg" alt="logo" style="filter: brightness(0) invert(1);"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu" style="color: #000000;"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search" style="color: #000000;"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto"> <!-- This moves the profile section to the right -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('images') }}/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="background-color: #111; color: #fff;">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
          </li>
        </ul>
        
      </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid page-body-wrapper" style="background-color: #000;">
      <!-- Theme Settings Panel -->
     

      <!-- Sidebar -->
    

      <!-- Main Panel -->
      <div class="main-panel">
        <!-- Your content goes here -->

        <!-- Footer -->
        <footer class="footer" style="background-color: #000; color: #fff;">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank" style="color: #ccc;">Bootstrap admin template</a> from BootstrapDash.
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
              Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>
            </span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              Distributed by <a href="https://www.themewagon.com/" target="_blank" style="color: #ccc;">Themewagon</a>
            </span>
          </div>
        </footer>

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors') }}/js/vendor.bundle.base.js"></script>
  <!-- Plugin js -->
  <script src="{{ asset('vendors') }}/chart.js/Chart.min.js"></script>
  <script src="{{ asset('vendors') }}/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('vendors') }}/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- Custom js -->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
</body>

</html>
