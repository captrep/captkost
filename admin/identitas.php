<?php
session_start();
include("../lib/koneksi.php");
  $id = $_SESSION['id_admin'];
  $sql_admin = "SELECT * FROM admin WHERE id_admin = '$id'";
  $query_admin = mysqli_query($koneksi,$sql_admin);
  while($data_admin = mysqli_fetch_assoc($query_admin)){
    $id   = $data_admin['id_admin'];
    $nama = $data_admin['nama'];
    $gambar = $data_admin['gambar'];
  }
if (!isset($_SESSION['useradmin']) and !isset($_SESSION['passadmin'])) {
  header("location:login.php");
}else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>CaptKost - Admin Panel</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/faviconcapt.jpg" />


  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="index.php" class="logo">CaptKost</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
    <form class="searchform">
      <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span>
    </form>
    <!-- End Searchbox -->

    <!-- Start Top Menu -->
    <ul class="topmenu">
      <li><a href="#">Files</a></li>
      <li><a href="#">Authors</a></li>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Files <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Videos</a></li>
          <li><a href="#">Pictures</a></li>
          <li><a href="#">Blog Posts</a></li>
        </ul>
      </li>
    </ul>
    <!-- End Top Menu -->

    <!-- Start Top Right -->
    <ul class="top-right">
    <li class="dropdown link">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?=$gambar;?>" alt="img"><b><?= $nama;?> </b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li>
          <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li>
          <li><a href="#"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li>
          <li><a href="#"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<?php
  include ('sidebar.php');
?>
  
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->

  <!-- End Page Header -->


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<?php
  $id = $_GET['id_penghuni'];
  $sql = "SELECT p.id_penghuni,p.username,p.status,p.tgl_expired,i.nama,i.umur,i.pekerjaan,i.agama,i.jalan,i.desa,i.kecamatan,i.kabupaten,i.foto FROM penghuni p, identitas i WHERE i.id_penghuni='$id'";
  $query = mysqli_query($koneksi,$sql);
  $row = mysqli_fetch_assoc($query);
?>
<div class="container-no-padding">

  <!-- Start Social Profile -->
  <div class="social-profile">

    <!-- Start Top -->
    <div class="social-top">

      <div class="profile-left">
        <img src="../member/img/fotouser/<?=$row['foto'];?>" alt="img" class="profile-img">
        <h1 class="name"><?=$row['nama'];?></h1>
        <p class="profile-text">There can be no thought of finishing...</p>
      </div>


    </div>
    <!-- End Top -->

    <!-- Start Social Content -->
    <div class="social-content clearfix">
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Identitas Diri
        </div>

            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="input1" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="input1" value="<?=$row['nama'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Umur</label>
                  <input type="text" class="form-control" id="input2" value="<?=$row['umur'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Agama</label>
                  <input type="text" class="form-control" id="input2" name="umur" value="<?=$row['agama'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" id="input3" value="<?=$row['pekerjaan'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Jalan</label>
                  <input type="text" class="form-control" id="input3" value="<?=$row['jalan'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Desa</label>
                  <input type="text" class="form-control" id="input3" value="<?=$row['desa'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" id="input3" value="<?=$row['kecamatan'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kabupaten</label>
                  <input type="text" class="form-control" id="input3" value="<?=$row['kabupaten'];?>" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">Alamat Lengkap</label>
                  <textarea class="form-control" rows="3" id="textarea1" disabled><?=$row['jalan'] . " " .$row['desa'] . ", " . $row['kecamatan'] . ", " . $row['kabupaten'];?>, Indonesia</textarea>
                </div>
              </form>

            </div>

      </div>
    </div>
    </div>
    <!-- End Social Content -->

    </div>
</div>

<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- Start Footer -->
<?php
include "footer.php";
?>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEPANEL -->

<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="js/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- ================================================
Data Tables
================================================ -->
<script src="js/datatables/datatables.min.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="js/kode-alert/main.js"></script>

<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>


</body>
</html>

<?php
} ?>