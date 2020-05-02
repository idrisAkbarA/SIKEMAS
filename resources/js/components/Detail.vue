<template>
  <div>
    <v-container class="d-flex justify-center mt-7">
      <v-card width="calc(100% - 15%)" elevation="5">
        <v-card
          class="v-sheet--offset mx-auto"
          color="gradient"
          elevation="9"
          max-width="calc(100% - 32px)"
          height="88px"
        >
          <v-list-item three-line>
            <v-list-item-content class="white--text">
              <v-list-item-title class="headline mb-1">Detail Kegiatan</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-card>
        <v-container style="margin-top:-10">
          <v-row>
            <v-col>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Nama Kegiatan</div>
                  <v-list-item-title class="body-1">{{kegiatan.nama_kegiatan}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Waktu Kegiatan</div>
                  <v-list-item-title class="body-1">
                    {{new Date(kegiatan.tanggal_dari).toLocaleDateString()}} -
                    {{new Date(kegiatan.tanggal_sampai).toLocaleDateString()}}
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Tempat Kegiatan</div>
                  <v-list-item-title class="body-1">{{kegiatan.nama_kegiatan}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Tujuan Kegiatan</div>
                  <v-list-item-title class="body-1">{{kegiatan.tujuan}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Penyelenggara</div>
                  <v-list-item-title class="body-1">{{kegiatan.penyelenggara}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Penanggung Jawab Kegiatan</div>
                  <v-list-item-title class="body-1">{{kegiatan.penanggung_jawab}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-col>
            <v-col>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Latar Belakang Kegiatan</div>
                  <v-list-item-title class="body-1">{{kegiatan.latar_belakang}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Nama Trainer / Narasumber</div>
                  <v-list-item-title class="body-1">{{kegiatan.trainer}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">No. HP Trainer / Narasumber</div>
                  <v-list-item-title class="body-1">{{kegiatan.cp_trainer}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Uang Saku Peserta</div>
                  <v-list-item-title class="body-1">{{kegiatan.uang_saku}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                  <div class="grey--text">Anggaran Dana</div>
                  <v-list-item-title class="body-1">{{kegiatan.anggaran}}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-col>
          </v-row>

          <v-list-item>
            <v-list-item-content>
              <div class="grey--text">Foto Dokumentasi</div>
            </v-list-item-content>
          </v-list-item>
          <div class="mx-4">
            <v-row>
              <v-col cols="6">
                <v-img
                  src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                  gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
                ></v-img>
              </v-col>
              <v-col cols="6">
                <v-img
                  src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                  gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
                ></v-img>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="6">
                <v-img
                  src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                  gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
                ></v-img>
              </v-col>
              <v-col cols="6">
                <v-img
                  src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                  gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
                ></v-img>
              </v-col>
            </v-row>
          </div>
          <v-data-table :headers="headers" :items="peserta" :search="search" class="elevation-1">
            <template v-slot:top>
              <v-toolbar flat color="white">
                <v-toolbar-title>Peserta</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-text-field
                  v-model="search"
                  append-icon="search"
                  label="Pencarian"
                  single-line
                  hide-details
                ></v-text-field>
              </v-toolbar>
            </template>
            <template v-slot:item.detail="{item}">
              <v-btn text small @click="detail(item)">
                Detail
              </v-btn>
            </template>
            <template v-slot:no-data>
              <p>Data belum tersedia</p>
            </template>
          </v-data-table>
          <!-- sheet list detail peserta -->
          <v-bottom-sheet v-model="sheet">
            <v-list>
              <v-subheader>Open in</v-subheader>
              <v-list-item @click="sheet = false">
                <v-list-item-avatar>
                  <v-avatar size="32px" tile>
                    <img
                      src="`https://cdn.vuetifyjs.com/images/bottom-sheets/keep.img`"
                      alt=""
                    />
                  </v-avatar>
                </v-list-item-avatar>
                <v-list-item-title>Keep</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-bottom-sheet>
          <!-- akhir -->
        </v-container>
      </v-card>
    </v-container>
  </div>
</template>

<style scoped>
.gradient {
  background: #267dff;
  background: -webkit-linear-gradient(to bottom right, #267dff, #6dd5ed);
  background: linear-gradient(to bottom right, #267dff, #6dd5ed);
}

.v-sheet--offset {
  padding: 5px;
  top: -24px;
  position: relative;
}
</style>

<script>
export default {
  props: {
    data: ""
  },
  data() {
    return {
        field_ket: '',
        dialogKet: false,
        sheet: false,
        ketIndex: null,
        search: "",
        peserta: [],
        kegiatan: [],
        headers: [
            {
            text: "NIK",
            sortable: false,
            value: "nik"
            },
            {
            text: "Nama",
            sortable: false,
            value: "nama"
            },
            {
            text: "Detail",
            value: "detail",
            sortable: false
            }
            ],
        desserts: []
    };
  },
  created() {
    this.initialize();
  },

  mounted() {
    this.kegiatan = JSON.parse(this.$props.data);
  },

  methods: {
    initialize() {
      this.kegiatan = JSON.parse(this.$props.data);
      this.peserta = JSON.parse(this.kegiatan["peserta"]);
      console.log(this.peserta);
    },
    ket(item) {
      this.ketIndex = this.peserta.indexOf(item);
      // this.ketItem = Object.assign({}, item);
      this.dialogKet = true;
    },
    detail(item) {
      const index = this.peserta.indexOf(item);
      this.sheet = true;
    }
  }
};
</script>
