<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\PostRepository;
use App\Entity\User;

/**
 * Class UserController
 */

class AdminController
{
    /**
     * function display all users
     */
    public function displayUsers(){
        $userRepo= new UserRepository();
        
        $postRepo= new PostRepository();
        $users = $userRepo->getAllUsers();
        $posts=$postRepo->getAllPosts();
        require '../src/View/administrationView.php';

    }

    public function displayPosts(){
        $postRepo= new PostRepository();
        $posts=$postRepo->getAllPosts();
        require '../src/View/administrationView.php';

    }

}
