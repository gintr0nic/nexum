@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
        <div class="col-6">
            <h1>Membri dello staff</h1>
            @foreach ($members as $member)
                <div class="card m-2">
                    <div class="card-body">
                        <a href="{{ route('user', ['username' => $member->username]) }}">
                            <h5 class="card-title">{{ $member->name }} {{ $member->surname }}</h5>
                        </a>
                        <p class="mb-0 opacity-50">{{ $member->username }}</p>
                        <p class="mb-0 opacity-50">nello staff dal {{ $member->getSignupDate() }}</p>
                        <button data-bs-toggle="modal" data-bs-target="#removeModal{{ $member->id }}" type="button"
                            class="btn btn-danger my-2">Rimuovi dallo staff</button>
                    </div>
                </div>

                <div class="modal fade" id="removeModal{{ $member->id }}" tabindex="-1"
                    aria-labelledby="removeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="removeModalLabel">Rimuovi dallo staff</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Sei sicuro di voler rimuovere {{ $member->name }} {{ $member->surname }} dallo staff?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <button id="buttonRemoveStaff" onClick="removeStaff('{{ $member->username }}')"
                                    url="{{ route('removeStaff') }}" type="button"
                                    class="btn btn-danger">Rimuovi</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="col-6">
                <h1>Aggiungi membro</h1>
                {{ Form::open(['route' => 'registerStaff']) }}

                    <div class="form-outline mb-2">
                        {{ Form::label('name', 'Nome', ['class' => 'form-label', 'for' => 'formName']) }}
                        {{ Form::text('name', '', ['class' => 'form-control form-control-lg', 'id' => 'formName']) }}
                        @if ($errors->first('name'))
                            <ul class="errors">
                                @foreach ($errors->get('name') as $message)
                                    <div class="p-2">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <div>{{ $message }}</div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('surname', 'Cognome', ['class' => 'form-label', 'for' => 'formSurname']) }}
                        {{ Form::text('surname', '', ['class' => 'form-control form-control-lg', 'id' => 'formSurname']) }}
                        @if ($errors->first('surname'))
                            <ul class="errors">
                                @foreach ($errors->get('surname') as $message)
                                    <div class="p-2">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <div>{{ $message }}</div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('sex', 'Sesso', ['class' => 'form-label', 'for' => 'formSex']) }}
                        {{ Form::select('sex', ['male' => 'Uomo', 'female' => 'Donna'], 'Uomo', ['class' => 'form-select form-select-lg', 'id' => 'formSex']) }}
                        @if ($errors->first('sex'))
                            <ul class="errors">
                                @foreach ($errors->get('sex') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('birthdate', 'Data di nascita', ['class' => 'form-label', 'for' => 'formBirthate']) }}
                        {{ Form::date('birthdate', '01/01/2000', ['class' => 'form-control form-control-lg', 'id' => 'formBirthate']) }}
                        @if ($errors->first('birthdate'))
                            <ul class="errors">
                                @foreach ($errors->get('birthdate') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('city', 'Città', ['class' => 'form-label', 'for' => 'formCity']) }}
                        {{ Form::text('city', '', ['class' => 'form-control form-control-lg', 'id' => 'formCity']) }}
                        @if ($errors->first('city'))
                            <ul class="errors">
                                @foreach ($errors->get('city') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('address', 'Indirizzo di residenza', ['class' => 'form-label', 'for' => 'formAddress']) }}
                        {{ Form::text('address', '', ['class' => 'form-control form-control-lg', 'id' => 'formAddress']) }}
                        @if ($errors->first('address'))
                            <ul class="errors">
                                @foreach ($errors->get('address') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('bio', 'Biografia', ['class' => 'form-label', 'for' => 'formBio']) }}
                        {{ Form::textarea('bio', '', ['class' => 'form-control form-control-lg', 'id' => 'formBio', 'rows' => 3]) }}
                        @if ($errors->first('bio'))
                            <ul class="errors">
                                @foreach ($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('username', 'Username', ['class' => 'form-label', 'for' => 'formUsername']) }}
                        {{ Form::text('username', '', ['class' => 'form-control form-control-lg', 'id' => 'formUsername']) }}
                        @if ($errors->first('username'))
                            <ul class="errors">
                                @foreach ($errors->get('username') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('password', 'Password', ['class' => 'form-label', 'for' => 'formPassword']) }}
                        {{ Form::password('password', ['class' => 'form-control form-control-lg', 'id' => 'formPassword']) }}
                        @if ($errors->first('password'))
                            <ul class="errors">
                                @foreach ($errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-outline mb-2">
                        {{ Form::label('password-confirm', 'Ripeti password', ['class' => 'form-label', 'for' => 'password-confirm']) }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control form-control-lg', 'id' => 'password-confirm']) }}
                    </div>

                    {{ Form::submit('Registrati', ['class' => 'btn btn-dark btn-lg']) }}
                    {{ Form::close() }}
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection