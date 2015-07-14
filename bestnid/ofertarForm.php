<?php
	include('connect.php');
	session_start();
	$username=$_SESSION['login_user'];
	$query=mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'");
	$userData=mysql_fetch_assoc($query);
	$idProd=$_GET['id'];
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
       
			<h2 align="center"><font size=7>Ofertar</font></h2> 
      </div>
	</div>

    <div class="container">
      <!-- Example row of columns -->
				<h2 Style="color:#0000FF"><?php echo $userData['nombre']; ?> comentanos porque necesitas el producto.</h2><br>
				<form method="POST" action="ofertar.php?id=<?php echo $idProd; ?>">
						<b><font size=4>Necesidad: </b></font><br><br>
						<textarea name="necesidad" placeholder="Ingresar necesidad..." class="form-control" required autofocus></textarea><br>
						<b><font size=4>Precio: </b></font><br><br>
						<input type="number" class="form-control" name="oferta" placeholder="Ingresar oferta..." required><br>
						<?php if(isset($_GET['msg'])){ ?>
							<b Style="color:#D00909"><?php echo "*".$_GET['msg']; ?></b><br><br>
						<?php } ?>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Confirmar &raquo;</button>
					<a class="btn btn-lg btn-primary btn-block" href="producto.php?id=<?php echo $idProd; ?>" role="button">Volver &raquo;</a>
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
