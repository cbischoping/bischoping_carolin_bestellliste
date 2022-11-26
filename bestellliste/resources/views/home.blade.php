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

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
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
                                <td><a href="{{ route('bestellen.edit', $bestellen->id) }}" style="color: black">{{ $bestellen->Artikel }}</a></td>
                                    <td>
                                        <a href="{{ route('bestellen.edit', $bestellen->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a> <!-- Bearbeitungsbutton -->
                                        <a href="{{ route('bestellen.show', $bestellen->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a> <!-- Löschbutton -->
                                
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
