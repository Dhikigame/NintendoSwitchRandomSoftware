@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')

<div class='random-result-explanation'>あなたにオススメするSwitchゲームは...</div>
<?php
echo "<div class='random-result-title'>" . $gameinfo["title"] . "</div>";


echo "<div class='image-first'>" . $image[1] . "</div>";

echo "<table>";
    echo "<tr>";
        echo "<th>タイトル</th>";
        echo "<td>" . $gameinfo["title"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>発売日</th>";
        echo "<td>" . $gameinfo["release_date"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>販売メーカー</th>";
        echo "<td>" . $gameinfo["release_maker"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>ダウンロード販売</th>";
        echo "<td>" . $gameinfo["download"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>年齢制限</th>";
        echo "<td>" . $gameinfo["cero"] . "</td>";
    echo "</tr>";

if($gameinfo['type'] === 1) {

    echo "<tr>";
        echo "<th>Nintendo Switch Online</th>";
        echo "<td>" . $gameinfo["online"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Nintendo Switch Online ランキング機能</th>";
        echo "<td>" . $gameinfo["ranking"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Joy Con横持ち機能</th>";
        echo "<td>" . $gameinfo["joycon_sideways"] . "</td>";
    echo "</tr>";
}
if($gameinfo['type'] === 2) {

    echo "<tr>";
        echo "<th>Nintendo Switch Online</th>";
        echo "<td>" . $gameinfo["online"] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Nintendo Switch Online ランキング機能</th>";
        echo "<td>" . $gameinfo["ranking"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<?php
echo "<div class='hidden_box1'>";
    echo "<label for='label1'>結果↓</label>";
    echo '<input type="checkbox" id="label1"/>';
    echo '<div class="hidden_show1">';
        echo "<div class='image-padding'></div>";
for($i = 2; $i <= count($image); $i++) {
    if($i == 2) {
        echo "<div class='image-lists'>";
            echo "<div>";
    }
    if($i == 5) {
        echo "<div class='image-lists'>";
            echo "<div>";
    }
    echo $image[$i];
    if($i == 4 || $i == 7) {
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='hidden_box2'>";
            echo "<label for='label2'>結果↓</label>";
            echo '<input type="checkbox" id="label2"/>';
            echo '<div class="hidden_show2">';
                echo "<div class='image-padding'></div>";
    }
    if($i == count($image)) {
        echo "</div>";
    }
}
echo "</div>";


?>
<!-- <div class='hidden_box1'>
    <label for="label1">結果↓</label>
    <input type="checkbox" id="label1"/>
    <div class="hidden_show1">
        <span>hidden</span>
    </div>
</div> -->

@endsection