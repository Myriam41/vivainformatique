<?php

$imgHeader = '../img/chouette_vol_640x420.png';
$pageTitle = 'Ecrire';
$subTitle = 'partager ses connaisances';

// Page header little image
$imglittle = '';

ob_start();?>

  <!-- Main Content -->
  <div class="well">
  <form cible="Index.php?action=addpost" action="post" class="col-lg-10">
    <legend>Ecrire un nouvel article</legend>
    <fieldset>
      <div class="form group">
        <label for "title">Titre : </label>
        <input id="title" name="title" type="text" class="form-control" placeholder="Titre" required data-validation-required-message="Merci de donner un titre.">
      </div>
      <div class="form group">   
        <label for "intro">Introduction : </label>
        <input id="intro" name="introduction" type="text" class="form-control" placeholder="Introduction" required data-validation-required-message="Merci d'écrire une introduction.">
      </div>
      <div class="form group">  
        <label for "content">Texte : </label>
        <textaera id="content" name="content" type="textaera" class="form-control" placeholder="texte" rows="50" required data-validation-required-message="Merci d'entrer un contenu."> </textaera>
      </div>
</br>
      <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
      </div>
  </fieldset>
    </form>
  </div>

<?php

$content = ob_get_clean();

require ('../src/View/template/default.php');