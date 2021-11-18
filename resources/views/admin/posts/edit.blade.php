@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form class="p-3" method="POST" action="{{route('admin.posts.update', $post)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $post->title}}" placeholder="Inserisci il titolo">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Corpo del testo</label>
                        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il testo dell'articolo">{{old('content') ?? $post->content}}</textarea>
                        @if ($errors->has('content'))
                            <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                @if ($errors->any())
                                    <option {{old('category_id') == $category->id ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>

                                @else
                                    <option {{isset($post->category_id) && $post->category_id == $category->id ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>
                                    
                                @endif

                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <div class="form-check">

                                @if ($errors->any())
                                    <input {{in_array($tag->id, old('tags', [])) ? 'checked' : null}} class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                                    <label class="form-check-label" for="tag-{{$tag->id}}">
                                        {{$tag->name}}
                                    </label>

                                @else
                                    <input {{$post->tags->contains($tag->id) ? 'checked' : null}} class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                                    <label class="form-check-label" for="tag-{{$tag->id}}">
                                        {{$tag->name}}
                                    </label>                            
                                    
                                @endif

                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection