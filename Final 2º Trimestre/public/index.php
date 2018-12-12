<?php
session_start();
if(isset($_REQUEST["language"])){
  $user_locale = "en_GB.utf8";
  putenv("LANGUAGE=$user_locale");
  putenv("LANG=$user_locale");
  if (!defined('LC_MESSAGES')) define('LC_MESSAGES', 5);
  // Establece la información de la configuración regional
  setlocale(LC_MESSAGES, $user_locale);
  textdomain("en_GB");
  bindtextdomain("en_GB", "../locale");
}
require_once("../app/iniciador.php");



$iniciar = new Core();

?>
