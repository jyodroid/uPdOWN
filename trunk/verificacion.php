<?php
session_start();
$inactive = 600;
$session_life =  time() - $_SESSION['timeout'];
try {
	if((strlen($_SESSION['usuario'])===0)||$_SESSION['usuario']===null){
		throw new Exception("No ha ingresado al sistema", 6);
	}
	if($session_life > $inactive){
		if(isset($_SESSION['usuario']))
	unset($_SESSION['usuario']);
		throw new Exception("Mas de 10 minutos inactivo, por favor ingrese de nuevo", 5);
	}
}catch (Exception $e){
	$_SESSION['error']=$e->getMessage();
	$_SESSION['errorn']=$e->getCode();
	header('location: errores.php');
}