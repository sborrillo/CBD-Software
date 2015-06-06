<?php
	include('connect.php');
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

    <title>BestNid</title>

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
          <a class="navbar-brand">BestNid</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method='POST' action='login.php'>
              <input type="text" id='inputUsername' name="username" class="form-control" placeholder="Nombre de usuario" required>
              <input type="password" id='inputPassword' name="password" class="form-control" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-success">Iniciar Sesion</button>
	    <a class="btn btn-succes" href="register_form.php">Registrarse</a>
          </form>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">	
	<div align="center">
	<br>
	<img border=5 width="200px" height="200px" src="bestnid-logo.png">
	</div>        
	<h1 align="center">Bienvenido a BestNid!</h1> 
	<br>
        <p>Una pagina de subastas online donde la necesidad es mas importante que el precio.</p>
		<p>Podes comenzar buscando el producto que te interesa.</p>
		<form class="form-signin" action='buscar.php' method='POST'>
		<input type="text" name='producto' placeholder="Producto" class="form-control">
        	<button class="btn btn-primary btn-lg" type="submit">Buscar &raquo;</button>
		</form>
	<br>
	<a class="btn btn-primary btn-lg" href="productos.php" role="button">Ver todos los productos &raquo;</a>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->

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
