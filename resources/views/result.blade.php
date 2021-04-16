@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')

<?php
echo "<div class='image-first'>" . $image[1] . "</div>";
for($i = 2; $i <= count($image); $i++) {
    if($i == 2) {
        echo "<div class='image-lists1'>";
    }
    if($i == 4) {
        echo "<div class='image-lists2'>";
    }
    if($i == 6) {
        echo "<div class='image-lists3'>";
    }
    echo "<div class='image-list'>" . $image[$i] . "</div>";
    if($i == 3 || $i == 5 || $i == 7) {
        echo "</div>";
    }
}
echo "</div>";
?>

<?php
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


@endsection