<?php

namespace App\Util;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author 
 */
class Util extends Controller {

    public static $allowedExtensionsInArchive = [
        'JPEG', 'PDF', 'MP3', 'JPG', 'PNG',
        'GIF', 'FLV', 'AVI', 'BMP', 'MP4', 'ZIP', 'RAR'
    ];
    public static $forbiddenWordsInSearchEngine = [
        'le', 'la', 'les', 'des', 'de', 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
        'v', 'w', 'x', 'y', 'z', 'un', 'une', 'et', 'te'
    ];

    public static function getWordsForSearchEngine($search) {
        $words = [];
        $tokens = strtok($search, " ,+;.-/");
        while ($tokens != false) {
            if (in_array(trim($tokens), Util::$forbiddenWordsInSearchEngine)) {
                $tokens = strtok(" ,+;.-/:");
            } else {
                array_push($words, trim($tokens));
                $tokens = strtok(" ,+;.-/:");
            }
        }

        return $words;
    }

    public static function sendJsonResponse($success, $message, $reset, $url, $status, $errors = []
    , $data = []) {
        return new JsonResponse([
            'success' => $success,
            'message' => $message,
            'reset' => $reset,
            'url' => $url,
            'errors' => $errors,
            'data' => $data,
                ], $status);
    }

    public static function sendSuccessResponse($form, $message, $url = null, $reset = true, $data = []) {
        return self::sendJsonResponse(true, $message, $reset, $url, 200, [], $data);
    }

    public static function sendFailureResponse($form, $message, $url = null, $reset = false, $data = []) {
        $errors = [];
        if ($form != null) {
            $errors = self::getErrorsAsArray($form);
        }
        return self::sendJsonResponse(false, $message, $reset, $url, 422, $errors, $data);
    }

    public static function getErrorsAsArray($form) {
        $errors = [];
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }

        foreach ($form->all() as $key => $child) {
            if ($err = self::getErrorsAsArray($child)) {
                if (array_key_exists(0, $err)) {
                    $errors[$key] = $err[0];
                } else if (array_key_exists('first', $err)) {
                    $errors[$key] = $err['first'];
                } else {
                    $errors[$key] = $err;
                }
            }
        }
        return $errors;
    }

    public static function saveFile($formFile, $path, $fileName, $ext = null) {
        if ($ext == null) {
            $ext = $formFile->guessExtension();
        }
        $formFile->move($path, $fileName . '.' . $ext);
    }

    public static function removeFile($path, $fileName) {
        $realPath = realpath($path . '/' . $fileName);
        unlink($realPath);
    }

    public static function saveArchiveFile($formFile, $path, $archive, $fileEntity) {
        $path .= '/' . $archive->getId();
        $name = $archive->getId() . '_' . $fileEntity->getId();
        self::saveFile($formFile, $path, $name);
    }

    public static function removeArchiveFile($formFile, $path, $archive, $fileEntity) {
        $path .= '/' . $archive->getId();
        $name = $archive->getId() . '_' . $fileEntity->getId();
        self::saveFile($formFile, $path, $name);
    }

    public static function santizeForDt($html) {
        return htmlentities(str_replace(array("\r\n", "\n", "\r"), ' ', $html));
    }

    public static function santizeHTMLForDt($html) {
        return self::removeNonUtfCharacters(str_replace('"', "'", str_replace(array("\r\n", "\n", "\r"), ' ', $html)));
    }

    public static function removeNonUtfCharacters($string) {
        return preg_replace('/[\x00-\x1F\x7F]/u', '', $string);
    }

    public static function getRoleString($controller) {
        $authChecker = $controller->container->get('security.authorization_checker');
        $roles = ['ROLE_ADMIN', 'ROLE_ADMIN_ARCHIVE', 'ROLE_TRAITEMENT', 'ROLE_UTIL_EXTERNE'];

        foreach ($roles as $role) {

            if ($authChecker->isGranted($role)) {
                return $role;
            }
        }
    }

    public static function getUserRoleAsString($user) {
        $roles = ['ROLE_ADMIN', 'ROLE_ADMIN_ARCHIVE', 'ROLE_TRAITEMENT', 'ROLE_UTIL_EXTERNE'];

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $role;
            }
        }
    }
    
    /*
     * Prends deux dates en paramètres, une date de début et une date de fin,
     *  pour la date de début elle ajoute 00:00:00
     * et 23:59:59 pour la date de fin, celà est utile pour les filtres
     * Le fonction prends des références (des pointeurs quoi!)
     *  donc elle modifie bien les variables qu'elles reçoit et pas juste des
     * copies locales
     */
    
    public static function updateDatesForFilter(&$beginDate , &$endDate) {
        if($beginDate) {
            $beginDate .= ' 00:00:00';
        }
        
        if($endDate) {
            $endDate .= ' 23:59:59';
        }
    }

    public static function getPublicPath($controller) {
       // return $controller->get('Kernel')->getRootDir() . '/../web';
    }
}
