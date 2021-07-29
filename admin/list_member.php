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
    <h1 class="title">Data Penghuni Kost</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Member</li>
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
                  text: "Penghuni berhasil dikeluarkan!",
                  type: "success"
              }, function() {
                 window.location.href = "list_member.php"
              });
          }, 400);
      </script>
      <?php 
      }else if($_GET['err'] == "ik") { ?>
      <script>
          setTimeout(function() {
              swal({
                  title: "Oops!",
                  text: "Gagal mengeluarkan penghuni",
                  type: "error"
              }, function() {
                window.location.href = "list_member.php"
              });
          }, 400);
      </script>
      <?php } endif ?>
    <div class="panel-body table-responsive">
      <table class="table table-hover"> 
              <thead>
                <tr>
                  <td>Username</td>
                  <td>E-mail</td>
                  <td >Tanggal Daftar</td>
                  <td >Status</td>
                  <td class="text-center">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query  = mysqli_query($koneksi,"SELECT * FROM penghuni");
                  while($row=mysqli_fetch_assoc($query)) :?>
                <tr>
                  <td><a href="identitas.php?id_penghuni=<?=$row['id_penghuni'];?>"><?= $row['username'];?></a></td>
                  <td><?= $row['email'];?></td>
                  <td><?= $row['tgl_daftar'];?></td>
                  <td>
                  <?php
                  if ($row['status'] == "Active") {
                    $type = "success";
                  }else if ($row['status'] == "Inactive"){
                    $type = "warning";
                  }else if ($row['status'] == "Deactivated"){
                    $type = "danger";
                  }else if ($row['status'] == "New"){
                    $type = "default";
                  }
                  ?>
                  <span class="label label-<?= $type;?>"><?= $row['status'];?></span>
                </td>
                  <?php 
                  if ($row['status'] == "Deactivated"){?>
                      <td>
                      <button type="button" class="btn btn-success btn-block" disabled><i class="fa fa-archive"></i>Action Sudah Dilakukan</button>
                      </td>
                  <?php }else{ ?>
                  <td id="confirm"><a href="action/deactive_user.php?id_penghuni=<?=$row['id_penghuni'];?>" class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i>Deactive Penghuni</a></td>
                  <?php } ?>
                </tr>
                <?php endwhile ?>
              </tbody>
            </table>
    </div>
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