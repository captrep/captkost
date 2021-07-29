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
    <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/fotouser/<?=$foto;?>" alt="img"><b><?= $nama;?> </b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="profile.php"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <li><a href="action/logout.php"><i class="fa falist fa-power-off"></i> Logout</a></li>
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

<div class="container-no-padding">

  <!-- Start Social Profile -->
  <div class="social-profile">

    <!-- Start Top -->
    <div class="social-top">

      <div class="profile-left">
        <img src="img/fotouser/<?=$data_user['foto'];?>" alt="img" class="profile-img">
        <h1 class="name"><?=$data_user['nama'];?></h1>
        <p class="profile-text">Leader of concat ripenjerssss</p>
      </div>


    </div>
    <!-- End Top -->

    <!-- Start Social Content -->
    <div class="social-content clearfix">
    <div class="col-md-6">
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
          }elseif($_GET['err']=="ok"){?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "success!",
                              text: "Data profile telah diperbaharui!",
                              type: "success"
                          }, function() {
                              window.location = "profile.php";
                          });
                      }, 400);
                  </script>
                    
          <?php } endif ?>
            <div class="panel-body">
            <form action="action/update_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id;?>">
              <div class="form-group">
                <label for="input1" class="form-label">Ganti Foto</label><br>
                  <img src="img/fotouser/<?= $foto; ?>" class="img-thumbnail" style="width: 100px; margin-bottom: 10px;" alt="Foto Profile">
                  <input type="file" id="foto" name="foto">
                </div>
                <div class="form-group">
                  <label for="input1" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="input1" name="nama" value="<?=$data_user['nama'];?>" >
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Umur</label>
                  <input type="text" class="form-control" id="input2" name="umur" value="<?=$data_user['umur'];?>" >
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Agama</label>
                  <input type="text" class="form-control" id="input2" name="agama" value="<?=$data_user['agama'];?>" >
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" id="input3" name="pekerjaan" value="<?=$data_user['pekerjaan'];?>" >
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Jalan</label>
                  <input type="text" class="form-control" id="input3" name="jalan" value="<?=$data_user['jalan'];?>" >
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Desa</label>
                  <input type="text" class="form-control" id="input3" name="desa" value="<?=$data_user['desa'];?>" >
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" id="input3" name="kecamatan" value="<?=$data_user['kecamatan'];?>" >
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Kabupaten</label>
                  <input type="text" class="form-control" id="input3" name="kabupaten" value="<?=$data_user['kabupaten'];?>" >
                </div>
                <div class="form-group">
                  <label class="form-label">Alamat Lengkap</label>
                  <textarea class="form-control" rows="3" id="textarea1" disabled><?=$data_user['jalan'] . " " .$data_user['desa'] . ", " . $data_user['kecamatan'] . ", " . $data_user['kabupaten'];?>, Indonesia</textarea>
                </div>
              
              <button type="submit" name="submit" class="btn btn-default btn-block">Update Profile</button>
              </form>
            </div>
      

      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
 
        <div class="panel-title">
          Ubah Password
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
          }elseif($_GET['err']=="ok"){?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "success!",
                              text: "Data profile telah diperbaharui!",
                              type: "success"
                          }, function() {
                              window.location = "profile.php";
                          });
                      }, 400);
                  </script>
          <?php } endif ?>
            <div class="panel-body">
            <form action="action/update_profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="input2" class="form-label">Password Lama</label>
                  <input type="password" class="form-control" id="input2" name="passlama" >
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Password Baru</label>
                  <input type="password" class="form-control" id="input2" name="passbaru">
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" id="input2" name="repassbaru">
                </div>
              <button type="submit" name="submit" class="btn btn-default btn-block">Submit</button>
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
<script type="text/javascript" src="../admin/js/jquery-ui/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="../admin/js/moment/moment.min.js"></script>



</body>
</html>

<?php
} ?>