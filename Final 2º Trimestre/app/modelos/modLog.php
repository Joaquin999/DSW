<?php
class modLog{

    public function __construct(){

    }


    function entrar(){
       $pass = $_POST["pass"];
       $_SESSION["nombre"]  = $_POST["nombre"];
       $_SESSION["ip"] = $_POST["ip"];
       $_SESSION["pass"] = $_POST["pass"];
       $_SESSION["user"] = $_POST["user"];

      $BD = new BD();

      if($BD->ConexionPDO == "Conexión fallida"){

        $_SESSION["msg"] = $BD->ConexionPDO;
        redireccionar("log/Index");

      }else{

      redireccionar("Principal/Index");
      }
    }

}



 ?>
