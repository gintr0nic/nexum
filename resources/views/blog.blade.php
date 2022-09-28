@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="col-8">
        <h1>{{ $blog->name }}</h3>
        <h3>{{ $blog->topic }}</h3>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card m-2">
                <div class="card-body">
                    {{ Form::open(array('id' => 'formPost')) }}
                        {{ Form::label('text', 'Scrivi un nuovo post:', ['class' => 'form-label h5', 'for' => 'formPostBody']) }}
                        {{ Form::textarea('text', '', ['class' => 'form-control', 'id' => 'formPostBody', 'rows' => 3]) }}
                        <button id="buttonPost" onClick="newPost()" url="{{ route('newPost', ['blogname' => $blog->blogname ]) }}" class="btn btn-dark btn-lg my-3" type="button">Invia</button>
                    {{ Form::close() }}
                </div>
            </div>

            @foreach ($blog->getPosts() as $post)
                <div class="card m-2">
                    <div class="card-body">
                        <a href="{{ route('user', ['username' => $post->author ]) }}"><h5 class="card-title">{{ $post->getAuthor()->name }} {{ $post->getAuthor()->surname }}</h5></a>
                        <p class="text-muted">postato il {{ $post->getCreationDate() }} alle {{ $post->getCreationTime() }}</p>
                        <p class="card-text">{{ $post->text }}</p>

                        @can('editPost', $post)
                            <button id="buttonEditPost" type="button" class="btn btn-outline-dark">Modifica</button>
                            <button id="buttonDeletePost" onClick="deletePost()" url="{{ route('deletePost', ['blogname' => $blog->blogname, 'postid' => $post->id ]) }}" type="button" class="btn btn-dark">Elimina</button>
                        @endcan
                    </div>
                </div>

                <div class="p-2" id="alertPlaceholder"></div>
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