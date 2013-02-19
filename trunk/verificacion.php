<?php
session_start();
$inactive = 600;
$session_life =  time() - $_SESSION['timeout'];
try {
	if((strlen($_SESSION['usuario'])===0)||$_SESSION['usuario']===null){
		throw new Exception("No ha ingresado al sistema", 2);
	}
	if($session_life > $inactive){
		$_SESSION['usuario']=null;
		throw new Exception("Mas de 10 minutos inactivo, por favor ingrese de nuevo", 4);
	}
}catch (Exception $e){
	$_SESSION['error']=$e->getMessage();
	$_SESSION['errorn']=$e->getCode();
	header('location: errores.php');
}