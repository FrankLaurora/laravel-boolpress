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

                        <a href="{{route('admin.categories.index')}}"><button type="button" class="btn btn-info">Torna indietro</button></a>
                        {{-- <a href="{{route('admin.categories.edit', $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#"><button type="submit" class="btn btn-danger">Elimina</button></a> --}}
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection