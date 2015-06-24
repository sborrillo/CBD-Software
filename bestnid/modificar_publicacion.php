<?php 
  include('connect.php');
  session_start();
  $id=$_GET['id'];
  $result = mysql_query("SELECT * FROM publicacion WHERE id_publicacion ='$id'");
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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../jumbotron.css" rel="stylesheet">

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
     <b class="navbar-brand navbar-right" id="logout"><a href="../logout.php">Cerrar Sesion</a></b>  
     <b class="navbar-brand navbar-right" id="products"><a href="../myproductos.php">Mis productos</a></b>
     <b class="navbar-brand navbar-right" id="products"><a href="#">Datos Personales</a></b>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2>Modificar producto</h2>
        <p>Escriba los nuevos datos del producto:</p>
    <form method="POST" action="../actionModificarPublicacion.php?id=<?php echo $id; ?>">
    	<input type="text" name='nombre'  placeholder="Nombre del producto" class="form-control">
    	<br>
    	<textarea name="desc" placeholder="Descripcion del producto" class="form-control"></textarea>
   	<br>
		<button class="btn btn-primary btn-lg" type="submit" class="form-control">Modificar publicacion &raquo;</button>
    </form>
	<div class="errores">
		<?php if(isset($_GET['mensaje'])){ ?>
				<br><h3 Style="color:#D00909"><?php echo $_GET['mensaje']; ?></h3><br>
		<?php } ?>
	</div>
  <br>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
  <a class="btn btn-primary btn-lg" href="index.php" role="button">Volver &raquo;</a>
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
