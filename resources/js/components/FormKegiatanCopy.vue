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
                            <v-data-table :headers="headers" :items="desserts" sort-by="calories" class="elevation-1">
                                <template v-slot:top>
                                    <v-toolbar flat color="white">
                                        <v-toolbar-title>My CRUD</v-toolbar-title>
                                        <v-divider class="mx-4" inset vertical></v-divider>
                                        <v-spacer></v-spacer>
                                        <v-btn color="primary" dark class="mb-2" @click="sheet=true">New Item</v-btn>
                                    </v-toolbar>
                                </template>
                                <template v-slot:item.action="{ item }">
                                    <v-icon @click="editItem(item)">
                                        mdi-pencil
                                    </v-icon>
                                    <v-icon @click="deleteItem(item)">
                                        mdi-delete
                                    </v-icon>
                                </template>
                                <template v-slot:no-data>
                                    <v-btn color="primary" @click="initialize">Reset</v-btn>
                                </template>
                            </v-data-table>
                        </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
            </v-card>

            <div class="text-center ma-2">
                <v-snackbar :color="snackbarColor" v-model="snackbar">
                    {{ snackbarMessage }}
                    <v-btn icon color="white" text @click="snackbar = false">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-snackbar>
            </div>

            <!-- //bottom sheeet -->
            <v-bottom-sheet v-model="sheet" inset>
                <v-sheet class="text-center" height="200px">
                    <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
          </v-sheet>
                                    </v-bottom-sheet>
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
                snackbar: false,
                snackbarMessage: "hello",
                snackbarColor: "success",
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
            }
        },
        methods: {
            editItem(item) {
                this.editedIndex = this.desserts.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem(item) {
                const index = this.desserts.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
            },

            close() {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save() {
                if (this.editedIndex > -1) {
                    Object.assign(this.desserts[this.editedIndex], this.editedItem)
                } else {
                    this.desserts.push(this.editedItem)
                }
                this.close()
            },

        }
    }

</script>
