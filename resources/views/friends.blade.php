@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-6">
        <h1>Amici</h1>
                @foreach($friends as $friend)
                    <div class="card m-2">
                        <div class="card-body">
                            <a href="{{ route('user', ['username' => $friend->username ]) }}"><h5 class="card-title">{{ $friend->name }} {{ $friend->surname }}</h5></a>
                                <button data-bs-toggle="modal" data-bs-target="#removeModal{{ $friend->id }}" type="button" class="btn btn-danger my-2">Rimuovi dagli amici</button>
                        </div>
                    </div>

                    <div class="modal fade" id="removeModal{{ $friend->id }}" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="removeModalLabel">Rimuovi amico</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Sei sicuro di voler rimuovere {{ $friend->name }} {{ $friend->surname }} dagli amici?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                    <button id="buttonRemoveFriend" onClick="removeFriend('{{ $friend->username }}')" url="{{ route('removeFriend') }}" type="button" class="btn btn-danger">Rimuovi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="col-6">
            <h1>Richieste di amicizia</h1>
            @foreach($friendRequests as $friendRequest)
                <div class="card m-2">
                    <div class="card-body">
                        <a href="{{ route('user', ['username' => $friendRequest->from ]) }}"><h5 class="card-title">{{ $friendRequest->getUser()->name }} {{ $friendRequest->getUser()->surname }}</h5></a>
                        <p class="text-muted">ricevuta il {{ $friendRequest->getCreationDate() }} alle {{ $friendRequest->getCreationTime() }}</p>

                        @switch($friendRequest->status)
                            @case('pending')
                                <button data-bs-toggle="modal" data-bs-target="#acceptModal{{ $friendRequest->id }}" type="button" class="btn btn-success">Accetta</button>
                                <button data-bs-toggle="modal" data-bs-target="#refuseModal{{ $friendRequest->id }}" type="button" class="btn btn-danger">Rifiuta</button>
                                @break
                            
                            @case('accepted')
                                <p class="text-muted">accettata il {{ $friendRequest->getUpdatedDate() }} alle {{ $friendRequest->getUpdatedTime() }}</p>
                                @break

                            @case('refused')
                                <p class="text-muted">rifiutata il {{ $friendRequest->getUpdatedDate() }} alle {{ $friendRequest->getUpdatedTime() }}</p>
                                @break  
                        @endswitch
                    </div>
                </div>

                <div class="modal fade" id="acceptModal{{ $friendRequest->id }}" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="acceptModalLabel">Accetta richiesta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Sei sicuro di voler accettare la richiesta di amicizia?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <button id="buttonAcceptRequest" onClick="acceptRequest({{ $friendRequest->id }})" url="{{ route('acceptFriendRequest') }}" type="button" class="btn btn-success">Accetta</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="refuseModal{{ $friendRequest->id }}" tabindex="-1" aria-labelledby="refuseModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="refuseModalLabel">Rifiuta richiesta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Sei sicuro di voler rifiutare la richiesta di amicizia?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <button id="buttonRefuseRequest" onClick="refuseRequest({{ $friendRequest->id }})" url="{{ route('refuseFriendRequest') }}" type="button" class="btn btn-danger">Rifiuta</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection