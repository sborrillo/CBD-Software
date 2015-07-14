<?php
	session_start();
	include('connect.php');
	$email=$_POST['email'];
	$password=$_POST['pass1'];
	$username=$_POST['username'];
	$name=$_POST['name'];
	$lastName=$_POST['lastName'];
	$dni=$_POST['dni'];
	$city=$_POST['city'];
	$street=$_POST['street'];
	$number=$_POST['number'];
	$depto=$_POST['depto'];
	$floor=$_POST['floor'];
	$pass2=$_POST['pass2'];
	$errors=array();

	if(!preg_match("/^[a-zA-Z]+$/",$name)){ 
		$errors[]="El nombre debe estar compuesto solo por letras";
	}	
	if(!preg_match("/^[a-zA-Z]+$/",$lastName)){
		$errors[]="El apellido debe estar compuesto solo por letras";
	}
	if(strlen($dni)>8 || strlen($dni)<7) {			
		$errors[]="Se ingresó un DNI invalido";
	}
	if($password!=$pass2){
		$errors[]="Las contraseñas no coinciden";
	}
	$emailexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE email='$email'"));
	if($emailexist>0){
		$errors[]="El email \'' .$email . '\' ya se encuentra registrado en el sistema";		
	}
	$userexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'"));
	if($userexist>0){
		$errors[]="El nombre de usuario \'' .$username . '\' ya se encuentra registrado en el sistema";		
	}
	$dniexist=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE dni='$dni'"));
	if($dniexist>0){
		$errors[]="El DNI \'' .$dni . '\' ya se encuentra registrado en el sistema";		
	}
	if(empty($errors)){
		mysql_query("INSERT INTO usuario VALUES('$dni', '$name', '$lastName', '$email', '$number', '$city', '$street', '$depto', '$floor', '$password', '$username', 0, now())");	
		if($_SESSION['nivel']==1){
			header ("Location: gestionUsuarios.php?mensaje=Usuario registrado exitosamente!");
		}else{	
			$_SESSION['login_user']=$username; 
			$_SESSION['nivel']=0;					
			header ("Location: index.php?mensaje=Se ha registrado exitosamente!");
		}
	}
	else{
		$_SESSION['errors']=$errors;
		header ("Location: register_form.php");
	}				
	mysql_close();
?>
