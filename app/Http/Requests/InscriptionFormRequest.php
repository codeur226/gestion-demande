<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_type_profil' => 'required|numeric',
            'id_region' => 'required|numeric',
            'date_inscription' => 'required | date',
            'etat_paiement' => 'required | boolean',
            'resultat' => 'required | boolean',
            'id_mode_paiement' => 'required|numeric',
            'id_session' => 'required|numeric',
            'nom' => 'required | min:2|max:100',
            'prenom' => 'required | min:2|max:150',
            'id_sexe' => 'required',
            'date_naissance' => 'required | date',
            'telephone' => 'required | min:8|max:8',
            'confirmation_telephone' => 'required | min:8|max:8',
            'lieu_naissance' => 'required | min:2|max:100',
            'numero_long_cnib' => 'required | numeric | min:15|max:15',
            'confirmation_numero_long_cnib' => 'required | numeric | min:15|max:15',
            'delivre_le' => 'required | date',
            'numero_personne_prevenir' => 'required|numeric|min:8|max:8',
            'ref_piece'=> 'required|min:8|max:15',
            'email_candidat' => 'required|string|email',
            'recepisse' => 'string',
            'telephone_paiement'=> 'min:8|max:8',
            'montant' => 'numeric',
            'code_otp' => 'numeric',
            'date_paiement'=> 'date',
            'message_paiement'=> 'string',
            'compte_marchant'=> 'min:4|max:13',
            'completed'=> 'boolean',
        ];
    }
}
