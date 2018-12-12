<?php


$_SESSION["nombre"]="ej";
$_SESSION["pass"]="over348";
$_SESSION["user"]="joaquin";
$_SESSION["ip"]="localhost";


class BD{


    public $Nombre;
    public $Contraseña;
    public $Usuario;
    public $IP;
    public $Puerto = '3306';
    public $NumeroColumnas;
    public $ConexionPDO;
    public $Columnas;
    public $Tablas;
    public $Dominios = Array();
    public $Nulos = Array();


    public function __CONSTRUCT($tabla = false){
      $this->Nombre = $_SESSION["nombre"];
      $this->Contraseña = $_SESSION["pass"];
      $this->Usuario = $_SESSION["user"];
      $this->IP = $_SESSION["ip"];

        try{
          $this->ConexionPDO = new PDO('mysql:host='.$this->IP.';port=$this->Puerto;dbname='.$this->Nombre, $this->Usuario, $this->Contraseña);
          $this->ConexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
          $this->ConexionPDO = "Conexión fallida";
          return $this->ConexionPDO;
        }

        $this->getTablas();
           if($tabla!==false){
             $this->getMetaDatos();
             $this->getColumnas();
           }

      }
      function getTablas(){
        $resultado = $this->ConexionPDO->query("SHOW FULL TABLES FROM $this->Nombre");
        $Aray=Array();
        $i = 0;
        while ($row = $resultado->fetch(PDO::FETCH_NUM)) {
          for($y=0;$y<count($row);$y++){
            $Aray[$i]=$row[0];
          }
          $i++;
        }
        $this->Tablas = $Aray;
      }

      function getColumnas(){
        $tabla = $_SESSION["tabla"];
        $resultado = $this->ConexionPDO->query("Describe $tabla");
        $Lista = Array("");
        $i = 0;
        while ($row = $resultado->fetch(PDO::FETCH_NUM)) {
          $Lista[$i] = $row[0];
          $i++;
        }
        $this->NumeroColumnas = count($Lista);
        $this->Columnas = $Lista;
        return $Lista;
      }

      function getMetaDatos(){
        $tabla = $_SESSION["tabla"];
        $resultado = $this->ConexionPDO->query("Describe $tabla");
        $i = 0;
        while ($row = $resultado->fetch(PDO::FETCH_NUM)) {
          for($r=0;$r<count($row);$r++){
            $this->Nulos[$row[0]] = "$row[2]";
            $this->Dominios[$row[0]]= "$row[1]";
          }
          $i++;
         }
      }

      function getRegistros($tabla,$busqueda="a"){
        if($busqueda=="a"){
          $resultado = $this->ConexionPDO->prepare("Select * from $tabla");
          $resultado->execute();
          return $resultado;
        }else{
          $resultado = $this->ConexionPDO->prepare("Select * from $tabla where $busqueda");
          $resultado->execute();
          return $resultado;
        }

      }

      function Borrar($id,$busqueda){
        $resultado = $this->ConexionPDO->prepare("Select * from $tabla where $busqueda");
        $resultado->execute();
        return $resultado;
      }

      function Insertar($datos){
        $stm = 'Insert into '.$datos[0].' values ('.$datos[1].')';
        $this->ConexionPDO->query($stm);

      }

      function getJSON($tabla,$busqueda="a"){
        $rawdata=Array();
        $i = 0;
          if($busqueda=="a"){

            $resultado = $this->ConexionPDO->prepare("Select * from $tabla");
            $resultado->execute();
            while($row = $resultado->fetch(PDO::FETCH_ASSOC))
            {
              $rawdata[$i] = $row;
              $i++;
            }
            return $rawdata;

          }else{

            $resultado = $this->ConexionPDO->prepare("Select * from $tabla where $busqueda");
            $resultado->execute();
            while($row = $resultado->fetch(PDO::FETCH_ASSOC))
            {
              $rawdata[$i] = $row;
              $i++;
            }
            return $rawdata;

          }
        }


}
