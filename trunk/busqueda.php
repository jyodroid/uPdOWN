<html>
	<head>
		<link rel="stylesheet" title="text/css" media="screen" href="Estilo.css">
		<title>uPdOWN--Fotos</title>
	</head>
	<body>
		<center>
		<img alt="uPdOWN" src="titulo.png" align="top"/>
		<?php
		session_start();
		$inactive = 600;
		$session_life =  time() - $_SESSION['timeout'];
		$_SESSION['timeout']=time();
			if (strcmp($_GET['busqueda'], 'todo')===0){
				$query = "select * from imagenes";
			}
			if (strcmp($_GET['busqueda'], 'mias')===0){
				try {
					if((strlen($_SESSION['usuario'])===0)||$_SESSION['usuario']===null){
						throw new Exception("No ha ingresado al sistema", 2);
					}
					if($session_life > $inactive){
						if(isset($_SESSION['usuario']))
								unset($_SESSION['usuario']);
						throw new Exception("Mas de 10 minutos inactivo, por favor ingrese de nuevo", 4);
					}
					$query = "select * from imagenes where usuario = '".$_SESSION['usuario']."'";
				}catch (Exception $e){
					$_SESSION['error']=$e->getMessage();
					$_SESSION['errorn']=$e->getCode();
					header('location: errores.php');
				}
			}
			if (($_POST['descripcion']!=null)||(strlen($_POST['descripcion'])!=0)){
				try {
					if((strlen($_SESSION['usuario'])===0)||$_SESSION['usuario']===null){
						throw new Exception("No ha ingresado al sistema", 2);
					}
					if($session_life > $inactive){
						if(isset($_SESSION['usuario']))
								unset($_SESSION['usuario']);
						throw new Exception("Mas de 10 minutos inactivo, por favor ingrese de nuevo", 4);
					}
					if (strcmp($_POST['smios'], 'on')===0) {
						$query = "select * from imagenes where descripcion like '%".$_POST['descripcion']."%' and usuario = '".$_SESSION['usuario']."'";
					}else{
						$query = "select * from imagenes where descripcion like '%".$_POST['descripcion']."%'";
					}
				}catch (Exception $e){
					$_SESSION['error']=$e->getMessage();
					$_SESSION['errorn']=$e->getCode();
					header('location: errores.php');
				}
			}
		?>
		<br>
		<a href="javascript:history.go(-1);">Volver</a>
		<table border="2">
			<tr><th>Nombre</th><th>Descripción</th><th>Tamaño</th><th>Propietario</th></tr>
			<?php
			include 'conection.php';
			mysqli_select_db($conection, 'updown');
			$resultado = mysqli_query($conection, $query);
			if($resultado==false){
				$en = mysqli_errno($conection);
				$et = mysqli_error($conection);
				mysqli_close($conection);
				throw new Exception("Error de query 1, ".$en." :".$et, 9);
			}
			mysqli_use_result($conection);
			while($dato = mysqli_fetch_array($resultado))
			{
				echo
				
				'<tr style="text-align: center;">
				<td><img alt="'.$dato['nombre'].'" src="/eclipse/fotos/'.$dato['nombre'].'" width="20%"><br>'.$dato['nombre'].'</td>
				<td>'.$dato['descripcion'].'</td>
				<td>'.($dato['tamano']/1000).'Kb </td>
				<td>'.$dato['usuario'].'</td></tr>';
			}
			mysqli_free_result($resultado);
			mysqli_close($conection);
			?>
		</table>
		<a href="javascript:history.go(-1);">Volver</a>
		</center>
	</body>
</html>
