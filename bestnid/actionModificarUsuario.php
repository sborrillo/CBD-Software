<?php
	session_start();
	include('connect.php');
	$dniAnt=$_GET['dni'];
	$userData=mysql_fetch_assoc(mysql_query("SELECT * FROM usuario WHERE dni='$dniAnt'"));
	$emailAnt=$userData['email'];
	$usernameAnt=$userData['nombre_usuario'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$username=$_POST['nombreUsuario'];
	$name=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$dni=$_POST['dni'];
	$localidad=$_POST['localidad'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$depto=$_POST['depto'];
	$piso=$_POST['piso'];
	$nivel=$_POST['nivel'];
	
	if($email!=$emailAnt){
		$emailexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE email='$email'"));
		if($emailexist>0){
			$errors="$errors .El email \'' .$email . '\' ya se encuentra registrado en el sistema";	
		}	
	}
	if($username!=$usernameAnt){
		$userexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'"));
		if($userexist>0){
			$errors="$errors .El nombre de usuario \'' .$username . '\' ya se encuentra registrado en el sistema";		
		}
	}
	if($dni!=$dniAnt){
		$dniexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE dni='$dni'"));
		if($dniexist>0){
			$errors="$errors .El DNI \'' .$dni . '\' ya se encuentra registrado en el sistema";		
		}
	}
	if(empty($errors)){
		$errors="Usuario modificado con éxito!";
		mysql_query("UPDATE usuario SET dni='$dni', nombre='$name', apellido='$apellido', email='$email', numero='$numero', localidad='$localidad', calle='$calle', depto='$depto', piso='$piso', password='$password', nombre_usuario='$username', admin='$nivel' WHERE dni='$dniAnt'");
	}
	header ("Location: modificarUsuario.php?errors=$errors&username=$username");			
	mysql_close();
?>
