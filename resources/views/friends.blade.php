@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-6">
            <h1>Amici</h1>
        </div>
        <div class="col-6">
            <h1>Richieste di amicizia</h1>
            <ul>
                @foreach($friendRequests as $friendRequest)

                    <li>{{ $friendRequest->from }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection