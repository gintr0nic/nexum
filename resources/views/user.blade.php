@extends('layouts.layout')

@section('content')

@include('layouts.header')

<h2>{{ $user->name }} {{ $user->surname }}</h2>

@include('layouts.footer')

@endsection
