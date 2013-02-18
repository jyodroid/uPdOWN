<?php
$conection = mysqli_connect("localhost","root","jeycast3");
if (!$conection) {
	throw new Exception("No se conectó a DBMS".mysqli_errno($conection).":".mysqli_error($conection), 1) ;
}
?>