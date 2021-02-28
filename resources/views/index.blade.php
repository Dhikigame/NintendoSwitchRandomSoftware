@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')
<?php 
// var_dump($releasemaker_gamecount[0]->release_maker);
$release_maker = $releasemaker_gamecount[0]->release_maker;
// echo json_encode($releasemaker_gamecount[0]);
?>
<div>
    <h3>ゲーム種別</h3>
    <input type="radio" name="type" value="ALL">全て
    <input type="radio" name="type" value="package">パッケージ販売
    <input type="radio" name="type" value="download">ダウンロード専売
</div>
<div>
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
</div>
<div>
    <h3>年齢制限</h3>
    <input type="radio" name="age-limit" value="ALL">年齢制限なし
    <input type="radio" name="age-limit" value="A3+">全年齢対象(CERO:A,IARC:3+)
    <input type="radio" name="age-limit" value="7+">7歳まで(IARC:7+)
    <input type="radio" name="age-limit" value="B12+">12歳まで(CERO:B,IARC:12+)<br>
    <input type="radio" name="age-limit" value="C+">15歳まで(CERO:C)
    <input type="radio" name="age-limit" value="16+">16歳まで(IARC:16+)
    <input type="radio" name="age-limit" value="D">17歳まで(CERO:D)
    <input type="radio" name="age-limit" value="Z18+">18歳以上(CERO:Z,IARC:18+)
</div>

<div id="app">
    <example-component v-bind:myname="{{ json_encode($releasemaker_gamecount[0]) }}"></example-component>
</div>

<script src="{{ mix('js/app.js') }}"></script> 
@endsection