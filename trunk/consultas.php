<?php
switch($_SESSION['myRequest']){
	case 1:
		$_SESSION['query'] = "select count(*) from imagenes where nombre ='".$nombre."'";
		break;
	case 2:
		$_SESSION['query'] = "select sum(tamano) from imagenes where usuario ='".$_SESSION['usuario']."'";
		break;
	case 3:
		$_SESSION['query'] = "insert into imagenes values ('".$nombre."', '".$_POST['descripcion']."' , '".$_FILES['foto']['size']."' , '".$_SESSION['usuario']."')";
		break;
	case 4:
		$_SESSION['query'] = "select * from imagenes order by nombre";
		break;
	case 5:
		$_SESSION['query'] = "select * from imagenes where usuario = '".$_SESSION['usuario']."' order by nombre";
		break;
	case 6:
		$_SESSION['query'] = "select * from imagenes where descripcion like '%".$_POST['descripcion']."%' and usuario = '".$_SESSION['usuario']."' order by nombre";
		break;
	case 7:
		$_SESSION['query'] = "select * from imagenes where descripcion like '%".$_POST['descripcion']."%' order by nombre";
		break;
	case 8:
		$_SESSION['query'] = "select count(*) from usuarios where usuario ='".$_REQUEST['usuario']."' and contrasena ='".$_REQUEST['contrasena']."'";
		break;
	case 9:
		$_SESSION['query'] = "select count(*) from usuarios where usuario ='".$_REQUEST['usuario']."'";
		break;
	case 10:
		$_SESSION['query'] = "insert into usuarios values ('".$_REQUEST['usuario']."', '".$_POST['contrasena']."')";
		break;
}
?>