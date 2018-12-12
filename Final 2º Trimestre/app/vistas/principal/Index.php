<?php
if(!isset($_SESSION["nombre"])){
  redireccionar("Log/Index");
}
require_once("../app/vistas/principal/elementos/header.php");
if (isset($_GET["tab"])){
    $tabla = $_GET["tab"];
    if(isset($_SESSION["tabla"])){
      if($tabla != $_SESSION["tabla"]){
        unset($_SESSION["busqueda"]);
      }
    }
    $_SESSION["tabla"] = $tabla;
    $BD = new BD($tabla);

    $NameTablas = $BD->Tablas;
    $Columnas = $BD->Columnas;
    $NumeroCol = $BD->NumeroColumnas;
}else{
  $BD = new BD();
  $NameTablas = $BD->Tablas;
}

require_once 'elementos/navegador.php';
?>
    <div class="row">
      <?php
      if(isset($tabla)){
?>

<div class="col-md-2">
    <div class="col-md-12 sidebar-offcanvas">
        <div class="list-group ">
            <a class="list-group-item" data-toggle="collapse" href="#collapseInsert" role="button" aria-expanded="false" aria-controls="collapseInsert">Insertar datos</a>
            <a class="list-group-item" data-toggle="collapse" href="#collapseCreaC" role="button" aria-expanded="false" aria-controls="collapseCreaC">Crear columna</a>
            <a class="list-group-item" data-toggle="collapse" href="#collapseBorraC" role="button" aria-expanded="false" aria-controls="collapseBorraC">Eliminar columna</a>
            <a class="list-group-item list-group-item-info" data-toggle="collapse" href="#collapseFiltro" role="button" aria-expanded="false" aria-controls="collapseFiltro">Filtrar datos</a>

            <a class="list-group-item list-group-item-danger" href="<?php echo RUTA_URL. "Principal/cancelarBusqueda" ?>">Borrar filtro</a>
            <a class='list-group-item' href='<?php echo RUTA_URL. "exportador/Index" ?>'>Exportar a XML</a>
            <a class='list-group-item' href='<?php echo RUTA_URL. "exportador/ExpJSON" ?>'>Exportar a JSON</a>
            <a class='list-group-item' href='<?php echo RUTA_URL. "importador/Index" ?>'>Importar JSON</a>


        </div>
        <br/>
        <?php
            require_once '../app/vistas/principal/elementos/crearColForm.php';
            require_once '../app/vistas/principal/elementos/borrarColForm.php';
            require_once '../app/vistas/principal/elementos/crearInserts.php';
            require_once '../app/vistas/principal/elementos/filtrar.php';
        ?>
            </div>
        </div>
        <div class="col-md-9 text-center">
                <?php
                echo "<h1 class='display-4' >Tabla actual:<br/><span id='actual'>" . ucwords(strtolower($tabla)) . "</span></h1><br/>";
                if(isset($_SESSION["msg"])){
                   if(strpos($_SESSION["msg"],"exito") != false){
                      $tipoMsg = "success";
                   }else{
                     $tipoMsg = "danger";
                   }
                    echo '<div class="alert alert-'.$tipoMsg.'">'.  $_SESSION["msg"].   '</div>';
                    unset ($_SESSION["msg"]);
                    unset ($tipoMsg);
                }

                echo "<div class='table-responsive text-center'>";
                echo "<table id='example' class='table text-center table-striped table-hover table-bordered'>";
                if(isset($_SESSION["busqueda"])){
                   $resultado = $BD->getRegistros($tabla,$_SESSION["busqueda"]);
                }else{
                   $resultado = $BD->getRegistros($tabla);
                }
                echo "<thead>";
                echo "<tr>";
                foreach ($Columnas as $valor) {
                    echo '<th>' . ucwords(strtolower($valor)) . '</th>';
                }
                echo"<th>Actualizar</th>";
                echo"<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                $n = 1;
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";
                    for ($i = 1; $i <= $NumeroCol; $i++) {
                        echo "<td>" .  $fila[$Columnas[$i-1]] . "</td>";
                    }
                    echo "<td> <button class='btn btn-success'  onclick='MuestraAct(" . $n . ")' data-toggle='modal' data-target='#ModalAct' >Actualizar</button></td>";
                    echo "<td> <button class='btn btn-danger' onclick='MuestraDel(" . $n . ",this)' type='submit' data-toggle='modal' data-target='#ModalDel' value=" .  $fila[$Columnas[0]] . ">Eliminar</button></td>";
                    $n++;
                }
                echo "</table>\n";
                ?>

            </div>
       </div>

       <div class="modal fade" id="ModalDel" role="dialog">
           <div class="modal-dialog">
               <!-- Modal Del-->
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">Borrar</h4>
                   </div>
                   <div class="modal-body">
                       <p id="parrafoDel"></p>
                   </div>
                   <div class="modal-footer">
                       <form class='form-group' method='POST' action='<?php echo RUTA_URL."Principal/eliminar" ?>'>
                       <button type="submit" class="btn btn-success" >Borrar</button>
                       <input type="hidden" name="valorDel" id="vDel" value="" />
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>

       <div class="modal fade" id="ModalAct" role="dialog">
           <div class="modal-dialog">

               <!-- Modal Act-->
               <div class="modal-content">
                   <div class="modal-header">
                       <div class="row">
                           <div class="col"><h2 class="titulo">Actualizar Registros</h2></div>
                       </div>
                   </div>
                   <?php
                   if (isset($tabla)) {
                       echo "<form class='form-group' method='POST' action='".RUTA_URL."principal/editar'>";
                   }
                   ?>
                   <div class="modal-body">
                     <div class="form-group row">
                        <label class="col-3 col-form-label"><?php echo $Columnas[0]?></label>
                           <div class="col-9">
                              <input class="form-control" id="valorAct1" name="vA1" type="text" readonly>
                          </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <div class="container">

                           <div class="row">
                               <div class="col">

                                   <div class="container">
                                       <?php
                                       for ($i = 1; $i <$NumeroCol; $i++) {
                                          echo '
                                           <div class="form-group row">
                                           <label class="col-3 col-form-label">' . $Columnas[$i] . '</label>
                                           <div class="col-9">
                                           <input class="form-control" id="valorAct'.($i+1).'" name="vA'.$Columnas[$i].'" type="text">
                                           </div>
                                           </div>
                                           ';
                                       }
                                       ?>
                                       <br/>
                                       <button type="submit" class="btn btn-success" >Enviar</button>
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                   </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <?php




     }else{//Todo lo que ocurriría si no existiera la variable $tabla, es decir, si no hubiera tabla seleccionada
       echo '<div class="col-md-12 sidebar-offcanvas">
       <div class="pricing_header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">';
       echo "<h1 class='display-4'>Bienvenido</h1>";
       echo '<p clas="lead">Selecciona una tabla del navegador y escoge una opcion para empezar</p>';
       echo '</div></div>';
     }
             ?>
    </div>
</div>
<?php
require_once("../app/vistas/principal/elementos/footer.php");
?>
