@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container col-8 px-4 py-5">
    <div class="row flex-row align-items-center g-5 py-5">
        <div class="col-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Benvenuto su Nexum!</h1>
            <p class="lead">Nexum è un servizio di microblogging che ti permette di creare un blog personale su un
                tema a tua scelta e condividerlo con i tuoi amici</p>
            <div class="d-grid gap-2 d-flex justify-content-start">
                <button type="button" class="btn btn-outline-dark btn-lg px-4 me-2">Login</button>
                <button type="button" class="btn btn-dark btn-lg px-4">Registrati</button>
            </div>
        </div>
        <div class="col-6">
            <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                loading="lazy" width="700" height="500">
        </div>
    </div>
</div>

<div class="container px-4 py-5" id="features">
    <h2 class="pb-2 border-bottom">Features</h2>
    <div class="row g-4 py-5 row-cols-3">
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#collection"></use>
                </svg>
            </div>
            <h3 class="fs-2">Blog</h3>
            <p>Ogni utente può creare e gestire uno o più blog su un tema a sua scelta.</p>
        </div>
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#people-circle"></use>
                </svg>
            </div>
            <h3 class="fs-2">Amici</h3>
            <p>Puoi deciderti di renderti visibile a tutti o solo al gruppo dei tuoi a amici, inoltre puoi anche
                decidere chi può accedere ai tuoi blog.</p>
        </div>
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#toggles2"></use>
                </svg>
            </div>
            <h3 class="fs-2">Messaggi</h3>
            <p>Comunicazioni importanti come la pubblicazione di un nuovo post o richieste di amicia ti vengono
                segnalate attraverso un sistema di messaggistica</p>
        </div>
    </div>
</div>

<div class="container px-4 py-5" id="regolamento">
    <h2 class="pb-2 border-bottom">Linee guida della comunità</h2>
    <ul>
        <li>Regola ajasojdasojdoasjsoas</li>
        <li>Regola ajasojdasojdoasjsoas</li>
        <li>Regola ajasojdasojdoasjsoas</li>
        <li>Regola ajasojdasojdoasjsoas</li>
        <li>Regola ajasojdasojdoasjsoas</li>
    </ul>
</div>

@include('layouts.footer')

@endsection
