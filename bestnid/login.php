<?php
	include_once('connect.php');
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$sql="SELECT * FROM usuario WHERE nombre_usuario='$username' and password='$password'";
	$result=mysql_query($sql);
	$rows=mysql_num_rows($result);
	if($rows!=0){
		$_SESSION['login_user']=$username; 
		$row=mysql_fetch_assoc($result);
		if ($row['admin']==0){
			$_SESSION['nivel']=0;
		}
		else{
			$_SESSION['nivel']=1;
		}
		header("location:index.php");
	}else {
		?>
		<script language="javascript">window.location='index.php?msg=Nombre de usuario o contraseña incorrecta!';</script>
		<?php
	}
	mysql_close();
?>
