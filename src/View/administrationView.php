<?php

$imgHeader = '';
$pageTitle = '';
$subTitle = 'Coin administration';

// Page header little image
$imglittle = '';

ob_start();?> 
    <div class='container'>
    <!--liste des utilisateurs affichant leur nom, ey statut et date enregistrement-->
        <div class='row'>
            <?= "liste des utilisateurs pour l'attribution des status";?><br/>

            <?php
            foreach($users as $user){
                echo $user['pseudo'];
            }?>
        </div>

    <!--liste des articles affichant leur contenu, date, status validation-->
        <div class='row'>
            <?="liste des articles pour validation";?><br/>

            <?php
            foreach($posts as $post){
                echo $post['title'];
            }?>        
        </div>

    <!--Liste des statuts.-->
        <div class='row'>
            <?="liste des status pour création";?>
        </div>
<?php
$content = ob_get_clean();

require ('../src/View/template/default.php');

