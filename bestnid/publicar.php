<?php	
	include('connect.php');
	session_start();
	$productName=$_POST['producto'];
	$description=$_POST['desc'];
	$name=$_FILES['foto']['name'];
	$tmp_name=$_FILES['foto']['tmp_name'];
	$userName=$_SESSION['login_user'];
	$types=array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png');
	if(!in_array($_FILES['foto']['type'], $types)){
		$mensaje="Solo puede subir imagenes con la extension JPEG, JPG, PJPEG o PNG";
		header("Location: publicar_form.php?mensaje=$mensaje");	
	}
	else{
		$user=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$userName'");
		$result=mysql_fetch_array($user, MYSQL_ASSOC);
		$dni=$result['dni'];
		if(is_uploaded_file($_FILES['foto']['tmp_name'])){
			copy($_FILES['foto']['tmp_name'], "../fotos/$name");
			mysql_query("INSERT INTO publicacion (nombre, descripcion, dni_usuario, fecha, foto) VALUES('$productName', '$description', '$dni', now(), '$name')");
			$mensaje="Producto publicado con exito!";
			header("Location: myproductos.php?mensaje=$mensaje");
		}
	}	
	mysql_close();
?> 	 		 	
