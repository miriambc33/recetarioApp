<?php 

/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");*/

session_start();

$server= "localhost";
$username ="root";
$password="";
$dbname ="mi_recetario";

//Conexión a la base de datos
$conn = new mysqli($server, $username, $password, $dbname);

//Si la conexión da error, muestrame el último mensaje de error
if ($conn->connect_error) {
    die("Conexión fallida" . $conn->connect_error );
}
//echo "Conexión exitosa";


?>