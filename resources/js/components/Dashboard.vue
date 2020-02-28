<template>
    <div>
        <v-container class="mt-7">
            <v-row>
                <v-col>
                    <v-card elevation="5">
                        <v-card class="v-sheet--offset mx-auto" color="gradient" elevation="9"
                            max-width="calc(100% - 32px)" height="88px">
                            <v-list-item three-line>
                                <v-list-item-content class="white--text">
                                    <div class="">TOTAL KEGIATAN</div>
                                    <v-list-item-title class="headline mb-1">Kel. Air Hitam</v-list-item-title>
                                </v-list-item-content>
                                <h2 class="white--text">177</h2>
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
                                        <tr>
                                            <td>1.</td>
                                            <td>Pelatihan memasak</td>
                                            <td class="text-center">
                                                <v-btn text small>Detail</v-btn>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-container>

                    </v-card>
                </v-col>
                <v-col>
                    <v-card elevation="5">
                        <v-card class="v-sheet--offset mx-auto" color="gradient" elevation="9"
                            max-width="calc(100% - 32px)" height="88px">
                            <v-list-item three-line>
                                <v-list-item-content class="white--text">
                                    <div class="">TOTAL KEGIATAN</div>
                                    <v-list-item-title class="headline mb-1">Kel. Air Hitam</v-list-item-title>
                                </v-list-item-content>
                                <h2 class="white--text">177</h2>
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
                                        <tr>
                                            <td>1.</td>
                                            <td>Pelatihan memasak</td>
                                            <td class="text-center">
                                                <v-btn text small>Detail</v-btn>
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
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
