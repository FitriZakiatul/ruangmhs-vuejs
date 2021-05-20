<template>
  <div>
    <div v-if="isDetail" class="pt-5">
      <section id="services" class="services">
        <div class="container">
          <div class="atas">
            <p style="text-align: right">
              <a
                style="color: blue; text-decoration: none; cursor: pointer;"
                v-on:click="goBack()"
                >Dosen </a
              ><span style="color: black">/ Profil Dosen</span>
            </p>
          </div>

          <div class="container">
            <div class="row">
              <div class="col d-flex justify-content-center">
                <form action="#" style="width: 900px" class="posisi">
                  <table style="width: 800px">
                    <tr>
                      <td rowspan="15" width="300px">
                        <img
                          style="margin-left: 25%"
                          :src="avatar"
                          width="150"
                          height="150"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td width="70px"><b>NIP</b></td>
                      <td>:</td>

                      <td>{{ detailDosen.nip }}</td>
                    </tr>
                    <tr>
                      <td><b>Nama</b></td>
                      <td>:</td>

                      <td>{{ detailDosen.nama }}</td>
                    </tr>
                    <tr>
                      <td><b>Email</b></td>
                      <td>:</td>

                      <td>{{ detailDosen.email }}</td>
                    </tr>
                    <tr>
                      <td><b>Alamat</b></td>
                      <td>:</td>

                      <td>{{ detailDosen.alamat }}</td>
                    </tr>
                  </table>
                  <div style="margin-top: 3%">
                    <h3>Matakuliah yang diampu Dosen {{ dosen.nama }}</h3>

                    <table class="table" style="width: 800px">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Kode Matkul</th>
                          <th scope="col">Nama Matkul</th>
                          <th scope="col">Semester</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="matkul in detailDosen.mata_kuliah"
                          v-bind:key="matkul.kode_matkul"
                        >
                          <td>{{ matkul.kode_matkul }}</td>
                          <td>{{ matkul.nama }}</td>
                          <td>{{ matkul.semester }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div v-else>
      <section id="services" class="services">
        <div class="container">
          <div class="section-title" style="margin-top: 6%">
            <h2>Daftar</h2>
            <p>Nama Dosen</p>
          </div>

          <div class="container">
            <div class="col-lg-20">
              <table class="table table-striped" style="margin-top: -3%">
                <thead>
                  <tr>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="data in dosen"
                    v-bind:key="data.nip"
                    style="cursor: pointer"
                    v-on:click="goToDetail(token, data.id)"
                  >
                    <td>{{ data.nama }}</td>
                    <td>{{ data.nip }}</td>
                    <td>{{ data.email }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import avatar from "../assets/img/profildosen.png";

export default {
  name: "Dosen",
  data() {
    return {
      avatar: avatar,
      dosen: [],
      detailDosen: null,
      dosenId: null,
      isDetail: false,
    };
  },
  async created() {
    this.dosen = await this.getAll(this.token);
  },
  methods: {
    getAll: async function (token) {
      const requestOptions = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      try {
        const responseRaw = await fetch(
          `http://localhost:8000/api/dosen`,
          requestOptions
        );
        const response = await responseRaw.json();

        const { data, message, success } = response;
        if (!success) {
          alert(message);
          return;
        }

        return data.dosen;
      } catch (err) {
        console.error(err);

        return {};
      }
    },
    goToDetail: async function (token, dosenId) {
      this.detailDosen = await this.getProfile(token, dosenId);
      this.isDetail = true;
    },
    getProfile: async function (token, dosenId) {
      const requestOptions = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      try {
        const responseRaw = await fetch(
          `http://localhost:8000/api/dosen/${dosenId}`,
          requestOptions
        );
        const response = await responseRaw.json();

        const { data, message, success } = response;
        if (!success) {
          alert(message);
          return;
        }

        console.log(data);

        return data;
      } catch (err) {
        console.error(err);

        return {};
      }
    },
    goBack: async function () {
      this.isDetail = false;
      this.detailDosen = null;
    },
  },
  props: {
    token: String,
  },
};
</script>
