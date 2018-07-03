<?php

$imgHeader = '../img/chouette_vol_640x420.png';
$pageTitle = 'Développez votre avenir';
$subTitle = 'Myriam Stampers';

// Page header little image
$imglittle = '';

ob_start();?>

<div class = "container-fluid">
    <div class = "row">
        <div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
               <a class="nav-link" target="_blank" href="../doc/cv 2018 informatique.pdf">Mon CV</a>
               <img src="../img/myr2.jpg"  alt="Photo du développeur"/>
               <a class="nav-link" href="index.php?page=postList">Articles</a>
        </div>

        <form class = "col-lg-8 col-md-8 col-sm-12 col-xs-12" method="post" action="index.php?page=formHome" onsubmit="votre message a bien été envoyé. Nous vous contacterons rapidement">
            <legend> Un projet ? une question ? Envoyez-moi un message </legend>
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">email :</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <input type="text" name="message" id="message" class="form-control">
                </div>

                <button type="submit">Envoyer</button>
        </form>

    </div>
</div>

<?php

$content = ob_get_clean();

require ('../src/View/template/default.php');