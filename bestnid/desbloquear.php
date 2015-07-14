<?php
	include('connect.php');
	$user=$_GET['username'];
	mysql_query("UPDATE usuario SET admin='0' WHERE nombre_usuario='$user'");
	header("Location: restringirForm.php?msg=Usuario desbloqueado con éxito!");
?>
