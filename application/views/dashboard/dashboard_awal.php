<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Warung Adilaya</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url().'assets/assets_db/img/favicon.png'?>" rel="icon">
  <link href="<?php echo base_url().'assets/assets_db/img/apple-touch-icon.png'?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url().'assets/assets_db/vendor/animate.css/animate.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/assets_db/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/assets_db/vendor/bootstrap-icons/bootstrap-icons.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/assets_db/vendor/boxicons/css/boxicons.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/assets_db/vendor/glightbox/css/glightbox.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/assets_db/vendor/swiper/swiper-bundle.min.css'?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url().'assets/assets_db/css/style.css'?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+62 85712345678</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Senin - Minggu: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="<?php echo base_url('Dashboard')?>">Warung Adilaya</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeri Foto</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Koki</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/assets_db/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Warung</span> Adilaya</h2>
                <p class="animate__animated animate__fadeInUp">Warung dengan menu - menu spesial yang menggabungkan citarasa nusantara. Dengan menu utama yang berfokus pada sambal.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Semua Menu</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/asstes_db/img/about.jpg");'>
            <!-- <a href="#" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Sejarah dari <strong>Warung Adilaya</strong></h3>
              <p>
                Warung Adilaya berdiri mulai dari tahun 2021
              </p>
              <p class="fst-italic">
                Tujuan dari didirikannya warung ini adalah untuk menciptakan variasi - variasi makanan baru yang ada di Indonesia. Khususnya untuk makanan yang berfokus utama pada olahan sambal.
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Rasa Terjamin.</li>
                <li><i class="bx bx-check-double"></i> Kualitas Premium.</li>
                <li><i class="bx bx-check-double"></i> Harga Bersahabat.</li>
              </ul>
              <p>
                Merupakan moto utama kami dalam membuka warung ini.
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Semua <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-ayam">Ayam</li>
              <li data-filter=".filter-daging">Daging</li>
              <li data-filter=".filter-pindang">Pindang</li>
              <li data-filter=".filter-telur">Telur Bakso</li>
              <li data-filter=".filter-udang">Udang</li>
              <li data-filter=".filter-lele">Lele</li>
              <li data-filter=".filter-cumi">Cumi</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container">

          <div class="col-lg-6 menu-item filter-ayam">
            <div class="menu-content">
              <a href="#">Oseng Ayam Kemangi</a><span>Rp 21.200</span>
            </div>
            <div class="menu-ingredients">
              Olahan daging ayam yang dibumbui dengan sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-ayam">
            <div class="menu-content">
              <a href="#">Oseng Ayam Pete</a><span>Rp 27.700</span>
            </div>
            <div class="menu-ingredients">
              Olahan daging ayam yang dibumbui dengan sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-ayam">
            <div class="menu-content">
              <a href="#">Oseng Ayam Balado</a><span>Rp 21.200</span>
            </div>
            <div class="menu-ingredients">
              Olahan daging ayam yang dibumbui dengan sambal khusus ditambah dengan perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-ayam">
            <div class="menu-content">
              <a href="#">Ayam Goreng Sambal Bawang</a><span>Rp 19.350</span>
            </div>
            <div class="menu-ingredients">
              Olahan daging ayam yang digoreng dengan bumbu kuning disajikan dengan sambal bawang.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-daging">
            <div class="menu-content">
              <a href="#">Oseng Daging Kemangi</a><span>Rp 20.300</span>
            </div>
            <div class="menu-ingredients">
              Olahan daging sapi yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-daging">
            <div class="menu-content">
              <a href="#">Oseng Daging Balado</a><span>Rp 20.300</span>
            </div>
            <div class="menu-ingredients">
            Olahan daging sapi yang diolah dengan bumbu sambal khusus ditambah perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-daging">
            <div class="menu-content">
              <a href="#">Oseng Daging Pete</a><span>Rp 26.800</span>
            </div>
            <div class="menu-ingredients">
            Olahan daging sapi yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-pindang">
            <div class="menu-content">
              <a href="#">Oseng Pindang Kemangi</a><span>Rp 19.700</span>
            </div>
            <div class="menu-ingredients">
            Olahan suir pindang yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-pindang">
            <div class="menu-content">
              <a href="#">Nasi Oseng Pindang Pete</a><span>Rp 25.500</span>
            </div>
            <div class="menu-ingredients">
            Olahan suir pindang yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-pindang">
            <div class="menu-content">
              <a href="#">Nasi Oseng Pindang Balado</a><span>Rp 19.700</span>
            </div>
            <div class="menu-ingredients">
            Olahan suir pindang yang diolah dengan bumbu sambal khusus ditambah perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-telur">
            <div class="menu-content">
              <a href="#">Oseng Telur Bakso Kemangi</a><span>Rp 20.300</span>
            </div>
            <div class="menu-ingredients">
            Olahan suir pindang yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-telur">
            <div class="menu-content">
              <a href="#">Oseng Telur Bakso Pete</a><span>Rp 26.800</span>
            </div>
            <div class="menu-ingredients">
            Olahan bakso dan telur yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-telur">
            <div class="menu-content">
              <a href="#">Nasi Oseng Telur Bakso Balado</a><span>Rp 20.300</span>
            </div>
            <div class="menu-ingredients">
            Olahan bakso dan telur yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-telur">
            <div class="menu-content">
              <a href="#">Telur Bakso Sambal Bawang</a><span>Rp 18.450</span>
            </div>
            <div class="menu-ingredients">
            Olahan bakso dan telur yang diolah dengan bumbu khusus dan disajikan dengan sambal bawang.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-udang">
            <div class="menu-content">
              <a href="#">Oseng Udang Kemangi</a><span>Rp 27.950</span>
            </div>
            <div class="menu-ingredients">
            Olahan udang yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-udang">
            <div class="menu-content">
              <a href="#">Oseng Udang Pete</a><span>Rp 34.450</span>
            </div>
            <div class="menu-ingredients">
            Olahan udang yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-udang">
            <div class="menu-content">
              <a href="#">Oseng Udang Balado</a><span>Rp 27.950</span>
            </div>
            <div class="menu-ingredients">
            Olahan udang yang diolah dengan bumbu khusus dan ditambah perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-udang">
            <div class="menu-content">
              <a href="#">Udang Sambal Bawang</a><span>Rp 26.100</span>
            </div>
            <div class="menu-ingredients">
            Olahan udang yang diolah dengan bumbu khusus dan disajikan dengan sambal bawang.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-lele">
            <div class="menu-content">
              <a href="#">Oseng Lele Kemangi</a><span>Rp 20.350</span>
            </div>
            <div class="menu-ingredients">
            Olahan lele yang diolah dengan bumbu sambal kemangi yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-lele">
            <div class="menu-content">
              <a href="#">Oseng Lele Pete</a><span>Rp 24.350</span>
            </div>
            <div class="menu-ingredients">
            Olahan lele yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-lele">
            <div class="menu-content">
              <a href="#">Oseng Lele Balado</a><span>Rp 20.350</span>
            </div>
            <div class="menu-ingredients">
            Olahan lele yang diolah dengan bumbu khusus dan ditambah perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-lele">
            <div class="menu-content">
              <a href="#">Lele Goreng Sambel Bawang</a><span>Rp 17.950</span>
            </div>
            <div class="menu-ingredients">
            Olahan lele yang diolah dengan bumbu khusus dan disajikan dengan sambel bawang.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-cumi">
            <div class="menu-content">
              <a href="#">Oseng Cumi Hitam</a><span>Rp 22.500</span>
            </div>
            <div class="menu-ingredients">
            Olahan cumi yang diolah dengan bumbu khusus dan ditambah perasan jeruk limau.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-cumi">
            <div class="menu-content">
              <a href="#">Oseng Cumi Hitam Pete</a><span>Rp 29.000</span>
            </div>
            <div class="menu-ingredients">
            Olahan cumi yang diolah dengan bumbu sambal pete yang khas.
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Beberapa Foto Suasana <span>Warung Adilaya</span></h2>
          <p>Berikut gambaran suasana yang ada di Warung Adilaya.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-1.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-7.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/assets_db/img/gallery/gallery-8.jpg" class="gallery-lightbox">
                <img src="assets/assets_db/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container">

        <div class="section-title">
          <h2>Profesional <span>Koki</span></h2>
          <p>Berikut adalah beberapa koki yang ada di Warung Adilaya.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/assets_db/img/chefs/chefs-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Master Chef</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/assets_db/img/chefs/chefs-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Patissier</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/assets_db/img/chefs/chefs-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cook</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Kontak</span> Kami</h2>
          <p>Berikut adalah alamat Warung Adilaya.</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Jalan Kenanga 14 Badran <br>Surakarta</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Buka dari:</h4>
              <p>Senin-Minggu:<br>11:00 AM - 23:00 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com<br>contact@example.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+62 85712345678<br>+62 81234234434</p>
            </div>
          </div>
        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Warung Adilaya</h3>
      <!-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p> -->
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url().'assets/assets_db/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/assets_db/vendor/glightbox/js/glightbox.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/assets_db/vendor/isotope-layout/isotope.pkgd.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/assets_db/vendor/php-email-form/validate.js'?>"></script>
  <script src="<?php echo base_url().'assets/assets_db/vendor/swiper/swiper-bundle.min.js'?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url().'assets/assets_db/js/main.js'?>"></script>

</body>

</html>