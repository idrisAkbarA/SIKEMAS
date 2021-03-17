<template>
    <div>
        <v-container>
            <v-data-table :headers="headers" :items="peserta" :search="search" class="elevation-1">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Peserta</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-text-field v-model="search" append-icon="search" label="Pencarian" single-line hide-details>
                        </v-text-field>
                    </v-toolbar>
                </template>
                <template v-slot:item.detail="{ item }">
                    <v-btn text small @click="detail(item)">
                        Detail
                    </v-btn>
                </template>
                <template v-slot:no-data>
                    <p>Data belum tersedia</p>
                </template>
            </v-data-table>
            <!-- component dialog detail peserta -->
            <detailpeserta :index="index" v-model="dialogKet" :data="pesertaIndexed"></detailpeserta>
        </v-container>
    </div>
</template>


<script>
    export default {
        props: {
            data: "",
        },
        data: () => ({
            index:null,
            pesertaIndexed:{},
            dialogKet: false,
            search: '',
            headers: [
                {
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
                    text: 'Detail',
                    value: 'detail',
                    sortable: false
                },
            ],
            peserta: [],
        }),

        created() {
            this.initialize()
        },

        mounted() {
            this.peserta = JSON.parse(this.$props.data);
        },

        methods: {
            initialize() {
                // console.log(this.$props.data);
                this.peserta = JSON.parse(this.$props.data);
                // console.log(this.peserta);
            },
            detail(item) {
                this.index = this.peserta.indexOf(item);
                // console.log(item);
                this.pesertaIndexed = item;
                this.dialogKet = true;
            }
        },
    }

</script>
