@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    {{ Form::open(array('id' => 'formEdit', 'class' => 'row')) }}
        <div class="col-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <h5>{{ Auth::user()->username }}</h5>
            </div>
        </div>
        <div class="col-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modifica profilo</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-6 py-1">
                        {{ Form::label('name', 'Nome', ['class' => 'form-label', 'for' => 'formName']) }}
                        {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'id' => 'formName']) }}
                    </div>
                    <div class="col-6 py-1">
                        {{ Form::label('surname', 'Cognome', ['class' => 'form-label', 'for' => 'formSurname']) }}
                        {{ Form::text('surname', Auth::user()->surname, ['class' => 'form-control', 'id' => 'formSurname']) }}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 py-1">
                        {{ Form::label('sex', 'Sesso', ['class' => 'form-label', 'for' => 'formSex']) }}
                        {{ Form::select('sex', ['male' => 'Uomo', 'female' => 'Donna'], 'Uomo' ,['class' => 'form-select', 'id' => 'formSex']) }}
                    </div>
                    <div class="col-12 py-1">
                        {{ Form::label('birthdate', 'Data di nascita', ['class' => 'form-label', 'for' => 'formBirthate']) }}
                        {{ Form::date('birthdate', Auth::user()->birthdate, ['class' => 'form-control', 'id' => 'formBirthate']) }}
                    </div>
                    <div class="col-12 py-1">
                        {{ Form::label('city', 'City', ['class' => 'form-label', 'for' => 'formCity']) }}
                        {{ Form::text('city', Auth::user()->city, ['class' => 'form-control', 'id' => 'formCity']) }}
                    </div>
                    <div class="col-12 py-1">
                        {{ Form::label('address', 'Indirizzo', ['class' => 'form-label', 'for' => 'formAddress']) }}
                        {{ Form::text('address', Auth::user()->address, ['class' => 'form-control', 'id' => 'formAddress']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="p-3 py-5">
                <div class="col-12 py-1">
                    {{ Form::label('bio', 'Biografia', ['class' => 'form-label h4', 'for' => 'formBio']) }}
                    {{ Form::textarea('bio', Auth::user()->bio, ['class' => 'form-control', 'id' => 'formBio', 'rows' => 3]) }}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <button id="buttonEdit" url="{{ route('edit') }}" class="btn btn-dark" type="button" onClick="editProfile()">Salva profilo</button>
            <div class="p-2" id="alertPlaceholder"></div>
        </div>
    {{ Form::close() }}
</div>

@include('layouts.footer')

@endsection