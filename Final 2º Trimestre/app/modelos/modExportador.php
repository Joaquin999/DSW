<?php
class modExportador{

    public function __construct(){

    }


    function ExpJSON(){
      $tabla = $_SESSION["tabla"];
      $BD = new BD($tabla);
      if(isset($_SESSION["busqueda"])){
        $total = json_encode($BD->getJSON($tabla,$_SESSION["busqueda"]));
      }else{
        $total = json_encode($BD->getJSON($tabla));
      }


      header("Content-type:application/json");
      print $total;
    }

}



 ?>
