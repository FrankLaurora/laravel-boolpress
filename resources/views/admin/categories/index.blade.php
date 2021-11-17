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
                    <a href="{{route('admin.categories.create')}}"><button type="button" class="btn btn-info">Crea una nuova categoria</button></a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.categories.show', $category->id)}}"><button type="button" class="btn btn-info">Visualizza</button></a>
                                </td>
                                <td>
                                    <a href="{{route('admin.categories.edit', $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                </td>
                                <td>
                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"><button type="submit" class="btn btn-danger">Elimina</button></a>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection