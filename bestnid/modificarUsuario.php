<?php
	session_start();
	include('connect.php');
	$username=$_GET['username'];
	$query=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'");
	$userData=mysql_fetch_array($query, MYSQL_ASSOC);
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
       
			<h2 align="center"><font size=7>Datos personales</font></h2> 
      </div>
	</div>

    <div class="container">
				<?php if(isset($_GET['errors'])){ ?>
					<b Style="color:#D00909"><?php echo $_GET['errors']; ?></b>
				<?php } ?>

      <!-- Example row of columns -->
			<form method="POST" action="actionModificarUsuario.php?dni=<?php echo $userData['dni'];?>"> 
				<h2 Style="color:#0000FF">Datos de cuenta</h2>
				<b><font size=4>Nombre de usuario: </font></b>
				<input type="text" name="nombreUsuario" value="<?php echo $userData['nombre_usuario'] ?>" class="form-control"> 
				<b><font size=4>Contraseña: </font></b>
				<input type="text" name="password" value="<?php echo $userData['password']?> " class="form-control"> 
				<b><font size=4>Email: </font></b>
				<input type="email" name="email" value="<?php echo $userData['email']?> " class="form-control"> 
		
			<h2 Style="color:#0000FF">Datos personales</h2>
				<b><font size=4>Nombre: </font></b>
				<input type="text" name="nombre" value="<?php echo $userData['nombre']?> " class="form-control"> 
				<b><font size=4>Apellido: </font></b>
				<input type="text" name="apellido" value="<?php echo $userData['apellido']?>" class="form-control"> 
				<b><font size=4>DNI: </font></b>
				<input type="number" name="dni" value="<?php echo $userData['dni']?>" class="form-control"> 

			<h2 Style="color:#0000FF">Domicilio</h2>
				<b><font size=4>Localidad: </font></b>
				<input type="text" name="localidad" value="<?php echo $userData['localidad']?>" class="form-control"> 
				<b><font size=4>Calle: </font></b>
				<input type="text" name="calle" value="<?php echo $userData['calle']?>" class="form-control"> 
				<b><font size=4>Numero: </font></b>
				<input type="number" name="numero" value="<?php echo $userData['numero']?>" class="form-control"> 
				<b><font size=4>Departamento: </font></b>
				<input type="text" name="depto" value="<?php echo $userData['depto']?>" class="form-control"> 
				<b><font size=4>Piso: </font></b>
				<input type="number" name="piso" value="<?php echo $userData['piso']?>" class="form-control">
				<b><font size=4>Nivel de acceso (0:Registrado/1:Administrador/2:Bloqueado): </font></b>
				<input type="number" name="nivel" value="<?php echo $userData['admin']?>" class="form-control"><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit" class="form-control">Modificar datos &raquo;</button>
				<a class="btn btn-lg btn-primary btn-block" href="../modificarForm.php" role="button">Cancelar &raquo;</a>
			</form>
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
