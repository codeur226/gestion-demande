<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\Valeur;
use Illuminate\Http\Request;

class ValeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valeurs = Valeur::orderbyDesc('parametre_id')->get();

        return view('back-office.valeur.index', [
            'valeurs' => $valeurs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parametres = Parametre::all();
        $valeur = new Valeur();

        return view('back-office.valeur.create',
    [
        'parametres' => $parametres,
        'valeur' => $valeur,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valeur = Valeur::create([
            'valeur' => $request->valeur,
            'parametre_id' => $request->parametre_id,
        ]);

        return redirect()->route('valeurs.index')->with('message', 'La valeur a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Valeur $valeur)
    {
        // $valeur=Valeur::find($id);
        $parametres = Parametre::all();

        return view('back-office.valeur.show',
    [
        'parametres' => $parametres,
        'valeur' => $valeur,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Valeur $valeur)
    {
        $parametres = Parametre::all();

        return view('back-office.valeur.edit',
        [
            'parametres' => $parametres,
            'valeur' => $valeur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valeur $valeur)
    {
        $valeur->update(
            [
                'valeur' => $request->valeur,
                'parametre_id' => $request->parametre_id,
            ]
            );

        return redirect()->route('valeurs.index')->with('message', 'La valeur a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Valeur::destroy($id);
        return redirect()->route('valeurs.index')->with("message","La valeur a bien été supprimée");
    }
}
