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
}else{
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
      <a href="index.html" class="logo">CaptKost</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->

    <!-- End Searchbox -->

    <!-- Start Top Menu -->
    <!-- End Top Menu -->

    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="add_kamar.php"><i class="fa falist fa-paper-plane-o"></i>Kamar</a></li>
          <li><a href="add_method.php"><i class="fa falist fa-font"></i>Method Pembayaran</a></li>
          <li><a href="broadcast.php"><i class="fa falist fa-file-image-o"></i>Pesan Siaran/Broadcast</a></li>
        </ul>
    </li>



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
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">This is a quick overview of some features</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="" class="btn btn-light">Dashboard</a>
        <a href="" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">

  <!-- Start Top Stats -->
  <div class="col-md-12">
  <ul class="topstats clearfix">
    <li class="arrow"></li>
    <li class="col-xs-6 col-lg-3">
      <?php
      $sql = mysqli_query($koneksi,"SELECT SUM(jumlah) as total FROM pembayaran WHERE status ='success'");
      $rows = mysqli_fetch_array($sql,MYSQLI_ASSOC);
      ?>
      <span class="title"><i class="fa fa-dot-circle-o"></i> Total Pembayaran Diterima</span>
      <h3 class="color-up"><?= "Rp." . number_format($rows['total']);?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 100%</b> Mantap Dong</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <?php
        $bulan = date("m");
        $sqla =mysqli_query($koneksi,"SELECT SUM(jumlah) as totalbulan FROM pembayaran WHERE DATE_FORMAT((tanggal),'%m') like '%$bulan%' AND status ='success' order by tanggal asc");
        $row = mysqli_fetch_array($sqla,MYSQLI_ASSOC);
      ?>
      <span class="title"><i class="fa fa-calendar-o"></i> Bulan Ini</span>
      <h3><?= "Rp." . number_format($row['totalbulan']);?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 100%</b> Mantap Dong</span>
    </li>
    <li class="col-xs-6 col-lg-3">
      <span class="title"><i class="fa fa-users"></i>Jumlah Penghuni</span>
      <?php
      $sql = mysqli_query($koneksi,"SELECT * FROM penghuni WHERE status = 'Active'");
      $peng = mysqli_num_rows($sql);
      ?>
      <h3><?= $peng;?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 100%</b> Mantap Dong</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-shopping-cart"></i> Jumlah Kamar</span>
      <?php
      $sql = mysqli_query($koneksi,"SELECT * FROM kamar");
      $kam = mysqli_num_rows($sql);
      ?>
      <h3 class="color-up"><?= $kam;?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 100%</b> Mantap Dong</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <?php
        $sqlb =mysqli_query($koneksi,"SELECT * FROM penghuni WHERE status='Deactivated'");
        $alumni = mysqli_num_rows($sqlb);
      ?>
      <span class="title"><i class="fa fa-users"></i> Jumlah Alumni</span>
      <h3 class="color-down"><?= $alumni;?></h3>  
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 100%</b> Mantap Dong</span>
    </li>
  </ul>
  </div>
  <!-- End Top Stats -->



  <!-- Start Second Row -->
  <div class="row">
    <?php 
    $lastpayment = mysqli_query($koneksi,"SELECT * FROM pembayaran ORDER BY tanggal DESC LIMIT 5"); 
    $jumlahpayment = mysqli_num_rows($lastpayment);
    ?>
    <!-- Start Pembayaran -->
    <div class="col-md-12 col-lg-8">
      <div class="panel panel-widget">
        <div class="panel-title">
          Pembayaran Terakhir <span class="label label-info"><?=$jumlahpayment;?></span>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>

        <div class="panel-body table-responsive">

          <table class="table table-hover">
            <thead>
              <tr>
                <td>Tanggal</td>
                <td>Invoice</td>
                
                <td>Jenis</td>
                <td>Jumlah</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php 
                while ($last=mysqli_fetch_assoc($lastpayment)) :?>
              <tr>
                <td><?=$last['tanggal'];?></td>
                <td><?=$last['invoice'];?></td>
                
                <td><?=$last['jenis'];?></td>
                <td>Rp.<?=number_format($last['jumlah']);?></td>
                <td>
                  <?php
                  if ($last['status'] == "Pending") {
                    $type = "warning";
                  }else if ($last['status'] == "Cancelled"){
                    $type = "danger";
                  }else if ($last['status'] == "Success"){
                    $type = "success";
                  }
                  ?>
                  <span class="label label-<?= $type;?>"><?= $last['status'];?></span>
                </td>
              </tr>
              <?php endwhile ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- End Pembayaran -->

    <!-- Start Penghuni -->
    <div class="col-md-12 col-lg-4">
      <div class="panel panel-widget">
        <div class="panel-title">
          <?php
            $qpenghuni = mysqli_query($koneksi,"SELECT * FROM penghuni ORDER BY id_penghuni DESC LIMIT 5");
            $jumlahqpeng = mysqli_num_rows($qpenghuni);
          ?>
          Penghuni Baru <span class="label label-warning"><?=$jumlahqpeng;?></span>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>


        <div class="panel-body table-responsive">

          <table class="table table-hover">
            <thead>
              <tr>
                <td>Username</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
            <?php
              while ($penghuni=mysqli_fetch_assoc($qpenghuni)) :
              ?>
              <tr>
              <td><?= $penghuni['username'];?></td>
                <td>
                <?php
                  if ($penghuni['status'] == "Active") {
                    $type = "success";
                  }else if ($penghuni['status'] == "Inactive"){
                    $type = "warning";
                  }else if ($penghuni['status'] == "Deactivated"){
                    $type = "danger";
                  }else if ($penghuni['status'] == "New"){
                    $type = "default";
                  }
                  ?>
                  <span class="label label-<?= $type;?>"><?= $penghuni['status'];?></span>
                </td>
              </tr>
            <?php endwhile ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- End Penghuni -->


  </div>
  <!-- End Second Row -->






  <!-- End Fifth Row -->




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
<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->




</body>
</html>

<?php
} ?>