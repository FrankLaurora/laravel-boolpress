@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form class="p-3" method="POST" action="{{route('admin.categories.update', $category)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name') ?? $category->name}}" placeholder="Inserisci il nuovo nome">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection