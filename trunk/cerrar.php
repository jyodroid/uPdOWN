<?php
	session_start();
if(isset($_SESSION['usuario']))
	unset($_SESSION['usuario']);
if(isset($_SESSION['error']))
	unset($_SESSION['error']);
if(isset($_SESSION['errorn']))
	unset($_SESSION['errorn']);
	session_destroy();
	header('location: Login.php');
?>
