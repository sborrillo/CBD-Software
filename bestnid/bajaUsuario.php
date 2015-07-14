<?php
	include('connect.php');
	session_start();
	$username=$_GET['username'];
	$login=$_SESSION['login_user'];
	if($login!=$username){
		mysql_query("DELETE FROM usuario WHERE nombre_usuario='$username'");
		$mensaje="Usuario eliminado con éxito!";
	}else{
		$mensaje="No puede dar de baja desde su propia cuenta";
	}
	header("Location: bajaForm.php?msg=$mensaje");
?>
