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
    </ul>
</div>
</template>

<script>
    export default {
        props:["gamecount"],
        data(){
            return {
                inputgamecount: this.gamecount[0],

                allgame: false,
                packagegame: false,
                downloadgame: false,

                cero_all: false,
                cero_A_3: false,
                cero_7: false,
                cero_B_12: false,
                cero_C: false,
                cero_16: false,
                cero_D: false,
                cero_Z: false
            }
        },
        methods: {
            all_click: function() {
                this.allgame = true;
                this.packagegame = false;
                this.downloadgame = false;
                this.inputgamecount = this.gamecount[0];
                if(this.cero_all == true) {
                    this.inputgamecount = this.gamecount[0];
                }
                if(this.cero_A_3 == true) {
                    this.inputgamecount = this.gamecount[1];
                }
                if(this.cero_7 == true) {
                    this.inputgamecount = this.gamecount[2];
                }
                if(this.cero_B_12 == true) {
                    this.inputgamecount = this.gamecount[3];
                }    
                if(this.cero_C == true) {
                    this.inputgamecount = this.gamecount[4];
                }
                if(this.cero_16 == true) {
                    this.inputgamecount = this.gamecount[5];
                }
                if(this.cero_D == true) {
                    this.inputgamecount = this.gamecount[6];
                }
                if(this.cero_Z == true) {
                    this.inputgamecount = this.gamecount[7];
                }
            },
            download_click: function() {
                this.allgame = false;
                this.packagegame = false;
                this.downloadgame = true;
                this.inputgamecount = this.gamecount[8];
                if(this.cero_all == true) {
                    this.inputgamecount = this.gamecount[8];
                }
                if(this.cero_A_3 == true) {
                    this.inputgamecount = this.gamecount[9];
                }
                if(this.cero_7 == true) {
                    this.inputgamecount = this.gamecount[10];
                }
                if(this.cero_B_12 == true) {
                    this.inputgamecount = this.gamecount[11];
                }    
                if(this.cero_C == true) {
                    this.inputgamecount = this.gamecount[12];
                }
                if(this.cero_16 == true) {
                    this.inputgamecount = this.gamecount[13];
                }
                if(this.cero_D == true) {
                    this.inputgamecount = this.gamecount[14];
                }
                if(this.cero_Z == true) {
                    this.inputgamecount = this.gamecount[15];
                }
            },
            package_click: function() {
                this.allgame = false;
                this.packagegame = true;
                this.downloadgame = false;
                this.inputgamecount = this.gamecount[16];
                if(this.cero_all == true) {
                    this.inputgamecount = this.gamecount[16];
                }
                if(this.cero_A_3 == true) {
                    this.inputgamecount = this.gamecount[17];
                }
                if(this.cero_7 == true) {
                    this.inputgamecount = this.gamecount[18];
                }
                if(this.cero_B_12 == true) {
                    this.inputgamecount = this.gamecount[19];
                }    
                if(this.cero_C == true) {
                    this.inputgamecount = this.gamecount[20];
                }
                if(this.cero_16 == true) {
                    this.inputgamecount = this.gamecount[21];
                }
                if(this.cero_D == true) {
                    this.inputgamecount = this.gamecount[22];
                }
                if(this.cero_Z == true) {
                    this.inputgamecount = this.gamecount[23];
                }
            },

            cero_all_click: function() {
                this.cero_all = true;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[0];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[0];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[8];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[16];
                }
            },
            cero_A_3_click: function() {
                this.cero_all = false;
                this.cero_A_3 = true;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[1];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[1];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[9];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[17];
                }
            },
            cero_7_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = true;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[2];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[2];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[10];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[18];
                }
            },
            cero_B_12_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = true;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[3];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[3];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[11];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[19];
                }
            },
            cero_C_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = true;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[4];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[4];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[12];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[20];
                }
            },
            cero_16_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = true;
                this.cero_D = false;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[5];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[5];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[13];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[21];
                }
            },
            cero_D_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = true;
                this.cero_Z = false;
                this.inputgamecount = this.gamecount[6];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[6];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[14];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[22];
                }
            },
            cero_Z_click: function() {
                this.cero_all = false;
                this.cero_A_3 = false;
                this.cero_7 = false;
                this.cero_B_12 = false;
                this.cero_C = false;
                this.cero_16 = false;
                this.cero_D = false;
                this.cero_Z = true;
                this.inputgamecount = this.gamecount[7];
                if(this.allgame == true) {
                    this.inputgamecount = this.gamecount[7];
                }
                if(this.downloadgame == true) {
                    this.inputgamecount = this.gamecount[15];
                }
                if(this.packagegame == true) {
                    this.inputgamecount = this.gamecount[23];
                }
            }

        }
        // mounted() {
        //     console.log(this.count)
        // }
    }
</script>