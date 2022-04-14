<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Renouvellement;
use Illuminate\Support\Facades\Redirect;

class RenouvellementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //

        $liste = Renouvellement::All();
        return view('back-office.renouvellement.index', compact('liste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /*
    public function create()
    {
        //
        $liste = Demande::findOrFail(5);
		if(is_null($liste)){
			return Redirect::route('back-office.renouvellement.index');
		}
        return view('back-office.renouvellement.create', compact('liste')); //->with('id',$demande_id);
    }

    */

    public function enregistrerRenouvellement($id)
    {
        //
        $liste = Demande::findOrFail($id);
		if(is_null($liste)){
			return Redirect::route('back-office.renouvellement.index');
		}
        return view('back-office.renouvellement.create', compact('liste')); //->with('id',$demande_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Renouvellement::create(
            [
                'demande_id'=> $request->demande_id,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
            ]);
        $demande = Demande::find($request->demande_id);
            $demande->update(
                [
                    'etape' => 11, //11 corespond a renouveller dans la table valeur
                ]
                );

            return Redirect::route('stageencours');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function show(Renouvellement $renouvellement)
    {
        
        $liste = Renouvellement::where('id',$renouvellement->id)->get();
		return view('back-office.renouvellement.show', compact('liste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function edit(Renouvellement $renouvellement)
    {
        //

        $liste = Renouvellement::findOrFail($renouvellement->id);
		if(is_null($liste)){
			return Redirect::route('back-office.renouvellement.index');
		}

		return view('back-office.renouvellement.edit', compact('liste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renouvellement $renouvellement)
    {
        //

        Renouvellement::whereId($renouvellement->id)->update(
            [
                'demande_id' => $request->demande_id,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
            ]);

        $liste = Renouvellement::All();
    
        return view('back-office.renouvellement.index', compact('liste'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renouvellement $renouvellement)
    {
        //

        $liste = Renouvellement::findOrFail($renouvellement->id);
    $liste->delete();

    return redirect('renouvellement');
    }
}
