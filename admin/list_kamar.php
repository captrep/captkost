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

  $rowpage = 2;
  $itung = mysqli_query($koneksi,"SELECT * FROM kamar");
  $totalrow = mysqli_num_rows($itung);
  $totalpage = ceil($totalrow / $rowpage);
  $activepage = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $firstRow = ($rowpage * $activepage) - $rowpage;
  
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
        <li class="active">List Kamar</li>
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
  
  <div class="panel panel-default">
  <?php
     if (!empty($_GET['err'])) :
      if ($_GET['err']=="ok") { ?>
      <script>
          setTimeout(function() {
              swal({
                  title: "Deleted!",
                  text: "Kamar berhasil dihapus!",
                  type: "success"
              }, function() {
                 window.location.href = "list_kamar.php"
              });
          }, 400);
      </script>
      <?php 
      }else if($_GET['err'] == "ik") { ?>
      <script>
          setTimeout(function() {
              swal({
                  title: "Oops!",
                  text: "Gagal menghapus data kamar",
                  type: "error"
              }, function() {
                window.location.href = "list_kamar.php"
              });
          }, 400);
      </script>
      <?php } endif ?>
    <div class="panel-body table-responsive">
      <table class="table table-hover"> 
              <thead>
                <tr>
                  <td>Nama</td>
                  <td>Fasilitas</td>
                  <td>Harga</td>
                  <td>Foto</td>
                  <td>Penghuni</td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
                $tableKamar = mysqli_query($koneksi, "SELECT * FROM kamar LIMIT $firstRow,$rowpage") or die (mysqli_error($koneksi));
                while($row=mysqli_fetch_assoc($tableKamar)) : ?>
                  <tr>
                    <td><?= $row['nama_kamar'];?></td>
                    <td><?= $row['fasilitas'];?></td>
                    <td><?= "Rp " . number_format($row['harga_kamar'],0, ".", ".");?></td>
                    <td>
                      <img src="img/<?= $row['gambar'];?>" height="100" width="150" alt="gambar produk">
                    </td>
                    <?php
                      $idp = $row['id_penghuni'];
                      $q = mysqli_query($koneksi,"SELECT id_penghuni,username FROM penghuni WHERE id_penghuni ='$idp'") or die (mysqli_error($koneksi));
                      $pe = mysqli_fetch_assoc($q);

                      if ($idp === $pe['id_penghuni']) { ?>
                    <td><?= $pe['username'];?></td>
                    <?php
                      }else{ ?>
                    <td>Kosong</td>
                    <?php } ?>
                    <div class="btn-group">
                      <td class="text-right">
                        <a href="edit_kamar.php?id_kamar=<?= $row['id_kamar'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <i id="confirm">
                        <a href="action/delete_kamar.php?id_kamar=<?= $row['id_kamar'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </i>
                      </td>
                    </div>
                  </tr>
              <?php endwhile ?>
                
              </tbody>
            </table>

            <ul class="pagination">
              <?php if ($activepage > 1) : ?>
                <li>
                  <a href="?page=<?= $activepage - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php endif; ?>
                <?php for ($i=1; $i <= $totalpage ; $i++) : ?>
                  <?php if ($i == $activepage) : ?>
                    <li class="active"><a href="?page=<?=$i;?>"><?= $i; ?> </a></li>
                  <?php else : ?>
                    <li><a href="?page=<?=$i;?>"><?= $i; ?> </a></li>
                  <?php endif; ?>
                <?php endfor; ?>
              <?php if ($activepage < $totalpage) : ?>
                <li>
                <a href="?page=<?= $activepage + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php endif; ?>
              </ul>
            <a href="add_kamar.php" class="btn btn-primary margin-t-20 float-r">Tambah Kamar Baru</a>

    </div>
  </div>
</div>
<br>
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

<script>
$('#confirm a').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    console.log(link);
    swal({
                title: "Are you sure?", 
                text: "You will not be able to recover this imaginary file!", 
                type: "warning", 
                showCancelButton: true, 
                confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Yes, delete it!", 
                closeOnConfirm: false 
              },
    function(){
        window.location.href = link;
    });
});
</script>
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