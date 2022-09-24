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
        <form>
          <div class="form-outline mb-4">
            <input type="username" id="formUsername" class="form-control form-control-lg" />
            <label class="form-label" for="formUsername">Nome utente</label>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="formPassword" class="form-control form-control-lg" />
            <label class="form-label" for="formPassword">Password</label>
          </div>

          <button type="submit" class="btn btn-dark btn-lg">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>


@include('layouts.footer')

@endsection