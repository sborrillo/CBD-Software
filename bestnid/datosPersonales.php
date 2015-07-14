<?php
	session_start();
	include('connect.php');
	$username=$_SESSION['login_user'];
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
				<?php if(isset($_GET['mensaje'])){ ?>
					<b Style="color:#D00909"><?php echo $_GET['mensaje']; ?></b>
				<?php }
					if(!empty($_SESSION['msg'])){
						foreach($_SESSION['msg'] as $valor){ ?>
							<b Style="color:#D00909"><?php echo "*" .$valor; ?></b><br> <?php
						}	
						$_SESSION['msg']="";			
					}?>							

      <!-- Example row of columns -->
				<h2 Style="color:#0000FF">Datos de cuenta</h2><br>
				<b><font size=4>Nombre de usuario: </font></b><font size=4><?php echo $userData['nombre_usuario'] ?></font><a href="modificarDato.php?campo=nombre_usuario&valor=<?php echo $userData['nombre_usuario']; ?>"> --> Modificar</a><br><br> 
				<?php $longPass=strlen($userData['password']);
						for($i=0;$i<$longPass;$i++){
							$pass=$pass ."*";
						}			
				 ?>
				<b><font size=4>Contraseña: </font></b><font size=4><?php echo $pass ?></font><a href="modificarDato.php?campo=password&valor=<?php echo $userData['password']; ?>"> --> Modificar</a><br><br>
				<b><font size=4>Email: </font></b><font size=4><?php echo $userData['email'] ?></font><a href="modificarDato.php?campo=email&valor=<?php echo $userData['email']; ?>"> --> Modificar</a><br>
			<br>
			<h2 Style="color:#0000FF">Datos personales</h2><br>
				<b><font size=4>Nombre: </font></b><font size=4><?php echo $userData['nombre'] ?></font><br><br>
				<b><font size=4>Apellido: </font></b><font size=4><?php echo $userData['apellido'] ?></font><br><br>
				<b><font size=4>DNI: </font></b><font size=4><?php echo $userData['dni'] ?></font><br><br>

			<h2 Style="color:#0000FF">Domicilio <font size=3><a href="modificarDomicilio.php"> -->Modificar</a></font></h2><br>
				<b><font size=4>Localidad: </font></b><font size=4><?php echo $userData['localidad'] ?></font><br><br>
				<b><font size=4>Calle: </font></b><font size=4><?php echo $userData['calle'] ?></font><br><br>
				<b><font size=4>Numero: </font></b><font size=4><?php echo $userData['numero'] ?></font><br><br>
				<b><font size=4>Departamento: </font></b><font size=4><?php echo $userData['depto'] ?></font><br><br>
				<b><font size=4>Piso: </font></b><font size=4><?php echo $userData['piso'] ?></font><br><br>

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
