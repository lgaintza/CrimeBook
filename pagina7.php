<?php
    require_once('include/BD.php');
    require_once('include/Estadistica.php');
    require_once('Smarty.class.php');

    // Recuperamos la información de la sesión
    session_start();

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) 
        die("Error - debe <a href='login.php'>identificarse</a>.<br />");
        else {
            // $idJuego = $_SESSION['idJuego'];
            
        }
    // Cargamos la librería de Smarty
    $smarty = new Smarty;
    $smarty->template_dir = 'smarty/templates/';
    $smarty->compile_dir = 'smarty/templates_c/';
    $smarty->config_dir = 'smarty/configs/';
    $smarty->cache_dir = 'smarty/cache/';

   

    $juegos = BD::obtieneEstadistica(200001);
    $estadisticas = new Estadistica($juegos);
  

   $smarty->assign('estadisticas', $estadisticas);
    // Mostramos la plantilla
    $smarty->display('estadisticas_pag7.tpl');   
    //print_r($estadisticas);
  
?>