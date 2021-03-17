<template>
  <div class="text-center">
    <v-container>
      <v-bottom-sheet
        v-model="sheet"
        inset
      >
        <v-card>
          <v-card-title
            class="headline grey lighten-2"
            primary-title
          >
            Detail Peserta
          </v-card-title>

          <v-container>

            <tr>
              <td class="py-0">
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">NIK</div>
                    <v-list-item-title class="body-1">{{data.nik}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </td>
              <td class="py-0">
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">Nama</div>
                    <v-list-item-title class="body-1">{{data.nama}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </td>
            </tr>
            <tr>
              <td class="py-0">
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">Jenis Kelamin</div>
                    <v-list-item-title class="body-1">{{data.jk}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </td>
              <td class="py-0">
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">No. Hp</div>
                    <v-list-item-title class="body-1">{{data.hp}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </td>
            </tr>
            <tr>
              <td class="py-0">
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">Pekerjaan</div>
                    <v-list-item-title class="body-1">{{data.pekerjaan}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </td>
            </tr>
                <v-list-item>
                  <v-list-item-content>
                    <div class="subtitle-2 grey--text">Alamat</div>
                    <v-list-item-title class="body-1">{{data.alamat}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
            <v-list-item>
              <v-list-item-content>
                <div class="subtitle-2 grey--text">Keterangan</div>
                <v-list-item-title class="body-1">1223445523</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item>
              <v-list-item-content>
                <div class="subtitle-2 grey--text">Kegiatan yang pernah diikuti</div>
                <v-list-item-title class="body-1">1223445523</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-container>
        </v-card>
      </v-bottom-sheet>
    </v-container>
  </div>
</template>

<style scoped>
</style>

<script>
export default {
  props: {
    value: null,
    data:{},
    index:null, // siapa tau ada gunanya
  },
  model: {
    prop: "value",
    event: "sheetClicked"
  },
  computed:{
      sheet:{
          get:function(){
              return this.value;
          },
          set:function(value){
              this.$emit("sheetClicked", value);
          }
      }
  },
  data() {
    return {
   
    };
  }
};
</script>
