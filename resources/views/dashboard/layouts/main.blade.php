<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AL-AKHYAR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


          <!-- Site favicon -->
          <link rel="shortcut icon" href="{{ asset ('landing/images/favicon.ico') }}" />

          <!-- Light-box -->
          <link rel="stylesheet" href="{{ asset ('landing/css/mklb.css') }}" type="text/css" />
  
          <!-- Swiper js -->
          <link rel="stylesheet" href="{{ asset ('landing/css/swiper-bundle.min.css') }}" type="text/css" />
  
          <!--Material Icon -->
          <link rel="stylesheet" type="text/css" href="{{ asset ('landing/css/materialdesignicons.min.css') }}" />
  
          <link rel="stylesheet" href="{{ asset ('landing/css/bootstrap.min.css') }}" type="text/css" />
          <link rel="stylesheet" type="text/css" href="{{ asset ('landing/css/style.css') }}" />

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">

         <!--Navbar Start-->
         <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky-dark" id="navbar-sticky">
          <div class="container">
              <!-- LOGO -->
              <a class="logo text-uppercase" href="{{ url ('/') }}">
                  <img src="{{ asset ('landing/images/logohitam1.png') }}" alt="" />
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="mdi mdi-menu"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav ms-auto navbar-center" id="mySidenav">
                      <li class="nav-item">
                          <a href="#home" class="nav-link">Home</a>
                      </li>
                      <li class="nav-item">
                        <a href="#pendaftaran" class="nav-link">Pendaftaran</a>
                    </li>

                      <li class="nav-item">
                          <a href="#galeri" class="nav-link">Galeri</a>
                      </li>
                      <li class="nav-item">
                          <a href="#testimonial" class="nav-link">Testimonial</a>
                      </li>
                      <li class="nav-item">
                          <a href="#team" class="nav-link">Team</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- Navbar End -->

 <!-- home-agency start -->
 <section class="hero-agency" id="home">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <div class="hero-title-badge mb-3">
              <a href="https://wa.me/082932403284" class="text-primary" target="_blank" style="text-decoration: none;">
                  <span class="text-primary">10% off </span> Pendaftaran
              </a>
          </div>              <!-- Teks untuk Desktop -->
              <h1 class="hero-title fw-bold mb-4 d-none d-md-block">Selamat Datang di Pondok Pesantren AL-AKHYAR</h1>
              <!-- Teks untuk Mobile -->
              <h1 class="hero-title fw-bold mb-4 d-block d-md-none" style="font-size: 1px;">الأخيار</h1>
              <!-- Teks untuk Desktop -->
              <p class="text-muted mb-5 fs-18 d-none d-md-block">Pondok Pesantren AL-AKHYAR adalah lembaga pendidikan yang berkomitmen dalam mencetak generasi yang berakhlak mulia, berwawasan luas, dan berkemampuan tinggi dalam ilmu agama serta ilmu pengetahuan umum. Mari bergabung bersama kami dan menjadi bagian dari perubahan yang positif untuk masa depan yang gemilang.</p>
              <!-- Teks untuk Mobile -->
              <p class="text-muted mb-5 fs-18 d-block d-md-none">Daftar sekarang di Pondok AL-AKHYAR dan raih masa depan yang cerah bersama kami.</p>
              <div class="d-flex align-items-center mb-4 mb-lg-0">
                <a href="{{ route('profilepondok') }}" target="_blank" class="btn btn-gradient-success rounded-pill me-4" download="profile.pdf">Download Profile PDF <i class="mdi mdi-chevron-right ms-1"></i></a>
                <a href="javascript:void(0);" class="text-secondary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#watchvideomodal">
                      Video <i class="mdi mdi-motion-play-outline h1 mb-0 ms-2"></i>
                  </a>

                  <div class="modal fade bd-example-modal-lg" id="watchvideomodal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content video-modal">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FIqtKUk-bIs" allowfullscreen></iframe>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Modal -->
              </div>
          </div>
          <div class="col-lg-6 d-none d-lg-block">
            <img src="{{ asset('landing/images/agency/heroku.png') }}" alt="" class="img-fluid" />
        </div>
      </div>
  </div>
</section>
<!-- home-agency end -->

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

<!-- Wrapper Utama -->
<div class="main-content">
  <!-- Konten Halaman Anda -->
  <!-- team start -->
  <section class="section" id="team">
      <!-- Konten team... -->
  </section>
  <!-- team end -->

  <!-- footer & cta start -->
  <section class="footer bg-light">
      <div class="cta-content">
          <div class="container">
              <div class="row bg-dark cta-bg p-5 rounded align-items-center">
                  <div class="col-lg-6">
                      <h3 class="text-white fs-26 mb-3">Berlangganan Newsletter Kami</h3>
                      <p class="text-white opacity-75 mb-4 mb-lg-0">Dapatkan informasi terbaru tentang kegiatan dan program di Pondok Pesantren Al-Akhyar.</p>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                      <div class="subscribe-form">
                          <i class="mdi mdi-email-outline form-icon"></i>
                          <input type="email" class="form-control" id="newsletterEmail" placeholder="Masukkan Alamat Email" />
                          <a href="javascript:void(0);" class="btn btn-primary form-btn">Berlangganan</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <br>
      <br>
      <br>
      <div class="container">
          <div class="row">
              <div class="col-lg-3 text-center text-lg-start">
                  <div class="footer-logo mb-4">
                      <a href="#">
                          <img src="{{ asset ('landing/images/logohitamfooter.png') }}" alt="Logo Pondok Al-Akhyar" />
                      </a>
                  </div>
                  <a href="mailto:info@pondokal-akhyar.com" class="text-muted">info@pondokalakhyar.net</a>
                  <p class="text-muted">+62-123-4567-890</p>
              </div>
          <div class="col-lg-9">
              <div class="row">
                  <div class="col-sm-6 col-md-3">
                      <h5 class="fs-22 mb-3 fw-semibold">Tentang Kami</h5>
                      <ul class="list-unstyled footer-nav">
                          <li><a href="javascript:void(0);" class="footer-link">Sejarah</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Visi & Misi</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Struktur Organisasi</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Program Pendidikan</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Fasilitas</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-6 col-md-3">
                      <h5 class="fs-22 mb-3 fw-semibold">Informasi</h5>
                      <ul class="list-unstyled footer-nav">
                          <li><a href="javascript:void(0);" class="footer-link">Jadwal Kegiatan</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Berita Terbaru</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Pengumuman</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Galeri</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Kontak</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-6 col-md-3">
                      <h5 class="fs-22 mb-3 fw-semibold">Program</h5>
                      <ul class="list-unstyled footer-nav">
                          <li><a href="javascript:void(0);" class="footer-link">Tahfidz Al-Quran</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Madrasah Diniyah</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Ekstrakurikuler</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Kegiatan Sosial</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Kegiatan Olahraga</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-6 col-md-3">
                      <h5 class="fs-22 mb-3 fw-semibold">Kebijakan</h5>
                      <ul class="list-unstyled footer-nav">
                          <li><a href="javascript:void(0);" class="footer-link">Kebijakan Privasi</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Syarat dan Ketentuan</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Pedoman Komunitas</a></li>
                          <li><a href="javascript:void(0);" class="footer-link">Pedoman Hukum</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- footer & cta end -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" class="back-to-top-btn btn btn-dark" id="back-to-top"><i class="mdi mdi-chevron-up"></i></a>

          <!-- javascript -->
          <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
          <!-- Portfolio filter -->
          <script src="{{ asset('landing/js/filter.init.js') }}"></script>
          <!-- Light-box -->
          <script src="{{ asset('landing/js/mklb.js') }}"></script>
          <!-- swiper -->
          <script src="{{ asset('landing/js/swiper-bundle.min.js') }}"></script>
          <script src="{{ asset('landing/js/swiper.js') }}"></script>
  
          <!-- counter -->
          <script src="{{ asset('landing/js/counter.init.js') }}"></script>
          <script src="{{ asset('landing/js/app.js') }}"></script>
          <!-- Include PureCounter.js -->
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script>
    new PureCounter();
</script>
</body>

</html>
