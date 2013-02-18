<html>
<head>
	<link rel="stylesheet" style="text/css" media="screen" href="Estilo.css">
	<title>UpDown</title>
</head>
<body>
	<center>
	<img alt="uPdOWN" src="titulo.png" align="top">
	<h1>Ingreso de usuario</h1>
		<form action="subirFotos.php" method="post">
				<table border="0">
					<tr>	
						<th>Usuario</th><td><input type ="text" name="usuario"/></td>
					</tr>
					<tr>
						<th>Constraseña</th><td><input type="password" name="contrasena"/> 
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Ingresar"/></td> 
					</tr>
				</table>
		</form>
		<a href="nuevousuario.php">Nuevo usuario</a>
	</center>
</body>
</html>