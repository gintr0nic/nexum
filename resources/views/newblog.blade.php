@extends('layouts.layout')

@section('content')

@include('layouts.header')
    
<section class="vh-150">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-8 col-lg-7 col-xl-6">
        <img src="{{ asset('assets/blog.png') }}" class="img-fluid">
      </div>
      <div class="col-7 col-lg-5 col-xl-5 offset-xl-1">
        <h1 class="display-5 fw-bold lh-1 mb-3">Crea un nuovo blog</h1>
        {{ Form::open(array('route' => 'newBlog')) }}

            <div class="form-outline mb-2">
                {{ Form::label('name', 'Titolo del blog', ['class' => 'form-label', 'for' => 'formBlogName']) }}
                {{ Form::text('name', '', ['class' => 'form-control form-control-lg', 'id' => 'formBlogName']) }}
            </div>

            <div class="form-outline mb-2">
                {{ Form::label('topic', 'Tema del blog', ['class' => 'form-label', 'for' => 'formBlogTopic']) }}
                {{ Form::text('topic', '', ['class' => 'form-control form-control-lg', 'id' => 'formBlogTopic']) }}
            </div>

            <div class="form-outline mb-2">
                {{ Form::label('blogname', 'Nome identificativo del blog', ['class' => 'form-label', 'for' => 'formBlogBlogname']) }}
                {{ Form::text('blogname', '', ['class' => 'form-control form-control-lg', 'id' => 'formBlogBlogname']) }}
            </div>

            <div class="form-outline mb-2">
                {{ Form::label('firstpost', 'Testo del primo post', ['class' => 'form-label', 'for' => 'formBlogFirstPost']) }}
                {{ Form::textarea('firstpost', '', ['class' => 'form-control form-control-lg', 'id' => 'formBlogFirstPost', 'rows' => 3]) }}
            </div>

            {{ Form::submit('Crea blog', ['class' => 'btn btn-dark btn-lg']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</section>


@include('layouts.footer')

@endsection