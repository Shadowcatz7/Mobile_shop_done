<?php
include("controllers/c_post.php");

$c_post = new c_postC();
$post = $c_post->show();
?>
