<?php
class modPrincipal{

     public function __construct(){

     }

     function borrarCol($datos){
       if(isset($datos[1])){
         $tabla = htmlentities($datos[1]);
         $BD = new BD($tabla);
       }else{
         redireccionar("Principal/Index");
         $_SESSION["msg"] = "No se ha seleccionado tabla";
       }

       if(isset($datos[0])){
         $columna = htmlentities($datos[0]);
       }else{
         redireccionar("Principal?tab=".$tabla);
         $_SESSION["msg"] = "No se ha seleccionado columna";
       }


       try{

         $sth = $BD->ConexionPDO->prepare('Alter table '.$tabla.' DROP COLUMN '. $columna .';');
         $sth->execute();

       }catch (Exception $e){
         redireccionar("Principal?tab=".$tabla);
         $_SESSION["msg"] = "Error al borrar la columna";

       }
       redireccionar("Principal?tab=".$tabla);
       $_SESSION["msg"] = "Columna Borrada con exito";

     }


     function crearCol($datos){
       isset($datos[0]) ? $datos[0]=htmlentities($datos[0]): redireccionar("Principal") and $_SESSION["msg"] = "No hay tabla seleccionada";
       isset($datos[1]) ? $datos[1]=htmlentities($datos[1]): redireccionar("Principal/Index?tab=".$datos[0]) and $_SESSION["msg"] = "No se ha seleccionado columna";
       isset($datos[2]) ? $datos[2]=htmlentities($datos[2]) : redireccionar("Principal/Index?tab=".$datos[0]) and $_SESSION["msg"] = "No se ha seleccionado tipo";
       var_dump($datos);
       $BD = new BD($tabla);

       try{

         $sth = $BD->ConexionPDO->prepare('Alter table '.$datos[0].' ADD COLUMN '. $datos[1] .' ' .$datos[2]);
         $sth->execute();

       }catch (Exception $e){

         $_SESSION["msg"] = "Error al añadir la columna";
         redireccionar("Principal/Index?tab=".$datos[0]);

       }

       $_SESSION["msg"] = "Columna Añadida con exito";
       redireccionar("Principal/Index?tab=".$datos[0]);

     }


     function insertar($registros=""){
       try{
         $tabla = $_SESSION["tabla"];
         $todo = Array();
         $BD = new BD($tabla);
         $cadena = "";

         for($i = 0;$i<count($BD->Columnas);$i++){
           $todo[$i] = $registros[$i];
         }

         foreach ($todo as $key => $value) {
           $cadena = $cadena . "'" . $value . "',";
         }
         $cadena = trim($cadena,",");
         $total = Array($tabla,$cadena);
         $BD->Insertar($total);


         $_SESSION["msg"] = "Los datos se insertaron con exito";
         redireccionar("Principal/Index?tab=".$tabla);

       }catch(Exception $e){

         $_SESSION["msg"] = $e;//"Hubo un error en la inserción";
         redireccionar("Principal/Index?tab=".$tabla);

       }
    }
       function filtrar($busqueda=""){

         $tabla = htmlentities($_SESSION["tabla"]);
         $buscado = htmlentities($busqueda[0]);
         $BD = new BD($tabla);


         $busquemos = "";
             for ($i = 0; $i < $BD->NumeroColumnas; $i++) {
                     $busquemos = $busquemos . $BD->Columnas[$i] . " like " . "'%" . $buscado . "%' or ";
                 }
         $total = trim($busquemos," or ");

         try{

           $_SESSION["busqueda"] = $total;

         }catch (Exception $e){

           redireccionar("Principal/Index?tab=".$tabla);

         }

         redireccionar("Principal/Index?tab=".$tabla);

       }

       function cancelarBusqueda(){
         if(isset($_SESSION["busqueda"])){
           unset($_SESSION["busqueda"]);
           $_SESSION["msg"] = "Se borró el filtro con exito";
           redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);

         }else{
           $_SESSION["msg"] = "No hay ningún filtro que borrar";
           redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);
         }

       }

       function editar($parametros=""){
         $tabla = htmlentities($_SESSION["tabla"]);
         $BD = new BD($tabla);

         try{

           $id = $parametros[0];
           $string = "";
           $update = Array();

           for($i = 1;$i<count($BD->Columnas);$i++){
             $nombre = $BD->Columnas[$i];
             $update["$nombre"] = htmlentities($parametros[$i]);
           }

           foreach ($update as $clave => $valor) {
             $string = $string . " " .$clave. " = '" . $valor ."',";
           }
           $string = trim($string,",");
           $sth = $BD->ConexionPDO->prepare('update '.$tabla.' set '. $string . ' where '. $BD->Columnas[0].' = '.$id);
           $sth->execute();

         }catch (Exception $e){

           $_SESSION["msg"] = "Error al actualizar el registro";
           redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);

         }

         $_SESSION["msg"] = "Registro Actualizado con exito";
         redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);
       }

       function eliminar($parametros=""){


         $tabla = htmlentities($_SESSION["tabla"]);
         $id = htmlentities($parametros[0]) ;
         $BD = new BD($tabla);

         try{

           $sth = $BD->ConexionPDO->prepare('Delete from '.$tabla.' where '. $BD->Columnas[0].' = "'.$id.'"');
           $sth->execute();

         }catch (Exception $e){

           $_SESSION["msg"] = "Error al borrar el registro";
           redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);

         }

         $_SESSION["msg"] = "Registro Borrado con exito";
         redireccionar("Principal/Index?tab=".$_SESSION["tabla"]);


       }
       function salir(){
         session_destroy();
         redireccionar("Log/Index");
         session_start();
         $_SESSION["msg"] = "Desconectado con Éxito";
       }


}
