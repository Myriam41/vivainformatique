<?php
session_start();

require_once '../vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;
use App\Controller\ConnectController;
use App\Controller\CommentController;
use App\Entity\Log;

$_SESSION['connect'] = Log::getConnect();  
$_SESSION['status'] = Log::getStatus();

// Default opening : homeView.php
if (isset($_GET['page'])) {
    $p = $_GET['page'];
} 
else {
    $p = 'home';
}

// Routes
// Home
if ($p === 'home') {
  require '../src/View/homeView.php';
}

//_______________POSTS__________________
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

// Display postAddView
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
// Change a post

//________________CONTACT_________________
//contact
if ($p === 'contact') {
  require '../src/View/contactView.php';
}

//________________FORMS___________________
//send message
if ($p === 'formHome') {
  $formController = new FormController();
  $formController->sendMessage();
  require '../src/View/homeView.php';
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
  $verifPseudo->Login();
  require '../src/View/homeView.php';
}

//Registration
if ($p === 'formAddUser') {
    //Data reception
    $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
    $_SESSION['pass'] = htmlspecialchars($_POST['pass']);
    $_SESSION['email']= htmlspecialchars($_POST['email']);
    $_SESSION['confPass'] = htmlspecialchars($_POST['confPass']);

    //Vérifier qu'aucun champs est vide
    if (!$_SESSION['pseudo']) {
        ?> <script> alert("Merci de renseigner votre pseudonime")</script>
  <?php
    }

    if (!$_SESSION['pass']) {
        ?> <script> alert("Merci de renseigner votre mot de passe")</script>
  <?php
    }

    if (!$_SESSION['email']) {
        ?> <script> alert("Merci de renseigner votre e-mail")</script>
  <?php
    }

    if (!$_SESSION['confPass']) {
        ?> <script> alert("Merci de confirmer votre mot de passe")</script>
  <?php
    }

    //si les mots de passes sont identiques
    if ($_SESSION['pass'] === $_SESSION['confPass']) {
        //data processing
        $pass_hache= new ConnectController();
        $_SESSION['pass']=$pass_hache->hach();

        // Verification of the free pseudo. If ok add new user
        $existPseudo= new ConnectController();
        $existPseudo->existPseudo();

        require '../src/View/homeView.php';
    } else {
        echo 'Les deux mots de passes sont différents';
    }
}

//________________LOG AND STATUS___________________
//administration
if ($p === 'admin') {
  require '../src/View/administrationView.php';
}

// Identification
if ($p === 'login') {
  $_SESSION['connect'] = Log::getConnect();
  
  if($_SESSION['connect'] === 0)
  {
    require '../src/View/registrationView.php';
  }
  
  if($_SESSION['connect'] === 1)
  { session_destroy();
    ?> <script>alert('Vous êtes déconnecté')</script> <?php
    require '../src/View/home.php';
  
  }

  else {
    echo 'essaye encore une fois';
  } 
}
//________________COMMENTS________________


// penser un envoyer un message pour vérifier que l'email est valide


// Adding a comment



// Change a comment
