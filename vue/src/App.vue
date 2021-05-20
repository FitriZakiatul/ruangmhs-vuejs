<template>
  <div style="min-height: 100vh">
    <div style="min-height: 100vh" v-if="isLoggedIn" :token="token">
      <!-- ======= Header ======= -->
      <header id="header" class="fixed-top d-flex align-items-center">
        <div
          class="container d-flex align-items-center justify-content-between"
        >
          <div class="logo">
            <h1><a href="index.html">Ruang Mahasiswa</a></h1>
          </div>

          <nav id="navbar" class="navbar">
            <ul>
              <li>
                <a
                  class="nav-link scrollto"
                  href="#"
                  v-on:click="changePage('dashboard')"
                  >Dashboard</a
                >
              </li>
              <li>
                <a
                  class="nav-link scrollto"
                  href="#"
                  v-on:click="changePage('biodata')"
                  >Biodata</a
                >
              </li>
              <li>
                <a
                  class="nav-link scrollto"
                  href="#"
                  v-on:click="changePage('dosen')"
                  >Dosen</a
                >
              </li>
              <li>
                <a class="nav-link scrollto" href="#" v-on:click="logout()"
                  >Logout</a
                >
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
        </div>
      </header>
      <!-- End Header -->

      <div v-if="currPage === 'dashboard'">
        <Dashboard />
      </div>

      <div v-if="currPage === 'biodata'">
        <Biodata :token="token" />
      </div>

      <div v-if="currPage === 'dosen'">
        <Dosen :token="token" />
      </div>

      <!-- ======= Footer ======= -->
      <footer id="footer" style="background-color: #094570">
        <div class="container">
          <h3>Ruang Mahasiswa</h3>
          <p>Sahabat Baik Akademik dan Mahasiswa</p>
          <div class="social-links">
            <a href="https://twitter.com/hufsgsias" class="twitter"
              ><i class="bx bxl-twitter"></i
            ></a>
            <a href="https://www.facebook.com/studyinkorea/" class="facebook"
              ><i class="bx bxl-facebook"></i
            ></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
      </footer>
      <!-- End Footer -->
    </div>
    <div style="min-height: 100vh" v-else>
      <Login />
    </div>
  </div>
</template>

<script>
import Dashboard from "./components/Dashboard.vue";
import Biodata from "./components/Biodata.vue";
import Dosen from "./components/Dosen.vue";
import Login from "./components/Login.vue";

export default {
  name: "App",
  data() {
    return {
      token: localStorage.getItem("token"),
      isLoggedIn: localStorage.getItem("token") != null,
      currPage: "dashboard",
    };
  },
  created() {
    document.title =
      this.currPage.substring(0, 1).toUpperCase() +
      this.currPage.substring(1, this.currPage.length);
  },
  methods: {
    changePage: function (page) {
      this.currPage = page;

      document.title =
        this.currPage.substring(0, 1).toUpperCase() +
        this.currPage.substring(1, this.currPage.length);
    },
    logout: function () {
      localStorage.removeItem("token");
      window.location.reload();
    },
  },
  components: {
    Login,
    Dashboard,
    Biodata,
    Dosen,
  },
};
</script>

<style>
body {
  margin: 0;
}

#app {
  height: 100vh;
  overflow-y: auto;
  background-color: var(--bs-light);
}
</style>
