<?php
session_start();
$inactive = 600;
$session_life =  time() - $_SESSION['timeout'];
$_SESSION['timeout']=time();
try {
	if (strlen($_REQUEST['usuario'])!=0) {
		include 'conection.php';
		mysqli_select_db($conection, 'updown');
		$query = "select count(*) from usuarios where usuario ='".$_REQUEST['usuario']."' and contrasena ='".$_REQUEST['contrasena']."'";
		$resultado = mysqli_query($conection, $query);
		if($resultado==false){
			$en = mysqli_errno($conection);
			$et = mysqli_error($conection);
			mysqli_close($conection);
			throw new Exception("Error de query 1, ".$en." :".$et, 9);
		}
		mysqli_use_result($conection);
		$dato = mysqli_fetch_array($resultado);
		foreach ($dato as $valor) {
			if ($valor!=1){
				throw new Exception("Usuario y contraseña inválidos", 5) ;
			}
		}
		$_SESSION['usuario'] = $_REQUEST['usuario'];
		mysqli_free_result($resultado);
		mysqli_close($conection);
	}
	if((strlen($_SESSION['usuario'])===0)||$_SESSION['usuario']===null){
		$_SESSION['usuario']=null;
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
?>