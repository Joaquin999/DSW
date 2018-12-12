<?php

  echo ' <div class="col-md-12 text-center">
  <div class="collapse" id="collapseInsert">
  <form class="form-group" method="POST" action=" '. RUTA_URL .'principal/insertar" >';


  foreach ($BD->Dominios as $clave => $valor) {
    if(strpos($BD->Dominios[$clave],"enum")!==false){

       $resultado = explode(",",str_replace("enum","",str_replace("(","",str_replace(")","",str_replace("'","",$BD->Dominios[$clave])))));
       $placeHolder = str_replace("enum","",str_replace("(","",str_replace(")","",str_replace("'","",$BD->Dominios[$clave]))));        //Opciones para la datalist de los formularios
       $patron =  str_replace(",","|",str_replace("enum","",str_replace("(","",str_replace(")","",str_replace("'","",$BD->Dominios[$clave])))));//Patron para el Pattern de los formularios

       echo "<datalist id='enums" . $clave . "'>";
       for($i=0;$i<count($resultado);$i++){
         echo "<option value='" . $resultado[$i] . "'>";
       }
       echo "</datalist>";
       echo '<label>' . ucwords($clave) . '&nbsp;</label>';
       echo '<input type="text" pattern="' . $patron . '" class="form-control" list="enums' . $clave . '" name="new' . $clave . '" id="new ' . $clave . '" value="" placeholder=" ' .$placeHolder.'"';
       $BD->Nulos[$clave]=="NO" ? $requerido = "required" : $requerido = "";
       echo $requerido;
       echo ">";
    }

    if (strpos($BD->Dominios[$clave], "float") !== FALSE) {
      echo '<label>' . ucwords($clave) . '&nbsp;</label>';
      echo '<input type="number" pattern="[-+]?([0-9]*\.[0-9]+|[0-9]+)" class="form-control" name="new' . $clave . '" id="new" ' . $clave . '" value=""';
      $BD->Nulos[$clave]=="NO" ? $requerido = "required" : $requerido = "";
      echo $requerido;
      echo ">";
    }

    if (strpos($BD->Dominios[$clave], "char") !== FALSE) {
      echo '<label>' . ucwords($clave) . '&nbsp;</label>';
      echo '<input type="text" title="El formato debe ser texto" class="form-control" name="new' . $clave . '" id="new' . $clave . '" value=""';
      $BD->Nulos[$clave]=="NO" ? $requerido = "required" : $requerido = "";
      echo $requerido;
      echo ">";
    }

    if (strpos($BD->Dominios[$clave], "int") !== FALSE) {
      echo '<label>' . ucwords($clave). '&nbsp;</label>';
      echo '<input type="number" min="0" pattern="" class="form-control" name="new' . $clave . '" id="new' . $clave . '" value=""';
      $BD->Nulos[$clave]=="NO" ? $requerido = "required" : $requerido = "";
      echo $requerido;
      echo ">";
    }
  }//ACABA EL FOREACH

  echo "<br/>";
  echo '<button type="submit" class="btn btn-info" >Enviar consulta</button>';
  echo "</form></div></div>";
