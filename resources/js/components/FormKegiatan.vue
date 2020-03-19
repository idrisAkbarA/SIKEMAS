<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="calc(100% - 15%)" elevation="5">
                <v-stepper v-model="e1" alt-labels>
                    <v-stepper-header>
                        <v-stepper-step editable step="1">Isi form kegiatan</v-stepper-step>
                        <v-divider></v-divider>
                        <v-stepper-step editable step="2">Input data peserta</v-stepper-step>
                    </v-stepper-header>

                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <v-form>
                                <v-container>
                                    <v-text-field v-model="nama_kegiatan" label="Nama Kegiatan" outlined dense required>
                                    </v-text-field>
                                    <v-row style="margin-top:-15px">
                                        <v-col cols="12" lg="6" md="6" sm="12">
                                            <h6 class="body-1">Waktu Kegiatan</h6>
                                            <v-menu v-model="tanggal_dari" :close-on-content-click="false"
                                                :nudge-right="40" transition="scale-transition" offset-y
                                                min-width="290px">
                                                <template v-slot:activator="{ on }">
                                                    <v-text-field v-model="dari" label="Dari" prepend-icon="event"
                                                        readonly v-on="on"></v-text-field>
                                                </template>
                                                <v-date-picker v-model="dari" @input="tanggal_dari = false" no-title
                                                    scrollable>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-col>
                                        <v-col cols="12" lg="6" md="6" sm="12">
                                            <h6 style="visibility:hidden" class="body-1">s</h6>
                                            <v-menu v-model="tanggal_sampai" :close-on-content-click="false"
                                                :nudge-right="40" transition="scale-transition" offset-y
                                                min-width="290px">
                                                <template v-slot:activator="{ on }">
                                                    <v-text-field v-model="sampai" label="Sampai" prepend-icon="event"
                                                        readonly v-on="on"></v-text-field>
                                                </template>
                                                <v-date-picker v-model="sampai" @input="tanggal_sampai = false" no-title
                                                    scrollable>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-col>
                                    </v-row>
                                    <v-text-field v-model="tempat_kegiatan" label="Tempat Kegiatan" outlined dense
                                        required></v-text-field>
                                    <v-text-field v-model="tujuan" label="Tujuan Kegiatan" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="penyelenggara" label="Penyelenggara" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="penanggung_jawab" label="Penanggung Jawab Kegiatan" outlined
                                        dense required></v-text-field>
                                    <v-textarea v-model="latar_belakang" label="Latar Belakang Kegiatan" outlined dense
                                        required></v-textarea>
                                    <v-text-field v-model="trainer" label="Trainer" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="cp_trainer" label="Cp Trainer" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="uang_saku" label="Uang Saku Peserta" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="anggaran" label="Anggaran Dana" outlined dense required>
                                    </v-text-field>
                                    <v-text-field v-model="outcome" label="Outcome" outlined dense required>
                                    </v-text-field>
                                    <v-file-input v-model="foto1" label="Foto Dokumentasi 1" placeholder="pilih foto"
                                        outlined dense prepend-icon="mdi-camera"></v-file-input>
                                    <v-file-input v-model="foto2" label="Foto Dokumentasi 2" placeholder="pilih foto"
                                        outlined dense prepend-icon="mdi-camera"></v-file-input>
                                    <v-file-input v-model="foto3" label="Foto Dokumentasi 3" placeholder="pilih foto"
                                        outlined dense prepend-icon="mdi-camera"></v-file-input>
                                    <v-file-input v-model="foto4" label="Foto Dokumentasi 4" placeholder="pilih foto"
                                        outlined dense prepend-icon="mdi-camera"></v-file-input>
                                </v-container>
                            </v-form>
                            <v-btn color="light-blue darken-1" dark @click="e1 = 2">
                                Selanjutnya
                            </v-btn>
                        </v-stepper-content>
                        <v-stepper-content step="2">
                            <v-data-table :headers="headers" :items="desserts" :search="search">
                                <template v-slot:top>
                                    <v-toolbar flat color="white">
                                        <v-toolbar-title>Peserta</v-toolbar-title>
                                        <v-divider class="mx-4" inset vertical></v-divider>
                                        <v-spacer></v-spacer>
                                        <v-text-field v-model="search" append-icon="search" label="Pencarian"
                                            single-line hide-details>
                                        </v-text-field>
                                        <v-spacer></v-spacer>
                                        <v-btn color="light-blue darken-1" dark class="mb-2" @click="sheet=true">Tambah
                                            Peserta</v-btn>
                                    </v-toolbar>
                                </template>
                                <template v-slot:item.action="{ item }">
                                    <v-btn icon @click="edit(item)">
                                        <v-icon>
                                            edit
                                        </v-icon>
                                    </v-btn>
                                    <v-btn icon @click="deleteItem(item)">
                                        <v-icon>
                                            delete
                                        </v-icon>

                                    </v-btn>
                                </template>
                                <template v-slot:no-data>
                                    <p>Tidak Ada Peserta</p>
                                </template>
                            </v-data-table>
                            <!-- bottom sheet -->
                            <div class="text-center">
                                <v-bottom-sheet persistent v-model="sheet" inset>
                                    <v-sheet class="text-center">

                                        <v-card>
                                            <v-progress-linear :indeterminate="loading" color="light-blue darken-1"
                                                class="my-0" height="6">
                                            </v-progress-linear>
                                            <v-card-title>
                                                <v-icon class="mr-2">{{formIcon}}</v-icon>
                                                <span class="headline">{{ formTitle }}</span>
                                                <v-spacer></v-spacer>
                                                <v-btn @click="close" text icon color="red">
                                                    <v-icon>close</v-icon>
                                                </v-btn>
                                            </v-card-title>

                                            <v-card-text>
                                                <v-container class="mt-n5">
                                                    <v-row>
                                                        <v-col cols="6">
                                                            <v-text-field v-model="editedItem.nik" label="NIK" outlined
                                                                dense required>
                                                            </v-text-field>
                                                        </v-col>
                                                        <v-col cols="6">
                                                            <v-text-field v-model="editedItem.nama" label="Nama"
                                                                outlined dense required>
                                                            </v-text-field>
                                                        </v-col>
                                                    </v-row>
                                                    <v-row class="mt-n5">
                                                        <v-col cols="12">
                                                            <v-radio-group v-model="editedItem.jk" row class="mt-n1">
                                                                <v-radio label="Laki-laki" value="Laki-laki">
                                                                </v-radio>
                                                                <v-radio label="Perempuan" value="Perempuan">
                                                                </v-radio>
                                                            </v-radio-group>
                                                        </v-col>
                                                    </v-row>
                                                    <v-row class="mt-n5">
                                                        <v-col cols="6">
                                                            <v-text-field v-model="editedItem.hp" label="No. HP"
                                                                outlined dense required>
                                                            </v-text-field>
                                                        </v-col>
                                                        <v-col cols="6">
                                                            <v-text-field v-model="editedItem.pekerjaan"
                                                                label="Pekerjaan" outlined dense required>
                                                            </v-text-field>
                                                        </v-col>
                                                    </v-row>
                                                    <v-row class="mt-n5">
                                                        <v-col cols="12">
                                                            <v-text-field v-model="editedItem.alamat" label="Alamat"
                                                                outlined dense required>
                                                            </v-text-field>
                                                        </v-col>
                                                    </v-row>
                                                </v-container>
                                            </v-card-text>

                                            <v-card-actions class="mt-n10">
                                                <v-btn height="50" width="120" color="error" text @click="close">
                                                    Batal</v-btn>
                                                <v-spacer></v-spacer>
                                                <v-btn class="mr-5" height="50" width="120" color="light-blue darken-1"
                                                    dark @click="save()">
                                                    {{formBtn}}</v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-sheet>
                                </v-bottom-sheet>
                            </div>
                            <!-- akhir -->
                            <!-- Dialog Delete -->
                            <div class="text-center">
                                <v-dialog v-model="dialogDelete" width="400">

                                    <v-card>
                                        <v-card-title class="headline red white--text" primary-title>
                                            <v-icon color="white" class="mr-2">delete</v-icon> Hapus Peserta
                                        </v-card-title>

                                        <v-card-text class="mt-2 black--text">
                                            Apakah anda yakin akan menghapus Peserta <span
                                                class="font-weight-bold">{{deleteText}}</span>?
                                        </v-card-text>

                                        <v-divider></v-divider>

                                        <v-card-actions>
                                            <v-btn @click="dialogDelete = false" color="primary" text>
                                                batal
                                            </v-btn>
                                            <v-spacer></v-spacer>
                                            <v-btn color="red" dark @click="dialogDelete = false,deleteConfirmed()">
                                                <v-icon>delete</v-icon> Hapus
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                            </div>
                            <!-- Akhir -->
                            <v-btn class="light-blue darken-1" dark @click="simpan">
                                Simpan
                            </v-btn>
                        </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
            </v-card>
            <template>
                <div class="text-center ma-2">
                    <v-snackbar :color="snackbarColor" v-model="snackbar">
                        {{ snackbarMessage }}
                        <v-btn icon color="white" text @click="snackbar = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-snackbar>
                </div>
            </template>
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
        data() {
            return {
                index2: null,
                index: -1,
                dialogDelete: false,
                deleteText: null,
                snackbar: false,
                snackbarMessage: "hello",
                snackbarColor: "light-blue",
                nama_kegiatan: '',
                e1: 1,
                dari: new Date().toISOString().substr(0, 10),
                sampai: new Date().toISOString().substr(0, 10),
                tanggal_dari: false,
                tanggal_sampai: false,
                tempat_kegiatan: '',
                tujuan: '',
                penyelenggara: '',
                penanggung_jawab: '',
                latar_belakang: '',
                trainer: '',
                cp_trainer: '',
                uang_saku: '',
                anggaran: '',
                outcome: '',
                foto1: '',
                foto2: '',
                foto3: '',
                foto4: '',
                firstname: '',
                lastname: '',
                nameRules: [
                    v => !!v || 'Name is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                email: '',
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+/.test(v) || 'E-mail must be valid',
                ],
                row: null,
                e1: 1,
                headers: [{
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
                        text: 'Alamat',
                        sortable: false,
                        value: 'alamat'
                    },
                    {
                        text: 'Aksi',
                        value: 'action',
                        sortable: false
                    },
                ],
                pesertaFixed: [],
                desserts: [],
                search: '',
                loading: false,
                sheet: false,
                editedIndex: -1,
                editedItem: {
                    nik: "",
                    nama: "",
                    jk: "",
                    alamat: "",
                    hp: "",
                    pekerjaan: ""
                },
                defaultItem: {
                    nik: "",
                    nama: "",
                    jk: "",
                    alamat: "",
                    hp: "",
                    pekerjaan: ""
                },

            }
        },
        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Tambah Peserta' : 'Edit Peserta'
            },
            formIcon() {
                return this.editedIndex === -1 ? 'add' : 'edit'
            },
            formBtn() {
                return this.editedIndex === -1 ? 'Tambah' : 'Edit'
            }
        },
        methods: {
            save() {
                var ini = this;
                if (this.editedIndex > -1) {
                    Object.assign(this.desserts[this.editedIndex], this.editedItem);
                    this.loading = false;
                    this.sheet = false;

                } else {

                    console.log(this.editedItem);
                    var ini = this;
                    this.loading = true;
                    this.desserts.push(this.editedItem);
                    this.loading = false;
                    this.sheet = false;
                }
                this.close()


            },
            close() {
                this.sheet = false;
                this.loading = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                }, 300)

            },

            edit(item) {
                this.editedIndex = this.desserts.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.sheet = true;
            },

            deleteItem(item) {
                this.index2 = this.desserts.indexOf(item);
                this.dialogDelete = true
            },
            deleteConfirmed() {
                
                // confirm('Apakah kamu yakin ingin menghapus item ini?') && this.desserts.splice(index, 1)
                this.desserts.splice(this.index2, 1)
            },
            simpan() {
                var ini = this;
                var peserta = JSON.stringify(ini.desserts);
                // console.log(this.desserts);
                // console.log(peserta);
                axios.post('/formkegiatan', {
                    nama_kegiatan: ini.nama_kegiatan,
                    tanggal_dari: ini.dari,
                    tanggal_sampai: ini.sampai,
                    tempat_kegiatan: ini.tempat_kegiatan,
                    tujuan: ini.tujuan,
                    penyelenggara: ini.penyelenggara,
                    penanggung_jawab: ini.penanggung_jawab,
                    latar_belakang: ini.latar_belakang,
                    trainer: ini.trainer,
                    cp_trainer: ini.cp_trainer,
                    uang_saku: ini.uang_saku,
                    anggaran: ini.anggaran,
                    outcome: ini.outcome,
                    foto1: "uyutytyu",
                    foto2: "uyutytyu",
                    foto3: "uyutytyu",
                    foto4: "uyutytyu",
                    peserta: ini.desserts,
                    nik: ini.editedItem.nik,
                    nama: ini.editedItem.nama,
                    jk: ini.editedItem.jk,
                    alamat: ini.editedItem.alamat,
                    hp: ini.editedItem.hp,
                    pekerjaan: ini.editedItem.pekerjaan,
                })
                .then(function (response) {
                    // console.log(response);
                    if (response.data == true) {
                        setTimeout(function(){location.href="/formkegiatan"} , 300);
                        // window.location.href = '/formkegiatan'
                        ini.snackbar = true;
                        ini.snackbarMessage = "Kegiatan Berhasil Ditambahkan";
                    } else {
                        ini.snackbar = true;
                        ini.snackbarMessage = "Terjadi kesalahan, coba lagi";
                        ini.snackbarColor = "error";
                    }
                })
            }
        }
    }

</script>
