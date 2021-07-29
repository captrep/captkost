<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>CaptKost</title>

  <!-- ========== Css Files ========== -->
  <link rel="shortcut icon" href="../images/captlogo.jpg" />
  <link href="../admin/css/root.css" rel="stylesheet">
  <link href="../admin/css/responsive.css" rel="stylesheet">
  <link href="../admin/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="error-pages">

        <img src="../admin/img/404.png" alt="404" class="icon" width="400" height="260">
        <h1>Anda telah dikeluarkan dari kost</h1>
        <h4>Sepertinya anda melanggar peraturan / telat membayar kost</h4>


    </div>
    <?php
    session_start();
    session_destroy();
    session_unset();
    ?>

</body>
</html>