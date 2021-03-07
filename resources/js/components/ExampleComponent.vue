<template>
<div>
    <h3>ゲーム種別</h3>
    <input type="radio" name="type" value="ALL" v-on:click="all_click" checked>全て
    <input type="radio" name="type" value="package" v-on:click="package_click">パッケージ販売
    <input type="radio" name="type" value="download" v-on:click="download_click">ダウンロード専売

    <h3>年齢制限</h3>
    <input type="radio" name="age-limit" value="ALL" v-on:click="cero_all_click" checked>年齢制限なし
    <input type="radio" name="age-limit" value="A3+" v-on:click="cero_A_3_click">全年齢対象(CERO:A,IARC:3+)
    <input type="radio" name="age-limit" value="7+" v-on:click="cero_7_click">7歳まで(IARC:7+)
    <input type="radio" name="age-limit" value="B12+" v-on:click="cero_B_12_click">12歳まで(CERO:B,IARC:12+)<br>
    <input type="radio" name="age-limit" value="C+" v-on:click="cero_C_click">15歳まで(CERO:C)
    <input type="radio" name="age-limit" value="16+" v-on:click="cero_16_click">16歳まで(IARC:16+)
    <input type="radio" name="age-limit" value="D" v-on:click="cero_D_click">17歳まで(CERO:D)
    <input type="radio" name="age-limit" value="Z18+" v-on:click="cero_Z_click">18歳以上(CERO:Z,IARC:18+)

    <h3>販売メーカー(販売本数が多いメーカーのみ)</h3>
    <select name="publisher">
        <option v-bind:value="release_maker[0]">{{ release_maker[0] }}</option>
        <option v-bind:value="release_maker[1]">{{ release_maker[1] }}</option>
        <option v-bind:value="release_maker[2]">{{ release_maker[2] }}</option>
        <option v-bind:value="release_maker[3]">{{ release_maker[3] }}</option>
        <option v-bind:value="release_maker[4]">{{ release_maker[4] }}</option>
        <option v-bind:value="release_maker[5]">{{ release_maker[5] }}</option>
        <option v-bind:value="release_maker[6]">{{ release_maker[6] }}</option>
        <option v-bind:value="release_maker[7]">{{ release_maker[7] }}</option>
        <option v-bind:value="release_maker[8]">{{ release_maker[8] }}</option>
        <option v-bind:value="release_maker[9]">{{ release_maker[9] }}</option>
        <option v-bind:value="release_maker[10]">{{ release_maker[10] }}</option>
        <option v-bind:value="release_maker[11]">{{ release_maker[11] }}</option>
        <option v-bind:value="release_maker[12]">{{ release_maker[12] }}</option>
        <option v-bind:value="release_maker[13]">{{ release_maker[13] }}</option>
        <option v-bind:value="release_maker[14]">{{ release_maker[14] }}</option>
        <option v-bind:value="release_maker[15]">{{ release_maker[15] }}</option>
        <option v-bind:value="release_maker[16]">{{ release_maker[16] }}</option>
        <option v-bind:value="release_maker[17]">{{ release_maker[17] }}</option>
        <option v-bind:value="release_maker[18]">{{ release_maker[18] }}</option>
        <option v-bind:value="release_maker[19]">{{ release_maker[19] }}</option>
    </select>
    
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
                game_type: [false,false,false],
                cero_select: [false,false,false,false,false,false,false,false],
                release_maker: [this.gamecount[24],this.gamecount[25],this.gamecount[26],this.gamecount[27],this.gamecount[28],
                                this.gamecount[29],this.gamecount[30],this.gamecount[31],this.gamecount[32],this.gamecount[33],
                                this.gamecount[34],this.gamecount[35],this.gamecount[36],this.gamecount[37],this.gamecount[38],
                                this.gamecount[39],this.gamecount[40],this.gamecount[41],this.gamecount[42],this.gamecount[43]]
            }
        },
        methods: {
            all_click: function() {
                this.inputgamecount = this.gamecount[0];
                for (let i = 0; i < this.game_type.length; i++) {
                    if(i == 0) {
                        this.game_type[i] = true;
                    } else {
                        this.game_type[i] = false;
                    }
                }

                for (let i = 0; i < this.cero_select.length; i++) {
                    if(this.cero_select[i] == true) {
                        this.inputgamecount = this.gamecount[i];
                    }
                }
            },
            package_click: function() {
                this.inputgamecount = this.gamecount[8];
                for (let i = 0; i < this.game_type.length; i++) {
                    if(i == 1) {
                        this.game_type[i] = true;
                    } else {
                        this.game_type[i] = false;
                    }
                }

                for (let i = 0; i < this.cero_select.length; i++) {
                    if(this.cero_select[i] == true) {
                        this.inputgamecount = this.gamecount[i+8];
                    }
                }
            },
            download_click: function() {
                this.inputgamecount = this.gamecount[16];
                for (let i = 0; i < this.game_type.length; i++) {
                    if(i == 2) {
                        this.game_type[i] = true;
                    } else {
                        this.game_type[i] = false;
                    }
                }

                for (let i = 0; i < this.cero_select.length; i++) {
                    if(this.cero_select[i] == true) {
                        this.inputgamecount = this.gamecount[i+16];
                    }
                }
            },

            cero_all_click: function() {
                this.inputgamecount = this.gamecount[0];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 0) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8];
                    }
                }
            },
            cero_A_3_click: function() {
                this.inputgamecount = this.gamecount[1];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 1) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+1];
                    }
                }
            },
            cero_7_click: function() {
                this.inputgamecount = this.gamecount[2];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 2) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+2];
                    }
                }
            },
            cero_B_12_click: function() {
                this.inputgamecount = this.gamecount[3];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 3) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+3];
                    }
                }
            },
            cero_C_click: function() {
                this.inputgamecount = this.gamecount[4];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 4) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+4];
                    }
                }
            },
            cero_16_click: function() {
                this.inputgamecount = this.gamecount[5];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 5) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+5];
                    }
                }
            },
            cero_D_click: function() {
                this.inputgamecount = this.gamecount[6];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 6) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+6];
                    }
                }
            },
            cero_Z_click: function() {
                this.inputgamecount = this.gamecount[7];
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == 7) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }

                for (let i = 0; i < this.game_type.length; i++) {
                    if(this.game_type[i] == true) {
                        this.inputgamecount = this.gamecount[i*8+7];
                    }
                }
            }

        }
    }
</script>