<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" title="text/css" media="screen" href="Estilo.css">
		<title>uPdOWN--Fotos</title>
	</head>
	<body>
		<center>
		<img alt="uPdOWN" src="titulo.png" align="top"/>
		<?php
			if (strcmp($_GET['busqueda'], 'todo')===0){
				$_SESSION['myRequest']=4;
			}
			if (strcmp($_GET['busqueda'], 'mias')===0){
				include 'verificacion.php';
				$_SESSION['timeout']=time();
				$_SESSION['myRequest']=5;
			}
			if (($_POST['descripcion']!=null)||(strlen($_POST['descripcion'])!=0)){
				include 'verificacion.php';
				$_SESSION['timeout']=time();
				if (strcmp($_POST['smios'], 'on')===0) {
					$_SESSION['myRequest']=6;
				}else{
					$_SESSION['myRequest']=7;
				}
			}
			try {
				include 'conection.php';
				include 'consultas.php';
				$resultado = mysqli_query($conection, $_SESSION['query']);
				if($resultado==false){
					$en = mysqli_errno($conection);
					$et = mysqli_error($conection);
					mysqli_close($conection);
					throw new Exception("Error de query 1: busqueda , ".$en." :".$et, 1);
				}
				if(mysqli_num_rows($resultado)===0){
					throw new Exception("No se obtuvieron resultados relacionados", 7);
				}
			} catch (Exception $e) {
				$_SESSION['error']=$e->getMessage();
				$_SESSION['errorn']=$e->getCode();
				header('location: errores.php');
			}
		?>
		<br>
		<a href="javascript:history.go(-1);">Volver</a><!-- Navegación en la página -->
		<table border="2" >
			<tr><th>Nombre</th><th>Descripción</th><th>Tamaño</th><th>Propietario</th></tr>
			<?php
			mysqli_use_result($conection);
			while($dato = mysqli_fetch_array($resultado))
			{
				echo
				
				'<tr style="text-align: center;">
				<td><img alt="No disponible" src="/eclipse/fotos/'.$dato['nombre'].'" height="30%"><br>
				<a href = "descargar.php?id='.$dato['nombre'].'">Descargar '.$dato['nombre'].'</a></td>
				<td width = "200">'.$dato['descripcion'].'</td>
				<td>'.($dato['tamano']/1000).'Kb </td>
				<td>'.$dato['usuario'].'</td></tr>';
			}
			mysqli_free_result($resultado);
			mysqli_close($conection);
			?>
		</table>
		<a href="javascript:history.go(-1);">Volver</a>
	</body>
</html>
