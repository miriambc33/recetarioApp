<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="icon" type="image/jpg" href="../assets/img/cocinando.png" />

  <title>Mi recetario personal</title>
</head>

<body>
  <!-- Creamos la barra de navegación -->
  <nav class="navbar navbar-expand-lg" style="background-color: #C2F7BA;">
    <div class="container-fluid">
      <a class="navbar-brand" style="color:#000000">Página principal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        
        </li>
        <li class="nav-item">
         
        </li>
      </ul>
    </div> -->
      <div>
        <!-- Si queremos cerrar sesión -->
        <?php
        session_start();

        if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {

        ?>
          <a href="../login/logout.php" class="btn" style="background-color:#3FBF3F; font-weight: bold;">Cerrar sesión</a>
        <?php
        } else {
          header("Location: index.php");
        }
        ?>
      </div>
    </div>

  </nav>


  <div style="
    min-height: calc(
      100vh - 57px
    ); 
    background-image: url('../assets/img/food-with-ingredients.jpg');
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
  ">
    <header>
      <br>
      <h1 class="site-heading text-center text-faded d-none d-lg-block" style="color:#FFFFFF">
        Hola <?php echo $_SESSION['nombre']; ?>, bienvenid@ a mi recetario personal
      </h1>
    </header>
    </br> </br> </br> </br>
    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">

          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper" style="color:#FFFFFF">¡Entra, elige receta y saborea!</span>
            </h2>
            <p class="mb-3" style="color:#FFFFFF">Y si te atreves...¡crea la tuya!</p>
            <div class="intro-button mx-auto"><a class="btn btn-xl" href="listar-recetas.php" style="background-color:#3FBF3F; font-weight: bold; color:#000000">Ver recetas</a></div> </br>
            <div class="intro-button mx-auto"><a class="btn btn-xl" href="crear-recetas.php" style="background-color:#3FBF3F; font-weight: bold; color:#000000">Crear receta</a></div>
          </div>
        </div>
      </div>
    </section>
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner bg-faded text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper" style="color:#FFFFFF">Mi Promesa</span>
              </h2>
              <p class="mb-0" style="color:#FFFFFF">Además de crear recetas más actuales, podemos almacenar recetas familiares y tradicionales para que perduren en el tiempo.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>




  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>