<?php
	session_start();
	include('connect.php');
	$username=$_GET['username'];
	$login=$_SESSION['login_user'];
	if($login!=$username){
		mysql_query("UPDATE usuario SET admin='2' WHERE nombre_usuario='$username'");
		$mensaje="Usuario bloqueado con éxito!";
	}else{
		$mensaje="No puede restringir el acceso desde su propia cuenta";
	}
	header("Location: restringirForm.php?msg=$mensaje");
?>
