@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="col-8">
        <h1>{{ $blog->name }}</h3>
        <h3>{{ $blog->topic }}</h3>

        <ul>

        </ul>
    </div>
</div>

@include('layouts.footer')

@endsection