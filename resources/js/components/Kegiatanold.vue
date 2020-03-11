<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="calc(100% - 10%)" elevation="5">
                <div class="d-flex">
                    <v-card class="d-flex justify-center v-sheet--offset ml-8" color="gradient" elevation="9"
                        width="88px" height="88px">
                        <v-icon color="white">mdi-file</v-icon>
                    </v-card>
                    <div class="ml-5 mt-3">
                        <h4 class="font-weight-medium title">Form Kegiatan</h4>
                    </div>
                </div>
                <v-form v-model="valid" class="ma-5">
                    <v-container>
                        <v-text-field v-model="firstname" :rules="nameRules" label="Nama Kegiatan" outlined dense required>
                        </v-text-field>
                        <v-row style="margin-top:-15px">
                            <v-col cols="12" lg="6" md="6" sm="12">
                                <h6 class="body-1">Waktu Kegiatan</h6>
                                <v-menu v-model="menu1" :close-on-content-click="false" :nudge-right="40"
                                    transition="scale-transition" offset-y min-width="290px">
                                    <template v-slot:activator="{ on }">
                                        <v-text-field v-model="date" label="Dari" prepend-icon="event" readonly
                                            v-on="on"></v-text-field>
                                    </template>
                                    <v-date-picker v-model="date"  no-title scrollable @input="menu1 = false"></v-date-picker>
                                </v-menu>
                            </v-col>
                            <v-col cols="12" lg="6" md="6" sm="12">
                                <h6 style="visibility:hidden" class="body-1">s</h6>
                                <v-menu v-model="menu2" :close-on-content-click="false" :nudge-right="40"
                                    transition="scale-transition" offset-y min-width="290px">
                                    <template v-slot:activator="{ on }">
                                        <v-text-field v-model="date" label="Sampai" prepend-icon="event" readonly
                                            v-on="on"></v-text-field>
                                    </template>
                                    <v-date-picker v-model="date" no-title scrollable @input="menu2 = false"></v-date-picker>
                                </v-menu>
                            </v-col>
                        </v-row>
                        <v-text-field v-model="email" label="Tempat Kegiatan" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Tujuan Kegiatan" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Penyelenggara" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Penanggung Jawab Kegiatan" outlined dense required>
                        </v-text-field>
                        <v-textarea v-model="email" label="Latar Belakang Kegiatan" outlined dense required></v-textarea>
                        <v-text-field v-model="email" label="Trainer" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Jumlah Peserta" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Uang Saku Peserta" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Anggaran Dana" outlined dense required></v-text-field>
                        <v-text-field v-model="email" label="Outcome" outlined dense required></v-text-field>
                        <v-file-input label="Foto Dokumentasi 1" placeholder="pilih foto" outlined dense prepend-icon="mdi-camera"></v-file-input>
                        <v-file-input label="Foto Dokumentasi 2" placeholder="pilih foto" outlined dense prepend-icon="mdi-camera"></v-file-input>
                        <v-file-input label="Foto Dokumentasi 3" placeholder="pilih foto" outlined dense prepend-icon="mdi-camera"></v-file-input>
                        <v-file-input label="Foto Dokumentasi 4" placeholder="pilih foto" outlined dense prepend-icon="mdi-camera"></v-file-input>
                        <v-btn class="mr-4 gradient white--text retain-focus-on-click" type="submit">submit</v-btn>
                    </v-container>
                </v-form>
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
        data: () => ({
            date: new Date().toISOString().substr(0, 10),
            menu1: false,
            menu2: false,
            valid: false,
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
        }),
    }

</script>
