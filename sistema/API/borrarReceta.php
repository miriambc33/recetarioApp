<?php

include("conexion.php");


if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "DELETE FROM ingredientes_recetas WHERE id_recetas='$id'";


    $result = mysqli_query($conn, $query);

    if ($result === true) {
        $query = "DELETE FROM recetas WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if ($result === true) {
            header("Location: http://localhost/recetarioAppWeb/sistema/listar-recetas.php?success=1");
        } else {
            header("Location: http://localhost/recetarioAppWeb/sistema/listar-recetas.php?success=0");
        }
    }
}
