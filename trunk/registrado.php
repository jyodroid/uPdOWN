<html>
<head>
	<link rel="stylesheet" style="text/css" media="screen" href="Estilo.css">
	<title>UpDown</title>
</head>
<body>
	<center>
		<img alt="uPdOWN" src="titulo.png" align="top">
		<?php
			session_start();
				try {
					if((strlen($_POST['usuario'])===0)||$_POST['usuario']===null){
						throw new Exception("No ha ingresado un nombre de usuario", 12);
					}
					if((strlen($_POST['contrasena'])<6)){
						throw new Exception("Contraseña menor de 6 caracteres", 13);
					}
					if((strlen($_POST['recontrasena'])===0)||$_POST['recontrasena']===null){
						throw new Exception("No ha ingresado confirmación de contraseña", 14);
					}
					if($_POST['contrasena']!=$_POST['recontrasena']){
						throw new Exception("Contraseña y confirmación no coinciden", 15);
					}
					
					// Se busca el nombre de usuario en la base de datos para que no se repita
					include 'conection.php';
					mysqli_select_db($conection, 'updown');
					$query = "select count(*) from usuarios where usuario ='".$_REQUEST['usuario']."'";
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
						if ($valor!=0){
							throw new Exception("Usuario ya en uso", 16) ;
						}
					}
					mysqli_free_result($resultado);
					
					//Registra el nuevo usuario
					$query = "insert into usuarios values ('".$_REQUEST['usuario']."', '".$_POST['contrasena']."')";
					if(!mysqli_query($conection, $query)){
						$en = mysqli_errno($conection);
						$et = mysqli_error($conection);
						mysql_close($conection);
						throw new Exception("Error de query 2, ".$en." :".$et, 9);
					}
					echo '<h1>Usuario '.$_REQUEST['usuario'].' agregado con éxito!</h1><br><a href="Login.php">Login</a>';
					mysqli_close($conection);
					
				}catch (Exception $e){
					$_SESSION['error']=$e->getMessage();
					$_SESSION['errorn']=$e->getCode();
					header('location: errores.php');
				}
			?>
		</center>
	</body>
</html>