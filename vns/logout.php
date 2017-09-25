<?php
session_start();
unset($_SESSION["uname"]);
unset($_SESSION["pwd"]);
unset($_SESSION["utype"]);
$_SESSION["uname"]='';
$_SESSION["pwd"]='';
$_SESSION["utype"]='';
//$_SESSION["var"]='';
header("location: index.php");
?>