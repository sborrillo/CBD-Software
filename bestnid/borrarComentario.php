<?php
	include('connect.php');
	session_start();
	$idComentario=$_GET['idComment'];
	$idPublicacion=$_GET['idProduct'];
	mysql_query("DELETE FROM comentario WHERE idComentario='$idComentario'");
	$mensaje="Comentario borrado con éxito";
	header("Location: producto.php?id=$idPublicacion&msgDeleteComment=$mensaje");
?>
