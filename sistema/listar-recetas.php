<?php include("API/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="icon" type="image/jpg" href="./assets/img/cocinando.png" />

  <title>Mi recetario personal</title>
</head>

<body>
  <div class="card">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Recetas</a>
        <form class="d-flex">
          <!-- Funcion onkeyup para el buscador de recetas por nombre -->
          <input class="form-control me-2" id="filtrar" type="text" placeholder="Buscar receta" aria-label="Search" onkeyup="search()">
          <a class="btn btn-outline-success" aria-current="page" href="paginaprincipal.php">Volver</a>

        </form>
      </div>
  </div>
  </nav>

  <!-- Construimos la tabla donde aparecerá el listado de recetas creadas -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-primary">
        <thead>
          <div>
            <?php

            if (isset($_GET['success']) && $_GET['success'] == 1) {
              echo
              "<div class='alert alert-success' role='alert'>La receta se ha borrado correctamente</div>";
              // $mensaje = 'Receta eliminada correctamente';
            } else if (isset($_GET['success']) && $_GET['success'] == 0) {
              // $mensaje = 'La receta no se ha podido eliminar';
              echo "<div class='alert alert-danger' role='alert'> La receta no se ha podido eliminar</div>";
            }

            ?>

          </div>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nº Comensales</th>
            <th>Tiempo(min)</th>
            <th>Dificultad</th>
            <th>Ingredientes</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Foto</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tablaRecetas">
        </tbody>
      </table>


    </div>

  </div>



  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="JS/borrarReceta.js"></script>
  <script src="JS/listarRecetas.js"></script>
  <script src="JS/buscarReceta.js"></script>
  <script src="JS/abrirModal.js"> </script>

</body>

</html>