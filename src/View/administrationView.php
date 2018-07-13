<?php

$imgHeader = '../img/chouette_vol_640x420.png';
$pageTitle = 'Développez votre avenir';
$subTitle = 'Myriam Stampers';

// Page header little image
$imglittle = '';

ob_start();

echo"ma page admin";

$content = ob_get_clean();

require ('../src/View/template/default.php');

