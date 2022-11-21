<?php
/*
    * GET: Obtener todas las recetas
    * GET[id]: Obtener los datos de una receta
    * PUT[id]: Actualizar los datos de una receta
    * POST: Insertar una nueva receta
    */

include("conexion.php");

// Definimos los tipos que vamos a usar
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //Si recibimos "id", devolvemos una receta
    if (isset($_GET['id'])) {

        // Hay que recorrer las filas para poder pintar las recetas
        $query = "SELECT * FROM recetas WHERE id=" . $_GET['id'];
        $result_recetas = mysqli_query($conn, $query);

        header("HTTP/1.1 200 OK");
        echo json_encode(mysqli_fetch_assoc($result_recetas));
    } else {
        //Si no se recibe parametro "id", significa que mostramos todas las recetas

        // Hay que recorrer las filas para poder pintar las recetas
        $query = "SELECT r.*,t.nombre as nombre_tipo FROM recetas r INNER JOIN tipos t ON t.id=r.id_tipos";
        $result_recetas = mysqli_query($conn, $query);

        header("HTTP/1.1 200 OK");
        echo json_encode(mysqli_fetch_all($result_recetas, MYSQLI_ASSOC));
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //$_POST['ingredientes'] = implode(', ', $_POST['ingredientes']);
    //die(var_dump($_POST['ingredientes']));

    //Si hemos recibido los datos, validamos que no sea blanco. 
    if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['cantidad_pax']) && $_POST['cantidad_pax'] != "" && isset($_POST['tiempo_min']) && $_POST['tiempo_min'] != "" && isset($_POST['dificultad']) && $_POST['dificultad'] != "" && isset($_POST['descripcion']) && $_POST['descripcion'] != "" /*&& isset($_POST['foto_url']) && $_POST['foto_url'] != ""*/ && isset($_POST['id_tipos']) && $_POST['id_tipos'] != "" && isset($_POST['id_usuarios']) && $_POST['id_usuarios'] != "") {

        $nombre = $_POST['nombre'];
        $cantidad_pax = $_POST['cantidad_pax'];
        $tiempo_min = $_POST['tiempo_min'];
        $dificultad = $_POST['dificultad'];
        $descripcion = $_POST['descripcion'];
        //$foto_url = $_POST['foto_url'];
        $id_tipos = $_POST['id_tipos'];
        $id_usuarios = $_POST['id_usuarios'];
        $ingredientes = implode(', ', $_POST['ingredientes']);
        $ingredientes = explode(",", $ingredientes);
        //var_dump($ingredientes);
        //die();

        //Hacemos un INSERT en la tabla recetas
        $query = "INSERT INTO recetas (nombre, cantidad_pax, tiempo_min, dificultad, descripcion, foto_url, id_tipos, id_usuarios) VALUES 
            ('" . $nombre . "','" . $cantidad_pax . "','" . $tiempo_min . "','" . $dificultad . "', '" . $descripcion . "', '', " . $id_tipos . ", " . $id_usuarios . " )";
        //ejecutar la consulta
        $result = mysqli_query($conn, $query);
        $idReceta = $conn->insert_id;

        for ($i = 0; $i < count($ingredientes); $i++) {
            //Hacemos uno o varios INSERT en la tabla ingredientes_recetas
            $query = "INSERT INTO ingredientes_recetas (cantidad, id_recetas, id_ingredientes) VALUES 
                (''," . (int)$idReceta . "," . (int)$ingredientes[$i] . ")";
            //ejecutar la consulta
            $result = mysqli_query($conn, $query);
        }

        //Si ha ido todo correcto, redirigimos a la página correspondiente
        header("Location: http://localhost/recetarioAppWeb/sistema/crear-recetas.php?success=1");
        //redireccionar a la pagina principal

    } else {
        header("Location: http://localhost/recetarioAppWeb/sistema/crear-recetas.php?error=1");
    }
}


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST["cargarImagen"])) {
//         $revisar = getimagesize($_FILES["image"]["tmp_name"]);
//         if ($revisar !== false) {
//             $foto_url = $_FILES['image']['tmp_name'];
//             $imgContenido = addslashes(file_get_contents($foto_url));


//             $Host = 'localhost';
//             $Username = 'root';
//             $Password = '';
//             $dbName = 'mi_recetario';

//             $conn = mysqli_connect("localhost", "root", "", "mi_recetario");

//             // Cerciorar la conexion
//             if ($db->connect_error) {
//                 die("Connection failed: " . $db->connect_error);
//             }

//             //Insertar imagen en la base de datos
//             $insertar = $db->query("INSERT into recetas (foto_url) VALUES ('$imgContenido', now())");
//             // COndicional para verificar la subida del fichero
//             if ($insertar) {
//                 echo "Archivo Subido Correctamente.";
//             } else {
//                 echo "Ha fallado la subida, reintente nuevamente.";
//             }
//             // Sie el usuario no selecciona ninguna imagen
//         } else {
//             echo "Por favor seleccione imagen a subir.";
//         }
//     }
// }



        /*if (isset($_POST['id']) && empty($_POST['id'])) {
        //crear la consulta
        $query = "INSERT INTO recetas(nombre, cantidad_pax, tiempo_min, dificultad, descripcion, foto_url, id_tipos) VALUES 
        ('$nombre','$cantidad_pax','$tiempo_min','$dificultad', '$descripcion', '$foto_url', '$id_tipos' )";
        //ejecutar la consulta
        $result = mysqli_query($conn, $query);
        //comprobar el resultado de la consulta
        if ($result) {
            echo "Registro insertado correctamente";
            //redireccionar a la pagina principal
            
        } else {
            echo "Error al insertar el registro";
        }*/