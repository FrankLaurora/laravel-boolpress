@extends('layouts.guest')

@section('pageContent')
    <div class="col-md-8 blog-main">      
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta"><small>{{$post->created_at->diffForHumans()}}</small></p>

            <p>{{$post->content}}</p>
        </div><!-- /.blog-post -->

        <button type="button" class="btn btn-link"><a href="{{route('posts.index')}}">Torna indietro</a></button>
    </div><!-- /.blog-main -->
@endsection
