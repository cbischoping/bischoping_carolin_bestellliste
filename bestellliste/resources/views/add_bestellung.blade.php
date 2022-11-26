@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bestellung hizufügen</div> <!-- Überschrift hinzugefügt -->  

                <h5 class="card=header">
                <a href="{{route('bestellen.index')}}" class="btn btn-sm btn-outline-primarry"><i class="fa fa-arrow-left"></i>Zurück </a> <!-- zurück knopf hinzugefügt -->  
                </h5>

                <div class="card-body">

                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif 

                <form method="POST" action="{{ route('bestellen.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Artikel" class="col-form-label text-md-right">Artikelbezeichnung</label> <!-- Überschrift/ Artikelbezeichnung hinzugefügt -->  

                            <input id="Artikel" type="Artikel" class="form-control @error('Artikel') is-invalid @enderror" name="Artikel" value="{{ old('email') }}" autocomplete="Artikel" autofocus>

                            @error('Artikel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label text-md-right">Beschreibung</label>  <!--Beschreibungsfeld hinzugefügt -->  

                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ old('description') }}"></textarea>

                            @error('Beschreibung')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group row mb-0"> 
                            <div class="col-md-8 offset-md-4"><!-- Artikel auf die Liste hinzugefügen -->  
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
