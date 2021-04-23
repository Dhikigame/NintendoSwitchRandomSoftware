@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')

<<<<<<< HEAD
<h1>Nintendo Switch ランダムソフト検索</h1>
<h2>発売しているswitchのソフトの中からオススメします</h2>
=======
<?php
echo "sub";
?>
>>>>>>> 65124dc631a9282c5f723d05d72d162fe774feff
<div id="app">
    <form class="simple-form" name="search_random" action="{{ url('/result') }}" method="get">
        <example-component 
        v-bind:gamecount="{{ $gamecount }}"
        >
        </example-component>
    </form>
</div>

<script src="{{ mix('js/app.js') }}"></script> 
@endsection