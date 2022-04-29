<?php

namespace App\Http\Controllers;

use App\Mail\ValidationDemande;
use App\Models\Demande;
use App\Models\Demande_user;
use App\Models\Piece;
use App\Models\User;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


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
        $demandes = Demande::join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente
        ->orderbyDesc('demandes.id')
        ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', ]);

          $stageattente = Demande::where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
          ->where('demandes.type_demande', '=', 6) //6 correspond a stage
          ->get()->count();

        return view('back-office.demande.index', [
           'demandes' => $demandes,
           'stageattente' => $stageattente,
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
        $demandes = Demande::join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente (parametre/valeur)
        ->orderbyDesc('demandes.id')
        ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
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
        $demandes = Demande::join('valeurs', 'valeurs.id', '=', 'demandes.etat')
          ->where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente
          ->where('demandes.type_demande', '=', 6) //6 correspond a stage
          ->orderbyDesc('demandes.id')
          ->get(['demandes.nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
            'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
            'demandes.note_globale', ]);

        //**** NOMBRE DES DEMANDES EN ATTENTES */
        $stageattente = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->get()->count();

        //**** NOMBRE DES DEMANDES VALIDES */
        $stagevalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
        ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
        //->where('demandes.date_debut', '>', now()) //validé non encore commencé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->get()->count();

        //**** NOMBRE DES DEMANDES EN COURS */
        $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        //->where('demandes.date_debut', '<=', now()) //validé et est en cours
        ->get()->count();

        //dd($stageencours);

        //**** NOMBRE DES DEMANDES TERMINEES */        
        $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
        ->get()->count();
        

        //**** NOMBRE DES EMPLOIS EN ATTENTES */
        $emploiattente = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
        ->where('demandes.type_demande', '=', 7)
        ->get()->count();

        //**** NOMBRE DES EMPLOIS VALIDES */
        $emploivalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé (parametre valeur)
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
        //$user = Demande::where('demandes', '=', $id)->first();
        //Mail::to($user)->send(new ValidationDemande($demande, $user)); // envoie du mail de notification de la validation

        return Redirect::route('demandes.index');
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
                'etat' => 9, //etat 9 veut dire validé
                'etape' => 25, //etape 25 veut dire en attente de commencer
                'statut' => 12, //statut 12 veut dire nouveau
            ]
            );
        //$user = Demande::where('demandes', '=', $id)->first();
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
        //**** LISTES DES STAGES EN COURS */
        $demandes = DB::table('demandes')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
       ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
       ->distinct('demandes.id')
       ->orderbyDesc('demandes.id')
       ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

         $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        //->where('demandes.date_debut', '<=', now()) //validé et est en cours
        ->get()->count();

        return view('back-office.stage.index', [
          'demandes' => $demandes,
          'stageencours' => $stageencours,
      ]);
    }

    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes validé non commencés.
     *
     ***********************************************************************/
    public function stagevalides()
    {
        //**** LISTES DES STAGES VALIDES */
        $demandes = DB::table('demandes')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
       ->orderbyDesc('demandes.id')
       ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
         
         $stagevalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
        ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
        //->where('demandes.date_debut', '>', now()) //validé non encore commencé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->get()->count();

        return view('back-office.stage.valide', [
          'demandes' => $demandes,
          'stagevalide' => $stagevalide,
      ]);
    }
    


    
    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes terminés.
     *
     ***********************************************************************/
    public function stagetermines()
    {
        //**** LISTES DES STAGES TERMINER */
        $demandes = DB::table('demandes')
       ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
       ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
       ->where('demandes.supprimer', '=', 0)
       ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
       ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
       ->orderbyDesc('demandes.id')
       ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
         'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
         'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);

         $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
        ->get()->count();

        return view('back-office.stage.termine', [
          'demandes' => $demandes,
          'stagetermines' => $stagetermines,
      ]);
    }
    /** ********************************************************************
     * DEMBELE
     * Affiche les informations détaillées sur un stage en cours.
     *
     ***********************************************************************/
    public function voirStage(int $id)
    {
        /*$maitres = User::
          join('demande_users', 'users.id', '=', 'demande_users.user_id')
          ->where('demande_users.role', '=', 13)
          ->where('demande_users.demande_id', '=', $id)
          ->first();*/
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();

        return view('back-office.stage.show',
    [
        'demande' => $demande,
       // 'maitres' => $maitres,
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
                'etape' => 10 // etape 10 correspond a terminé
            ]
            );

        return Redirect::route('stageencours');
    }

    /** ********************************************************************
     * DEMBELE
     * Formulaire pour affecter un stagiaire à un maître de stage.
     *
     ***********************************************************************/
    public function formaffecter($id)
    {
        $users = DB::table('users')
        ->join('demandes', 'users.direction_id', '=', 'demandes.direction_id')
        ->where('demandes.id', '=', $id)
        ->get(['users.id as id', 'users.nom as nom', 'users.prenom as prenom']);
        //dd($users);
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
        //dd($request);
        $demande = Demande::find($request->iddemande);
        $demande->update([

            'maitre_stage' => $request->maitre

        ]);

        return redirect()->route('stageencours')->with('statutDemande', 'La demande a bien été affectée à un maitre de stage ! ');
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

        return Redirect::route('voirStage', $demande->id);
    }

    public function formtheme($id)
    {
        $demande = Demande::find($id);
        $themes = Theme::All();

        return view('back-office.stage.theme', [
            'demande' => $demande,
            'themes' => $themes,
    ]);
    }

    public function theme(Request $request)
    {
        $demande = Demande::find($request->iddemande);
        $demande->update(
            [
                'theme_id' => $request->theme_id,
            ]
            );

        return Redirect::route('voirStage', $demande->id);
    }

    // Téléchargement des pièces jointes

    public function download($id)
    {
        $piece_libelle = Piece::where('id', $id)->value('libelle');

        $path = storage_path()."/".$piece_libelle;
        $contents= Storage::disk('public')->get($path);
        dd($contents);
    }

    /** ********************************************************************
     *
     *Mettre un stage en cours.
     *
     ***********************************************************************/
    public function encours($id)
    {
        $demande = Demande::find($id);
        $demande->update(
            [
                'etape' => 11, // etape 11 correspond a en cours
            ]
            );

        return Redirect::route('stagevalides');
    }


public function func(Request $request, $id)
{
    switch ($request->input('action')) {
        case 'terminer':
            $demande = Demande::find($id);
            $demande->update(
                [
                    'etape' => 10 // etape 10 correspond a terminé
                ]
                );

            return Redirect::route('stagevalides');
            break;

        case 'encours':
            $demande = Demande::find($id);
            $demande->update(
                [
                    'etape' => 11, // etape 11 correspond a en cours
                ]
                );

            return Redirect::route('stagevalides');
            break;
    }
}
}