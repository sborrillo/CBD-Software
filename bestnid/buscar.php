<?php
	include('connect.php');
	session_start();
	$producto=$_POST['producto'];
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
        <div id="navbar" class="navbar-collapse collapse">
		<?php if(isset($_SESSION['login_user'])){ ?>
	   <b class="navbar-brand navbar-right" id="logout"><a href="logout.php">Cerrar Sesion</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="productos.php">Mis productos</a></b>
	   <b class="navbar-brand navbar-right" id="products"><a href="logout.php">Datos Personales</a></b>
		<?php } ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Resultado de la búsqueda</h1>
	<h2><?php echo $producto ?></h2>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
	<?php 
		$sql=mysql_query("SELECT * FROM publicacion WHERE nombre LIKE '%$producto%'");
	?>
	<h1>Productos:</h1>
	<div class="row">
	<?php
		if(mysql_num_rows($sql)>0){
			while($row=mysql_fetch_array($sql,MYSQL_ASSOC)){
				?>
				<div class="col-md-4">
					<h2><?php 
					echo $row['nombre'];?></h2>
					<img width="350px" height="250px" src="fotos/<?php echo $row['foto'];?>"> 
					<p><a class="btn btn-default" href="producto.php/?id=<?php echo $row['id_publicacion'] ?>" role="button">Ver producto &raquo;</a></p>	
				</div>	
		<?php 	}
		}
		else{
		?><h2>No se encontraron resultados.</h2>	
		<?php } ?>
	</div>
	<?php if($_SESSION['login_user']!=""){ ?>
		<a class="btn btn-primary btn-lg" href="profile.php" role="button">Volver &raquo;</a>  
	<?php }
		else { ?>
		    <a class="btn btn-primary btn-lg" href="index.php" role="button">Volver &raquo;</a>
	<?php } ?>
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
