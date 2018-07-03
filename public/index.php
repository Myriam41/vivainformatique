<?php

require_once'../vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;

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

//sen message
if ($p === 'formHome') {
  $formController = new FormController();
  $formController->sendMessage();
  
  require '../src/View/homeView.php';

}
  
// Adding a post
if ($p === 'postAdd') {
    require '../src/View/postAddView.php';
  }

// Adding a comment

// Change a post

// Change a comment

// Identification

