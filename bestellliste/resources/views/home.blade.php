@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bestellungs App</div>

                <h5 class="card=header">
                <a href="{{route('bestellen.create')}}" class="btn btn-sm btn-outline-primarry">Artikel hinzufügen</a> <!-- Überschrift hinzugefügt -->  
                </h5>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-borderless">  <!-- Tabelle hinzugefügt -->
                        <thead>
                            <th scope="col">Bestellungen</th> <!-- Tabellen Überschrift hinzugefügt -->
                            <th scope="col"></th> 
                        </thead>

                        <tbody>

                            @forelse ($bestellen as $bestellen)
                                <tr>
                                    <td> {{$bestellen->Artikel}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-success">Bearbeiten</a> <!-- Bearbeitungsbutton -->
                                        <a href="" class="btn btn-sm btn-outline-danger">Löschen</a> <!-- Löschbutton -->
                                
                                    </td>
                                </tr> 
                                @empty
                                <tr>
                                    <td> Kein Artikel </td>
                                </tr>
                            @endforelse 
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
