<?php
	include('connect.php');
	session_start();
	$id=$_GET['idComment'];
	$datosComentario=mysql_fetch_assoc(mysql_query("SELECT * FROM comentario WHERE idComentario='$id'"));
	$date=$datosComentario['fecha'];
	$fecha=new DateTime($date);
	$datosResp=mysql_fetch_assoc(mysql_query("SELECT * FROM respuesta WHERE idComentario='$id'"));
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
          	  <b class="navbar-brand navbar-right" id="bienvenido"><i><?php echo $_SESSION['login_user']; ?></i></b>
        </div>
	<?php if($_SESSION['login_user']!=""){ ?>
        <div id="navbar" class="navbar-collapse collapse">
		  <b class="navbar-brand navbar-right" id="logout"><a href="logout.php">Cerrar Sesion</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="myproductos.php">Mis productos</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="#">Datos Personales</a></b>
        </div><!--/.navbar-collapse -->
	<?php } ?>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
			<br>
        <h2>Responder Comentario</h2>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
	      <font size=5><b>Nombre de usuario: </b><?php echo $datosComentario['idUsuario']; ?><br>
			<b>Fecha: </b><?php echo date_format($fecha,'d-m-Y'); ?><br>
			<b>Comentario: </b><?php echo $datosComentario['texto']; ?></font><br>  
			<hr>
			<?php if(isset($_GET['msgResp'])){ ?>
					<font size=5><b>Respuesta: </b><?php echo $datosResp['texto']; ?><br></font><br>
					<font size=3><b Style="color:#0000FF"><?php echo $_GET['msgResp']; ?></b></font>
			<?php }else{ ?>
			<form action="enviarRespuesta.php?idComment=<?php echo $id ?>" method="POST">
				<textarea name="respuesta" placeholder="Escribe tu respuesta..." class="form-control" required autofocus></textarea>
				<button class="btn btn-default" type="submit">Responder &raquo;</button>
			</form>
			<?php } ?>
	<hr>
	<a class="btn btn-primary btn-lg" href="producto.php?id=<?php echo $datosComentario['idPublicacion']; ?>" role="button">Volver &raquo;</a>

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
