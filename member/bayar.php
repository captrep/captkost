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
    <h1 class="title">Bayar Kost</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Bayar Kost</li>
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
          Buat Invoice
        </div>
        <?php
            if (!empty($_GET['err'])) :
              if ($_GET['err']=="ok") { ?>
                <div class="kode-alert kode-alert-icon kode-alert-click alert1-light">
                  <i class="fa fa-check"></i>
                  <p style="font-size:18px;">INVOICE BERHASIL DIBUAT!</p>
                  Silahkan Transfer ke <b><?=$_SESSION['bayar'];?></b> Sebesar <b><?= "Rp " . number_format($_SESSION['jumlah'],0, ".", ".");?></b>. Setelah transfer berikan invoice berikut kepada admin melalui tiket : <b><?= $_SESSION['invoice']; ?></b>
                </div>
            <?php
              }else if($_GET['err']=="1"){?>
                    <div class="kode-alert kode-alert-icon alert5">
                      <a href="" class="closed">&times;</a>
                      <i class="fa fa-warning"></i>
                       Ada invoice yang belum terselesaikan, bayar dulu dong invoice yang sebelumnya!
                    </div>
            <?php
              }else if($_GET['err']=="3"){?>
                    <div class="kode-alert kode-alert-icon alert5">
                      <a href="" class="closed">&times;</a>
                      <i class="fa fa-warning"></i>
                       Pilih method pembayarannya dong!
                    </div>
            <?php
              }else if($_GET['err']=="2"){?>
                    <div class="kode-alert kode-alert-icon alert5">
                      <a href="" class="closed">&times;</a>
                      <i class="fa fa-warning"></i>
                      Error
                    </div>
            <?php } endif ?>
            <div class="panel-body">
              <form action="action/bayar_action.php" method="POST">

                  <input type="hidden" class="form-control" id="username" name="username" value="<?= $username;?>" readonly>
                  
                <div class="form-group">
                    <?php
                    $tableKamar = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_penghuni ='$id'") or die (mysqli_error($koneksi));
                    $row=mysqli_fetch_assoc($tableKamar);
                    $harga = $row['harga_kamar']; ?>
                  <label for="nama_kamar" class="form-label">Nama Kamar</label>
                  <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="<?= $row['nama_kamar'];?>" readonly>
                </div>
                <div class="form-group">
                  <label for="harga" class="form-label">Harga Kamar</label>
                  <input type="text" class="form-control" id="harga" name="harga" value="<?=$harga;?>" readonly>
                </div>
        
                <div class="form-group">
                  <label for="denda" class="form-label">Denda</label>
                  <input type="text" class="form-control" id="denda" name="denda" value="<?=denda($durasi,$username);?>" readonly>
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Method Pembayaran</label>
                  <select class="form-control" id="method" name="method">
                  <option value="0">- Method Pembayaran -</option>
                  <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM method");
                          while ($a=mysqli_fetch_assoc($sql)) {
                              ?>
                              <option value="<?php echo $a['id_method'];?>"><?php echo $a['nama_method'];?></option>
                        <?php } ?>
                  </select>  
                </div>
                <?php
                $jumlah = $harga+denda($durasi,$username);
                ?>
                <div class="form-group">
                  <label for="jumlah" class="form-label">Total Bayar</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" value='Pilih method pembayaran terlebih dulu.' readonly>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
              </form>

            </div>

      </div>
    </div>
</div>
<br>
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
<script>

var jumlah = <?= $jumlah; ?>;

$("#method").change(function () {
  $("#jumlah").val(jumlah);
  if($('#method').val() == 0){
    $("#jumlah").val('Pilih method pembayaran terlebih dulu.');
  }
});


</script>

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