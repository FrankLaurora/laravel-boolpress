@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-info">Crea un nuovo post</button></a>
                </div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <h1>{{$post->title}}</h1>
                        <p><small>{{$post->updated_at}}</small></p>
                        <a href="{{route('admin.posts.show', $post->id)}}"><button type="button" class="btn btn-info">Visualizza</button></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection