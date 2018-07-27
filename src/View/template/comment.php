<?php

foreach ($comments as $comment) {
?>
            <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <span class="post-meta">Posté par 
                <?= htmlspecialchars($comment['pseudo']); ?> le 
                <?= htmlspecialchars($comment['createdAt']); ?></span></br>

            <article> <?= htmlspecialchars($comment['contmessage']); ?></article>
            </div>
                <ul class='comment-button'>
                    <li class="nav-comment">
                        <a class="nav-link" href="index.php?page=reply_comment">Répondre</a>
                    </li>
                    <li class="nav-comment">
                        <a class="nav-link" href="index.php?page=edit_comment">Modifier</a>
                    </li>
                    <li class="nav-comment">
                        <a class="nav-link" href="index.php?page=delete_comment">Supprimer</a>
                    </li>
                </ul>
            </div>
            </div>
            </div>
            </div>
            <br/>
<?php
}