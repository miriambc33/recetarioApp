<?php


if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $foto_url = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($foto_url));


        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'mi_recetario';
        
        $conn = mysqli_connect("localhost","root","","mi_recetario");
        
        // Cerciorar la conexion
        if($dbname->connect_error){
            die("Connection failed: " . $dbname->connect_error);
        }

        //Insertar imagen en la base de datos
        $insertar = $db ->query("INSERT into recetas (foto_url) VALUES ('$imgContenido', now())");
        // COndicional para verificar la subida del fichero
        if($insertar){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}
?>