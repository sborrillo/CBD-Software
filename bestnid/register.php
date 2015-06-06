<?php
	session_start();
	require('connect.php');
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
	
	if($password==$pass2){
		$checkemail=mysql_query("SELECT * FROM usuario WHERE email='$email'");
		$emailexist=mysql_num_rows($checkemail);
		if($emailexist>0){
			echo '<script language="javascript">alert("Atencion, el email que ingreso ya esta en uso, verifique sus datos");</script>';
		}else{
			mysql_query("INSERT INTO usuario VALUES('$dni', '$name', '$lastName', '$email', '$number', '$city', '$street', '$depto', '$floor', '$password', '$username', 0)");
			echo '<script language="javascript">alert("usuario registrado con &eacutexito");</script>';
			header('Location: index.php');
		}
	}
	else{
		echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
	}?>
	<script language="javascript">window.location='register_form.php';</script>
	<?php
	mysql_close();
?>
