<?php
$conection = mysqli_connect("localhost","jtangar1","maycry");
if (!$conection) {
	throw new Exception("No se conectó a DB".mysqli_errno($conection).":".mysqli_error($conection), 4) ;
}
mysqli_select_db($conection, 'jtangar1_updown');
?>