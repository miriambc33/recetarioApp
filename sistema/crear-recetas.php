<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="icon" type="image/jpg" href="../assets/img/cocinando.png" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Mi recetario personal</title>
</head>

<body>
  <div class="card">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Crear Receta</a>
        <form class="d-flex">
          <a class="btn btn-outline-success" aria-current="page" href="paginaprincipal.php">Volver</a>
        </form>
      </div>
  </div>
  </nav>

  <div class="card-body">


    <!-- Creamos el formulario donde se introducirán las nuevas recetas -->
    <!-- Una vez hagamos click en crear la receta nos dirigirá a listar-recetas, es decir, a través del método POST enviará los datos a listar-recetas-->
    <form action="http://localhost/recetarioAppWeb/sistema/API/recetas.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3" style="display:none;">
        <label for="" class="form-label">ID Usuario:</label>
        <input type="text" class="form-control" name="id_usuarios" formControlName="id_usuarios" value="<?php echo $_SESSION['id']; ?>" aria-describedby="helpId" placeholder="" />
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" formControlName="nombre" aria-describedby="helpId" placeholder="Introduce el título de la receta" />
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Cantidad comensales:</label>
        <input type="text" class="form-control" name="cantidad_pax" formControlName="cantidad_pax" aria-describedby="helpId" placeholder="Introduce los comensales" />
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Tiempo:</label>
        <input type="text" class="form-control" name="tiempo_min" aria-describedby="helpId" formControlName="tiempo_min" placeholder="Introduce el tiempo de elaboración" />
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Dificultad:</label>
        <input type="text" class="form-control" name="dificultad" aria-describedby="helpId" formControlName="dificultad" placeholder="Introduce la dificultad de la receta" />
      </div>

      <div class="mb-3">
        <label for="" class="form-check-label">Ingredientes:</label>

        <div id='ingredientes' name="ingredientes[]" multiple class="form-control" style="height: 200px;">

          <script src="JS/obtenerIngredientes.js"></script>

        </div>

      </div>


      <div class="mb-3">
        <label for="" class="form-label">Descripción:</label>
        <textarea rows="4" type="text" class="form-control" name="descripcion" aria-describedby="helpId" formControlName="descripcion" placeholder="Introduce la descripción de la receta">
      </textarea>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Tipo:</label>

        <select class="form-control" aria-describedby="helpId" formControlName="tipo" name="id_tipos" id="id_tipos">

          <script src="JS/obtenerTipos.js"></script>

        </select>

      </div>

      <!-- <div class="mb-3">
        <label for="" class="form-label">Imagen:</label>
        <div><input type="file" class="form-control" name="image" id="image" multiple aria-describedby="helpId" formControlName="imagen" placeholder="Introduce una foto de la receta" />
          <br>
          <input type="submit" name="cargarImagen" class="btn" style="background-color: green; color: white" value="Cargar Imagen">
        </div>
      </div> -->

      <div class="btn-group" role="group" aria-label="Button group name">
        <!-- Cuando el usuario presione el botón se llamará a la función enviarDatos -->
        <button type="submit" class="btn btn-primary" name="guardar_receta">Agregar receta</button>
      </div>
    </form>

    <!-- Modal ERROR -->
    <button id="abrirModalError" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalError" style="display:none;">
    </button>
    <div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="exampleModalLabelError" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelError">Error</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Todos los campos son obligatorios
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal CORRECTO -->
    <button id="abrirModalCorrecto" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCorrecto" style="display:none;">
    </button>
    <div class="modal fade" id="modalCorrecto" tabindex="-1" aria-labelledby="exampleModalLabelCorrecto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelCorrecto">Información</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Receta insertada correctamente.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      //Para obtener los parámetros recibidos en el formulario de recetas y saber si es error o no
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      console.log(urlParams);

      $(document).ready(function() {
        //Si error existe porque todos los campos no están rellenos, abre el modal ERROR
        if (urlParams.get("error") != null && urlParams.get("error") == "1") {
          //alert("Todos los campos son obligatorios");
          $("#abrirModalError").click();
        }
        //Si todo se ha rellenado correctamente, registra la receta y abre el modal EXITO
        else if (urlParams.get("success") != null && urlParams.get("success") == "1") {
          $("#abrirModalCorrecto").click();
        }

      });
    </script>

  </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>