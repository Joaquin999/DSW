<?php
class modImportador{

    public function __construct(){

    }

    function subir(){
      if(isset($_POST["subir"])){
        $target_dir = "../app/upload/importador/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        redireccionar("importador/Index");
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $_SESSION["msg"] = "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subido con exito";
                redireccionar("importador/Index");
            } else {
                $_SESSION["msg"] = "Hubo un error al subir el archivo";
                redireccionar("importador/Index");
            }
         }
       }
    }
    function Insertar($parametros=""){
      $BD = new BD();
      $parametros[0]= lcfirst($parametros[0]);
      $parametros[1]= lcfirst($parametros[1]);

      $data = file_get_contents("../app/upload/importador/".$parametros[0]);
      $products = json_decode($data, true);
      $inserts = Array();
      foreach ($products as $key => $value) {
        $string = implode("','",$value);
        $string = "'".substr($string,0)."'";
        array_push($inserts,$string);
      }
      //array_unshift($inserts,$parametros[1]);
      var_dump($inserts);
      foreach ($inserts as $key => $value) {
        $aray = Array();
        array_push($aray,$parametros[1]);
        array_push($aray,$value);
        $BD->Insertar($aray);
      }
      redireccionar("Importador/Index");

    }

}
 ?>
