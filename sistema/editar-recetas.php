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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">Editar Receta</a>
      <form class="d-flex">
        <a class="btn btn-outline-success" aria-current="page" href="listar-recetas.php">Volver</a>
      </form>
    </div>
    </div>
  </nav>

  <div class="card-body">


    <!-- Creamos el formulario donde se introducirán las nuevas recetas -->
    <!-- Una vez hagamos click en crear la receta nos dirigirá a listar-recetas, es decir, a través del método POST enviará los datos a listar-recetas-->
    <form action="http://localhost/recetarioAppWeb/sistema/API/editar-recetas.php" method="POST">
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
        <label for="" class="form-label">Ingredientes:</label>

        <select id="ingredientes" name="ingredientes[]" multiple class="form-control" style="height: 200px;">

          <!-- <script src="JS/obtenerIngredientes.js"></script> -->


        </select>

      </div>

      <div class="mb-3">
        <label for="" class="form-label">Descripción:</label>
        <textarea rows="4" type="text" class="form-control" name="descripcion" aria-describedby="helpId" formControlName="descripcion" placeholder="Introduce la descripción de la receta">
      </textarea>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Tipo:</label>

        <select class="form-control" aria-describedby="helpId" formControlName="tipo" name="id_tipos" id="id_tipos">


          <!-- <script src="JS/obtenerTipos.js"></script> -->

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
        <input type="submit" class="btn btn-primary" name="actualizar_receta" value="Actualizar">
      </div>
    </form>
  </div>


  <script>
    //Forma de atacar al servicio REST
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://localhost/recetarioAppWeb/sistema/API/recetas.php?id=<?php echo $_GET['id']; ?>", false); // false for synchronous request
    xmlHttp.send(null);
    //console.log(xmlHttp.responseText);

    //Convertimos en objeto
    var receta = JSON.parse(xmlHttp.responseText);

    //Obtenemos el valor por el identificador
    document.getElementById("nombre").value = receta.nombre;
    document.getElementById("descripcion").value = receta.descripcion;
    document.getElementById("ingredientes").value = receta.ingredientes;
    document.getElementById("dificultad").value = receta.dificultad;
    document.getElementById("tiempo_min").value = receta.tiempo_min;
    document.getElementById("cantidad_pax").value = receta.cantidad_pax;
    document.getElementById("id_tipos").value = receta.nombre;
    document.getElementById("cantidad").value = receta.cantidad;
    document.getElementById("foto_url").value = receta.foto_url;
  </script>



  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>