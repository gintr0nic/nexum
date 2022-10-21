@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <div class="container col-5 rounded bg-white mt-5 mb-5">
        <h1 class="mb-5">Pannello di amministrazione</h1>

        <div class="list-group w-auto m-5">
            @can('isStaff')
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/userlist.png') }}" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Lista utenti</h6>
                            <p class="mb-0 opacity-75">Visualizza la lista completa degli utenti e il numero di utenti di iscritti.</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/bloglist.png') }}" alt="twbs" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Lista blog</h6>
                            <p class="mb-0 opacity-75">Visualizza la lista completa dei blog, cancella interi blog o singoli post.</p>
                        </div>
                    </div>
                </a>
            @endcan

            @can('isAdmin')
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/useradd.png') }}" alt="twbs" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Gestisci i membri dello staff</h6>
                            <p class="mb-0 opacity-75">Inserisci, cancella o modifica i membri dello staff.</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/info.png') }}" alt="twbs" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Estrai informazioni sulla comunità</h6>
                            <ul class="mb-0 opacity-75">
                                <li>
                                    Visualizza la composizione del gruppo di amici di un dato membro della comunità.
                                </li>
                                <li>
                                    Visualizza il numero di richieste di amicizia ricevute da un dato membro della comunità.
                                </li>
                                <li>
                                    Visualizza il numero totale di blog creati dai membri della comunità.
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            @endcan
        </div>
</div>

    @include('layouts.footer')
@endsection