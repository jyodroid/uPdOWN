<?php
	$enlace = '/var/www/html/eclipse/fotos/'.$_GET['id'];

	header ("Content-Disposition: attachment; filename=".$_GET['id']);

	header ("Content-Type: application/force-download");

	header ("Content-Length: ".filesize($enlace));

	readfile($enlace);

?>
