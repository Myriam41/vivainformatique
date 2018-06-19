<?php

$imgHeader = 'img/chouette_vol_640x420.png';
$pageTitle = 'Développez votre avenir';
$subTitle = 'Un développeur pour vous aider';

// Page header little image
$imglittle = '<img src="img/myr2.jpg"  alt="Photo du développeur"/>';

ob_start();?>

<div class = "container">
    <div class = "row">
        <div class = "col-lg-2 col-md-2">
            <img src = "img/logo_Viva_technologie.png" alt="logo Viva Technologie"/>
        </div>

        <div class = "col-lg-8 col-md-8">
            <p> Un supertexte introductif à inventer </p>
        </div>
        <div class = "col-lg-2 col-md-2">
            <p><a class="nav-link" href="index.php?page=postList">Articles</a></p>
        </div>
    </div>
</div>

<?php

$content = ob_get_clean();

require ('src/View/template/default.php');