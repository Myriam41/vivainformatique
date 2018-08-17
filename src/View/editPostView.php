<?php
foreach ($post as $data) {
    $imgHeader = '';
    $pageTitle = htmlspecialchars($data['title']);
    $subTitle = htmlspecialchars($data['introduction']);

    // Page header little image
    $imglittle = '';

    ob_start(); ?>
    <div class="bloccomments">  
    <form action="index.php?page=postEdit&id=<?=$_SESSION['postId']; ?>" method="post" class="col-lg-10">
        <legend>Modifier mon article</legend>
        <fieldset>
            <div class="form group">  
                <label for "content">Titre: </label>
                <textarea id="title" name="title" class="form-control" rows="1" cols="50">
                    <?= $data['title']; ?>
                </textarea> 
            </div>

            <div class="form group">  
                <label for "introduction">chapo : </label>
                <textarea id="introduction" name="introduction" class="form-control" rows="1" cols="50">
                    <?= $data['introduction']; ?>
                </textarea> 
            </div>

            <div class="form group">  
                <label for "content">Article : </label>
                <textarea id="content" name="content" class="form-control" rows="4" cols="50">
                    <?= $data['content']; ?>
                </textarea> 
            </div>
<?php
}?>
    </br>
        <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
        </div>
        </fieldset>
    </form>
    </div>
<?php

$content = ob_get_clean();

    require '../src/view/template/default.php';
