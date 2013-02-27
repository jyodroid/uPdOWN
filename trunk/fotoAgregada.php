<?php
	$_SESSION['timeout']=time();
	include 'verificacion.php';
?>
<html>
<head>
	<link rel="stylesheet" title="text/css" media="screen" href="Estilo.css">
	<title>uPdOWN--Foto Subida</title>
</head>
	<body>
		<center>
		<img alt="uPdOWN" src="titulo.png" align="top"/>
		<?php
		//Logica del negocio
		try{
				//Se comprueba que suba una imagen
				$tipo = $_FILES['foto']['type'];
				$image = substr($tipo, 0, 5);
				if (strcmp($image, 'image')!=0){
					throw new Exception("No es una fotografía!", 8);
				}
				$nombre = $_SESSION['usuario'].'_'.$_FILES['foto']['name'];
				
				//Para evitar problemas en la base de datos se hace el nombre del archivo menor que 20
				while (strlen($nombre)>=20){
					$tmp = substr($nombre, 0, strlen($nombre)-6);
					$nombre = $tmp.substr($nombre, strlen($nombre)-5, strlen($nombre));//Se le agrega la extensión
				}
				
				//Se busca que el nombre de la imagen no se repita
				include 'conection.php';
				$_SESSION['myRequest'] = 1;
				include 'consultas.php';
				$resultado = mysqli_query($conection, $_SESSION['query']);
				if($resultado==false){
					$en = mysqli_errno($conection);
					$et = mysqli_error($conection);
					mysqli_close($conection);
					throw new Exception("Error de query 1: fotoAgregada, ".$en." :".$et, 1);
				}
				mysqli_use_result($conection);
				$dato = mysqli_fetch_array($resultado);
				foreach ($dato as $valor) {
					if ($valor!=0){
						$nombre = substr(md5(uniqid(rand())),0,6).substr($nombre, strlen($nombre)-5, strlen($nombre));
					}
				}
				mysqli_free_result($resultado);
				//Se verifica que no se supere el límite de 50 GB de almacenamiento por usuario
				$_SESSION['myRequest'] = 2;
				include 'consultas.php';
				$resultado = mysqli_query($conection, $_SESSION['query']);
				if($resultado==false){
					$en = mysqli_errno($conection);
					$et = mysqli_error($conection);
					mysqli_close($conection);
					throw new Exception("Error de query 2: fotoAgregada, ".$en." :".$et, 9);
				}
				mysqli_use_result($conection);
				$dato = mysqli_fetch_array($resultado);
				foreach ($dato as $valor) {
					if (($valor+$_FILES['foto']['size'])>=50000000000){
						throw new Exception("Almacenamiento al máximo, no puede agregar el archivo", 9);
					}
				}
				mysqli_free_result($resultado);
				
				//Se sube el archivo al servidor
				if ($nombre != "") {
					// guardamos el archivo a la carpeta fotos
					$destino =  "/var/www/html/eclipse/fotos/".$nombre;
					if(move_uploaded_file($_FILES['foto']['tmp_name'],$destino)){
						echo '<h1>Foto Agregada</h1><br><a href="javascript:history.go(-1);">Volver</a>';
					} else {
						throw new Exception("Error al subir el archivo", 10);
					}
				} else {
					throw new Exception("Error al subir el archivo", 10);
				}
				//Se almacena la información del archivo
				$_SESSION['myRequest'] = 3;
				include 'consultas.php';
				if(!mysqli_query($conection, $_SESSION['query'])){
					$en = mysqli_errno($conection);
					$et = mysqli_error($conection);
					mysql_close($conection);
					throw new Exception("Error de query: fotoAgregada:74, ".$en." :".$et, 1);
				}
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