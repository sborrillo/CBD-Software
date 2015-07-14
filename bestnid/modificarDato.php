<?php
	include('connect.php');
	session_start();
	$campo=$_GET['campo'];
	$valor=$_GET['valor'];
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
       
			<h2 align="center"><font size=7>Datos de cuenta</font></h2> 
      </div>
	</div>

    <div class="container">
      <!-- Example row of columns -->
				<h2 Style="color:#0000FF">Modificar datos:</h2><br>
				<form method="POST" action="actionModificarDato.php?campo=<?php echo $campo; ?>&valor=<?php echo $valor; ?>">
					<?php if($campo=="password"){ ?>
								<b><font size=4>Contraseña: </b><br><br>
								<input type="password" class="hidden" name="aux" >
								<input type="password" class="form-control" name="passActual" placeholder="Ingresar contraseña actual..." required autofocus><br>
								<input type="password" class="form-control" name="nuevaPass" placeholder="Ingresar nueva contraseña..." required><br>
								<input type="password" class="form-control" name="nuevaPass2" placeholder="Repetir nueva contraseña..." required><br>
					<?php } 
							if($campo=="email"){ ?>
								<b><font size=4>Email actual: </b><i><?php echo $valor; ?></i></font><br><br>
								<input type="email" class="form-control" name="nuevoDato" placeholder="Nuevo correo electronico..." required><br>		
					<?php }
							if($campo=="nombre_usuario"){ ?>		
								<b><font size=4>Nombre de usuario actual: </b><i><?php echo $valor; ?></i></font><br><br>
								<input type="text" class="form-control" name="nuevoDato" placeholder="Nuevo nombre de usuario..." required><br>
							<?php } 
					if(isset($_GET['mensaje'])){ ?>
						<b Style="color:#D00909"><?php echo $_GET['mensaje']; ?></b>
					<?php } ?>
		
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
