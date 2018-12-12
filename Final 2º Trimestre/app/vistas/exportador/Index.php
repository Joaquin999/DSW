<?php
if(!isset($_SESSION["nombre"])){
  redireccionar("Log/Index");
}
$tabla = $_SESSION["tabla"] ;
$BD = new BD();
if(isset($_SESSION["busqueda"])){
   $Consulta = $BD->getRegistros($tabla,$_SESSION["busqueda"]);
}else{
  $Consulta = $BD->getRegistros($tabla);
}
$Columnas = $BD->getColumnas($tabla);

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<database xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='database.xsd'>";
if (isset($tabla)) {
    $r = 0;
    while ($line = $Consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<table name='$tabla'>";
        for($i = 0;$i<$BD->NumeroColumnas;$i++){
          echo "<column name='$tabla'>" . $line[$Columnas[$i]] . "</column>";
        }
        echo "</table>";
        $r++;
    }
    echo "</database>";
}
