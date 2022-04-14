<?php

namespace App\Http\Controllers;

use App\Models\Valeur;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = Valeur::join('Parametre', 'Parametre.parametre_id', '=', 'Valeur.parametre_id')
                      ->where('Parametre.parametre', '=', 'region')
                      ->get();
        //dd($data);

        return view('front-office.inscription.create', compact('data'));
    }

    // public function paiement(Request $request)
    // {
    //     //**** VALIDATION D'UN PAIEMENT */
    //     //  dd($request);

    //     return view('front-office.paiement.create');
    // }
}
