<?php
	include('connect.php');
	session_start();
	$idComentario=$_GET['idComment'];
	$texto=$_POST['respuesta'];
	$idUser=$_SESSION['login_user'];
	mysql_query("INSERT INTO respuesta (idUsuario, idComentario, fecha, texto) VALUES ('$idUser', '$idComentario', now(), '$texto')");
	$mensaje="Respuesta enviada con éxito";
	header("Location: responderComentario.php?idComment=$idComentario&msgResp=$mensaje");
?>
