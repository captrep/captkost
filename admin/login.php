<?php
session_start();
if (!empty($_SESSION['useradmin']) AND !empty($_SESSION['passadmin'])) {
  header("location:index.php");
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
  <title>CaptKost - Admin Panel</title>

  <!-- ========== Css Files ========== -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/root.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/faviconcapt.jpg" />
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>
  <div class="container-default">

    <div class="login-form">
      <form action="action/cek_login.php" method="POST">
        <div class="top">
          <img src="img/Capt-Black.jpg" alt="icon" class="icon">
          <h1>CaptKost</h1>
          <h4>Admin Panel</h4>
        </div>
        <div class="form-area">
<?php
if (!empty($_GET['err'])) {
if ($_GET['err'] == "user") { ?>
        <div class="kode-alert kode-alert-icon kode-alert-click alert5">
        <i class="fa fa-warning"></i>
        Username tidak boleh kosong
        </div>
<?php
} else if ($_GET['err'] == "pass") { ?>
        <div class="kode-alert kode-alert-icon kode-alert-click alert5">
        <i class="fa fa-warning"></i>
        Password tidak boleh kosong
        </div>
<?php
} else if ($_GET['err'] == "userpass") { ?>
        <div class="kode-alert kode-alert-icon kode-alert-click alert5">
        <i class="fa fa-warning"></i>
        Akun tidak terdaftar
        </div>
<?php
}
}
?>
          <div class="group">
            <input type="text" class="form-control" placeholder="Username" name="useradmin">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control" placeholder="Password" name="passadmin">
            <i class="fa fa-key"></i>
          </div>
          <div class="checkbox checkbox-primary">
            <input id="checkbox101" type="checkbox" checked>
            <label for="checkbox101"> Remember Me</label>
          </div>
          <button type="submit" class="btn btn-default btn-block" name="login">LOGIN</button>
        </div>
      </form>
    </div>
    <br><br>
  </div>
  

    

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
Sweet Alert
================================================ -->
<script src="js/sweet-alert/sweet-alert.min.js"></script>
<!-- ================================================
Kode Alert
================================================ -->
<script src="js/kode-alert/main.js"></script>

</body>
</html>