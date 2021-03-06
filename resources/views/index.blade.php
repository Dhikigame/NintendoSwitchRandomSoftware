@extends('layouts.default')


@section('title', 'Nintendo Switchランダムソフトカタログ')


@section('content')


<div id="app">
    <example-component 
    v-bind:gamecount="{{ $gamecount }}"
    >
    </example-component>
</div>

<script src="{{ mix('js/app.js') }}"></script> 
@endsection