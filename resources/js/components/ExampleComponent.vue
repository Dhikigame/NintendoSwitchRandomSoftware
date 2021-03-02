<template>
<div>
    <h3>ゲーム種別</h3>
    <input type="radio" name="type" value="ALL" checked>全て
    <input type="radio" name="type" value="package">パッケージ販売
    <input type="radio" name="type" value="download">ダウンロード専売

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
    <input type="radio" name="age-limit" value="ALL" checked>年齢制限なし
    <input type="radio" name="age-limit" value="A3+" v-on:click="cero_A_3_click">全年齢対象(CERO:A,IARC:3+)
    <input type="radio" name="age-limit" value="7+">7歳まで(IARC:7+)
    <input type="radio" name="age-limit" value="B12+">12歳まで(CERO:B,IARC:12+)<br>
    <input type="radio" name="age-limit" value="C+">15歳まで(CERO:C)
    <input type="radio" name="age-limit" value="16+">16歳まで(IARC:16+)
    <input type="radio" name="age-limit" value="D">17歳まで(CERO:D)
    <input type="radio" name="age-limit" value="Z18+">18歳以上(CERO:Z,IARC:18+)
    
    <ul>
<<<<<<< HEAD
=======
        <li>{{ inputgamecount }}</li>

>>>>>>> model-fix
        <li>{{ allgamecount }}</li>
        <li>{{ gamecount_cero_A_3 }}</li>
        <li>{{ gamecount_cero_7 }}</li>
        <li>{{ gamecount_cero_B_12 }}</li>
        <li>{{ gamecount_cero_C }}</li>
        <li>{{ gamecount_cero_16 }}</li>
        <li>{{ gamecount_cero_D }}</li>
        <li>{{ gamecount_cero_Z }}</li>
<<<<<<< HEAD
=======

        <li>{{ downloadallgamecount }}</li>
        <li>{{ downloadgamecount_cero_A_3 }}</li>
        <li>{{ downloadgamecount_cero_7 }}</li>
        <li>{{ downloadgamecount_cero_B_12 }}</li>
        <li>{{ downloadgamecount_cero_C }}</li>
        <li>{{ downloadgamecount_cero_16 }}</li>
        <li>{{ downloadgamecount_cero_D }}</li>
        <li>{{ downloadgamecount_cero_Z }}</li>

        <li>{{ packageallgamecount }}</li>
        <li>{{ packagegamecount_cero_A_3 }}</li>
        <li>{{ packagegamecount_cero_7 }}</li>
        <li>{{ packagegamecount_cero_B_12 }}</li>
        <li>{{ packagegamecount_cero_C }}</li>
        <li>{{ packagegamecount_cero_16 }}</li>
        <li>{{ packagegamecount_cero_D }}</li>
        <li>{{ packagegamecount_cero_Z }}</li>
>>>>>>> model-fix
    </ul>
</div>
</template>

<script>
    export default {
        props:["gamecount"],
<<<<<<< HEAD
        // props:["gamecount_cero_A_3"],
        data(){
            return {
=======
        data(){
            return {
                inputgamecount: this.gamecount[0],

>>>>>>> model-fix
                allgamecount: this.gamecount[0],
                gamecount_cero_A_3: this.gamecount[1],
                gamecount_cero_7: this.gamecount[2],
                gamecount_cero_B_12: this.gamecount[3],
                gamecount_cero_C: this.gamecount[4],
                gamecount_cero_16: this.gamecount[5],
                gamecount_cero_D: this.gamecount[6],
<<<<<<< HEAD
                gamecount_cero_Z: this.gamecount[7]
            }
        },
=======
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
            cero_A_3_click: function() {
                this.inputgamecount = this.gamecount[1];
            }
        }
>>>>>>> model-fix
        // mounted() {
        //     console.log(this.count)
        // }
    }
</script>