<?php
session_start();

$_SESSION['connect'] = 0;

require_once'../vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;
use App\Controller\ConnectController;
use App\Entity\Log;

// Default opening : homeView.php
if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 'home';
}

// Routes
// Home
if ($p === 'home') {
  require '../src/View/homeView.php';
}

// List of posts

if ($p === 'postList') {
  $postController = new PostController();
  $postController->listPosts();
}

// One post
if ($p === 'post') {
    $contArticle = new PostController();
    $contArticle->post();
}

//contact
if ($p === 'contact') {
    require '../src/View/contactView.php';
  }

//send message
if ($p === 'formHome') {
  $formController = new FormController();
  $formController->sendMessage();
  
  require '../src/View/homeView.php';

}
  
// Display pospostAddView
if ($p === 'postNew') {
    require '../src/View/postAddView.php';
  }

// Add Post
if ($p === 'postAdd') {
  $_SESSION['title'] = $_POST['title'];
  $_SESSION['introduction'] = $_POST['introduction'];
  $_SESSION['content'] = $_POST['content'];
  $_SESSION['userId']= 1;

  $newPost = new PostController;
  $newPost->newPost();
  require '../src/View/postListView.php';
}

//administration
if ($p === 'admin') {
  require '../src/View/administrationView.php';
}

// Adding a comment

// Change a post

// Change a comment

// Identification
if ($p === 'login') {
  require '../src/View/registrationView.php';
}

// Identification
if ($p === 'formLogin') {
  

}

//Registration
if ($p === 'formAddUser') {
  //Data reception
  $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
  $_SESSION['pass'] = htmlspecialchars($_POST['pass']);
  $_SESSION['email']= htmlspecialchars($_POST['email']);
  $_SESSION['confPass'] = htmlspecialchars($_POST['confPass']);
  
  //Vérifier qu'aucun champs est vide
  if(!$_SESSION['pseudo'])
  {
    echo 'Merci de renseigner votre pseudonime';
  }
  
  if(!$_SESSION['pass'])
  {
    echo 'Merci de renseigner votre mot de passe';
  }

  if(!$_SESSION['email'])
  {
    echo 'Merci de renseigner votre e-mail';
  }

  if(!$_SESSION['confPass'])
  {
    echo 'Merci de confirmer votre mot de passe';
  }

  //si les mots de passes sont identiques
  if ($_SESSION['pass'] === $_SESSION['confPass'] ) {
      //data processing
      $pass_hache= new ConnectController();
      $pass_hache->hach();
      $verifPseudo= new ConnectController();
      $verifPseudo->verifPseudo();

      $_SESSION['pass']=$pass_hache;
  }

  else
  {
    echo 'Les deux mots de passes sont différents';
  }

// penser un envoyer un message pour vérifier que l'email est valide


}



