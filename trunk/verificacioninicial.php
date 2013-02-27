<?php
session_start();
$_SESSION['timeout']=time();
try {
	if ((strlen($_REQUEST['usuario'])!=0)||(strlen($_REQUEST['usuario'])!=NULL)) {
		include 'conection.php';
		$_SESSION['myRequest']=8;
		include 'consultas.php';
		$resultado = mysqli_query($conection, $_SESSION['query']);
		if($resultado==false){
			$en = mysqli_errno($conection);
			$et = mysqli_error($conection);
			mysqli_close($conection);
			throw new Exception("Error de query 1: verfificacioninicial, ".$en." :".$et, 1);
		}
		mysqli_use_result($conection);
		$dato = mysqli_fetch_array($resultado);
		foreach ($dato as $valor) {
			if ($valor!=1){
				throw new Exception("Usuario y contraseña inválidos", 2) ;
			}
		}
		$_SESSION['usuario'] = $_REQUEST['usuario'];
		mysqli_free_result($resultado);
		mysqli_close($conection);
		header('location: subirFotos.php');
	}else{
		throw new Exception("Credenciales no ingresadas", 3) ;
	}
}catch (Exception $e){
	$_SESSION['error']=$e->getMessage();
	$_SESSION['errorn']=$e->getCode();
	header('location: errores.php');
}
?>