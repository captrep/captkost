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

    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);

      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
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
  <div class="row">
    <div class="col-md-12">
       <div class="widget socialbox" style="background:#47639E; height:230px;">
          <p class="text">
          Selamat datang, <b><?= $nama; ?></b><br>
          <?php
  if ($durasi == "0") {?>
      Hari ini adalah tenggat waktu pembayaran kost
   <?php }else if($durasi == "-1") {?>
      Kamu udah telat bayar kost 1 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-2") {?>
      Kamu udah telat bayar kost 2 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-3") {?>
     Kamu udah telat bayar kost 3 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-4") {?>
      Kamu udah telat bayar kost 4 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-5") {?>
      Kamu udah telat bayar kost 5 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-6") {?>
      Kamu udah telat bayar kost 6 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-7") {?>
      Kamu udah telat bayar kost 7 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-8") {?>
      Kamu udah telat bayar kost 8 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-9") {?>
      Kamu udah telat bayar kost 9 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else if($durasi == "-10") {?>
      Kamu udah telat bayar kost 10 hari<br>
      Jadi kamu kena denda Rp. <?= number_format(denda($durasi,$username));?>
   <?php }else{?>
      Sisa durasi kost kamu adalah <b><?= $durasi;?></b> Hari lagi<br>
      Jangan lupa bayar kost ya!
   
   <?php }?>
          </p>
          <?php date_default_timezone_set('Asia/Jakarta'); ?>
          <p class="text-info"><?=tgl_indo(date('Y-m-d'));?>, Pukul <?=date('G:i:s');?> WIB</p>
          <div class="logo"><i class="fa fa-bullhorn"></i></div> 
          <ul class="info">
          <li><i class="fa fa-exclamation-triangle"></i>11 Hari telat bayar kost akan langsung dikeluarkan</li>
        </ul>

       </div>
    </div>

  

  <!-- End Top Stats -->


  <!-- Start First Row -->

<!-- Start Profile Widget -->
      <!-- Start Project Stats -->
    <div class="col-md-12">
      <div class="panel panel-widget">
        <div class="panel-title">
        Berita & Informasi  <i class="fa fa-exclamation"></i> 
        </div>

        <div class="panel-body table-responsive">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <td width="20%">Tanggal</td>
                <td>Berita</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $querybc = mysqli_query($koneksi,"SELECT * FROM informasi ORDER BY ID DESC LIMIT 5");
              while ($bc = mysqli_fetch_assoc($querybc)):
              ?>
              <tr>
                <td><?=$bc['tanggal']." ".$bc['jam'];?></td>
                <td>
                  <b><?=$bc['judul'];?></b><br>
                  <?=$bc['konten'];?>
                </td>
              </tr>
              <?php endwhile ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- Start Project Stats -->

</div>  
<!-- End Second Row -->
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
<!-- START MODAL -->
<!-- Modal -->
<div class="modal fade" id="popupInfo" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Berita & Informasi</h4>
                  </div>
                  <div class="modal-body">
                  <div class="text-right">
                    <?php
                    $qmodalbc = mysqli_query($koneksi,"SELECT * FROM informasi ORDER BY ID DESC LIMIT 1");
                    $modalbc = mysqli_fetch_assoc($qmodalbc);
                    ?>
                  <span class="text-info"><i class="fa fa-calendar"></i> <?= tgl_indo($modalbc['tanggal'])." ".$modalbc['jam'];?> WIB</span><br>
                  </div>
                  <div class="panel-heading"><?= $modalbc['judul']; ?></div>
                  <?= $modalbc['konten']; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" onclick="is_read_info()">Saya sudah membaca ini.</button>
                  </div>
                </div>
              </div>
            </div>

          <!-- End Modal Code -->
   </div>

<!-- END MODAL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('#popupInfo').modal('show');
      function is_read_info() {
			$('#popupInfo').modal('hide');
      }
    });
</script>

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


<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->



</body>
</html>

<?php
} ?>