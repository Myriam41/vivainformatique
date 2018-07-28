<?php
session_start();

require_once '../vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;
use App\Controller\ConnectController;
use App\Controller\CommentController;
use App\Controller\AdminController;

$_SESSION['status'];
if(!isset($_SESSION['status'])){
  $_SESSION['status']=0;
}

$_SESSION['connect'];
if(!isset($_SESSION['connect'])){
  $_SESSION['connect']=0;
}

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
  $_SESSION['postId'] = $_GET['id'];
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
  if($_SESSION['connect'] === 1)
  {     session_destroy();
    $_SESSION['connect'] = 0;
    require '../src/View/homeView.php';
    ?> <script>alert('Vous êtes déconnecté')</script> <?php
    
  }
  else
  {
    require '../src/View/registrationView.php';
  }
}

//_______________ADMIN__________________
// display admin gestion
if ($p === 'admin') {
  $adminController = new AdminController();
  $adminController->displayUsers();
}
//________________COMMENTS________________
// Adding a comment
if ($p === 'commentAdd') {

  $_SESSION['contmessage']=$_POST['contmessage'];
  $commentController = new CommentController();
  $commentController->commentAdd();

  $contArticle = new PostController();
  $contArticle->post();
}

// reply comment
if ($p === 'reply_comment') {
  require '../src/View/replyCommentView.php';

  $contArticle = new PostController();
  $contArticle->post();
}

// edit comment
if ($p === 'edit_comment') {
//récupère id du comment et id du user.
//vérification autorisation de modifier
//ouvre page de modification à défaut de savoir commment écrire directement sur la page
//revenir sur la page de l'article
}

// delete comment
if ($p === 'delete_comment') {
//récupère id du comment et id du user.*
//véridication autorisation à deleter
//delete
//revenir sur la page de l'article
}




// penser un envoyer un message pour vérifier que l'email est valide