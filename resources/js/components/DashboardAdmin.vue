<template>
    <div>
        <v-container>
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
    },


}
</script>