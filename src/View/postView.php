<?php

foreach ($post as $article) {
    $imgHeader = '';
    $pageTitle = htmlspecialchars($article['title']);
    $subTitle = htmlspecialchars($article['introduction']);

    // Page header little image
    $imglittle = '';

    ob_start();
    print_r($post);

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
    </div>
<?php
}
$content = ob_get_clean();
require ('../src/view/template/default.php');