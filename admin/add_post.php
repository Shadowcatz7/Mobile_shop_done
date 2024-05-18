<?php
include ("check_login.php");
include("controllers/c_post.php");
$post = new c_post();
$post->create();
?>