<?php 
session_start();
unset($_SESSION["s_usuario"]);
header("location:login.php");



?>