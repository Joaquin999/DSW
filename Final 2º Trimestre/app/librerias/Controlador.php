<?php
Class Controlador {

    public function cargaModelo ($modelo,$metodo,$parametros=[]) {
      $modelo = ucwords($modelo);
      if (file_exists("../app/modelos/mod" . $modelo . ".php")) {
              require_once "../app/modelos/mod" . $modelo . ".php";
              $modelo = "mod".$modelo;
              $modelo = new $modelo;
              call_user_func ([$modelo, $metodo], $parametros);
          }else{
            die(_("No existe el metodo"));
          }

    }

    public function cargaVista ($carpeta, $archivo, $datos=[]) {
        // Si el fichero existe lo carga, en caso contrario informa del error y muere
        if (file_exists("../app/vistas/" .strtolower($carpeta) . "/". ucwords($archivo) . ".php")) {
          require_once "../app/vistas/" .strtolower($carpeta) . "/". ucwords($archivo) . ".php";

    }else{
      die(_("Esa vista no existe"));
    }
  }

}
?>
