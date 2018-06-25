<?php

$imgHeader = '../img/chouette_vol_640x420.png';
$pageTitle = '';
$subTitle = 'Hier, Aujourd\'hui, Demain';

// Page header little image
$imglittle = '';

ob_start();

?>
<p><a class="nav-link" href="index.php?page=postAdd">Ajouter un article</a></p>
<?php
//!-- Main Content last 10 posts--
foreach($posts as $post){?>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <a href="index.php?id=<?= $post->getId()?>&amp;page=post">
            <h2 class="post-title">
                <?= htmlspecialchars($post->getTitle()); ?>
            </h2>
            <h3 class="post-subtitle">
                <?= htmlspecialchars($post->getIntroduction());?>
            </h3>
            </a>
            <span class="post-meta">Posté par 
            <?= htmlspecialchars($post->getAuthor()); ?> le 
            <?= htmlspecialchars($post->getCreatedAt()); ?></span></br>

            <article> <?= htmlspecialchars($post->getContent()); ?></article>
        </div>

        </div>
    </div>
    </div>

<?php
}

$content = ob_get_clean();

require ('../src/View/template/default.php');