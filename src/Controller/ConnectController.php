<?php

namespace App\Controller;

use App\Repository\ConnectRepository;
use App\Entity\Log;

/**
 * Class ConnectController
 */

class ConnectController
{
    public function hach()
    {
        $pass_hache = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
        return $pass_hache;
    }

    public function existPseudo()
    {
        $user = NEW ConnectRepository();   
        $isAvailable = $user->getUser();

        // Si aucun pseudo existe alors création du nouvel utilisateur
        // intval retourne 0 si le tableau est vide et 1 s'il est rempli. Pas utilisable pour des objets.
        if(intval($isAvailable[0]) == 0)
        {
            $newUser = NEW ConnectRepository();
            $newUser->newUser();
            // faire valider l'email
        }

        else 
        {
            ?> <script> alert("Merci de choisir un autre pseudo")</script>
            <?php
        }
        
    }

    public function Login()
    {
        // search of the user and his password
        $connectRepository = NEW ConnectRepository;
        $user = $connectRepository->getUser();

        //récupérer la recherche en fonction du name et vérifier le password
        $isPasswordCorrect = password_verify($_SESSION['pass'], $user['pass']);

        if (!$user)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }

        else
        {
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['connect'] = 1;
                $login = new Log;
                $login->setStatus();
                $login->setConnect();  
            }

            else {
            echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

    public function offline()
    {
        // Suppression des variables de session et de la session
        $_SESSION = array();

        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
    }
}