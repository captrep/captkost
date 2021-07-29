<?php
session_start();
include("../lib/koneksi.php");
  $id = $_SESSION['id_penghuni'];
  $status = $_SESSION['status'];
    
if  (!isset($_SESSION['username']) and !isset($_SESSION['password']))  {
  header("location:login.php");
}elseif($status == "Deactivated"){
  header("location:deactivated.php");
}elseif($status == "New"){
  header("location:new.php");
}else {
  include("durasi.php");
  include("check.php");
  $sql_user = "SELECT p.username,p.status,p.tgl_expired,i.nama,i.umur,i.pekerjaan,i.agama,i.jalan,i.desa,i.kecamatan,i.kabupaten,i.foto FROM penghuni p, identitas i WHERE p.id_penghuni=i.id_penghuni AND i.id_penghuni='$id'";
  $query_user = mysqli_query($koneksi,$sql_user);
  $data_user = mysqli_fetch_assoc($query_user);

    $username = $data_user['username'];
    $nama     = $data_user['nama'];
    $foto     = $data_user['foto'];
    $status   = $data_user['status'];
    $durasi   = durasi($username);
    denda($durasi,$username);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>CaptKost - Member Area</title>

  <!-- ========== Css Files ========== -->
  <link href="../admin/css/root.css" rel="stylesheet">
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
    <!-- End Top Menu -->

    <!-- Start Top Right -->
    <ul class="top-right">
    <li class="dropdown link">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/fotouser/<?=$foto;?>" alt="img"><b><?= $nama;?> </b><span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="profile.php"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <li><a href="action/logout.php"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
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
  <div class="page-header">
    <h1 class="title">Tiket Saya</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Tiket Saya</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Dashboard</a>
        <a href="" class="btn btn-light"><i class="fa fa-refresh"></i></a>
      </div>
    </div>

  </div>
  <!-- End Page Header -->

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-default">
  <br><br>
  <div class="panel panel-default">
    <div class="panel-body table-responsive">
      <table class="table table-hover"> 
              <thead>
                <tr>
                  <td width="20%">Tgl/Waktu Dibuat</td>
                  <td>Subjek</td>
                  <td>Status</td>
                  <td class="text-center">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query  = mysqli_query($koneksi,"SELECT * FROM ticket WHERE pembuat = '$username' ORDER BY id_ticket DESC");
                  while($row=mysqli_fetch_assoc($query)) :?>
                <tr>
                  <td><?= $row['tanggal']." ".$row['jam'];?> WIB</td>
                  <td><?= $row['subjek'];?></td>
                  
                  <td>
                  <?php
                  if ($row['status'] == "Opened") {
                    $type = "default";
                  }else if ($row['status'] == "Closed"){
                    $type = "danger";
                  }
                  ?>
                  <span class="label label-<?= $type;?>"><?= $row['status'];?></span>
                  </td>
                  <?php
                  if ($row['status'] == "Closed") : ?>
                  <td><button type="button" class="btn btn-success btn-block" disabled><i class="fa fa-archive"></i>Tiket sudah ditutup</button></td>
                  <?php 
                  else : ?>
                  <div class="btn-group">
                  <td class="text-right">
                        <a href="balastiket.php?id_ticket=<?=$row['id_ticket'];?>" class="btn btn-primary btn-block"><i class="fa fa-mail-reply"></i>Lihat Tiket</a>
                  </td>
                  </div>
                  <?php endif;?>
                </tr>
                <?php endwhile ?>
              </tbody>
            </table>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br>
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
<script type="text/javascript" src="../admin/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="../admin/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="../admin/js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="../admin/js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="../admin/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>


<!-- ================================================
Data Tables
================================================ -->
<script src="../admin/js/datatables/datatables.min.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="../admin/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="../admin/js/kode-alert/main.js"></script>

<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="../admin/js/jquery-ui/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="../admin/js/moment/moment.min.js"></script>





</body>
</html>

<?php
} ?>