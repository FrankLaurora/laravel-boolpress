@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form class="p-3" method="POST" action="{{route('admin.categories.store')}}">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Inserisci il nome della nuova categoria">
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