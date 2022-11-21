<?php 
session_start(); 
include "conexion.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../index.php?error=Introduce tu usuario");
	    exit();
	}else if(empty($pass)){
        header("Location: ../index.php?error=Introduce tu contraseña");
	    exit();
	}else{

		// Consulta a la base de datos
		$sql = "SELECT * FROM usuarios WHERE usuario='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $uname && $row['password'] === $pass) {
            	$_SESSION['usuario'] = $row['usuario'];
            	$_SESSION['nombre'] = $row['nombre'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ../sistema/paginaprincipal.php");
            }else{
				header("Location: ../index.php?error=Usuario o contraseña incorrectos");
			}
		}else{
			header("Location: ../index.php?error=Usuario o contraseña incorrectos");
		}
	}
}else{
	header("Location: ../index.php");
	exit();
}