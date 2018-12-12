<?php
if(!isset($_SESSION["nombre"])){
  redireccionar("Log/Index");
} 
require_once '../app/vistas/importador/elementos/header.php' ;
$BD = new BD();

    $archivos = scandir("../app/upload/importador");;
    array_shift($archivos);
    array_shift($archivos);
    if(empty($archivos)){
      $archivos[0] = "No hay archivos";
    }
?>
<div class="row">
  <div class="pricing_header pb-md-4 mx-auto text-center">
  <h1 class='display-4'>Importar Archivos JSON</h1>
  </div>
</div>
<div class="row">
<div class="col-md-4">


<h5 class="card-title">Subir Archivos</h5><div class="card" >
  <div class="card-body">


    <form action="<?php echo RUTA_URL . "importador/subir"; ?>" method="POST" enctype="multipart/form-data" class='form-group'>
    Selecciona un archivo: <input class="form-control" type="file" name="fileToUpload"><br><br>
    <input type="submit" name="subir" class="btn btn-info" value="Subir Archivo">
    </form>
  </div>
</div>


</div>
<div class="col-md-4">
<div class="panel panel-primary" id="result_panel">
    <div class="panel-heading"><h3 class="panel-title">Result List</h3>
    </div>
    <div class="panel-body">
        <ul class="list-group" id="archivos">
          <?php
          if($archivos[0]=="No hay archivos"){
            echo "<p><strong>No hay Archivos</strong></p>";
          }else{
            foreach ($archivos as $key => $value) {
              echo '<li class="list-group-item" onclick="iluminar(this)"><strong>';
              echo "<a href='#'>".ucwords($value)."</a>";
              echo "</strong></li>";
            }
          }
            ?>
        </ul>
        <form method="POST" action="<?php echo RUTA_URL. "Importador/Insertar"; ?>" class="form-group">
          <input type="hidden" id="valor" name="nombre" value="" />
          <input type="hidden" id="valor2" name="tabla" value="" />
            <br/>
          <input type="submit" value="Insertar" id="insertar" class="btn btn-info" disabled//>
        </form>
         </div>
     </div>
   </div>
   <div class="col-md-4">
   <div class="panel panel-primary" id="result_panel">
       <div class="panel-heading"><h3 class="panel-title">Tablas</h3>
       </div>
       <div class="panel-body">
           <ul class="list-group" id="tablas">
             <?php
             foreach ($BD->Tablas as $key => $value) {
               echo '<li class="list-group-item" onclick="iluminar2(this)"><strong>';
               echo "<a href='#'>".ucwords($value)."</a>";
               echo "</strong></li>";
             }
               ?>
           </ul>
            </div>
        </div>
      </div>
</div>
<?php
require_once '../app/vistas/importador/elementos/footer.php' ;?>
