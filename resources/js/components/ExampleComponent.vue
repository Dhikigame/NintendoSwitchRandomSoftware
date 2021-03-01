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
        <li v-for="name in myname" v-if="name.release_maker">{{ name.release_maker }}</li>
    </ul>
</div>
</template>

<script>
    export default {
        props:["myname"],
        data(){
            return {
                list: [1,2,4]
            }
        },
        // props:["test"],
        mounted() {
            console.log(this.myname)
            // console.log("Component mounted.")
            // axios.get('/switch_software_releasemaker_gamecount').then(response => this.switch_software_releasemaker_gamecount = response.data)
        }
    }
</script>