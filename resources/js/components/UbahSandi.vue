<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="450" elevation="5">
                <v-card-title>
                    Ubah Kata Sandi
                </v-card-title>
                <v-card-text>
                        <v-text-field @blur="cekSandi();" v-model="sandi" :error="err"
                            :error-messages="errMes" label="Kata Sandi Lama" outlined dense required
                            :append-icon="show ? 'visibility_off' : 'visibility'"
                           @click:append="show = !show" :type="show ? 'text' : 'password'">
                        </v-text-field>
                        <v-text-field @input="konfirmasi" v-model="sandiBaru" type="password" label="Kata Sandi Baru" outlined dense required>
                        </v-text-field>
                        <v-text-field @input="konfirmasi" v-model="konfirSandi" type="password" label="Konfirmasi Kata Sandi" outlined dense required>
                        </v-text-field>
                </v-card-text>
                <v-card-actions class="ml-2 mt-n8 mb-3">
                    <v-btn type="submit" class="light-blue darken-1 white--text" :disabled="!valid" @click="ubahSandi"> Ubah Sandi</v-btn>
                </v-card-actions>
            </v-card>
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

<style scoped>
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
                valid : false,
                snackbar: false,
                snackbarMessage: "hello",
                snackbarColor: "success",
                timeout: 2000,
                sandiLama : false,
                sandiBaru : "",
                konfirSandi : "",
                sandi : "",
                err: false,
                errMes:"",
                show : false,
                show1 : false,
                show2 : false,
            }
        },

        methods: {
            konfirmasi(){
                if((this.sandi!="")&&(this.sandiBaru == this.konfirSandi)&&(this.sandiLama == true)&&(this.sandiBaru!="")&&(this.konfirSandi!="")){
                    this.valid = true;
                }else{
                    this.valid = false;
                }
            },
            cekSandi() {
                var ini = this;
                axios.post('/cekSandi',{
                    sandi: ini.sandi,
                })
                .then(function(response) {
                    if (response.data == 'ada') {
                        ini.err = false;
                        ini.errMes = "";
                        ini.sandiLama = true;
                    } else {
                        ini.err = true;
                        ini.errMes = "Kata Sandi Salah";
                        ini.sandiLama = false;
                    }
                })
            },

            ubahSandi() {
                var ini = this;
                axios.post('/ubahSandi',{
                    sandiBaru: ini.sandiBaru,
                })
                .then(function(response) {
                    console.log(response.data)
                    if (response.data == true) {
                        ini.snackbar = true;
                        ini.snackbarColor = "success";
                        ini.snackbarMessage = "Kata sandi berhasil diubah"
                        ini.sandi = "";
                        ini.sandiBaru = "";
                        ini.konfirSandi = "";
                    } else {
                        ini.snackbar = true;
                        ini.snackbarColor = "error";
                        ini.snackbarMessage = "Terjadi kesalahan, coba lagi"
                    }
                })
            }

        },
    }

</script>
