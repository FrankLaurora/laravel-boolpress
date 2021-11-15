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
                        <a href="{{route('admin.posts.index')}}"><button type="button" class="btn btn-info">Torna indietro</button></a>
                        <a href="{{route('admin.posts.edit', $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#"><button type="submit" class="btn btn-danger">Elimina</button></a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection