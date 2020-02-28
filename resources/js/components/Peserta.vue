<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="calc(100% - 15%)" elevation="5">
            <v-stepper v-model="e1" alt-labels>
                <v-stepper-header>
                    <v-stepper-step step="1">Input data peserta</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="2">Isi form kegiatan</v-stepper-step>
                </v-stepper-header>

                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-form v-model="valid">
                            <v-container>
                                <v-text-field label="NIK" outlined dense required></v-text-field>
                                <v-text-field label="Nama" outlined dense required></v-text-field>
                                <v-radio-group v-model="row" row>
                                    <v-radio label="Laki-laki" value="radio-1"></v-radio>
                                    <v-radio label="Perempuan" value="radio-2"></v-radio>
                                </v-radio-group>
                                <v-textarea outlined label="Alamat"></v-textarea>
                                <v-text-field label="No. HP" outlined dense required></v-text-field>
                                <v-text-field label="Pekerjaan" outlined dense required></v-text-field>
                                <v-btn class="mr-4 gradient white--text retain-focus-on-click" type="submit">submit
                                </v-btn>
                            </v-container>
                        </v-form>

                        <v-btn color="primary" @click="e1 = 2">
                            Continue
                        </v-btn>

                        <v-btn text>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <v-form v-model="valid">
                            <v-container>
                                <v-text-field v-model="firstname" :rules="nameRules" label="Nama Kegiatan" outlined
                                    dense required>
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
                                            <v-date-picker v-model="date" no-title scrollable @input="menu1 = false">
                                            </v-date-picker>
                                        </v-menu>
                                    </v-col>
                                    <v-col cols="12" lg="6" md="6" sm="12">
                                        <h6 style="visibility:hidden" class="body-1">s</h6>
                                        <v-menu v-model="menu2" :close-on-content-click="false" :nudge-right="40"
                                            transition="scale-transition" offset-y min-width="290px">
                                            <template v-slot:activator="{ on }">
                                                <v-text-field v-model="date" label="Sampai" prepend-icon="event"
                                                    readonly v-on="on"></v-text-field>
                                            </template>
                                            <v-date-picker v-model="date" no-title scrollable @input="menu2 = false">
                                            </v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>
                                <v-text-field label="Tempat Kegiatan" outlined dense required></v-text-field>
                                <v-text-field label="Tujuan Kegiatan" outlined dense required></v-text-field>
                                <v-text-field label="Penyelenggara" outlined dense required></v-text-field>
                                <v-text-field label="Penanggung Jawab Kegiatan" outlined dense required>
                                </v-text-field>
                                <v-textarea label="Latar Belakang Kegiatan" outlined dense required></v-textarea>
                                <v-text-field label="Trainer" outlined dense required></v-text-field>
                                <v-text-field label="Jumlah Peserta" outlined dense required></v-text-field>
                                <v-text-field label="Uang Saku Peserta" outlined dense required></v-text-field>
                                <v-text-field label="Anggaran Dana" outlined dense required></v-text-field>
                                <v-text-field label="Outcome" outlined dense required></v-text-field>
                                <v-file-input label="Foto Dokumentasi 1" placeholder="pilih foto" outlined dense
                                    prepend-icon="mdi-camera"></v-file-input>
                                <v-file-input label="Foto Dokumentasi 2" placeholder="pilih foto" outlined dense
                                    prepend-icon="mdi-camera"></v-file-input>
                                <v-file-input label="Foto Dokumentasi 3" placeholder="pilih foto" outlined dense
                                    prepend-icon="mdi-camera"></v-file-input>
                                <v-file-input label="Foto Dokumentasi 4" placeholder="pilih foto" outlined dense
                                    prepend-icon="mdi-camera"></v-file-input>
                                <v-btn class="mr-4 gradient white--text retain-focus-on-click" type="submit">submit
                                </v-btn>
                            </v-container>
                        </v-form>

                        <v-btn color="primary" @click="e1 = 1">
                            Continue
                        </v-btn>

                        <v-btn text>Cancel</v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
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
        data() {
            return {
                e1: 1,
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
                row: null,
                e1: 1,
            }
        },
    }

</script>
