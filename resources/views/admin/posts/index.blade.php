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
                    @foreach ($posts as $post)
                        <h1>{{$post->title}}</h1>
                        <p><small>{{$post->updated_at}}</small></p>
                        <button type="button" class="btn btn-info"><a href="{{route('admin.posts.show', $post->id)}}">Visualizza</a></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection