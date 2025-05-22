<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selamat Datang Di Website PapayaTechr</title>

  <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logopapaya.png" type="image/png" />

  <link rel="stylesheet" href="{{ asset('landingpages') }}/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('landingpages') }}/assets/css/animate.css" />
  <link rel="stylesheet" href="{{ asset('landingpages') }}/assets/css/lineicons.css" />
  <link rel="stylesheet" href="{{ asset('landingpages') }}/assets/css/ud-styles.css" />

</head>

<body>
  <header class="ud-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">

            <a href="javascript:location.reload()" class="ud-footer-logo me-3">
              <img
                src="{{ asset('landingpages') }}/assets/images/logo/Group 1.svg"
                alt="logo"
                style="height: 60px; transition: transform 0.3s ease, opacity 0.3s ease;"
                onmouseover="this.style.transform='scale(1.1)'; this.style.opacity='0.9';"
                onmouseout="this.style.transform='scale(1)'; this.style.opacity='1';"
              />
            </a>

            <button class="navbar-toggler">
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
            </button>

            <div class="navbar-collapse">
              <ul id="nav" class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#home">Beranda</a>
                </li>

                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#about">Profil</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#team">Tim</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#contact">Kontak</a>
                </li>
                <li class="nav-item nav-item-has-children">
                  <a href="javascript:void(0)"> Halaman </a>
                  <ul class="ud-submenu">
                    <li class="ud-submenu-item">
                      <a href="{{ route('about') }}" class="ud-submenu-link">
                        Halaman Profil
                      </a>
                    </li>
                    <li class="ud-submenu-item">
                      <a href="{{ route('contact') }}" class="ud-submenu-link">
                        Hubungi Kami
                      </a>
                    </li>
                    <li class="ud-submenu-item">
                      <a href="{{ route('login') }}" class="ud-submenu-link">
                        Halaman Login
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

            <!-- Tombol Login dan Register -->
            <div class="navbar-btn d-none d-sm-inline-block">
              <a href="{{ route('login') }}" class="btn btn-primary">
                Login
              </a>
              <a href="{{ route('register') }}" class="btn btn-secondary ml-2">
                Register
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
</body>
            <style>
  .btn {
    background-color: #ffffff; /* Warna awal biru */
    color: black; /* Warna teks putih */
    border: 1px solid orange; /* Warna border biru */
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }

  .btn:hover {
    background-color: orange; /* Warna berubah menjadi oren saat hover */
    color: black; /* Warna teks berubah menjadi hitam saat hover */
  }

  i {
    font-size: 18px;
    margin-right: 5px;
  }
</style>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <section class="ud-hero" id="home">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
          <h1 class="ud-hero-title">
    Deteksi Kematangan Buah Pepaya <br> 
    Dengan Menggunakan Metode CNN
</h1>
          </div>
          <div class="ud-hero-brands-wrapper wow fadeInUp" data-wow-delay=".3s">
          </div>
          <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">

            <img src="{{ asset('landingpages') }}/assets/images/hero/dashboard.png" alt="hero-image" />

            <img src="{{ asset('landingpages') }}/assets/images/hero/dotted-shape.svg" alt="shape"
              class="shape shape-1" />
            <img src="{{ asset('landingpages') }}/assets/images/hero/dotted-shape.svg" alt="shape"
              class="shape shape-2" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="features" class="ud-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
         <div class="ud-section-title">
    <span>Fitur Utama</span>
    <h2>Deteksi Kematangan Buah Pepaya</h2>
    <p>
        Fitur-fitur ini dirancang untuk membantu dalam proses deteksi kematangan buah pepaya 
        menggunakan metode Convolutional Neural Network (CNN) secara efisien dan efektif.
    </p>
</div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-sm-6">

        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-feature wow fadeInUp" data-wow-delay=".2s">
            <div class="ud-feature-icon">
              <i class="lni lni-layout"></i>
            </div>
            <div class="ud-feature-content">
    <h3 class="ud-feature-title">Analisis Gambar Kematangan</h3>
    <p class="ud-feature-desc">
        Fitur ini memungkinkan pengguna untuk mengunggah gambar buah pepaya dan mendapatkan 
        analisis otomatis mengenai tingkat kematangan berdasarkan model CNN yang telah dilatih.
    </p>
</div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-feature wow fadeInUp" data-wow-delay=".25s">
            <div class="ud-feature-icon">
              <i class="lni lni-layers"></i>
            </div>
            <div class="ud-feature-content">
    <h3 class="ud-feature-title">Pemantauan Kematangan Secara Real-Time</h3>
    <p class="ud-feature-desc">
        Fitur ini memberikan pemantauan real-time terhadap kematangan buah pepaya, 
        memungkinkan pengguna untuk mengambil keputusan cepat berdasarkan data terkini 
        dan akurat.
    </p>
</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="ud-about">
    <div class="container">
      <div class="ud-about-wrapper wow fadeInUp" data-wow-delay=".2s">
        <div class="ud-about-content-wrapper">
          <div class="ud-about-content">
            <h2>PAPAYA TECH
            </h2>
            <p>
            Website Deteksi Kematangan Buah Pepaya adalah sebuah platform digital yang dirancang khusus untuk "
            </p>
            <a href="{{ route('about') }}" class="ud-main-btn">
              Selengkapnya
            </a>
          </div>
        </div>
        <div class="ud-about-image">  
          <img src="{{ asset('landingpages') }}/assets/images/about/papaya11.svg" alt="about-image" />
        </div>
      </div>
    </div>
  </section>

  

  <section id="team" class="ud-team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title mx-auto text-center">
            <span>Tim Kami</span>
            <p>
  
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-team wow fadeInUp" data-wow-delay=".1s">
            <div class="ud-team-image-wrapper">
              <div class="ud-team-image">
                <img src="{{ asset('landingpages') }}/assets/images/team/team-01.png" alt="team" />
              </div>

              <img src="{{ asset('landingpages') }}/assets/images/team/dotted-shape.svg" alt="shape"
                class="shape shape-1" />
              <img src="{{ asset('landingpages') }}/assets/images/team/shape-2.svg" alt="shape" class="shape shape-2" />
            </div>
            <div class="ud-team-info">
              <h5>Mohammad Sayyidi</h5>
              <h6></h6>
            </div>
            <ul class="ud-team-socials">
              <li>
                <a href="https://www.instagram.com/sayyyidi_/">
                  <i class="lni lni-instagram-filled"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-team wow fadeInUp" data-wow-delay=".15s">
            <div class="ud-team-image-wrapper">
              <div class="ud-team-image">
                <img src="{{ asset('landingpages') }}/assets/images/team/team-02.png" alt="team" />
              </div>

              <img src="{{ asset('landingpages') }}/assets/images/team/dotted-shape.svg" alt="shape"
                class="shape shape-1" />
              <img src="{{ asset('landingpages') }}/assets/images/team/shape-2.svg" alt="shape" class="shape shape-2" />
            </div>
            <div class="ud-team-info">
              <h5>Rendy Maulana</h5>
              <h6></h6>
            </div>
            <ul class="ud-team-socials">
              <li>
                <a href="https://www.instagram.com/ren.dayyyyy/">
                  <i class="lni lni-instagram-filled"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-team wow fadeInUp" data-wow-delay=".2s">
            <div class="ud-team-image-wrapper">
              <div class="ud-team-image">
                <img src="{{ asset('landingpages') }}/assets/images/team/team-03.png" alt="team" />
              </div>

              <img src="{{ asset('landingpages') }}/assets/images/team/dotted-shape.svg" alt="shape"
                class="shape shape-1" />
              <img src="{{ asset('landingpages') }}/assets/images/team/shape-2.svg" alt="shape" class="shape shape-2" />
            </div>
            <div class="ud-team-info">
              <h5>Fahmi Fahreza</h5>
              <h6></h6>
            </div>
            <ul class="ud-team-socials">
              <li>
                <a href="https://www.instagram.com/reezzaaaa__/">
                  <i class="lni lni-instagram-filled"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-team wow fadeInUp" data-wow-delay=".25s">
            <div class="ud-team-image-wrapper">
              <div class="ud-team-image">
                <img src="{{ asset('landingpages') }}/assets/images/team/team-04.png" alt="team" />
              </div>

              <img src="{{ asset('landingpages') }}/assets/images/team/dotted-shape.svg" alt="shape"
                class="shape shape-1" />
              <img src="{{ asset('landingpages') }}/assets/images/team/shape-2.svg" alt="shape" class="shape shape-2" />
            </div>
            <div class="ud-team-info">
              <h5>Caesar Ali</h5>
              <h6></h6>
            </div>
            <ul class="ud-team-socials">
              <li>
                <a href="https://www.instagram.com/alicaesar42/">
                  <i class="lni lni-instagram-filled"></i>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".25s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="{{ asset('landingpages') }}/assets/images/team/team-04.png" alt="team" />
                </div>
                <img src="{{ asset('landingpages') }}/assets/images/team/dotted-shape.svg" alt="shape"
                  class="shape shape-1" />
                <img src="{{ asset('landingpages') }}/assets/images/team/shape-2.svg" alt="shape"
                  class="shape shape-2" />
              </div>
              <div class="ud-team-info">
                <h5>Rayhan Cahyadi</h5>
                <h6></h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://www.instagram.com/reyyudahbaligh_/">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="ud-contact">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-8 col-lg-7">
          <div class="ud-contact-content-wrapper">
            <div class="ud-contact-title">
              <span> Kontak Kami <br> Tim kami siap membantu Anda <br> Silakan hubungi kami menggunakan informasi kontak
                pesan</span>
              <h2>
                Informasi Terkait
              </h2>
            </div>
            <div class="ud-contact-info-wrapper">
              <div class="ud-single-info">
                <div class="ud-info-icon">
                  <i class="lni lni-map-marker"></i>
                </div>
                <div class="ud-info-meta">
                  <h5>lokasi</h5>
                  <p></p>
                </div>
              </div>
              <div class="ud-single-info">
                <div class="ud-info-icon">
                  <i class="lni lni-envelope"></i>
                </div>
                <div class="ud-info-meta">
                  <h5>Apa yang bisa kami bantu?</h5>
                  <p></p>
                  <p>Telepon:  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
    <div class="shape shape-1">
      <img src="{{ asset('landingpages') }}/assets/images/footer/shape-1.svg" alt="shape" />
    </div>
    <div class="shape shape-2">
      <img src="{{ asset('landingpages') }}/assets/images/footer/shape-2.svg" alt="shape" />
    </div>
    <div class="shape shape-3">
      <img src="{{ asset('landingpages') }}/assets/images/footer/shape-3.svg" alt="shape" />
    </div>
    <div class="ud-footer-widgets">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="ud-widget">
              <a href="index.html" class="ud-footer-logo">
                <img src="{{ asset('landingpages') }}/assets/images/logo/Group 1.svg" alt="logo" />
              </a>
              <p class="ud-widget-desc">
    Website ini bertujuan untuk meningkatkan efisiensi, akurasi, dan kecepatan dalam proses deteksi kematangan buah pepaya, serta memberikan informasi yang transparan dan mudah diakses bagi petani dan pengelola hasil pertanian.
</p>
              <ul class="ud-widget-socials">
                <li>
                  <a href="https://www.facebook.com/">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com//">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
            <div class="ud-widget">
              <h5 class="ud-widget-title">Menu Utama</h5>
              <ul class="ud-widget-links">
                <li>
                  <a href="#home">Beranda</a>
                </li>
                <li>
                  <a href="#about">Profil</a>
                </li>
                <li>
                  <a href="#team">Tim</a>
                </li>
                <li>
                  <a href="#contact">Kontak</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
            <div class="ud-widget">
              <h5 class="ud-widget-title">Fitur Utama</h5>
              <ul class="ud-widget-links">
                <li>
                  <a href="#home">Analisis Gambar Kematangan</a>
                </li>
                <li>
                  <a href="#home">Pemantauan Kematangan Secara Real-Time</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ud-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <ul class="ud-footer-bottom-left">
              <li>
                <a href="#team">Tim Servis</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <p class="ud-footer-bottom-right">
              Selamat Datang Di Website PAPAYA TECH
              <a href="/" rel="nofollow"> </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="javascript:void(0)" class="back-to-top">
    <i class="lni lni-chevron-up"> </i>
  </a>


  <script src="{{ asset('landingpages') }}/assets/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('landingpages') }}/assets/js/wow.min.js"></script>
  <script src="{{ asset('landingpages') }}/assets/js/main.js"></script>
  <script>
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
      elem.addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector(elem.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
          offsetTop: 1 - 60,
        });
      });
    });

    function onScroll(event) {
      const sections = document.querySelectorAll(".ud-menu-scroll");
      const scrollPos =
        window.pageYOffset ||
        document.documentElement.scrollTop ||
        document.body.scrollTop;

      for (let i = 0; i < sections.length; i++) {
        const currLink = sections[i];
        const val = currLink.getAttribute("href");
        const refElement = document.querySelector(val);
        const scrollTopMinus = scrollPos + 73;
        if (
          refElement.offsetTop <= scrollTopMinus &&
          refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
        ) {
          document
            .querySelector(".ud-menu-scroll")
            .classList.remove("active");
          currLink.classList.add("active");
        } else {
          currLink.classList.remove("active");
        }
      }
    }

    window.document.addEventListener("scroll", onScroll);
  </script>
</body>

</html>

