<?php
session_start();

$_SESSION['name'];
$_SESSION['connect'] = 0;

require_once'../vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;
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
  
// Adding a post
if ($p === 'postAdd') {
    require '../src/View/postAddView.php';
  }

//administration
if ($p === 'admin') {
  require '../src/View/administrationView.php';
}

// Adding a comment

// Change a post

// Change a comment

// Identification

//Registration
if ($p === 'login') {
  require '../src/View/registrationView.php';
}


