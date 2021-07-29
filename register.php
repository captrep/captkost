<?php
  include "lib/koneksi.php";
  session_start();
  $id = $_GET['id'];
  $qkamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_penghuni = '0' AND id_kamar='$id'");
  $kamar = mysqli_fetch_assoc($qkamar);
  $cek = mysqli_num_rows($qkamar);
  if ($cek > 0) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>CaptKost &mdash; Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/faviconcapt.jpg" />
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-whatsapp"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+1) 234 5678 9101</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">captkost@captrep.dev</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="text-black mb-0">CaptKost<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="#contact-section" class="nav-link">Register Form</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url(admin/img/<?=$kamar['gambar'];?>);" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row mb-4">
              <div class="col-md-7">
                <h1><?=$kamar['nama_kamar'];?></h1>
                <p class="mb-5 lead" ><?=$kamar['deskripsi'];?></p>
                <h3 class="section-sub-title">Fasilitas :</h3>
                  <p><?=$kamar['fasilitas'];?></p>
                <div>
                  <a href="#contact-section" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Selesaikan Pembayaran</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  



    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Register & Payment Form</h2>
            <h3 class="section-sub-title">Isi data dengan benar</h3>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          
          <?php
          if (!empty($_GET['err'])) :
            if ($_GET['err']=="ok"){ ?>
            <script>
              swal({
                    title: "Invoice : <?= $_SESSION['invoice']; ?>",
                    text: "Silahkan Transfer ke <?=$_SESSION['bayar'];?> Sebesar <?= "Rp " . number_format($kamar['harga_kamar'],0, ".", ".");?>. Setelah transfer berikan no invoice diatas kepada admin melalui contact form/sosial media kami.",
                    icon: "success",
                    button: "OK",
                  });
            </script>
          <?php }else if($_GET['err']=="1"){?>
            <script>
              swal ( "Oops" ,  "Username Telah Digunakan!" ,  "error" )
            </script>
          <?php }else if($_GET['err']=="2"){?>
            <script>
              swal ( "Oops" ,  "Semua Field Wajib Diisi!" ,  "error" )
            </script>
          <?php }else if($_GET['err']=="3"){?>
            <script>
              swal ( "Oops" ,  "Konfirmasi Password Tidak Sesuai!" ,  "error" )
            </script>
          <?php }else if($_GET['err']=="4"){?>
            <script>
              swal ( "Oops" ,  "Password setidaknya 6 karakter atau lebih!" ,  "error" )
            </script>
          <?php }else if($_GET['err']=="5"){?>
            <script>
              swal ( "Oops" ,  "Something went wrong!" ,  "error" )
            </script>
          <?php }else if($_GET['err']=="6"){?>
            <script>
              swal ( "Oops" ,  "Something went wrong!" ,  "error" )
            </script>
          <?php } endif?>
            <form action="register_action.php" class="p-5 bg-white" method="POST">
              <?php 
              $id_kamar = $_GET['id'];
              ?>
            <input type="hidden" name="id_kamar" value="<?= $id_kamar ?>">
              <h2 class="h4 text-black mb-5" style="text-align: center;">Register Account</h2> 

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="fname">Username</label>
                  <input type="text" id="fname" name="username" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Password</label> 
                  <input type="password" id="subject" name="password" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Retype Password</label> 
                  <input type="password" id="subject" name="repassword" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <hr>    
                </div>
              </div>

              <h2 class="h4 text-black mb-5" style="text-align: center;">Payment Form</h2> 

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Method Pembayaran</label> 
                  <select class="form-control" id="method" name="method">
                  <option value="0">- Method Pembayaran -</option>
                  <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM method");
                          while ($a=mysqli_fetch_array($sql)) {
                              ?>
                              <option value="<?php echo $a['id_method'];?>"><?php echo $a['nama_method'];?></option>
                        <?php } ?>
                  </select>  
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="jumlah">Jumlah Harga</label> 
                  <input type="text" id="jumlah" name="jumlah" value="Pilih method pembayaran terlebih dulu." class="form-control rounded-0" readonly>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="SUBMIT" name="submit" class="btn btn-black btn-block ">
                </div>
              </div>

  
            </form>
          </div>
        
        </div>
        
      </div>
    </div>



  
    <footer class="site-footer bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>CaptKost adalah satu satunya penyedia kamar kost yang paling asik dan santuy. Gimana ngga paling asik. di masa ini cuman CaptKost kost kostan yang punya website pribadi dan member area buat para penghuni kostnya. </p>
              </div>
              <div class="col-md-2 ">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Buat menuhin aja cuy</h2>
                <p>Ini buat menuhin aja biar presisi, abis bingung mau diisi apaan lagi yakan, daripada diisi lorem ipsum lagi bosen ah.</p>
              </div>
            </div>
          </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="index.php" style="color:orange;">CaptKost</a> All rights reserved <br> Made with <i class="icon-heart" style="color:red;" aria-hidden="true"></i> by <a href="https://captrep.dev" style="color:orange;" target="_blank" >Captrep</a> 
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->
  

  
  <script src="admin/js/sweet-alert/sweet-alert.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  
  
  <script src="js/main.js"></script>
  <script>
  var jumlah = <?= $kamar['harga_kamar']; ?>;

    $("#method").change(function () {
      $("#jumlah").val(jumlah);
      if($('#method').val() == 0){
        $("#jumlah").val('Pilih method pembayaran terlebih dulu.');
      }
    });
  </script>

  </body>
</html>
<?php
  } else {
    header("location:index.php");
  }