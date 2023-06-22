<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hallynime Retreat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/toastr/toastr.min.css">
  <script src="<?= base_url("assets") ?>/jquery/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- Alert Error -->
<?php
  $error = $this->session->flashdata('error');
  if ($error) {
  ?>
    <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000
          });

          Toast.fire({
            icon: 'error',
            title: '&nbsp;<?php echo $error ?>'
          })
        });
    </script>
  <?php }
?>
<!--End Alert Error -->

<!-- Alert Success -->
<?php
  $success = $this->session->flashdata('success');
  if ($success) {
  ?>
    <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000
          });

          Toast.fire({
            icon: 'success',
            title: '&nbsp;<?php echo $success ?>'
          })
        });
    </script>
  <?php }
?>
<!--End Alert Success -->

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Hallynime Retreat</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a  class="logo me-auto me-lg-0"><img src="<?= base_url() ?>assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#home">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="nav-link scrollto" href="#menu">Room</a></li>
            <li><a class="nav-link scrollto" href="#events">Events</a></li>
            <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          </ul>
          <li><a class="nav-link scrollto" href="#menu">Room</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
        </li>
        <li><a class="nav-link scrollto" href="<?php echo site_url ('admin');?>">Admin</a></li>
        <?php if(!$this->session->userdata('isLoggedIn_admin_hr_user')): ?>
          <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
        <?php endif; ?>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="d-flex">
        <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex mx-2">Book a room</a>
        <?php if($this->session->userdata('isLoggedIn_admin_hr_user')): ?>
          <a class="book-a-table-btn dropdown-toggle mx-2" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img style="width:1.5rem;" src="<?= base_url() ?>assets/img/user.png" alt="">
          </a>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profilModal">My Profile</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pesananModal">My Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url() ?>AuthController/logout">LogOut</a></li>
          </ul>
        </div>
      <?php endif; ?>

    </div>
  </header><!-- End Header -->

  <!-- Log In  -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="<?= base_url() ?>AuthController/login" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:grey;">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <input name="email"  type="email" class="form-control" placeholder="Masukkan Email Anda..." autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
            <input name="password"  type="password" class="form-control" autocomplete="off" placeholder="Masukkan Password Anda..." required>
          </div>
        </div>
        <div class="modal-footer">
        <div class="d-flex justify-content-between w-100">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#signupModal" data-bs-toggle="modal" >Sign Up</button>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Sign Up  -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="<?= base_url() ?>AuthController/signup" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:grey;">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <input name="nama" id="text" type="nama" class="form-control" placeholder="Masukkan Nama Anda..." autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
            <input name="email"  type="email" class="form-control" placeholder="Masukkan Email Anda..." autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
            <input name="password"  type="password" class="form-control" autocomplete="off" placeholder="Masukkan Password Anda..." required>
          </div>
        </div>
        <div class="modal-footer">
          <div class="d-flex justify-content-between w-100">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#loginModal" data-bs-toggle="modal" >Log In</button>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php if($this->session->userdata('isLoggedIn_admin_hr_user')): ?>
  <!-- Profil  -->
    <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form class="modal-content" action="<?= base_url() ?>HomeController/updateProfil" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:grey;">Profil Saya</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <input name="nama" id="nama" type="text" class="form-control" value="<?= $this->session->userdata("login_data_admin_hr_user")['nama'] ?>" placeholder="Masukkan Nama Anda..." autocomplete="off" required>
            </div>
            <div class="input-group mb-3">
              <input name="email"  type="email" class="form-control" value="<?= $this->session->userdata("login_data_admin_hr_user")['email'] ?>" placeholder="Masukkan Email Anda..." autocomplete="off" required>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Pesanan  -->
    <div class="modal fade" id="pesananModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" action="<?= base_url() ?>HomeController/updateProfil" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:grey;">Pesanan Saya</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php if ($dataPesanan) { 
              foreach ($dataPesanan as $pesanan) {
              ?>
              <div class="row my-2 border rounded" style="padding:1.5rem;">
                <div class="col-md-8">
                  <img class="img-fluid rounded" src="<?= base_url() ?>admin/assets/images/<?= $pesanan['img_dir'] ?>" alt="">
                </div>
                <div class="col-md-4 text-right">
                  <h5 style="color:grey;"><?= $pesanan['nama_kamar'] ?></h5>
                  <p style="color:lightgrey;"><?= $pesanan['start_date']. ' - '. $pesanan['end_date'] ?></p>
                  <div class="d-flex justify-content-end">
                    <?php if($pesanan['status_bayar']): ?>
                      <button type="button" class="btn btn-success btn-sm mx-2">Sudah Dibayar</button>
                    <?php else: ?>
                      <button type="button" class="btn btn-warning btn-sm mx-2">Belum Dibayar</button>
                    <?php endif; ?>
                    <a href="<?= base_url() ?>HomeController/batalpesan/<?= $pesanan['id'] ?>" class="btn btn-danger btn-sm mx-2">Batalkan Pesanan</a>
                  </div>
                </div>
              </div>
            <?php }}else{ ?>
                <div class="text-center">
                  <h2 style="color:grey;">Data Not Available</h2>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Hallynime</span></h1>
          <h2>Enchanting guests with unparalleled service for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Room</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=PS7ttccHYg8" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="<?= base_url() ?>assets/img/don.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Welcome to our hotel, where your comfort and satisfaction is our top priority.</h3>
            <p class="fst-italic">
            We are proud to present an unforgettable stay with the best service and extraordinary facilities.
            </p>
            <p>
            With our strategic location, you can enjoy easy access to major tourist attractions, shopping centers and other 
            important places. Enjoy the comfort of our elegant rooms equipped with all the modern amenities you need for a comfortable rest.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Our hotel offers a restaurants serving delicious dishes and fresh drinks. By using fresh ingredients and flavors that tempt the taste buds.</li>
              <li><i class="bi bi-check-circle"></i> We also have meeting and event facilities that can accommodate your business and social needs.</li>
              <li><i class="bi bi-check-circle"></i> Our friendly and attentive staff is ready to assist you in your every need, ensuring you feel cared for and cared for throughout your stay at our hotel.</li>
            </ul>
            <p>
            We are proud to welcome you to our hotel, a place where comfort meets hospitality and guest satisfaction is our main goal.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Rooms</h2>
          <p>Our Room Facilities</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php if ($dataRoom) { 
              foreach ($dataRoom as $row) { ?>
                <div class="swiper-slide">
                  <div class="row event-item">
                    <div class="col-lg-6">
                      <img src="<?= base_url() ?>admin/assets/images/<?= $row['img_dir'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                      <h3><?= $row['nama'] ?></h3>
                      <div class="price">
                        <p><span>Rp. <?= $row['harga'] ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } }else{ ?>
              <div class="text-center">
                <h3>Data Not Available</h3>
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Retreat</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <!-- start event wedding -->
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="<?= base_url() ?>assets/img/eve-wed.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Wedding Party</h3>
                  <div class="price">
                    <p><span>Rp.60000000</span></p>
                  </div>
                  <p class="fst-italic">
                  A wedding party or wedding party is one of the banquet events that can be sold by a sales and marketing staff. 
                  Usually, the sales and marketing department will make a promo price for holding a wedding party at the hotel and 
                  provide a free form
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> One night stay for married couples to enjoy honeymoon at the hotel.</li>
                  </ul>
                </div>
              </div>
            </div><!-- End event wedding -->

            <!-- start event meeting -->
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="<?= base_url() ?>assets/img/eve-meet.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Meeting</h3>
                  <div class="price">
                    <p><span>Rp.1500000</span></p>
                  </div>
                  <p class="fst-italic">
                  Meetings are the best-selling banquet events ordered by government agencies and companies. 
                  This meeting or meeting is divided into 2 namely half day meeting and full day meeting.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Half day meeting is the use of a meeting room for a half day meeting. It usually starts at 08.00 and ends at 12.00. 1x coffee break, 1x lunch.</li>
                    <li><i class="bi bi-check-circled"></i>Full day meeting is the use of a meeting room for a full day meeting. 2-3x coffee break, 1x lunch, 1x dinner</li>
                  </ul>
                </div>
              </div>
            </div><!-- End meeting event -->

            <!-- start event gathering -->
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="<?= base_url() ?>assets/img/eve-gath.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Gathering</h3>
                  <div class="price">
                    <p><span>Rp.700000</span></p>
                  </div>
                  <p class="fst-italic">
                  Events that are usually carried out side by side with meals. Be it lunch or dinner. However, what is often done is dinner gathering, considering that during the 
                  lunch period the invitees are still working. Examples of gatherings include social gathering gathering events, apartment sales launch 
                  events, new product launches for bank customers. Basically while they were eating, while they were listening to the ongoing presentation
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <!-- start event Exhibition-->
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="<?= base_url() ?>assets/img/eve-exeb.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Exhibition</h3>
                  <div class="price">
                    <p><span>Rp.2500000</span></p>
                  </div>
                  <p class="fst-italic">
                  Exhibitions to display works of art or products from a brand which are then offered to invitees who come to an event. 
                  In this exhibition event, the price of the products being exhibited is usually cheaper than the normal price sold in stores.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Art exhibition.</li>
                    <li><i class="bi bi-check-circled"></i> Fashion exhibition.</li>
                    <li><i class="bi bi-check-circled"></i> Craft exhibition.</li>
                    <li><i class="bi bi-check-circled"></i> Automotive exhibition.</li>
                    <li><i class="bi bi-check-circled"></i> Beauty exhibition.</li>
                  </ul>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Retreat</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/1.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/1.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/4.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/4.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/5.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/5.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/6.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/6.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/8.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/8.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/10.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/10.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/11.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/11.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/13.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/13.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>          

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/14.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/14.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/16.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/16.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/17.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/17.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url() ?>assets/img/gallery/18.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="<?= base_url() ?>assets/img/gallery/18.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book a Room</p>
        </div>

        <form action="<?= base_url() ?>HomeController/bookroom" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Start Date:</label>
                    <input type="date" name="start_date" class="form-control" style="background:#46433d!important;" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">End Date:</label>
                    <input type="date" name="end_date" class="form-control" style="background:#46433d!important;" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Available Rooms:</label>
                <select name="room" class="form-control" style="border-radius: 0;box-shadow: none;font-size: 14px;background: #46433d;border-color: #625b4b;color: white;" required>
                  <option disabled selected>Choose Available Room</option>
                  <?php if ($dataRoomTersedia) { 
                    foreach ($dataRoomTersedia as $key) {
                    ?>
                      <option value="<?= $key['id'] ?>"><?= $key['nama'].' - Rp.'.$key['harga'] ?></option>
                  <?php }}else{ ?>
                    <option>Not Availiable</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="nama" class="form-control" id="nama_pemesan" placeholder="Your Name" value="<?= $this->session->userdata("login_data_admin_hr_user") ? $this->session->userdata("login_data_admin_hr_user")['nama'] : '' ?>" style="background:#46433d!important;" required>
              </div>
              <div class="form-group">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control" id="email_pemesan" placeholder="Your Email" value="<?= $this->session->userdata("login_data_admin_hr_user") ? $this->session->userdata("login_data_admin_hr_user")['email'] : '' ?>" style="background:#46433d!important;" required>
              </div>
              <div class="form-group">
                <label for="">Phone Number:</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Your Phone Number" style="background:#46433d!important;" required>
              </div>
            </div>
          </div>
          <br>
          <br>
          <div class="text-center mt-10"><button type="submit">Book a Room</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I am very impressed with the excellent service at this hotel. The staff is friendly and ready to help with all our requests. 
                  Apart from that, our room was very comfortable and clean. Our stay at this hotel really made us feel special.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= base_url() ?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Business</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I can't say enough about this hotel. The food in the restaurant is very delicious and the variety of menu served is very appetizing. 
                  Apart from that, the gym and pool facilities are great. So glad I chose this hotel for my vacation.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= base_url() ?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I have attended a conference at this hotel and I was very impressed with the meeting facilities they have. All rooms are equipped with 
                  state-of-the-art equipment and the team of event staff are very helpful in making sure things run smoothly. This hotel is truly the perfect place to host a business event.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= base_url() ?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  We have stayed at this hotel during our family vacation and our experience was really great. Our children are very happy with the play facilities available and the hotel 
                  staff are very friendly to them. We look forward to returning to this hotel in the future.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= base_url() ?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>hallynime@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <!-- <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div> -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Restaurantly</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> hallynime@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Hallynime</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets'); ?>/toastr/toastr.min.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>