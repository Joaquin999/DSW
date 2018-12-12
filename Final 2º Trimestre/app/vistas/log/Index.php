<?php
require_once '../app/vistas/log/elementos/header.php';
 ?>
<body>

    <div class="col-md-12 text-center">

      <div class="pricing_header py-3  mx-auto text-center">
        <h1 class='display-4'>Introduce los Datos de la Conexión</h1>
      </div>

<br/>
<div class="row"><div class="col-md-3"></div>
  <div class="col-md-6">

    <?php
    if(isset($_SESSION["msg"])){
    echo '<div class="alert alert-danger">'.  $_SESSION["msg"].   '</div>';
    unset ($_SESSION["msg"]);
    }
    ?>

        <div class="form-group">
      <form action="<?php echo RUTA_URL."log/entrar"; ?>" method="POST">
     <label for="nombre">Nombre de la Base de Datos</label>
     <input type="text" class="form-control" id="nombre" name="nombre">

     <label for="user">Usuario</label>
     <input type="text" class="form-control" id="user" name="user">

     <label for="pass">Contraseña</label>
     <input type="password" class="form-control" id="pass" name="pass">

     <label for="ip">IP</label>
     <input type="text" class="form-control" id="ip" name="ip">

     <br/>
     <button type="submit" class="btn btn-primary">Conectar</button>
      </form>
    </div>
    </div>
   </div>
  </div><!-- DIV COL -->
<!-- DIV ROW -->
<?php
require_once '../app/vistas/log/elementos/footer.php';
 ?>
