<?php

$imgHeader = '';
$pageTitle = htmlspecialchars($post->getTitle());
$subTitle = htmlspecialchars($post->getIntroduction());

// Page header little image
$imglittle = '';

ob_start();

//!-- Main Content --
?>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <span class="post-meta">Posté par 
            <?= htmlspecialchars($author->getName()); ?> le 
            <?= htmlspecialchars($post->getCreatedAt()); ?></span></br>

            <article> <?= htmlspecialchars($post->getContent()); ?></article>
        </div>

        </div>
    </div>
    </div>
<?php

$content = ob_get_clean();
require ('../src/view/template/default.php');