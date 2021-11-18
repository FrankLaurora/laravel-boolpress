@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                        <h1>{{$category->name}}</h1>
                        <p><small><strong>Creazione:</strong>{{$category->updated_at}}<strong> - Slug:</strong> {{$category->slug}}</small></p>

                        <h3>Post appartenenti a questa categoria:</h3>
                        <ul>
                            @if ($category['posts']->isNotEmpty())
                                @foreach ($category['posts'] as $post)
                                    <li>{{$post->title}}</li>                  
                                @endforeach
                            @else
                                <p>Non ci sono post associati a questa categoria.</p>
                            @endif
                        </ul>
                        <a href="{{route('admin.categories.index')}}"><button type="button" class="btn btn-info">Torna indietro</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection