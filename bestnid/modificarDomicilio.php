<?php
	include('connect.php');
	session_start();
	$username=$_SESSION['login_user'];
	$query=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'");
	$userData=mysql_fetch_assoc($query);
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
			<b class="navbar-brand navbar-right" id="bienvenido"><i><?php echo $username; ?></i></b>	
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
       
			<h2 align="center"><font size=7>Domicilio</font></h2> 
      </div>
	</div>

    <div class="container">
      <!-- Example row of columns -->
				<h2 Style="color:#0000FF">Modificar datos:</h2><br>
				<form method="POST" action="actionModificarDomicilio.php">
						<b><font size=4>Localidad: </b><i><?php echo $userData['localidad']; ?></i></font><br><br>
						<b><font size=4>Calle: </b><i><?php echo $userData['calle']; ?></i></font><br><br>
						<b><font size=4>Numero: </b><i><?php echo $userData['numero']; ?></i></font><br><br>
						<b><font size=4>Departamento: </b><i><?php echo $userData['depto']; ?></i></font><br><br>
						<b><font size=4>Piso: </b><i><?php echo $userData['piso']; ?></i></font><br><br>
						<input type="text" class="form-control" name="localidad" placeholder="Ingresar nueva localidad..." autofocus><br>
						<input type="text" class="form-control" name="calle" placeholder="Ingresar nueva calle..."><br>
						<input type="number" class="form-control" name="numero" placeholder="Ingresar nuevo numero..."><br>
						<input type="text" class="form-control" name="depto" placeholder="Ingresar nuevo departamento..."><br>
						<input type="number" class="form-control" name="piso" placeholder="Ingresar nuevo piso..."><br>	
					<button class="btn btn-lg btn-primary btn-block" type="submit">Confirmar &raquo;</button>
					<a class="btn btn-lg btn-primary btn-block" href="datosPersonales.php" role="button">Volver &raquo;</a>
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
