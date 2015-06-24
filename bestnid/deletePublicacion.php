<?php
	include('connect.php');
	session_start();
	$id=$_GET['idprod'];
	mysql_query("DELETE FROM publicacion WHERE id_publicacion='$id'");
	$msj="Producto eliminado con exito!";
	header("Location: ../myproductos.php?mensaje=$msj");
	mysql_close();
?>
