<?php
	include('connect.php');
	$idProd=$_GET['idProd'];
	$ganador=$_GET['idUser'];
	$pic=$_GET['pic'];
	mysql_query("INSERT INTO venta (idUsuario, idPublicacion, fecha) VALUES ('$ganador','$idProd', now())");
	mysql_query("UPDATE publicacion SET estado=1 WHERE id_publicacion='$idProd'");
	$msj="La operación se realizó con éxito, el sistema contactará al ganador de la subasta.";
	header("Location: verOfertas.php?mensaje=$msj&pic=$pic");
?>
