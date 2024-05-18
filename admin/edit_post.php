<?php
include ("check_login.php");
include('controllers/c_post.php');
$banner = new c_post();
$banner->edit();
?>