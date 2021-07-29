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
  <div class="page-header">
    <h1 class="title">Data Pembayaran</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Pembayaran</li>
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
<br>
<div class="container-default">
  <div class="panel panel-default">
  
    <div class="panel-body table-responsive">
    <?php
        
        if (!empty($_GET['err'])) :
          if ($_GET['err']=="1") { ?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                   Pembayaran Tidak Ditemukan!
                  </div>
        <?php
          }else if($_GET['err']=="2"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                    Status Tidak Ditemukan!
                  </div>
        <?php
          }else if($_GET['err']=="3"){?> 
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                     Oops! sepertinya ada kesalahan dari sistem
                  </div>
        <?php
          }elseif($_GET['err']=="ok"){?>
                  <div class="kode-alert kode-alert-icon kode-alert-click alert3">
                  <i class="fa fa-check"></i>
                     Pembayaran berhasil dikonfirmasi, user <b><?= $_SESSION['penghuni'];?></b> telah membayar kost untuk 1 bulan.
                  </div>
        <?php
          }elseif($_GET['err']=="okk"){?>
                  <div class="kode-alert kode-alert-icon kode-alert-click alert3">
                  <i class="fa fa-check"></i>
                      Biaya pendaftaran berhasil dikonfirmasi, user <b><?= $_SESSION['penghuni'];?></b> telah mendaftar kost dan membayar kost untuk 1 bulan.
                  </div>
        <?php
          }else if($_GET['err']=="ik"){?> 
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-warning"></i>
                     Pembayaran telah dibatalkan
                  </div>
          <?php } endif ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Tanggal</td>
                <td>Invoice</td>
                <td>Username</td>
                <td>Jumlah</td>
                <td>Jenis</td>
                <td>Status</td>
                <td class="text-right">Action</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $ddl =  "SELECT * FROM pembayaran ORDER BY tanggal DESC";
              $query = mysqli_query($koneksi,$ddl) or die (mysqli_error($koneksi));
              while ($row=mysqli_fetch_assoc($query)) :
              ?>
              <tr>
                <td><?= $row['tanggal'];?></td>
                <td><?= $row['invoice'];?></td>
                <td><?= $row['username'];?></td>
                <td><?= "Rp." . number_format($row['jumlah']);?></td>
                <td><?= $row['jenis'];?></td>
                <td>
                  <?php
                  if ($row['status'] == "Pending") {
                    $type = "warning";
                  }else if ($row['status'] == "Cancelled"){
                    $type = "danger";
                  }else if ($row['status'] == "Success"){
                    $type = "success";
                  }
                  ?>
                  <span class="label label-<?= $type;?>"><?= $row['status'];?></span>
                </td>
                <?php
                if ($row['status'] == "Success" ||$row['status'] == "Cancelled") { ?>
                      <td class="text-right">
                      <button type="button" class="btn btn-success" disabled><i class="fa fa-archive"></i>Action Sudah Dilakukan</button>
                      </td>
                <?php }else{ ?>
                <div class="btn-group">
                      <td class="text-right">
                        <a href="action/pembayaran_action.php?id_pembayaran=<?= $row['invoice'];?>&jenis=<?= $row['jenis'];?>&status=Success" class="btn btn-default"><i class="fa fa-check"></i>Confirm</a>
                        <a href="action/pembayaran_action.php?id_pembayaran=<?= $row['invoice'];?>&jenis=<?= $row['jenis'];?>&status=Cancelled" class="btn btn-danger"><i class="fa fa-close"></i>Cancel</a>
                      </td>
                </div>
                <?php } ?>
              </tr>
              <?php endwhile ?>
            </tbody>
          </table>
    </div>
  </div>
</div>
<br><br><br>
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
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="js/summernote/summernote.min.js"></script>

<!-- ================================================
Sparkline
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/sparkline/sparkline.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="js/sparkline/sparkline-plugin.js"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="js/rickshaw/d3.v3.js"></script>
<!-- main file -->
<script src="js/rickshaw/rickshaw.js"></script>
<!-- demo codes -->
<script src="js/rickshaw/rickshaw-plugin.js"></script>

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
Moment.js
================================================ -->
<script type="text/javascript" src="js/moment/moment.min.js"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script type="text/javascript" src="js/full-calendar/fullcalendar.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="js/date-range-picker/daterangepicker.js"></script>


</body>
</html>

<?php
} ?>