<template>
<div>
    <h3>ゲーム種別</h3>
    <input type="radio" name="type" value="ALL" v-on:click="all_click" checked>全て
    <input type="radio" name="type" value="package" v-on:click="package_click">パッケージ販売
    <input type="radio" name="type" value="download" v-on:click="download_click">ダウンロード専売

    <h3>販売メーカー(販売本数が多いメーカーのみ)</h3>
    <select name="publisher">
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
      <option value="">1</option>
    </select>

    <h3>年齢制限</h3>
    <input type="radio" name="age-limit" value="ALL" v-on:click="cero_all_click" checked>年齢制限なし
    <input type="radio" name="age-limit" value="A3+" v-on:click="cero_A_3_click">全年齢対象(CERO:A,IARC:3+)
    <input type="radio" name="age-limit" value="7+" v-on:click="cero_7_click">7歳まで(IARC:7+)
    <input type="radio" name="age-limit" value="B12+" v-on:click="cero_B_12_click">12歳まで(CERO:B,IARC:12+)<br>
    <input type="radio" name="age-limit" value="C+" v-on:click="cero_C_click">15歳まで(CERO:C)
    <input type="radio" name="age-limit" value="16+" v-on:click="cero_16_click">16歳まで(IARC:16+)
    <input type="radio" name="age-limit" value="D" v-on:click="cero_D_click">17歳まで(CERO:D)
    <input type="radio" name="age-limit" value="Z18+" v-on:click="cero_Z_click">18歳以上(CERO:Z,IARC:18+)
    
    <ul>
        <li>{{ inputgamecount }}</li>
        <li></li>
        <li>{{ allgamecount }}</li>
        <li>{{ gamecount_cero_A_3 }}</li>
        <li>{{ gamecount_cero_7 }}</li>
        <li>{{ gamecount_cero_B_12 }}</li>
        <li>{{ gamecount_cero_C }}</li>
        <li>{{ gamecount_cero_16 }}</li>
        <li>{{ gamecount_cero_D }}</li>
        <li>{{ gamecount_cero_Z }}</li>
        <li></li>
        <li>{{ downloadallgamecount }}</li>
        <li>{{ downloadgamecount_cero_A_3 }}</li>
        <li>{{ downloadgamecount_cero_7 }}</li>
        <li>{{ downloadgamecount_cero_B_12 }}</li>
        <li>{{ downloadgamecount_cero_C }}</li>
        <li>{{ downloadgamecount_cero_16 }}</li>
        <li>{{ downloadgamecount_cero_D }}</li>
        <li>{{ downloadgamecount_cero_Z }}</li>
        <li></li>
        <li>{{ packageallgamecount }}</li>
        <li>{{ packagegamecount_cero_A_3 }}</li>
        <li>{{ packagegamecount_cero_7 }}</li>
        <li>{{ packagegamecount_cero_B_12 }}</li>
        <li>{{ packagegamecount_cero_C }}</li>
        <li>{{ packagegamecount_cero_16 }}</li>
        <li>{{ packagegamecount_cero_D }}</li>
        <li>{{ packagegamecount_cero_Z }}</li>
    </ul>
</div>
</template>

<script>
    export default {
        props:["gamecount"],
        data(){
            return {
                inputgamecount: this.gamecount[0],

                allgamecount: this.gamecount[0],
                gamecount_cero_A_3: this.gamecount[1],
                gamecount_cero_7: this.gamecount[2],
                gamecount_cero_B_12: this.gamecount[3],
                gamecount_cero_C: this.gamecount[4],
                gamecount_cero_16: this.gamecount[5],
                gamecount_cero_D: this.gamecount[6],
                gamecount_cero_Z: this.gamecount[7],

                downloadallgamecount: this.gamecount[8],
                downloadgamecount_cero_A_3: this.gamecount[9],
                downloadgamecount_cero_7: this.gamecount[10],
                downloadgamecount_cero_B_12: this.gamecount[11],
                downloadgamecount_cero_C: this.gamecount[12],
                downloadgamecount_cero_16: this.gamecount[13],
                downloadgamecount_cero_D: this.gamecount[14],
                downloadgamecount_cero_Z: this.gamecount[15],

                packageallgamecount: this.gamecount[16],
                packagegamecount_cero_A_3: this.gamecount[17],
                packagegamecount_cero_7: this.gamecount[18],
                packagegamecount_cero_B_12: this.gamecount[19],
                packagegamecount_cero_C: this.gamecount[20],
                packagegamecount_cero_16: this.gamecount[21],
                packagegamecount_cero_D: this.gamecount[22],
                packagegamecount_cero_Z: this.gamecount[23]
            }
        },
        methods: {
            all_click: function() {
                this.inputgamecount = this.gamecount[0];
                if(cero_all_click == true) {
                    this.inputgamecount = this.gamecount[0];
                }
                if(cero_A_3_click == true) {
                    this.inputgamecount = this.gamecount[1];
                }
                if(cero_7_click == true) {
                    this.inputgamecount = this.gamecount[2];
                }
                if(cero_B_12_click == true) {
                    this.inputgamecount = this.gamecount[3];
                }    
                if(cero_C_click == true) {
                    this.inputgamecount = this.gamecount[4];
                }
                if(cero_16_click == true) {
                    this.inputgamecount = this.gamecount[5];
                }
                if(cero_D_click == true) {
                    this.inputgamecount = this.gamecount[6];
                }
                if(cero_Z_click == true) {
                    this.inputgamecount = this.gamecount[7];
                }
            },
            download_click: function() {
                this.inputgamecount = this.gamecount[8];
                if(cero_all_click == true) {
                    this.inputgamecount = this.gamecount[8];
                }
                if(cero_A_3_click == true) {
                    this.inputgamecount = this.gamecount[9];
                }
                if(cero_7_click == true) {
                    this.inputgamecount = this.gamecount[10];
                }
                if(cero_B_12_click == true) {
                    this.inputgamecount = this.gamecount[11];
                }    
                if(cero_C_click == true) {
                    this.inputgamecount = this.gamecount[12];
                }
                if(cero_16_click == true) {
                    this.inputgamecount = this.gamecount[13];
                }
                if(cero_D_click == true) {
                    this.inputgamecount = this.gamecount[14];
                }
                if(cero_Z_click == true) {
                    this.inputgamecount = this.gamecount[15];
                }
            },
            package_click: function() {
                this.inputgamecount = this.gamecount[16];
                if(cero_all_click == true) {
                    this.inputgamecount = this.gamecount[16];
                }
                if(cero_A_3_click == true) {
                    this.inputgamecount = this.gamecount[17];
                }
                if(cero_7_click == true) {
                    this.inputgamecount = this.gamecount[18];
                }
                if(cero_B_12_click == true) {
                    this.inputgamecount = this.gamecount[19];
                }    
                if(cero_C_click == true) {
                    this.inputgamecount = this.gamecount[20];
                }
                if(cero_16_click == true) {
                    this.inputgamecount = this.gamecount[21];
                }
                if(cero_D_click == true) {
                    this.inputgamecount = this.gamecount[22];
                }
                if(cero_Z_click == true) {
                    this.inputgamecount = this.gamecount[23];
                }
            },

            cero_all_click: function() {
                this.inputgamecount = this.gamecount[0];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[0];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[8];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[16];
                }
            },
            cero_A_3_click: function() {
                this.inputgamecount = this.gamecount[1];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[1];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[9];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[17];
                }
            },
            cero_7_click: function() {
                this.inputgamecount = this.gamecount[2];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[2];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[10];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[18];
                }
            },
            cero_B_12_click: function() {
                this.inputgamecount = this.gamecount[3];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[3];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[11];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[19];
                }
            },
            cero_C_click: function() {
                this.inputgamecount = this.gamecount[4];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[4];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[12];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[20];
                }
            },
            cero_16_click: function() {
                this.inputgamecount = this.gamecount[5];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[5];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[13];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[21];
                }
            },
            cero_D_click: function() {
                this.inputgamecount = this.gamecount[6];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[6];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[14];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[22];
                }
            },
            cero_Z_click: function() {
                this.inputgamecount = this.gamecount[7];
                if(all_click == true) {
                    this.inputgamecount = this.gamecount[7];
                }
                if(download_click == true) {
                    this.inputgamecount = this.gamecount[15];
                }
                if(package_click == true) {
                    this.inputgamecount = this.gamecount[23];
                }
            }

        }
        // mounted() {
        //     console.log(this.count)
        // }
    }
</script>