<?php

namespace App\Http\Controllers;

use App\Mail\ValidationDemande;
use App\Models\Demande;
use App\Models\Demande_user;
use App\Models\Piece;
use App\Models\User;
use App\Models\Theme;
use App\Models\Renouvellement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
        if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
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
        }

        //**** LISTES DES DEMANDES EN ATTENTES DANS UNE DIRECTION DONNÉE*/
        if(Auth::user()->role_id == 7){
        $demandes = Demande::join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente
        ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        ->orderbyDesc('demandes.id')
        ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', ]);

          $stageattente = Demande::where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
          ->where('demandes.type_demande', '=', 6) //6 correspond a stage
          ->where('demandes.direction_id', '=', Auth::user()->direction_id)
          ->get()->count();
        }

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
     * Mettre fin a un stage.
     *
     * @return \Illuminate\Http\Response
     ***********************************************************************/

    public function stagefini(Request $request)
    {
        $url = url()->previous(); // Renvoie l'URL précédente
        $chemin_stagevalides = Str::contains($url, 'stagevalides'); // Str::contains() permet de vérifier 
        $chemin_stageencours = Str::contains($url, 'stageencours'); // qu'un élément est contenu dans une chaine de caractère
        $demande = Demande::find($request->iddemande);
        $demande->update(
            [
                'etape' => 10, // etape 10 correspond a terminé
                'motif' => $request->motif
            ]
            );

            if($chemin_stagevalides){

                return Redirect::route('stagevalides')->with('message','Le stage a bien été arrêté');
    
            }
            if($chemin_stageencours) {
    
                return Redirect::route('stageencours')->with('message','Le stage a bien été arrêté');
            
            }
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

        $url = url()->previous();
        $chemin_dashboard = Str::contains($url, 'admin');
        $chemin_demande = Str::contains($url, 'demande');

        if($chemin_dashboard) {
            return view('back-office.demande.show',[
                'url' => 'dashboard',
                'demande' => $demande,
                'pieces' => $pieces,
            ]);
        }
        
        if($chemin_demande) {
            return view('back-office.demande.show', [
                'url' => 'demande',
                'demande' => $demande,
                'pieces' => $pieces,
            ]);
        }
        
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

          $stageattente = Demande::where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
          ->where('demandes.type_demande', '=', 6) //6 correspond a stage
          ->get()->count();

        /*return view('back-office.demande.index', [
           'demandes' => $demandes,
           'stageattente' => $stageattente,
       ]);*/

       $url = url()->previous();
       $chemin_dashboard = Str::contains($url, 'admin');

       if ($chemin_dashboard) {
           return redirect()->route('admin')->with('message','La demande a bien été supprimée !');
       }else {
           return redirect()->route('demandes.index')->with('message','La demande a bien été supprimée !');
       }
    }

    /** ********************************************************************
     * DEMBELE
     * supprimer une piece jointe.
     *
     ***********************************************************************/
    public function supprimerpiece($id)
    {
        $url = url()->previous(); // Renvoie l'URL précédente
        $chemin = Str::contains($url, 'voirStage');

        //Affiche une demande spécifique
        $iddemande = Piece::where('id', $id)->first();
        //  dd($iddemande);
        Piece::destroy($id);
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $iddemande->demande_id)->first();
        $pieces = Piece::where('demande_id', $iddemande->demande_id)->get();

        $renouvellements = Renouvellement::where('demande_id', $id)->get();
        //dd($renouvellements);

        if($renouvellements->count() > 0)
        {
            foreach ($renouvellements as $renouvellement) {
                $renouvellement_date_debut = $renouvellement->date_debut;
                $renouvellement_date_fin = $renouvellement->date_fin;
            }
        }else
        {
            $renouvellement_date_debut = 'non renouvellé';
            $renouvellement_date_fin = 'non renouvellé';
        }

        if($chemin)
        {
            return view('back-office.stage.show', [
                'demande' => $demande,
                'pieces' => $pieces,
                'renouvellement_date_debut' => $renouvellement_date_debut, 
                'renouvellement_date_fin' => $renouvellement_date_fin,
            ])->with('message','Le fichier a bien été supprimé !');
            
        }
        else
        {
            return view('back-office.demande.show', [
                'demande' => $demande,
                'pieces' => $pieces,
            ]);
        }
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
        $janvier = $fevrier = $mars = $avril = $mai = $juin = $juillet = $aout = $septembre = $octobre = $novembre = $decembre = 0; 

        $mois=
        [
            'janvier' => date('Y').'-'.'01',
            'fevrier' => date('Y').'-'.'02',
            'mars' => date('Y').'-'.'03',
            'avril' => date('Y').'-'.'04',
            'mai' => date('Y').'-'.'05',
            'juin' => date('Y').'-'.'06',
            'juillet' => date('Y').'-'.'07',
            'aout' => date('Y').'-'.'08',
            'septembre' => date('Y').'-'.'09',
            'octobre' => date('Y').'-'.'10',
            'novembre' => date('Y').'-'.'11',
            'decembre' => date('Y').'-'.'12',
        ];

        foreach (DB::table('demandes')->get() as $one) {
            if(Str::contains($one->created_at, $mois['janvier']))
            {
                $janvier++;
            }
            elseif(Str::contains($one->created_at, $mois['fevrier']))
            {
                $fevrier++;
            }
            elseif(Str::contains($one->created_at, $mois['mars']))
            {
                $mars++;
            }
            elseif(Str::contains($one->created_at, $mois['avril']))
            {
                $avril++;
            }
            elseif(Str::contains($one->created_at, $mois['mai']))
            {
                $mai++;
            }
            elseif(Str::contains($one->created_at, $mois['juin']))
            {
                $juin++;
            }
            elseif(Str::contains($one->created_at, $mois['juillet']))
            {
                $juillet++;
            }
            elseif(Str::contains($one->created_at, $mois['aout']))
            {
                $aout++;
            }
            elseif(Str::contains($one->created_at, $mois['septembre']))
            {
                $septembre++;
            }
            elseif(Str::contains($one->created_at, $mois['octobre']))
            {
                $octobre++;
            }
            elseif(Str::contains($one->created_at, $mois['novembre']))
            {
                $novembre++;
            }
            elseif(Str::contains($one->created_at, $mois['decembre']))
            {
                $decembre++;
            }

        }

        $data = [$janvier, $fevrier, $mars, $avril, $mai, $juin, $juillet, $aout, $septembre, $octobre, $novembre, $decembre];
        $labels = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];

        $maxi = max($data)+10;


        // Simulating your data
    /*$time = [
        ['RSSI' => 33, 'created_at' => '2022-02-20 19:25:43',],
        ['RSSI' => 55, 'created_at' => '2022-02-20 20:25:43',],
        ['RSSI' => 23, 'created_at' => '2022-02-20 21:25:43',],
        ['RSSI' => -5, 'created_at' => '2022-02-20 22:25:43',],
        ['RSSI' => 9, 'created_at' => '2022-02-20 23:25:43',],
        ['RSSI' => 69, 'created_at' => '2022-02-21 00:25:43',],
    ];

    // Saparating informations for x-axis (labels) and y-axis (data)
    $timestamps_x_axis = [];
    $rssi_y_axis = [];
    foreach ($time as  $row) {
        $timestamps_x_axis[] = $row['created_at'];
        $rssi_y_axis[] = $row['RSSI'];
    }*/

        // ADMINISTRATEUR ET DRH


        if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
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
        }

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

        //**** NOMBRE DES DEMANDES TERMINEES */        
        $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
        ->get()->count();

        


        // DIRECTEUR

        if(Auth::user()->role_id == 7){
            $demandes = Demande::join('valeurs', 'valeurs.id', '=', 'demandes.etat')
          ->where('demandes.supprimer', '=', 0)
          ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente
          ->where('demandes.type_demande', '=', 6) //6 correspond a stage
          ->where('demandes.direction_id', '=', Auth::user()->direction_id)
          ->orderbyDesc('demandes.id')
          ->get(['demandes.nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
            'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
            'demandes.note_globale', ]);

        //**** NOMBRE DES DEMANDES EN ATTENTES */
        $stageattente = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 8) //etat 8 veut dire en attente(parametre/valeur)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        ->get()->count();

        //**** NOMBRE DES DEMANDES VALIDES */
        $stagevalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
        ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
        //->where('demandes.date_debut', '>', now()) //validé non encore commencé
        ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->get()->count();

        //**** NOMBRE DES DEMANDES EN COURS */
        $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        //->where('demandes.date_debut', '<=', now()) //validé et est en cours
        ->get()->count();

        //**** NOMBRE DES DEMANDES TERMINEES */        
        $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
        ->get()->count();
        }
        
        //MAITRE DE STAGE


        if(Auth::user()->role_id == 6){
        //**** NOMBRE DES DEMANDES VALIDES */
        $stagevalide = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
        ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
        //->where('demandes.date_debut', '>', now()) //validé non encore commencé
        ->where('demandes.maitre_stage', '=', Auth::user()->id)
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->get()->count();

        //**** NOMBRE DES DEMANDES EN COURS */
        $stageencours = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.maitre_stage', '=', Auth::user()->id)
        //->where('demandes.date_debut', '<=', now()) //validé et est en cours
        ->get()->count();

        //**** NOMBRE DES DEMANDES TERMINEES */        
        $stagetermines = Demande::where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
        ->where('demandes.maitre_stage', '=', Auth::user()->id)
        ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
        ->get()->count();

        $stageattente = 0;
        $demandes = 0;
        }


        return view('welcomeback', [
           'stageattente' => $stageattente,
           'stagevalide' => $stagevalide,
           'stagetermines' => $stagetermines,
           'demandes' => $demandes,
           'stageencours'=>$stageencours,
           'labels' => $labels,
           'data' => $data,
           'maxi' => $maxi,
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

        return Redirect::route('demandes.show',$request->iddemande)->with('message','La demande a bien été reportée');
    }

    /***********************************************************************
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
        try {
            Mail::to($demande)->send(new ValidationDemande($demande)); // envoie du mail de notification de la validation
        } catch (\Exception $e) {
            return redirect()->route('demandes.index')->with('message', 'La demande a bien été validée ! ');
        }

        return redirect()->route('demandes.index')->with('message', 'La demande a bien été validée ! ');
    }

    /** ********************************************************************
     * DEMBELE
     * Recuperer les demandes en cours.
     *
     ***********************************************************************/
    public function stageencours()
    {

        // ADMIN ET DRH

        if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
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
        }

        // DIRECTEUR

        if(Auth::user()->role_id == 7){
            //**** LISTES DES STAGES EN COURS */
        $demandes = DB::table('demandes')
        ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
         ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
         ->where('demandes.direction_id', '=', Auth::user()->direction_id)
        ->distinct('demandes.id')
        ->orderbyDesc('demandes.id')
        ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
 
          $stageencours = Demande::where('demandes.supprimer', '=', 0)
         ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
         ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
         ->where('demandes.type_demande', '=', 6) //6 correspond a stage
         ->where('demandes.direction_id', '=', Auth::user()->direction_id)
         //->where('demandes.date_debut', '<=', now()) //validé et est en cours
         ->get()->count();
        }

        // MAITRE DE STAGE

        if(Auth::user()->role_id == 6){
            //**** LISTES DES STAGES EN COURS */
        $demandes = DB::table('demandes')
        ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
        ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
        ->where('demandes.supprimer', '=', 0)
        ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
        ->where('demandes.type_demande', '=', 6) //6 correspond a stage
         ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
         ->where('demandes.maitre_stage', '=', Auth::user()->id)
        ->distinct('demandes.id')
        ->orderbyDesc('demandes.id')
        ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
          'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
          'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
 
          $stageencours = Demande::where('demandes.supprimer', '=', 0)
         ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
         ->where('demandes.etape', '=', 11) //etape 11 veut dire en cours
         ->where('demandes.type_demande', '=', 6) //6 correspond a stage
         ->where('demandes.maitre_stage', '=', Auth::user()->id)
         //->where('demandes.date_debut', '<=', now()) //validé et est en cours
         ->get()->count();
        }



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

        // ADMIN ET DRH

        if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){

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
        }

        // DIRECTEUR

        if(Auth::user()->role_id == 7){

            //**** LISTES DES STAGES VALIDES */
            $demandes = DB::table('demandes')
           ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
           ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
           ->where('demandes.supprimer', '=', 0)
           ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
            ->where('demandes.direction_id', '=', Auth::user()->direction_id)
           ->orderbyDesc('demandes.id')
           ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
             'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
             'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
             
             $stagevalide = Demande::where('demandes.supprimer', '=', 0)
            ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
            ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
            //->where('demandes.date_debut', '>', now()) //validé non encore commencé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.direction_id', '=', Auth::user()->direction_id)
            ->get()->count();
            }

            // MAITRE DE STAGE

        if(Auth::user()->role_id == 6){

            //**** LISTES DES STAGES VALIDES */
            $demandes = DB::table('demandes')
           ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
           ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
           ->where('demandes.supprimer', '=', 0)
           ->where('demandes.etat', '=', 9) // etat 9 veut dire validé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
            ->where('demandes.maitre_stage', '=', Auth::user()->id)
           ->orderbyDesc('demandes.id')
           ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
             'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
             'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
             
             $stagevalide = Demande::where('demandes.supprimer', '=', 0)
            ->where('demandes.etat', '=', 9) // etat 9 veut dire validé (parametre valeur)
            ->where('demandes.etape', '=', 25) //etape 25 veut dire en attente de commencer
            //->where('demandes.date_debut', '>', now()) //validé non encore commencé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.maitre_stage', '=', Auth::user()->id)
            ->get()->count();
            }
        

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

        // ADMIN ET DRH

        if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
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
        }

        // DIRECTEUR

        if(Auth::user()->role_id == 7){
            //**** LISTES DES STAGES TERMINER */
            $demandes = DB::table('demandes')
           ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
           ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
           ->where('demandes.supprimer', '=', 0)
           ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
           ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
           ->where('demandes.direction_id', '=', Auth::user()->direction_id)
           ->orderbyDesc('demandes.id')
           ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
             'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
             'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
    
             $stagetermines = Demande::where('demandes.supprimer', '=', 0)
            ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
            ->where('demandes.direction_id', '=', Auth::user()->direction_id)
            ->get()->count();
            }

            // MAITRE DE STAGE

        if(Auth::user()->role_id == 6){
            //**** LISTES DES STAGES TERMINER */
            $demandes = DB::table('demandes')
           ->join('valeurs', 'valeurs.id', '=', 'demandes.etat')
           ->LeftJoin('renouvellements', 'demandes.id', '=', 'renouvellements.demande_id')
           ->where('demandes.supprimer', '=', 0)
           ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
           ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
           ->where('demandes.maitre_stage', '=', Auth::user()->id)
           ->orderbyDesc('demandes.id')
           ->get(['demandes.nom as nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
             'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat', 'demandes.code',
             'demandes.note_globale', 'renouvellements.date_debut as debutrenouv', 'renouvellements.date_fin as finrenouv', ]);
    
             $stagetermines = Demande::where('demandes.supprimer', '=', 0)
            ->where('demandes.etat', '=', 9) //etat 9 veut dire validé
            ->where('demandes.type_demande', '=', 6) //6 correspond a stage
            ->where('demandes.etape', '=', 10) //etape 10 veut dire terminé
            ->where('demandes.maitre_stage', '=', Auth::user()->id)
            ->get()->count();
            }

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
        // +++++ Affiche les informations détaillées de l'objet concerné +++++
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();
        $pieces = Piece::where('demande_id', $id)->get();
        $url = url()->previous(); // Renvoie l'URL précédente
        $chemin_stagevalides = Str::contains($url, 'stagevalides'); // Str::contains() permet de vérifier 
        $chemin_stageencours = Str::contains($url, 'stageencours'); // qu'un élément est contenu dans une chaine de caractère
        $chemin_stagetermines = Str::contains($url, 'stagetermines');

        $renouvellements = Renouvellement::where('demande_id', $id)->get();
        //dd($renouvellements);

        if($renouvellements->count() > 0)
        {
            foreach ($renouvellements as $renouvellement) {
                $renouvellement_date_debut = $renouvellement->date_debut;
                $renouvellement_date_fin = $renouvellement->date_fin;
            }
        }else
        {
            $renouvellement_date_debut = 'non renouvellé';
            $renouvellement_date_fin = 'non renouvellé';
        }

        if($chemin_stagevalides){

            return view('back-office.stage.show',[
                'demande' => $demande, 
                'url' => 'stagevalides', 
                'renouvellement_date_debut' => $renouvellement_date_debut, 
                'renouvellement_date_fin' => $renouvellement_date_fin,
                'pieces' => $pieces,
            ]);

        }
        if($chemin_stageencours) {

            return view('back-office.stage.show',[
                'demande' => $demande, 
                'url' => 'stageencours',
                'renouvellement_date_debut' => $renouvellement_date_debut, 
                'renouvellement_date_fin' => $renouvellement_date_fin,
                'pieces' => $pieces,
            ]);
        
        }
        if($chemin_stagetermines){

            return view('back-office.stage.show',[
                'demande' => $demande, 
                'url' => 'stagetermines',
                'renouvellement_date_debut' => $renouvellement_date_debut, 
                'renouvellement_date_fin' => $renouvellement_date_fin,
                'pieces' => $pieces,
            ]);
        
        }else{
            return view('back-office.stage.show',[
                'demande' => $demande, 
                'url' => 'stage',
                'renouvellement_date_debut' => $renouvellement_date_debut, 
                'renouvellement_date_fin' => $renouvellement_date_fin,
                'pieces' => $pieces,
            ]);
        }
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
        ->where('users.role_id', '=', 6)
        ->get(['users.id as id', 'users.nom as nom', 'users.prenom as prenom']);
        //dd($users);
        $demande = Demande::where('demandes.supprimer', '=', 0)->where('id', '=', $id)->first();

        $url = url()->previous(); // Renvoie l'URL précédente
        $chemin_stagevalides = Str::contains($url, 'stagevalides'); // Str::contains() permet de vérifier 
        $chemin_stageencours = Str::contains($url, 'stageencours'); // qu'un élément est contenu dans une chaine de caractère
        $chemin_demandes = Str::contains($url, 'demandes');

        if($chemin_stagevalides){

            return view('back-office.demande.affecter',[
                'demande' => $demande, 
                'url' => 'stagevalides',
                'users' => $users,
            ]);

        }
        if($chemin_stageencours) {

            return view('back-office.demande.affecter',[
                'demande' => $demande, 
                'url' => 'stageencours',
                'users' => $users,
            ]);
        
        }
        if($chemin_demandes){

            return view('back-office.demande.affecter',[
                'demande' => $demande, 
                'url' => 'demandes',
                'users' => $users,
            ]);
        
        }
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

        if($demande->etape == 25){

            return redirect()->route('stagevalides')->with('message', 'Le stagiaire a bien été affecté à un maitre de stage ! ');

        }
        if($demande->etape == 11) {

            return redirect()->route('stageencours')->with('message', 'Le stagiaire a bien été affecté à un maitre de stage ! ');
        
        }
        if($demande->etat == 8){

            return redirect()->route('demandes.index')->with('message', 'Le stagiaire a bien été affecté à un maitre de stage ! ');
        
        }

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

    /***********************************************************************
     * DEMBELE
     * Noter un stagiaire.
     *
     ***********************************************************************/
    public function noter(Request $request)
    {
        $demande = Demande::find($request->iddemande);

        if ($demande->maitre_stage==NULL || $demande->theme_id==NULL) {
            return redirect()->route('formnoter', $demande->id)->with('message', "Veuillez d'abord affecter un maitre de stage et un thème au stagiaire !");
        }else{
            $demande->update(
                [
                    'note_globale' => $request->note,
                    'commentaires' => $request->comment,
                ]
                );
    
            return Redirect::route('voirStage', $demande->id)->with('message','La note a bien été ajoutée');
        }
        
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

        return Redirect::route('voirStage', $demande->id)->with('message','Le thème a bien été attribué');
        //return Redirect::back();
    }


    public function download(Request $request)
    {

        $stage = Demande::find($request->iddemande);
        $piece = $request->file('piece');
        $char = array(" ", ".", ",", "/", "'", "=", ";", ":", "!", "?", "|", "(", ")", "^", "*", "<", ">");
        $libelle = str_replace($char,'',$request->libelle);
        $name = strtoupper($stage->code).'-'.strtoupper($libelle).'.'.$piece->getClientOriginalExtension();
        $filePath = $piece->storeAs('uploads', $name, 'public');
        Piece::create(
        [
            'demande_id' => $request->iddemande,
            'libelle' => $name,
            'url' => '/storage/'.$filePath,
            'description' => 'RAS',
            'supprimer' => 0,
        ]);

        return Redirect::route('voirStage', $stage->id)->with('message','Le fichier a bien été ajouté !');
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

        return Redirect::route('stagevalides')->with('message','Le stage a bien été démarré');
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