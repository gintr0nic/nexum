@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <div class="container col-5 rounded bg-white mt-5 mb-5">
        <h2 class="mb-5">Numero totale blog: {{ $blognumber }}</h2>

        <h2 class="mb-5">Lista utenti</h2>

        <div class="list-group w-auto">
            @foreach ($users as $user)
                <a href="{{ route('friendlist', ['username' => $user->username]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/user.jpg') }}" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $user->name }} {{ $user->surname }}</h6>
                            <p class="mb-0 opacity-50">{{ $user->username }}</p>
                            <p class="mb-0 opacity-50">iscritto dal {{ $user->getSignupDate() }}</p>

                            <br>
                            <p class="mb-0">Totale richieste di amicizia ricevute: <b>{{ $user->getReceivedRequests() }}</b></p>
                            <p class="mb-0">Richieste di amicizia accettate: <b>{{ $user->getAcceptedRequests() }}</b></p>
                            <p class="mb-0">Richieste di amicizia rifiutate: <b>{{ $user->getRefusedRequests() }}</b></p>
                            <p class="mb-0">Richieste di amicizia in sospeso: <b>{{ $user->getPendingRequests() }}</b></p>

                            <br>

                            <p class="mb-0 opacity-50"><b>Clicca per visualizzare la lista degli amici</b></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
@endsection