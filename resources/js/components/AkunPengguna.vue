<template>
    <div>
        <v-container>
            <v-data-table :headers="headers" :items="pengguna" :search="search" class="elevation-1">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Pengguna</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-text-field v-model="search" append-icon="search" label="Pencarian" single-line hide-details>
                        </v-text-field>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" dark class="mb-2" @click="sheet=true">Tambah Pengguna</v-btn>
                    </v-toolbar>
                </template>
                <template v-slot:item.action="{ item }">
                    <v-icon @click="editItem(item)">
                        edit
                    </v-icon>
                    <v-icon @click="deleteItem(item)">
                        delete
                    </v-icon>
                    <v-icon @click="resetItem(item)">
                        mdi-lock-reset
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <p>Data belum tersedia</p>
                </template>
            </v-data-table>
            <!-- Dialog Delete -->
            <div class="text-center">
                <v-dialog v-model="dialogDelete" width="400">

                    <v-card>
                        <v-card-title class="headline red white--text" primary-title>
                            <v-icon color="white" class="mr-2">delete</v-icon> Hapus Pengguna
                        </v-card-title>

                        <v-card-text class="mt-2 black--text">
                            Apakah anda yakin akan menghapus Pengguna <span class="font-weight-bold"></span>?
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-btn @click="close" color="primary" text>
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
            <!-- Dialog Reset -->
            <div class="text-center">
                <v-dialog v-model="dialogReset" width="400">

                    <v-card>
                        <v-card-title class="headline red white--text" primary-title>
                            <v-icon color="white" class="mr-2">mdi-lock-reset</v-icon> Reset Password
                        </v-card-title>

                        <v-card-text class="mt-2 black--text">
                            Apakah anda yakin akan mereset password pengguna <span class="font-weight-bold"></span>?
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-btn @click="close" color="primary" text>
                                batal
                            </v-btn>
                            <v-spacer></v-spacer>
                            <v-btn color="red" dark @click="dialogReset = false,resetConfirmed()">
                                <v-icon class="mr-2">mdi-lock-reset</v-icon> Reset
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </div>
            <!-- Akhir -->
            <!-- bottom sheet edit & tambah-->
            <template>
                <div class="text-center">
                    <v-bottom-sheet persistent v-model="sheet" inset>
                        <v-sheet class="text-center">

                            <v-card>
                                <v-progress-linear :indeterminate="loading" color="green darken-1" class="my-0"
                                    height="6">
                                </v-progress-linear>
                                <v-card-title>
                                    <v-icon class="mr-2">{{formIcon}}</v-icon>
                                    <span class="headline">{{ formTitle }}</span>
                                    <v-spacer></v-spacer>
                                    <v-btn text icon color="red" @click="close">
                                        <v-icon>close</v-icon>
                                    </v-btn>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field v-model="editedItem.username" label="Nama Kelurahan" outlined dense>
                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-btn height="50" width="120" color="error" text @click="close">Batal</v-btn>
                                    <v-spacer></v-spacer>
                                    <v-btn height="50" width="120" color="green darken-1" class="white--text"
                                        @click="simpan">
                                        {{formBtn}}</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-sheet>
                    </v-bottom-sheet>
                </div>
            </template>
            <!-- snackbar -->
                <div class="text-center ma-2">
                    <v-snackbar :color="snackbarColor" :timeout="timeout" v-model="snackbar">
                        {{ snackbarMessage }}
                        <v-btn icon color="white" text @click="snackbar = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-snackbar>
                </div>
            <!-- akhir snackbar -->
        </v-container>
    </div>
</template>


<script>
    export default {
        props: {
            data: "",
        },
        data: () => ({
            timeout: 2000,
            index: -1,
            loading: false,
            snackbar: false,
            snackbarMessage: "hello",
            snackbarColor: "success",
            sheet: false,
            search: '',
            dialog: false,
            dialogDelete: false,
            dialogDeleteText: null,
            dialogDeleteId: null,
            dialogReset: false,
            dialogResetId: null,
            headers: [{
                    text: 'Nama Kelurahan',
                    sortable: false,
                    value: 'username'
                },
                {
                    text: 'Aksi',
                    value: 'action',
                    sortable: false
                },
            ],
            pengguna: [],
            editedIndex: -1,
            editedItem: {
                username: ""
            },
            defaultItem: {
                username: ""
            },
        }),

        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Tambah Pengguna' : 'Edit Pengguna'
            },
            formIcon() {
                return this.editedIndex === -1 ? 'add' : 'edit'
            },
            formBtn() {
                return this.editedIndex === -1 ? 'Tambah' : 'Edit'
            }
        },

        created() {
            this.initialize()
        },

        mounted() {
            this.pengguna = JSON.parse(this.$props.data);
        },

        methods: {
            initialize() {
                // console.log(this.$props.data);
                this.pengguna = JSON.parse(this.$props.data);
                // console.log(this.pengguna);
            },
            simpan() {
                var ini = this;
                if (this.editedIndex > -1) {
                    axios.post('/pengguna',{
                        old_un: ini.pengguna[ini.index].username, 
                        username: ini.editedItem.username
                    })
                    .then(function (response) {
                        console.log(response)
                        if (response.data == true) {
                            ini.snackbar = true;
                            ini.snackbarColor = "success";
                            ini.snackbarMessage = "Pengguna berhasil diedit"
                            Object.assign(ini.pengguna[ini.editedIndex], ini.editedItem.username)
                        } else {
                            ini.snackbar = true;
                            ini.snackbarColor = "error";
                            ini.snackbarMessage = "Nama kelurahan sudah tersedia"
                        }
                        
                    })
                } else {
                    this.pengguna.push(this.editedItem)
                    axios.post('/pengguna/tambah',{
                        username : ini.editedItem.username
                    })
                    .then(function (response) {
                        console.log(response);
                        if (response.data == true) {
                            ini.snackbar = true;
                            ini.snackbarColor = "success";
                            ini.snackbarMessage = "Pengguna berhasil ditambahkan"
                        } else {
                            ini.snackbar = true;
                            ini.snackbarColor = "error";
                            ini.snackbarMessage = "Terjadi kesalahan, coba lagi"
                        }
                    })
                }
                this.close()
            },

            editItem(item) {
                this.index = this.pengguna.indexOf(item);
                this.editedIndex = this.pengguna.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.sheet = true
            },

            deleteItem(item) {
                const index = this.pengguna.indexOf(item)
                this.dialogDeleteId = item.username;
                // confirm('Are you sure you want to delete this item?') && this.pengguna.splice(index, 1)
                this.dialogDelete = true
            },

            deleteConfirmed() {
                var ini = this;
                axios.delete('/pengguna/' + this.dialogDeleteId)
                .then(function (response) {
                    console.log(response);
                    if (response.data == true) {
                            ini.snackbar = true;
                            ini.snackbarColor = "success";
                            ini.snackbarMessage = "Pengguna berhasil dihapus"
                        } else {
                            ini.snackbar = true;
                            ini.snackbarColor = "error";
                            ini.snackbarMessage = "Terjadi kesalahan, coba lagi"
                        }
                })
            },

            resetItem(item) {
                this.dialogReset = true
                this.dialogResetId = item.username;
            },

            resetConfirmed(){
                var ini = this;
                axios.post('/pengguna/' + this.dialogResetId)
                .then(function (response) {
                    if (response.data == true) {
                        ini.snackbar = true;
                        ini.snackbarColor = "success";
                        ini.snackbarMessage = "Password berhasil di reset"
                    } else {
                        ini.snackbar = true;
                        ini.snackbarColor = "error";
                        ini.snackbarMessage = "Terjadi kesalahan, coba lagi"
                    }
                }) 
            },

            close() {
                this.dialogReset = false
                this.dialogDelete = false
                this.sheet = false
                this.loading = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)

            },
        },
    }

</script>
