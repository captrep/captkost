<?php
session_start();
include("../lib/koneksi.php");
  $id = $_SESSION['id_penghuni'];
  $status = $_SESSION['status'];
    
if  (!isset($_SESSION['username']) and !isset($_SESSION['password']))  {
  header("location:login.php");
}elseif($status == "Deactivated"){
  header("location:deactivated.php");
}elseif($status == "Active"){
  header("location:index.php");
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
  <title>CaptKost - Member Area</title>

  <!-- ========== Css Files ========== -->
  <link href="../admin/css/root.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/favicontcapt.jpg" />

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
    <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/fotouser/guest.png" alt="img">New User</b><span class="caret"></span></a>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<?php
//  include ('sidebar.php');
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

<div class="container-no-padding">

  <!-- Start Social Profile -->
  <div class="social-profile">

    <!-- Start Top -->
    <div class="social-top">

      <div class="profile-left">
        <img src="img/fotouser/guest.png" alt="img" class="profile-img">
        <h1 class="name">New User</h1>
        <p class="profile-text">Isi semua field dibawah sesuai dengan data pribadi anda, karena akan digunakan sebagai identitas penghuni kost</p>
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
        <?php
        
        if (!empty($_GET['err'])) :
          if ($_GET['err']=="1") { ?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                   Ekstensi foto yang diperbolehkan adalah JPG/PNG/JPEG
                  </div>
        <?php
          }else if($_GET['err']=="2"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                   Isi umur hanya dengan angka
                  </div>
        <?php
          }else if($_GET['err']=="3"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                   Size foto yang diperbolehkan adalah kurang dari 1MB
                  </div>
        <?php
          }else if($_GET['err']=="4"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                   Isi jalan/desa/kecamatan/kabupaten hanya dengan huruf dan angka, dilarang menggunakan character lain!
                  </div>
        <?php
          }else if($_GET['err']=="5"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                  Gagal upload file!
                  </div>
        <?php
          }else if($_GET['err']=="6"){?>
                  <div class="kode-alert kode-alert-icon alert5">
                    <a href="" class="closed">&times;</a>
                    <i class="fa fa-warning"></i>
                  Jangan malu dengan muka anda sendiri, upload fotonya dong ah!!
                  </div>
        <?php
          }elseif($_GET['err']=="ok"){?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "Success!",
                              text: "Profile anda telah dibuat, Silahkan lakukan login ulang!",
                              type: "success"
                          }, function() {
                              window.location = "action/logout.php";
                          });
                      }, 400);
                  </script>
                    
          <?php } endif ?>
            <div class="panel-body">
            <form action="action/set_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id;?>">
              <div class="form-group">
                <label for="input1" class="form-label">Upload Foto</label><br>
                  
                  <input type="file" id="foto" name="foto">
                </div>
                <div class="form-group">
                  <label for="input1" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="input1" name="nama" placeholder="Ahmad Mark Zuckerberg Putra">
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Umur</label>
                  <input type="text" class="form-control" id="input2" name="umur" placeholder="20">
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Agama</label>
                  <input type="text" class="form-control" id="input2" name="agama" placeholder="Islam ktp">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" id="input3" name="pekerjaan" placeholder="Pengacara">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Jalan</label>
                  <input type="text" class="form-control" id="input3" name="jalan" placeholder="jl. ahmad sadikin no 83">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Desa</label>
                  <input type="text" class="form-control" id="input3" name="desa" placeholder="Cikipit">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" id="input3" name="kecamatan" placeholder="Cikuput">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kabupaten</label>
                  <input type="text" class="form-control" id="input3" name="kabupaten" placeholder="Cekepet">
                </div>
              
              <button type="submit" name="submit" class="btn btn-default btn-block">SUBMIT</button>
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
<script type="text/javascript" src="j../admin/s/jquery-ui/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="../admin/js/moment/moment.min.js"></script>



</body>
</html>

<?php
} ?>