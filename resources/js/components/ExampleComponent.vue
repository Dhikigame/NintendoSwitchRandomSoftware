<template>
    <div>
        <h3>ゲーム種別</h3>
        <input type="radio" name="software_type" value="ALL_software" v-on:click="all_click" checked>全て
        <input type="radio" name="software_type" value="package" v-on:click="package_click">パッケージ販売
        <input type="radio" name="software_type" value="download" v-on:click="download_click">ダウンロード販売

        <h3>年齢制限</h3>
        <input type="radio" name="age_limit" value="ALL_cero" v-on:click="cero_all_click" checked>年齢制限なし
        <input type="radio" name="age_limit" value="A3+" v-on:click="cero_A_3_click">全年齢対象(CERO:A,IARC:3+)
        <input type="radio" name="age_limit" value="7+" v-on:click="cero_7_click">7歳まで(IARC:7+)
        <input type="radio" name="age_limit" value="B12+" v-on:click="cero_B_12_click">12歳まで(CERO:B,IARC:12+)<br>
        <input type="radio" name="age_limit" value="C+" v-on:click="cero_C_click">15歳まで(CERO:C)
        <input type="radio" name="age_limit" value="16+" v-on:click="cero_16_click">16歳まで(IARC:16+)
        <input type="radio" name="age_limit" value="D+" v-on:click="cero_D_click">17歳まで(CERO:D)
        <input type="radio" name="age_limit" value="Z18+" v-on:click="cero_Z_click">18歳以上(CERO:Z,IARC:18+)

        <h3>販売メーカー(販売本数が多いメーカー20社のみ)</h3>
        <select name="publisher" id="publisher" v-on:change="release_maker_click($event)">
            <option name="all_release_maker" v-bind:value=0 selected>全ての販売メーカー</option>
            <option v-for="rank in 20" v-bind:name="release_maker[rank - 1]" v-bind:value="rank">{{ release_maker[rank - 1] }}</option>
        </select>
        
        <p><span>検索ソフトリリース数 / 全ソフトリリース数</span></p>
        <p><span>{{ animegamecount }} / {{ this.gamecount[0] }}</span></p>
        
        <button v-bind:disabled="buttonvisibleflag==false">Post</button>
    </div>
</template>

<script>
    import {TweenMax} from 'gsap';

    window.onpageshow = function(event){
        // ラジオボタンALL_softwareにチェックを入れる
        document.search_random.software_type[0].checked = true;
        document.search_random.software_type[1].checked = false;
        document.search_random.software_type[2].checked = false;
        // ラジオボタンALL_ceroにチェックを入れる
        document.search_random.age_limit[0].checked = true;
        document.search_random.age_limit[1].checked = false;
        document.search_random.age_limit[2].checked = false;
        document.search_random.age_limit[3].checked = false;
        document.search_random.age_limit[4].checked = false;
        document.search_random.age_limit[5].checked = false;
        document.search_random.age_limit[6].checked = false;
        document.search_random.age_limit[7].checked = false;
    };
    // プルダウンメニューをvalue=0に初期化固定
    $(document).ready(function() {
        $("#publisher").val(0).trigger("change");
    });
    
    export default {
        props:["gamecount"],
        data(){
            return {
                outputgamecount: this.gamecount[0],
                // buttongamecount: this.gamecount[0],
                buttonvisibleflag: true,
                outputgamecount_firstflag: 0,
                software_type: "ALL_software",
                age_limit: "ALL_cero",
                release_maker_name: "all_release_maker",
                release_maker: [this.gamecount[24],this.gamecount[25],this.gamecount[26],this.gamecount[27],this.gamecount[28],
                                this.gamecount[29],this.gamecount[30],this.gamecount[31],this.gamecount[32],this.gamecount[33],
                                this.gamecount[34],this.gamecount[35],this.gamecount[36],this.gamecount[37],this.gamecount[38],
                                this.gamecount[39],this.gamecount[40],this.gamecount[41],this.gamecount[42],this.gamecount[43]],
                game_type: [true,false,false],
                cero_select: [true,false,false,false,false,false,false,false],
                release_maker_select: [true,
                                    false,false,false,false,false,
                                    false,false,false,false,false,
                                    false,false,false,false,false,
                                    false,false,false,false,false]
            }
        },
        methods: {
            all_click: function(e) {
                this.software_type = e.target.value;
                this.game_type_auth(0);
                this.searchgamecount();
            },
            package_click: function(e) {
                this.software_type = e.target.value;
                this.game_type_auth(1);
                this.searchgamecount();
            },
            download_click: function(e) {
                this.software_type = e.target.value;
                this.game_type_auth(2);
                this.searchgamecount();
            },

            cero_all_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(0);
                this.searchgamecount();
            },
            cero_A_3_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(1);
                this.searchgamecount();
            },
            cero_7_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(2);
                this.searchgamecount();
            },
            cero_B_12_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(3);
                this.searchgamecount();
            },
            cero_C_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(4);
                this.searchgamecount();
            },
            cero_16_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(5);
                this.searchgamecount();
            },
            cero_D_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(6);
                this.searchgamecount();
            },
            cero_Z_click: function(e) {
                this.age_limit = e.target.value;
                this.cero_auth(7);
                this.searchgamecount();
            },

            game_type_auth: function(software_type_num) {
                for (let i = 0; i < this.game_type.length; i++) {
                    if(i == software_type_num) {
                        this.game_type[i] = true;
                    } else {
                        this.game_type[i] = false;
                    }
                }
            },
            cero_auth: function(age_limit_num) {
                for (let i = 0; i < this.cero_select.length; i++) {
                    if(i == age_limit_num) {
                        this.cero_select[i] = true;
                    } else {
                        this.cero_select[i] = false;
                    }
                }
            },

            release_maker_click: function(e) {
                let rank = e.target.value
                for (let i = 0; i <= this.release_maker.length; i++) {
                    if(i == rank && rank != 0) {
                        this.release_maker_select[i] = true;
                        this.release_maker_name = this.release_maker[i-1];
                    } else {
                        this.release_maker_select[i] = false;
                    }
                    if(i == 0 && rank == 0) {
                        this.release_maker_select[i] = true;
                        this.release_maker_name = "all_release_maker";
                    }
                }

                this.searchgamecount();
            },

            searchgamecount: function() {
                let gamecount_sub = 0;
                if(this.release_maker_select[0] == true) {
                    for (let i = 0; i < this.game_type.length; i++) {
                        for (let j = 0; j < this.cero_select.length; j++) {
                            if(this.game_type[i] == true && this.cero_select[j] == true) {
                                this.buttonvisible(this.gamecount[gamecount_sub]);
                                this.countupgamecount(this.gamecount[gamecount_sub]);
                                break;
                            }
                            gamecount_sub++;
                        }
                    }
                } else {
                    for (let i = 0; i < this.game_type.length; i++) {
                        for (let j = 0; j < this.cero_select.length; j++) {
                            for (let k = 1; k < this.release_maker_select.length; k++) {
                                if(this.game_type[i] == true && this.cero_select[j] == true && this.release_maker_select[k] == true) {
                                    this.buttonvisible(this.gamecount[gamecount_sub+44]);
                                    this.countupgamecount(this.gamecount[gamecount_sub+44]);
                                    break;
                                }
                                gamecount_sub++;
                            }
                        }
                    }
                }
            },

            countupgamecount: function(value) {
                this.buttongamecount = value;
                TweenMax.to(this.$data, 1, {outputgamecount: value});
            },

            buttonvisible: function(value) {
                if(value == 0) {
                    this.buttonvisibleflag = false;
                } else {
                    this.buttonvisibleflag = true;
                }
                return this.buttonvisibleflag;
            }

            // onSubmit: function() {
            //     axios.get("http://127.0.0.1:8000/result")
            //     .then(response => {
            //         software_type: this.software_type;
            //         age_limit: this.age_limit;
            //         release_maker_name: this.release_maker_name;
            //     });
            //     // console.log(this.software_type);
            //     // console.log(this.age_limit);
            //     // console.log(this.release_maker_name);
            // }
        },

        computed: {
            animegamecount: function() {
                if(this.outputgamecount_firstflag == 0) {
                    this.outputgamecount_firstflag = 1;
                    return this.outputgamecount;
                }
                return this.outputgamecount.toFixed(0);
            }
        }
    }
</script>