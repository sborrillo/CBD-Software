<?php
	include('connect.php');
	session_start();	
	$pic=$_GET['pic'];
	$idProd=$_GET['idProd'];
	$username=$_SESSION['login_user'];
	$idOferta=$_GET['idOfer'];
	$need=$_GET['need'];
	$ganador=$_GET['idUsuario'];
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
          <b class="navbar-brand" id="bienvenido"><i><?php echo $_SESSION['login_user']; ?></i></b>
        </div>
	<?php if($_SESSION['login_user']!=""){ ?>
        <div id="navbar" class="navbar-collapse collapse">
	     <b class="navbar-brand navbar-right" id="logout"><a href="../logout.php">Cerrar Sesion</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="../myproductos.php">Mis productos</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="../logout.php">Datos Personales</a></b>
        </div><!--/.navbar-collapse -->
	<?php } ?>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 align=center>Elegir Ganador</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
	<div align=center class="row">	
		<img style="border:1px solid;" width="500px" height="400px" src="../fotos/<?php echo $pic; ?>">
	</div><hr>
	<h2 align="center">Oferta seleccionada</h2>
	<div class="oferta" style="border:1px solid;">
		<p align=center><font size=5><br><b>Oferta realizada por: </b><i> <?php echo $ganador; ?></i><br>
		<br><b>Necesidad: </b><i><?php echo $need; ?></i><br><br></font>
		<a class="btn btn-primary btn-lg" href="../ganador.php?idUser=<?php echo $ganador ?>&idProd=<?php echo $idProd ?>&pic=<?php echo $pic ?>" role="button">Confirmar &raquo;</a> 
		<a class="btn btn-primary btn-lg" href="../verOfertas.php?idProd=?<?php echo $idProd ?>&pic=<?php echo $pic ?>" role="button">Cancelar &raquo;</a></p>
	</div> 
	</div>
	<br>
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
