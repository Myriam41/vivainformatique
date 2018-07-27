<?php

    $_SESSION['postId' ]= $article['postId'];

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