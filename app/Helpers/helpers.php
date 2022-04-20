
<?php

use App\Models\Demande;
use App\Models\User;
use App\Models\Theme;
use App\Models\Valeur;
use App\Models\Direction;

/* ********************************************************************
     * DEMBELE
     * recuperer le libelle d'une valeur en fonction de son Id
     *
***********************************************************************/

if (!function_exists('getValeur')) {
    function getValeur($id)
    {
        $record = Valeur::where('id', $id)->first();
        if ($record != null) {
            return $record['valeur'];
        } else {
            return '';
        }
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer le libelle de la direction en fonction de son id
     *
***********************************************************************/

if (!function_exists('getDirection')) {
    function getDirection($id)
    {
        $record = Direction::where('id', $id)->first();
        if ($record != null) {
            return $record['libelle_court'];
        } else {
            return '';
        }
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer le libelle du thème en fonction de son id
     *
***********************************************************************/

if (!function_exists('getTheme')) {
    function getTheme($id)
    {
        $record = Theme::where('id', $id)->first();
        if ($record != null) {
            return $record['libelle'];
        } else {
            return '';
        }
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer le domaine de la direction en fonction de son id
     *
***********************************************************************/

if (!function_exists('getDomaine')) {
    function getDomaine($id)
    {
        $record = Direction::where('id', $id)->first();
        if ($record != null) {
            return $record['domaine'];
        } else {
            return '';
        }
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer le nombre de demande en attente
     *
***********************************************************************/

if (!function_exists('getStageAttente')) {
    function getStageAttente()
    {
        $stageattente = Demande::where('demandes.supprimer', '=', 0)
                        ->where('demandes.etat', '=', 8)
                        ->where('demandes.type_demande', '=', 6)
                        ->get()->count();
        if ($stageattente != null) {
            return $stageattente;
        } else {
            return 0;
        }
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer le nom et le prenom du demandeur
     *
***********************************************************************/

// if (!function_exists('getInfoDemandeur')) {
//     function getInfoDemandeur($code)
//     {
//         $demandeur = User::join('demandes', 'demandes.id', '=', 'demande_users.demande_id')
//                         ->join('demande_users', 'demande_users.demande_id', '=', 'users.id')
//                         ->where('demandes.code', $code)
//                         ->get('demandes.nom');
//         if ($demandeur != null) {
//             return $demandeur;
//         } else {
//             return 0;
//         }
//     }
// }

if (!function_exists('getRoleUser')) {
    function getRoleUser($id)
    {
        $user = User::all()->find($id);
        $roleUser = $user->roles()->first();

        return  $roleUser['nom'];
    }
}

if (!function_exists('getPermission')) {
    function getPermission($user, $p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }

        return false;
    }
}
