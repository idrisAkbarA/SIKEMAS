<template>
    <div>
        <v-container class="mt-7">
            <v-row>
                <v-col>
                    <v-card max-heigth="500" elevation="5">
                        <v-card  class="v-sheet--offset mx-auto" color="gradient" elevation="9"
                            max-width="calc(100% - 32px)" height="88px">
                            <v-list-item three-line>
                                <v-list-item-content class="white--text">
                                    <div class="">TOTAL KEGIATAN</div>
                                    <v-list-item-title class="headline mb-1">Kel. {{Object.keys(kegiatan)[0]}}</v-list-item-title>
                                </v-list-item-content>
                                <h2 class="white--text">{{realKegiatanYaya.length}}</h2>
                            </v-list-item>
                        </v-card>
                        <v-sheet class="overflow-y-auto" height="300">
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
                                        <tr v-for="(item, i) in realKegiatanYaya" :key="i">
                                            <td>{{i+1}}</td>
                                            <td>{{item.nama_kegiatan}}</td>
                                            <td class="text-center">
                                                <v-btn text small @click="{detail(item.id_kegiatan)}" >Detail</v-btn>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-container>
                        </v-sheet>
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
        },
        data() {
            return {
                kegiatan: [],
                realKegiatanYaya:[],

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
                // console.log(this.kegiatan);
                // console.log( Object.keys(this.kegiatan));
                console.log(this.kegiatan[Object.keys(this.kegiatan)[0]]);
                this.realKegiatanYaya = this.kegiatan[Object.keys(this.kegiatan)[0]];
            },
            detail(id_kegiatan){
                var id = id_kegiatan;
                console.log(id);
                window.location.href = "/detail/"+id;
            }  
        },
    }

</script>
