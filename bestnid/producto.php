<?php	
	session_start();
	include('connect.php');
	$id=$_GET['id'];
	$username=$_SESSION['login_user'];
	$datosUser=mysql_fetch_assoc(mysql_query("SELECT * FROM usuario WHERE nombre_usuario='$username'"));
	$datosProd=mysql_fetch_assoc(mysql_query("SELECT * FROM publicacion WHERE id_publicacion='$id'"));
	$name=$datosProd['nombre'];
	$date=$datosProd['fecha'];
	$pic=$datosProd['foto'];
	$desc=$datosProd['descripcion'];
	$owner=$datosProd['dni_usuario'];
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
        <h1><?php echo $name; ?></h1>
	<h2>Descripción:</h2>
	<h3><?php echo $desc; ?></h3>
	<p>Fecha publicación: <?php echo date("d-m-Y", $date); ?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
	<div align=center class="row">	
		<img style="border:1px solid;" width="500px" height="400px" src="../fotos/<?php echo $pic; ?>">
	</div><hr>
	<?php if($datosProd['estado']==1){ ?>
				<font size=4><b Style="color:#D00909">Esta subasta ya finalizó!</b></font><br><br>	
	<?php }else{if(isset($_GET['oferta'])){ ?>
		<b Style="color:#D00909"><?php echo "*".$_GET['oferta']; ?></b><br><br>
	<?php }
	if($datosUser['dni']!=$datosProd['dni_usuario']){ ?>
		<a class="btn btn-lg btn-primary btn-block" href="../ofertarForm.php?id=<?php echo $id; ?>" role="button">Ofertar &raquo;</a>
	<?php } 
	if($_SESSION['login_user']!=""){ 
		if($datosUser['dni']==$datosProd['dni_usuario']){ ?>
			<a class="btn btn-lg btn-primary btn-block" href="../verOfertas.php/?id=<?php echo $id ?>&pic=<?php echo $pic ?>" role="button">Ver ofertas &raquo;</a><br>
			<a class="btn btn-lg btn-primary btn-block" href="../modificar_publicacion.php/?id=<?php echo $id ?>" role="button">Modificar publicacion &raquo;</a><br>
			<a class="btn btn-lg btn-primary btn-block" href="../deletePublicacion.php/?idprod=<?php echo $id ?>" role="button">Eliminar publicación &raquo;</a><br><br>
		<?php } 
		}?>
	<br><br>
	<?php if(isset($_GET['msgComment'])){ ?>
		<font size=4><b Style="color:#D00909"><?php echo "*".$_GET['msgComment']; ?></b></font><br>
	<?php } ?>
	<h2 align="center">Comentarios al vendedor</h2>
	<?php
		if(isset($_GET['msgDeleteComment'])){ ?>
			<h4 Style="color:#0000FF"><?php echo $_GET['msgDeleteComment']; ?> </h4>
		<?php } ?>
	<div class="comentarios" style="border:1px solid;">
		<?php if($owner!=$datosUser['dni']){ ?>
		<form method="POST" action="../comentar.php?id=<?php echo $id ?>">
			<textarea name="coment" placeholder="Escribe tu comentario..." class="form-control" required></textarea>
			<button class="btn btn-default" type="submit">Comentar &raquo;</button>
			<br><br>
		</form>
		<?php }
			$query=mysql_query("SELECT * FROM comentario WHERE idPublicacion='$id' ORDER BY idComentario DESC"); 
			if((mysql_num_rows($query)==0) && ($owner==$datosUser['dni'])){ ?>
				<div class="emptyComment" style="border-top:thin dotted;">
					<font size=4><b Style="color:#0404B4">No hay comentarios realizados sobre este producto</b></font><br>
				</div>
			<?php }
			if(mysql_num_rows($query)>5){
				for($i=1;$i<=5;$i++){ 
					$row_coment=mysql_fetch_array($query, MYSQL_ASSOC); ?>
					<div class="comentario" style="border-top:thin dotted;">
						<br><p><?php echo $row_coment['texto']; ?></p>
						<?php if($_SESSION['nivel']==1){ 
									$idComentario=$row_coment['idComentario']; ?>
									<div align="right"><a href="../borrarComentario.php?idComment=<?php echo $idComentario?>&idProduct=<?php echo $id ?>">Borrar comentario</a></div>  
								<?php } ?>
					</div> <?php
				}
			}
			else{
				if(mysql_num_rows($query)>0){
					$num_rows=mysql_num_rows($query);
					for($i=1;$i<=$num_rows;$i++){ 
						$row_coment=mysql_fetch_array($query, MYSQL_ASSOC); ?>
						<div class="comentario" style="border-top:thin dotted;">
							<br><b><?php echo $row_coment['texto']; ?></b>
							<?php if($_SESSION['nivel']==1){ 
									$idComentario=$row_coment['idComentario']; ?>
									<div align="right"><a href="borrarComentario.php?idComment=<?php echo $idComentario?>&idProduct=<?php echo $id ?>">Borrar comentario</a></div>
								<?php } ?>
						</div><?php
					}
				}
			}
		?>
	</div>
	<br><br>
	<div class="modificado">
		<?php 
			if(isset($_GET['mensaje'])){ ?> 
				<h3 Style="color:#0000FF"><?php echo $_GET['mensaje']; ?> </h3>
			<?php }
		?>
	</div>
	<div class="admin">
		<?php if($_SESSION['nivel']==1){ ?>
			<a class="btn btn-primary btn-lg" href="../deletePublicacion.php/?idprod=<?php echo $id ?>" role="button">Eliminar publicación &raquo;</a><br><br>
		<?php } ?>
	</div>
	<?php if($_SESSION['login_user']!=""){ ?>
		<a class="btn btn-primary btn-lg" href="../index.php" role="button">Volver &raquo;</a> 
	<?php }	
		else { ?>
		    <a class="btn btn-primary btn-lg" href="../index.php" role="button">Volver &raquo;</a>
	<?php } }?>
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
