<template>
  <div>
    <!-- ======= Hero Section ======= -->
    <section
      id="hero"
      class="d-flex flex-column justify-content-end align-items-center"
    >
      <div
        id="heroCarousel"
        data-bs-interval="5000"
        class="container carousel carousel-fade"
        data-bs-ride="carousel"
      >
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">
              Welcome to <span>Ruang Mahasiswa</span>
            </h2>
            <p class="animate__animated fanimate__adeInUp">
              Layanan sistem informasi online untuk mengelola data akademik
              mahasiswa Fakultas Ilmu Komputer
            </p>
            <a
              href="#about"
              class="btn-get-started animate__animated animate__fadeInUp scrollto"
              >Read More</a
            >
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">
              Getting FILKOM
            </h2>
            <p class="animate__animated animate__fadeInUp">
              FILKOM located in the area of Brawijaya University campus,
              particularly situated in Jl. Veteran, Malang, Jawa Timur,
              Indonesia.
            </p>
            <a
              href="https://filkom.ub.ac.id/page/read/top/getting-filkom/d7b888f"
              class="btn-get-started animate__animated animate__fadeInUp scrollto"
              >Read More</a
            >
          </div>
        </div>

        <a
          class="carousel-control-prev"
          href="#heroCarousel"
          role="button"
          data-bs-slide="prev"
        >
          <span
            class="carousel-control-prev-icon bx bx-chevron-left"
            aria-hidden="true"
          ></span>
        </a>

        <a
          class="carousel-control-next"
          href="#heroCarousel"
          role="button"
          data-bs-slide="next"
        >
          <span
            class="carousel-control-next-icon bx bx-chevron-right"
            aria-hidden="true"
          ></span>
        </a>
      </div>

      <svg
        class="hero-waves"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 "
        preserveAspectRatio="none"
      >
        <defs>
          <path
            id="wave-path"
            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
          />
        </defs>
        <g class="wave1">
          <use
            xlink:href="#wave-path"
            x="50"
            y="3"
            fill="rgba(255,255,255, .1)"
          />
        </g>
        <g class="wave2">
          <use
            xlink:href="#wave-path"
            x="50"
            y="0"
            fill="rgba(255,255,255, .2)"
          />
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9" fill="#fff" />
        </g>
      </svg>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
          <div class="section-title">
            <h2>About</h2>
            <p>Ruang Mahasiswa</p>
          </div>

          <div class="row content">
            <div class="col-lg-6">
              <p>
                Ruang Mahasiswa adalah layanan sistem informasi online untuk
                mengelola data akademik mahasiswa FILKOM. Di sini mahasiswa
                dapat mengakses berbagai layanan akademik seperti Kartu Hasil
                Studi/Nilai Kuliah (KHS) dan informasi tenaga pendidik.
              </p>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Untuk informasi mengenai pengumuman FILKOM, dapat klik disini.
              </p>
              <a href="www.filkom.ub.ac.id" class="btn-learn-more">FILKOM</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
              <h3>Hubungi akademik</h3>
              <p>
                Untuk informasi terkait layanan akademik, dapat menghubungi wa
                center pada hari dan jam kerja.
              </p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="https://wa.me/6281132257272"
                >Akademik wa center</a
              >
            </div>
          </div>
        </div>
      </section>
      <!-- End Cta Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
        <div class="container">
          <div class="section-title">
            <h2>Team</h2>
            <p>Our Hardworking Team</p>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img :src="dhiva" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Dhiva Mustikananda</h4>
                  <span>185150701111013</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img :src="lia" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Fitri Zakiatul Lailia</h4>
                  <span>185150700111024</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img :src="tini" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Nur Eka Hartiningrum</h4>
                  <span>185150700111029</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img :src="rani" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Rani Metivianis</h4>
                  <span>185150700111025</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Team Section -->
    </main>
    <!-- End #main -->
  </div>
</template>

<script>
import dhiva from "../assets/img/team/team-1.jpeg";
import lia from "../assets/img/team/team-2.jpeg";
import tini from "../assets/img/team/team-3.jpeg";
import rani from "../assets/img/team/team-4.jpeg";

export default {
  name: "Dashboard",
  data() {
    return {
      dhiva: dhiva,
      lia: lia,
      tini: tini,
      rani: rani,
    };
  },
  methods: {
    logout: function () {
      localStorage.removeItem("token");
      window.location.reload();
    },
  },
  props: {
    token: String,
  },
  components: {},
};
</script>

<style scoped>
</style>