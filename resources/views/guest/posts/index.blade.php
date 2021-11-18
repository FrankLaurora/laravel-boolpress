@extends('layouts.guest')

@section('pageContent')    
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
        </h3>

        @foreach ($posts as $post)              
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></h2>
                <p class="blog-post-meta"><small>{{$post->created_at->diffForHumans()}}</small></p>

                <p>{{$post->content}}</p>

                @if ($post->category)
                    <p><small><strong>Categoria: </strong><a href="{{route('categories.show', $post->category->slug)}}">{{$post->category['name']}}</a></small></p>    
                @endif

                @if ($post->tags->isNotEmpty())
                    <p>
                        <small><strong>Tags:</strong></small>
                        @foreach ($post->tags as $tag)
                        <a href="{{route('tag.show', $tag->slug)}}"><span class="badge badge-info">{{$tag->name}}</span></a>
                        @endforeach
                    </p>    
                @endif
            </div><!-- /.blog-post -->
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
@endsection