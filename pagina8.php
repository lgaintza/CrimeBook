<?php
require_once('include/BD.php');
require_once('include/Juego.php');
require_once('include/Partida.php');
require_once('include/Equipo.php');
require_once('include/Prueba.php');
require_once('include/Resolucion.php');
require_once('include/Pista.php');
require_once('include/libs/Smarty.class.php');

session_start();

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['anadirPista'])){
    //$_POST['codigoPrueba'];

}
 $idPrueba = 400001;
 $_SESSION['idPrueba'] = $idPrueba;
if (isset($_POST['guardar'])) {
    
    $id=$_POST['id'];
    $texto = $_POST['texto'];
    $tiempo = $_POST['tiempo'];
    $intentos = $_POST['intentos'];
 
   echo ($_SESSION['idPrueba'].$id.$tiempo.$intentos);
    $pista = BD::creaPista($_SESSION['idPrueba'], $id, $texto, $tiempo, $intentos);

    //var_dump($pista);
  //  header("Location: pagina6.php");

      
}
if(isset($_POST['cancelar'])){
    header("Location: pagina6.php");
}

$smarty->assign('idPrueba', $idPrueba);
// Mostramos la plantilla
$smarty->display('crearPista_pag8.tpl');
?>
