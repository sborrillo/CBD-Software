<?php
	include('connect.php');
	session_start();
	$username=$_SESSION['login_user'];
	$idProd=$_GET['id'];
	$need=$_POST['necesidad'];
	$oferta=$_POST['oferta'];
	$q=mysql_query("SELECT * FROM oferta WHERE idUsuario='$username' AND idPublicacion='$idProd'");
	$rows=mysql_num_rows($q);
	if($rows>0){
		$mensaje="Usted ya realizó una oferta sobre este producto";
		header("Location: ofertarForm.php?id=$idProd&msg=$mensaje");
	}
	else{
		if($oferta>0){
			$mensaje="Oferta realizada con éxito!";
			mysql_query("INSERT INTO oferta (idPublicacion, idUsuario, monto, fecha, necesidad) VALUES('$idProd','$username','$oferta',now(),'$need')");
			header("Location: producto.php?id=$idProd&oferta=$mensaje");
		}
		else{
			$mensaje="El monto a ofertar debe ser mayor a 0";
			header("Location: ofertarForm.php?id=$idProd&msg=$mensaje");
		}	
	}
?>
