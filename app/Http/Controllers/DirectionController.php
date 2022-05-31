<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Demande;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::orderbyDesc('id')->paginate();

        return view('back-office.direction.index', [
            'directions' => $directions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = new Direction();

        return view('back-office.direction.create',
    [
        'direction' => $direction,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direction = Direction::create([
            'libelle_court' => $request->libelle_court,
            'libelle_long' => $request->libelle_long,
            'domaine' => $request->domaine,
        ]);

        return redirect()->route('directions.index')->with('message', 'La direction a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        $direction = Direction::find($direction->id);

        $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('direction_id', '=', $direction->id)
        //->where('demandes.date_debut', '<=', now()) //validé et est en cours
        ->get()->count();

        $demandes = DB::table('demandes')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
       ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('direction_id', '=', $direction->id)
       ->distinct('demandes.id')
       ->orderbyDesc('demandes.id')
       ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

        return view('back-office.direction.show',
    [
        'direction' => $direction,
        'demandes' => $demandes,
        'stageencours' => $stageencours,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        return view('back-office.direction.edit',
        [
            'direction' => $direction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        $direction->update(
            [
                'libelle_long' => $request->libelle_long,
                'libelle_court' => $request->libelle_court,
                'domaine' => $request->domaine,
            ]
            );

        return redirect()->route('directions.index')->with('message', 'La direction été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        Direction::destroy($direction->id);
        return redirect()->route('directions.index')->with("statutDirection","La direction a bien été supprimée");
    }
}
