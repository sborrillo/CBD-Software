<?php
	include('connect.php');
	session_start();
	$idUsuario=$_SESSION['login_user'];
	$idPublicacion=$_GET['id'];
	$texto=$_POST['coment'];
	mysql_query("INSERT INTO comentario (idPublicacion,idUsuario,texto,fecha) VALUES('$idPublicacion','$idUsuario','$texto', now())");
	header("Location: producto.php?id=$idPublicacion&msgComment=Comentario enviado con éxito!");
?>
