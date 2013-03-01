<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Error</title>
	<link rel="stylesheet" style="text/css" media="screen" href="Estilo.css">
</head>
	<body class="diybackground">
		<center><img alt="uPdOWN" src="titulo.png" align="top"></center>
		<?php
		session_start();
		if(isset($_SESSION['error'])===false){
			die ('<h1 align = "center">Página no disponible</h1>');
		}
		$mensaje = $_SESSION['error'];
		$nerror = $_SESSION['errorn'];
		if(isset($_SESSION['error']))
			unset($_SESSION['error']);
		if(isset($_SESSION['errorn']))
			unset($_SESSION['errorn']);
		switch ($nerror) {
			//Errores relacionados con el funcionamiento de la página
			case 1:
			case 4:
				echo
				'<h1 align="center" >'.$mensaje.'</h1><br>
				<h2 align="center">por favor informe al administrador del sistema<h2><br>
				<center><a href="cerrar.php">cerrar</a></center>';
				break;
			//Errores relacionados a la no autenticación
			case 2:
			case 3:
			case 6:
				echo
				'<h1 align="center" style="color: red; background: white;">'.$mensaje.'</h1>
						<center><a href="Login.php">Ingresar</a></center>';
				break;
			//Error relacionado al tiemout de la sesión
			case 5:
				echo
				'<h1 align="center" style="color: red; background: white;">'.$mensaje.'</h1>
							<center><a href="Login.php">Ingresar de nuevo</a></center>';
				break;
			//Errores que puden permitir regresar a la página anterior
			case 7:
				echo
				'<h1 align="center" style="color: red; background: white;">'.$mensaje.'</h1>
					<h3 align="center" style="color: blue; vertical-align: bottom;">
					<a href="javascript:history.go(-1);">Volver</a>
					</h3>';
				break;
	
			default:
				echo
				'<h1 align="center" style="color: red; background: white;">'.$mensaje.'</h1>
						<h3 align="center" style="color: blue; vertical-align: bottom;">
						<a href="javascript:history.go(-1);">Volver</a>
						</h3>';
				break;
		}
		?>
	</body>
</html>
