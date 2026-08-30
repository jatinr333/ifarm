
<?php 

session_start();
if(!isset($_SESSION['name']))  
{
    header("Location: login.php");  
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>IndianFarmer Admin Panel | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" type="text/css" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet"  type="text/css" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
      
    </ul>  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link"  href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span >Logout</span>
        </a>  </li>
</ul>
    
    <!-- Right navbar links -->
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="https://aavpublisher.com/aavadmin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IndianFarmer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://aavpublisher.com/aavadmin/admin.jpg" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">Vilas Dongre</a>
        </div>
      </div>
       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/aavadmin/index.php" ? "active" : "");?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="publishing.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/ifarm/publishing.php" ? "active" : "");?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Publishing Files
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cover.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/ifarm/cover.php" ? "active" : "");?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 Change Cover Image
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="userjournals.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/ifarm/userjournals.php" ? "active" : "");?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  User Submitted Journals
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="changepass.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/ifarm/changepass.php" ? "active" : "");?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Change Password
              </p>
            </a>
          </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>