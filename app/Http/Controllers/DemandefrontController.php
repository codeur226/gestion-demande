<?php

namespace App\Http\Controllers;

use App\Mail\AjoutDemande;
use App\Models\Demande;
use App\Models\Direction;
use App\Models\Piece;
use App\Models\User;
use App\Models\Valeur;
use App\Notifications\OrderProcessed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

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
        //dd($request);
        // Test d'existence du mail user
        $demande = Demande::where('email', $request->email)->exists();

        if ($demande) 
        {
            // si le mail existe, renvoyer la page de connexion
            return redirect()->route('demandesfront.create', [
            ])->with('message', 'Une demande a déjà été enregistré avec cette adresse email !');
        }
        elseif ($request->datefinR < $request->datedebutR or $request->datefin < $request->datedebut) 
        {
            return redirect()->route('demandesfront.create', [
                ])->with('message', 'La date de fin de stage doit etre supérieure à la date de début de stage !');
        }
        else {
            // sinon si le mail n'existe pas, on enregistre la demande

            // Génération du code de la demande
            $code = 'DS-'.dechex((int) time());

            //Enregistrer la demande
            if($request->datedebut==NULL and $request->datefin==NULL){

                $demanderencour = Demande::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'telephone' => $request->telephone,
                    'whatsapp' => $request->whatsapp,
                    'email' => $request->email,
                    'type' => $request->typestageR,
                    'direction_id' => $request->directionR,
                    'date_debut' => $request->datedebutR,
                    'date_fin' => $request->datefinR,
                    'type_demande' => 6,
                    'etat' => 8,
                    'code' => strtoupper($code),
                    'supprimer' => 0,
                ]);

                /* ENREGISTREMENT DES PIECE JOINTES**/
            $type_file = ['cv', 'diplome', 'lettre'];
            $i = 0;
            $pieces = [$request->file('cvR'), $request->file('diplomeR'), $request->file('lettrerecommandationR')];
            foreach ($pieces as $piece) {
                if ($piece) {
                    $name = strtoupper($code).'-'.strtoupper($type_file[$i]).'.'.$piece->getClientOriginalExtension();
                    $filePath = $piece->storeAs('uploads', $name, 'public');
                    Piece::create(
                    [
                        'demande_id' => $demanderencour->id,
                        'libelle' => $name,
                        'url' => '/storage/'.$filePath,
                        'description' => 'RAS',
                        'supprimer' => 0,
                    ]);
                    $i++;
                }
            }

            }else{
                $demanderencour = Demande::create([
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

                /* ENREGISTREMENT DES PIECE JOINTES**/
            $type_file = ['cv', 'diplome', 'lettre'];
            $i = 0;
            $pieces = [$request->file('cv'), $request->file('diplome'), $request->file('lettrerecommandation')];
            foreach ($pieces as $piece) {
                if ($piece) {
                    $name = strtoupper($code).'-'.strtoupper($type_file[$i]).'.'.$piece->getClientOriginalExtension();
                    $filePath = $piece->storeAs('uploads', $name, 'public');
                    Piece::create(
                    [
                        'demande_id' => $demanderencour->id,
                        'libelle' => $name,
                        'url' => '/storage/'.$filePath,
                        'description' => 'RAS',
                        'supprimer' => 0,
                    ]);
                    $i++;
                }
            }

            }
            

            try {
                /* NOTIFICATION PAR MAIL AU DEMANDEUR**/
                Mail::to($demanderencour)->send(new AjoutDemande($demanderencour)); // envoie du mail
                
                /* NOTIFICATION PAR WHATSAPP A DRH */
                $demanderencour->notify(new OrderProcessed($demanderencour));
            } catch (\Exception $e) {
                /*
                S'il ya erreur dans la notification par mail/whatsapp
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
            'demande' => $demanderencour,
        ])->with('message', 'Le code de votre demande est : '.' '.$demanderencour->code.' '.'Veuillez noter ce code pour la suite de la procédure, consulter aussi votre e-mail ');
            }
            // $this->whatsappNotification($userencour->telephone);

            

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
        'demande' => $demanderencour,
    ])->with('message', 'Le code de votre demande est : '.' '.$demanderencour->code.' '.'Veuillez noter ce code pour la suite de la procédure, consulter aussi votre e-mail ');
        }
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
        $demande = new Demande();

        return view(
            'front-office.consultation.consulter',
            ['demande' => $demande],
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
