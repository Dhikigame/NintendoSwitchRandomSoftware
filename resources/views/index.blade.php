@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')
<?php 
// var_dump($releasemaker_gamecount[0]->release_maker);
// $release_maker = $releasemaker_gamecount[0]->release_maker;
// echo json_encode($releasemaker_gamecount[0]);
?>


<div id="app">
    <example-component 
    v-bind:gamecount="{{ $gamecount }}"
    >
    </example-component>
</div>

<script src="{{ mix('js/app.js') }}"></script> 
@endsection