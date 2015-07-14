<?php
 	session_start();
  	include('connect.php');
	$name="";
	$desc="";
	$id=$_GET['id'];
	if(!empty($_POST['nombre']) || !empty($_POST['desc'])){
		$msj="Los datos del producto se modificaron con exito!";
		$name=$_POST['nombre'];
		$desc=$_POST['desc'];
		mysql_query( "UPDATE publicacion SET nombre = '$name', descripcion = '$desc' WHERE id_publicacion = '$id'");
	}
	else{
		$msj="*No se recibieron datos para modificar el producto. Complete el formulario y vuelva a intentarlo.";
	}
	header("Location: modificar_publicacion.php?id=$id&mensaje=$msj");
?>
