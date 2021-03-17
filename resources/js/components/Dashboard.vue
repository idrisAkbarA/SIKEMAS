<template>
    <div>
        <v-container>
            <v-card>
                <v-container>
                    <v-row>
                        <v-col cols="6" sm="1" md="2">
                            <v-text-field dense prepend-inner-icon="event" v-model="cari.tahun" outlined label="Tahun" hide-details="auto">
                            </v-text-field>
                        </v-col>
                        <v-col cols="6" sm="1" md="2">
                            <!-- <v-text-field dense prepend-inner-icon="search" v-model="cari.bulan" outlined label="Bulan" hide-details="auto">
                            </v-text-field> -->
                            <v-select
                                outlined
                                dense
                                v-model="cari.bulan"
                                :items="items"
                                item-text="monthName"
                                
                                >
                            </v-select>
                        </v-col>
                        <v-col>
                            <v-btn class="primary" dark @click="cariBulanTahun()">
                                <v-icon left>
                                    search
                                </v-icon>
                                Cari
                            </v-btn>
                        </v-col>

                        <v-spacer></v-spacer>
                        <v-col cols="12" sm="1" md="4">
                            <v-text-field dense prepend-inner-icon="search" outlined v-model="search"
                                label="Cari Kegiatan" hide-details="auto"
                                @keyup="liveSearch()"></v-text-field>
                        </v-col>
                    </v-row>

                </v-container>
            </v-card>
            <v-row class="mt-7">
                <v-col>
                    <v-card elevation="5">
                        <v-card class="v-sheet--offset mx-auto" color="gradient" elevation="9"
                            max-width="calc(100% - 32px)" height="88px">
                            <v-list-item three-line>
                                <v-list-item-content class="white--text">
                                    <div class="">TOTAL KEGIATAN</div>
                                    <v-list-item-title class="headline mb-1">Kel. {{user}}</v-list-item-title>
                                </v-list-item-content>
                                <h2 class="white--text">{{kegiatan.length}}</h2>
                            </v-list-item>
                        </v-card>
                        <v-container>
                            <v-simple-table>
                                <template v-slot:default>
                                    <thead>
                                        <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Nama Kegiatan</th>
                                            <th class="font-weight-bold body-1 text-center">Ket.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, i) in kegiatan" :key="i">
                                            <td>{{i+1}}</td>
                                            <td>{{item.nama_kegiatan}}</td>
                                            <td class="text-center">
                                                <v-btn text small @click="{detail(item.id_kegiatan)}">Detail</v-btn>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-container>

                    </v-card>
                </v-col>
            </v-row>
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
            user: "",
        },
        data() {
            return {
                kegiatan: [],
                search: '',
                items:[
                    {value: null, monthName:'Bulan'},
                    {value: '01', monthName:'Januari'},
                    {value: '02', monthName:'Februari'},
                    {value: '03', monthName:'Maret'},
                    {value: '04', monthName:'April'},
                    {value: '05', monthName:'Mei'},
                    {value: '06', monthName:'Juni'},
                    {value: '07', monthName:'Juli'},
                    {value: '08', monthName:'Agustus'},
                    {value: '09', monthName:'September'},
                    {value: '10', monthName:'Oktober'},
                    {value: '11', monthName:'November'},
                    {value: '12', monthName:'Desember'},
                ],
                cari: {
                    tahun: null,
                    bulan: null,
                },
            }
        },
        created() {
            this.initialize()
        },

        methods: {
            initialize() {
                this.kegiatan = JSON.parse(this.$props.data);
                // console.log(this.user);
            },
            detail(id_kegiatan) {
                var id = id_kegiatan;
                console.log(id);
                window.location.href = "/detail/" + id;
            },
            liveSearch() {
                this.stringKegiatan = [];
                var ini = this;
                axios.get('/cari', {
                        params: {
                            search: ini.search,
                        }
                    })
                    .then(function (response) {
                        ini.stringKegiatan = [];
                        // console.log(response.data);
                        ini.kegiatan = response.data;

                        ini.kegiatan.forEach(element => {
                            ini.stringKegiatan.push(JSON.stringify(element));
                        });
                    })
            },
            cariBulanTahun(){
                var ini = this;
                axios.get('/cariBulanTahunUser', {
                        params: {
                            cari: ini.cari,
                        }
                    })
                    .then(function (response) {
                        // console.log(response.data);
                        ini.stringKegiatan = [];
                        ini.kegiatan = response.data;

                        ini.kegiatan.forEach(element => {
                            ini.stringKegiatan.push(JSON.stringify(element));
                        });
                    })
            }
        },
    }

</script>
