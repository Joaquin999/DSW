<?php
function redireccionar ($pagina){
    header("Location: " . RUTA_URL . $pagina);
}//El cometido de la función de este archivo sería redireccionar a la página introducida por parámetro
//partiendo de la constante RUTA_URL que contiene la ruta del proyecto
