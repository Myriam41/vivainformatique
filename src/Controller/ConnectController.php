<?php

namespace App\Controller;

/**
 * Class ConnectController
 */

class ConnectController
{
    public function hach()
    {
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }

    public function verifPass()
    {
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }

        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;

                echo 'Vous êtes connecté !';
            }

            else {
            echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

    public function deconnect()
    {
        // Suppression des variables de session et de la session
        $_SESSION = array();

        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
    }

    public function login()
    {

    }
}