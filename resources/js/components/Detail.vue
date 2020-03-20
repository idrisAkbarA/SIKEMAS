<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="calc(100% - 15%)" elevation="5">
                <v-card class="v-sheet--offset mx-auto" color="gradient" elevation="9" max-width="calc(100% - 32px)"
                    height="88px">
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
                                    <v-list-item-title class="body-1">{{new Date(kegiatan.tanggal_dari).toLocaleDateString()}} -
                                        {{new Date(kegiatan.tanggal_sampai).toLocaleDateString()}}</v-list-item-title>
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
                                <v-img src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                                    gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"></v-img>
                            </v-col>
                            <v-col cols="6">
                                <v-img src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                                    gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"></v-img>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="6">
                                <v-img src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                                    gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"></v-img>
                            </v-col>
                            <v-col cols="6">
                                <v-img src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
                                    gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"></v-img>
                            </v-col>
                        </v-row>
                    </div>
                    <v-data-table :headers="headers" :items="peserta" :search="search" class="elevation-1">
                        <template v-slot:top>
                            <v-toolbar flat color="white">
                                <v-toolbar-title>Peserta</v-toolbar-title>
                                <v-divider class="mx-4" inset vertical></v-divider>
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="search" label="Pencarian" single-line
                                    hide-details>
                                </v-text-field>
                            </v-toolbar>
                        </template>
                        <template v-slot:no-data>
                            <p>Data belum tersedia</p>
                        </template>
                    </v-data-table>
                </v-container>
            </v-card>
        </v-container>
    </div>
</template>

<style scoped>
    .gradient {
        background: #267DFF;
        background: -webkit-linear-gradient(to bottom right, #267DFF, #6dd5ed);
        background: linear-gradient(to bottom right, #267DFF, #6dd5ed);
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
            data: "",
        },
        data() {
            return {
                search:'',
                peserta:[],
                kegiatan: [],
                headers: [
                {
                    text: 'NIK',
                    sortable: false,
                    value: 'nik'
                },
                {
                    text: 'Nama',
                    sortable: false,
                    value: 'nama'
                },
                {
                    text: 'Jenis Kelamin',
                    sortable: false,
                    value: 'jk'
                },
                {
                    text: 'Alamat',
                    sortable: false,
                    value: 'alamat'
                },
                {
                    text: 'No. HP',
                    sortable: false,
                    value: 'hp'
                },
                {
                    text: 'Pekerjaan',
                    sortable: false,
                    value: 'pekerjaan'
                },
                {
                    text: 'Keterangan',
                    sortable: false,
                    value: 'ket'
                },
                {
                    text: 'Aksi',
                    value: 'action',
                    sortable: false
                },
            ],
            desserts: [],
            }
        },
        created() {
            this.initialize()
        },

        mounted() {
            this.kegiatan = JSON.parse(this.$props.data);
        },

        methods: {
            initialize() {
                this.kegiatan = JSON.parse(this.$props.data);
                this.peserta = JSON.parse(this.kegiatan['peserta']);
                console.log(this.peserta);
            },
        },

    }

</script>
