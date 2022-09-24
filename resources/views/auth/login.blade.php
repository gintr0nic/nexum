@extends('layouts.layout')

@section('content')

@include('layouts.header')
    
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{ asset('assets/login.png') }}" class="img-fluid">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h1 class="display-5 fw-bold lh-1 mb-3">Fai il login</h1>
        {{ Form::open(array('route' => 'login')) }}
          <div class="form-outline mb-2">
              {{ Form::label('username', 'Username', ['class' => 'form-label', 'for' => 'formUsername']) }}<br>
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
              {{ Form::label('password', 'Password', ['class' => 'form-label', 'for' => 'formPassword']) }}<br>
              {{ Form::password('password', ['class' => 'form-control form-control-lg', 'id' => 'formPassword']) }}
              @if ($errors->first('password'))
              <ul class="errors">
                  @foreach ($errors->get('password') as $message)
                  <li>{{ $message }}</li>
                  @endforeach
              </ul>
              @endif
          </div>

          {{ Form::submit('Login', ['class' => 'btn btn-dark btn-lg']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</section>


@include('layouts.footer')

@endsection