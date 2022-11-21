<?php 
    /*
    * GET: Obtener todos los ingredientes
    */

    include ("conexion.php"); 

    // Definimos los tipos que vamos a usar
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $query = "SELECT * FROM ingredientes";
        $result = mysqli_query($conn, $query);    
        
        header("HTTP/1.1 200 OK");
        echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    } 

?>