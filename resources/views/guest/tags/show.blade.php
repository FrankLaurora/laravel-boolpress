@extends('layouts.guest')

@section('pageContent')
    <div class="col-md-8 blog-main">      
        <div class="blog-post">
            <h2 class="blog-post-title">{{$tag->name}}</h2>

            <h3>Post collegati a questo tag:</h3>

            <ul>
                @if ($tag['posts']->isNotEmpty())
                    @foreach ($tag['posts'] as $post)
                        <li><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></li>                  
                    @endforeach
                @else
                    <p>Non ci sono post associati a questo tag.</p>
                @endif
            </ul>

        </div><!-- /.blog-post -->

        <button type="button" class="btn btn-link"><a href="{{route('posts.index')}}">Torna indietro</a></button>
    </div><!-- /.blog-main -->
@endsection
