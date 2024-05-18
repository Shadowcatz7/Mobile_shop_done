<?php
include("controllers/c_post.php");
include ("check_login.php");
$post = new c_post();
$post->index();
?>