@extends('layouts.app')

@section('title', 'Feed')

@section('content')
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <p>
            {{-- TODO: Add text --}}
            <b>{{ config('app.name') }}</b> is a microblogging platform.
        </p>
    </div>
@endsection