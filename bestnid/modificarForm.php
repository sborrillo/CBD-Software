<?php
	include('connect.php');
	session_start();
	$aux=0;
?>
	<!DOCTYPE html>
	<html lang="en">
  	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../bestnid-logo.png">

    <title>Bestnid</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<b class="navbar-brand navbar-right" id="bienvenido"><i><?php echo $_SESSION['login_user']; ?></i></b>	
        </div>
        <div id="navbar" class="navbar-collapse collapse">	
					<b class="navbar-brand navbar-right" id="logout"><a href="logout.php">Cerrar Sesion</a></b>
	  				<b class="navbar-brand navbar-right" id="products"><a href="myproductos.php">Mis productos</a></b>
	   			<b class="navbar-brand navbar-right" id="products"><a href="index.php">Pagina principal</a></b>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container" align="left">
			<h2 align="center"><font size=7>Modificar Usuario</font></h2> 
      </div>
	</div>

    <div class="container">
      <!-- Example row of columns -->
				<h2 Style="color:#0000FF">Modificar datos de un usuario.</h2>
				<h3>Ingrese al menos un dato del usuario: </h3><br>
				<form method="POST" action="modificarForm.php">
						<b><font size=4>Nombre de usuario: </b></font>
						<input type="text" class="form-control" name="username" placeholder="Ingresar nombre de usuario..." autofocus>
						<b><font size=4>DNI: </b></font>
						<input type="number" class="form-control" name="dni" placeholder="Ingresar DNI...">
						<b><font size=4>Email: </b></font>
						<input type="email" class="form-control" name="email" placeholder="Ingresar email..."><br>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Buscar &raquo;</button>
					<a class="btn btn-lg btn-primary btn-block" href="gestionUsuarios.php" role="button">Volver &raquo;</a>
				</form> 
		</div>
    <hr>
		<?php if(isset($_GET['msg'])){ ?>
			<font size=3><p align=center><b Style="color:#D00909"><?php echo "* ".$_GET['msg']; ?></b></p></font>
		<?php } ?>
    <div class="container">
		<?php if(!empty($_POST))  { 
						$dni=$_POST['dni'];
						$username=$_POST['username'];
						$email=$_POST['email'];
						if(!empty($dni)){ $aux=1;
							$user=mysql_fetch_assoc(mysql_query("SELECT * FROM usuario WHERE dni='$dni'")); 
						}else{
								if(!empty($username)) {  $aux=1;
									$user=mysql_fetch_assoc(mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'")); 
								}else{ 
									if(!empty($email)){ $aux=1;
											$user=mysql_fetch_assoc(mysql_query("SELECT * FROM usuario WHERE email='$email'")); 
									}
								}
						} 
						if($aux==1){ 
							if(!empty($user)){ ?>
								<b><font size=4>Nombre de usuario: <i><?php echo $user['nombre_usuario']; ?></i></b></font><br>
								<b><font size=4>DNI: <i><?php echo $user['dni']; ?></i></b></font><br>
								<b><font size=4>Email: <i><?php echo $user['email']; ?></i></b></font><br>
								<b><font size=4>Apellido: <i><?php echo $user['apellido']; ?></i></b></font><br>
								<b><font size=4>Nombre: <i><?php echo $user['nombre']; ?></i></b></font><br> 
								<a class="btn btn-lg btn-primary btn-block" href="modificarUsuario.php?username=<?php echo $user['nombre_usuario']; ?>" role="button">Modificar Datos &raquo;</a>
								<a class="btn btn-lg btn-primary btn-block" href="modificarForm.php" role="button">Cancelar &raquo;</a> <?php	
							}else{ ?>
									<font size=4><b Style="color:#D00909"><p>No se encontraron resultados para la búsqueda</p></b></font> <?php }	
						}		
		} ?>
		</div>
	<hr>
    <footer>
    	<p align="center">&copy; Desarrollado por CBD</p>
    </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html> 
