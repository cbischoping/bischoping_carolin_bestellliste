@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">löschen{{ $bestellen->Artikel }} </div> <!-- Überschrift hinzugefügt -->  

                <h5 class="card=header">
                <a href="{{ route('bestellen.index') }}" class="btn btn-sm btn-outline-primarry"><i class="fa fa-arrow-left"></i>Zurück </a> <!-- zurück knopf hinzugefügt -->  
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


                <form method="POST" action="{{ route('bestellen.destroy', $bestellen->id) }}">
                        @csrf
                        @method('DELETE')


                        <div class="form-group row mb-0"> 
                            <div class="col-md-12"><!-- Artikel auf die Liste löschen -->  
                                <h4 class="text-center">
                                    Bist du dir sicher das du den Artikel löschen willst {{ $bestellen->delete }}?
                                </h4>
                            </div>
                        </div>

                        <div class="form-group row mb-0"> 
                            <div class="col-md-8 offset-md-4"><!-- Artikel auf die Liste löschen -->  
                                <button type="submit" class="btn btn-danger"> <!-- nachfrage ob artikel gelöscht werden soll -->  
                                    Ja
                                </button>
                                <a herf="{{ route('bestellen.index') }}" class="btn btn-info">Nein</a>
                            </div>
                        </div>
                    </form>          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
