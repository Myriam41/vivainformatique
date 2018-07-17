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
  $postId = $_GET['id'];
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
  
// Display pospostAddView
if ($p === 'postNew') {
  require '../src/View/postAddView.php';
}

//administration
if ($p === 'admin') {
  require '../src/View/administrationView.php';
}

// Identification
if ($p === 'login') {
  if($_SESSION['connect'] = 0)
  {
    require '../src/View/registrationView.php';
  }
  
  if($_SESSION['connect'] = 1)
  {
    $_SESSION['connect'] = 0;
  }
}

// Identification
if ($p === 'formLogin') {
  //Data reception
  $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
  $_SESSION['pass'] = htmlspecialchars($_POST['pass']);

  //Vérifier qu'aucun champs est vide
  if(!$_SESSION['pseudo'])
  {
    ?> <script> alert("Merci de renseigner votre pseudonime")</script>
    <?php
  }
  
  if(!$_SESSION['pass'])
  {
    ?> <script> alert("Merci de renseigner votre mot de passe")</script>
    <?php
  }

  //vérification du pseudo et du mot de passe et passage en mode connecté
  $verifPseudo= new ConnectController();
  $verifPseudo->verifPseudo();

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
    ?> <script> alert("Merci de renseigner votre pseudonime")</script>
    <?php
  }
  
  if(!$_SESSION['pass'])
  {
    ?> <script> alert("Merci de renseigner votre mot de passe")</script>
    <?php
  }

  if(!$_SESSION['email'])
  {
    ?> <script> alert("Merci de renseigner votre e-mail")</script>
    <?php
  }

  if(!$_SESSION['confPass'])
  {
    ?> <script> alert("Merci de confirmer votre mot de passe")</script>
    <?php
  }

  //si les mots de passes sont identiques
  if ($_SESSION['pass'] === $_SESSION['confPass'] ) {
      //data processing
      $pass_hache= new ConnectController();
      $pass_hache->hach();

      // Verification of the free pseudo. If ok add new user
      $verifPseudo= new ConnectController();
      $verifPseudo->verifPseudo();

      $_SESSION['pass']=$pass_hache;
  }

  else
  {
    echo 'Les deux mots de passes sont différents';
  }

// penser un envoyer un message pour vérifier que l'email est valide


// Adding a comment

// Change a post

// Change a comment

}



