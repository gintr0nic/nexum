@extends('layouts.layout')

@section('content')

    @include('layouts.header')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="col-8">
            <h1>Messaggi</h3>
        </div>

        @foreach($messages as $message)
            <p>{{ $message->text }}</p>

        @endforeach

    </div>


    @include('layouts.footer')

@endsection
