<?php

class Core{

    protected $metodoActual = "cargaVista";
    protected $parametros = [];
    public $metodoTmp;

    public function __construct() {
        $url = $this->getURL();

            !(isset($url)) ? $url = Array("Principal") : "";

            if(isset($url[0]) && !(file_exists("../app/vistas/" .strtolower($url[0]) . "/Index.php"))){
                die("Ese archivo no existe");
            }
            
            if(file_exists("../app/modelos/mod".ucwords($url[0]).".php")){
                require_once "../app/modelos/mod".ucwords($url[0]).".php";
                $clase = "mod".ucwords($url[0]);
                $this->metodoTmp = new $clase;
            }

            if (isset($url[1]) && method_exists($this->metodoTmp, $url[1])) {
                        $this->metodoActual = "cargaModelo";
            }

            !(isset($url[1])) ? array_push($url,"Index") : "";
            $this->parametros = $url ? array_values($url) : [];
            if(!empty($_POST)){
              $this->parametros[count($this->parametros)] = [];
              foreach ($_POST as $key => $value) {
                array_push($this->parametros[2], $value);
              }

            }

            call_user_func_array ([new Controlador(), $this->metodoActual], $this->parametros);

    }


    public function getURL(){
        if (isset($_GET["url"])) {
           $url = rtrim($_GET["url"], "/");
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode("/", $url);

           return ($url);
        }
    }
}
?>
