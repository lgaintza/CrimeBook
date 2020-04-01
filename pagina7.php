<?php
    require_once('include/BD.php');
    require_once('include/Estadistica.php');
    require_once('include/libs/Smarty.class.php');

   // Recuperamos la información de la sesión
   session_start();

   // Y comprobamos que el usuario se haya autentificado

   // Cargamos la librería de Smarty
   $smarty = new Smarty;
   $smarty->template_dir = 'smarty/templates/';
   $smarty->compile_dir = 'smarty/templates_c/';
   $smarty->config_dir = 'smarty/configs/';
   $smarty->cache_dir = 'smarty/cache/';
   $idPartida=$_SESSION['idPartida'];
print_r($idPartida);

   $juegos = BD::obtieneEstadistica($idPartida);

  $smarty->assign('juegoest',$juegos);
   // Mostramos la plantilla
   $smarty->display('estadisticas_pag7.tpl');   
   //print_r($estadisticas);

?>