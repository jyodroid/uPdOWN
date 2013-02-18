<?php 
session_start();
$inactive = 600;
$session_life =  time() - $_SESSION['timeout'];
$_SESSION['timeout']=time();
?>
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
	switch ($_SESSION['errorn']) {
		case 1:
		case 9:
			echo
			'<h1 align="center" >'.$_SESSION['error'].'</h1>
		<br><h2 align="center">por favor informe al administrador del sistema<h2>';
			session_destroy();
			break;
		case 2:
			echo
			'<h1 align="center">'.$_SESSION['error'].'</h1>';
			echo
			'<center><a href="Login.php">Ingresar</a></center>';
			break;
		case 4:
			echo
			'<h1 align="center" style="color: red; background: white;">'.$_SESSION['error'].'</h1>';
			echo
			'<center><a href="Login.php">Ingresar de nuevo</a></center>';
			session_destroy();
			break;
		case 15:
			echo
			'<h1 align="center" style="color: red; background: white;">'.$_SESSION['error'].'</h1>
				<h3 align="center" style="color: blue; vertical-align: bottom;">
				<a href="javascript:history.go(-1);">Volver</a>
				</h3>';
			break;

		default:
			echo
			'<h1 align="center" style="color: red; background: white;">'.$_SESSION['error'].'</h1>
					<h3 align="center" style="color: blue; vertical-align: bottom;">
					<a href="javascript:history.go(-1);">Volver</a>
					</h3>';
			break;
	}
	?>
</body>
</html>
