<template>
  <div>
    <main id="main">
      <!-- ======= Portfolio Details Section ======= -->
      <section
        id="portfolio-details"
        class="portfolio-details"
        style="background-color: #f8f8f8"
      >
        >
        <div class="container" style="margin-top: 5%">
          <div class="row gy-4">
            <div class="col-lg-3">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                  <img :src="profileImg" alt="" />
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-9">
              <div class="portfolio-info">
                <h3>Profil Biodata</h3>
                <button
                  class="btn btn-warning"
                  style="float: right"
                  type="button"
                  v-on:click="toggleEdit()"
                >
                  {{ isEditMode ? "Submit" : "Edit" }}
                </button>
                <p style="font-size: 15px; color: #094570">
                  <strong>{{ profile.nim }}</strong>
                </p>
                <p style="margin-top: -2%; font-size: 25px">
                  <strong>{{ profile.nama }}</strong>
                </p>
                <table style="margin-top: -2%" width="90%">
                  <tr>
                    <th width="150px"></th>
                    <th width="20px"></th>
                    <th width="500px"></th>
                  </tr>
                  <tr>
                    <td><strong>Jenjang</strong>/<strong>Fakultas</strong></td>
                    <td>:</td>
                    <td>{{ profile.jenjang }} / {{ profile.fakultas }}</td>
                  </tr>
                  <tr>
                    <td><strong>Jurusan</strong></td>
                    <td>:</td>
                    <td>{{ profile.jurusan }}</td>
                  </tr>
                  <tr>
                    <td><strong>Program Studi</strong></td>
                    <td>:</td>
                    <td>{{ profile.prodi }}</td>
                  </tr>
                  <tr>
                    <td><strong>Seleksi</strong></td>
                    <td>:</td>
                    <td>{{ profile.seleksi }}</td>
                  </tr>
                  <tr>
                    <td><strong>Status</strong></td>
                    <td>:</td>
                    <td>{{ profile.status }}</td>
                  </tr>
                  <tr v-if="isEditMode">
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>
                      <input
                        type="text"
                        v-model="email"
                        :placeholder="profile.user.email"
                      />
                    </td>
                  </tr>
                  <tr v-else>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ profile.user.email }}</td>
                  </tr>
                  <tr v-if="isEditMode">
                    <td><strong>Agama</strong></td>
                    <td>:</td>
                    <td>
                      <input
                        type="text"
                        v-model="agama"
                        :placeholder="profile.agama"
                      />
                    </td>
                  </tr>
                  <tr v-else>
                    <td><strong>Agama</strong></td>
                    <td>:</td>
                    <td>{{ profile.agama }}</td>
                  </tr>
                  <tr v-if="isEditMode">
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td>
                      <input
                        type="text"
                        v-model="alamat"
                        :placeholder="profile.alamat"
                      />
                    </td>
                  </tr>
                  <tr v-else>
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td>{{ profile.alamat }}</td>
                  </tr>
                  <tr v-if="isEditMode">
                    <td><strong>No HP</strong></td>
                    <td>:</td>
                    <td>
                      <input
                        type="text"
                        v-model="noHp"
                        :placeholder="profile.no_hp"
                      />
                    </td>
                  </tr>
                  <tr v-else>
                    <td><strong>No HP</strong></td>
                    <td>:</td>
                    <td>{{ profile.no_hp }}</td>
                  </tr>
                </table>
              </div>

              <div class="col-lg-13">
                <div
                  class="portfolio-info"
                  style="margin-top: 3%; background-color: #6495ed"
                >
                  <p>
                    Mahasiswa dipersilakan mengisi data wirausaha mahasiswa
                    melalui halaman berikut:
                    <a
                      class="link-website"
                      href="https://siam.ub.ac.id/wirausaha.php"
                      style="color: #f8f8f8f8"
                      ><u>https://siam.ub.ac.id/wirausaha.php</u></a
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Portfolio Details Section -->
    </main>
    <!-- End #main -->
  </div>
</template>

<script>
import profileImg from "../assets/img/profil.png";

export default {
  name: "Biodata",
  data() {
    return {
      profileImg: profileImg,
      profile: {
        nim: "",
        nama: "",
        jenjang: "",
        fakultas: "",
        jurusan: "",
        prodi: "",
        seleksi: "",
        status: "",
        agama: "",
        alamat: "",
        no_hp: "",
        user: {
          email: "",
        },
      },
      isEditMode: false,
      email: "",
      agama: "",
      alamat: "",
      noHp: "",
    };
  },
  async created() {
    this.profile = await this.getProfile(this.token);
  },
  methods: {
    getProfile: async function (token) {
      const requestOptions = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      try {
        const responseRaw = await fetch(
          "http://localhost:8000/api/profil",
          requestOptions
        );
        const response = await responseRaw.json();

        const { data, message, success } = response;
        if (!success) {
          alert(message);
          return;
        }

        this.email = data.user.email;
        this.agama = data.agama || "";
        this.alamat = data.alamat || "";
        this.noHp = data.no_hp || "";

        return { ...this.profile, ...data };
      } catch (err) {
        console.error(err);

        return { ...this.profile, ...{} };
      }
    },
    updateProfile: async function (token, data) {
      const curr = this;

      const body = { ...curr.profile, ...data };
      const requestOptions = {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
        body: JSON.stringify(body),
      };

      try {
        const responseRaw = await fetch(
          `http://localhost:8000/api/mahasiswa/${curr.profile.id}`,
          requestOptions
        );
        const response = await responseRaw.json();

        const { data, message, success } = response;
        if (!success) {
          alert(message);
          return;
        }

        curr.profile = data;
      } catch (err) {
        console.error(err);
      }
    },
    toggleEdit: async function () {
      const curr = this;

      if (curr.isEditMode) {
        await curr.updateProfile(curr.token, {
          email: curr.email,
          agama: curr.agama,
          alamat: curr.alamat,
          noHp: curr.noHp,
        });
      }

      this.isEditMode = !this.isEditMode;
    },
  },
  props: {
    token: String,
  },
};
</script>