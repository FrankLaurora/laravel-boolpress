@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                        <h1>{{$post->title}}</h1>
                        <p><small><strong>Creazione:</strong>{{$post->updated_at}}<strong> - Slug:</strong> {{$post->slug}}</small></p>
                        <p>{{$post->content}}</p>
                        <button type="button" class="btn btn-info"><a href="{{route('admin.posts.index')}}">Torna indietro</a></button>
                        <button type="button" class="btn btn-warning">Modifica</button>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection