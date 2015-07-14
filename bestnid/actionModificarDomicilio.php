<?php
	include('connect.php');
	session_start();
	$msg=array();
	$username=$_SESSION['login_user'];
	if(empty($_POST['localidad']) && empty($_POST['calle']) && empty($_POST['numero']) && empty($_POST['depto']) && empty($_POST['piso'])){
		header("Location: modificarDomicilio.php");
	}
	else{
		$localidad=$_POST['localidad'];
		$calle=$_POST['calle'];
		$num=$_POST['numero'];
		$depto=$_POST['depto'];
		$piso=$_POST['piso'];
		if(!empty($localidad)){
			mysql_query("UPDATE usuario SET localidad='$localidad' WHERE nombre_usuario='$username'");
			$msg[]="Localidad modificada con exito";
		}
		if(!empty($calle)){
			mysql_query("UPDATE usuario SET calle='$calle' WHERE nombre_usuario='$username'");
			$msg[]="Calle modificada con exito";
		}
		if(!empty($num)){
			mysql_query("UPDATE usuario SET numero='$num' WHERE nombre_usuario='$username'");	
			$msg[]="Numero modificado con exito";
		}
		if(!empty($depto)){
			mysql_query("UPDATE usuario SET depto='$depto' WHERE nombre_usuario='$username'");
			$msg[]="Departamento modificado con exito";
		}
		if(!empty($piso)){
			mysql_query("UPDATE usuario SET piso='$piso' WHERE nombre_usuario='$username'");
			$msg[]="Piso modificado con exito";
		}
		$_SESSION['msg']=$msg;
		header("Location: datosPersonales.php");
	}	
?>	
