<?php
$conection = mysqli_connect("localhost","updown","gnomo");
if (!$conection) {
	throw new Exception("No se conectó a DB".mysqli_errno($conection).":".mysqli_error($conection), 4) ;
}
?>