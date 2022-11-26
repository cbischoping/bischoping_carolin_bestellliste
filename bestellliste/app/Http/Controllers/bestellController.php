<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bestellliste;
use Illuminate\Support\Facades\Auth;


class bestellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Felder werden erstellt und angezeigt
    {
        $bestellen = Bestellliste::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(); //sortierte Liste anzeigen
        return view('home', compact('bestellen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Bestellung wird erstellt
    {
        return view('add_bestellung'); //Bestellungen hinzufügen
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Artikel der Liste Hinzufügen oder einfügen
                                            //es wird ein Eingabefeld für den Artikel erzeigt(artikelbezeichnung) und eine Artikelbeschreibung, mit der das Produkt genauer definiert werden kann
    {
        $this->validate($request, [
            'Artikel' => 'required|string|max:255',
            'Beschreibung' => 'nullable|string',
            'hinzugefügt' => 'nullable',
        ]);

        $bestellen = new Bestellliste;
        $bestellen->Artikel = $request->input('Artikel');
        $bestellen->Beschreibung = $request->input('Beschreibung');

        if($request->has('hinzugefügt')){
            $bestellen->completed = true;
        }

        $bestellen->user_id = Auth::user()->id; //Authorisierung

        $bestellen->save();

        return back()->with('success', 'Artikel wurde erfolgreich hinzugefügt'); //Bestätigung das die Aktion erfolgreich gewesen ist
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $bestellen = Bestellliste::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$bestellen) {
            abort(404);
        }
        return view('delete_bestellung', compact('bestellen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //edit bringt einen zu Update 
                                //Daten werden aktualisiert
    {
        $bestellen = Bestellliste::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$bestellen) {
            abort(404);
        }
        return view('edit_bestellung', compact('bestellen'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   //Artikel der Liste verändern oder erneuern
                                                    // auch wieder anhand des Bezeichnungs und Beschreibungsfeldes
    {
        $this->validate($request, [
            'Artikel' => 'required|string|max:255',
            'Beschreibung' => 'nullable|string',
            'hinzugefügt' => 'nullable',
        ]);

        $bestellen = Bestellliste::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $bestellen->Artikel = $request->input('Artikel');
        $bestellen->Beschreibung = $request->input('Beschreibung');

        if($request->has('hinzugefügt')){
            $bestellen->completed = true;
        }

        $bestellen->save();

        return back()->with('success', 'Artikel wurde erfolgreich geändert'); //Bestätigung das die Aktion erfolgreich gewesen ist
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //der Artikel wird gelöscht
    {
        $bestellen = Bestellliste::where('id', $id)->where('user_id', Auth::user()->id)->first(); 
        $bestellen->delete();
        return redirect()->route('bestellen.index')->with('success', 'Artikel wurde erfolgreich gelöscht'); //Bestätigung das die Aktion erfolgreich gewesen ist
    }
}
