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
    public function index()
    {
        $bestellen = Bestellliste::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', compact('bestellen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_bestellung'); //Bestellungen hinzufügen
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $bestellen->user_id = Auth::user()->id;

        $bestellen->save();

        return back()->with('success', 'Artikel wurde erfolgreich hinzugefügt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
