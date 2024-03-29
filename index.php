<?php
  include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CaptKost &mdash; Kost Kuy!</title>
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
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#kamar-section" class="nav-link">Kamar</a></li>
                <li><a href="#about-section" class="nav-link">About Us</a></li>
                <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                <li><a href="member/login.php" target="_blank" class="nav-link">Member Area</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(images/2.jpg);" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row mb-4">
              <div class="col-md-7">
                <h1>Kost Kuy!</h1>
                <p class="mb-5 lead" >Ngekost disini benefitnya banyak banget, selain lingkungannya yang bersih, banyak mamah muda juga loh mantap kan</p>
                <div>
                  <a href="#kamar-section" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Lihat Kamar</a>
                  <a href="member/login.php" target="_blank" class="btn btn-white py-3 px-5 rounded-0 d-block d-sm-inline-block">Member Area</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center" id="kamar-section">
            <h3 class="section-sub-title">Kamar Tersedia Saat Ini</h3>
            <h2 class="section-title mb-3">Kamar Kost</h2>
            <p>Berikut adalah list kamar kosong di CaptKost untuk saat ini. List kamar dibawah akan terupdate secara realtime dan otomatis, jadi apabila ada penghuni yang keluar akan terupdate otomatis kamarnya disini.</p>
          </div>
        </div>

       <?php
        $qkamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_penghuni = '0'");
        if(mysqli_num_rows($qkamar) <= 0) : ?>
            <div class="site-blocks-cover inner-page-cover overlay get-notification"  style="background-image: url(images/1.jpg); background-attachment: fixed;" data-aos="fade">
             <div class="container">

              <div class="row align-items-center justify-content-center">
                <form class="col-md-7" method="post">
                  <h2>Mohon maaf untuk saat ini semua kamar sedang penuh.</h2>
                  <p>Masukkan email anda untuk mendapatkan notifikasi terbaru apabila ada kamar kosong</p>
                  <div class="d-flex mb-4">
                    <input type="text" class="form-control rounded-0" placeholder="Enter your email address">
                    <input type="submit" class="btn btn-white btn-outline-white rounded-0" value="Subscribe">
                  </div>

                </form>
              </div>

            </div>
          </div>
        <?php else : ?>
        <?php 
        $i = 0;
        while ($kamar = mysqli_fetch_assoc($qkamar)) : 
          $i++;
          if ($i % 2 == 0) { ?>
            <div class="bg-white py-4">
              <div class="row mx-4 my-4 product-item-2 align-items-start">
                <div class="col-md-6 mb-5 mb-md-0 order-1 order-md-2">
                  <img src="admin/img/<?=$kamar['gambar'];?>" alt="Image" class="img-fluid">
                </div>
              
                <div class="col-md-5 mr-auto product-title-wrap order-2 order-md-1">
                  <span class="number">0<?=$i;?>.</span>
                  <h3 class="text-black mb-4 font-weight-bold"><?= $kamar['nama_kamar']; ?></h3>
                  <p class="mb-4"><?= $kamar['deskripsi']; ?></p>
                  <h3 class="section-sub-title">Fasilitas :</h3>
                  <p><?=$kamar['fasilitas'];?></p>
                  
                  <div class="mb-4"> 
                    <h3 class="text-black font-weight-bold h5">Harga:</h3>
                    <div class="price">Rp.<?= number_format($kamar['harga_kamar']);?>,-</div>
                  </div>
                  <p>
                    <a href="register.php?id=<?=$kamar['id_kamar'];?>" class="btn btn-black rounded-0 d-block d-lg-inline-block">Daftar kamar ini</a>
                  </p>
                </div>
              </div>
            </div>
        <?php
           }else{  ?>
            <div class="bg-white py-4 mb-4">
              <div class="row mx-4 my-4 product-item-2 align-items-start">
                <div class="col-md-6 mb-5 mb-md-0">
                  <img src="admin/img/<?=$kamar['gambar'];?>" alt="Image" class="img-fluid">
                </div>
              
                <div class="col-md-5 ml-auto product-title-wrap">
                  <span class="number">0<?=$i;?>.</span>
                  <h3 class="text-black mb-4 font-weight-bold"><?= $kamar['nama_kamar']; ?></h3>
                  <p class="mb-4"><?= $kamar['deskripsi']; ?></p>
                  <h3 class="section-sub-title">Fasilitas :</h3>
                  <p><?=$kamar['fasilitas'];?></p>
                  
                  <div class="mb-4"> 
                    <h3 class="text-black font-weight-bold h5">Harga:</h3>
                    <div class="price">Rp.<?= number_format($kamar['harga_kamar']);?>,-</div>
                  </div>
                  <p>
                  <a href="register.php?id=<?=$kamar['id_kamar'];?>" class="btn btn-black rounded-0 d-block d-lg-inline-block">Daftar kamar ini</a>
                  </p>
                </div>
              </div>
            </div>
          <?php } endwhile ?>
          <?php endif ?>

      </div>
    </div>

    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row align-items-lg-center">
          <div class="col-md-8 mb-5 mb-lg-0 position-relative">
            <img src="images/tron.jpg" class="img-fluid" alt="Image">
            <div class="experience">
              <span class="year">Kost Ternyaman</span>
              <span class="caption">Sejak Tahun 2000</span>
            </div>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="section-sub-title">Merchant Company</h3>
            <h2 class="section-title mb-3">About Us</h2>
            <p class="mb-4">CaptKost adalah satu satunya penyedia kamar kost yang paling asik dan santuy. Gimana ngga paling asik di masa ini cuman CaptKost, kost kostan yang punya website pribadi dan member area buat para penghuni kostnya.</p>
            <p><a href="#" class="btn btn-black btn-black--hover rounded-0">Learn More</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section border-bottom" id="team-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Team</h3>
            <h2 class="section-title mb-3">Leadership</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="person text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded w-75 mb-3">
              <h3>John Rooster</h3>
              <p class="position text-muted">Co-Founder, President</p>
              <p class="mb-4">Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="person text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded w-75 mb-3">
              <h3>Tom Sharp</h3>
              <p class="position text-muted">Co-Founder, COO</p>
              <p class="mb-4">Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="person text-center">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded w-75 mb-3">
              <h3>Winston Hodson</h3>
              <p class="position text-muted">Marketing</p>
              <p class="mb-4">Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Our Services</h3>
            <h2 class="section-title mb-3">Kenapa harus Captkost?</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-pie_chart"></span></div>
              <div>
                <h3>Lokasi Strategis</h3>
                <p>Lokasi kost dekat dengan 100 kampus, 30 Supermarket, 5 Bar, 2 Club malam, dan tempat hiburan lainnya.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-backspace"></span></div>
              <div>
                <h3>Market Analysis</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-av_timer"></span></div>
              <div>
                <h3>Jam Bebas</h3>
                <p>Bebas masuk kost 24 jam, dengan membawa kunci kamar masing-masing</p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-beenhere"></span></div>
              <div>
                <h3>Seller Consulting</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-business_center"></span></div>
              <div>
                <h3>Financial Investment</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-cloud_done"></span></div>
              <div>
                <h3>Financial Management</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Testimonials</h2>
            <h3 class="section-sub-title">Dari para penghuni kost</h3>
            
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">

      <?php 
        $qtesti = mysqli_query($koneksi,"SELECT * FROM testimonial");
        while ($testi = mysqli_fetch_assoc($qtesti)) : ?>
          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="member/img/fotouser/<?=$testi['foto'];?>" alt="Image" class="w-100 img-fluid mb-3"></div>
              </figure>
              <blockquote class="mb-3">
                <p>&ldquo;<?= $testi['isi'];?>.&rdquo;</p>
              </blockquote>
              <p class="text-black"><strong><?= $testi['nama'];?></strong></p>
              
            </div>
          </div>

        <?php endwhile; ?>
        </div>
    </div>

   
    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Contact Form</h3>
            <h2 class="section-title mb-3">Get In Touch</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
              
              <h2 class="h4 text-black mb-5">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control rounded-0">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control rounded-0" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-black rounded-0 py-3 px-4">
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
                <h2 class="footer-heading mb-4">Buat menuhin aja cuy</h2>
                <p>Ini buat menuhin aja biar presisi, abis bingung mau diisi apaan lagi yakan, daripada diisi lorem ipsum lagi bosen ah.</p>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
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
    
  </body>
</html>