<html>
<head>
	<link rel="stylesheet" style="text/css" media="screen" href="Estilo.css">
	<title>UpDown</title>
</head>
<body>
	<center>
	<img alt="uPdOWN" src="titulo.png" align="top">
	<h1>Nuevo usuario</h1>
		<form action="subirFotos.php" method="post">
				<table border="0">
					<tr>	
						<th>Nombre</th><td><input type ="text" name="nombre"/></td>
					</tr>
					<tr>
						<th>usuario</th><td><input type="text" name="usuario"/> 
					</tr>
					<tr>
						<th>contraseña</th><td><input type="password" name="contraseña"/> 
					</tr>
					<tr>
						<th>Repita Contraseña</th><td><input type="password" name="recontraseña"/> 
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Registrar"/></td> 
					</tr>
				</table>
		</form>
	</center>
</body>
</html>