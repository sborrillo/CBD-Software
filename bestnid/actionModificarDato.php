<?php
	include('connect.php');
	session_start();
	$nuevo=$_POST['nuevoDato'];
	$campo=$_GET['campo'];
	$valor=$_GET['valor'];
	$username=$_SESSION['login_user'];
	$error=0;	
	if($campo=="password"){
		$q=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'");
		$user=mysql_fetch_assoc($q);
		$passActual=$_POST['passActual'];
		$passNueva=$_POST['nuevaPass'];
		$passNueva2=$_POST['nuevaPass2'];
		if($user['password']==$passActual){
			if($passNueva==$passNueva2){
				$mensaje="Contraseña modificada con exito!";	
				mysql_query("UPDATE usuario SET password='$passNueva' WHERE nombre_usuario='$username'");
			}
			else{
				$mensaje="*Las contraseñas no coinciden";
				$error=1;
			}
		}
		else{
			$error=1;
			$mensaje="*La contraseña actual ingresada no es correcta";
		}
	}
	else{
		if($campo=="nombre_usuario"){
			$q=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$nuevo'");
			$existe=mysql_num_rows($q);
			if($existe>0){
				$error=1;
				$mensaje="El nombre de usuario ingresado ya existe en el sistema";	
			}else{
				$mensaje="Nombre de usuario modificado con exito!";
				mysql_query("UPDATE usuario SET nombre_usuario='$nuevo' WHERE nombre_usuario='$username'");
				$_SESSION['login_user']=$nuevo;
			}
		}
		else{
			$q=mysql_query("SELECT * FROM usuario WHERE email='$nuevo'");
			$existe=mysql_num_rows($q);
			if($existe>0){
				$error=1;
				$mensaje="El email ingresado ya existe en el sistema";
			}else{
				$mensaje="Email modificado con exito!";
				mysql_query("UPDATE usuario SET email='$nuevo' WHERE nombre_usuario='$username'");
			}
		}
	}
	if($error==0){
		header("Location: datosPersonales.php?mensaje=$mensaje");
	}else{
		header("Location: modificarDato.php?mensaje=$mensaje&campo=$campo&valor=$valor");
	}
?>
