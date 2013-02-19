<?php 
	$_SESSION['timeout']=time();
	include 'verificacion.php';
?>
<html>
<head>
	<link rel="stylesheet" title="text/css" media="screen" href="Estilo.css">
	<title>uPdOWN--Subir Fotos</title>
</head>
<body>
	<center>
	<img alt="uPdOWN" src="titulo.png" align="top"/>
	<p>
		<?php
			echo "Bienvenido ".$_SESSION['usuario'];
		?>
	</p>
	<form action="fotoAgregada.php" method="post"  enctype="multipart/form-data">
		<table>
			<tr><td colspan="2"><h2>Subir fotografía</h2></td></tr>
			<tr>
				<td colspan="2"><input type="file" name="foto" value="seleccione fotografía" requiered = "required"/></td>
			</tr>
			<tr>
				<th>Describe la foto: </th><td> <textarea rows="2" cols="30" name="descripcion" requiered = "required"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Subir Foto"/></td>
			</tr>
		</table>
	</form>
	<form action="busqueda.php" method="post">
		<table>
			<tr><td colspan="2"><h2>Buscar fotografía</h2></td></tr>
			<tr><td colspan="2"><a href="busqueda.php?busqueda=mias">Ver todas mis fotografías en uPdOWN</a><br></td></tr>
			<tr>
				<th>Descripción de la foto</th>
				<td><input type="text" name="descripcion" requiered = "required"/></td>
			</tr>
			<tr><td colspan="2">Buscar solo en mis archivos<input type="checkbox" name = "smios" checked="checked"/></td></tr>
			<tr><td colspan="2"><input type="submit" value="Buscar"/></td></tr>
		</table>
	</form>
	<a href="busqueda.php?busqueda=todo">Ver todas las fotografías de uPdOWN</a><br>
	<a href="cerrar.php?">Cerrar Sesion</a>
	</center>
</body>
</html>