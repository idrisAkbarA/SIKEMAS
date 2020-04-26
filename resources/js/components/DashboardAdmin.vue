<template>
    <div>
        <v-container>
            <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
                @keyup="liveSearch()"
            ></v-text-field>
            <v-row>
                <v-col v-for="item in stringKegiatan" :key="item" cols="12" sm="12" lg="6">
                    <cardKel :data="item"></cardKel>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default {
    props: {
        data: "",
    },

    data() {
        return {
            kegiatan: [],
            stringKegiatan:[],
            search:'',
        }
    },

    created() {
        this.initialize()
    },
    methods: {
        initialize() {
            this.kegiatan = JSON.parse(this.$props.data);
            
            this.kegiatan.forEach(element => {
                this.stringKegiatan.push(JSON.stringify(element));
                // console.log(this.stringKegiatan);
            });
        },
        liveSearch(){
            this.stringKegiatan = [];
            var ini = this;
            axios.get('/search', {
                params:{
                search: ini.search,}
            })
            .then(function (response) {
                ini.stringKegiatan = [];
                console.log(response.data);
                ini.kegiatan = response.data;
            
                ini.kegiatan.forEach(element => {
                ini.stringKegiatan.push(JSON.stringify(element));
            });
        })
    }
}
}
</script>