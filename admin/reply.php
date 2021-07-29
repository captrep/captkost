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
    <h1 class="title">Ticket</h1>
    <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Tiket</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Dashboard</a>
        <a href="" class="btn btn-light"><i class="fa fa-refresh"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<?php
$id = $_GET['id_ticket'];
$qt = mysqli_query($koneksi,"SELECT * FROM ticket WHERE id_ticket ='$id'") ;
$tiket = mysqli_fetch_assoc($qt) ;

if ($tiket['status'] == "Closed"): ?>
  <div class="container-mail">

  <!-- Start Mailbox -->
  <div class="mailbox clearfix">

    <!-- Start Mailbox Menu -->
    <div class="mailbox-menu">
      
    </div>
    <!-- End Mailbox Menu -->

    <!-- Start Mailbox Container -->
    <div class="container-mailbox">

          <!-- Start Mailbox Inbox -->
          <!-- End Mailbox Inbox -->

          <!-- Start Chat -->
          <div class="chat col-md-12 padding-0">

            <!-- Start Title -->
            <div class="title">
              <h1 style="text-align: center;"><?= $tiket['subjek'];?>  (Tiket sudah ditutup)</h1>
              <p style="text-align: center;"><b>From:</b> <?= $tiket['pembuat'];?></p>
            </div>
            <!-- End Title -->

            <!-- Start Conv -->
            <ul class="conv">
            <li>
                <img src="../member/img/fotouser/<?=$tiket['foto'];?>" alt="img" class="img">
                <p class="ballon color1"><?=$tiket['isi'];?><br><small><?=date('d F Y',strtotime($tiket['tanggal']))." ".$tiket['jam'];?> WIB</small></p><br>
              <li>
              <?php 
              $bingung  = mysqli_query($koneksi,"SELECT t.id_ticket, t.isi, t.foto, r.id, r.id_ticket, r.reply, r.gambar, r.pembalas, r.date, r.time FROM ticket t, ticket_reply r WHERE t.id_ticket = r.id_ticket AND t.id_ticket = '$id'") ;
              while($chat=mysqli_fetch_assoc($bingung)) : 
              if ($chat['pembalas'] == "Ridduwan Ekaputra") {
                $color = "color2";
                $img = $chat['gambar'];
              }else{
                $color = "color1";
                $img = "../member/img/fotouser/".$chat['gambar'];
              }
              ?>
              <li>
                <img src="<?=$img;?>" alt="img" class="img">
                <p class="ballon <?=$color;?>"><?=$chat['reply'];?><br><small><?=date('d F Y',strtotime($chat['date']))." ".$chat['time'];?> WIB</small></p><br>
              <li>
              <?php endwhile; ?>

            </ul>
            <!-- End Conv -->

            <div class="write">
                <form class="margin-b-20">
                  <div class="form-group">
                  <textarea class="form-control" name="reply" placeholder="Enter text ..."  style="height:100px; width:100%; resize:none;" disabled></textarea>
                  </div>

                  <button class="btn btn-default">Reply Message</button>
                  <button type="reset" class="btn margin-l-5">Clear</button>
                </form>
            </div>


          </div>
          <!-- End Chat -->

    </div>
    <!-- End Mailbox Container -->

  </div>
  <!-- End Mailbox -->


  </div>

<?php else : ?>
  
<div class="container-mail">

<!-- Start Mailbox -->
<div class="mailbox clearfix">

  <!-- Start Mailbox Menu -->
  <div class="mailbox-menu">
  <?php
        
        if (!empty($_GET['err'])) :
          if ($_GET['err']=="1") { ?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "Warning!",
                              text: "Pesan tidak boleh kosong!",
                              type: "warning"
                          }, function() {
                              window.location = "reply.php?id_ticket=<?=$id;?>";
                          });
                      }, 400);
                  </script>
        <?php
          }else if($_GET['err']=="2"){?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "Error!",
                              text: "Ooops! Sepertinya ada kesalahan pada database",
                              type: "error"
                          }, function() {
                              window.location = "reply.php?id_ticket=<?=$id;?>";
                          });
                      }, 400);
                  </script>
        <?php
          }elseif($_GET['err']=="ok"){?>
                  <script>
                      setTimeout(function() {
                          swal({
                              title: "success!",
                              text: "Tiket sudah dibalas!",
                              type: "success"
                          });
                      });
                  </script>
                    
          <?php } endif ?>
    
  </div>
  <!-- End Mailbox Menu -->

  <!-- Start Mailbox Container -->
  <div class="container-mailbox">

        <!-- Start Mailbox Inbox -->
        <!-- End Mailbox Inbox -->

        <!-- Start Chat -->
        <div class="chat col-md-12 padding-0">

          <!-- Start Title -->
          <div class="title">
            <h1 style="text-align: center;"><?= $tiket['subjek'];?></h1>
            <p style="text-align: center;"><b>From:</b> <?= $tiket['pembuat'];?></p>
          </div>
          <!-- End Title -->

          <!-- Start Conv -->
          <ul class="conv">
          <li>
              <img src="../member/img/fotouser/<?=$tiket['foto'];?>" alt="img" class="img">
              <p class="ballon color1"><?=$tiket['isi'];?><br><small><?=date('d F Y',strtotime($tiket['tanggal']))." ".$tiket['jam'];?> WIB</small></p><br>
            <li>
            <?php 
            $bingung  = mysqli_query($koneksi,"SELECT t.id_ticket, t.isi, t.foto, r.id, r.id_ticket, r.reply, r.gambar, r.pembalas, r.date, r.time FROM ticket t, ticket_reply r WHERE t.id_ticket = r.id_ticket AND t.id_ticket = '$id'") ;
            while($chat=mysqli_fetch_assoc($bingung)) : 
            if ($chat['pembalas'] == "Ridduwan Ekaputra") {
              $color = "color2";
              $img = $chat['gambar'];
            }else{
              $color = "color1";
              $img = "../member/img/fotouser/".$chat['gambar'];
            }
            ?>
            <li>
              <img src="<?=$img;?>" alt="img" class="img">
              <p class="ballon <?=$color;?>"><?=$chat['reply'];?><br><small><?=date('d F Y',strtotime($chat['date']))." ".$chat['time'];?> WIB</small></p><br>
            <li>
            <?php endwhile; ?>
            <!-- <li>
              <img src="img/profileimg.png" alt="img" class="img">
              <p class="ballon color2">I'm working on it</p><br>
            <li> -->

          </ul>
          <!-- End Conv -->

          <div class="write">
              <form action="action/send_reply.php" method="POST" class="margin-b-20">
                <input type="hidden" name="id_ticket" value="<?=$id;?>">
                <input type="hidden" name="gambar" value="<?=$gambar;?>">
                <input type="hidden" name="status" value="<?=$tiket['status'];?>">
                <input type="hidden" name="nama_admin" value="<?=$nama;?>">
                <div class="form-group">
                <textarea class="form-control" name="reply" placeholder="Enter text ..."  style="height:100px; width:100%; resize:none;"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-default">Reply Message</button>
                <button type="reset" class="btn margin-l-5">Clear</button>
              </form>
          </div>


        </div>
        <!-- End Chat -->

  </div>
  <!-- End Mailbox Container -->

</div>
<!-- End Mailbox -->


</div>
          <?php endif; ?>
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
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
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