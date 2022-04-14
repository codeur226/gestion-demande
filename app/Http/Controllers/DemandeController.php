<?php

namespace App\Http\Controllers;

use App\Mail\ValidationDemande;
use App\Models\Demande;
use App\Models\Demande_user;
use App\Models\Piece;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class DemandeController extends Controller
{
    /** ********************************************************************
     * DEMBELE
     * recuperer la liste des demandes en attentes.
     *
     ***********************************************************************/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //**** LISTES DES DEMANDES EN ATTENTES */
        $demandes = Demande::join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
        ->join('users', 'users.id', '=', 'demande_users.user_id')
        ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8)
        ->orderbyDesc('demandes.id')
        ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', ]);

        return view('back-office.demande.index', [
           'demandes' => $demandes,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /** ********************************************************************
     * DEMBELE
     * recupérer une demande spécifique.
     *
     ***********************************************************************/

    /**
     * Display the specified resource.
     *Voir les détails d'une demande.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //Affiche
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();
        $pieces = Piece::where('demande_id', $id)->get();

        return view('back-office.demande.show', [
        'demande' => $demande,
        'pieces' => $pieces,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
    }

    /** ********************************************************************
     * DEMBELE
     * supprimer une demande spécifique.
     *
     ***********************************************************************/

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Demande::destroy($id);
        $demandes = Demande::join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
        ->join('users', 'users.id', '=', 'demande_users.user_id')
        ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8)
        ->orderbyDesc('demandes.id')
        ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', ]);

        return view('back-office.demande.index', [
           'demandes' => $demandes,
       ]);
    }

    /** ********************************************************************
     * DEMBELE
     * supprimer une piece jointe.
     *
     ***********************************************************************/
    public function supprimerpiece($id)
    {
        //Affiche une demande spécifique
        $iddemande = Piece::where('id', $id)->first();
        //  dd($iddemande);
        Piece::destroy($id);
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $iddemande->demande_id)->first();
        $pieces = Piece::where('demande_id', $iddemande->demande_id)->get();

        return view('back-office.demande.show', [
        'demande' => $demande,
        'pieces' => $pieces,
    ]);

        return view('back-office.demande.show',
            [
                'demande' => $demande,
                'pieces' => $pieces,
            ]);
    }

    /** ********************************************************************
     * DEMBELE
     * recuperer les different nombre pour affichier sur le dashboard.
     *
     ***********************************************************************/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //**** LISTES DES DEMANDES EN ATTENTES */
        $demandes = Demande::join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
          ->join('users', 'users.id', '=', 'demande_users.user_id')
          ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
          ->where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8)
          ->orderbyDesc('demandes.id')
          ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
            'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
            'demandes.note_globale', ]);
        //**** NOMBRE DES DEMANDES EN ATTENTES */
        $stageattente = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8)
        ->where('demandes.type_demande', '=', 6)
        ->get()->count();
        $stagevalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat veut dire validé (parametre valeur)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '!=', 12) //etape 12 veut dire validé
        ->where('demandes.date_debut', '>', now()) //validé non encore commencé
        ->get()->count();


        $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat veut dire validé (parametre valeur)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '!=', 12) //etape 12 veut dire validé
        ->where('demandes.date_debut', '<=', now()) //validé et est en cours

        ->get()->count();

        $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat veut dire validé (parametre valeur)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 12) //etape 12 veut dire validé
        ->get()->count();

        $emploiattente = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8)
        ->where('demandes.type_demande', '=', 7)
        ->get()->count();
        $emploivalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9)
        ->where('demandes.type_demande', '=', 7)
        ->get()->count();

        return view('welcomeback', [
           'stageattente' => $stageattente,
           'stagevalide' => $stagevalide,
           'emploiattente' => $emploiattente,
           'emploivalide' => $emploivalide,
           'stagetermines' => $stagetermines,
           'demandes' => $demandes,
           'stageencours'=>$stageencours,
       ]);
    }

    /** ********************************************************************
     * DEMBELE
     * Affiche le formulaire de report de la date du stage.
     *
     ***********************************************************************/

    /**
     * Affiche le formulaire de report de la date du stage.
     *
     * @return \Illuminate\Http\Response
     */
    public function formreporter($id)
    {
        $demande = Demande::find($id);

        return view('back-office.demande.reporter', ['demande' => $demande]);
    }

    /** ********************************************************************
     * DEMBELE
     * Enregistre le report de la date du stage.
     *
     ***********************************************************************/

    /**
     * Enregistre le report de la date du stage.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporter(Request $request)
    {
        $demande = Demande::find($request->iddemande);
        $demande->update(
            [
                'description' => $request->motif,
                'date_debut' => $request->datedebut,
                'date_fin' => $request->datedefin,
            ]
            );
        $user = User::
            join('demande_users', 'users.id', '=', 'demande_users.user_id')
            ->where('demande_users.role', '=', 14) //14 role stagiaire
            ->where('demande_users.demande_id', '=', $request->iddemande)
            ->first();
        Mail::to($user)->send(new ValidationDemande($demande, $user)); // envoie du mail de notification de la validation

        return Redirect::route('stageencours');
    }

    /** ********************************************************************
     * DEMBELE
     * Valider un stage.
     *
     ***********************************************************************/

    /**
     * @return \Illuminate\Http\Response
     */
    public function validerstage($id)
    {
        $demande = Demande::find($id);
        $demande->update(
            [
                'etat' => 9,
                'etape' => 10,
            ]
            );
        $user = User::
            join('demande_users', 'users.id', '=', 'demande_users.user_id')
            ->where('demande_users.role', '=', 14) //14 role stagiaire
            ->where('demande_users.demande_id', '=', $id)
            ->first();
        //Mail::to($user)->send(new ValidationDemande($demande, $user)); // envoie du mail de notification de la validation

        return redirect()->route('demandes.index')->with('statutDemande', 'La demande a bien été validée ! ');
    }

    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes en cours.
     *
     ***********************************************************************/
    public function stageencours()
    {
        //**** LISTES DES DEMANDES EN COURS */
        $demandes = DB::table('demandes')
       ->join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
       ->join('users', 'users.id', '=', 'demande_users.user_id')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etat', '=', 9)
       ->orderbyDesc('demandes.id')
       ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

        return view('back-office.stage.index', [
          'demandes' => $demandes,
      ]);
    }

    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes validé non commencés.
     *
     ***********************************************************************/
    public function stagevalides()
    {
        //**** LISTES DES DEMANDES EN COURS */
        $demandes = DB::table('demandes')
       ->join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
       ->join('users', 'users.id', '=', 'demande_users.user_id')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etape', '=', 10)
       ->where('demandes.date_debut', '>', now())
       ->orderbyDesc('demandes.id')
       ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

        return view('back-office.stage.valide', [
          'demandes' => $demandes,
      ]);
    }
    


    
    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes terminés.
     *
     ***********************************************************************/
    public function stagetermines()
    {
        //**** LISTES DES DEMANDES EN COURS */
        $demandes = DB::table('demandes')
       ->join('demande_users', 'demande_users.demande_id', '=', 'demandes.id')
       ->join('users', 'users.id', '=', 'demande_users.user_id')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etape', '=', 12)
       ->orderbyDesc('demandes.id')
       ->get(['users.nom as nom', 'users.prenom', 'users.telephone', 'users.email', 'demandes.id', 'demandes.domaine',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

        return view('back-office.stage.termine', [
          'demandes' => $demandes,
      ]);
    }
    /** ********************************************************************
     * DEMBELE
     * Affiche les informations détaillées sur un stage en cours.
     *
     ***********************************************************************/
    public function voirStage(int $id)
    {
        $maitres = User::
          join('demande_users', 'users.id', '=', 'demande_users.user_id')
          ->where('demande_users.role', '=', 13)
          ->where('demande_users.demande_id', '=', $id)
          ->first();
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();

        return view('back-office.stage.show',
    [
        'demande' => $demande,
        'maitres' => $maitres,
    ]);
    }

    /** ********************************************************************
     * DEMBELE
     *Mettre fin a un stage.
     *
     ***********************************************************************/
    public function stagefini($id)
    {
        $demande = Demande::find($id);
        $demande->update(
            [
                'etape' => 12, // etape 12 correspond a terminé
            ]
            );

        return Redirect::route('stageencours');
    }

    /** ********************************************************************
     * DEMBELE
     * Formulaire pour affecter un stagiaire à un maître se stage.
     *
     ***********************************************************************/
    public function formaffecter($id)
    {
        $users = User::All();
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();

        return view('back-office.demande.affecter',
    [
        'demande' => $demande,
        'users' => $users,
    ]);
    }

    /** ********************************************************************
     * DEMBELE
     * Affecter un stagiaire à un maître de stage.
     *
     ***********************************************************************/
    public function affecter(Request $request)
    {
        $user_demandes = Demande_user::create([
            //'usercreated'=>Auth::user()->id,

            'demande_id' => $request->iddemande,
            'user_id' => $request->maitre,
            'role' => 13, // 13 correspond a role maitre de stage dans paramettre valeur
        ]);

        return redirect()->route('demandes.index')->with('statutDemande', 'La demande a bien été validée ! ');
    }

    /** ********************************************************************
     * DEMBELE
     * Affichier le Formulaire pour noter un stagiaire.
     *
     ***********************************************************************/
    public function formnoter($id)
    {
        $demande = Demande::find($id);

        return view('back-office.stage.noter', ['demande' => $demande]);
    }

    /** ********************************************************************
     * DEMBELE
     * Noter un stagiaire.
     *
     ***********************************************************************/
    public function noter(Request $request)
    {
        $demande = Demande::find($request->iddemande);
        $demande->update(
            [
                'note_globale' => $request->note,
                'commentaires' => $request->comment,
            ]
            );

        return Redirect::route('stageencours');
    }
}
