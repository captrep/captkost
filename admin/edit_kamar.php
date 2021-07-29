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
    <h1 class="title">Data Kamar Kost</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="list_kamar.php">List Kamar</a></li>
        <li class="active">Tambah Kamar</li>
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
<div class="container-padding">
<br>
<div class="row">
<div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Edit Kamar
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <?php
        
            if (!empty($_GET['err'])) :
              if ($_GET['err']=="1") { ?>
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                       Nama Kamar Harus Diisi!
                      </div>
            <?php
              }else if($_GET['err']=="2"){?>
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                        Harga Harus Diisi dengan angka!
                      </div>
            <?php
              }else if($_GET['err']=="3"){?> 
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                        Deskripsi Harus Diisi!
                      </div>
            <?php
              }elseif($_GET['err']=="4"){?>
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                         Data Kamar Gagal Dimasukkan
                      </div>
            <?php
              }else if($_GET['err']=="5"){?> 
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                        Ekstensi Gambar harus JPG/PNG/JPEG!
                      </div>
            <?php
              }else if($_GET['err']=="6"){?> 
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                        Size gambar tidak boleh melebihi 1MB!
                      </div>
            <?php
             }else if($_GET['err']=="7"){?> 
                      <div class="kode-alert kode-alert-icon alert5">
                        <a href="" class="closed">&times;</a>
                        <i class="fa fa-warning"></i>
                        Upload gambarnya dong!
                      </div>
            <?php
              }elseif($_GET['err']=="ok"){?>
                      <script>
                          setTimeout(function() {
                              swal({
                                  title: "success!",
                                  text: "Data Kamar Berhasil Diubah!",
                                  type: "success"
                              }, function() {
                                  window.location = "list_kamar.php";
                              });
                          }, 400);
                      </script>
                        
              <?php } endif ?>
            <div class="panel-body">
            <?php
              $id=$_GET['id_kamar'];
              $sql = "SELECT * FROM kamar WHERE id_kamar='$id'";
              $queryEdit=mysqli_query($koneksi,$sql);

              $row=mysqli_fetch_assoc($queryEdit);
              $id       = $row['id_kamar'];
              $nama     = $row['nama_kamar'];
              $fasilitas= $row['fasilitas'];
              $harga    = $row['harga_kamar'];
              $deskripsi= $row['deskripsi'];
              $gambar   = $row['gambar'];
              $penghuni = $row['id_penghuni'];
            ?>
              <form action="action/edit_kamar_action.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_kamar" value="<?=$id;?>">              
                <div class="form-group">
                  <label for="nama" class="form-label">Nama Kamar</label>
                  <input type="text" class="form-control" id="nama" name="nama_kamar" value="<?=$nama;?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="input2" class="form-label">Fasilitas</label>
                  <select class="form-control" name="fasilitas">
                      <?php
                      if($fasilitas == "Kamar Mandi Dalam") { ?>
                        <option value="Kamar Mandi Dalam" selected>Kamar Mandi Dalam</option>
                        <option value="Kamar Mandi Luar">Kamar Mandi Luar</option>
                      <?php 
                      }else{ ?>
                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                        <option value="Kamar Mandi Luar" selected>Kamar Mandi Luar</option>
                      <?php } ?>
                  </select>  
                </div>

                <div class="form-group">
                  <label for="harga" class="form-label">Harga Kamar</label>
                  <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                  <input type="text" class="form-control" id="rupiah1" name="harga_kamar" placeholder="Amount" value="<?=$harga;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea class="form-control" rows="3" id="textarea1" placeholder="Blablabalba" name="deskripsi"><?=$deskripsi;?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="gambar" class="form-label">Gambar</label>
                  <img src="img/<?= $gambar; ?>" class="img-thumbnail" style="width: 100px; margin-bottom: 10px;" alt="Foto Produk">
                      <input type="file" id="gambar" name="gambar">
                </div>
                
                <div class="form-group">
                  <label for="input2" class="form-label">Penghuni</label>
                  <select class="form-control" name="id_penghuni">
                        <option value="NULL">Kosong</option>
                        <?php
                          $sql = mysqli_query($koneksi, "SELECT id_penghuni,username FROM penghuni");
                          while ($a=mysqli_fetch_array($sql)) {
                            if($penghuni == $a['id_penghuni']) { ?>
                              <option value="<?= $a['id_penghuni'];?>" selected><?= $a['username'];?></option>
                            <?php }else{ ?>
                              <option value="<?= $a['id_penghuni'];?>"><?= $a['username'];?></option>
                            <?php }
                            }?>
                  </select>  
                </div>          

                <button type="submit" class="btn btn-success btn-block">Submit</button>
              </form>

            </div>

      </div>
    </div>
</div>
<br><br><br><br>
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