@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <div class="container col-5 rounded bg-white mt-5 mb-5">
        <h1 class="mb-5">Risultati ricerca</h1>

        <div class="list-group w-auto">
            @foreach ($users as $user)
                <a href="{{ route('user', ['username' => $user->username]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('assets/user.jpg') }}" class="flex-shrink-0" width="32" height="32">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $user->name }} {{ $user->surname }}</h6>
                            <p class="mb-0 opacity-50">{{ $user->username }}</p>
                            <p class="mb-0 opacity-50">iscritto dal {{ $user->getSignupDate() }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
@endsection