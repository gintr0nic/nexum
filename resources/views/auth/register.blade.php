@extends('layouts.layout')

@section('content')

    @include('layouts.header')

    <section class="vh-150">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-8 col-lg-7 col-xl-6">
                    <img src="{{ asset('assets/register.png') }}" class="img-fluid">
                </div>
                <div class="col-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Registrati</h1>
                    {{ Form::open(['route' => 'register']) }}

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
    </section>


    @include('layouts.footer')

@endsection
