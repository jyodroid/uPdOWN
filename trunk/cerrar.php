<?php
	session_start();
if(isset($_SESSION['usuario']))
	unset($_SESSION['usuario']);
if(isset($_SESSION['error']))
	unset($_SESSION['error']);
if(isset($_SESSION['errorn']))
	unset($_SESSION['errorn']);
	header('location: Login.php');
?>
