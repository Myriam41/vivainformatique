<?php
    
$imgHeader = '';
$pageTitle = '';
$subTitle = '';

// Page header little image
$imglittle = '';

$_SESSION['parentId']=$_SESSION['commentId'];

ob_start();?>

    <div class="bloccomments">
<?php
        require '../src/view/template/commentAdd.php';?>
    </div>
<?php

$content = ob_get_clean();

    require '../src/view/template/default.php';