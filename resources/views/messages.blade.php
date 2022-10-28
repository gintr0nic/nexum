@extends('layouts.layout')

@section('content')

    @include('layouts.header')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="col-8">
            <h1>Messaggi</h3>
        </div>

        @foreach($messages as $message)
            <div class="card m-2">
                <div class="card-body">
                    <a href="{{ route('user', ['username' => $message->from]) }}">
                        <h5 class="card-title">{{ $message->getFrom()->name }} {{ $message->getFrom()->surname }}</h5>
                    </a>
                    @if ($message->getFrom()->isStaff())
                        <p class="text-muted">(membro dello staff)</p>
                    @endif

                    @if ($message->getFrom()->isAdmin())
                        <p class="text-muted">(amministratore)</p>
                    @endif
                    <p class="text-muted">ricevuto il {{ $message->getCreationDate() }} alle
                        {{ $message->getCreationTime() }}</p>
                    <p class="card-text">{{ $message->text }}</p>
                </div>
            </div>

        @endforeach

    </div>


    @include('layouts.footer')

@endsection
