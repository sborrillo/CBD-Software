<?php
	include('connect.php');
	session_start();
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
			<?php if(isset($_SESSION['login_user'])){?>
				<b class="navbar-brand navbar-right" id="bienvenido"><i><?php echo $_SESSION['login_user']; ?></i></b>	
			<?php }
			else{?>
         	<a class="navbar-brand">Bestnid</a>
			<?php } ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
				<?php if(isset($_SESSION['login_user'])){?>	
					<b class="navbar-brand navbar-right" id="logout"><a href="logout.php">Cerrar Sesion</a></b>
	  				<b class="navbar-brand navbar-right" id="products"><a href="myproductos.php">Mis productos</a></b>
	   			<b class="navbar-brand navbar-right" id="products"><a href="#">Datos Personales</a></b>
				<?php } 
					else{ ?>
        				<form class="navbar-form navbar-right" method='POST' action='login.php'>
            		<input type="text" id='inputUsername' name="username" class="form-control" placeholder="Nombre de usuario" required>
            		<input type="password" id='inputPassword' name="password" class="form-control" placeholder="Contraseña" required>
            		<button type="submit" class="btn btn-success">Iniciar Sesion</button>
	    				<a class="btn btn-succes" href="register_form.php">Registrarse</a>
								<?php			
									if(isset($_GET['msg'])){ ?>
										<div>
										<b Style="color:#D00909"><?php echo $_GET['msg']; ?></b>
										</div>
							 	<?php } ?>
				<?php } ?>
         </form>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">	
			<?php
				if(isset($_GET['mensaje'])){ ?>
					<div>
						<h2><?php echo $_GET['mensaje']; ?></h2>
					</div>
				<?php } ?>
			<div align="center">
				<br><br>
				<img border=5 width="150px" height="150px" src="bestnid-logo.png">
			</div>        
			<h1 align="center">Bienvenido a Bestnid!</h1> 
			<br>
     		<p>Una pagina de subastas online donde la necesidad es mas importante que el precio.</p>
			<p>Podes comenzar publicando un producto.</p> <a class="btn btn-primary btn-lg" href="publicar_form.php" role="button">Publicar producto &raquo;</a>
			<br>
			<br>
			<p>Tambien podes buscar el producto que te interesa.</p>
			<form class="form-signin" action='buscar.php' method='POST'>
				<input type="text" name='producto' placeholder="Producto" class="form-control">
        		<button class="btn btn-primary btn-lg" type="submit">Buscar &raquo;</button>
			</form>
			<br>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
			<?php
				$sql=mysql_query("SELECT TOP 12 * FROM publicacion ORDER BY id_publicacion DESC");
			?>
			<h1>Últimas publicaciones</h1>
			<?php for($i=1;$i<=4;$i++){ ?>
      	<div class="row">
				<?php 
				for($x=1;$x<=3;$x++){
					$row=mysql_fetch_array($sql, MYSQL_ASSOC) ?>
					<div class="col-md-4">
						<h2><?php echo $row['nombre']; ?></h2>
						<img width	="350px" height="250px" src="../fotos/<?php echo $row['foto'];?>"> 
						<p><a class="btn btn-default" href="producto.php/?name=<?php echo $row['nombre'] ?>&desc=<?php echo $row['descripcion'] ?>&date=<?php echo $row['fecha'] ?>&pic=<?php echo $row['foto'] ?>&id=<?php echo $row['id_publicacion'] ?>" role="button">Ver producto &raquo;</a></p>	
					</div>	
				<?php }
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
