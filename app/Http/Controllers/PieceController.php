<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       // $piece = Piece::All();
        $liste = Demande::All();

        /*$listes = DB::select('select pieces.demande_id as pieceDemandeId,pieces.libelle as pieceLibelle,pieces.url as pieceUrl,demandes.id as demandeId
        from pieces,demandes 
        where pieces.demande_id = demandes.id 
        group by pieceDemandeId,pieceLibelle,pieceUrl,demandeId;');*/

        //$liste = (array) $listes;

        return view('front-office.piece.index',compact('liste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function create()
    {
        //

        $liste = Demande::findOrFail(5);
		if(is_null($liste)){
			return Redirect::route('front-office.piece.index');
		}
        return view('front-office.piece.create',compact('liste'));
    }

    */
    public function enregistrerPiece($id)
    {
        //
        $liste = Demande::findOrFail($id);
		if(is_null($liste)){
			return Redirect::route('front-office.piece.index');
		}
        return view('front-office.piece.create',compact('liste'));
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

        $piece = $request->file('file');

		if($piece->isValid())
		{
			$chemin = config('pieces.path');

			$extension = $piece->getClientOriginalExtension();

			do {
				$nom = $request->libelle.'.'. $extension;
			} while(file_exists($chemin.'/'. $nom));

            $url = '/'.$chemin.'/'.$request->libelle.'.'.$extension;

            //dd($url);
			if($piece->move($chemin, $nom)) {
                Piece::create(
                    [
                        'demande_id'=>$request->demande_id,
                        'libelle'=>$request->libelle,
                        'url'=>$url,
                        //'url'=>$request->file('file')->store('files','public'),
                        'description'=>$request->description,
                    ]);
                    $liste = Demande::All();
                    return view('front-office.piece.index',compact('liste'));
			}
		}
        return view('front-office.piece.create');
    }
		

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $piece)
    {
        //

        $liste = Piece::where('demande_id',$piece->id)->get();
        //$liste = Piece::All();
        //dd($liste);
		return view('front-office.piece.show', compact('liste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        //

        $liste = Piece::findOrFail($piece->id);
		if(is_null($liste)){
			return Redirect::route('front-office.piece.show');
		}

		return view('front-office.piece.edit', compact('liste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
        //


        $file = $request->file('file');

		if($file->isValid())
		{
        $chemin = config('pieces.path');

			$extension = $file->getClientOriginalExtension();

			do {
				$nom = $request->libelle.'.'. $extension;
			} while(file_exists($chemin.'/'. $nom));

            $url = '/'.$chemin.'/'.$request->libelle.'.'.$extension;

            //dd($url);
			if($file->move($chemin, $nom))
            {
        Piece::whereId($piece->id)->update(
            [
                'libelle' => $request->libelle,
                'description' => $request->description,
                'url' => $url,
            ]);

            //$liste = Piece::where('demande_id',$piece->id)->get();
            $listeDemande = Demande::All();
    
        return view('front-office.piece.index', compact('listeDemande'));
            }

        }
            return view('front-office.piece.edit', compact('liste'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        //

        $listePiece = Piece::findOrFail($piece->id);
    $listePiece->delete();

    $liste = Demande::All();
    return view('front-office.piece.index',compact('liste'));
    }
}
