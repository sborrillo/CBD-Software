<?php
	include_once('connect.php');
	session_start();
	$bloq=0;
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$sql="SELECT * FROM usuario WHERE nombre_usuario='$username' and password='$password'";
	$result=mysql_query($sql);
	$rows=mysql_num_rows($result);
	if($rows!=0){
		$row=mysql_fetch_assoc($result);
		if($row['admin']==2){
			$bloq=1;
		}
		else{
			$_SESSION['login_user']=$username; 
			if ($row['admin']==0){
				$_SESSION['nivel']=0;
			}
			else{
				$_SESSION['nivel']=1;
			}
		}
		if($bloq==0){
			header("Location:index.php");	
		}
		else{
			header("Location:index.php?bloq=El usuario se encuentra bloqueado");	
		}
	}else {
		?>
		<script language="javascript">window.location='index.php?msg=Nombre de usuario o contraseña incorrecta!';</script>
		<?php
	}
	mysql_close();
?>
