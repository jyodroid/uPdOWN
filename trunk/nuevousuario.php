<html>
<head>
	<link rel="stylesheet" style="text/css" media="screen" href="Estilo.css">
	<title>UpDown</title>
</head>
<body>
	<center>
	<img alt="uPdOWN" src="titulo.png" align="top">
	<h1>Nuevo usuario</h1>
		<form action="registrado.php" method="post">
				<table border="0">
					<tr>
						<th>usuario</th><td><input type="text" name="usuario"/> 
					</tr>
					<tr>
						<th>contraseña</th><td><input type="password" name="contrasena"/> 
					</tr>
					<tr>
						<th>Repita Contraseña</th><td><input type="password" name="recontrasena"/> 
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Registrar"/></td> 
					</tr>
				</table>
		</form>
		<a href="javascript:history.go(-1);">Volver</a>
	</center>
</body>
</html>