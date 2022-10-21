@extends('layouts.layout')

@section('content')

    @include('layouts.header')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="{{ asset('assets/user.jpg') }}">
                    <h5>{{ $user->username }}</h5>
                    @can('isUser', $user)
                        <button onclick="location.href='{{ route('edit') }}'" class="btn btn-dark my-3" type="button">Modifica
                            profilo</button>
                    @endcan

                    @cannot('isStaff')
                        @cannot('isFriend', $user)
                            @can('sendFriendRequest', $user)
                                <button url="{{ route('sendFriendRequest') }}" onClick="sendFriendRequest('{{ $user->username }}')"
                                    class="btn btn-dark btn-lg my-3" id="buttonSendFriendRequest">Invia richiesta di amicizia</button>
                            @endcan

                            @cannot('sendFriendRequest', $user)
                                <button class="btn btn-dark btn-lg my-3" id="buttonSendFriendRequest">Richiesta inviata</button>
                                <p>Hai già inviato una richiesta di amicizia a {{ $user->name }}, oppure {{ $user->name }} te ne ha
                                    già inviata una.<br>({{ $user->name }} potrebbe aver rifiutato la richiesta di amicizia)</p>
                            @endcan

                            <div class="p-2" id="alertPlaceholder"></div>
                        @endcannot
                    @endcannot
                </div>
            </div>
            <div class="col-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Dati anagrafici</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6"><label class="labels">Nome</label>
                            <h5>{{ $user->name }}</h5>
                        </div>
                        <div class="col-6"><label class="labels">Cognome</label>
                            <h5>{{ $user->surname }}</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        @can('isPrivate', $user)
                            <div class="col-12 py-1"><label class="labels">Sesso</label>
                                @if ($user->sex == 'male')
                                    <h5>Uomo</h5>
                                @else
                                    <h5>Donna</h5>
                                @endif
                            </div>
                            <div class="col-12 py-1"><label class="labels">Data di nascita</label>
                                <h5>{{ $user->getBirthdate() }}</h5>
                            </div>
                            <div class="col-12 py-1"><label class="labels">Città</label>
                                <h5>{{ $user->city }}</h5>
                            </div>
                            <div class="col-12 py-1"><label class="labels">Indirizzo</label>
                                <h5>{{ $user->address }}</h5>
                            </div>
                        @endcan

                        @cannot('isPrivate', $user)
                            <div class="alert alert-danger" role="alert">
                                <p>I dati anagrafici, la biografia e la lista dei blog sono nascosti perchè {{ $user->name }}
                                    ha impostato il suo profilo come <b>privato</b>.<br>
                                    Invia una richiesta di amicizia a {{ $user->name }} per vedere il resto del suo profilo.
                                </p>
                            </div>
                        @endcannot
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 py-5">
                    @can('isPrivate', $user)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Biografia</h4>
                        </div>
                        <p>{{ $user->bio }}</p>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <hr />
        <div class="container rounded bg-white mt-5 mb-5" id="blogs">
            @can('isPrivate', $user)
                <div class="col-8">
                    @cannot('isStaff')
                        @can('isUser', $user)
                            <h3>Lista dei tuoi blog</h3>
                        @endcan
                    @endcannot

                    @cannot('isUser', $user)
                        <h3>Lista dei blog di {{ $user->name }} {{ $user->surname }}</h3>
                    @endcan

                    <div class="list-group w-auto">
                        @foreach ($user->getBlogs() as $blog)
                            <a href="{{ route('blog', ['blogname' => $blog->blogname]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                <img src="{{ asset('assets/user.jpg') }}" class="flex-shrink-0" width="32" height="32">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">{{ $blog->name }}</h6>
                                        <p class="mb-0 opacity-50">{{ $blog->blogname }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endcan
        </div>

    @include('layouts.footer')

@endsection
