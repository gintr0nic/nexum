@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="col-8">
        <h1>{{ $blog->name }}</h3>
        <h3>{{ $blog->topic }}</h3>

        <ul>

        </ul>
    </div>

    <div class="row">
        <div class="col-8">
            @foreach ($blog->getPosts() as $post)
                <div class="card m-2">
                    <div class="card-body">
                        <a href="{{ route('user', ['username' => $post->author ]) }}"><h5 class="card-title">{{ $post->getAuthor()->name }} {{ $post->getAuthor()->surname }}</h5></a>
                        <p class="text-muted">postato il {{ $post->getCreationDate() }} alle {{ $post->getCreationTime() }}</p>
                        <p class="card-text">{{ $post->text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Informazioni sul blog</h3>
                    <div class="p-2">
                        <h5>Creato da: </h5><a href="{{ route('user', ['username' => $blog->owner ]) }}">{{ $blog->getOwner()->name }} {{ $blog->getOwner()->surname }}</a>
                    </div>                 
                    <div class="p-2">
                        <h5>Data di creazione: </h5><p>{{ $blog->getCreationDate() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection