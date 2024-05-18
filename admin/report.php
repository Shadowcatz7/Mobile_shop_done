<?php
include ("check_login.php");
include_once "controllers/c_report.php";
$report = new c_report();
$report->index();
?>