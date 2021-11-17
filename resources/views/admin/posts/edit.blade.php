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

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection