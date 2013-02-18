<?php 
	include 'verificacioninicial.php';
?>
<html>
<head>
	<link rel="stylesheet" title="text/css" media="screen" href="Estilo.css">
	<title>uPdOWN--Subir Fotos</title>
</head>
<body>
	<center>
	<img alt="uPdOWN" src="titulo.png" align="top">
	<p>
		<?php
			echo $_POST["usuario"]." ".$_POST["contraseña"];
		?>
	</p>
	</center>
</body>
</html>