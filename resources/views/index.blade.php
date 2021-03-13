@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')

<h1>Nintendo Switch ランダムソフト検索</h1>
<h2>発売しているswitchのソフトの中からオススメします</h2>
<div id="app">
    <form class="simple-form" action="{{ url('/result') }}" method="get">
        <example-component 
        v-bind:gamecount="{{ $gamecount }}"
        >
        </example-component>
    </form>
</div>

<script src="{{ mix('js/app.js') }}"></script> 
@endsection