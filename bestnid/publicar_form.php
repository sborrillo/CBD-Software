<?php
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

    <title>BestNid - Registrarse</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/signin.css" rel="stylesheet">

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

    <div class="container">
      <form class="form-signin" method="POST" action="register.php">
        <h2 class="form-signin-heading">Completa los datos</h2>
		<label for="username" class="sr-only">Nombre de usuario</label>
		<input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
        <label for="inputEmail" class="sr-only">Correo Electronico</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Correo Electronico" required>
		<label for="inputName" class="sr-only">Nombre</label>
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Nombre" required>
		<label for="inputLastName" class="sr-only">Apellido</label>
        <input type="text" id="inputLastName" name="lastName" class="form-control" placeholder="Apellido" required>
		<label for="inputDni" class="sr-only">DNI</label>
        <input type="number" id="inputDni" name="dni" maxlength=7 class="form-control" placeholder="DNI" required>
		<label for="inputCity" class="sr-only">Localidad</label>
        <input type="text" id="inputCity" name="city" class="form-control" placeholder="Localidad" required>
		<label for="inputStreet" class="sr-only">Calle</label>
        <input type="text" id="inputStreet" name="street" class="form-control" placeholder="Calle" required>
		<label for="inputNumber" class="sr-only">Número</label>
        <input type="number" id="inputNumber" name="number" class="form-control" placeholder="Número" required>
		<label for="inputDepto" class="sr-only">Depto</label>
        <input type="text" id="inputDepto" name="depto" class="form-control" placeholder="Depto">
		<label for="inputFloor" class="sr-only">Piso</label>
        <input type="text" id="inputFloor" name="floor" class="form-control" placeholder="Piso">		
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="pass1" class="form-control" placeholder="Contraseña " required>
        <label for="inputPassword2" class="sr-only">Contraseña2</label>
        <input type="password" id="inputPassword2" name="pass2" class="form-control" placeholder="Repetir Contraseña" required>
		<br>
        <button name="send" id="send" class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
		<?php if(isset($_SESSION['login_user'])){ ?>
						<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="window.location.href='gestionUsuarios.php'">Cancelar</button> <?php
				}else{ ?>
					<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="window.location.href='index.php'">Cancelar</button> <?php } ?>
      </form>

		<?php 
			if(empty($_POST) && !empty($_SESSION['errors'])){ ?>
				<div>
				<?php
				foreach($_SESSION['errors'] as $value){ ?>
					<br><b><?php echo '*' .$value; ?></b>
				<?php }?>
				</div>
			<?php
			}		
		?>

    </div> <!-- /container -->
	<hr>
      <footer>
        <p align="center">&copy; Desarrollado por CBD</p>
      </footer>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
