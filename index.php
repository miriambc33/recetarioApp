<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>

<!-- Formulario de inicio de sesión -->
     <form action="login/login.php" method="post">
     	<h2>INICIO DE SESIÓN</h2>
		<p>Por favor, introduce tus datos:</p>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
  
     	<input type="text" name="uname" placeholder="Usuario"><br>


     	<input type="password" name="password" placeholder="Contraseña"><br>

     	<button type="submit">Iniciar sesión</button>
     </form>
</body>
</html>