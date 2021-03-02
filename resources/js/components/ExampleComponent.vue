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
    <input type="radio" name="age-limit" value="A3+">全年齢対象(CERO:A,IARC:3+)
    <input type="radio" name="age-limit" value="7+">7歳まで(IARC:7+)
    <input type="radio" name="age-limit" value="B12+">12歳まで(CERO:B,IARC:12+)<br>
    <input type="radio" name="age-limit" value="C+">15歳まで(CERO:C)
    <input type="radio" name="age-limit" value="16+">16歳まで(IARC:16+)
    <input type="radio" name="age-limit" value="D">17歳まで(CERO:D)
    <input type="radio" name="age-limit" value="Z18+">18歳以上(CERO:Z,IARC:18+)
    
    <ul>
        <li>{{ allgamecount }}</li>
        <li>{{ gamecount_cero_A_3 }}</li>
        <li>{{ gamecount_cero_7 }}</li>
        <li>{{ gamecount_cero_B_12 }}</li>
        <li>{{ gamecount_cero_C }}</li>
        <li>{{ gamecount_cero_16 }}</li>
        <li>{{ gamecount_cero_D }}</li>
        <li>{{ gamecount_cero_Z }}</li>

        <li>{{ downloadallgamecount }}</li>
        <li>{{ downloadgamecount_cero_A_3 }}</li>
        <li>{{ downloadgamecount_cero_7 }}</li>
        <li>{{ downloadgamecount_cero_B_12 }}</li>
        <li>{{ downloadgamecount_cero_C }}</li>
        <li>{{ downloadgamecount_cero_16 }}</li>
        <li>{{ downloadgamecount_cero_D }}</li>
        <li>{{ downloadgamecount_cero_Z }}</li>
    </ul>
</div>
</template>

<script>
    export default {
        props:["gamecount"],
        // props:["gamecount_cero_A_3"],
        data(){
            return {
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
            }
        },
        // mounted() {
        //     console.log(this.count)
        // }
    }
</script>