<?php

foreach ($post as $article) {
    $imgHeader = '';
    $pageTitle = htmlspecialchars($article['title']);
    $subTitle = htmlspecialchars($article['introduction']);

    // Page header little image
    $imglittle = '';

    ob_start();
    //!-- Main Content --?>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <span class="post-meta">Posté par 
            <?= htmlspecialchars($article['pseudo']); ?> le 
            <?= htmlspecialchars($article['createdAt']); ?></span></br>

            <article> <?= htmlspecialchars($article['content']); ?></article>
        </div>
    </div>
    </div>

    <div class="bloccomments">
    <h3>commentaires</h3>
    <?php
    foreach($comments as $comment){?>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <span class="post-meta">Posté par 
                <?= htmlspecialchars($comment['pseudo']); ?> le 
                <?= htmlspecialchars($comment['createdAt']); ?></span></br>

                <article> <?= htmlspecialchars($comment['contmessage']); ?></article>
            </div>
        </div>
        <div class='row'>
        <?php if($_SESSION['status']='Administrateur'){
            require 'template/commentAdd.php';
        }
        else echo 'Pour réagir à l\'article, vous devez être enregistré et connecté';
        ?>
        </div>
    </div>

<?php
}
//à chaque message un lien pour afficher la possibilité de répondre.
//S'il n'y a pas de commentaires afficher la possibiliter d'en faire un si bons droits sinon afficher qu'il faut se connecter pour faire un commentaire.
}
$content = ob_get_clean();
require ('../src/view/template/default.php');