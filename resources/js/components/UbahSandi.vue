<template>
    <div>
        <v-container class="d-flex  justify-center mt-7">
            <v-card width="450" elevation="5">
                <!-- <v-card class="v-sheet--offset mx-auto" color="gradient" elevation="9" max-width="calc(100% - 32px)"
                    height="88px">
                    <v-list-item three-line>
                        <v-list-item-content class="white--text">
                            <v-list-item-title class="headline mb-1">Ubah Kata Sandi</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-card> -->
                <v-card-title>
                    Ubah Kata Sandi
                </v-card-title>
                <v-card-text>
                        <v-text-field label="Kata Sandi Lama" outlined dense required></v-text-field>
                        <v-text-field label="Kata Sandi Baru" outlined dense required></v-text-field>
                        <v-text-field label="Konfirmasi Kata Sandi" outlined dense required></v-text-field>
                </v-card-text>
                <v-card-actions class="ml-2" style="margin-top:-8">
                    <v-btn type="submit" class="bilu white--text"> Simpan Perubahan</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>

<style scoped>
    /* .gradient {
        background: #267DFF;
        background: -webkit-linear-gradient(to bottom right, #267DFF, #6dd5ed);
        background: linear-gradient(to bottom right, #267DFF, #6dd5ed);
    } */

    .v-sheet--offset {
        padding: 5px;
        top: -24px;
        position: relative;
    }
    .bilu {
        background: #ade8f5;
        background: -webkit-linear-gradient(to bottom right, #ade8f5, #ade8f5);
        background: linear-gradient(to bottom right, #6dd5ed, #6dd5ed);
    }
</style>

<script>
    export default {

    }

</script>
