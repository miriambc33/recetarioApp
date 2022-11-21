<?php

$servername= "localhost";
$username= "root";
$password = "";
$db_name = "mi_recetario";

// Creamos la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}