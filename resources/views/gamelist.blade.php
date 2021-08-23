@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')

<?php
for($i = 0; $i <= count($id) - 1; $i++) {
    echo '<div>';
    echo $id[$i] . '<br>';
    echo $title[$i] . '<br>';
    echo $release_date[$i] . '<br>';
    echo '<a href="' . $download_link[$i] . '" target="_blank" rel="noopener noreferrer">' . $download_link[$i] . '</a><br>';
    echo '<img src="/download/' . $id[$i] . '/000001.jpg">';
    echo '</div>';
}
?>



@endsection