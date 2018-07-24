<?php

namespace App\Controller;

use App\Repository\CommentRepository;

/**
 * Class CommentController
 */

class CommentController
{
    public function commentsPost()
    {
        $dispComment = NEW CommentRepository();   
        $comments = $dispComment->getCommentsPost();    
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
            }

            else {
            echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
}