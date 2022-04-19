<?php

namespace App\Http\Controllers;

use App\Mail\AjoutDemande;
use App\Models\Demande;
use App\Models\Direction;
use App\Models\Piece;
use App\Models\User;
use App\Models\Valeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use App\Notifications\OrderProcessed;
use App\Http\Controllers\retourNotification;

class DemandefrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /** ********************************************************************
     * DEMBELE
     * Affiche le formulaire de demande de stage front.
     *
     ***********************************************************************/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directions = Direction::All();
        $typestages = Valeur::join('parametres', 'parametres.id', '=', 'valeurs.parametre_id')
            ->where('parametres.parametre', '=', 'type stage')
            ->get(['valeurs.id', 'valeurs.valeur']);

        return view(
            'front-office.stage.create',
            [
                'directions' => $directions,
                'typestages' => $typestages,
            ]
        );
    }

    /** ********************************************************************
     * DEMBELE
     * Enregistre les informations d'une demande.
     *
     ***********************************************************************/

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        //Enregistrement de l'utilisateur
        $code = 'DS-'.dechex((int) time());
        $userencour = User::create([
            //'usercreated'=>Auth::user()->id,

            
            'password' => Hash::make('UserDefault'),
            'type_user' => 1, // user système et nom système
            'first_connexion' => 0,
            // 'supprimer' => 0,
        ]);
        */


        //Enregistrement de l'utilisateur
        $code = 'DS-'.dechex((int) time());

        //Enregistrer la demande
        $demanderencour = Demande::create([
            //'usercreated'=>Auth::user()->id,

            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            
            'type' => $request->typestage,
            'direction_id' => $request->direction,
            'date_debut' => $request->datedebut,
            'date_fin' => $request->datefin,
            'type_demande' => 6,
            'etat' => 8,
            'code' => strtoupper($code),
            'supprimer' => 0,
        ]);

        
        /**enregistrer les informations dans la table pivot Demande_user**/
        /*
        $user_demandeencour = Demande_user::create([
            //'usercreated'=>Auth::user()->id,

            'demande_id' => $demanderencour->id,
            'user_id' => $userencour->id,
            'role' => 14, // 14 correspond a role stagiaire parametre/valeur
        ]);
        */

        /* ENREGISTREMENT DES PIECE JOINTES**/

        $pieces = [$request->file('cv'), $request->file('diplome'), $request->file('lettrerecommandation')];
        foreach ($pieces as $piece) {
            if ($piece) {
                $name = strtoupper($code).'_'.$piece->getClientOriginalName();
                $filePath = $piece->storeAs('uploads', $name, 'public');

                Piece::create(
                    [
                        'demande_id' => $demanderencour->id,
                        'libelle' => $name,
                        'url' => '/storage/'.$filePath,
                        'description' => 'RAS',
                        'supprimer' => 0,
                    ]);
            }
        }

        /* NOTIFICATION PAR MAIL AU DEMANDEUR**/
        // if()
        try{
            Mail::to($demanderencour)->send(new AjoutDemande($demanderencour)); // envoie du mail
        }
        catch(\Exception $e)
        {
            /* 
            S'il ya erreur dans la notification par mail
            Toujours confirmer la notification d'enregistrement de la demande sur la vue
            */
            $demandes = Demande::where('demandes.supprimer', '=', 0)
            ->orderbyDesc('demandes.id')
            ->get([
                'demandes.nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
                'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat',
                'demandes.note_globale',
            ]);

        return redirect()->route('formconsulter', [
            'demandes' => $demandes,
            'demande'=>$demanderencour,
        ])->with('message', 'Le code de votre demande est : '." ".$demanderencour->code ." ".'Veuillez noter ce code pour la suite de la procédure, consulter aussi votre e-mail ');
    
        }
        // $this->whatsappNotification($userencour->telephone);

        /* NOTIFICATION PAR WHATSAPP A DRH */
       // $demanderencour->notify(new OrderProcessed($demanderencour));

        /* 
            processus normal
            Notification pour confirmer l'enregistrement de la demande
            */
        $demandes = Demande::where('demandes.supprimer', '=', 0)
        ->orderbyDesc('demandes.id')
        ->get([
            'demandes.nom', 'demandes.prenom', 'demandes.telephone', 'demandes.email', 'demandes.id', 'demandes.direction_id',
            'demandes.date_debut', 'demandes.date_fin', 'demandes.etape', 'demandes.etat',
            'demandes.note_globale',
        ]);

    return redirect()->route('formconsulter', [
        'demandes' => $demandes,
        'demande'=>$demanderencour,
    ])->with('message', 'Le code de votre demande est : '." ".$demanderencour->code ." ".'Veuillez noter ce code pour la suite de la procédure, consulter aussi votre e-mail ');

    }
    
    // private function whatsappNotification(string $recipient)
    // {
    //     $sid = getenv('TWILIO_AUTH_SID');
    //     $token = getenv('TWILIO_AUTH_TOKEN');
    //     $wa_from = getenv('TWILIO_WHATSAPP_FROM');
    //     $twilio = new Client($sid, $token);

    //     $body = 'Bonjour, Gestion de stages';

    //     return $twilio->messages->create("whatsapp:$recipient", ['from' => "whatsapp:$wa_from", 'body' => $body]);
    // }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    /** ********************************************************************
     * DEMBELE
     * Affiche le formulaire de consultation d'une demande.
     *
     ***********************************************************************/

    /**
     * Affiche le formualire de consultation d'une demande.
     *
     * @return \Illuminate\Http\Response
     */
    public function formconsulter(Request $request)
    {
        //Affiche les information d'une demande
        $demande=new Demande;
        return view(
            'front-office.consultation.consulter',
            ['demande'=>$demande],
        );
    }

    /** ********************************************************************
     * DEMBELE
     * Affiche les informations détaillées d'une demande.
     *
     ***********************************************************************/

    /**
     * @return \Illuminate\Http\Response
     */
    public function consulter(Request $request)
    {
        //Affiche les information d'une demande
        $demande = Demande::where('demandes.supprimer', '=', 0)
            ->where('demandes.email', '=', $request->email)
            ->where('demandes.code', '=', $request->code)
            ->first();

        return view(
            'front-office.consultation.show',
            [
                'demande' => $demande,
            ]
        );
    }
}
