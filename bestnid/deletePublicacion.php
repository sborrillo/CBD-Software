<?php
	include('connect.php');
	session_start();
	$id=$_GET['idprod'];
	mysql_query("DELETE FROM publicacion WHERE id_publicacion='$id'");
	echo '<script language="javascript">alert("Producto eliminado con exito");</script>';
	header("Location: ../profile.php");
	mysql_close();
?>
