@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bestellung hizufügen</div> <!-- Überschrift hinzugefügt -->  

                <h5 class="card=header">
                <a href="{{route('bestellen.index')}}" class="btn btn-sm btn-outline-primarry"><i class="fa fa-arrow-left"></i>Zurück gehen </a> <!-- zurück knopf hinzugefügt -->  
                </h5>

                <div class="card-body">

                <form method="POST" action="{{ route('bestellen.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-form-label text-md-right">Artikel</label>

                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('email') }}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label text-md-right">Beschreibung</label>

                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ old('description') }}"></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ old('completed')}}">

                                <label class="form-check-label" for="completed">
                                    Schon bestellt?
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Hinzufügen
                                </button>
                            </div>
                        </div>
                    </form>          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
